@extends('panel.layout')

@section('header')
    <title>ثبت شاخه محصولات</title>
    <!--- Internal Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet"/>
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <style>
        .select2 {
            width: 100% !important;
        }

        .jumps-prevent {
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
                    <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i>
                    </button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i>
                    </button>
                </div>
                <div class="mb-3 mb-xl-0">
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-primary">20 مهر 1399</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">منوی کشویی</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                             data-x-placement="bottom-end">
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
                            ثبت دسته بندی جدید
                        </div>
                        <div class="main-content-label mg-b-20">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            @if(Session::has('successMassage'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('successMassage') }}
                                </div>
                            @endif
                            @if(Session::has('errorMassage'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('errorMassage') }}
                                </div>
                            @endif
                        </div>
                        <form class="needs-validation was-validated" method="post"
                              action="@isset($catItem){{ route('admin.restaurantcategory.update',$catItem->id) }}@else{{ route('admin.restaurantcategory.store') }}@endisset">
                            @csrf
                            @isset($catItem)
                                @method('patch')
                            @endisset
                            <div class="form-row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="main_id">شاخه اصلی</label>
                                        <select class="selectpicker form-control" id="main_id" name="main_id"
                                                tabindex="1">
                                            <option value="0">انتخاب کنید</option>
                                            @forelse($cats as $showcat)
                                                <option
                                                    value="{{ $showcat['id'] }}" {{ isset($catItem) && $showcat['id']==$catItem->main_id ? 'selected' : '' }}>{{ $showcat['title'] }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="title">عنوان فارسی</label>
                                    <input type="text" class="form-control" id="title" placeholder="عنوان فارسی"
                                           name="title" value="{{ old('title',isset($catItem) ? $catItem['title'] : '') }}"
                                           tabindex="2">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="english_title">عنوان انگلیسی</label>
                                    <input type="text" class="form-control" id="english_title"
                                           placeholder="عنوان انگلیسی" name="english_title"
                                           value="{{ old('english_title',isset($catItem) ? $catItem['english_title'] : '') }}"
                                           tabindex="2">
                                </div>

                            </div>
                            <button class="btn btn-primary submit-fn mt-2" type="submit" tabindex="5">ذخیره اطلاعات
                            </button>
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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script>
        $('#mobile').inputmask("99999999999");
        $('#phonenumber').inputmask("99999999999");

        var meta_description_total = 160;
        $("#meta_description").on('input change keyup cut paste', function () {
            var meta_description_used = $('#meta_description').val().length;
            if (meta_description_used > meta_description_total) {
                $('#meta_description').css('background-color', 'red');
            } else {
                $('#meta_description').css('background-color', 'white');
            }
        });
    </script>
@stop
