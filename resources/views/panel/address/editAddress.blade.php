@extends('panel.layout')

@section('header')
    <title>ثبت اطلاعات رستوران</title>
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
        .select2
        {
            width: 100% !important;
            height: 40px;
        }
        .selection,.select2-selection
        {
            height: 40px !important;
        }
        .select2-selection__rendered
        {
            padding-top: 5px;
        }
        .select2-selection__arrow
        {
            margin: 5px 0px 0px 10px !important;
        }
    </style>
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
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-20">
                            ثبت اطلاعات رستوران
                        </div>
                        @include('panel.sections.errors')
                        <form class="needs-validation was-validated" method="post" action="{{ route('address.update',$addressItem->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="title">عنوان آدرس</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ old('title',$addressItem['title']) }}" tabindex="1">
                                    </div>
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
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="address">آدرس رستوران</label>
                                        <textarea class="form-control" id="address" name="address" rows="6" placeholder="" tabindex="8">{{ old('address',$addressItem['address']) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="is_default">آدرس پیش فرض</label>
                                        <select name="is_default" class="form-control" id="is_default">
                                            <option value="1" @if($addressItem['is_default']==1) selected @endif>بله</option>
                                            <option value="0" @if($addressItem['is_default']==0) selected @endif>خیر</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary submit-fn mt-2" type="submit" tabindex="5">ذخیره اطلاعات</button>
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
