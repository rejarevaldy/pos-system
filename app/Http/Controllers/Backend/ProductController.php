<?php

namespace App\Http\Controllers\Backend;

use Session;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index', [
            'title' => 'List Products',
            'breadcrumb' => request()->segments(),
            'products' => Product::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create', [
            'title' => 'Create Product',
            'breadcrumb' => request()->segments(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'product_code'      => 'string',
            'product_name'      => 'string',
            'product_brand'     => 'string|nullable',
            'product_type'      => 'string',
            'product_unit'      => 'string|nullable',
            'product_weight'    => 'integer|nullable',
            'stock'             => 'integer',
            'price'             => 'integer',
        ]);

        Product::create($credentials);

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return response()->json(['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $credentials = $request->validate([
            'product_code'      => 'string',
            'product_name'      => 'string',
            'product_brand'     => 'string',
            'product_type'      => 'string',
            'product_unit'      => 'string',
            'product_weight'    => 'integer',
            'stock'             => 'integer',
            'price'             => 'integer',
        ]);

        $product->update($credentials);

        return redirect()->back()->with('success', 'Product update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
