<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?> uploads\skyrabucks_logo.png" type="image/gif/png"> 

    <title>Login</title>

    <link href="<?php echo base_url(); ?>assets_back/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets_back/css/signin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_back/css/toastr.css" rel="stylesheet">

    <!-- Custom styles for this template -->
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo base_url(); ?>assets_back/js/toastr.min.js" referrerpolicy="no-referrer"></script>

         <style type="text/css">
      html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

    </style>

  </head>

  <body class="text-center">
    <form class="form-signin" id="login_form">
      <img class="mb-4" src="<?php echo base_url(); ?>uploads\skyrabucks_logo.png " alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
         <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
          <option selected>Choose user type</option>
            <option value="super_admin">super admin</option>
            <option value="admin">Admin</option>
            <option value="sub_admin">Sub Admin</option>
            <option value="support_team">Support team</option>
            <option value="service_provider">Service provider</option>
            <option value="delivery_partner">Delivery Partner</option>
        </select>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control"  name="user_name" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="user_password" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" id="login_btn" type="button">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </form>
  </body>
</html>

<script type="text/javascript"> 

$(function(){
    
$('#login_btn').click(function(){

  var user_name=$('#inputEmail').val();
  var user_pass=$('#inputPassword').val();
  var table_name=$('#inlineFormCustomSelectPref').val();
  // alert(table_name);
  if(user_name==""){
    toastr.error("please enter user name");
  }else if(user_pass==""){
    toastr.error('Please enter password');
  }else if(table_name==""){
    toastr.error('Please Select user type');
  }
  else{
   // var data = $('#login_form').serialize();
    $.ajax({
        type: 'ajax',
        method:'post',
        url: "<?php echo base_url();?>api/"+table_name+"/login",
        data: {
          user_name:user_name,
          user_password:user_pass
        },
        async: false,
        dataType: 'json',

        success: function(response){

               $('#login_form')[0].reset();
            
                if (response.status) {
                 toastr.success(response.message);
      window.location.href = '<?php echo base_url() ?>'+response.data;
                }
                else{
                   toastr.error(response.message);
                }
                
                 
        },
        error: function(response){

               var text=JSON.parse(response.responseText);
                    toastr.error(text.message);

        }
    });
  }

  });
});


</script>


