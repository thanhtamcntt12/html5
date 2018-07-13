<!DOCTYPE html>
<html class="no-js" lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/images/favicon_1.ico">
    <title>管理者側_ログイン | ad_01_01</title>
    <link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css_ori/main.css" rel="stylesheet" type="text/css">
    <script src="/assets/js/modernizr.min.js"></script>

</head>
<body>
<div class="wrapper-page correctStyle">
    <div class="text-center m-b-30">
        <a href="{{route('admin-home')}}" class="logo-top">
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

    <form class="form-horizontal m-t-20" action="" method="post">
        {{csrf_field()}}
        @if( session('error') )
            {{__('messages.login_error')}}
        @endif
        @if( $errors->has('login_id') )
            {{ $errors->first('login_id') }}
        @endif
        @if( $errors->has('login_pw') )
            {{ $errors->first('login_pw') }}
        @endif
        <section class="loginWrap">
            <div class="inner">
                <h2 class="text-center">ログイン</h2>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group-custom">
                            <span class="setIcon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="text" name="login_id" parsley-trigger="change" required
                                   placeholder="ID" class="form-control" data-parsley-type="alphanum"
                                   data-parsley-type-message="半角英数で入力" data-parsley-required-message="必須入力です"
                                   data-parsley-errors-container="#error-name1">
                        </div>
                        <div id="error-name1" class="m-t-5">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group-custom">
                            <span class="setIcon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input class="form-control" name="login_pw" type="password" required="" placeholder="パスワード"
                                   data-parsley-error-message="必須入力です" data-parsley-errors-container="#error-name2">
                        </div>
                        <div id="error-name2" class="m-t-5">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <a href="{{route('admin-reminder')}}" class="txStyle_01"><i class="fa fa-question-circle"
                                                                                    aria-hidden="true"></i>パスワードをお忘れの方はこちら</a>
                    </div>
                </div>
            </div>
            <!--- /.loginWrap .inner-->
        </section>
        <!--- /.loginWrap-->
        <div class="form-group text-right m-t-20 row">
            <div class="col-12">
                <button type="submit" class="btn btn-custom btn-block btn--md btn-primary waves-effect waves-light"><i
                            class="fa fa-sign-in" aria-hidden="true"></i>ログインする
                </button>
            </div>
        </div>
    </form>
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
    $(document).ready(function () {
        $('form').parsley();
    });
</script>
</body>
</html>
