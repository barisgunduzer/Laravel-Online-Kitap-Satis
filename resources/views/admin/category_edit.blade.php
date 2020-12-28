@extends('layouts.admin')

@section('title','Edit Category')

@section('description','Dünya klasiklerinden, çocuk edebiyatına; kırtasiye malzemelerinden hobi ve elektroniğe varan yüzlerce kategoriden binlerce ürün sizleri bekliyor!')

@section('keywords','kitap, roman, türk edebiyatı, klasik batı edebiyatı, şiir, fantezi, bilim kurgu')

@section('author','barisgunduzer')

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
                        <h2 class="pageheader-title">Edit Category </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Categories</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Edit Category</a></li>
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
                            <form action="{{route('admin_category_update',['id' => $data->id])}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="parent_id">Parent:</label>
                                    <select id="parent_id" name="parent_id" class="form-control">
                                        <option value="{{$data->parent_id}}" selected="selected">-</option>
                                        <option value="0">Main Category</option>
                                        @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}" @if ($rs->id == $data->parent_id) selected="selected" @endif>{{$rs->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Title:</label>
                                    <input id="title" type="text" name="title" value="{{$data->title}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="col-form-label">Keywords:</label>
                                    <input id="keywords" type="text" name="keywords" value="{{$data->keywords}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <input id="description" type="text" name="description" value="{{$data->description}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select id="status" name="status" class="form-control">
                                        <option selected="selected">{{$data->status}}</option>
                                        <option>False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug:</label>
                                    <input id="slug" type="text" name="slug" value="{{$data->slug}}" class="form-control">
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="add_image">
                                    <label class="custom-file-label" for="add_image">Add Image</label>
                                </div>
                                <div class="form-group">
                                    <button href="#" type="submit" class="btn btn-primary">Update Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection




