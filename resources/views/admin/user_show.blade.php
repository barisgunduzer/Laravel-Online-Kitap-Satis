<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$data->name}}</title>
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
                <div class="form-group">
                    User Created At: {{$data->created_at->format('d.m.Y H:i:s ')}} <br>
                </div>
                <table style="text-align:center" class="table table-striped table-bordered first">
                    <tr>
                        <td colspan="2">@if($data->profile_photo_path)
                                <img src="{{Storage::url($data->profile_photo_path)}}" height="200" style="border-radius: 10px" alt=""/>
                            @endif
                        </td>
                    </tr>
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
                        <th>Address</th>
                        <td>{{$data->address}}</td>
                    </tr>
                    <tr>
                        <th>Roles</th>
                        <td>
                            @foreach($data->roles as $row)
                               {{$row->name}}
                               <a href="{{route('admin_user_role_delete',['userid' => $data->id, 'roleid'=>$row->id])}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>,
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Add Role</th>
                        <td>
                            <form role="form" action="{{route('admin_user_role_add',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <select name="roleid">
                                    @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}">{{$rs->name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary"  style="text-align: center;">Add Role</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>





