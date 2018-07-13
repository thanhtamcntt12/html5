<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="/assets/images/favicon_1.ico">

    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            Home Page
        @endif
        @yield('title')
    </title>

    <link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/main.css" rel="stylesheet" type="text/css">

    <script src="/assets/js/modernizr.min.js"></script>

    @yield('css')

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper" class="correctStyle">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.html" class="logo"><i class="mdi mdi-radar"></i> <span>Minton</span></a>
            </div>
        </div>

        @include('admin/layouts/header')

    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="./ad_02_01.html" class="waves-effect waves-primary"><i class="fa icon-a05_home" aria-hidden="true"></i><span>TOP</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa icon-a06_member" aria-hidden="true"></i><span>会員検索</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa icon-a07_setting" aria-hidden="true"></i><span>設定</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa icon-a08_signout" aria-hidden="true"></i><span>ログアウト</span></a>
                    </li>
                    {{--<li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa icon-a06_member" aria-hidden="true"></i>
                        <span>会員一覧</span>
                        <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li>
                                <a href="ui-buttons.html">サンプル</a>
                            </li>
                        </ul>
                    </li>--}}
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->




    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            @yield('content')
        </div>
        @include('admin/layouts/footer')
    </div>
</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- Plugins  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/detect.js"></script>
<script src="/assets/js/fastclick.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<script src="/assets/js/jquery.blockUI.js"></script>
<script src="/assets/js/waves.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/jquery.nicescroll.js"></script>
<script src="/assets/js/jquery.scrollTo.min.js"></script>
<script src="/assets/plugins/switchery/switchery.min.js"></script>

<!-- Custom main Js -->
<script src="/assets/js/jquery.core.js"></script>
<script src="/assets/js/jquery.app.js"></script>

@yield('js')

</body>
</html>