<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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

    public function mycart()
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $userid=$user->id;
    
            $cart=Cart::where('user_id',$userid)->get();
    
         
        }
        return view('home.mycart',compact('cart'));

    }

    public function delete_cart($id)
    {

        $cart=Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
            // Validate the incoming request data
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
            ]);
        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone;

        $userid=Auth::user()->id;
        $carts=Cart::where('user_id',$userid)->get();
        
      
        
        foreach($carts as $cart){
            $order=new Order;
            $order->name=$name;
            $order->receive_address=$address;
            $order->phone=$phone;
            $order->user_id=$userid;
            $order->product_id=$cart->product_id;
            $order->save();
        }


        $cart_remove=Cart::where('user_id',$userid)->get();
        foreach($cart_remove as $remove){
            $data=Cart::find( $remove->id);
            $data->delete();
        }



            return redirect()->back();

    
    }
   
}
