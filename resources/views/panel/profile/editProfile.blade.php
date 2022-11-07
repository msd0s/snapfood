@extends('panel.layout')

@section('header')
    <title>ویرایش پروفایل</title>
    <!--- Internal Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <style>
        .select2
        {
            width: 100% !important;
        }
        .jumps-prevent
        {
            padding-top: 31.5px !important;
        }
    </style>
    {{--<link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>--}}
    <link href="{{ asset('css/leaflet.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
@stop

@section('content')

    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">صفحات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مشخصات</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
                </div>
                <div class="mb-3 mb-xl-0">
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-primary">20 مهر 1399</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">منوی کشویی</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                            <a class="dropdown-item" href="#">1399 </a>
                            <a class="dropdown-item" href="#">1398 </a>
                            <a class="dropdown-item" href="#">1397 </a>
                            <a class="dropdown-item" href="#">1396</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
        <!-- row -->
        <div class="row row-sm">
            <div class="col-lg-4">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="pl-0">
                            <div class="main-profile-overview">
                                <div class="main-img-user profile-user">
                                    @if(auth()->user()->avatar=='')
                                        <img alt="" src="{{ asset('assets/img/faces/6.jpg') }}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                    @else
                                        <img alt="" src="{{ asset('storage/profiles/'.auth()->user()->avatar) }}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between mg-b-20">
                                    <div>
                                        <h5 class="main-profile-name">{{ auth()->user()->name }}</h5>
                                        <p class="main-profile-name-text">{{ auth()->user()->role }}</p>
                                    </div>
                                </div>
                                <h6>بیوگرافی</h6>
                                <div class="main-profile-bio">
                                    لذت منطقی روبرو می شود ، اما به دنبال عواقبی است که بسیار دردناک است. عواقبی که در آن زحمت و درد می تواند لذت بزرگی برای او فراهم کند .. <a href="#">بیشتر</a>
                                </div><!-- main-profile-bio -->
                                <div class="row">
                                    <div class="col-md-4 col mb20">
                                        <h5>947</h5>
                                        <h6 class="text-small text-muted mb-0">پیروان</h6>
                                    </div>
                                    <div class="col-md-4 col mb20">
                                        <h5>583</h5>
                                        <h6 class="text-small text-muted mb-0">توییت ها</h6>
                                    </div>
                                    <div class="col-md-4 col mb20">
                                        <h5>48</h5>
                                        <h6 class="text-small text-muted mb-0">نوشته ها</h6>
                                    </div>
                                </div>
                                <hr class="mg-y-30">
                                <label class="main-content-label tx-13 mg-b-20">اجتماعی</label>
                                <div class="main-profile-social-list">
                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i class="icon ion-logo-github"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>Github </span> <a href="#">github.com/FT</a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-success-transparent text-success">
                                            <i class="icon ion-logo-twitter"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>توییتر </span> <a href="#">twitter.com/FT.me</a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-info-transparent text-info">
                                            <i class="icon ion-logo-linkedin"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>لینک </span> <a href="#">linkedin.com/in/FT</a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-danger-transparent text-danger">
                                            <i class="icon ion-md-link"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>نمونه کارها من </span> <a href="#">FT.com/</a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mg-y-30">
                                <h6>مهارت ها</h6>
                                <div class="skill-bar mb-4 clearfix mt-3">
                                    <span>HTML5 / CSS3</span>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bg-primary-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                                    </div>
                                </div>
                                <!--skill bar-->
                                <div class="skill-bar mb-4 clearfix">
                                    <span>جاوا اسکریپت</span>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bg-danger-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 89%"></div>
                                    </div>
                                </div>
                                <!--skill bar-->
                                <div class="skill-bar mb-4 clearfix">
                                    <span>بوت استرپ</span>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bg-success-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!--skill bar-->
                                <div class="skill-bar clearfix">
                                    <span>قهوه</span>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                    </div>
                                </div>
                                <!--skill bar-->
                            </div><!-- main-profile-overview -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row row-sm">
                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="counter-status d-flex md-mb-0">
                                    <div class="counter-icon bg-primary-transparent">
                                        <i class="icon-layers text-primary"></i>
                                    </div>
                                    <div class="mr-auto">
                                        <h5 class="tx-13">سفارشات</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1،587</h2>
                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> افزایش دادن </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="counter-status d-flex md-mb-0">
                                    <div class="counter-icon bg-danger-transparent">
                                        <i class="icon-paypal text-danger"></i>
                                    </div>
                                    <div class="mr-auto">
                                        <h5 class="tx-13">درآمد</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">46،782</h2>
                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> افزایش دادن </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="counter-status d-flex md-mb-0">
                                    <div class="counter-icon bg-success-transparent">
                                        <i class="icon-rocket text-success"></i>
                                    </div>
                                    <div class="mr-auto">
                                        <h5 class="tx-13">محصول فروخته شده</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1890</h2>
                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>  افزایش دادن </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="tabs-menu ">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                                <li>
                                    <a href="#settings" data-toggle="tab" aria-expanded="true" class="active"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">ویرایش مشخصات</span> </a>
                                </li>
                                <li class="">
                                    <a href="#avatar" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">تغییر آواتار</span> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                            <div class="tab-pane active" id="settings">
                                <form method="post" action="{{ route('profile.update',auth()->user()->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="form-row">
                                        <div class="col-md-6 mb-4">
                                            <label for="name">نام و نام خانوادگی</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name',auth()->user()->name) }}" required tabindex="1">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="email">ایمیل</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ old('email',auth()->user()->email) }}" disabled tabindex="5">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="password">رمز عبور</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="" value="" required tabindex="4">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="password_confirmation">تایید رمز عبور</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" value="" required tabindex="4">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="melli_code">کد ملی</label>
                                            <input type="text" class="form-control" id="melli_code" name="melli_code" placeholder="" value="{{ old('melli_code',auth()->user()->melli_code) }}" tabindex="3">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="phone">تلفن ثابت</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        تلفن:
                                                    </div>
                                                </div><!-- input-group-prepend -->
                                                <input class="form-control" id="phonenumber" name="phone" placeholder="مثال : 05112345678" type="text" value="{{ old('phone',auth()->user()->phone) }}">
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="mobile">تلفن همراه</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        همراه:
                                                    </div>
                                                </div><!-- input-group-prepend -->
                                                <input class="form-control" id="mobile" name="mobile" placeholder="مثال : 09151234567" type="text" value="{{ old('mobile',auth()->user()->mobile) }}">
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input id="lat" name="latitude" placeholder="مثال : 09151234567" type="hidden" value="{{ old('latitude',auth()->user()->addresses->first() ? auth()->user()->addresses->first()->latitude : '35.699739') }}">
                                            <input id="lng" name="longitude" placeholder="مثال : 09151234567" type="hidden" value="{{ old('longitude',auth()->user()->addresses->first() ? auth()->user()->addresses->first()->longitude : '51.338097') }}">
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div id="mapid" class="center-block" style="width: 100%; height: 400px;"></div>
                                            <script type="text/javascript">
                                                var myMap = new L.Map('mapid', {
                                                    key: 'web.21d8c13d65494d1186ef58855d3c48c1',
                                                    maptype: 'dreamy',
                                                    center: [35.699739, 51.338097],
                                                    zoom: 14,
                                                    poi: true,
                                                    onPoiLayerSwitched: function (state) {
                                                        console.log(state);
                                                    }
                                                });
                                            </script>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="title">عنوان آدرس</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ old('title',auth()->user()->addresses->first() ? auth()->user()->addresses->first()->title : '') }}" tabindex="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="is_default">آدرس پیش فرض</label>
                                                <select name="is_default" class="form-control" id="is_default">
                                                    <option value="1" @if(auth()->user()->addresses->first() && auth()->user()->addresses->first()->is_default==1) selected @endif>بله</option>
                                                    <option value="0" @if(auth()->user()->addresses->first() && auth()->user()->addresses->first()->is_default==0) selected @endif>خیر</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="name">آدرس</label>
                                            <textarea class="form-control" rows="5" id="address" name="address" placeholder="" tabindex="1">{{ old('address',auth()->user()->addresses->first() ? auth()->user()->addresses->first()->address : '') }}</textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary submit-fn mt-2" type="submit" tabindex="10">ذخیره اطلاعات</button>
                                </form>
                                @include('panel.sections.errors')
                            </div>
                            <div class="tab-pane" id="avatar">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <form method="post" enctype="multipart/form-data" action="{{ route('avatar.update',auth()->user()->id) }}">
                                            @csrf
                                            @method('patch')
                                            <input type="file" class="dropify" data-height="200" name="avatar">
                                            <button type="submit" class="btn btn-outline-info btn-block" style="margin-top: 10px;">آپلود آواتار</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>

@stop

@section('footer')
    <!-- Internal Select2 js-->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ asset('assets/js/form-elements.js') }}"></script>
    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{ asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/input-mask.js') }}"></script>
    <script>
        $('#mobile').inputmask("99999999999");
        $('#phonenumber').inputmask("99999999999");
    </script>

    <script>
        var marker;
        myMap.on('click', onMapClick);

        function onMapClick(e) {
            if (marker!=undefined)
            {
                myMap.removeLayer(marker);
            }
            marker = new L.Marker(e.latlng);
            myMap.addLayer(marker);
            $('#lat').val(e.latlng.lat);
            $('#lng').val(e.latlng.lng);
        }
    </script>
@stop
