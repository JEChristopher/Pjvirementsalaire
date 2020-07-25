<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Virement;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class VirementController extends Controller
{
    public function index()
    {
        $virements = Virement::all();

        return view('virements.index', compact('virements'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'libelle' => 'required|min:3',
            'description' => 'required|min:3',
            'bordereau' => 'required|mimes:xlsx,xls'
        ]);
        $file = Helpers::addFile($data['bordereau'], 'bordereaux');
        $data['bordereau'] = $file['fileName'];

        try {
            $virement = new Virement();

            $virement->libelle = $data['libelle'];
            $virement->description = $data['description'];
            $virement->bordereau = $data['bordereau'];
            $virement->created_at = NOW();
            $virement->updated_at = NOW();

            $virement->save();
        } catch (\Exception $e) {
            dump($e->getMessage());
            die();
        }

        return redirect()->route('virements.index')->with('success', "L'ordre de virement a été enregistré.");
    }

    public function show($id)
    {
        $virement = Virement::findOrFail($id);

        $path = public_path() . DIRECTORY_SEPARATOR . 'storage'. DIRECTORY_SEPARATOR . 'bordereaux' . DIRECTORY_SEPARATOR;
        $fileType = pathinfo($path . $virement->bordereau, PATHINFO_EXTENSION); // Récupération du type de fichier
        $reader = IOFactory::createReader(ucfirst($fileType)); // Utilisation du plugin pour charger le fichier
        $spreadsheet = $reader->load($path . $virement->bordereau);
        $spreadsheet = IOFactory::load($path . $virement->bordereau);
        $details = $spreadsheet->getActiveSheet()->toArray();
        $details = array_slice($details, 1);

        return view('virements.show', compact('details'));
    }
}
