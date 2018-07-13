@extends('admin.layouts.reminder')
@section('title', '管理者側_パスワードリマインダ | 管理者側_パスワード　再設定画面 | ad_01_05')
@section('content')
    <form class="form-horizontal m-t-20" action="{{route('admin-resetpw-post')}}" method="POST">
        {{csrf_field()}}
        @if( session('error') )
            {{__('messages.reminder_error')}}<br>
        @endif
        @if( $errors->has('new_password') )
            {{ $errors->first('new_password') }}<br>
        @endif
        @if( $errors->has('new_password_confirm') )
            {{ $errors->first('new_password_confirm') }}
        @endif
        <input type="hidden" name="email_key" value="{{$email_key}}">
    <section class="loginWrap">
        <div class="inner">
            <h2 class="text-center">パスワード再設定</h2>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group-custom">
                        <span class="setIcon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                       <input type="password" name="new_password" parsley-trigger="change" placeholder="新しいパスワード" class="form-control" data-parsley-required-message="パスワードを入力してください"  data-parsley-required id="pass1" data-parsley-errors-container="#error-name1">
                    </div>
                    <div id="error-name1" class="m-t-5">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group-custom">
                        <input type="password" name="new_password_confirm" parsley-trigger="change" placeholder="新しいパスワード（確認用）" class="form-control" data-parsley-required data-parsley-equalto-message="パスワードが間違っています" data-parsley-type-message="false" data-parsley-required-message="パスワードを入力してください" data-parsley-equalto="#pass1" data-parsley-errors-container="#error-name2">
                    </div>
                    <div id="error-name2" class="m-t-5">
                    </div>
                </div>
            </div>
        </div>
        <!----- /.loginWrap .inner-->
    </section>
    <!----- /.loginWrap-->
    <div class="form-group text-right m-t-20 row">
        <div class="col-12">
            <button type="submit" class="btn btn-custom btn-block btn--md btn-primary waves-effect waves-light"><i class="mdi mdi-cloud-upload"></i>登録する</button>
        </div>
    </div>
    </form>
@endsection
