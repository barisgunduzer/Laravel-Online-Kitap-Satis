@extends('layouts.admin')

@section('title','Admin Order List')

@section('content')

    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Admin Order List</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="text-align:center" class="table table-striped table-bordered first">
                                    <thead>
                                    <tr>
                                        <th style="text-transform:none">ID</th>
                                        <th style="text-transform:none">User</th>
                                        <th style="text-transform:none">Recipient</th>
                                        <th style="text-transform:none">Email</th>
                                        <th style="text-transform:none">Address</th>
                                        <th style="text-transform:none">Phone</th>
                                        <th style="text-transform:none">Total</th>
                                        <th style="text-transform:none">Date</th>
                                        <th style="text-transform:none">Status</th>
                                        <th style="text-transform:none">Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->user->name}}</td>
                                            <td>{{$rs->name}}</td>
                                            <td>{{$rs->email}}</td>
                                            <td>{{$rs->address}}</td>
                                            <td>{{$rs->phone}}</td>
                                            <td>{{$rs->total}}₺</td>
                                            <td>{{$rs->created_at->format('d.m.Y H:i:s ')}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td><a href="{{route('admin_order_show',['id' => $rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><i class="fas fa-search"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('footerjs')
            <!-- Optional JavaScript -->
                <script src="{{asset('assets')}}/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
                <script src="{{asset('assets')}}/admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                <script src="{{asset('assets')}}/admin/vendor/slimscroll/jquery.slimscroll.js"></script>
                <script src="{{asset('assets')}}/admin/vendor/multi-select/js/jquery.multi-select.js"></script>
                <script src="{{asset('assets')}}/admin/libs/js/main-js.js"></script>
                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                <script src="{{asset('assets')}}/admin/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
                <script src="{{asset('assets')}}/admin/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
                <script src="{{asset('assets')}}/admin/vendor/datatables/js/data-table.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
                <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
                <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
                <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
@endsection




