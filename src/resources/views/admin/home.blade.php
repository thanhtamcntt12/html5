@extends('admin.layouts.app')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">ダッシュボード</h4>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">会員検索</h4>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-12">
                    <input type="text" class="form-control" value="会員検索">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">検索</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">リセット</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">お知らせ</h4>
                        <div class="clearfix"></div>
                    </div>
                    @foreach( $news_lists as $key => $news )
                        @if( $key > 5 )
                            @break
                        @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>{{$news->publish_date}}</h5>
                        </div>
                        <div class="col-sm-12">
                            <p>{{$news->title}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection