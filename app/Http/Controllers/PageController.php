<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Restaurant;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::where('status', 1)->inRandomOrder()->limit(8)->get();
        return view('pages.home', [
            'products' => $products
        ]);
    }

    public function menu()
    {
        $restaurants = Restaurant::where('status', 1)->get();
        $products = Product::where('status', 1)->paginate(8);
        return view('pages.menu', [
            'restaurants' => $restaurants,
            'products' => $products
        ]);
    }

    public function restaurants()
    {
        $restaurants = Restaurant::where('status', 1)->get();
        return view('pages.restaurants', [
            'restaurants' => $restaurants
        ]);
    }

    public function restaurant($id, $title)
    {
        $restaurant = Restaurant::where('restaurant_id', $id)->where('status', 1)->first();
        $products = Product::where('restaurant_id', $id)->where('status', 1)->paginate(8);
        return view('pages.restaurant', [
            'restaurant' => $restaurant,
            'products' => $products
        ]);
    }

    public function product($id, $title)
    {
        $product = Product::where('status', 1)->where('product_id', $id)->first();
        $related = Product::where('category_id', $product->category_id)->where('status', 1)->where('product_id', '<>', $id)->inRandomOrder()->limit(6)->get();
        return view('pages.product', [
            'product' => $product,
            'related' => $related
        ]);
    }

    public function contactUs(){
        return view('pages.contact-us');
    }


}
