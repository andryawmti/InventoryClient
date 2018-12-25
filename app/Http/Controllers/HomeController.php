<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $params = [
            'count_of_transaction' => Inventory::api()->countOfTransaction(),
            'count_of_product' => Inventory::api()->countOfProduct(),
            'count_of_customer' => Inventory::api()->countOfCustomer(),
            'count_of_distributor' => Inventory::api()->countOfDistributor(),
        ];

        return view('dashboard.home', $params);
    }
}
