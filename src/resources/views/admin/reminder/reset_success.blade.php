@extends('admin.layouts.reminder')
@section('title', '管理者側_パスワード　再設定　完了画面 | ad_01_06')
@section('content')
    <section class="loginWrap">
        <div class="inner">
            <h2 class="text-center">パスワード再設定（送信完了）</h2>
            <p class="txStyle_02">登録が完了しました。</p>
        </div>
        <!----- /.loginWrap .inner-->
    </section>
    <!----- /.loginWrap-->
    <div class="form-group text-right m-t-20 row">
        <div class="col-12">
            <a href="{{route('admin-login')}}" class="btn btn-custom btn-block btn--md btn-secondary waves-effect waves-light"><i class="fa fa-user" aria-hidden="true"></i>ログイン画面へ</a>
        </div>
    </div>
@endsection