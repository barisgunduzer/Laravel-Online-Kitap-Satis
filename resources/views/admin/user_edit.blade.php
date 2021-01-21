@extends('layouts.admin')

@section('title','Edit User')

@section('headerjs')<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
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
                        <h2 class="pageheader-title">Edit User</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin_home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Edit User</a></li>
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
                            <div class="form-group">
                                User Created At: {{$data->created_at->format('d.m.Y H:i:s ')}} <br>
                            </div>
                            <form action="{{route('admin_user_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name:</label>
                                    <input id="name" type="text" name="name" value="{{$data->name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input id="email" type="text" name="email" value="{{$data->email}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">Phone:</label>
                                    <input id="phone" type="text" name="phone" value="{{$data->phone}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Address:</label>
                                    <input id="address" type="text" name="address" value="{{$data->address}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input id="image" type="file" name="image">
                                </div>
                                @if($data->profile_photo_path)
                                    <div class="form-group">
                                        <img src="{{Storage::url($data->profile_photo_path)}}" height="200" style="border-radius: 10px" alt=""/>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <button href="#" type="submit" class="btn btn-primary">Update User</button>
                                </div>
                            </form>
                        </div>
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



