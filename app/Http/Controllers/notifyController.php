<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Transaction;
use Illuminate\Http\Request;

class notifyController extends Controller
{
    public function notify(Request $request)
    {
        if (isset($request->transaction_id)) {
            $transaction_id = $request->transaction_id;

            // Génération de token
            $url = 'https://client.cinetpay.com/v1/auth/login';
            $params = array(
                'apikey' => '2707816745e2ef79db6e376.09146112',
                'password' => 'Mercipapa23021998'
            );

            $result = Helpers::curlPost($url, $params);
            $result = json_decode($result);
            $token = (array) $result->data;
            $token = $token['token'];

            $result = $this->getPaymentInfo($token, $transaction_id);

            if ($result->code == 0) {
                $data = $result->data[0];

                try {
                    $transaction = Transaction::where('transaction_id', $data->transaction_id)->first();

                    if ($transaction) {
                        $transaction->cp_operator = $data->operator;
                        $transaction->sending_status = $data->sending_status;
                        $transaction->cp_treatment_status = $data->treatment_status;
                        $transaction->cp_message = $data->comment;
                        $transaction->operator_transaction_id = $data->operator_transaction_id;
                        $transaction->updated_at = date('Y-m-d H:i:s');

                        $transaction->save();
                    } else {
                        \Log::info('Aucune transaction retrouvée avec "transaction_id" ' . $data->transaction_id);
                        return response()->json("Aucune transaction retrouvée avec 'transaction_id = " . $data->transaction_id, 404);
                    }
                } catch (\Exception $e) {
                    \Log::info($e->getMessage());
                    dump($e->getMessage());
                    die();
                }
            }
        }
    }

    private function getPaymentInfo($token, $transaction_id)
    {
        $url = "https://client.cinetpay.com/v1/transfer/check/money?token=" . $token . "&lang=fr&transaction_id=" . $transaction_id;

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);

        return json_decode($res->getBody());
    }
}
