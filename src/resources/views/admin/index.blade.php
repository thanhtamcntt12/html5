@extends('admin.layouts.app')

@section('css')
@endsection

@section('js')
@endsection

@section('title', 'Your Title Here')

@section('content')

<div class="page-title-box">
    <div class="breadCrumb-custom">
        <ul>
            <li>
                <a href="./ad_02_01.html">HOME</a>
            </li>
            <li><a href="./ad_03_01.html">会員検索</a></li>
            <li>勅使河原 二郎三郎之助</li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<!-- .page-title-box -->
<div class="container-fluid m-t-2">
    <!--#include virtual="./assets/ssi/profile.html" -->
    @include('admin.user.profile_common')
    <!-- .profileUnit -->
    <!--#include virtual="./assets/ssi/main-nav.html" -->
    @include('admin/layouts/main_nav', ['current_url' => 'userDashboard'])
    <!-- .tabNav_01 -->
    <div class="tabCont_01 card-box">
        <!--#include virtual="./assets/ssi/sub-nav.html" -->
        @include('admin/layouts/sub_nav', ['subNav' => 'object'])
        <!-- .subNav_01 -->
        <div class="inner">
            <div class="row">
                <div class="col-12">
                    <h2 class="ttlStyle_02">会員情報</h2>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <table class="tblStyle_03 table-striped table m-b-0">
                        <thead>
                        <tr>
                            <th scope="col" >会員番号</th>
                            <th scope="col" >会員種別</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1234567890</td>
                            <td>ビジター</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- .tabCont_01 .inner-->
    </div>
    <!-- .tabCont_01 -->
</div>
<!-- end container -->
@endsection