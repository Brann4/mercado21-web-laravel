<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use Hash; 
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\BillingData;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('customer_id', Auth::user()->customer_id)->get();
        return view('panel.index', [
            'orders' => $orders,       
        ]);
    }

    public function orderDetail($id)
    {
        $detail = OrderDetail::where('order_id', $id)->get();
        $order = Order::where('order_id', $id)->first();
        $customer = Auth::user();
        $total_amount = 0;
        foreach($detail as $d){
            $total_amount = $total_amount + $d->amount;
        } 
        return view('panel.orderDetail', [
            'detail' => $detail,
            'total_amount' => $total_amount,
            'order' => $order,
            'customer' => $customer
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:6' 
        ]);

        $current_password = Auth::user()->password;
        $new_password = $request->get('new_password');

        /*if(!(Hash::check($current_password, Auth::user()->password ))){
            return back()->with('error','La contraseña actual no coincide con los registros.');
        }*/
        if(strcmp($current_password, $new_password) == 0 ){
            return back()->with('error','La nueva contraseña no puede ser igual a la actual');
        }

        $user = Auth::user();
        $user->password = bcrypt($new_password);
        $user->update();
        return back()->with('message', 'Contraseña actualizada satisfactoriamente'); 
    }

    public function updateAccount(Request $request)
    {
        $modified_name = $request->get('name');
        $modified_lastname = $request->get('last_name');
        $modified_cellphone = $request->get('cell_phone');

        $user = Auth::user();
        if($modified_name != null) $user->name = $modified_name;
        if($modified_lastname != null) $user->last_name = $modified_lastname;
        if($modified_cellphone != null) $user->cell_phone = $modified_cellphone;        
        $user->update();
        return back()->with('message', 'Campos actualizados correctamente'); 
    }


}
