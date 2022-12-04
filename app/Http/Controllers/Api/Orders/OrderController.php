<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {

        // dd($gateway->clientToken()->generate());
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token,
        ];

        return response()->json($data, 200);
    }

    public function payment(OrderRequest $request, Gateway $gateway)
    {

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transazione riuscita!',
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione non riuscita!',
            ];
            return response()->json($data, 404);
        }
    }
}
