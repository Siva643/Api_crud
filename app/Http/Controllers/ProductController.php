<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store=new Product;
        $store->name=$request->input('name');
        $store->email=$request->input('email');
        $store->phonenumber=$request->input('phonenumber');
        $store->address=$request=$request->input('address');
        $store->save();
        return new ProductResource($store);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show=Product::findOrFail($id);
        return new ProductResource($show);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update=Product::findOrFail($id);
        $update->name=$request->input('name');
        $update->email=$request->input('email');
        $update->phonenumber=$request->input('phonenumber');
        $update->address=$request->input('address');
        $update->save();
        return new ProductResource($update);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete=Product::findOrfail($id);
        if($delete->delete())
        {
            return new ProductResource($delete);
        }
    }
}
