@php
    $revenue = \App\Http\Controllers\Admin\OrderController::revenue();
    $usercount = \App\Http\Controllers\Admin\UserController::usercount();
    $totalshipmentfee = \App\Http\Controllers\Admin\HomeController::totalshipmentfee();
@endphp

<div class="ecommerce-widget">

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Total Revenue</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">
                            {{\App\Http\Controllers\Admin\OrderController::revenue()}}₺
                        </h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Profit</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$revenue * 0.75}}₺</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span>N/A</span>
                    </div>
                </div>
                <div id="sparkline-revenue3"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Avg. Revenue Per User</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{(int)($revenue/$usercount)}}₺</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span>-2.00%</span>
                    </div>
                </div>
                <div id="sparkline-revenue4"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Total Shipment Fee</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$totalshipmentfee}}₺</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span>-2.00%</span>
                    </div>
                </div>
                <div id="sparkline-revenue4"><canvas width="265" height="100" style="display: inline-block; width: 265.562px; height: 100px; vertical-align: top;"></canvas></div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- recent orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Recent Orders</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0">Image</th>
                                <th class="border-0">Product Name</th>
                                <th class="border-0">Order Id</th>
                                <th class="border-0">Quantity</th>
                                <th class="border-0">Price</th>
                                <th class="border-0">Amount</th>
                                <th class="border-0">Order Date</th>
                                <th class="border-0">Customer</th>
                                <th class="border-0">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderitems as $rs)
                            <tr>
                                <td>
                                    <div class="m-r-10"><a href="{{route('admin_product_edit',['id'=>$rs->product_id])}}"><img src="{{Storage::url($rs->product->image)}}" alt="user" class="rounded" width="45"></a></div>
                                </td>
                                <td><a href="{{route('admin_product_edit',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></td>
                                <td>{{$rs->order_id}}</td>
                                <td>{{$rs->quantity}}</td>
                                <td>{{$rs->product->price}} ₺</td>
                                <td>{{$rs->amount}} ₺</td>
                                <td>{{$rs->created_at}}</td>
                                <td>{{$rs->order->name}}</td>
                                <td>
                                    @switch($rs->status)
                                        @case('New')
                                        <span class="badge-dot badge-success mr-1"></span> {{$rs->status}}
                                        @break
                                        @case('Accepted')
                                            <span class="badge-dot badge-primary  mr-1"></span> {{$rs->status}}
                                        @break
                                        @case('Shipped')
                                            <span class="badge-dot badge-brand mr-1"></span> {{$rs->status}}
                                        @break
                                        @case('Completed')
                                            <span class="badge-dot badge-secondary mr-1"></span> {{$rs->status}}
                                        @break
                                        @case('Canceled')
                                            <span class="badge-dot badge-danger mr-1"></span> {{$rs->status}}
                                        @break
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="9"><a href="{{route('admin_orders')}}" class="btn btn-outline-light float-right">View Details</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end recent orders  -->
    </div>
    <div class="row">

        <!-- ============================================================== -->
        <!-- product sales  -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                            <select class="custom-select">
                                <option selected>Today</option>
                                <option value="1">Weekly</option>
                                <option value="2">Monthly</option>
                                <option value="3">Yearly</option>
                            </select>
                        </div>
                    <h5 class="mb-0"> Product Sales</h5>
                </div>
                <div class="card-body">
                    <div class="ct-chart-product ct-golden-section"></div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end product sales  -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- top perfomimg  -->
            <!-- ============================================================== -->
            <div class="card">
                <h5 class="card-header">Top Performing Campaigns</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table no-wrap p-table">
                            <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0">Campaign</th>
                                <th class="border-0">Visits</th>
                                <th class="border-0">Revenue</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Campaign#1</td>
                                <td>98,789 </td>
                                <td>$4563</td>
                            </tr>
                            <tr>
                                <td>Campaign#2</td>
                                <td>2,789 </td>
                                <td>$325</td>
                            </tr>
                            <tr>
                                <td>Campaign#3</td>
                                <td>1,459 </td>
                                <td>$225</td>
                            </tr>
                            <tr>
                                <td>Campaign#4</td>
                                <td>5,035 </td>
                                <td>$856</td>
                            </tr>
                            <tr>
                                <td>Campaign#5</td>
                                <td>10,000 </td>
                                <td>$1000</td>
                            </tr>
                            <tr>
                                <td>Campaign#5</td>
                                <td>10,000 </td>
                                <td>$1000</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <a href="#" class="btn btn-outline-light float-right">Details</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end top perfomimg  -->
            <!-- ============================================================== -->
        </div>
    </div>

    <div class="row">
        <!-- ============================================================== -->
        <!-- sales  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Sales</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$12099</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end sales  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- new customer  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">New Customer</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">1245</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end new customer  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- visitor  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Visitor</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">13000</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end visitor  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- total orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Orders</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">1340</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end total orders  -->
        <!-- ============================================================== -->
    </div>
</div>
</div>
</div>
