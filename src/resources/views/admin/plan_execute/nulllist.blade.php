@extends('admin.layouts.app')
@section('css')
    <style>

        .red-text
        {
            color:red;
        }
        .grow-text
        {
            color: #CCCCCC;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.del-item').click(function(){
                var href = $(this).attr('data-href');
                $('.submit-del').attr('href',href);
            });
        });
    </script>

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-1">
                <div class="card-box widget-user">
                    <div>
                        <img src="/assets/images/users/avatar-1.jpg" class="img-responsive rounded-circle" alt="user">
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="padding-top:50px">
                会員番号：1134　　　　

            </div>
            <div class="col-md-2" style="padding-top:50px">
                　氏名：小林　太郎
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item ">
                                <a class="nav-link disabled" href="#">ダッシュボード</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link disabled" href="#">プロフィール</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link " href="#">S・O ・ A ・ P管理</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">ケガ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <nav>
                            <a href="#">初回（アンケート・Subjective）</a> <span><b>|</b></span>
                            <a href="#">Subjective</a> <span><b>|</b></span>
                            <a href="#">Objective</a> <span><b>|</b></span>
                            <a href="#">Assessment</a> <span><b>|</b></span>
                            <a href="#" style="text-decoration: underline">Plan</a> <span><b>|</b></span>
                            <a href="#">Plan達成度管理</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h4>Plan一覧</h4>
        <div class="text-center">
            <p style="display:inline-block;">
                作成可能なプランがまだありません。 <br>
                下記のボタンよりPlanを作成することができます。
            </p>
        </div>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" style="color: #ffffff; background: #17375E !important; border: 0 !important; font-weight: bold;">Planを作成する</a>
        </div>
    </div>
@endsection
