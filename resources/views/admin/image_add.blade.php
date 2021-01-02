<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Image Gallery</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/circular-std/style.css" >
    <link rel="stylesheet" href="{{asset('assets/admin')}}/libs/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
<div class="row" style="margin: 10px;margin-top: 25px">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin_image_store',['product_id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($data->image)
                        <div class="form-group">
                            <img src="{{Storage::url($data->image)}}" width="50px" alt="{{$data->title}}"/>
                        </div>
                    @endif
                    <div class="form-group">
                        Book Title : {{$data->title}}<br>
                        Author : {{$data->author_name}}<br>
                        Publisher : {{$data->publisher_name}}<br>
                    </div>
                    <div class="form-group">
                        <input id="title" type="text" name="title" placeholder="#Preview Page Number">
                    </div>
                    <div class="form-group">
                        <input id="image" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <button href="#" type="submit" class="btn btn-primary">Add Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin: 10px">
    @foreach ($images as $rs)
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <!-- .card -->
            <div class="card card-figure">
                <!-- .card-figure -->
                <figure class="figure">
                    <!-- .figure-img -->
                    <div class="figure-img">
                        <img class="img-fluid" src="{{ Storage::url($rs->image)}}" alt="Card image cap">
                        <div class="figure-action">
                            <a href="{{route('admin_image_delete',['id' => $rs->id,'product_id'=>$data->id])}}" class="btn btn-block btn-sm btn-primary" onclick="return confirm('Image record will be delete! Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                    <!-- /.figure-img -->
                    <!-- .figure-caption -->
                    <figcaption class="figure-caption">
                        <h6 class="figure-title">#{{$rs->id}}</a></h6>
                        <p class="text-muted mb-0">{{$rs->title}}</p>
                    </figcaption>
                    <!-- /.figure-caption -->
                </figure>
                <!-- /.card-figure -->
            </div>
            <!-- /.card -->
        </div>
    @endforeach
</div>
</body>
</html>





