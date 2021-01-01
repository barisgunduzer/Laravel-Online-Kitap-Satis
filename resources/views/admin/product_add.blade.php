@extends('layouts.admin')

@section('title','Add Product')

@section('description','Dünya klasiklerinden, çocuk edebiyatına; kırtasiye malzemelerinden hobi ve elektroniğe varan yüzlerce kategoriden binlerce ürün sizleri bekliyor!')

@section('keywords','kitap, roman, türk edebiyatı, klasik batı edebiyatı, şiir, fantezi, bilim kurgu')

@section('author','barisgunduzer')

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
                        <h2 class="pageheader-title">Add Product </h2>
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
                            <form action="{{route('admin_product_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="category_id">Category:</label>
                                    <select id="category_id" name="category_id" class="form-control">
                                        @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}">{{$rs->title}}</option>
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
                                    <label for="author_name" class="col-form-label">Author:</label>
                                    <input id="author_name" type="text" name="author_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="publisher_name" class="col-form-label">Publisher:</label>
                                    <input id="publisher_name" type="text" name="publisher_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ISBN" class="col-form-label">ISBN:</label>
                                    <input id="ISBN" type="text" name="ISBN" class="form-control" placeholder="ISBN-13">
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="col-form-label">Book Detail:</label>
                                    <textarea id="editor"></textarea>
                                    <script>
                                        ClassicEditor
                                            .create( document.querySelector( '#editor' ) )
                                            .catch( error => {
                                                console.error( error );
                                            } );
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-form-label">Price:</label>
                                    <input id="price" type="number" name="price" value="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tax" class="col-form-label">Tax:</label>
                                    <input id="tax" type="number" name="tax" value="12" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quantity_in_stock" class="col-form-label">Quantity:</label>
                                    <input id="quantity_in_stock" type="number" value="1" name="quantity_in_stock" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="min_quantity" class="col-form-label">Min Quantity:</label>
                                    <input id="min_quantity" type="number" name="min_quantity" value="5" class="form-control">
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
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input id="image" type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <button href="#" type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection




