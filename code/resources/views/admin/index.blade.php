@extends('layouts.admin')
@section('title')
    Dashboard - 
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6 mb-4 mb-xl-0">
                <div class="d-lg-flex align-items-center">
                    <div>
                        <h3 class="text-dark font-weight-bold mb-2">Hi, PAIJO AYOO KERJOOO!</h3>
                        <h6 class="font-weight-normal mb-2">Kurangi Teori Banyakin Tindakan...</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 flex-column d-flex stretch-card">
                <div class="row">
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card bg-primary">
                            <div class="card-body text-white">
                                <h3 class="font-weight-bold mb-3">1000 USERS</h3>
                                <div class="progress mb-3">
                                    <div class="progress-bar  bg-warning" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="pb-0 mb-0">Banyak Orang yang harus kamu lindungi!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">100 POST</h2>
                                <h4 class="card-title mb-2">GASSS POLLL</h4>
                                <small class="text-muted">Ayo Nulis dan Nulis</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-visit-statistics-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">100 Event</h2>
                                <h4 class="card-title mb-2">Ayo Bantu Event Tetangga</h4>
                                <small class="text-muted">Goo...</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 grid-margin d-flex stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-2">Sales Difference</h4>
                                    <div class="dropdown">
                                        <a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
                                        <a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-toggle="dropdown" id="settingsDropdownsales">
                                            <i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="settingsDropdownsales">
                                                <a class="dropdown-item">
                                                    <i class="mdi mdi-grease-pencil text-primary"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item">
                                                    <i class="mdi mdi-delete text-primary"></i>
                                                    Delete
                                                </a>
                                            </div>
                                    </div>
                                </div>
                                <div>
                                    <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active pl-2 pr-2" id="revenue-for-last-month-tab" data-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true">Revenue for last month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link pl-2 pr-2" id="server-loading-tab" data-toggle="tab" href="#server-loading" role="tab" aria-controls="server-loading" aria-selected="false">Server loading</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link pl-2 pr-2" id="data-managed-tab" data-toggle="tab" href="#data-managed" role="tab" aria-controls="data-managed" aria-selected="false">Data managed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link pl-2 pr-2" id="sales-by-traffic-tab" data-toggle="tab" href="#sales-by-traffic" role="tab" aria-controls="sales-by-traffic" aria-selected="false">Sales by traffic</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-no-active-fill-tab-content">
                                        <div class="tab-pane fade show active" id="revenue-for-last-month" role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
                                            <div class="d-lg-flex justify-content-between">
                                                <p class="mb-4">+5.2% vs last 7 days</p>
                                                <div id="revenuechart-legend" class="revenuechart-legend">f</div>
                                            </div>
                                            <canvas id="revenue-for-last-month-chart"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="server-loading" role="tabpanel" aria-labelledby="server-loading-tab">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-4">+5.2% vs last 7 days</p>
                                                <div id="serveLoading-legend" class="revenuechart-legend">f</div>
                                            </div>
                                            <canvas id="serveLoading"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="data-managed" role="tabpanel" aria-labelledby="data-managed-tab">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-4">+5.2% vs last 7 days</p>
                                                <div id="dataManaged-legend" class="revenuechart-legend">f</div>
                                            </div>
                                            <canvas id="dataManaged"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="sales-by-traffic" role="tabpanel" aria-labelledby="sales-by-traffic-tab">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-4">+5.2% vs last 7 days</p>
                                                <div id="salesTrafic-legend" class="revenuechart-legend">f</div>
                                            </div>
                                            <canvas id="salesTrafic"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 flex-column d-flex stretch-card">
                <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h3 class="font-weight-bold text-dark">Canada,Ontario</h3>
                                        <p class="text-dark">Monday 3.00 PM</p>
                                        <div class="d-lg-flex align-items-baseline mb-3">
                                            <h1 class="text-dark font-weight-bold">23<sup class="font-weight-light"><small>o</small><small class="font-weight-medium">c</small></sup></h1>
                                            <p class="text-muted ml-3">Partly cloudy</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="position-relative">
                                            <img src="images/dashboard/live.png" class="w-100" alt="">
                                            <div class="live-info badge badge-success">Live</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mt-4 mt-lg-0">
                                        <div class="bg-primary text-white px-4 py-4 card">
                                            <div class="row">
                                                <div class="col-sm-6 pl-lg-5">
                                                    <h2>$1635</h2>
                                                    <p class="mb-0">Your Iincome</p>
                                                </div>
                                                <div class="col-sm-6 climate-info-border mt-lg-0 mt-2">
                                                    <h2>$2650</h2>
                                                    <p class="mb-0">Your Spending</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3 mt-md-1">
                                    <div class="col">
                                        <div class="d-flex purchase-detail-legend align-items-center">
                                            <div id="circleProgress1" class="p-2"></div>
                                            <div>
                                                <p class="font-weight-medium text-dark text-small">Sessions</p>
                                                <h3 class="font-weight-bold text-dark  mb-0">26.80%</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex purchase-detail-legend align-items-center">
                                            <div id="circleProgress2" class="p-2"></div>
                                            <div>
                                                <p class="font-weight-medium text-dark text-small">Users</p>
                                                <h3 class="font-weight-bold text-dark  mb-0">56.80%</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-0">Visits Today</h4>
                                            <div class="dropdown">
                                                <a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
                                                <a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-toggle="dropdown" id="profileDropdownvisittoday"><i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdownvisittoday">
                                                    <a class="dropdown-item">
                                                        <i class="mdi mdi-grease-pencil text-primary"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <i class="mdi mdi-delete text-primary"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-1">Calculated in last 30 days</p>
                                        <div class="d-lg-flex align-items-center justify-content-between">
                                            <h1 class="font-weight-bold text-dark">4332</h1>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-outline-light text-dark font-weight-normal">Day</button>
                                                <button type="button" class="btn btn-outline-light text-dark font-weight-normal">Month</button>
                                            </div>
                                        </div>
                                        <canvas id="visitorsToday"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection