<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use App\Classes\MyHttpResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Inventory::api()->getAllProduct();
        $productCategories = Inventory::api()->getAllProductCategory();
        $units = Inventory::api()->getAllUnit();
        return view('manage.product.index', [
            'products' => $products,
            'product_categories' => $productCategories,
            'units' => $units
        ]);
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
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'product_category_id' => ['required'],
            'unit_id' => ['required'],
            'name' => ['required'],
            'buy_price' => ['required'],
            'sell_price' => ['required'],
            'stock' => ['required']
        ]);
        try {
            $result = Inventory::api()->addProduct(request()->post());
            return MyHttpResponse::storeResponse($result->success, $result->message, 'product.index');
        } catch (\Exception $e) {
            return MyHttpResponse::storeResponse(false, $e->getMessage(), 'product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Inventory::api()->getProduct($id);
        $productCategories = Inventory::api()->getAllProductCategory();
        $units = Inventory::api()->getAllUnit();
        return view('manage.product.edit', [
            'product' => $product,
            'product_categories' => $productCategories,
            'units' => $units
        ]);
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'product_category_id' => ['required'],
            'unit_id' => ['required'],
            'name' => ['required'],
            'buy_price' => ['required'],
            'sell_price' => ['required'],
            'stock' => ['required']
        ]);
        try {
            $result = Inventory::api()->updateProduct($id, request()->post());
            return MyHttpResponse::updateResponse($result->success, $result->message, 'product.show', $id);
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'product.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = Inventory::api()->deleteProduct($id);
            return MyHttpResponse::deleteResponse($result->success, $result->message, 'product.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'product.index');
        }
    }
}
