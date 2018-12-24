<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use App\Classes\MyHttpResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allSelling()
    {
        $transactions = Inventory::api()->findAllTransaction([
            'transaction_category_id' => 1
        ]);
        $products = Inventory::api()->getAllProduct();
        $customers = Inventory::api()->getAllCustomer();
        return view('transaction.index', [
            'transactions' => $transactions,
            'products' => $products,
            'customers' => $customers
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allBuying()
    {
        $transactions = Inventory::api()->findAllTransaction([
            'transaction_category_id' => 2
        ]);
        $products = Inventory::api()->getAllProduct();
        $distributors = Inventory::api()->getAllDistributor();
        return view('transaction.index_buying', [
            'transactions' => $transactions,
            'products' => $products,
            'distributors' => $distributors
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
     * @return array
     */
    public function store()
    {
        try {
            $result = Inventory::api()->addTransaction(request()->post());
            return (array)$result;
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
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
        $transaction = Inventory::api()->getTransaction($id);
        return view('transaction.edit', ['transaction' => $transaction]);
    }

    public function showBuying($id)
    {
        $transaction = Inventory::api()->getTransaction($id);
        return view('transaction.edit_buying', ['transaction' => $transaction]);
    }

    public function showSelling($id)
    {
        $transaction = Inventory::api()->getTransaction($id);
        return view('transaction.edit', ['transaction' => $transaction]);
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
    public function destroySelling($id)
    {
        try {
            $result = Inventory::api()->deleteTransaction($id);
            return MyHttpResponse::deleteResponse($result->success, $result->message, 'transaction.selling.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'transaction.selling.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBuying($id)
    {
        try {
            $result = Inventory::api()->deleteTransaction($id);
            return MyHttpResponse::deleteResponse($result->success, $result->message, 'transaction.buying.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'transaction.buying.index');
        }
    }
}
