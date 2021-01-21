@extends('layouts.admin')

@section('title','Review List')

@section('css')<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/vendor/datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/vendor/datatables/css/buttons.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/vendor/datatables/css/select.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection

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
                        <h2 class="pageheader-title">Review List</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin_home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reviews</li>
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
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @include('home.message')
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="text-align:center" class="table table-striped table-bordered first">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Book</th>
                                        <th>Subject</th>
                                        <th>Review</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Show</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reviews as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td><a href="{{route('admin_user_show',['id'=>$rs->user->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">{{$rs->user->name}}</a></td>
                                        <td><a href="{{route('product',['id' => $rs->product->id,'slug' => $rs->product->slug])}}" target="_blank"></a>{{$rs->product->title}}</td>
                                        <td>{{$rs->subject}}</td>
                                        <td>{{$rs->review}}</td>
                                        <td>{{$rs->rate}}</td>
                                        <td>{{$rs->status}}</td>
                                        <td>{{$rs->created_at->format('d.m.Y H:i:s ')}}</td>
                                        <td><a href="{{route('admin_review_show',['id' => $rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700') "><i class="fas fa-edit"></i></a></td>
                                        <td><a href="{{route('admin_review_delete',['id' => $rs->id])}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
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
