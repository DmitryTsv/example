<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\OrderRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->latest()->paginate(12);

        return view('viewOrders', compact('orders'));
    } 

    public function createOrder()
    {
        $products = Product::with('order')->get();
        
        return view('createOrder', compact('products'));
    }

    public function add(OrderRequest $request)
    { 

        DB::transaction(function () use ($request) {
            $order = Order::create($request->validated());
            
            Product::whereIn('id', $request->product_ids)
                ->whereNull('order_id')
                ->update(['order_id' => $order->id]);
        });
        
        return response()->json(['status' => 'success']);
    }

    public function complete(Order $order)
    { 
        abort_if($order->order_status !== Order::STATUS_NEW, 403, 'Можно завершать только новые заказы');
        $order->update(['order_status' => 'Выполнен']);
        
        return response()->json(['status' => 'success']);
    }

    public function delete(Order $order)
    { 
        DB::transaction(function () use ($order) {
            $order->products()->update(['order_id' => null]);
            $order->delete();
        });
        
        return response()->json(['status' => 'success']);  
    }

    public function display(Order $order)
    { 
        $order->load('products');
        return view('viewOrderItem', compact('order'));
    }

}
