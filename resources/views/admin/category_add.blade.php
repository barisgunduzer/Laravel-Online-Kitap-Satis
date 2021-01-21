@extends('layouts.admin')

@section('title','Add Category')

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
                        <h2 class="pageheader-title">Add Category </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Categories</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Add Category</a></li>
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
                            <form action="{{route('admin_category_create')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="parent_id">Parent:</label>
                                    <select id="parent_id" name="parent_id" class="form-control">
                                        <option value="0" selected="selected">Main Category</option>
                                        @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Title:</label>
                                    <input id="title" type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="col-form-label">Keywords:</label>
                                    <input id="keywords" type="text" name="keywords" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <input id="description" type="text" name="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select id="status" name="status" class="form-control">
                                        <option>False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug:</label>
                                    <input id="slug" type="text" name="slug" class="form-control">
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="add_image">
                                    <label class="custom-file-label" for="add_image">Add Image:</label>
                                </div>
                                <div class="form-group">
                                    <button href="#" type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </form>
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



