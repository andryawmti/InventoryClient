<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use App\Classes\MyHttpResponse;
use Illuminate\Http\Request;

class DistributorController extends Controller
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
        $distributors = Inventory::api()->getAllDistributor();
        return view('manage.distributor.index', ['distributors' => $distributors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try {
            $result = Inventory::api()->addDistributor(request()->post());
            return MyHttpResponse::storeResponse($result->success, $result->message, 'distributor.index');
        } catch (\Exception $e) {
            return MyHttpResponse::storeResponse(false, $e->getMessage(), 'distributor.index');
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
        $distributor = Inventory::api()->getDistributor($id);
        return view('manage.distributor.edit', ['distributor' => $distributor]);
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
        try {
            $result = Inventory::api()->updateDistributor($id, request()->post());
            return MyHttpResponse::updateResponse($result->success, $result->message, 'distributor.show', $id);
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'distributor.show', $id);
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
            $result = Inventory::api()->deleteDistributor($id);
            return MyHttpResponse::deleteResponse($result->success, $result->message, 'distributor.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'distributor.index');
        }
    }
}
