<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use App\Classes\MyHttpResponse;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Inventory::api()->getAllUnit();
        return view('manage.unit.index', ['units' => $units]);
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
        try {
            $result = Inventory::api()->addUnit(request()->post());
            return MyHttpResponse::storeResponse($result->success, $result->message, 'unit.index');
        } catch (\Exception $e) {
            return MyHttpResponse::storeResponse(false, $e->getMessage(), 'unit.index');
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
        $unit = Inventory::api()->getUnit($id);
        return view('manage.unit.edit', ['unit' => $unit]);
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
            $result = Inventory::api()->updateUnit($id, request()->post());
            return MyHttpResponse::updateResponse($result->success, $result->message, 'unit.show', $id);
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'unit.show', $id);
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
            $result = Inventory::api()->deleteUnit($id);
            return MyHttpResponse::deleteResponse($result->success, $result->message, 'manage.unit.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'manage.unit.index');
        }
    }
}
