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
                <form action="{{route('admin_message_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        Sent at: {{$data->created_at->format('d.m.Y h:m ')}} <br>
                        From: {{$data->email}}<br>
                    </div>
                    <table style="text-align:center" class="table table-striped table-bordered first">
                        <tr>
                            <th>ID</th>
                            <td>{{$data->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$data->phone}}</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>{{$data->subject}}</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>{{$data->message}}</td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td><textarea id="note" name="note">{{$data->note}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$data->status}}</td>
                        </tr>
                        <tr>
                            <th>Update</th>
                            <td><button type="submit" class="btn btn-primary"  style="text-align: center;">Update Message</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>





