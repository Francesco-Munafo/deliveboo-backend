<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\PaymentRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function generate(Request $request, Gateway $gateway)
    {

        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }
    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request['paymentData']['amount'],
            'paymentMethodNonce' => $request['paymentData']['nonce'],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita!'
            ];
            return response()->json($data, 401);
        }
    }

    public function newOrder(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $new_order = Order::create($validated);

        if ($new_order) {
            $cartDishIds = collect($validated['cart'])->pluck('id')->toArray();

            $new_order->dishes()->attach($cartDishIds);

            $data = [
                'order' => $new_order,
                'success' => true,
                'message' => 'Transazione eseguita con successo!'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita!'
            ];
            return response()->json($data, 401);
        }
    }
}
