<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Detail</title>
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
                <form action="{{route('admin_order_update',['id' => $data->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        Ordered by: {{$data->user->name}} <br>
                        Order Date: {{$data->created_at->format('d.m.Y H:i:s ')}}<br>
                    </div>
                    <table style="text-align:center" class="table table-striped table-bordered first">
                        <tr>
                            <th>ID</th>
                            <td>{{$data->id}}</td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td>{{$data->user->name}}</td>
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
                            <th>Address</th>
                            <td>{{$data->address}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$data->phone}}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>{{$data->total}}₺</td>
                        </tr>
                        <tr>
                            <th>IP</th>
                            <td>{{$data->IP}}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{$data->created_at->format('d.m.Y H:i:s ')}}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{$data->updated_at->format('d.m.Y H:i:s ')}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <select name="status">
                                    <option selected>{{$data->status}}</option>
                                    <option>Siparişiniz Alındı</option>
                                    <option>Onaylandı</option>
                                    <option>Gönderimde</option>
                                    <option>Tamamlandı</option>
                                    <option>İptal Edildi</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td><textarea name="note" rows="3" cols="30">{{$data->note}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Update Order</th>
                            <td><button type="submit" class="btn btn-primary"  style="text-align: center;">Update Order</button></td>
                        </tr>
                    </table>
                </form>
                <br><br>
                <div class="form-group">
                    Ordered Items: {{\App\Http\Controllers\OrderController::countitems($data->id)}}<br>
                </div>
                <table style="text-align:center" class="table table-striped table-bordered first">
                    <thead>
                    <tr class="title-top">
                        <th style="text-transform:none">Image</th>
                        <th style="text-transform:none">Product</th>
                        <th style="text-transform:none">Price</th>
                        <th style="text-transform:none">Quantity</th>
                        <th style="text-transform:none">Total</th>
                        <th style="text-transform:none">Status</th>
                        <th style="text-transform:none">Note</th>
                        <th style="text-transform:none">Order Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datalist as $rs)
                        <form action="{{route('admin_order_item_update',['id' => $rs->id])}}" method="post">
                        @csrf
                        <tr>
                            <td><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"><img src="{{Storage::url($rs->product->image)}}" width="20px" alt="product img"></a></td>
                            <td><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">{{$rs->product->title}}</a></td>
                            <td>{{$rs->product->price}}₺</td>
                            <td>{{$rs->quantity}}</td>
                            <td>{{$rs->product->price * $rs->quantity}}₺</td>
                            <td><select name="status">
                                    <option selected>{{$rs->status}}</option>
                                    <option>Siparişiniz Alındı</option>
                                    <option>Onaylandı</option>
                                    <option>Gönderimde</option>
                                    <option>Tamamlandı</option>
                                    <option>İptal Edildi</option>
                                </select>
                            </td>
                            <td><textarea name="note" rows="3" cols="30">{{$rs->note}}</textarea></td>
                            <td>{{$rs->created_at->format('d.m.Y H:i:s ')}}</td>
                            <td><input type="submit" value="Update"></td>
                        </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>





