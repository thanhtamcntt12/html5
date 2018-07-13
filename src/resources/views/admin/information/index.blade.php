@extends('admin.layouts.app')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="page-title-box">
            <div class="breadCrumb-custom">
                <ul>
                    <li>
                        <a href="{{ route('admin-home') }}">HOME</a>
                    </li>
                    <li>お知らせ</li>
                </ul>
            </div>
            <div class="ttlStyle_01">
                <div  class="inner">
                    <div class="iconCol">
                        <i class="fa icon-a12_bell" aria-hidden="true"></i>
                    </div>
                    <div  class="ttlCol">
                        <h4>{{ $ttlCol }}</h4>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- .page-title-box -->
        <div class="container-fluid m-t-20">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <section class="col-12">
                                <h2 class="ttlStyle_02">{{ $title }}</h2>
                                <div class="articleWrap_01">
                                    @foreach($items as $key => $value)
                                        <?php
                                            $route_detail = route('admin-info-detail',$value->id);
                                        ?>
                                        @if($highlights_id == $value->id)
                                            <article class="style_01" >
                                                <a href="{{ $route_detail }}">
                                                    <div class="ttlUnit">
                                                        <h2>{{ $value->title }}</h2>
                                                        <div class="upDate">
                                                            <p>{{ date('Y-m-d', strtotime($value->publish_date)) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="summary">
                                                        <p>{!! $value->body !!}</p>
                                                    </div>
                                                </a>
                                            </article>
                                        @else
                                            <article>
                                                <a href="{{ $route_detail }}">
                                                    <div class="ttlUnit">
                                                        <h2>{{ $value->title }}</h2>
                                                        <div class="upDate">
                                                            <p>{{ date('Y-m-d', strtotime($value->publish_date)) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="summary">
                                                        <p>{!! $value->body !!}</p>
                                                        <div class="inlineImg_01 setCenter">
                                                            @if(filter_var($value->image_pic, FILTER_VALIDATE_URL))
                                                                <img src="{!! $value->image_pic !!}" alt="{{ $value->title }}" >
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            </article>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- .articleWrap_01 -->
                                <!-- .articleWrap_01 -->
                                @include('admin.layouts.paging')
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="btnWrap_01">
                        <a href="{{ route('admin-home') }}" class="btn btn-custom btn-dark waves-effect waves-light btn-lg"><i class="fa icon-a05_home" aria-hidden="true"></i>トップページへ戻る</a>
                        <a href="{{ route('admin-info-create') }}" class="btn btn-custom btn-primary waves-effect waves-light btn-lg"><i class="mdi mdi-file"></i>新規作成</a>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div>
        <!-- end container -->
    </div>
    <!-- end content -->
@endsection