$(document).ready(function(){
  $('#add-department').click(function(){
    $.ajax({
      type: 'POST',
      url: 'http://192.168.64.132/clinical-trial-report-tam/public/api/master_departments/add',
      data: {
        created_userid: $('#created_userid').val(),
        updated_userid: $('#updated_userid').val(),
        facility_id: $('#facility_id').val(),
        department_name: $('#department_name').val(),
        phone: $('#phone').val(),
        url: $('#url').val(),
        memo: $('#memo').val()
      },
      success: function(data){
        if(data.success){
          window.location.href="http://192.168.64.132/clinical-trial-report-tam-client/list-department.html";
        }
      }
    });
  });

});
