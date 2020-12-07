<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::all();
        // if ($orders->product_id->isEmpty()) {
        //     return view('products/emptyProduct');
        // } else {
        //     return view('orders/IndexOrder', compact('orders'));
        // }
    }
    public function indexHistory()
    {
        $orders = Order::all();
        if ($orders->isEmpty()) {
            return view('/emptyHistory');
        } else {
            return view('/', compact('orders'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'quantity' => 'required'            
        ]);
        $totalBayar = $request->price * $request->quantity;

        Order::create([
            'product_id' => $request->product_id,
            'amount' => $totalBayar,
            'buyer_name' => $request->name,
            'buyer_contact' => $request->contact

        ]);
        
        $newStock = $request->stock - $request->quantity;
        Product::where('id', $request->product_id)
                ->update([
                    'stock' => $newStock
                ]);

        $product = Product::find($request->product_id);
        return view('/orders/ProsesOrder', ['product' => $product]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
