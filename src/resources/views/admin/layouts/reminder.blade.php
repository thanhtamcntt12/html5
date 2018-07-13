<!DOCTYPE html>
<html class="no-js" lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="/assets/images/favicon_1.ico">
<title>@yield('title')</title>
<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/assets/css_ori/main.css" rel="stylesheet" type="text/css">
<script src="/assets/js/modernizr.min.js"></script>
</head>
<body>
<div class="wrapper-page correctStyle">
    <div class="text-center m-b-30">
        <a href="{{route('admin-login')}}" class="logo-top">
        <picture>
            <source 
        srcset="/assets/images/logo_01.png"
        media="(min-width: 768px)"
        >
            <source 
        srcset="/assets/images/logo_01_sp.png 1x,/assets/images/logo_01_sp@2x.png 2x,/assets/images/logo_01_sp@3x.png 3x,"
        >
            <img 
        src="/assets/images/logo_01.png"
        alt="R BODY PROJECT">
        </picture>
        </a>
    </div>
     @yield('content')
</div>
<footer id="fixedFoot">
    <small>COPYRIGHT © CF Partners CO.,LTD. ALL RIGHTS RESERVED.</small>
</footer>
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

<!-- Parsleyjs -->
<script type="text/javascript" src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>

<!-- Custom main Js -->
<script src="/assets/js/jquery.core.js"></script>
<script src="/assets/js/jquery.app.js"></script>

<!-- userCustom -->
<script src="/assets/js/master.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
</body>
</html>