<?php  include(APPPATH.'views/support_team/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Support team</h2>
      <hr>
      <div class="row">
        <div class="col-lg-12">
        

       <div class="card">
  <div class="card-header">
    <h4>Support team Details</h4>

</div>
  <div class="card-body table-responsive" id="admin_data">
        
              </div>
        <div class="col-lg-12" style="padding: 10px;">
          <button type="button" id="btnadd" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i>
            Update
          </button>
          <button type="button" id="btnaddPassword" class="btn btn-outline-primary btn-sm" data-toggle="modal"data-target="#changePassword"><i class="fa fa-plus-circle"></i>
            Change Password
          </button>
        </div>

</div>
      </div>
  </div>


  <!--Update Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="myform" action="">
          <input type="" name=""  hidden=""  >
  <div class="form-group">
    <label for="exampleFormControlSelect2">Support team Name</label>
   <input type="text" name="name" class="form-control" placeholder="First name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Support team Email</label>
   <input type="text" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Support team Phone</label>
   <input type="text" name="mobile" class="form-control" placeholder="Phone number">
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnsaveInfo" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!--End Update Modal -->


 <!--Change password Modal -->

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="myformPassword" action="" >
          <input type="" name="user_id"  hidden=""  >
 
      <div class="col form-group">
        <label>Old Password</label>
          <input type="Password" name="old_password" class="form-control" name="Old Password"  value="">
      </div> 
        <div class="col form-group">
          <label>New Password</label>
            <input type="Password" name="new_password" class="form-control" name="new Password"  value="">
        </div> 
        <div class="col form-group">
          <label>confirm Password</label>
            <input type="Password" name="confirm_password" class="form-control" name="confirm Password"  value="">
        </div> 

    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnsavePassword" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!--End change password Modal -->


</main>
<?php  include(APPPATH.'views/support_team/include/footer.php'); ?>

<script type="text/javascript">

$(function(){  

  showallData();

  $('#btnadd').click(function(){
   
    $('#myform')[0].reset();
    $('#btnsaveInfo').html('Update changes');
    $('#exampleModal').find('.modal-title').text('Edit Profile');
    $('#myform').attr('action','<?php echo base_url(); ?>api/Owner/update_support_team');

      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Owner/support_team>',
        async: false,
        dataType: 'json',
      
        success: function(response){
            data=response.data;
            $('input[name=name]').val(data.name);
            $('input[name=email]').val(data.email);
            $('input[name=mobile]').val(data.mobile);
            // $('input[name=user_id]').val(data.user_id);
           
        },
        error: function(response){
            $('#btnadd').html('Update');
            $('#btnadd').attr("disabled", false);
            

              var text=JSON.parse(response.responseText);
              toastr.error(response.message);

        }
    });

});


  //for save / insert data

$('#btnsaveInfo').click(function(){
    
    $('#btnsaveInfo').attr("disabled", true);
   var url = $('#myform').attr('action');

    var data = $('#myform').serialize();
    // validation 
  
    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
         beforeSend: function() {
        // setting a timeout

            $('#btnsaveInfo').attr("disabled", true);
            
            },
        success: function(response){
               $('#btnsaveInfo').attr("disabled", false);
               $('#myform')[0].reset();
               $('#exampleModal').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                }
                else {
                   toastr.error(response.message);
                }
                
                showallData();
        },
        error: function(response){
            
          
            $('#btnsaveInfo').attr("disabled", false);
            

              //  var text=JSON.parse(response.responseText);
            toastr.error(response.message);

        }
    });
  

});

 $('#btnaddPassword').click(function(){
   
    $('#myformPassword')[0].reset();
    $('#btnsavePassword').html('Update password');
    $('#changePassword').find('.modal-title').text('Update Password');
    $('#myformPassword').attr('action','<?php echo base_url(); ?>api/Owner/update_owner_password');

});


  //for save / insert data

$('#btnsavePassword').click(function(){
   $('#btnaddPassword').attr("disabled", true);
   var url = $('#myformPassword').attr('action');
   var data = $('#myformPassword').serialize();
    // validation 
  
    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
         beforeSend: function() {
        // setting a timeout
  
            $('#btnaddPassword').attr("disabled", true);
            
            },
        success: function(response){
    
                     $('#btnaddPassword').attr("disabled", false);
                if (response.status) {

                  if (response.flag==0) {

                     toastr.error(response.message);
                   }

                    else{
                          $('#myformPassword')[0].reset();
                          $('#changePassword').modal('hide');
                          toastr.success(response.message);
                    }
                }

                
                else{
                   toastr.error(response.message);
                }
                
                showallData();
        },
        error: function(response){
                
                
               $('#btnaddPassword').attr("disabled", false);
            


              //  var text=JSON.parse(response.responseText);
              toastr.error(response.message);

        }
    });
  

});

//function
      function showallData(){
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Owner/support_team",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    var html ='';
                    data=response.data;

                        html+=  '<table class="table table-bordered"><tr>'+
                                    '<td><b> Support team Name :</b></td>'+
                                    '<td>'+data.name+'</td>'+
                               
                              '</tr>';
                        html+=    '<tr>'+
                                '<td ><b>Support team Email :</b></td>'+
                                    '<td>'+data.email+'</td>'
                              '</tr></table>';    

                        html+=    '<tr>'+
                                '<td ><b>Support team Mobile :</b></td>'+
                                    '<td>'+data.mobile+'</td>'
                              '</tr></table>';    
                      
                        $('#admin_data').html(html);  
                    },
                    error: function()
                    {
                   toastr.error('Not Found !');
                    }

            });
        }

 });

</script>

