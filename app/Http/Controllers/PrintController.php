<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function printTransaction()
    {
        $payload = request()->post();

        $transaction = Inventory::api()->findAllTransaction($payload);

        return $transaction;
    }
}
