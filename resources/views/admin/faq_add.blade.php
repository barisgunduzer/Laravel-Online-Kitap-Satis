@extends('layouts.admin')

@section('title','Add Product')

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
                        <h2 class="pageheader-title">Add FAQ</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">FAQs</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Add FAQ</a></li>
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
                    @include('home.message')
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin_faq_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="question" class="col-form-label">Question:</label>
                                    <input id="question" type="text" name="question" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="col-form-label">Answer:</label>
                                    <textarea id="editor" name="answer"></textarea>
                                    <script>
                                        ClassicEditor
                                            .create( document.querySelector( '#editor' ) )
                                            .catch( error => {
                                                console.error( error );
                                            } );
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="position" class="col-form-label">Position:</label>
                                    <input id="position" type="number" name="position" value="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select id="status" name="status" class="form-control">
                                        <option>False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button href="#" type="submit" class="btn btn-primary">Add FAQ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection




