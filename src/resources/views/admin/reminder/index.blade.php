@extends('admin.layouts.reminder')
@section('title', '管理者側_パスワードリマインダ | ad_01_02')
@section('content')
    <form class="form-horizontal m-t-20" action="{{route('admin-reminder-token')}}" method="POST">
       {{csrf_field()}}
        @if( session('error') )
            {{__('messages.reminder_error')}}<br>
        @endif
        @if( $errors->has('email') )
            {{ $errors->first('email') }}<br>
        @endif
        @if( $errors->has('email_confirm') )
            {{ $errors->first('email_confirm') }}
        @endif
    <section class="loginWrap">
        <div class="inner">
            <h2 class="text-center">パスワードをお忘れの方</h2>
            <p class="font-13 m-b-20">お客様のご登録いただいているメールアドレスをご入力ください。</p>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group-custom">
                        <span class="setIcon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                       <input type="email" name="email" parsley-trigger="change" placeholder="メールアドレス" class="form-control" data-parsley-required data-parsley-error-message="メールアドレスを入力してください" data-parsley-type="email" id="email1" data-parsley-errors-container="#error-name1">
                    </div>
                    <div id="error-name1" class="m-t-5">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group-custom">
                        <input type="email" name="email_confirm" parsley-trigger="change" placeholder="メールアドレス（確認用）" class="form-control" data-parsley-required data-parsley-equalto-message="メールアドレスが間違っています" data-parsley-type-message="false" data-parsley-required-message="メールアドレスを入力してください" data-parsley-type="email" data-parsley-equalto="#email1" data-parsley-errors-container="#error-name2">
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
            <button type="submit" class="btn btn-custom btn-block btn--md btn-primary waves-effect waves-light"><i class="fa fa-paper-plane" aria-hidden="true"></i>送信する</button>
        </div>
    </div>
    </form>
@endsection
