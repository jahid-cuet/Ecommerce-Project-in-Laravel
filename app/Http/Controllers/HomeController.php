<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','Delivered')->get()->count();

        return view('admin.index',compact('user','product','order','delivered'));
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



    public function myorders()
    {
        $userid=Auth::user()->id;
        $orders=Order::where('user_id',$userid)->get();
        return view('home.myorders',compact('orders'));

    }


    // Strip Payment
    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }



    // For post

    public function stripePost(Request $request,$value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
$name=Auth::user()->name;
$phone=Auth::user()->phone;
$address=Auth::user()->address;

$userid=Auth::user()->id;
$carts=Cart::where('user_id',$userid)->get();



foreach($carts as $cart){
$order=new Order;
$order->name=$name;
$order->receive_address=$address;
$order->phone=$phone;
$order->user_id=$userid;
$order->product_id=$cart->product_id;
$order->payment_status="paid";
$order->save();
}


$cart_remove=Cart::where('user_id',$userid)->get();
foreach($cart_remove as $remove){
$data=Cart::find( $remove->id);
$data->delete();
}
Session::flash('success', 'Payment successful!');
return redirect('/mycart');

    }
   
}
