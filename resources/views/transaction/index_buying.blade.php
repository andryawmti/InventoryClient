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
    <div id="buying-wrapper">
        <!-- Page content-->
        <div class="content-wrapper">
            <div class="content-heading">
                <div>Manage Buying Transaction</div>
            </div>
            <div class="container-fluid">
                <!-- DATATABLE DEMO 1-->
                <div class="card card-default" role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active show" href="#transaction" aria-controls="home" role="tab" data-toggle="tab" aria-selected="true">
                                <em class="fa fa-user fa-fw"></em>Transaction</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="#add-new" aria-controls="profile" role="tab" data-toggle="tab" aria-selected="false">
                                <em class="fa fa-plus-circle fa-fw"></em>Add New</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="transaction" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">&nbsp;</div>
                                <div class="col-md-4">&nbsp;</div>
                                <div class="col-md-4 text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#print-dialog"><em class="fa fa-print"></em></button>
                                </div>
                            </div>
                            <div class="mar_top1"></div>
                            <table class="table table-striped my-4 w-100 data-table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Distributor</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $t)
                                    <tr class="gradeX">
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->transaction_category }}</td>
                                        <td>{{ $t->distributor_name }}</td>
                                        <td>{{ $t->total }}</td>
                                        <td>{{ $t->status }}</td>
                                        <td>{{ date('d-M-Y', strtotime($t->created_at)) }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a class="btn btn-xs btn-info" href="{{route('transaction.show.buying', ['id' => $t->id])}}"><em class="fa fa-eye"></em></a>
                                                </div>
                                                <div class="col-md-1">
                                                    <form id="delete_{{$t->id}}" method="post" action="{{route('transaction.destroy.buying',['id' => $t->id])}}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" onclick="deleteItem(this.id)" class="btn btn-xs btn-info" id="{{$t->id}}"><em class="fa fa-trash"></em></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="add-new" role="tabpanel">
                            <div class="card-header">
                                {{--<div class="col-md-12">
                                    Add New Transaction
                                </div>--}}
                                <div class="mar_top1"></div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-3">
                                    <h5>Distributor : @{{ distributor.name }} <button @click="showHidePickDistributor()" class="btn btn-xs btn-info"><em class="fa fa-pencil"></em></button></h5>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="45%">Product</th>
                                            <th width="15%">Price</th>
                                            <th width="10%">Quantity</th>
                                            <th width="15%">Total</th>
                                            <th width="10%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(ti, x) in transaction_items">
                                            <td>@{{ x+1 }}</td>
                                            <td>@{{ ti.product_name }}</td>
                                            <td>@{{ ti.price }}</td>
                                            <td>@{{ ti.quantity }}</td>
                                            <th>@{{ ti.price * ti.quantity }}</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p>@{{ item.product_name }} <button @click="showHidePickProduct()" class="btn btn-xs btn-info"><em class="fa fa-pencil"></em></button></p>
                                            </td>
                                            <td>
                                                <p>@{{ item.price }}</p>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" v-model="item.quantity">
                                            </td>
                                            <td>@{{ item.price * item.quantity }}</td>
                                            <td><button @click="addItem()" type="button" class="btn btn-sm btn-info">Add</button></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Sub Total</td>
                                            <td colspan="2">@{{ sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Delivery Cost</td>
                                            <td colspan="2"><input type="text" class="form-control" @change="calculateGrandTotal()" v-model="delivery_cost"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Grand Total</td>
                                            <td colspan="2">@{{ grand_total }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mar_top1"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button @click="saveTransaction()" type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.form_validation_notif')
        </div>
        <div id="pick-distributor" class="my-popup" v-bind:class="{'my-popup-hide':!show_distributor_popup, 'my-popup-show':show_distributor_popup}">
            <div class="col-md-12">
                <h4>Choose Distributor <a class="btn btn-xs pull-right" @click="showHidePickDistributor()"><em class="fa fa-remove"></em></a></h4>
            </div>
            <table class="table table-bordered table-striped data-table-popup">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Company</th>
                </tr>
                </thead>
                <tbody>
                @foreach($distributors as $d)
                    <tr>
                        <td><a href="javascript:void(0)">{{ $d->id }}</a></td>
                        <td><a href="javascript:void(0)" @click="pickDistributor('{{ $d->id }}', '{{ $d->first_name . " " . $d->last_name }}')">{{ $d->first_name . " " . $d->last_name }}</a></td>
                        <td><a href="javascript:void(0)">{{ $d->company_name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="pick-product" class="my-popup" v-bind:class="{'my-popup-hide':!show_product_popup, 'my-popup-show':show_product_popup}">
            <div class="col-md-12">
                <h4>Choose Product <a class="btn btn-xs pull-right" @click="showHidePickProduct()"><em class="fa fa-remove"></em></a></h4>
            </div>
            <table class="table table-bordered table-striped data-table-popup">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Sell Price</th>
                    <th>Buy Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td><a href="javascript:void(0)">{{ $p->id }}</a></td>
                        <td><a href="javascript:void(0)" @click="pickProduct('{{ json_encode($p) }}')">{{ $p->name }}</a></td>
                        <td>{{ $p->product_category }}</td>
                        <td>{{ $p->stock }}</td>
                        <td>{{ $p->sell_price }}</td>
                        <td>{{ $p->buy_price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('page_js')

    {{--Modal for Print Dialog--}}
    <div class="modal fade" id="print-dialog" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('print.transaction') }}" method="post" id="print-form" class="form-horizontal" role="form">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Print Transaction</h4>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <style>
                            input[type=date] {
                                display: inline-block;
                                width: 45%;
                            }
                        </style>
                        <div class="row">
                            <label class="col-md-2">Date Range</label>
                            <div class="col-md-10">
                                <input type="date" id="date-start" class="form-control inline-block" name="date_start">
                                <label style="width: 8%; text-align: center">To</label>
                                <input type="date" id="date-end" class="form-control inline-block" name="date_end">
                                <input type="hidden" id="transaction-category-id" name="transaction_category_id" value="2">
                            </div>
                        </div>

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
    <script>
        $(function () {
            $('.data-table-popup').DataTable({
                lengthMenu: [5]
            });
        });
    </script>
    @include('includes.datatable_script')
    @include('transaction.scripts.buying')
@endsection