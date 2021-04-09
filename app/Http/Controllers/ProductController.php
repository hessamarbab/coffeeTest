<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResourceCollection;
use App\Option;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data= Product::with('option.choices')->paginate(15);
        $response =new ProductResourceCollection($data);
        return $request->wantsJson()
            ?  $response
            :view("product.index")->withProducts($response);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO admin authrize
        $options=Option::all();
        return view("product.create_edit")->withOptions($options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO admin authrize
        $data = $request->only('name','cost','option_id');
        $product= Product::create($data);
        return $request->wantsJson()
        ?  $product
        :redirect("/api/products");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //TODO admin authrize
        $product=Product::findOrFail($id);

        $options=Option::all();
        return view("product.create_edit")
            ->withOptions($options)
            ->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //TODO admin authrize
        $data = $request->only('name','cost','option_id');
        $product->update($data);
        return $request->wantsJson()
            ?  $product
            :redirect("/api/products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $product)
    {
        //TODO admin authrize
        $product->delete();
        return $request->wantsJson()
            ?  response(null,204)
            :redirect("/api/products");
    }
}
