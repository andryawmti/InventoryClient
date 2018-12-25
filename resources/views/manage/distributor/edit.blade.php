@extends('layouts.appv2')

@section('page_title')
    Distributor
@endsection

@section('page_css')
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- Datatables-->
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css')}}">
@endsection

@section('main_content')
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div>
                Manage Customer
                <ol class="breadcrumb breadcrumb px-0 pb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('distributor.index') }}">distributor</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <!-- DATATABLE DEMO 1-->
            <div class="card card-default" role="tabpanel">
                <div class="card-header"><h4>Edit Distributor</h4></div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{route('distributor.update', ['id' => $distributor->id])}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">First Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $distributor->first_name }}" name="first_name" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Last Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $distributor->last_name }}" name="last_name" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" value="{{ $distributor->email }}" name="email" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Address</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="address" required>{{ $distributor->address }}</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">City</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $distributor->city }}" name="city" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Postal Code</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $distributor->postal_code }}" name="postal_code" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Phone</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $distributor->phone }}" name="phone" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Company Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $distributor->company_name }}" name="company_name" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        @include('includes.form_validation_notif')
    </div>
@endsection

@section('page_js')
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
@endsection