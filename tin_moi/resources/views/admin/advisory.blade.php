@extends('master')
@section('title','Tư vấn khách hàng')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tư vấn khách hàng</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default"> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        @if(session('thongbao'))
                            <div class="alert-tb alert alert-success">
                                <span class="fa fa-check"> </span> {{ session('thongbao') }}
                            </div>
                        @endif
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Thông tin</th>
                                        <th>Sản phẩm</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($advisory as $item)
                                    <tr class="odd gradeX">
                                        <td>
                                            <p>{{ $item->name }}</p>
                                            <p><b>{{ $item->email }}</b></p>
                                            <p>{{ $item->content }}</p>
                                        </td>
                                        <td class="center">
                                            <img src="{{ asset('public/img/product/'.$item->image) }}" style="width: 55px"> 
                                            <a href="{{ url('san-pham/'.$item->slug) }}">{{ $item->name_p }}</a>
                                        </td>
                                        <td>
                                            <i class="nndedit btn btn-danger fa fa-trash" editid="{{ $item->id }}" > Xóa </i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div> 


<div class="modal fade nn-modal-delete-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennid" id="dennid" />
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-warning">Xóa</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->

@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/advisory.js') }}"></script> 
@endsection()