<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{

    public function cartIndex(){
        return view('cardPage');
    }

    public function getShoppingCart(){
        $carts = Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        return response()->json(array(
           'carts' => $carts,
           'count' => $count,
           'total' => $total,
        ));
    }

    public function shoppingCartRemove($rowId){
        $result = Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json($result);

    }
    // ============ increment =====================
    public function shoppingCartIncrement($rowId){
        $row = Cart::get($rowId);
        $result = Cart::update($rowId, $row->qty + 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( cart::total() * $coupon->coupon_discount ) / 100),
                'total_amount' => round( cart::total() - ( cart::total() * $coupon->coupon_discount ) / 100),
            ]);
        }
        return response()->json($result);
    }
    // ============ Decrement =====================
    public function shoppingCartDecrement($rowId){
        $row = Cart::get($rowId);
        $result = Cart::update($rowId, $row->qty - 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( cart::total() * $coupon->coupon_discount ) / 100),
                'total_amount' => round( cart::total() - ( cart::total() * $coupon->coupon_discount ) / 100),
            ]);
        }
        return response()->json($result);
    }
    // ================ apply coupon ==================

    public function applyCoupon(Request $request){
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( cart::total() * $coupon->coupon_discount ) / 100),
                'total_amount' => round( cart::total() - ( cart::total() * $coupon->coupon_discount ) / 100),
            ]);
           return response()->json(['success' => '<h4>Coupon Apply Success</h4>']);
        }else {
            return response()->json(['error' => '<h4>invalid Coupon</h4>']);
        }
    }
    // ================= coupon calculation fiend ==================
    public function couponCalculationField(){
        if(Session::has('coupon')){
            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ]);
        }else {
            return response()->json([
                'total' => Cart::total(),
            ]);
        }
    }
    // ================= coupon remove ==================

    public function couponRemove(){
        $result = Session::forget('coupon');
        return response()->json($result);
    }




}
