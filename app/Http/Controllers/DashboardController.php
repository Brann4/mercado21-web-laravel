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
        $orders = Order::all();
        return view('panel.index', [
            'orders' => $orders
        ]);
    }
    public function ownOrders()
    {
        return view('panel.ownOrders');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6' 
        ]);

        $current_password = $request->get('current_password');
        $new_password = $request->get('new_password');

        if(!(Hash::check($current_password, Auth::user()->password ))){
            return back()->with('error','La contraseña actual no coincide con los registros.');
        }
        if(strcmp($current_password, $new_password) == 0 ){
            return back()->with('error','La nueva contraseña no puede ser igual a la actual');
        }

        $user = Auth::user();
        $user->password = bcrypt($new_password);
        $user->update();
        return back()->with('message', 'Campo(s) actualizados correctamente'); 
    }

    public function updateAccount(Request $request)
    {
        $modified_name = $request->get('name');
        $modified_lastname = $request->get('last_name');
        $modified_cellphone = $request->get('cell_phone');
        $modified_email = $request->get('email');

        $user = Auth::user();
        if($modified_name != null) $user->name = $modified_name;
        if($modified_lastname != null) $user->last_name = $modified_lastname;
        if($modified_cellphone != null) $user->cell_phone = $modified_cellphone;      
        if($modified_email != null) $user->email = $modified_email;     
        $user->update();
        return back()->with('message', 'Campos actualizados correctamente'); 
    }
}
