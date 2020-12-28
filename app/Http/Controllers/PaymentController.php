<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Culqi\Culqi;
use Culqi\CulqiException;

class PaymentController extends Controller
{
    public function orderCharge(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'order' => 'required',
            'amount' => 'required'
        ]);

        $token = $request->token;
        $order_id = $request->order;
        $order_amount = $request->amount;

        if(!$order = Order::find($order_id)){
            return response()->json(['status' => 'failed', 'message' => 'Código de pedido es inválida.']);
        }

        if($order_amount != $order->total){
            return response()->json(['status' => 'failed', 'message' => 'Los precios no coinciden.']);
        }

        if($order->payment_status == 1){
            return response()->json(['status' => 'failed', 'message' => 'El Pedido ya tiene un cargo.']);
        }

        //secreto token
        $SECRET_KEY = config('appm21.culqi_keys.secret');
        $culqi = new Culqi(array('api_key' => $SECRET_KEY));
        $order_code_id = $order->order_id;
        $order_description = 'Pedido Número '.$order_code_id;
        $order_amount_charge = $order->total;
        $order_customer_id = $order->customer_id;
        $order_email = $order->customer->email;
        $order_customer_name = $order->customer->name;
        $order_customer_last_name = $order->customer->last_name;
        $order_address = $order->address;
        $order_phone = $order->cell_phone;

        
        //array charge
        $charge_array = array(
            "amount" => ($order_amount_charge * 100),
            "capture" => true,
            "currency_code" => "PEN",
            "description" => $order_description,
            "email" => $order_email,
            "installments" => 0,
            "antifraud_details" => array(
                "address" => $order_address,
                "address_city" => "TACNA",
                "country_code" => "PE",
                "first_name" => $order_customer_name,
                "last_name" => $order_customer_last_name,
                "phone_number" => $order_phone,
            ),
            "metadata" => array(
                "order_id" => $order_code_id,
                "user_id" => $order_customer_id
            ),
            "source_id" => $token
        );
        
        try {
            // Creamos Cargo a una tarjeta
            $charge = $culqi->Charges->create($charge_array);

            if($charge->object == 'charge'){

                //update order
                $order->payment_status = 1;
                // $order->transaction = $charge->id;
                // $order->payment_date = date('Y-m-d H:i:s');
                // $order->charge_id = $charge->id;
                // $order->amount = ($charge->amount / 100);
                // $order->total_fee = ($charge->total_fee / 100);
                // $order->transfer_amount = ($charge->transfer_amount / 100);
                $order->update();

                return response()->json(['status' => 'success', 'message' => $charge->outcome->user_message]);  
            }else{
                return response()->json(['status' => 'failed', 'message' => $charge->merchant_message]);    
            }

        } catch (\Exception $e) {
			return $e;
            return response()->json(['status' => 'failed', 'message' => 'No se ha podido realizar el pago. Inténtalo de nuevo más tarde.']);
        }
    }
}