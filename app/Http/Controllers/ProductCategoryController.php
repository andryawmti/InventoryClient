<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use App\Classes\MyHttpResponse;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = Inventory::api()->getAllProductCategory();
        return view('manage.product_category.index', ['product_categories' => $productCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
        try {
            $result = Inventory::api()->addProductCategory(request()->post());
            return MyHttpResponse::storeResponse($result->success, $result->message, 'product-category.index');
        } catch (\Exception $e) {

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
        $productCategory = Inventory::api()->getProductCategory($id);
        return view('manage.product_category.edit', ['product_category' => $productCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return void
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
        try {
            $result = Inventory::api()->updateProductCategory($id, request()->post());
            return MyHttpResponse::updateResponse($result->success, $result->message, 'product-category.show', $id);
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'product-category.show', $id);
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
            $result = Inventory::api()->deleteProductCategory($id);
            return MyHttpResponse::deleteResponse($result->success, $result->message, 'product-category.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'product-category.index');
        }
    }
}
