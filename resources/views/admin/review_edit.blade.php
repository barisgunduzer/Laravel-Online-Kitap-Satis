<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Message Detail</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/circular-std/style.css" >
    <link rel="stylesheet" href="{{asset('assets/admin')}}/libs/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
<div class="row" style="margin: 10px;margin-top: 25px">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @include('home.message')
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin_review_update',['id'=>$review->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        Sent at: {{$review->created_at->format('d.m.Y H:i:s ')}} <br>
                        From: {{$review->email}}<br>
                    </div>
                    <table style="text-align:center" class="table table-striped table-bordered first">
                        <tr>
                            <th>ID</th>
                            <td>{{$review->id}}</td>
                        </tr>
                        <tr>
                            <th>From</th>
                            <td>{{$review->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>{{$review->product->title}}</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>{{$review->subject}}</td>
                        </tr>
                        <tr>
                            <th>Review</th>
                            <td>{{$review->review}}</td>
                        </tr>
                        <tr>
                            <th>Rate</th>
                            <td>{{$review->rate}}</td>
                        </tr>
                        <tr>
                            <th>IP</th>
                            <td>{{$review->IP}}</td>
                        </tr>
                        <tr>
                            <th>Created Date</th>
                            <td>{{$review->created_at->format('d.m.Y H:i:s ')}}</td>
                        </tr>
                        <tr>
                            <th>Updated Date</th>
                            <td>{{$review->updated_at->format('d.m.Y H:i:s ')}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <select name="status">
                                    <option selected>{{$review->status}}</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Update Review</th>
                            <td><button type="submit" class="btn btn-primary"  style="text-align: center;">Update Review</button></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>





