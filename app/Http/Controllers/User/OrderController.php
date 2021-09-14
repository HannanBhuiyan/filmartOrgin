<?php

namespace App\Http\Controllers\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;



class OrderController extends Controller
{

    public function ViewOrder($order_id){
        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where("order_id", $order_id)->orderBy('id', 'DESC')->get();
        return view("user.orderView", compact('orders', 'orderItems'));
    }

    public function downloadInvoice($invoice_id){
        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $invoice_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where("order_id", $invoice_id)->orderBy('id', 'DESC')->get();

//        return view("user.invoice", compact('orders', 'orderItems'));

        $pdf = PDF::loadView("user.invoice", compact('orders', 'orderItems'))->setPaper("a4")->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
