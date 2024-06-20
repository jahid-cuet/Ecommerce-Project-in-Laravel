<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }
    public function home()
    {
        $products =Product::all();

        return view('home.index',compact('products'));
    }
    public function login_home()
    {
        $products =Product::all();

        return view('home.index',compact('products'));
    }

    public function product_details($id)
    {   
        
        $data =Product::find($id);
        $category=$data->category; 

        return view('home.product_details',compact('data','category'));
    }

    public function add_cart($id)
    {
        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $data=new Cart;
        $data->user_id=$user_id;
        $data->product_id=$product_id;
        $data->save();
        return back()->withSuccess('Cart Added Successfully!!!');
    }
}
