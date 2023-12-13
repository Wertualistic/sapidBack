@extends('layouts.site')
@section('content')
    <section class="section">
        <div class="row ">
            <a class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12" href="{{ route('products.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">@lang('words.Product')</h5>
                                        <h2 class="mb-3 font-18">{{ count($products) }}</h2>
                                        <p class="mb-0"><span class="col-green">10%</span> @lang('words.Increase')</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12" href="{{ route('orders.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15"> @lang('words.Orders')</h5>
                                        <h2 class="mb-3 font-18">{{ count($orders) }}</h2>
                                        <p class="mb-0"><span class="col-orange">12%</span> @lang('words.Decrease')</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12" href="{{ route('completedOrders.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">@lang('words.CompletedOrders')</h5>
                                        <h2 class="mb-3 font-18">{{ count($completedOrders) }}</h2>
                                        <p class="mb-0"><span class="col-green">7%</span> @lang('words.Increase')</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Revenue chart</h4>
                        <div class="card-header-action">
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                    <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item has-icon text-danger"><i
                                            class="far fa-trash-alt"></i>
                                        Delete</a>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <div id="chart1" style="min-height: 244px;">
                                    <div id="apexchartstrxzrxjp" class="apexcharts-canvas apexchartstrxzrxjp">

                                        <div class="apexcharts-tooltip light" style="left: 247.172px; top: 39.5px;">
                                            <div class="apexcharts-tooltip-title"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                May</div>
                                            <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(120, 107, 237);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-label">High -
                                                            2019: </span><span
                                                            class="apexcharts-tooltip-text-value">32</span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(153, 155, 156);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-label">Low -
                                                            2019: </span><span
                                                            class="apexcharts-tooltip-text-value">25</span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom"
                                            style="left: 364.323px; top: 189.348px;">
                                            <div class="apexcharts-xaxistooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 26.4531px;">
                                                May</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">
                                            <div class="list-inline-item p-r-30"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-arrow-up-circle col-green">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="16 12 12 8 8 12"></polyline>
                                                    <line x1="12" y1="16" x2="12" y2="8">
                                                    </line>
                                                </svg>
                                                <h5 class="m-b-0">$675</h5>
                                                <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">
                                            <div class="list-inline-item p-r-30"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-arrow-down-circle col-orange">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="8 12 12 16 16 12"></polyline>
                                                    <line x1="12" y1="8" x2="12" y2="16">
                                                    </line>
                                                </svg>
                                                <h5 class="m-b-0">$1,587</h5>
                                                <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">
                                            <div class="list-inline-item p-r-30"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-arrow-up-circle col-green">
                                                    <circle cx="12" cy="12" r="10">
                                                    </circle>
                                                    <polyline points="16 12 12 8 8 12"></polyline>
                                                    <line x1="12" y1="16" x2="12" y2="8">
                                                    </line>
                                                </svg>
                                                <h5 class="mb-0 m-b-0">$45,965</h5>
                                                <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 511px; height: 339px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row mt-5">
                                    <div class="col-7 col-xl-7 mb-3">Total customers</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">8,257</span>
                                        <sup class="col-green">+09%</sup>
                                    </div>
                                    <div class="col-7 col-xl-7 mb-3">Total Income</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">$9,857</span>
                                        <sup class="text-danger">-18%</sup>
                                    </div>
                                    <div class="col-7 col-xl-7 mb-3">Project completed</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">28</span>
                                        <sup class="col-green">+16%</sup>
                                    </div>
                                    <div class="col-7 col-xl-7 mb-3">Total expense</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">$6,287</span>
                                        <sup class="col-green">+09%</sup>
                                    </div>
                                    <div class="col-7 col-xl-7 mb-3">New Customers</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">684</span>
                                        <sup class="col-green">+22%</sup>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
