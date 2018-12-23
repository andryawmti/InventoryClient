<?php

namespace App\Http\Controllers;

use App\Classes\Inventory;
use App\Exports\DetailTransactionExport;
use App\Exports\TransactionExport;
use Facades\Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function printTransaction()
    {
        $payload = request()->post();
        $transactions = Inventory::api()->findAllTransaction($payload);

        switch($payload['print_type']) {
            case 'pdf':
                $pdf = PDF::loadView('transaction.exports.transaction_pdf', [
                    'transactions' => $transactions,
                    'transaction_category_id' => $payload['transaction_category_id']
                ]);
                return $pdf->download('transaction.pdf');
            case 'spreadsheet':
                return Excel::download(new TransactionExport([
                    'transactions' => $transactions,
                    'transaction_category_id' => $payload['transaction_category_id']
                ]), 'transaction.xlsx');
                break;
        }
    }

    public function printDetailTransaction()
    {
        $payload = request()->post();
        $transaction = Inventory::api()->getTransaction($payload['id']);
        switch($payload['print_type']) {
            case 'pdf':
                $pdf = PDF::loadView('transaction.exports.detail_transaction_pdf', [
                    'transaction' => $transaction,
                ]);
                return $pdf->download("detail_transaction_$transaction->id.pdf");
            case 'spreadsheet':
                return Excel::download(new DetailTransactionExport([
                    'transaction' => $transaction,
                ]), "detail_transaction_$transaction->id.xlsx");
                break;
        }
    }

    public function printPreview()
    {
        $transactions = Inventory::api()->findAllTransaction([
            'transaction_category_id' => 1
        ]);

        $pdf = PDF::loadView('transaction.exports.transaction_pdf', [
            'transactions' => $transactions,
            'transaction_category_id' => 1
        ]);
        return $pdf->stream('transaction.pdf');
    }

    public function printPreviewDetailTransaction($id)
    {
        $transaction = Inventory::api()->getTransaction($id);
        $pdf = PDF::loadView('transaction.exports.detail_transaction_pdf', [
            'transaction' => $transaction
        ]);

        return $pdf->stream('detail_transaction.pdf');
    }
}
