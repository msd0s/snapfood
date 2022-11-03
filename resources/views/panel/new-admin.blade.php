@extends('admin.layout')

@section('header')
    <title>ثبت کاربر جدید</title>
    <!--- Internal Select2 css-->
    <link href="{{ url('resources/views/admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ url('resources/views/admin/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{ url('resources/views/admin/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ url('resources/views/admin/assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ url('resources/views/admin/assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
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
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-20">
                            ورودی وضعیت معتبر
                        </div>
                        <form class="needs-validation was-validated" method="post">
                            {{ csrf_field() }}
                                <div class="col-md-4 mb-4">
                                    <label for="fname">نام</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" value="{{ old('fname',isset($item) ? $item['fname'] : '') }}" required tabindex="1">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="lname">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="" value="{{ old('lname',isset($item) ? $item['lname'] : '') }}" required tabindex="2">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="mname">نام مستعار</label>
                                    <input type="text" class="form-control" id="mname" name="mname" placeholder="" value="{{ old('mname',isset($item) ? $item['mname'] : '') }}" tabindex="3">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="melli_code">کد ملی</label>
                                    <input type="text" class="form-control" id="melli_code" name="melli_code" placeholder="" value="{{ old('melli_code',isset($item) ? $item['melli_code'] : '') }}" tabindex="4">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="username">نام کاربری</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="" value="{{ old('username',isset($item) ? $item['username'] : '') }}" tabindex="5">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="password">رمز عبور</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="" value="" @if(!isset($item)) required @endif tabindex="6">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="email">ایمیل</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ old('email',isset($item) ? $item['email'] : '') }}" {{ isset($item) && $item->email!='' ? 'required' : '' }} tabindex="7">
                                </div>
                            <div class="col-md-4 mb-4">
                                <label for="phone">تلفن ثابت</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            تلفن:
                                        </div>
                                    </div><!-- input-group-prepend -->
                                    <input class="form-control" id="phonenumber" name="phone" placeholder="مثال : 05112345678" type="text" value="{{ old('phone',isset($item) ? $item['phone'] : '') }}" tabindex="8">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="phone">تلفن همراه</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            همراه:
                                        </div>
                                    </div><!-- input-group-prepend -->
                                    <input class="form-control" id="mobile" name="mobile" placeholder="مثال : 09151234567" type="text" value="{{ old('mobile',isset($item) ? $item['mobile'] : '') }}" {{ isset($item) && $item->mobile!='' ? 'required' : '' }} tabindex="9">
                                </div><!-- input-group -->
                            </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="user_privilege">سطح محدودیت</label>
                                        <select class="selectpicker form-control" id="user_privilege" name="user_privilege" tabindex="10">
                                            <option value="1" {{ isset($item) && $item->user_privilege==1 ? 'selected' : '' }}>مدیر کل</option>
                                            <option value="2" {{ isset($item) && $item->user_privilege==2 ? 'selected' : '' }}>مدیر ارشد</option>
                                            <option value="3" {{ isset($item) && $item->user_privilege==3 ? 'selected' : '' }}>اپراتور</option>
                                            <option value="4" {{ isset($item) && $item->user_privilege==4 ? 'selected' : '' }}>همکار</option>
                                            <option value="5" {{ isset($item) && $item->user_privilege==5 ? 'selected' : '' }}>کاربر عادی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="vip_id">انتخاب عضویت ویژه</label>
                                        <select class="selectpicker form-control" id="vip_id" name="vip_id" tabindex="11">
                                            <option value="0" {{ isset($item) && $item->vip_id==1 ? 'selected' : '' }}>بدون عضویت ویژه</option>
                                            @foreach($vip as $vips)
                                                <option value="{{ $vips['id'] }}" {{ isset($item) && $item->vip_id==1 ? 'selected' : '' }}>{{ $vips['vip_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="user_star">امتیاز کاربر</label>
                                        <input type="text" class="form-control" id="user_star" name="user_star" placeholder="" value="{{ old('user_star',isset($item) ? $item['user_star'] : '') }}" tabindex="12">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="star_group_id">گروه امتیاز کاربری</label>
                                        <select class="form-control select2" name="star_group_id" id="star_group_id" tabindex="13">
                                            <option value="0">بدون گروه</option>
                                            @foreach($stargroups as $stargroup)
                                                <option value="{{ $stargroup['id'] }}" {{ isset($item) && $stargroup['id']==$item->star_group_id ? 'selected' : '' }}>{{ $stargroup['group_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="shop_id">فروشگاه کاربر</label>
                                        <select class="form-control select2" name="shop_id" id="shop_id"
                                                tabindex="14">
                                            <option value="0">بدون فروشگاه</option>
                                            @foreach($forooshgahs as $forooshgah)
                                                <option value="{{ $forooshgah['id'] }}" {{ isset($item) && $forooshgah['id']==$item->shop_id ? 'selected' : '' }}>{{ $forooshgah['forooshgah_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cupon">کد تخفیف اختصاصی</label>
                                        <input type="text" class="form-control" id="cupon" name="cupon" placeholder="" value="{{ old('cupon',isset($item) ? $item['cupon'] : '') }}" tabindex="15">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cupon_expire_date">تاریخ پایان کد تخفیف</label>
                                        <input type="text" class="form-control" id="cupon_expire_date" name="cupon_expire_date" placeholder="" value="{{ old('cupon_expire_date',isset($item) ? $item['cupon_expire_date'] : '') }}" tabindex="16">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="address">آدرس</label>
                                    <textarea class="form-control" rows="7" id="address" name="address" placeholder="" tabindex="17">{{ old('address',isset($item) ? $item['address'] : '') }}</textarea>
                                </div>

                            <div class="col-md-6 mb-4">
                                <label class="ckbox"><input type="checkbox" id="user_status" name="user_status" {{ isset($item) && $item->user_status==1 ? 'checked' : '' }} {{ !isset($item) ? 'checked' : '' }} tabindex="18"><span>فعال</span></label>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="ckbox"><input type="checkbox" id="operator_status" name="operator_status" {{ isset($item) && $item->operator_status==1 ? 'checked' : '' }} tabindex="19"><span>قرارگیری به عنوان اپراتور</span></label>
                            </div>

                            <button class="btn btn-primary submit-fn mt-2" type="submit" tabindex="20">ذخیره اطلاعات</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
        <!-- row closed -->

    </div>

@stop

@section('footer')
    <!-- Internal Select2 js-->
    <script src="{{ url('resources/views/admin/assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ url('resources/views/admin/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ url('resources/views/admin/assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ url('resources/views/admin/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ url('resources/views/admin/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ url('resources/views/admin/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ url('resources/views/admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ url('resources/views/admin/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ url('resources/views/admin/assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ url('resources/views/admin/assets/js/select2.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ url('resources/views/admin/assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ url('resources/views/admin/assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ url('resources/views/admin/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ url('resources/views/admin/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ url('resources/views/admin/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ url('resources/views/admin/assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ url('resources/views/admin/assets/js/form-elements.js') }}"></script>
    <!-- Sticky js -->
    <script src="{{ url('resources/views/admin/assets/js/sticky.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ url('resources/views/admin/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ url('resources/views/admin/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{ url('resources/views/admin/assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ url('resources/views/admin/assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
    <script src="{{ url('resources/views/admin/plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ url('resources/views/admin/plugins/input-mask/input-mask.js') }}"></script>
    <script>
        $('#mobile').inputmask("99999999999");
        $('#phonenumber').inputmask("99999999999");
    </script>
@stop
