@extends('panel.layout')

@section('header')
<title>مدیریت کدهای تخفیف</title>
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
        .pagination span
        {
            margin-right: 4px;
            border-radius: 4px;
        }
    </style>
@stop

@section('content')


    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">داشبورد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ لیست کاربران</span>
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
        <!--Row-->
        <div class="row row-sm">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">لیست غذاها</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('panel.sections.errors')
                        <div class="table-responsive border-top userlist-table">
                            <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>نام غذا</span></th>
                                    <th class="wd-lg-20p"><span>قیمت</span></th>
                                    <th class="wd-lg-20p"><span>تعداد</span></th>
                                    <th class="wd-lg-20p">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($foods as $food)
                                    <tr>
                                        <td>{{ $food['name'] }}</td>
                                        <td>{{ $food['price'] }}</td>
                                        <td>{{ $food['count'] }}</td>
                                        <td>
                                            <a href="{{ route('seller.food.edit',$food['id']) }}" class="btn btn-sm btn-info">
                                                <i class="las la-pen"></i>
                                            </a>
                                            <form action="{{ route('seller.food.destroy',$food['id']) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class=" btn btn-sm btn-danger"><i class="las la-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--{{ $cupons->appends(['sort' => 'id'])->links() }}--}}
                    </div>
                </div>
            </div><!-- COL END -->
        </div>
        <!-- row closed  -->
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

        $('.pagination').attr('class','pagination mt-4 mb-0 float-left');
    </script>
@stop
