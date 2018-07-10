$(document).ready(function(){
 $('#login-form').click(function(){
    $.ajax({
      type: "POST",
      url: 'http://192.168.64.132/clinical-trial-report-tam/public/api/master_users/login',
      data: {
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function(data){
        if(data.success){
          //var firstname = localStorage.getItem(firstname);

          var firstname = localStorage.getItem('firstname');
          console.log(firstname);
          if (firstname != "undefined" && firstname != "null") {
            alert('success');
            console.log(firstname);
          } else {
            alert('error');
          }
          //window.location.href="http://192.168.64.132/clinical-trial-report-tam-client/list-department.html";
        }else{
          alert('error');
          window.location.href="http://192.168.64.132/clinical-trial-report-tam-client/login.html";
        }
      }
    });
  });
});
