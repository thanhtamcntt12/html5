$(document).ready(function(){
  var departments='';
  $.ajax({
    type: "GET",
    url: 'http://192.168.64.132/clinical-trial-report-tam/public/api/master_departments',
    success: function(data){
      // console.log(data);
      if(data.success){
        // console.log(data);
        for(var i=0;i<data.data.length;i++){
        department += '<tr>'+
                  '<td>'+data.data[i].created_userid+'</td>'+
                  '<td>'+data.data[i].updated_userid+'</td>'+
                  '<td>'+data.data[i].facility_id+'</td>'+
                  '<td>'+data.data[i].department_name+'</td>'+
                  '<td>'+data.data[i].phone+'</td>'+
                  '<td>'+data.data[i].url+'</td>'+
                  '<td>'+data.data[i].memo+'</td>'+
                  '<td>'+
                    '<button type="button" class="button1" data-toggle="modal" data-target="#edit-department" onClick="edit('+data.data[i].id+')" >Edit</button>'+
                    '<button type="button" class="button1" data-toggle="modal" data-target="#del-department" onClick="del('+data.data[i].id+')">Delete</button>'+
                  '</td>'+
                '</tr>';
          $('#department').html(department);
        }
      }

    }
  });


});

function edit(id){

    var editdepartment = '';
    $.ajax({
      type: "GET",
      data: {
        id: id
      },
      url: 'http://192.168.64.132/clinical-trial-report-tam/public/api/master_departments/getbyid',
      success: function(data){

        // console.log(data);
        if(data.success){
          console.log(data);
          //console.log(data.data.created_userid);
          editdepartment += '<div class="modal-dialog">'+

            '<div class="modal-content">'+
              '<div class="modal-header">'+
                '<h4 class="modal-title">Edit Department</h4>'+
              '</div>'+
              '<div class="modal-body">'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="hidden" class="form-control" id="add_id" value="'+data.data.id+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-3 col-sm-4">'+
                      '<div class="title8">'+
                        '<p class="title9">created_userid</p>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="text" class="form-control" id="add_created_userid" value="'+data.data.created_userid+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-3 col-sm-4">'+
                      '<div class="title8">'+
                        '<p class="title9">updated_userid</p>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="text" class="form-control" id="add_updated_userid" value="'+data.data.updated_userid+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-3 col-sm-4">'+
                      '<div class="title8">'+
                        '<p class="title9">facility_id</p>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="text" class="form-control" id="add_facility_id" value="'+data.data.facility_id+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-3 col-sm-4">'+
                      '<div class="title8">'+
                        '<p class="title9">department_name</p>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="text" class="form-control" id="add_department_name" name="department_name" value="'+data.data.department_name+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-3 col-sm-4">'+
                      '<div class="title8">'+
                        '<p class="title9">phone</p>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="text" class="form-control" id="add_phone" value="'+data.data.phone+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-3 col-sm-4">'+
                      '<div class="title8">'+
                        '<p class="title9">url</p>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="text" class="form-control" id="add_url" value="'+data.data.url+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+

                '<div class="row title8">'+
                  '<div class="col-sm-12">'+
                    '<div class="col-3 col-sm-4">'+
                      '<div class="title8">'+
                        '<p class="title9">memo</p>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-9 col-sm-8">'+
                      '<div class="title7">'+
                        '<input type="text" class="form-control" id="add_memo" value="'+data.data.memo+'" placeholder="Input field">'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div class="modal-footer">'+
                '<button type="button" id="edit-department" class="button4" onClick="save_edit()">Save</button>'+
                '<button type="button" class="button3" data-dismiss="modal">Close</button>'+
              '</div>'+
            '</div>'+
          '</div>';
         $('#edit-department').html(editdepartment);
        }
      }
    });

}

function save_edit(){
    $.ajax({
      type: "POST",
      url: 'http://192.168.64.132/clinical-trial-report-tam/public/api/master_departments/edit',
      data: {
        id: $('#add_id').val(),
        created_userid: $('#add_created_userid').val(),
        updated_userid: $('#add_updated_userid').val(),
        facility_id: $('#add_facility_id').val(),
        department_name: $('#add_department_name').val(),
        phone: $('#add_phone').val(),
        url: $('#add_url').val(),
        memo: $('#add_memo').val()
      },

      success: function(data){
        console.log(data);
        if(data.success){

          window.location.href="http://192.168.64.132/clinical-trial-report-tam-client/list-department.html";
        }
      }
    });

}


function del(id){
  var deldepartment = '';
  $.ajax({
    type: "POST",
    url: 'http://192.168.64.132/clinical-trial-report-tam/public/api/master_departments/del',
    data: {
      id: id,
    },
    success: function(data){
      console.log(data);
        deldepartment += '<div class="modal-dialog modal-sm">'+
          '<div class="modal-content">'+
            '<div class="modal-body">'+
              '<p>Are you sure</p>'+
              '<button type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>'+
              '<button type="button" class="btn btn-default" data-dismiss="modal">No</button>'+
            '</div>'+
          '</div>'+
        '</div>';
        $('#del-department').html(deldepartment);

    }

  });
}




// for (var i = 0; i < 10; i++) {
    //    department += "<tr>"+
    //               "<td>"+i+"</td>"+
    //               "<td>1</td>"+
    //               "<td>1</td>"+
    //               "<td>ＢＥ試験</td>"+
    //               "<td>診療科ＩＤ：２＿医療法人相生会福岡みらい病院－ＢＥ試験</td>"+
    //               "<td>2017-05-03</td>"+
    //               "<td>2017-12-06</td>"+
    //               "<td>"+
    //                 "<button type='button' class='button1' data-toggle='modal' data-target='#edit-department'>Edit</button>"+
    //                 "<button class='button1'>Delete</button>"+
    //               "</td>"+
    //             "</tr>";

    // }
  // $.ajax({
  //   type: 'GET',
  //   url: 'http://192.168.64.132/clinical-trial-report-tam/public/api/master_departments/getbyid',
  //   success: function(data){
  //     console.log(data);
  //   }
  // });

