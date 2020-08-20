<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notifyController extends Controller
{
    public function notify(Request $request)
    {
        // $data = $request->validate([
        //     'transaction_id' => 'required',
        //     'client_transaction_id' => 'required',
        //     'lot' => 'required',
        //     'amount' => 'required',
        //     'receiver' => 'required',
        //     'operator' => 'required',
        //     'treatment_status' => 'required',
        // ]);
        dd('Hello world');
    }
}
