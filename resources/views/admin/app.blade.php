@extends('admin.layout.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row g-6">
    <!-- Website Analytics -->
    <div class="col-xl-6 col">
      <div
        class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
        id="swiper-with-pagination-cards">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="row">
              <div class="col-12">
                <h5 class="text-white mb-0">Website Analytics</h5>
                <small>Total 28.5% Conversion Rate</small>
              </div>
              <div class="row">
                <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
                  <h6 class="text-white mt-0 mt-md-3 mb-4">Traffic</h6>
                  <div class="row">
                    <div class="col-6">
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-4 align-items-center">
                          <p class="mb-0 fw-medium me-2 website-analytics-text-bg">28%</p>
                          <p class="mb-0">Sessions</p>
                        </li>
                        <li class="d-flex align-items-center">
                          <p class="mb-0 fw-medium me-2 website-analytics-text-bg">1.2k</p>
                          <p class="mb-0">Leads</p>
                        </li>
                      </ul>
                    </div>
                    <div class="col-6">
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-4 align-items-center">
                          <p class="mb-0 fw-medium me-2 website-analytics-text-bg">3.1k</p>
                          <p class="mb-0">Page Views</p>
                        </li>
                        <li class="d-flex align-items-center">
                          <p class="mb-0 fw-medium me-2 website-analytics-text-bg">12%</p>
                          <p class="mb-0">Conversions</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                  <img
                    src="{{ asset('admin/assets/') }}/img/illustrations/card-website-analytics-1.png"
                    alt="Website Analytics"
                    height="150"
                    class="card-website-analytics-img" />
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="row">
              <div class="col-12">
                <h5 class="text-white mb-0">Website Analytics</h5>
                <small>Total 28.5% Conversion Rate</small>
              </div>
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
                <h6 class="text-white mt-0 mt-md-3 mb-4">Spending</h6>
                <div class="row">
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">12h</p>
                        <p class="mb-0">Spend</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">127</p>
                        <p class="mb-0">Order</p>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">18</p>
                        <p class="mb-0">Order Size</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">2.3k</p>
                        <p class="mb-0">Items</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                <img
                  src="{{ asset('admin/assets/') }}/img/illustrations/card-website-analytics-2.png"
                  alt="Website Analytics"
                  height="150"
                  class="card-website-analytics-img" />
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="row">
              <div class="col-12">
                <h5 class="text-white mb-0">Website Analytics</h5>
                <small>Total 28.5% Conversion Rate</small>
              </div>
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
                <h6 class="text-white mt-0 mt-md-3 mb-4">Revenue Sources</h6>
                <div class="row">
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">268</p>
                        <p class="mb-0">Direct</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">62</p>
                        <p class="mb-0">Referral</p>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">890</p>
                        <p class="mb-0">Organic</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">1.2k</p>
                        <p class="mb-0">Campaign</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                <img
                  src="{{ asset('admin/assets/') }}/img/illustrations/card-website-analytics-3.png"
                  alt="Website Analytics"
                  height="150"
                  class="card-website-analytics-img" />
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <!--/ Website Analytics -->

    <!-- Average Daily Sales -->
    <div class="col-xl-3 col-sm-6">
      <div class="card h-100">
        <div class="card-header pb-0">
          <h5 class="mb-3 card-title">Average Daily Sales</h5>
          <p class="mb-0 text-body">Total Sales This Month</p>
          <h4 class="mb-0">$28,450</h4>
        </div>
        <div class="card-body px-0">
          <div id="averageDailySales"></div>
        </div>
      </div>
    </div>
    <!--/ Average Daily Sales -->

    <!-- Sales Overview -->
    <div class="col-xl-3 col-sm-6">
      <div class="card h-100">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <p class="mb-0 text-body">Sales Overview</p>
            <p class="card-text fw-medium text-success">+18.2%</p>
          </div>
          <h4 class="card-title mb-1">$42.5k</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <div class="d-flex gap-2 align-items-center mb-2">
                <span class="badge bg-label-info p-1 rounded"><i class="icon-base ti tabler-shopping-cart icon-sm"></i></span>
                <p class="mb-0">Order</p>
              </div>
              <h5 class="mb-0 pt-1">62.2%</h5>
              <small class="text-body-secondary">6,440</small>
            </div>
            <div class="col-4">
              <div class="divider divider-vertical">
                <div class="divider-text">
                  <span class="badge-divider-bg bg-label-secondary">VS</span>
                </div>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                <p class="mb-0">Visits</p>
                <span class="badge bg-label-primary p-1 rounded"><i class="icon-base ti tabler-link icon-sm"></i></span>
              </div>
              <h5 class="mb-0 pt-1">25.5%</h5>
              <small class="text-body-secondary">12,749</small>
            </div>
          </div>
          <div class="d-flex align-items-center mt-6">
            <div class="progress w-100" style="height: 10px;">
              <div
                class="progress-bar bg-info"
                style="width: 70%"
                role="progressbar"
                aria-valuenow="70"
                aria-valuemin="0"
                aria-valuemax="100"></div>
              <div
                class="progress-bar bg-primary"
                role="progressbar"
                style="width: 30%"
                aria-valuenow="30"
                aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Sales Overview -->

    <!-- Earning Reports -->
    <div class="col-md-6">
      <div class="card h-100">
        <div class="card-header pb-0 d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-1">Earning Reports</h5>
            <p class="card-subtitle">Weekly Earnings Overview</p>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
              type="button"
              id="earningReportsId"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
              <a class="dropdown-item" href="javascript:void(0);">View More</a>
              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row align-items-center g-md-8">
            <div class="col-12 col-md-5 d-flex flex-column">
              <div class="d-flex gap-2 align-items-center mb-3 flex-wrap">
                <h2 class="mb-0">$468</h2>
                <div class="badge rounded bg-label-success">+4.2%</div>
              </div>
              <small class="text-body">You informed of this week compared to last week</small>
            </div>
            <div class="col-12 col-md-7 ps-xl-8">
              <div id="weeklyEarningReports"></div>
            </div>
          </div>
          <div class="border rounded p-5 mt-5">
            <div class="row gap-4 gap-sm-0">
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-primary p-1">
                    <i class="icon-base ti tabler-currency-dollar icon-18px"></i>
                  </div>
                  <h6 class="mb-0 fw-normal">Earnings</h6>
                </div>
                <h4 class="my-2">$545.69</h4>
                <div class="progress w-75" style="height:4px">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    style="width: 65%"
                    aria-valuenow="65"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-info p-1">
                    <i class="icon-base ti tabler-chart-pie-2 icon-18px"></i>
                  </div>
                  <h6 class="mb-0 fw-normal">Profit</h6>
                </div>
                <h4 class="my-2">$256.34</h4>
                <div class="progress w-75" style="height:4px">
                  <div
                    class="progress-bar bg-info"
                    role="progressbar"
                    style="width: 50%"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-danger p-1">
                    <i class="icon-base ti tabler-brand-paypal icon-18px"></i>
                  </div>
                  <h6 class="mb-0 fw-normal">Expense</h6>
                </div>
                <h4 class="my-2">$74.19</h4>
                <div class="progress w-75" style="height:4px">
                  <div
                    class="progress-bar bg-danger"
                    role="progressbar"
                    style="width: 65%"
                    aria-valuenow="65"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Earning Reports -->

    <!-- Support Tracker -->
    <div class="col-12 col-md-6">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-1">Support Tracker</h5>
            <p class="card-subtitle">Last 7 Days</p>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
              type="button"
              id="supportTrackerMenu"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
              <a class="dropdown-item" href="javascript:void(0);">View More</a>
              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
          </div>
        </div>
        <div class="card-body row">
          <div class="col-12 col-sm-4">
            <div class="mt-lg-4 mt-lg-2 mb-lg-6 mb-2">
              <h2 class="mb-0">164</h2>
              <p class="mb-0">Total Tickets</p>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex gap-4 align-items-center mb-lg-3 pb-1">
                <div class="badge rounded bg-label-primary p-1_5">
                  <i class="icon-base ti tabler-ticket icon-md"></i>
                </div>
                <div>
                  <h6 class="mb-0 text-nowrap">New Tickets</h6>
                  <small class="text-body-secondary">142</small>
                </div>
              </li>
              <li class="d-flex gap-4 align-items-center mb-lg-3 pb-1">
                <div class="badge rounded bg-label-info p-1_5">
                  <i class="icon-base ti tabler-circle-check icon-md"></i>
                </div>
                <div>
                  <h6 class="mb-0 text-nowrap">Open Tickets</h6>
                  <small class="text-body-secondary">28</small>
                </div>
              </li>
              <li class="d-flex gap-4 align-items-center pb-1">
                <div class="badge rounded bg-label-warning p-1_5">
                  <i class="icon-base ti tabler-clock icon-md"></i>
                </div>
                <div>
                  <h6 class="mb-0 text-nowrap">Response Time</h6>
                  <small class="text-body-secondary">1 Day</small>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-12 col-md-8">
            <div id="supportTracker"></div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Support Tracker -->

    <!-- Sales By Country -->
    <div class="col-xxl-4 col-md-6 order-1 order-xl-0">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-1">Sales by Countries</h5>
            <p class="card-subtitle">Monthly Sales Overview</p>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-text-secondary btn-icon rounded-pill text-body-secondary border-0 me-n1"
              type="button"
              id="salesByCountry"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-22px text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountry">
              <a class="dropdown-item" href="javascript:void(0);">Download</a>
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <li class="d-flex align-items-center mb-4">
              <div class="avatar flex-shrink-0 me-4">
                <i class="fis fi fi-us rounded-circle fs-2"></i>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-1">$8,567k</h6>
                  </div>
                  <small class="text-body">United states</small>
                </div>
                <div class="user-progress">
                  <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                    <i class="icon-base ti tabler-chevron-up"></i>
                    25.8%
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex align-items-center mb-4">
              <div class="avatar flex-shrink-0 me-4">
                <i class="fis fi fi-br rounded-circle fs-2"></i>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-1">$2,415k</h6>
                  </div>
                  <small class="text-body">Brazil</small>
                </div>
                <div class="user-progress">
                  <p class="text-danger fw-medium mb-0 d-flex align-items-center gap-1">
                    <i class="icon-base ti tabler-chevron-down"></i>
                    6.2%
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex align-items-center mb-4">
              <div class="avatar flex-shrink-0 me-4">
                <i class="fis fi fi-in rounded-circle fs-2"></i>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-1">$865k</h6>
                  </div>
                  <small class="text-body">India</small>
                </div>
                <div class="user-progress">
                  <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                    <i class="icon-base ti tabler-chevron-up"></i>
                    12.4%
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex align-items-center mb-4">
              <div class="avatar flex-shrink-0 me-4">
                <i class="fis fi fi-au rounded-circle fs-2"></i>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-1">$745k</h6>
                  </div>
                  <small class="text-body">Australia</small>
                </div>
                <div class="user-progress">
                  <p class="text-danger fw-medium mb-0 d-flex align-items-center gap-1">
                    <i class="icon-base ti tabler-chevron-down"></i>
                    11.9%
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex align-items-center mb-4">
              <div class="avatar flex-shrink-0 me-4">
                <i class="fis fi fi-fr rounded-circle fs-2"></i>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-1">$45</h6>
                  </div>
                  <small class="text-body">France</small>
                </div>
                <div class="user-progress">
                  <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                    <i class="icon-base ti tabler-chevron-up"></i>
                    16.2%
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex align-items-center">
              <div class="avatar flex-shrink-0 me-4">
                <i class="fis fi fi-cn rounded-circle fs-2"></i>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-1">$12k</h6>
                  </div>
                  <small class="text-body">China</small>
                </div>
                <div class="user-progress">
                  <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                    <i class="icon-base ti tabler-chevron-up"></i>
                    14.8%
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--/ Sales By Country -->

    <!-- Total Earning -->
    <div class="col-12 col-md-6 col-xxl-4 order-2 order-xl-0">
      <div class="card h-100">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 card-title">Total Earning</h5>
            <div class="dropdown">
              <button
                class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
                type="button"
                id="totalEarning"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalEarning">
                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <h2 class="mb-0 me-2">87%</h2>
            <i class="icon-base ti tabler-chevron-up text-success me-1"></i>
            <h6 class="text-success mb-0">25.8%</h6>
          </div>
        </div>
        <div class="card-body">
          <div id="totalEarningChart"></div>
          <div class="d-flex align-items-start my-4">
            <div class="badge rounded bg-label-primary p-2 me-4 rounded">
              <i class="icon-base ti tabler-brand-paypal icon-md"></i>
            </div>
            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
              <div class="me-2">
                <h6 class="mb-0">Total Revenue</h6>
                <small class="text-body">Client Payment</small>
              </div>
              <h6 class="mb-0 text-success">+$126</h6>
            </div>
          </div>
          <div class="d-flex align-items-start">
            <div class="badge rounded bg-label-secondary p-2 me-4 rounded">
              <i class="icon-base ti tabler-currency-dollar icon-md"></i>
            </div>
            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
              <div class="me-2">
                <h6 class="mb-0">Total Sales</h6>
                <small class="text-body">Refund</small>
              </div>
              <h6 class="mb-0 text-success">+$98</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Total Earning -->

    <!-- Monthly Campaign State -->
    <div class="col-xxl-4 col-md-6">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-1">Monthly Campaign State</h5>
            <p class="card-subtitle">8.52k Social Visiters</p>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
              type="button"
              id="MonthlyCampaign"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="MonthlyCampaign">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Download</a>
              <a class="dropdown-item" href="javascript:void(0);">View All</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <li class="mb-6 d-flex justify-content-between align-items-center">
              <div class="badge bg-label-success rounded p-1_5">
                <i class="icon-base ti tabler-mail icon-md"></i>
              </div>
              <div class="d-flex justify-content-between w-100 flex-wrap">
                <h6 class="mb-0 ms-4">Emails</h6>
                <div class="d-flex">
                  <p class="mb-0">12,346</p>
                  <p class="ms-4 text-success mb-0">0.3%</p>
                </div>
              </div>
            </li>
            <li class="mb-6 d-flex justify-content-between align-items-center">
              <div class="badge bg-label-info rounded p-1_5">
                <i class="icon-base ti tabler-link icon-md"></i>
              </div>
              <div class="d-flex justify-content-between w-100 flex-wrap">
                <h6 class="mb-0 ms-4">Opened</h6>
                <div class="d-flex">
                  <p class="mb-0">8,734</p>
                  <p class="ms-4 text-success mb-0">2.1%</p>
                </div>
              </div>
            </li>
            <li class="mb-6 d-flex justify-content-between align-items-center">
              <div class="badge bg-label-warning rounded p-1_5">
                <i class="icon-base ti tabler-mouse icon-md"></i>
              </div>
              <div class="d-flex justify-content-between w-100 flex-wrap">
                <h6 class="mb-0 ms-4">Clicked</h6>
                <div class="d-flex">
                  <p class="mb-0">967</p>
                  <p class="ms-4 text-danger mb-0">1.4%</p>
                </div>
              </div>
            </li>
            <li class="mb-6 d-flex justify-content-between align-items-center">
              <div class="badge bg-label-primary rounded p-1_5">
                <i class="icon-base ti tabler-users icon-md"></i>
              </div>
              <div class="d-flex justify-content-between w-100 flex-wrap">
                <h6 class="mb-0 ms-4">Subscribe</h6>
                <div class="d-flex">
                  <p class="mb-0">345</p>
                  <p class="ms-4 text-success mb-0">8.5%</p>
                </div>
              </div>
            </li>
            <li class="mb-6 d-flex justify-content-between align-items-center">
              <div class="badge bg-label-secondary rounded p-1_5">
                <i class="icon-base ti tabler-alert-triangle icon-md"></i>
              </div>
              <div class="d-flex justify-content-between w-100 flex-wrap">
                <h6 class="mb-0 ms-4">Complaints</h6>
                <div class="d-flex">
                  <p class="mb-0">10</p>
                  <p class="ms-4 text-danger mb-0">1.5%</p>
                </div>
              </div>
            </li>
            <li class="mb-3 d-flex justify-content-between align-items-center">
              <div class="badge bg-label-danger rounded p-1_5">
                <i class="icon-base ti tabler-ban icon-md"></i>
              </div>
              <div class="d-flex justify-content-between w-100 flex-wrap">
                <h6 class="mb-0 ms-4">Unsubscribe</h6>
                <div class="d-flex">
                  <p class="mb-0">86</p>
                  <p class="ms-4 text-success mb-0">0.8%</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--/ Monthly Campaign State -->

    <!-- Source Visit -->
    <div class="col-xxl-4 col-md-6 col-12">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-1">Source Visits</h5>
            <p class="card-subtitle">38.4k Visitors</p>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
              type="button"
              id="sourceVisits"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sourceVisits">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Download</a>
              <a class="dropdown-item" href="javascript:void(0);">View All</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="mb-6">
              <div class="d-flex align-items-center">
                <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                  <i class="icon-base ti tabler-shadow icon-md"></i>
                </div>
                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Direct Source</h6>
                    <small class="text-body">Direct link click</small>
                  </div>
                  <div class="d-flex align-items-center">
                    <p class="mb-0">1.2k</p>
                    <div class="ms-4 badge bg-label-success">+4.2%</div>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-6">
              <div class="d-flex align-items-center">
                <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                  <i class="icon-base ti tabler-globe icon-md"></i>
                </div>
                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Social Network</h6>
                    <small class="text-body">Social Channels</small>
                  </div>
                  <div class="d-flex align-items-center">
                    <p class="mb-0">31.5k</p>
                    <div class="ms-4 badge bg-label-success">+8.2%</div>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-6">
              <div class="d-flex align-items-center">
                <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                  <i class="icon-base ti tabler-mail icon-md"></i>
                </div>
                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Email Newsletter</h6>
                    <small class="text-body">Mail Campaigns</small>
                  </div>
                  <div class="d-flex align-items-center">
                    <p class="mb-0">893</p>
                    <div class="ms-4 badge bg-label-success">+2.4%</div>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-6">
              <div class="d-flex align-items-center">
                <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                  <i class="icon-base ti tabler-external-link icon-md"></i>
                </div>
                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Referrals</h6>
                    <small class="text-body">Impact Radius Visits</small>
                  </div>
                  <div class="d-flex align-items-center">
                    <p class="mb-0">342</p>
                    <div class="ms-4 badge bg-label-danger">-0.4%</div>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-6">
              <div class="d-flex align-items-center">
                <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                  <i class="icon-base ti tabler-ad icon-md"></i>
                </div>
                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">ADVT</h6>
                    <small class="text-body">Google ADVT</small>
                  </div>
                  <div class="d-flex align-items-center">
                    <p class="mb-0">2.15k</p>
                    <div class="ms-4 badge bg-label-success">+9.1%</div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex align-items-center">
                <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                  <i class="icon-base ti tabler-star icon-md"></i>
                </div>
                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Other</h6>
                    <small class="text-body">Many Sources</small>
                  </div>
                  <div class="d-flex align-items-center">
                    <p class="mb-0">12.5k</p>
                    <div class="ms-4 badge bg-label-success">+6.2%</div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--/ Source Visit -->

    <!-- Projects table -->
    <div class="col-xxl-8">
      <div class="card">
        <div class="table-responsive mb-4">
          <table class="table datatable-project table-sm">
            <thead class="border-top">
              <tr>
                <th></th>
                <th></th>
                <th>Project</th>
                <th>Leader</th>
                <th>Team</th>
                <th class="w-px-200">Progress</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!--/ Projects table -->
  </div>
</div>
@endsection