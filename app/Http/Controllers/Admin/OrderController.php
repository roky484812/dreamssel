<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function pendingOrder(Request $req){
        $products = Product::all();
        $users = User::all();
        $orders_query = Order::where('status', '1')->with('order_list')
        ->orderBy('created_at', 'desc');
        if($req->input('token')){
            $orders_query = $orders_query->where('order_token', 'like', '%'.$req->input('token').'%');
        }
        $orders = $orders_query->paginate(10);
        return view('admin.order.pendingOrder', [
            'orders' => $orders,
            'products' => $products,
            'users' => $users,
            'search_token'=> $req->input('token')
        ]);
    }
    public function confirmedOrder(Request $req)
    {
        $products = Product::all();
        $users = User::all();
        $orders_query = Order::where('status', '2')->with('order_list')
        ->orderBy('created_at', 'desc');
        if($req->input('token')){
            $orders_query = $orders_query->where('order_token', 'like', '%'.$req->input('token').'%');
        }
        $orders = $orders_query->paginate(10);
        return view('admin.order.pendingOrder', [
            'orders' => $orders,
            'products' => $products,
            'users' => $users,
            'search_token'=> $req->input('token')
        ]);
      
    }
    public function cancelledOrder(Request $req){
        $products = Product::all();
        $users = User::all();
        $orders_query = Order::where('status', '3')->with('order_list')
        ->orderBy('created_at', 'desc');
        if($req->input('token')){
            $orders_query = $orders_query->where('order_token', 'like', '%'.$req->input('token').'%');
        }
        $orders = $orders_query->paginate(10);
        return view('admin.order.pendingOrder', [
            'orders' => $orders,
            'products' => $products,
            'users' => $users,
            'search_token'=> $req->input('token')
        ]);
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
