@extends('layouts.appv2')

@section('page_title')
    Home
@endsection

@section('page_css')
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/weather-icons/css/weather-icons.css')}}">
@endsection

@section('main_content')
    <div class="content-wrapper">
        <div class="content-heading">
            <div>Dashboard
                <small data-localize="dashboard.WELCOME"></small>
            </div>
        </div>
        <!-- START cards box-->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- START card-->
                <div class="card flex-row align-items-center align-items-stretch border-0">
                    <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
                        <em class="icon-chart fa-3x"></em>
                    </div>
                    <div class="col-8 py-3 bg-primary rounded-right">
                        <div class="h2 mt-0">{{ $count_of_transaction }}</div>
                        <div class="text-uppercase">Transactions</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- START card-->
                <div class="card flex-row align-items-center align-items-stretch border-0">
                    <div class="col-4 d-flex align-items-center bg-purple-dark justify-content-center rounded-left">
                        <em class="icon-pie-chart fa-3x"></em>
                    </div>
                    <div class="col-8 py-3 bg-purple rounded-right">
                        <div class="h2 mt-0">{{ $count_of_product }}</div>
                        <div class="text-uppercase">Products</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <!-- START card-->
                <div class="card flex-row align-items-center align-items-stretch border-0">
                    <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left">
                        <em class="icon-people fa-3x"></em>
                    </div>
                    <div class="col-8 py-3 bg-green rounded-right">
                        <div class="h2 mt-0">{{ $count_of_customer }}</div>
                        <div class="text-uppercase">Customers</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <!-- START card-->
                <div class="card flex-row align-items-center align-items-stretch border-0">
                    <div class="col-4 d-flex align-items-center bg-info-dark justify-content-center rounded-left">
                        <em class="icon-people fa-3x"></em>
                    </div>
                    <div class="col-8 py-3 bg-info rounded-right">
                        <div class="h2 mt-0">{{ $count_of_distributor }}</div>
                        <div class="text-uppercase">Distributors</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- START card-->
                <div class="card card-default card-demo" id="cardChart9">
                    <div class="card-header">
                        <div class="card-title">Selling Statistic</div>
                    </div>
                    <div class="card-wrapper collapse show">
                        <div class="card-body">
                            <canvas id="selling-chart">

                            </canvas>
                        </div>
                    </div>
                </div>
                <!-- END card-->
            </div>
            <div class="col-md-6">
                <!-- START card-->
                <div class="card card-default card-demo" id="cardChart9">
                    <div class="card-header">
                        <div class="card-title">Buying Statistic</div>
                    </div>
                    <div class="card-wrapper collapse show">
                        <div class="card-body">
                            <canvas id="buying-chart">

                            </canvas>
                        </div>
                    </div>
                </div>
                <!-- END card-->
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- SLIMSCROLL-->
    <script src="{{asset('angleadmin/vendor/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- SPARKLINE-->
    <script src="{{asset('angleadmin/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <!-- FLOT CHART-->
    {{--<script src="{{asset('angleadmin/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('angleadmin/vendor/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('angledamin/vendor/jquery.flot.spline/jquery.flot.spline.html')}}"></script>
    <!-- EASY PIE CHART-->
    <script src="{{asset('angleadmin/vendor/easy-pie-chart/dist/jquery.easypiechart.js')}}"></script>
    <!-- MOMENT JS-->
    <script src="{{asset('angleadmin/vendor/moment/min/moment-with-locales.js')}}"></script>--}}
    @include('transaction.scripts.statistic')
@endsection