<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use App\Models\order;
use App\Models\Setting;
use App\Models\orderProduct;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller{

    public function stripePost(Request $request){
        $request->validate([
            'city' =>'required',
            'country'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ]);
        $userId = auth()->user()->id;
        $Setting = Setting::where('id', 1)->first();
        $tax = $Setting->tax / 100;
        $cart_value = \Cart::session($userId)->getTotal();
        $total_tax = $tax * $cart_value;
        $total = $cart_value + $total_tax;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" =>$total*100,
            "currency" =>"usd",
            "source" =>$request->stripeToken,
            "description" =>"This payment is tested"
        ]);
        // add order to table when buying the item
        $order= new order;
        $order->user_id=$userId;
        // CardValue = 0.15 X total
        // we send it to stripe
        $order->total=$total;

        $order->currency='usd';
        $order->tax=$Setting->tax;
        $order->quantity=\Cart::session($userId)->getTotalQuantity();
        $order->description= "This payment is tested";
        $order->status= "1";
        $order->source= "1";
        // address section 
        $order->phone=$request->phone;
        $order->country=$request->country;
        $order->city=$request->city;
        $order->address=$request->address;
        $order->save();
        // get what items have been bought in the order are stored in array
        $products_from_cart=\Cart::session($userId)->getContent();
        // for every product in the order, every product will be stored in the order_product table with order_id
        // to specigy the order
        foreach ($products_from_cart as $item) {
            $orderproducts=new orderProduct;
            $orderproducts->order_id=$order->id;
            $orderproducts->product_id=$item->id;
            $orderproducts->name=$item->name;
            $orderproducts->detail='$item->detail';
            $orderproducts->image=$item->attributes->image;
            $orderproducts->price=$item->price;
            $orderproducts->quantity=$item->quantity;
            // dd($orderproducts);
            $orderproducts->save();
        }
        $details = [
            'title' => 'Mail from Hashtag9.com',
            'id' => $order->id,
            'total' => $order->total,
            'description' => $order->description,
            'status' => $order->status,
            'quantity' => $order->quantity,
            'created_at' => $order->created_at,
            

        ];
       
        Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\OrderMail($details));

        \Cart::session($userId)->clear();
        Session::flash('success','Payment successful!');
        return back();
    }
    public function checkout(){
        $user=Auth::user();
        return view("frontend.checkout")->with('user',$user);
    }
}

