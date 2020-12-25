<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Auth;
use Cart;
use App\Models\Ubigeo;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\BillingData;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Cart::count() == 0) return redirect()->back();
        $ubigeos = Ubigeo::all();
        return view('pages.checkout.index', [
            'ubigeos' => $ubigeos
        ]);
    }

    public function orderStore(Request $request)
    {
        $this->validate($request, [
            'cell_phone' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'payment_method_id' => 'required'
        ]);

        $customer_id = Auth::user()->customer_id;
        $cart = Cart::content();
        $cart_total = Cart::total();
        $billing_status = 0;

        try
        {
            if($request->has('billing_status')) $billing_status = 1;

            // save order
            $order = new Order;
            $order->customer_id = $customer_id;
            $order->payment_method_id = $request->payment_method_id;
            $order->order_date = date('Y-m-d');
            $order->order_hour = date('H:i:s');
            $order->cell_phone = $request->cell_phone;
            $order->address = $request->address;
            $order->reference = $request->reference;
            $order->subtotal = round(($cart_total / 1.18), 2);
            $order->igv = round(($order->subtotal * 0.18), 2);
            $order->total = $cart_total;
            $order->current_status = 1;
            $order->payment_status = 0;    
            $order->billing_status = $billing_status;
            $order->sale_status = 0;
            $order->command_status = 0;
            if($order->save())
            {
                // save order details
                foreach($cart as $item)
                {
                    $orderDetail = new OrderDetail;
                    $orderDetail->order_id = $order->order_id;
                    $orderDetail->item_code = $item->options->has('item_code') ? $item->options->item_code : '000000';
                    $orderDetail->item_description = $item->name;
                    $orderDetail->quantity = $item->qty;
                    $orderDetail->unit_price = $item->price;
                    $orderDetail->amount = $item->total;
                    $orderDetail->observation = '';
                    $orderDetail->item_type = 1;
                    $orderDetail->save();
                }

                // save order status
                $orderStatus = new OrderStatus;
                $orderStatus->order_id = $order->order_id;
                $orderStatus->status = 1; // 1 Nuevo | 2 Aceptado | 3 En Preparación | 4 Empaquetado y Enviado | 5 Completado
                $orderStatus->order_date = date('Y-m-d');
                $orderStatus->order_hour = date('H:i:s');
                $orderStatus->reason = 'Tu Pedido ha sido recibido';
                $orderStatus->save();

                // save if billing data
                if($billing_status){
                    $billingData = new BillingData;
                    $billingData->order_id = $order->order_id;
                    $billingData->invoice_type = $request->invoice_type;
                    $billingData->document_type = $request->document_type;
                    $billingData->document_number = $request->document_number;
                    $billingData->denomination = $request->denomination;
                    $billingData->save();
                }

                //cart session destroy
                Cart::destroy();
            }

            return redirect()->action('CheckoutController@orderSuccess', [
                'order_id' => $order->order_id
            ]);
        }
        catch(\Exception $e)
        {
            return redirect()->action('CheckoutController@index');
        }
    }

    public function orderSuccess($order_id)
    {
        $customer_id = Auth::user()->customer_id;
        $order = Order::where('order_id', $order_id)->where('customer_id', $customer_id)->firstOrFail();
        return view('pages.checkout.success', [
            'order' => $order
        ]);
    }

    //denomination
    public function denominationDNI(Request $request)
    {
        $person = ['denomination' => ''];
        try
        {
            $base_url = config('appm21.dniruc.base_url');
            $token = config('appm21.dniruc.token');
            $route = 'dni/'.$request->document_number.'?token='.$token;
            $client = new Client(['base_uri' => $base_url, 'verify' => false]);
            $response = $client->request('GET', $route);
            if($response->getStatusCode() == 200)
            {
                $data = json_decode($response->getBody());
                $dni = $data->dni;
                $name = $data->nombres;
                $paternalSurname = $data->apellidoPaterno;
                $maternalSurname = $data->apellidoMaterno;
                $verificationCode = $data->codVerifica;
                $person = ['denomination' => $name.' '.$paternalSurname.' '.$maternalSurname];
            }
            return response()->json($person);
        }
        catch(\Exception $e)
        {
            return response()->json($person); 
        }
    }

    public function denominationRUC(Request $request)
    {
        $person = ['denomination' => ''];
        try
        {
            $base_url = config('appm21.dniruc.base_url');
            $token = config('appm21.dniruc.token');
            $route = 'ruc/'.$request->document_number.'?token='.$token;
            $client = new Client(['base_uri' => $base_url, 'verify' => false]);
            $response = $client->request('GET', $route);
            if($response->getStatusCode() == 200)
            {
                $data = json_decode($response->getBody());
                $dni = $data->ruc;
                $businessName = $data->razonSocial;
                $tradename = $data->nombreComercial;
                $status = $data->estado;
                $person = ['denomination' => $businessName];
            }
            return response()->json($person);
        }
        catch(\Exception $e)
        {
            return response()->json($person); 
        }
    }
}
