<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="FT Technologies Private Limited">
    <meta name="Keywords"
          content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}"
          rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('assets/css-rtl/sidemenu.css') }}">
    <!--  Owl-carousel css-->
    <link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet"/>
    <!-- Maps css -->
    <link href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <!--- Style css -->
    <link href="{{ asset('assets/css-rtl/style.css') }}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{ asset('assets/css-rtl/style-dark.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet">

    <!---Switcher css-->
    <link href="{{ asset('assets/switcher/css/switcher-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">
    <style>
        .slide svg {
            margin-left: 14px;
        }

        .SumoSelect > .optWrapper > .options {
            max-height: 120px !important;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('header')
</head>

<body class="main-body app sidebar-mini">

<!-- Start Switcher -->
<div class="switcher-wrapper ">
    <div class="demo_changer">
        <div class="demo-icon bg_dark"><i class="fa fa-cog fa-spin  text_primary"></i></div>
        <div class="form_holder sidebar-right1">
            <div class="row">
                <div class="swichermainleft border-bottom  text-center">
                    <div class="p-3">
                        <a href="index.html" class="btn btn-primary btn-block mt-0">نمایش دمو</a>
                        <a href="https://www.rtl-theme.com/category/template-html/admin-templates/"
                           class="btn btn-secondary btn-block">خرید</a>
                        <a href="#" class="btn btn-success btn-block">پروفایل</a>
                    </div>
                </div>
                <div class="predefined_styles">
                    <div class="swichermainleft">
                        <h4>سبک پیمایش</h4>
                        <div class="pl-3 pr-3">
                            <a href="horizontal-light/index.html" class="btn btn-danger btn-block mt-0">افقی</a>
                            <a href="index.html" class="btn btn-info btn-block">منوی راست</a>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>حالت های پوستی</h4>
                        <div class="pl-0 pr-0">
                            <a class="wscolorcode blackborder nav-hor navstyle1" href="index.html">
                                تم روشن
                            </a>
                            <a class="wscolorcode blackborder nav-hor navstyle1" href="vertical-dark/index.html">
                                تم تاریک
                            </a>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>حالت های پوستی</h4>
                        <div class="switch_section">
                            <div class="switch-toggle d-flex">
                                <span class="ml-auto">بدنه پیش فرض</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch" id="myonoffswitch7"
                                                                 class="onoffswitch2-checkbox" checked>
                                    <label for="myonoffswitch7" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle d-flex">
                                <span class="ml-auto">سبک 1</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch" id="myonoffswitch6"
                                                                 class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch6" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>بگراند منو با تصویر</h4>
                        <div class="skin-body light-pattern">
                            <button type="button" id="leftmenuimage1" class="bg1 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage2" class="bg2 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage3" class="bg3 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage4" class="bg4 wscolorcode1 blackborder"></button>
                            <button type="button" id="leftmenuimage5" class="bg5 wscolorcode1 blackborder"></button>
                        </div>
                    </div>
                    <div class="swichermainleft">
                        <h4>سبک های منو</h4>
                        <div class="switch_section">
                            <div class="switch-toggle d-flex">
                                <span class="ml-auto">منو رنگی</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch10"
                                                                 class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch10" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle horizontal-Dark-switcher d-flex">
                                <span class="ml-auto">منو تاریک</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch11"
                                                                 class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch11" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle horizontal-light-switcher d-flex">
                                <span class="ml-auto">منو روشن</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch9"
                                                                 class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch9" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle d-flex">
                                <span class="ml-auto">منو گرادینت</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch12"
                                                                 class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch12" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                            <div class="switch-toggle d-flex">
                                <span class="ml-auto">ریست منو</span>
                                <div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch13"
                                                                 class="onoffswitch2-checkbox">
                                    <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Switcher -->

<!-- Loader -->
<div id="global-loader">
    <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="لودر">
</div>
<!-- /Loader -->
<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img
                src="{{ asset('assets/img/brand/logo.png') }}" class="main-logo" alt="لوگو"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img
                src="{{ asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="لوگو"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img
                src="{{ asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="لوگو"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                src="{{ asset('assets/img/brand/favicon-white.png') }}"
                class="logo-icon dark-theme" alt="لوگو"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                         src="{{ asset('assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ auth()->user()->role }}</span>

                </div>
            </div>
        </div>


        <ul class="side-menu">
            <li class="side-item side-item-category">اصلی</li>
            <li class="slide">
                @can('admin-role')
                <a class="side-menu__item" href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd"
                              d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                    <span class="side-menu__label">صفحه اصلی </span></a>
                @endcan
                @can('seller-role')
                <a class="side-menu__item" href="{{ route('seller.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd"
                              d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                    <span class="side-menu__label">صفحه اصلی </span></a>
                @endcan
                @can('user-role')
                <a class="side-menu__item" href="{{ route('user.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd"
                              d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                    <span class="side-menu__label">صفحه اصلی </span></a>
                @endcan
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('show.profile.form') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd"
                              d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                    <span class="side-menu__label">ویرایش پروفایل</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                    </svg>
                    <span class="side-menu__label">آدرس ها</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('address.create') }}">ثبت آدرس جدید</a></li>
                    <li><a class="slide-item" href="{{ route('address.index') }}">مدیریت آدرس ها</a></li>
                </ul>
            </li>
            @can('admin-role')

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                    </svg>
                    <span class="side-menu__label">دسته بندی غذا</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('admin.foodcategory.create') }}">ثبت دسته بندی جدید</a></li>
                    <li><a class="slide-item" href="{{ route('admin.foodcategory.index') }}">مدیریت دسته بندی ها</a></li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                    </svg>
                    <span class="side-menu__label">دسته بندی رستوران</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('admin.restaurantcategory.create') }}">ثبت دسته بندی جدید</a></li>
                    <li><a class="slide-item" href="{{ route('admin.restaurantcategory.index') }}">مدیریت دسته بندی ها</a></li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                    </svg>
                    <span class="side-menu__label">کد تخفیف</span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('admin.discount.create') }}">ثبت کد تخفیف</a></li>
                    <li><a class="slide-item" href="{{ route('admin.discount.index') }}">مدیریت تخفیف ها</a></li>
                </ul>
            </li>
            @endcan

            @can('seller-role')

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                            <path
                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                        </svg>
                        <span class="side-menu__label">لیست غذاها</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('seller.food.create') }}">ثبت غذای جدید</a></li>
                        <li><a class="slide-item" href="{{ route('seller.food.index') }}">مدیریت غذاها</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                            <path
                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                        </svg>
                        <span class="side-menu__label">تنظیمات رستوران</span><i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('seller.restaurant.index') }}">مدیریت رستوران ها</a></li>
                        <li><a class="slide-item" href="{{ route('seller.schedule.create') }}">ثبت زمان بندی</a></li>
                        <li><a class="slide-item" href="{{ route('seller.schedule.index') }}">مدیریت زمان بندی</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                            <path
                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                        </svg>
                        <span class="side-menu__label">فود پارتی</span><i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('seller.foodparty.create') }}">ثبت فود پارتی</a></li>
                        <li><a class="slide-item" href="{{ route('seller.foodparty.index') }}">مدیریت فود پارتی</a></li>
                    </ul>
                </li>
            @endcan


        </ul>
    </div>
</aside>
<!-- main-sidebar -->

<!-- main-content -->
<div class="main-content app-content">
    <!-- main-header opened -->
    <div class="nodisplay main-header sticky side-header nav nav-item">
        <div class="container-fluid">
            <div class="main-header-left ">
                <div class="responsive-logo">
                    <a href="index.html"><img src="{{ asset('assets/img/brand/logo.png') }}"
                                              class="logo-1" alt="لوگو"></a>
                    <a href="index.html"><img src="{{ asset('assets/img/brand/logo-white.png') }}"
                                              class="dark-logo-1" alt="لوگو"></a>
                    <a href="index.html"><img src="{{ asset('assets/img/brand/favicon.png') }}"
                                              class="logo-2" alt="لوگو"></a>
                    <a href="index.html"><img src="{{ asset('assets/img/brand/favicon.png') }}"
                                              class="dark-logo-2" alt="لوگو"></a>
                </div>
                <div class="app-sidebar__toggle" data-toggle="sidebar">
                    <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                    <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                </div>
                <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                    <input class="form-control" placeholder="هر چیزی را جستجو کنید ..." type="search">
                    <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
                </div>
            </div>
            <div class="main-header-right">
                <ul class="nav">
                    <li class="">
                        <div class="dropdown  nav-itemd-none d-md-flex">
                            <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
                               aria-expanded="false">
                                <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                        src="{{ asset('assets/img/flags/us_flag.jpg') }}"
                                        alt="img"></span>
                                <div class="my-auto">
                                    <strong class="mr-2 ml-2 my-auto">انگلیسی</strong>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                                <a href="#" class="dropdown-item d-flex ">
                                    <span class="avatar  ml-3 align-self-center bg-transparent"><img
                                            src="{{ asset('assets/img/flags/french_flag.jpg') }}"
                                            alt="img"></span>
                                    <div class="d-flex">
                                        <span class="mt-2">فرانسه</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar  ml-3 align-self-center bg-transparent"><img
                                            src="{{ asset('assets/img/flags/germany_flag.jpg') }}"
                                            alt="img"></span>
                                    <div class="d-flex">
                                        <span class="mt-2">آلمان</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar ml-3 align-self-center bg-transparent"><img
                                            src="{{ asset('assets/img/flags/italy_flag.jpg') }}"
                                            alt="img"></span>
                                    <div class="d-flex">
                                        <span class="mt-2">ایتالیا</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar ml-3 align-self-center bg-transparent"><img
                                            src="{{ asset('assets/img/flags/russia_flag.jpg') }}"
                                            alt="img"></span>
                                    <div class="d-flex">
                                        <span class="mt-2">روسیه</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar  ml-3 align-self-center bg-transparent"><img
                                            src="{{ asset('assets/img/flags/spain_flag.jpg') }}"
                                            alt="img"></span>
                                    <div class="d-flex">
                                        <span class="mt-2">اسپانیا</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="nav nav-item  navbar-nav-right ml-auto">
                    <div class="nav-link" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="جستجو کردن">
                                <span class="input-group-btn">
										<button type="reset" class="btn btn-default">
											<i class="fas fa-times"></i>
										</button>
										<button type="submit" class="btn btn-default nav-link resp-btn">
											<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11"
                                                                                                        r="8"></circle><line
                                                    x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
										</button>
									</span>
                            </div>
                        </form>
                    </div>
                    <div class="dropdown nav-item main-header-message ">
                        <a class="new nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path
                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span class=" pulse-danger"></span></a>
                        <div class="dropdown-menu">
                            <div class="menu-header-content bg-primary text-right">
                                <div class="d-flex">
                                    <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">پیام ها</h6>
                                    <span class="badge badge-pill badge-warning mr-auto my-auto float-left">علامت گذاری همه</span>
                                </div>
                                <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">شما 4 پیام
                                    خوانده نشده دارید</p>
                            </div>
                            <div class="main-message-list chat-scroll">
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="  drop-img  cover-image  "
                                         data-image-src="{{ asset('assets/img/faces/3.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">پتی کروزر</h5>
                                        </div>
                                        <p class="mb-0 desc">متاسفم اما مطمئن نیستم که چگونه به شما در این زمینه کمک کنم
                                            ......</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">15 مهر 3:55 بعد از ظهر</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image"
                                         data-image-src="{{ asset('assets/img/faces/2.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">جیمی چانگا</h5>
                                        </div>
                                        <p class="mb-0 desc">همه آماده! اکنون وقت آن است که اکنون به سراغ شما بروم
                                            ......</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">مهر 06 01:12 صبح</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image"
                                         data-image-src="{{ asset('assets/img/faces/9.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">گراهام کراکر</h5>
                                        </div>
                                        <p class="mb-0 desc">آیا آماده تحویل کالا هستید ...</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">25 مهر 10:35 صبح</p>
                                    </div>
                                </a>
                            </div>
                            <div class="text-center dropdown-footer">
                                <a href="#">مشاهده همه</a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown nav-item main-header-notification">
                        <a class="new nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class=" pulse"></span></a>
                        <div class="dropdown-menu">
                            <div class="menu-header-content bg-primary text-right">
                                <div class="d-flex">
                                    <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">اطلاعیه</h6>
                                    <span class="badge badge-pill badge-warning mr-auto my-auto float-left">علامت گذاری همه</span>
                                </div>
                                <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">شما 4 اعلان
                                    خوانده نشده دارید</p>
                            </div>
                            <div class="main-notification-list Notification-scroll">
                                <a class="d-flex p-3 border-bottom" href="#">
                                    <div class="notifyimg bg-pink">
                                        <i class="la la-file-alt text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">پرونده های جدید موجود است</h5>
                                        <div class="notification-subtext">10 ساعت پیش</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                                <a class="d-flex p-3" href="#">
                                    <div class="notifyimg bg-purple">
                                        <i class="la la-gem text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">به روزرسانی های موجود</h5>
                                        <div class="notification-subtext">2 روز قبل</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                                <a class="d-flex p-3 border-bottom" href="#">
                                    <div class="notifyimg bg-success">
                                        <i class="la la-shopping-basket text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">سفارش جدید دریافت شد</h5>
                                        <div class="notification-subtext">1 ساعت پیش</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                                <a class="d-flex p-3 border-bottom" href="#">
                                    <div class="notifyimg bg-warning">
                                        <i class="la la-envelope-open text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">بررسی جدید دریافت شد</h5>
                                        <div class="notification-subtext">1 روز پیش</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                                <a class="d-flex p-3 border-bottom" href="#">
                                    <div class="notifyimg bg-danger">
                                        <i class="la la-user-check text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">22 ثبت نام تایید شده</h5>
                                        <div class="notification-subtext">2 ساعت پیش</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                                <a class="d-flex p-3 border-bottom" href="#">
                                    <div class="notifyimg bg-primary">
                                        <i class="la la-check-circle text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">پروژه تصویب شده است</h5>
                                        <div class="notification-subtext">4 ساعت پیش</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer">
                                <a href="#">مشاهده همه</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item full-screen fullscreen-button">
                        <a class="new nav-link full-screen-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path
                                    d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="nav-item" style="margin: auto">
                        <a class="btn btn-primary" href="{{ url('/') }}" target="_blank">نمایش سایت</a>
                    </div>
                    <div class="dropdown main-profile-menu nav nav-item nav-link">
                        <a class="profile-user d-flex" href="#"><img alt=""
                                                                     src="{{ asset('assets/img/faces/6.jpg') }}"></a>
                        <div class="dropdown-menu">
                            <div class="main-header-profile bg-primary p-3">
                                <div class="d-flex wd-100p">
                                    <div class="main-img-user"><img alt=""
                                                                    src="{{ asset('assets/img/faces/6.jpg') }}"
                                                                    class=""></div>
                                    <div class="mr-3 my-auto">
                                        <h6>{{ auth()->user()->name }}</h6>
                                            <span>مدیر کل</span>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item"
                               href=""><i
                                    class="bx bx-cog"></i>مشخصات</a>
                            <a class="dropdown-item"
                               href=""><i
                                    class="bx bx-user-circle"></i> ویرایش آواتار</a>
                            <a class="dropdown-item" href="#"><i class="bx bxs-inbox"></i>صندوق ورودی</a>
                            <a class="dropdown-item" href="#"><i class="bx bx-envelope"></i>پیام ها</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bx bx-log-out"></i>خروج از سیستم</button>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown main-header-message right-toggle">
                        <a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main-header -->

    <!-- container -->
    @yield('content')
    <div class="alert alert-success mb-2" role="alert" id="alertsuccess"
         style="position: absolute;right: 10px;top:10px;display: none;z-index: 999999;">
        عملیات موفقیت آمیز بود.
    </div>
    <div class="alert alert-success mb-2" role="alert" id="alertunsuccessful"
         style="position: absolute;right: 10px;top:10px;display: none;z-index: 999999;">
        عملیات با خطا مواجه شد.
    </div>
</div>
<!-- Container closed -->
<!-- Sidebar-right-->
<div class="sidebar sidebar-left sidebar-animate">
    <div class="panel panel-primary card mb-0 box-shadow">
        <div class="tab-menu-heading border-0 p-3">
            <div class="card-title mb-0">اطلاعیه</div>
            <div class="card-options mr-auto">
                <a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
            <div class="tabs-menu ">
                <!-- Tabs -->
                <ul class="nav panel-tabs">
                    <li class=""><a href="#side1" class="active" data-toggle="tab"><i
                                class="ion ion-md-chatboxes tx-18 ml-2"></i> گپ زدن</a></li>
                    <li><a href="#side2" data-toggle="tab"><i class="ion ion-md-notifications tx-18  ml-2"></i> اطلاعیه</a>
                    </li>
                    <li><a href="#side3" data-toggle="tab"><i class="ion ion-md-contacts tx-18 ml-2"></i> دوستان</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active " id="side1">
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <div class="">
                            <span class="avatar bg-primary brround avatar-md">چ</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>وب سایت های جدید ایجاد شده است</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">30 دقیقه پیش</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <div class="">
                            <span class="avatar bg-danger brround avatar-md">ن</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>برای پروژه بعدی آماده شوید</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">2 ساعت پیش</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <div class="">
                            <span class="avatar bg-info brround avatar-md">س</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>در مورد بحث زنده تصمیم بگیرید</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">3 ساعت پیش</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <div class="">
                            <span class="avatar bg-warning brround avatar-md">ک</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>جلسه ساعت 3:00 بعد از ظهر</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">4 ساعت پیش</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <div class="">
                            <span class="avatar bg-success brround avatar-md">ب</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>برای ارائه آماده شوید</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">1 روز پیش</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <div class="">
                            <span class="avatar bg-pink brround avatar-md">س</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>برای ارائه آماده شوید</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">1 روز پیش</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <div class="">
                            <span class="avatar bg-purple brround avatar-md">ل</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>برای ارائه آماده شوید</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">45 دقیقه قبل</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list d-flex align-items-center p-3">
                        <div class="">
                            <span class="avatar bg-blue brround avatar-md">تو</span>
                        </div>
                        <a class="wrapper w-100 mr-3" href="#">
                            <p class="mb-0 d-flex ">
                                <b>برای ارائه آماده شوید</b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted ml-1"></i>
                                    <small class="text-muted ml-auto">2 روز قبل</small>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane  " id="side2">
                    <div class="list-group list-group-flush ">
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-3">
                                <span class="avatar avatar-lg brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/12.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div>
                                <strong>مادلین</strong> هی! من در دسترس هستم ....
                                <div class="small text-muted">
                                    3 ساعت پیش
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-3">
                                <span class="avatar avatar-lg brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/1.jpg') }}"></span>
                            </div>
                            <div>
                                <strong>آنتونی</strong> محصول جدید راه اندازی ...
                                <div class="small text-muted">
                                    5 ساعت پیش
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-3">
                                <span class="avatar avatar-lg brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/2.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div>
                                <strong>اولیویا</strong> محصول جدید راه اندازی ...
                                <div class="small text-muted">
                                    45 دقیقه قبل
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-3">
                                <span class="avatar avatar-lg brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/8.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div>
                                <strong>مادلین</strong> هی! من در دسترس هستم ....
                                <div class="small text-muted">
                                    3 ساعت پیش
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-3">
                                <span class="avatar avatar-lg brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/11.jpg') }}"></span>
                            </div>
                            <div>
                                <strong>آنتونی</strong> محصول جدید راه اندازی ...
                                <div class="small text-muted">
                                    5 ساعت پیش
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-3">
                                <span class="avatar avatar-lg brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/6.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div>
                                <strong>اولیویا</strong> محصول جدید راه اندازی ...
                                <div class="small text-muted">
                                    45 دقیقه قبل
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-3">
                                <span class="avatar avatar-lg brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/9.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div>
                                <strong>اولیویا</strong> هی! من در دسترس هستم ....
                                <div class="small text-muted">
                                    12 دقیقه قبل
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  " id="side3">
                    <div class="list-group list-group-flush ">
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/9.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">کمربند
                                    موزل
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/11.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">فلوریندا
                                    کاراسکو
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/10.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">آلینا
                                    برنیر
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/2.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">زولا
                                    مکلاوگین
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/13.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">ایسیدرو
                                    هایده
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/12.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">کمربند
                                    موزل
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/4.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">فلوریندا
                                    کاراسکو
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/7.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">آلینا
                                    برنیر
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/2.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">زولا
                                    مکلاوگین
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/14.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">ایسیدرو
                                    هایده
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/11.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">فلوریندا
                                    کاراسکو
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/9.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">آلینا
                                    برنیر
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/15.jpg') }}"><span
                                        class="avatar-status bg-success"></span></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">زولا
                                    مکلاوگین
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="ml-2">
                                <span class="avatar avatar-md brround cover-image"
                                      data-image-src="{{ asset('assets/img/faces/4.jpg') }}"></span>
                            </div>
                            <div class="">
                                <div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">ایسیدرو
                                    هایده
                                </div>
                            </div>
                            <div class="mr-auto">
                                <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel"><i
                                        class="fab fa-facebook-messenger"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Sidebar-right-->
<!-- Message Modal -->
<div class="modal fade" id="chatmodel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right chatbox" role="document">
        <div class="modal-content chat border-0">
            <div class="card overflow-hidden mb-0 border-0">
                <!-- action-header -->
                <div class="action-header clearfix">
                    <div class="float-right hidden-xs d-flex ml-2">
                        <div class="img_cont ml-3">
                            <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                 class="rounded-circle user_img" alt="img">
                        </div>
                        <div class="align-items-center mt-2">
                            <h4 class="text-white mb-0 font-weight-semibold">دنیل اسکات</h4>
                            <span class="dot-label bg-success"></span><span class="mr-3 text-white">آنلاین</span>
                        </div>
                    </div>
                    <ul class="ah-actions actions align-items-center">
                        <li class="call-icon">
                            <a href="#" class="d-done d-md-block phone-button" data-toggle="modal"
                               data-target="#audiomodal">
                                <i class="si si-phone"></i>
                            </a>
                        </li>
                        <li class="video-icon">
                            <a href="#" class="d-done d-md-block phone-button" data-toggle="modal"
                               data-target="#videomodal">
                                <i class="si si-camrecorder"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="true">
                                <i class="si si-options-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><i class="fa fa-user-circle"></i> مشاهده نمایه</li>
                                <li><i class="fa fa-users"></i>دوستان اضافه کنید</li>
                                <li><i class="fa fa-plus"></i> افزودن به گروه</li>
                                <li><i class="fa fa-ban"></i> مسدود کردن</li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="" data-dismiss="modal" aria-label="بستن">
                                <span aria-hidden="true"><i class="si si-close text-white"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- action-header end -->

                <!-- msg_card_body -->
                <div class="card-body msg_card_body">
                    <div class="chat-box-single-line">
                        <abbr class="timestamp">1 مهر 1399</abbr>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            سلام ، حال شما چطور است؟
                            <span class="msg_time">8:40 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <div class="msg_cotainer_send">
                            سلام کانر پیج هستم من خوبم شما چطور؟
                            <span class="msg_time_send">8:55 صبح ، امروز</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            من هم خوب هستم <span class="msg_time">9:00 صبح امروز</span> متشکرم
                            <span class="msg_time"></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <div class="msg_cotainer_send"><span class="msg_time_send">  ساعت 9:05</span>
                            از کانر پیج استقبال
                            <span class="msg_time_send">می کنید</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            آیا می توانید قالب را به روز کنید؟
                            <span class="msg_time">9:07 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            اما من باید برای شما توضیح دهم که چگونه این همه اشتباه <span class="msg_time_send">امروز 9:10 صبح </span>
                            <span class="msg_time_send"></span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            آیا می توانید قالب را به روز کنید؟
                            <span class="msg_time">9:07 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            اما من باید برای شما توضیح دهم که چگونه این همه اشتباه <span class="msg_time_send">امروز 9:10 صبح </span>
                            <span class="msg_time_send"></span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/9.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            آیا می توانید قالب را به روز کنید؟
                            <span class="msg_time">9:07 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="img_cont_msg">
                            <img src="{{ asset('assets/img/faces/6.jpg') }}"
                                 class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            باشه خداحافظ ، بعدا برایت پیامک می کنیم ..
                            <span class="msg_time">9:12 صبح ، امروز</span>
                        </div>
                    </div>
                </div>
                <!-- msg_card_body end -->
                <!-- card-footer -->
                <div class="card-footer">
                    <div class="msb-reply d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="تایپ کردن....">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary ">
                                    <i class="far fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- card-footer end -->
            </div>
        </div>
    </div>
</div>

<!--Video Modal -->
<div id="videomodal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark border-0 text-white">
            <div class="modal-body mx-auto text-center p-7">
                <h5>تماس ویدیویی والکس</h5>
                <img src="{{ asset('assets/img/faces/6.jpg') }}"
                     class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
                <h4 class="mb-1 font-weight-semibold">دنیل اسکات</h4>
                <h6>صدا زدن...</h6>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-video-slash"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle text-white mb-0 mr-3" href="#" data-dismiss="modal"
                               aria-label="بستن">
                                <i class="fas fa-phone bg-danger text-white"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-microphone-slash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Audio Modal -->
<div id="audiomodal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <div class="modal-body mx-auto text-center p-7">
                <h5>تماس صوتی والکس</h5>
                <img src="{{ asset('assets/img/faces/6.jpg') }}"
                     class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
                <h4 class="mb-1  font-weight-semibold">دنیل اسکات</h4>
                <h6>صدا زدن...</h6>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-volume-up bg-light"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle text-white mb-0 mr-3" href="#" data-dismiss="modal"
                               aria-label="بستن">
                                <i class="fas fa-phone text-white bg-success"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape  rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-microphone-slash bg-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div>

<!-- modal -->
<!-- Footer opened -->
<div class="main-footer ht-40">
    <div class="nodisplay container-fluid pd-t-0-f ht-100p">
        <span>کپی رایت © 2020 <a href="#">ولکس</a> . طراحی شده توسط <a href="#">Themefit</a> کلیه حقوق محفوظ است.</span>
    </div>
</div>
<!-- Footer closed -->
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Ionicons js -->
<!--<script src="{{ asset('assets/plugins/ionicons/ionicons.js') }}"></script>-->
<!-- Moment js -->
<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

<!-- Rating js-->
<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>
<!--Internal Sparkline js -->
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Scroll bar Js-->
<script
    src="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- right-sidebar js -->
<script src="{{ asset('assets/plugins/sidebar/sidebar-rtl.js') }}"></script>
<script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>
<!--Internal  Datepicker js -->
<script src="{{ asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!-- Eva-icons js -->
<script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>
<!--Internal  Chart.bundle js -->
<script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Moment js -->
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
<!--Internal  Flot js-->
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.sampledata.js') }}"></script>
<script src="{{ asset('assets/js/chart.flot.sampledata.js') }}"></script>
<!--Internal Apexchart js-->
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>
<!-- Internal Map -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('assets/js/modal-popup.js') }}"></script>
<!--Internal  index js -->
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
<!-- Sticky js -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('assets/js/custom.js') }}"></script><!-- Left-menu js-->
<script src="{{ asset('assets/plugins/side-menu/sidemenu.js') }}"></script>

<!-- Switcher js -->
<script src="{{ asset('assets/switcher/js/switcher-rtl.js') }}"></script>
<script>
    $(document).ready(function () {
        jQuery.ajax({
            url: "{{ url('admin/hamkarrequestcount') }}",
            //async: true,
            type: "GET",
            data: {
                _token: '{{ csrf_token() }}',
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jQuery('#hamkarrequestcount').text(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
                console.log(errorThrown);
            }
        });
        setInterval(function () {
            jQuery.ajax({
                url: "{{ url('admin/hamkarrequestcount') }}",
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#hamkarrequestcount').text(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        }, 60000);

        jQuery.ajax({
            url: "{{ url('admin/ordercount') }}",
            //async: true,
            type: "GET",
            data: {
                _token: '{{ csrf_token() }}',
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jQuery('#ordercount').text(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
            }
        });
        setInterval(function () {
            jQuery.ajax({
                url: "{{ url('admin/ordercount') }}",
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#ordercount').text(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        }, 60000);

        jQuery.ajax({
            url: "{{ url('admin/usercount') }}",
            //async: true,
            type: "GET",
            data: {
                _token: '{{ csrf_token() }}',
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jQuery('#usercount').text(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
            }
        });
        setInterval(function () {
            jQuery.ajax({
                url: "{{ url('admin/usercount') }}",
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#usercount').text(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        }, 60000);

        jQuery.ajax({
            url: "{{ url('admin/productmassagecount') }}",
            //async: true,
            type: "GET",
            data: {
                _token: '{{ csrf_token() }}',
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jQuery('#productmassagecount').text(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
            }
        });
        setInterval(function () {
            jQuery.ajax({
                url: "{{ url('admin/productmassagecount') }}",
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#productmassagecount').text(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        }, 60000);

        jQuery.ajax({
            url: "{{ url('admin/callcount') }}",
            //async: true,
            type: "GET",
            data: {
                _token: '{{ csrf_token() }}',
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jQuery('#callcount').text(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
            }
        });
        setInterval(function () {
            jQuery.ajax({
                url: "{{ url('admin/callcount') }}",
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#callcount').text(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        }, 60000);

        jQuery.ajax({
            url: "{{ url('admin/newsmassagecount') }}",
            //async: true,
            type: "GET",
            data: {
                _token: '{{ csrf_token() }}',
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jQuery('#newsmassagecount').text(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
            }
        });
        setInterval(function () {
            jQuery.ajax({
                url: "{{ url('admin/newsmassagecount') }}",
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#newsmassagecount').text(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        }, 60000);

        jQuery.ajax({
            url: "{{ url('admin/productcatmassagecount') }}",
            //async: true,
            type: "GET",
            data: {
                _token: '{{ csrf_token() }}',
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jQuery('#productcatmassagecount').text(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
            }
        });
        setInterval(function () {
            jQuery.ajax({
                url: "{{ url('admin/productcatmassagecount') }}",
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#productcatmassagecount').text(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        }, 60000);

    });
    $('.removeitem').click(function (e) {
        e.stopPropagation();
        e.preventDefault();
        var href = $(this).attr('href');
        var checkstr = confirm('آیا از حذف این آیتم اطمینان دارید؟');
        if (checkstr == true) {
            console.log('yes!');
            jQuery.ajax({
                url: href,
                //async: true,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                cache: false,
                dataType: 'html',
                success: function (data) {
                    console.log(data);
                    location.reload();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                }
            });
        } else {
            console.log('no!');
        }
    });
</script>
@yield('footer')
</body>
</html>
