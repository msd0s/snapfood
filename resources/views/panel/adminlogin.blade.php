<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="FT Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
    <!-- Title -->
    <title>ورود به حساب کاربری</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('resources/views/admin/assets/img/brand/favicon.png') }}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{ url('resources/views/admin/assets/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ url('resources/views/admin/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="{{ url('resources/views/admin/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ url('resources/views/admin/assets/css-rtl/sidemenu.css') }}">
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ url('resources/views/admin/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}" rel="stylesheet">
    <!--- Style css -->
    <link href="{{ url('resources/views/admin/assets/css-rtl/style.css') }}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{ url('resources/views/admin/assets/css-rtl/style-dark.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ url('resources/views/admin/assets/css-rtl/skin-modes.css') }}" rel="stylesheet">

    <!---Switcher css-->
    <link href="{{ url('resources/views/admin/assets/switcher/css/switcher-rtl.css') }}" rel="stylesheet">
    <link href="{{ url('resources/views/admin/assets/switcher/demo.css') }}" rel="stylesheet">	</head>

<body class="main-body bg-primary-transparent">
<!-- Loader -->
<div id="global-loader">
    <img src="{{ url('resources/views/admin/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{ url('resources/views/admin/assets/img/media/login.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex"> <a href="index.html"><img src="{{ url('resources/views/admin/assets/img/brand/favicon.png') }}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">ولکس</h1></div>
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>خوش آمدید!</h2>
                                        <h5 class="font-weight-semibold mb-4">لطفا برای ادامه وارد شوید.
                                        </h5>
                                        <div class="row row-xs" style="margin-bottom: 30px;">
                                            <div class="col-sm-6">
                                                <button class="btn btn-block" id="isemail"><i class="fe fe-at-sign"></i>  ورود با ایمیل</button>
                                            </div>
                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                <button class="btn btn-info btn-block" id="ismobile"><i class="fe fe-phone"></i>  ورود با تلفن همراه</button>
                                            </div>
                                        </div>
                                        <form method="post" action="{{ route('admin.login.submit') }}" id="emailform">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label>ایمیل</label> <input class="form-control" placeholder="ایمیل را وارد کنید" type="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label>رمز عبور</label> <input class="form-control" placeholder="رمز عبور را وارد کنید" type="password" name="password">
                                            </div><button class="btn btn-main-primary btn-block">ورود</button>

                                        </form>
                                        <form method="post" action="{{ route('admin.login.submit') }}" id="mobileform" style="display: none;">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label>موبایل</label> <input class="form-control" placeholder="موبایل را وارد کنید" type="text" name="mobile">
                                            </div>
                                            <div class="form-group">
                                                <label>رمز عبور</label> <input class="form-control" placeholder="رمز عبور را وارد کنید" type="password" name="password">
                                            </div><button class="btn btn-main-primary btn-block">ورود</button>

                                        </form>
                                        <div class="main-signin-footer mt-5">
                                            <p><a href="{{ route('user.forgetpassword.form') }}">رمز عبورتان را فراموش کرده اید؟</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
</div>

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{ url('resources/views/admin/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{ url('resources/views/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Moment js -->
<script src="{{ url('resources/views/admin/assets/plugins/moment/moment.js') }}"></script>

<!-- Rating js-->
<script src="{{ url('resources/views/admin/assets/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ url('resources/views/admin/assets/plugins/rating/jquery.barrating.js') }}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{ url('resources/views/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('resources/views/admin/assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>
<!--Internal Sparkline js -->
<script src="{{ url('resources/views/admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{ url('resources/views/admin/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- right-sidebar js -->
<script src="{{ url('resources/views/admin/assets/plugins/sidebar/sidebar-rtl.js') }}"></script>
<script src="{{ url('resources/views/admin/assets/plugins/sidebar/sidebar-custom.js') }}"></script>
<!-- Eva-icons js -->
<script src="{{ url('resources/views/admin/assets/js/eva-icons.min.js') }}"></script>
<!-- Sticky js -->
<script src="{{ url('resources/views/admin/assets/js/sticky.js') }}"></script>
<!-- custom js -->
<script src="{{ url('resources/views/admin/assets/js/custom.js') }}"></script><!-- Left-menu js-->
<script src="{{ url('resources/views/admin/assets/plugins/side-menu/sidemenu.js') }}"></script>

<!-- Switcher js -->
<script src="{{ url('resources/views/admin/assets/switcher/js/switcher-rtl.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#ismobile').click(function () {
            $('#mobileform').show();
            $('#emailform').hide();
        })
        $('#isemail').click(function () {
            $('#mobileform').hide();
            $('#emailform').show();
        })
    })
</script>
</body>

</html>
