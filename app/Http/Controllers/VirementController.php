<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Transaction;
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
        $virement_id = $id;

        $path = public_path() . DIRECTORY_SEPARATOR . 'storage'. DIRECTORY_SEPARATOR . 'bordereaux' . DIRECTORY_SEPARATOR;
        $fileType = pathinfo($path . $virement->bordereau, PATHINFO_EXTENSION); // Récupération du type de fichier
        $reader = IOFactory::createReader(ucfirst($fileType)); // Utilisation du plugin pour charger le fichier
        $spreadsheet = $reader->load($path . $virement->bordereau);
        $spreadsheet = IOFactory::load($path . $virement->bordereau);
        $details = $spreadsheet->getActiveSheet()->toArray();
        $details = array_slice($details, 1);

        return view('virements.show', compact('details', 'virement_id'));
    }

    /**
     * Fonction d'initiation et de paiement.
     */
    public function action($id)
    {
        $virement = Virement::findOrFail($id);
        $url = 'https://client.cinetpay.com/v1/auth/login';

        $path = public_path() . DIRECTORY_SEPARATOR . 'storage'. DIRECTORY_SEPARATOR . 'bordereaux' . DIRECTORY_SEPARATOR;
        $fileType = pathinfo($path . $virement->bordereau, PATHINFO_EXTENSION); // Récupération du type de fichier
        $reader = IOFactory::createReader(ucfirst($fileType)); // Utilisation du plugin pour charger le fichier
        $spreadsheet = $reader->load($path . $virement->bordereau);
        $spreadsheet = IOFactory::load($path . $virement->bordereau);
        $details = $spreadsheet->getActiveSheet()->toArray();
        $details = array_slice($details, 1);

        $transaction = new Transaction();

        $params = array(
            'apikey' => '2707816745e2ef79db6e376.09146112',
            'password' => 'Mercipapa23021998'
        );

        $result = Helpers::curlPost($url, $params);
        $client_trans_id = "FTZ." . date('ymd') . "." . date("His") . "." . Helpers::generateRandomString(5);


        $result = json_decode($result);
        $token = (array) $result->data;
        $token = $token['token'];

        $contact_result = $this->addContact($details, $token);
        $contact_result = json_decode($contact_result);
        if ($contact_result) {
            $contact_result = $contact_result->data[0];
            $lot = $contact_result[0]->lot;
        }

        foreach($details as $detail) {
            $transaction->amount = $detail[6];
            $transaction->prefix = $detail[3];
            $transaction->phone = $detail[4];
            $transaction->client_transaction_id = $client_trans_id;
            $transaction->lot = $lot;
            $transaction->sending_statuts = "PENDING";
            $transaction->updated_at = NOW();
            $transaction->created_at = NOW();

            $transaction->save();

            $this->pay($detail, $client_trans_id, $token, "fr");
        }

        dd($token);
    }

    /**
     * Fonction d'envoie d'argent
     */
    public function pay($detail, $client_trans_id, $token, $lang = "fr") {
        $url = "https://client.cinetpay.com/v1/transfer/money/send/contact?token=" . $token . "&lang=fr" . "&transaction_id=" . $client_trans_id;
        $notify_url = action('notifyController@notify');
        dd($url);

        $params[] = [
            'prefix' => $detail[3],
            'phone' => $detail[4],
            'amount' => $detail[6],
            'notify_url' => $notify_url,
            'client_transaction_id' => $client_trans_id,
        ];

        $data = array('data' => json_encode($params));

        $result = Helpers::curlPost($url, $data);
    }

    /**
     * Fonction d'ajout de contacts
     */
    public function addContact($data, $token)
    {
        $url = 'https://client.cinetpay.com/v1/transfer/contact?token=' . $token . '&lang=fr';

        $params = array();

        foreach ($data as $info) {
            $params[] = [
                'prefix' => $info[3],
                'phone' => $info[4],
                'name' => $info[1],
                'surname' => $info[2],
                'email' => $info[5]
            ];
        }
        $data = array('data' => json_encode($params));

        $result = Helpers::curlPost($url, $data);

        return $result;
    }
}
