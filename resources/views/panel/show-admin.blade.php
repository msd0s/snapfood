@extends('admin.layout')

@section('header')
    <title>مدیریت کاربران</title>
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
                            <h4 class="card-title mg-b-0">جدول کاربران</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top userlist-table">
                            <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>کاربر</span></th>
                                    <th class="wd-lg-20p"><span></span></th>
                                    <th class="wd-lg-20p"><span>تاریخ عضویت</span></th>
                                    <th class="wd-lg-20p"><span>شماره همراه</span></th>
                                    <th class="wd-lg-20p"><span>سطح کاربر</span></th>
                                    <th class="wd-lg-20p"><span>وضعیت</span></th>
                                    <th class="wd-lg-20p">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        <img alt="آواتار" class="rounded-circle avatar-md mr-2" src="{{ url('/resources/views/admin/assets/img/faces/1.jpg') }}">
                                    </td>
                                    <td>{{ $admin['fname'].' '.$admin['lname'] }}</td>
                                    <td>
                                        {{ $admin['created_at'] }}
                                    </td>
                                    <td>
                                        <a href="#">{{ $admin['mobile'] }}</a>
                                    </td>
                                    <td>
                                        @if($admin['user_privilege']==1)
                                                مدیر کل
                                            @elseif($admin['user_privilege']==2)
                                                مدیر ارشد
                                            @elseif($admin['user_privilege']==3)
                                                اپراتور
                                            @elseif($admin['user_privilege']==4)
                                                همکار
                                            @elseif($admin['user_privilege']==5)
                                                کاربر عادی
                                            @else
                                                نامشخص
                                            @endif
                                    </td>
                                    <td class="text-center">
                                        @if($admin['user_status']==1)
                                            <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>فعال</span>
                                        @elseif($admin['user_status']==0)
                                            <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div> غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="las la-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.profileupdate.form',$admin['id']) }}" class="btn btn-sm btn-info">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.destroy',$admin['id']) }}" class="btn btn-sm btn-danger">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $admins->appends(['sort' => 'id'])->links() }}
                    </div>
                </div>
            </div><!-- COL END -->
        </div>
        <!-- row closed  -->
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

        $('.pagination').attr('class','pagination mt-4 mb-0 float-left');
    </script>
@stop
