<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class StripeController extends Controller
{
    public function paymentStripePageView(){
        $carts = Cart::content();
        $count = Cart::count();
        $cartTotal = Cart::total();
        $shipping = Shipping::where('authID', Auth::id())->first();
        return view('layouts.fontend.payment.payment', compact('carts', 'count', 'cartTotal', 'shipping'));
    }


    public function stripePaymentStore(Request $request){

        if(Session::has('coupon')){
            $totalAmount = Session::get('coupon')['total_amount'];
        }else {
            $totalAmount = round(Cart::total());
        }

        \Stripe\Stripe::setApiKey('sk_test_51JRdqsL1ewd4d4iDWkyjvQR4v0tCAMX73Kafu7UcwvJY5HNxuCv2mD0sayH4oqVsVQRslLgqraJjOboCRveLAdo200Ysl4KW7K');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $totalAmount*100,
            'currency' => 'usd',
            'description' => 'Hannan Bhuiyan payment',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $order_id = Order::insertGetId([
            'user_id' => $request->user_id,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'postCode' => $request->postCode,
            'address' => $request->address,
            'payment_type' =>'Stripe',
            'payment_method' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $totalAmount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'SPM'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending' ,
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::content();
        foreach($carts as $cart){
            OrderItem::insert([
                'order_id' => $order_id ,
                'product_id' => $cart->id,
                'color' => $cart->options->color ,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        Cart::destroy();
        return redirect()->back()->with('success', 'Order Success');


    }




}
