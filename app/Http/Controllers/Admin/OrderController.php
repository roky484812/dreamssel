<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function pendingOrder()
    {
        $orders = Order::where('status', '1')
            ->with('order_list')
            ->orderBy('created_at', 'desc')
            ->paginate(10); 
        $products = Product::all();
        $users = User::all();
        $orders = Order::where('status', '1')->with('order_list')
        ->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.order.pendingOrder', [
            'orders' => $orders,
            'products' => $products,
            'users' => $users
        ]);
    }
    public function confirmedOrder()
    {
        $orders = Order::where('status', '2')->orderBy('created_at', 'desc')->with('order_list')->paginate(10); 
        $products = Product::all();
        $users = User::all();

        return view('admin.order.confirmedOrder', ['orders' => $orders, 'products' => $products, 'users' => $users]);
      
    }
    public function cancelledOrder()
    {
        $orders = Order::where('status', '3')->orderBy('created_at', 'desc')->with('order_list')->paginate(10); 
        $products = Product::all();
        $users = User::all();

        return view('admin.order.cancelledOrder', ['orders' => $orders, 'products' => $products, 'users' => $users]);
    }

    public function order_confirm(Request $request, $order_id)
    {
        // Find the order by ID
        $order = Order::find($order_id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        // Update the order status
        $order->status = '2'; // Update this as per your requirement

        // Save the updated order
        $order->save();

        return redirect()->back()->with('success', 'Order confirmed successfully');
    }
    public function order_cancel(Request $request, $order_id)
    {
        $order = Order::find($order_id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        // Update the order status
        $order->status = '3'; // Update this as per your requirement

        // Save the updated order
        $order->save();

        return redirect()->back()->with('success', 'Order confirmed successfully');

    }
}
