<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use App\Classes\MyHttpResponse;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Inventory::api()->getAllCustomer();
        return view('manage.customer.index', ['customers' => $customers]);
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
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
            'phone' => ['required'],
            'company_name' => ['required']
        ]);
        try {
            $result = Inventory::api()->addCustomer(request()->post());
            return MyHttpResponse::storeResponse($result->success, $result->message,'customer.index');
        } catch (\Exception $e) {
            return MyHttpResponse::storeResponse(false, $e->getMessage(), 'customer.index');
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
        $customer = Inventory::api()->getCustomer($id);
        return view('manage.customer.edit', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
            'phone' => ['required'],
            'company_name' => ['required']
        ]);
        try {
            $result = Inventory::api()->updateCustomer($id, request()->post());
            return MyHttpResponse::updateResponse($result->success, $result->message, 'customer.show', $result->customer_id);
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'customer.show', $id);
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
            $result = Inventory::api()->deleteCustomer($id);
            return MyHttpResponse::deleteResponse($result->success, $result->message, 'customer.index', $id);
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'customer.index', $id);
        }
    }
}
