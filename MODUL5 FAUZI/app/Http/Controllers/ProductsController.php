<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return view('products/emptyProduct');
        } else {
            return view('products/indexProduct', compact('products'));
        }
    }

    public function indexOrder()
    {
        $products = Product::all();
        if ($products->isEmpty()) {
            return view('products/emptyProduct');
        } else {
            return view('orders/indexOrder', compact('products'));
        }
        // $orders = Order::all();
        // if ($orders->product_id->isEmpty()) {
        //     return view('products/emptyProduct');
        // } else {
        //     return view('orders/IndexOrder', compact('orders'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/addProduct');
    }

    public function chooseProduct(Product $product)
    {
        return view('orders/ProsesOrder', compact('product'));
        // return $product;
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
            'image' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);


        $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();

        $request->image->move(public_path('img'), $imgName);

        // Product::create($request->all());
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'img_path' => $imgName,
        ]);

        return redirect('/products')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        $img = '';
        if (!empty($request->img_path)) {
            $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $imgName);

            $img = $imgName;
        } else {
            $img = $product->img_path;
        }

        Product::where('id', $product->id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'stock' => $request->stock,
                    'img_path' => $img
                ]);
        return redirect('/products')->with('status', 'Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/products')->with('status', 'Data Berhasil dihapus');
    }
}
