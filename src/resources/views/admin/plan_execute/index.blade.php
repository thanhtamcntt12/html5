@extends('admin.layouts.app')

@section('css')
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

<script type="text/javascript">
    $(document).ready(function(){
        $('.copy-item').click(function(){
            var id = $(this).attr('data-id');
            $('.id_plan_execute').val(id);
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
    <h4>Plan達成度一覧</h4>

     <!-- block form search -->
     <div class="form-group">
            <form action=" {{ route('admin-plan-execute-search', ['user_id'=>$user_id]) }} " method="GET">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-1">
                        <select class="form-control" name="">
                            <option>条件</option>
                        </select>
                        @if ($errors->has('type'))
                            <div class="error">{{ $errors->first('type') }}</div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <button type="submit"><span class="fa fa-search"></span><br><span>検索</span></button>
                        <button type="button" onclick="window.location.reload()"><span class="fa fa-repeat"></span><br><span>リセット</span></button>
                    </div>

                </div>
                <!-- option -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h5 class="card-header" style="text-align: right;"><button><span class="fa fa-caret-up"></span></button></h5>
                            <div class="card-body">
                                <form method="post" action="" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="date_record" class="col-sm-2 col-form-label">記録日</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="date_record" value=" {{ date('Y-m-d') }} " class="form-control">
                                                    @if( $errors->has('date_record') )
                                                        <p class="red-text">{{ $errors->first('date_record') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" class="" value="1" name="only_user">
                                                </div>
                                                <label for="only_user" class="col-sm-11 col-form-label">自分が作成、更新したPlan達成度のみ表示</label>
                                                <div class="col-sm-1">
                                                    <input type="checkbox" class="" value="2" name="only_user_2">
                                                </div>
                                                <label for="only_user_2" class="col-sm-11 col-form-label">記録がある項目のみ表示</label>
                                                <div class="col-sm-1">
                                                    <input type="checkbox" class="" value="3" name="only_user_3">
                                                </div>
                                                <label for="only_user_3" class="col-sm-11 col-form-label">セルフコンディショニングを含める</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- option -->
            </form>
        </div>
        <!-- block form search -->
    </div>
    <!-- block form search -->

    <!-- content-table -->
    <div class="content-tabel">
        <p>[1/1] 合計4件</p>
        <!-- start pagination -->
        <!-- <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
        </ul> -->
        @include('admin.layouts.paging')
        <!-- end pagination -->
        <!-- <a href="{{ route('admin-plan-execute-create', ['user_id'=>$user_id]) }}" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-add">新規追加</a> -->
        <!-- table data -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Plan詳細</th>
                    <th>実施日</th>
                    <th>実施タイプ</th>
                    <th>作成者</th>
                    <th>レビュー</th>
                    <th>コピー</th>
                    <th>削除</th>
                    <th>
                        実施日 <br>
                        追加
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($list_plan_execute as $key => $val)
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->registration_name }}</td>
                    <td>{{ $val->execute_date }}</td>
                    <td>{{ $val->created_at }}</td>
                    <td>
                        <a href="{{route('plan-execute-show', ['plan_execute_id'=>'1', 'user_id'=>$user_id])}}" class="fa fa-file-text-o"></a>
                    </td>
                    <td>
                        <a data-id="{{$val->id}}" data-toggle="modal" data-target="#modal-coppy" class="copy-item"><span class="fa fa-files-o"></span></a>
                    </td>
                    <td>
                        <a data-href="{{ route('admin-plan-execute-delete', ['user_id' => $user_id, 'plan_execute_id' =>  $val->id  ]) }}" data-toggle="modal" data-target="#modal-del" class="del-item"><span class="fa fa-trash"></span></a>
                    </td>
                    <td>
                        <a href="{{ route('admin-plan-execute-create', ['user_id'=>$user_id]) }}" data-toggle="modal" data-target="#modal-add"><span class="fa fa-plus-square" style="font-size:24px;"></span></a>
                    </td>
                </tr>
            @endforeach
                
            </tbody>
        </table>
    <!-- table data -->
    <!-- pagination -->
    <!-- <ul class="pagination">
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
        </li>
    </ul> -->
    @include('admin.layouts.paging')
    <!-- end pagination -->

    <!-- modal add item -->
    <!-- Modal -->
    <div class="modal fade" id="modal-add" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Plan実施日</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ $action_from }}" method="POST" role="form">
                        <div class="form-group">
                            <input type="hidden" name="id">
                        </div>
                        <div class="form-group">
                        <label for="">日付</label>
                        <input type="date" id="" name="date" placeholder="Input field">
                        </div>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                    <a href=""   class="btn btn-danger submit-del">はい</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal add item -->

    <!-- modal coppy item -->
    <!-- Modal -->
    <div class="modal fade" id="modal-coppy" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Plan実施日</h4>
                </div>
                <div class="modal-body">
                    <form action=" {{ route('admin-plan-execute-copy', [ 'user_id' => $user_id ]) }} " method="POST" role="form">
                        {{ csrf_field() }}
                    
                        <div class="form-group">
                            <input type="hidden" class="id_plan_execute" name="id" value="">
                        </div>
                        <div class="form-group">
                            <label for="">日付</label>
                            <input type="date" id="date_coppy" name="date_coppy" value=" {{ date('Y-m-d') }} " placeholder="Input field">
                        </div>
                    
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                            <button type="submit" class="btn btn-danger submit-copy">はい</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                    <button type="submit" class="btn btn-danger">はい</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal coppy item -->

    <!-- modal del item -->
    <div class="modal fade" id="modal-del" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                    <a href=""   class="btn btn-danger submit-del">はい</a>
                </div>
            </div>
        </div>
    </div>
  
    </div>
    <!-- content-table -->
@endsection