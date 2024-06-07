<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\StarPlay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentApiController extends Controller
{
    public function paymentConfirmation(Request $request)
    {

        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->total = $request->total;
        $payment->type = $request->type;
        $payment->entity_id = $request->entity;
        $payment->plays_json = json_encode([
            'starPlays' => $request->starPlays,
            'numberPlays' => $request->numberPlays,
        ]);
        $payment->save();

        foreach ($request->starPlays as $play) {
            $starPlay = StarPlay::find($play['id']);
            $starPlay->confirmed = 1;
            $starPlay->save();
        }

        switch ($request->type) {
            case 'mbway':
                $curl = curl_init();
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'mbway.ifthenpay.com/IfthenPayMBW.asmx/SetPedidoJSON?MbWayKey=EHB-687540&canal=03&referencia=' . $payment->id . '&valor=' . $request->total . '&nrtlm=' . $request->phone . '&email=&descricao=',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                    )
                );
                $response = curl_exec($curl);
                curl_close($curl);
                break;
            case 'multibanco':
                $curl = curl_init();
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'https://ifthenpay.com/api/multibanco/reference/init',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => '{
                            "mbKey": "SLJ-368438",
                            "orderId": ' . $payment->id . ',
                            "amount": ' . $request->total . '
                        }',
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type: application/json',
                        ),
                    )
                );

                $response = curl_exec($curl);
                curl_close($curl);
                break;
            case 'wallet':
                $user = User::find($request->user()->id);
                $wallet = $user->wallet;
                $user->wallet = $wallet - $request->total;
                $user->save();
                $response = $user;
            default:
                break;
        }

        return json_decode($response);
    }
}