@extends('layouts.admin')

@section('title','Edit Product')

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
                        <h2 class="pageheader-title">Edit Product </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Products</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Add Product</a></li>
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
                            <form action="{{route('admin_product_update',['id'=>$data->id])}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="category_id">Category:</label>
                                    <select id="category_id" name="category_id" class="form-control">
                                        @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}" @if ($rs->id == $data->category_id) selected="selected" @endif>{{$rs->title}}</option>
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
                                    <label for="author_name" class="col-form-label">Author:</label>
                                    <input id="author_name" type="text" name="author_name" value="{{$data->author_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="publisher_name" class="col-form-label">Publisher:</label>
                                    <input id="publisher_name" type="text" name="publisher_name" value="{{$data->publisher_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ISBN" class="col-form-label">ISBN:</label>
                                    <input id="ISBN" type="text" name="ISBN" value="{{$data->ISBN}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="book_detail" class="col-form-label">Book Detail:</label>
                                    <input id="book_detail" type="text" name="book_detail" value="{{$data->book_detail}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-form-label">Price:</label>
                                    <input id="price" type="number" name="price" value="{{$data->price}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tax" class="col-form-label">Tax:</label>
                                    <input id="tax" type="number" name="tax" value="{{$data->tax}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quantity_in_stock" class="col-form-label">Quantity:</label>
                                    <input id="quantity_in_stock" type="number" name="quantity_in_stock" value="{{$data->quantity_in_stock}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="min_quantity" class="col-form-label">Min Quantity:</label>
                                    <input id="min_quantity" type="number" name="min_quantity" value="{{$data->min_quantity}}" class="form-control">
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
                                    <label class="custom-file-label" for="add_image">Update Image</label>
                                </div>
                                <div class="form-group">
                                    <button href="#" type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection




