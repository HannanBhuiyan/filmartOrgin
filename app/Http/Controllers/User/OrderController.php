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
        $pdf = PDF::loadView("user.invoice", compact('orders', 'orderItems'))->setPaper("a4")->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    //================ admin order settings =======================

    public function pendingOrder(){
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.order.pendingOrder', compact('orders'));
    }

    public function confirmOrder(){
        $orders = Order::where('status', 'Confirm')->orderBy('id', 'DESC')->get();
        return view('admin.order.confirmOrder', compact('orders'));
    }

    public function processingOrder(){
        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
        return view('admin.order.processingOrder', compact('orders'));
    }

    public function pickedOrder(){
        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();
        return view('admin.order.pickedOrder', compact('orders'));
    }

    public function shippedOrder(){
        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
        return view('admin.order.shippedOrder', compact('orders'));
    }

    public function deliveredOrder(){
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
        return view('admin.order.deliveredOrder', compact('orders'));
    }
    public function orderView($order_id){

        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where("order_id", $order_id)->orderBy('id', 'DESC')->first();

        return view('admin.order.orderView', compact('orders', 'orderItems'));
    }

    public function pendingToConfirm ($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Confirm']);
        return redirect()->route("order.pending")->with("success", "Order Confirm Successfully");
    }

    public function confirmToProcessing($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Processing']);
        return redirect()->route("order.confirm")->with("success", "Order Processing Successfully");
    }

    public function processingToPicked($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Picked']);
        return redirect()->route("order.processing")->with("success", "Order Picked Successfully");
    }

    public function pickedToShipped($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Shipped']);
        return redirect()->route("order.picked")->with("success", "Order Shipped Successfully");
    }
    public function shippedToDelivered($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Delivered']);
        return redirect()->route("order.shipped")->with("success", "Order Delivered Successfully");
    }

    public function orderInvoiceDownload($order_id){
        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where("order_id", $order_id)->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView("admin.invoice", compact('orders', 'orderItems'))->setPaper("a4")->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

}
