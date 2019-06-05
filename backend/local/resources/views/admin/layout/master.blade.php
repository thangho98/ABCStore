<!doctype html>
<html lang="vi">

<head>
    <base href="{{asset('public/admin')}}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title') - ABC Store</title>

    <meta name="description"
        content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description"
        content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    @yield('add_css_and_script')

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
    <link rel="stylesheet" href="assets/css/print.css">
    
</head>

<body>
    <div class="darktheme"></div>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
        <!-- Side Overlay-->
        <aside id="side-overlay" class="font-size-sm">
            <!-- Side Header -->
            <div class="content-header border-bottom">
                <!-- User Avatar -->
                <a class="img-link mr-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar10.jpg" alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <div class="ml-2">
                    <a class="link-fx text-dark font-w600" href="javascript:void(0)">Thái Thăng</a>
                </div>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout"
                    data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times text-danger"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <!-- Side Overlay Tabs -->
                <div class="block block-transparent pull-x pull-t">
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#so-overview">
                                <i class="fa fa-fw fa-coffee text-gray mr-1"></i> Tổng quan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#so-sales">
                                <i class="fa fa-fw fa-chart-line text-gray mr-1"></i> Bán hàng
                            </a>
                        </li>
                    </ul>
                    <div class="block-content tab-content overflow-hidden">
                        <!-- Overview Tab -->
                        <div class="tab-pane pull-x fade fade-left show active" id="so-overview" role="tabpanel">
                            <!-- Activity -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Hoạt động gần đây</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <!-- Activity List -->
                                    <ul class="nav-items mb-0">
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="si si-wallet text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Bán mới ($ 15)</div>
                                                    <div class="text-success">Quản trị mẫu</div>
                                                    <small class="text-muted">3 phút trước</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="si si-pencil text-info"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Bạn đã chỉnh sửa tập tin</div>
                                                    <div class="text-info">
                                                        <i class="fa fa-file-text"></i> Documentation.doc
                                                    </div>
                                                    <small class="text-muted">15 phút trước</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="si si-close text-danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Dự án đã xóa</div>
                                                    <div class="text-danger">Bộ biểu tượng đường</div>
                                                    <small class="text-muted">4 giờ trước</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- END Activity List -->
                                </div>
                            </div>
                            <!-- END Activity -->

                            <!-- Online Friends -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Trực tuyến</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <!-- Users Navigation -->
                                    <ul class="nav-items mb-0">
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48"
                                                        src="assets/media/avatars/avatar8.jpg" alt="">
                                                    <span
                                                        class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Andrea Gardner</div>
                                                    <div class="font-w400 text-muted">Copywriter</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48"
                                                        src="assets/media/avatars/avatar11.jpg" alt="">
                                                    <span
                                                        class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Jose Mills</div>
                                                    <div class="font-w400 text-muted">Web Developer</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48"
                                                        src="assets/media/avatars/avatar7.jpg" alt="">
                                                    <span
                                                        class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Carol Ray</div>
                                                    <div class="font-w400 text-muted">Web Designer</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48"
                                                        src="assets/media/avatars/avatar5.jpg" alt="">
                                                    <span
                                                        class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Megan Fuller</div>
                                                    <div class="font-w400 text-muted">Photographer</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar img-avatar48"
                                                        src="assets/media/avatars/avatar12.jpg" alt="">
                                                    <span
                                                        class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Jose Parker</div>
                                                    <div class="font-w400 text-muted">Graphic Designer</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- END Users Navigation -->
                                </div>
                            </div>
                            <!-- END Online Friends -->

                            <!-- Quick Settings -->
                            <div class="block mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Cài đặt nhanh</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <!-- Quick Settings Form -->
                                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                        <div class="form-group">
                                            <p class="font-w600 mb-2">
                                                Trạng thái trực tuyến
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="so-settings-check1" name="so-settings-check1" checked>
                                                <label class="custom-control-label" for="so-settings-check1">Hiển thị
                                                    trạng thái của bạn cho tất cả</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <p class="font-w600 mb-2">
                                                Cập nhật tự động
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="so-settings-check2" name="so-settings-check2" checked>
                                                <label class="custom-control-label" for="so-settings-check2">Cập nhật
                                                    thường xuyên</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <p class="font-w600 mb-1">
                                                Cảnh báo ứng dụng
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="so-settings-check3" name="so-settings-check3" checked>
                                                <label class="custom-control-label" for="so-settings-check3">Những thông
                                                    báo thư điện tử</label>
                                            </div>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="so-settings-check4" name="so-settings-check4" checked>
                                                <label class="custom-control-label" for="so-settings-check4">Thông báo
                                                    SMS</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <p class="font-w600 mb-1">
                                                API
                                            </p>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="so-settings-check5" name="so-settings-check5" checked>
                                                <label class="custom-control-label" for="so-settings-check5">Cho phép
                                                    truy cập</label>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Quick Settings Form -->
                                </div>
                            </div>
                            <!-- END Quick Settings -->
                        </div>
                        <!-- END Overview Tab -->

                        <!-- Sales Tab -->
                        <div class="tab-pane pull-x fade fade-right" id="so-sales" role="tabpanel">
                            <div class="block mb-0">
                                <!-- Stats -->
                                <div class="block-content">
                                    <div class="row items-push pull-t">
                                        <div class="col-6">
                                            <div class="font-w700 text-uppercase">Bán hàng</div>
                                            <a class="link-fx font-size-h3 font-w300"
                                                href="javascript:void(0)">22.030</a>
                                        </div>
                                        <div class="col-6">
                                            <div class="font-w700 text-uppercase">Cân đối</div>
                                            <a class="link-fx font-size-h3 font-w300"
                                                href="javascript:void(0)">$4.589,00</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Stats -->

                                <!-- Today -->
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="font-w600 text-uppercase">Hôm nay</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="ext-muted">$996</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <ul class="nav-items push">
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $249</div>
                                                    <small class="text-muted">3 min ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $129</div>
                                                    <small class="text-muted">50 min ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <small class="text-muted">2 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $499</div>
                                                    <small class="text-muted">3 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END Today -->

                                <!-- Yesterday -->
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="font-w600 text-uppercase">Yesterday</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="text-muted">$765</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <ul class="nav-items push">
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $249</div>
                                                    <small class="text-muted">26 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Product Purchase - $50</div>
                                                    <small class="text-muted">28 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <small class="text-muted">29 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">Paypal Withdrawal - $300</div>
                                                    <small class="text-muted">37 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $129</div>
                                                    <small class="text-muted">39 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <small class="text-muted">45 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-dark media py-2" href="javascript:void(0)">
                                                <div class="mr-3 ml-2">
                                                    <i class="fa fa-fw fa-circle text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="font-w600">New sale! + $499</div>
                                                    <small class="text-muted">46 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- More -->
                                    <div class="text-center">
                                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                            <i class="fa fa-arrow-down mr-1"></i> Load More..
                                        </a>
                                    </div>
                                    <!-- END More -->
                                </div>
                                <!-- END Yesterday -->
                            </div>
                        </div>
                        <!-- END Sales Tab -->
                    </div>
                </div>
                <!-- END Side Overlay Tabs -->
            </div>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="index.html">
                    <i class="fa fa-circle-notch text-primary"></i>
                    <span class="smini-hide">
                        <span class="font-w700 font-size-h5">ABC</span> <span class="font-w400">Store</span>
                    </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Color Variations -->
                    <div class="dropdown d-inline-block ml-3">
                        <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="si si-drop"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0"
                            aria-labelledby="sidebar-themes-dropdown">
                            <!-- Color Themes -->
                            <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme" data-theme="default" href="#">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" href="#">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme" data-theme="assets/css/themes/city.min.css" href="#">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="#">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme" data-theme="assets/css/themes/modern.min.css" href="#">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" href="#">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </a>
                            <!-- END Color Themes -->

                            <div class="dropdown-divider"></div>

                            <!-- Sidebar Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                                <span>Sidebar Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                                <span>Sidebar Dark</span>
                            </a>
                            <!-- Sidebar Styles -->

                            <div class="dropdown-divider"></div>

                            <!-- Header Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                                <span>Header Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                                <span>Header Dark</span>
                            </a>
                            <!-- Header Styles -->
                        </div>
                    </div>
                    <!-- END Themes -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close"
                        href="javascript:void(0)">
                        <i class="fa fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
            <!-- END Side Header -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="{{asset('admin/home')}}">
                            <i class="nav-main-link-icon si si-speedometer"></i>
                            <span class="nav-main-link-name">Bảng điều khiển</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Quản trị</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-energy"></i>
                            <span class="nav-main-link-name">Quản lý</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/category')}}">
                                    <span class="nav-main-link-name">Danh mục</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/product')}}">
                                    <span class="nav-main-link-name">Sản phẩm</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/promotion')}}">
                                    <span class="nav-main-link-name">Khuyến mãi</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/brand')}}">
                                    <span class="nav-main-link-name">Thương hiệu</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/provider')}}">
                                    <span class="nav-main-link-name">Nhà cung cấp</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/employees')}}">
                                    <span class="nav-main-link-name">Nhân viên</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/customer')}}">
                                    <span class="nav-main-link-name">Khách hàng</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/comment')}}">
                                    <span class="nav-main-link-name">Đánh giá</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-chart"></i>
                            <span class="nav-main-link-name">Báo cáo</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_pages_error_all.html">
                                    <span class="nav-main-link-name">Doanh thu</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="op_error_400.html">
                                    <span class="nav-main-link-name">Sản phẩm</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="op_error_401.html">
                                    <span class="nav-main-link-name">Hoa hồng</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="op_error_403.html">
                                    <span class="nav-main-link-name">Lương nhân viên</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="op_error_404.html">
                                    <span class="nav-main-link-name">Ai đang online</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="op_error_404.html">
                                    <span class="nav-main-link-name">Trạng thái</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading">Nhân viên</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-credit-card"></i>
                            <span class="nav-main-link-name">Bán hàng</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/cart')}}">
                                    <span class="nav-main-link-name">Đặt hàng</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{asset('admin/orders')}}">
                                    <span class="nav-main-link-name">Đơn hàng</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{asset('admin/guarantee')}}">
                            <i class="nav-main-link-icon si si-grid"></i>
                            <span class="nav-main-link-name">Bảo hành</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{asset('admin/invoice')}}">
                            <i class="nav-main-link-icon si si-note"></i>
                            <span class="nav-main-link-name">Nhập hàng</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-layers"></i>
                            <span class="nav-main-link-name">Kho hàng</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_comp_loaders.html">
                                    <span class="nav-main-link-name">Nhập kho</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_comp_image_cropper.html">
                                    <span class="nav-main-link-name">Lập báo cáo</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_comp_appear.html">
                                    <span class="nav-main-link-name">Xuất kho</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-main-heading">Hệ thống</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-wrench"></i>
                            <span class="nav-main-link-name">Hệ thống</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                    <span class="nav-main-link-name">Cài đặt</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">Người dùng</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{asset('admin/user')}}">
                                            <span class="nav-main-link-name">Tài khoản</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{asset('admin/permission')}}">
                                            <span class="nav-main-link-name">Phân quyền</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">Cửa hàng</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="#">
                                            <span class="nav-main-link-name">Thuế</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="#">
                                            <span class="nav-main-link-name">Tình trạng kho</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="#">
                                            <span class="nav-main-link-name">Tình trạng đơn hàng</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-lock"></i>
                            <span class="nav-main-link-name">Bảo trì</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_pages_auth_all.html">
                                    <span class="nav-main-link-name">Sao lưu/phục hồi</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="op_auth_signin.html">
                                    <span class="nav-main-link-name">Tải lên</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="op_auth_signin2.html">
                                    <span class="nav-main-link-name">Nhật kí lỗi</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        @include('admin.layout.header')
        <!-- END Header -->

        <!-- Main Container -->
        @yield('main')
        <!-- END Main Container -->

        {{-- Popup show --}}
        @yield('popup')
        {{-- End Popup show --}}

        <!-- Footer -->
        @include('admin.layout.footer')
        <!-- END Footer -->

        <!-- Apps Modal -->
        <!-- Opens from the modal toggle button in the header -->
        <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-top modal-sm" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Apps</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny">
                                <div class="col-6">
                                    <!-- CRM -->
                                    <a class="block block-rounded block-themed bg-default" href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-speedometer fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                CRM
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END CRM -->
                                </div>
                                <div class="col-6">
                                    <!-- Products -->
                                    <a class="block block-rounded block-themed bg-danger" href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-rocket fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                Products
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END Products -->
                                </div>
                                <div class="col-6">
                                    <!-- Sales -->
                                    <a class="block block-rounded block-themed bg-success mb-0"
                                        href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-plane fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                Sales
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END Sales -->
                                </div>
                                <div class="col-6">
                                    <!-- Payments -->
                                    <a class="block block-rounded block-themed bg-warning mb-0"
                                        href="javascript:void(0)">
                                        <div class="block-content text-center">
                                            <i class="si si-wallet fa-2x text-white-75"></i>
                                            <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                Payments
                                            </p>
                                        </div>
                                    </a>
                                    <!-- END Payments -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->
    </div>
    <!-- END Page Container -->

    <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
    <script src="assets/js/oneui.core.min.js"></script>

    <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="assets/js/oneui.app.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    @yield('scriptjs')
</body>

</html>