<?php $__env->startSection('title','List Product'); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e(trans("admin.cate_p")); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-listpro" id="nn-add-listpro">+ <?php echo e(trans("admin.add")); ?></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if(session('thongbao')): ?>
                            <div class="alert-tb alert alert-success">
                                <span class="fa fa-check"> </span> <?php echo e(session('thongbao')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session('loi')): ?>
                            <div class="alert-tb alert alert-danger">
                                <span class="fa fa-check"> </span> <?php echo e(session('loi')); ?>

                            </div>
                        <?php endif; ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Tên gói cước</th>
                                        <th>Giá cước</th>
                                        <th>Cú pháp đăng ký</th>
                                        <th>Số dịch vụ</th>
                                        <th>Loại dịch vụ</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $listproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listpro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($listpro->listnumber); ?></td>
                                        <td><?php echo e($listpro->listname); ?></td>
                                        <td><?php echo e($listpro->price); ?></td>
                                        <td><?php echo e($listpro->description); ?></td>
                                        <td><?php echo e($listpro->sernum); ?></td>                                        
                                        <td><?php echo e($listpro->modpro($listpro->listidmod)->trname); ?></td> 

                                        <td>
                                          <i class="nneditlistpro btn btn-info fa fa-edit" id="ennlistpro<?php echo e($listpro->id); ?>" description="<?php echo e($listpro->description); ?>" listidmod="<?php echo e($listpro->listidmod); ?>" type="<?php echo e($listpro->type); ?>" editid="<?php echo e($listpro->id); ?>" name="<?php echo e($listpro->namelist($listpro->id)->trname); ?>" imgo="<?php echo e(asset( $listpro->listimg )); ?>"  img="<?php echo e($listpro->listimg); ?>" num="<?php echo e($listpro->listnumber); ?>" ideprice="<?php echo e($listpro->price); ?>" esernum="<?php echo e($listpro->sernum); ?>" ebandwidth="<?php echo e($listpro->bandwidth); ?>" eover_band="<?php echo e($listpro->over_band); ?>" etype="<?php echo e($listpro->type); ?>"> <?php echo e(trans("admin.edit")); ?></i>
                                            <i class="nndeditlistpro btn btn-danger fa fa-trash" img="<?php echo e($listpro->listimg); ?>" editid="<?php echo e($listpro->id); ?>" name="<?php echo e($listpro->namelist($listpro->id)->trname); ?>"> <?php echo e(trans("admin.delete")); ?>

                                            </i>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<!-- model -->

<div class="modal fade nn-modal-add-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm mới gói dịch vụ</h4>
          </div>
          <form class="form-horizontal" method="post" action="list" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
                <?php if(count($errors)>0): ?>
                    <div class="alert-tb alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <i class="fa fa-exclamation-circle"></i> <?php echo e($err); ?><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="nntheloai" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans("admin.theloai")); ?>:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nntheloai">
                                <option value='xxx'>--<?php echo e(trans("admin.theloai")); ?>--</option>
                                <?php $__currentLoopData = $modulepro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ls->id); ?>"> <?php echo e($ls->namelist($ls->id)->trname); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tên gói cước:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="listname" id="listname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Giá cước:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="price" id="idprice" placeholder="Giá gói cước">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> <?php echo e(trans("admin.show")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" value="1" id="nnnumber" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Loại giói:</label>
                        <div class="col-sm-9">
                          <select name="type" id="idtype" class="form-control" >
                            <option value="0">--Trọn gói--</option>
                            <option value="1">Tiện Ích Facebook</option>
                            <option value="2">Tiện Ích Youtube</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nndescription" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Cú pháp:</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="nndescription" id="nndescription" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Số gửi:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="sernum" id="idsernum" placeholder="Số gửi tin nhắn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Dung lượng:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="bandwidth" id="idbandwidth" placeholder="Dunh lượng tốc độ cao">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Cước sinh:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="over_band" id="idover_band" placeholder="Cước phát sinh">
                        </div>
                    </div>

                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans("admin.close")); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans("admin.add")); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-edit-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans("admin.edit")); ?></h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidlistpro" id="ennidlistpro" />
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
                <?php if(count($errors)>0): ?>
                    <div class="alert-tb alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <i class="fa fa-exclamation-circle"></i> <?php echo e($err); ?><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="enntheloai" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans("admin.theloai")); ?>:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="enntheloai" id="enntheloai">
                                <?php $__currentLoopData = $modulepro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ls->id); ?>"> <?php echo e($ls->namelist($ls->id)->trname); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="elistname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tên gói cước:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="listname" id="elistname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Hiển thị:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennnumber" id="ennnumber" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Loại giói:</label>
                        <div class="col-sm-9">
                          <select name="etype" id="idetype" class="form-control" >
                            <option value="0">--Trọn gói--</option>
                            <option value="1">Tiện Ích Facebook</option>
                            <option value="2">Tiện Ích Youtube</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Giá cước:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="eprice" id="ideprice" placeholder="Giá gói cước">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="enndescription" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Cú pháp:</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="enndescription" id="enndescription" placeholder=""></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Số gửi:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="esernum" id="idesernum" placeholder="Số gửi tin nhắn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Dung lượng:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ebandwidth" id="idebandwidth" placeholder="Dunh lượng tốc độ cao">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label">Cước sinh:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="eover_band" id="ideover_band" placeholder="Cước phát sinh">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans("admin.close")); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans("admin.update")); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-delete-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans("admin.delete")); ?></h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidlistpro" id="dennidlistpro" /> 
          <input type="hidden" name="dennimglistpro" id="dennimglistpro" /> 
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete"> <?php echo e(trans("admin.delete")); ?>? <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo e(trans("admin.close")); ?></button>
            <button type="submit" class="btn btn-warning"><?php echo e(trans("admin.delete")); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-add-view-language" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Đa ngôn ngữ - English</h4>
          </div>
          <form class="form-horizontal" method="post" action="listlang/update" enctype="multipart/form-data">
          <input type="hidden" name="vnnidlistpro" id="vnnidlistpro" /> 
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="form-group">
                          <label for="nnenlish" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Name English:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nnenlish" id="nnenlish" placeholder="Name Category">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="nnvietnam" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tên TV:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nnvietnam" id="nnvietnam" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="nnmodule" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Thể loại:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nnmodule" id="nnmodule" disabled>
                          </div>
                      </div>                 
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
              <button type="submit" class="btn btn-info">Cập nhật</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('public/js/admin/listpro.js')); ?>"></script>
  <script type="text/javascript">
    <?php if(session('actionuser')=='add' && count($errors) > 0): ?>
        $('.nn-modal-add-listpro').modal('show');
    <?php endif; ?>
    <?php if(session('actionuser')=='edit' && count($errors) > 0): ?>
        $(document).ready(function(){
          $("#ennlistpro<?php echo e(session('editid')); ?>").trigger('click');
        });
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>