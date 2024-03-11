<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public $products = [
        ['id' => 1, 'name' => 'Iphone', 'model' => 'Apple', 'price' => '10.00'],
        ['id' => 2, 'name' => 'AirTag', 'model' => 'Apple', 'price' => '5.00']
    ];

    public $msg = '';


    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('products', ['title' => 'Product List', 'products' => $this->products, 'msg' => $this->msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createProduct', ['title' => 'Add Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        dd($request->request);
        //return '<h1>Store method</h1>';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
