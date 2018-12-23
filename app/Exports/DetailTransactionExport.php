<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DetailTransactionExport implements FromView
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        return view('transaction.exports.detail_transaction_excel', $this->params);
    }
}
