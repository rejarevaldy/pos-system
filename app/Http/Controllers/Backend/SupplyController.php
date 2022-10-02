<?php

namespace App\Http\Controllers\Backend;

use App\Models\Supply;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_date = Supply::all();
        $unique_date = [];
        foreach ($get_date as $date) {
            array_push($unique_date, $date->created_at->toDateString());
        }
        $dates = array_unique($unique_date);
        rsort($dates);

        return view('backend.supply.index', [
            'title' => 'List Supply',
            'breadcrumb' => request()->segments(),
            'dates' => $dates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supply.create', [
            'title' => 'Create Supply',
            'breadcrumb' => request()->segments(),
            'products' => Product::all()
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
        foreach ($request->product_id as $key => $value) {
            Supply::create([
                'quantity'          => $request->stock[$key],
                'purchase_price'    => $request->price[$key],
                'total_price'       => $request->total_price[$key],
                'products_id'       => $request->product_id[$key],
                'users_id'          => Auth::user()->id,
            ]);
        }

        return redirect('/auth/supply')->with('success', 'Supply created successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
