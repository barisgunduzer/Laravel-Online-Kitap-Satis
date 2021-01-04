[@extends('layouts.admin')

@section('title','Edit Setting')

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
                        <h2 class="pageheader-title">Edit Setting</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Settings</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Edit Setting</a></li>
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
                    <form action="{{route('admin_setting_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="tab-vertical">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="general-vertical-tab" data-toggle="tab" href="#general-vertical" role="tab" aria-controls="general" aria-selected="true">General Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="email-vertical-tab" data-toggle="tab" href="#email-vertical" role="tab" aria-controls="email" aria-selected="false">Email Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="social-vertical-tab" data-toggle="tab" href="#social-vertical" role="tab" aria-controls="social" aria-selected="false">Social Media Links</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="aboutus-vertical-tab" data-toggle="tab" href="#aboutus-vertical" role="tab" aria-controls="aboutus" aria-selected="false">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-vertical-tab" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="contact" aria-selected="false">Contact Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="references-vertical-tab" data-toggle="tab" href="#references-vertical" role="tab" aria-controls="references" aria-selected="false">References</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade active show" id="general-vertical" role="tabpanel" aria-labelledby="general-vertical-tab">
                                        <div class="form-group">
                                            <input id="id" type="hidden" name="id" value="{{$data->id}}" class="form-control">
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
                                            <label for="company" class="col-form-label">Company:</label>
                                            <input id="company" type="text" name="company" value="{{$data->company}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Address:</label>
                                            <input id="address" type="text" name="address" value="{{$data->address}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-form-label">Phone:</label>
                                            <input id="phone" type="text" name="phone" value="{{$data->phone}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax" class="col-form-label">Fax:</label>
                                            <input id="fax" type="text" name="fax" value="{{$data->fax}}" class="form-control">
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
                                            <button href="#" type="submit" class="btn btn-primary">Update Settings</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="email-vertical" role="tabpanel" aria-labelledby="email-vertical-tab">
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email:</label>
                                            <input id="email" type="text" name="email" value="{{$data->email}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="smtpserver" class="col-form-label">Smtpserver:</label>
                                            <input id="smtpserver" type="text" name="smtpserver" value="{{$data->smtpserver}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="smtpemail" class="col-form-label">Smtpemail:</label>
                                            <input id="smtpemail" type="text" name="smtpemail" value="{{$data->smtpemail}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="smtppassword" class="col-form-label">Smtppassword:</label>
                                            <input id="smtppassword" type="text" name="smtppassword" value="{{$data->smtppassword}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="smtpport" class="col-form-label">Smtpport:</label>
                                            <input id="smtpport" type="text" name="smtpport" value="{{$data->smtpport}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button href="#" type="submit" class="btn btn-primary">Update Settings</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="social-vertical" role="tabpanel" aria-labelledby="social-vertical-tab">
                                        <div class="form-group">
                                            <label for="facebook" class="col-form-label">Facebook:</label>
                                            <input id="facebook" type="text" name="facebook" value="{{$data->facebook}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram" class="col-form-label">Instagram:</label>
                                            <input id="instagram" type="text" name="instagram" value="{{$data->instagram}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter" class="col-form-label">Twitter:</label>
                                            <input id="twitter" type="text" name="twitter" value="{{$data->twitter}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="youtube" class="col-form-label">Youtube:</label>
                                            <input id="youtube" type="text" name="youtube" value="{{$data->youtube}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button href="#" type="submit" class="btn btn-primary">Update Settings</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="aboutus-vertical" role="tabpanel" aria-labelledby="aboutus-vertical-tab">
                                        <div class="form-group">
                                            <label for="aboutus" class="col-form-label">About Us:</label>
                                            <textarea id="aboutus" name="aboutus">{{$data->aboutus}}</textarea>
                                            <script>
                                                ClassicEditor
                                                    .create( document.querySelector( '#aboutus' ) )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <button href="#" type="submit" class="btn btn-primary">Update Settings</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact-vertical" role="tabpanel" aria-labelledby="contact-vertical-tab">
                                        <div class="form-group">
                                            <label for="contact" class="col-form-label">Contact:</label>
                                            <textarea id="contact" name="contact">{{$data->contact}}</textarea>
                                            <script>
                                                ClassicEditor
                                                    .create( document.querySelector( '#contact' ) )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <button href="#" type="submit" class="btn btn-primary">Update Settings</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="references-vertical" role="tabpanel" aria-labelledby="references-vertical-tab">
                                        <div class="form-group">
                                            <label for="references" class="col-form-label">References:</label>
                                            <textarea id="references" name="references">{{$data->references}}</textarea>
                                            <script>
                                                ClassicEditor
                                                    .create( document.querySelector( '#references' ) )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <button href="#" type="submit" class="btn btn-primary">Update Settings</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerjs')
    <script src="{{asset('assets')}}/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{asset('assets')}}/admin/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="{{asset('assets')}}/admin/libs/js/main-js.js"></script>
@endsection



]
