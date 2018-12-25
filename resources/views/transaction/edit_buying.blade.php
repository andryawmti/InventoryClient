@extends('layouts.appv2')

@section('page_title')
    Transaction
@endsection

@section('page_css')
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- Datatables-->
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css')}}">
@endsection

@section('main_content')
    <div id="selling-wrapper">
        <!-- Page content-->
        <div class="content-wrapper">
            <div class="content-heading">
                <div>
                    View Transaction
                    <ol class="breadcrumb breadcrumb px-0 pb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('transaction.buying.index') }}">Buying Transaction</a>
                        </li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <!-- DATATABLE DEMO 1-->
                <div class="card card-default">
                    <div class="card-header">
                        {{--<div class="col-md-12">
                            Add New Transaction
                        </div>--}}
                        <div class="mar_top1"></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#print-dialog"><em class="fa fa-print"></em></button>
                            </div>
                        </div>
                        <div class="mar_top1"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Distributor : {{ $transaction->distributor_name }}</h5>
                            </div>
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-3 text-right">Date: {{ date('d M Y', strtotime($transaction->created_at)) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="45%">Product</th>
                                        <th width="15%">Price</th>
                                        <th width="10%">Quantity</th>
                                        <th width="15%">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transaction->transaction_items as $x => $item)
                                        <tr>
                                            <td>{{ $x+1 }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <th><b>{{ number_format($item->price * $item->quantity, 2) }}</b></th>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">Sub Total</td>
                                        <td colspan="1"><b>{{ number_format($transaction->sub_total, 2) }}</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Delivery Cost</td>
                                        <td colspan="1"><b>{{ number_format($transaction->delivery_cost, 2) }}</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Grand Total</td>
                                        <td colspan="1"><b>{{ number_format($transaction->total, 2) }}</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.form_validation_notif')
        </div>
    </div>
@endsection

@section('page_js')

    {{--Modal for Print Dialog--}}
    <div class="modal fade" id="print-dialog" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('print.transaction.detail') }}" method="post" id="print-form" class="form-horizontal" role="form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $transaction->id }}">
                    <div class="modal-header">
                        <h4 class="modal-title">Print Detail Transaction</h4>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label for="print-type" class="col-md-2">Print As</label>
                            <div class="col-md-10">
                                <select name="print_type" id="print-type" class="form-control">
                                    <option value="spreadsheet">Spreadsheet</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Print <em class="icon icon-printer"></em></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- Datatables-->
    <script src="{{asset('angleadmin/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-buttons/js/dataTables.buttons.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-buttons/js/buttons.colVis.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-buttons/js/buttons.flash.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-buttons/js/buttons.html5.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-buttons/js/buttons.print.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-keytable/js/dataTables.keyTable.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    @include('includes.datatable_script')
@endsection