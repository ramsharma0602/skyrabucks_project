<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2> Admin</h2>
      
      <!-- <div class="input-group mb-3">
          <input type="text" class="form-control search_field" id="search_field" placeholder="Search...">
        </div> --> 
      <hr>
      <div class="row">
      	<div class="col-lg-12" style="padding: 10px;">
           <button type="button" id="addadmin" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-plus-circle"></i> Add Admin</button>
      	</div>
        
       <div class="col-lg-12">
       	<table id="myTable" class="table table-bordered">
		  <thead id="myHead" >
		    <tr>
		      <th scope="col">#</th>
		      <!-- <th scope="col">Customer Image</th> -->
		      <th scope="col">Admin Name</th>
		      <th scope="col">Admin Email</th>
		      <th scope="col">Admin Mobile No.</th>
          <th scope="col">Location</th>
		      <th scope="col">is_active</th>
          <th scope="col">Update Password</th>  
		    </tr>
		  </thead>
		  <tbody id="brand_data">
		  </tbody>
		</table>
       </div>
      </div>
  </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         <input type="hidden" name="user_type_id" value="2">
          <div class="form-group">
            <label for="exampleFormControlSelect2">Admin Name</label>
            <input type="text" name="name" class="form-control" placeholder="Admin Name">
          </div>
          
           <div class="form-group">
            <label for="exampleFormControlSelect2">Admin Email</label>
            <input type="text" name="email" class="form-control" placeholder="Admin Email">
          </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Admin Mobile</label>
              <input type="int" name="mobile" class="form-control" placeholder="Admin mobile number">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect2">Admin Password</label>
              <input type="password" name="credential" class="form-control" placeholder="Admin Password">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--Change password Modal -->

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
        <form id="myform" action="" >
          <input type="" name="user_id"  hidden="">
 
	    <div class="col form-group">
	      <label>Old Password</label>
	        <input type="Password" name="old_password" class="form-control" name="Old Password"  value="">
	    </div> 
        <div class="col form-group">
          <label>New Password</label>
            <input type="Password" name="new_password" class="form-control" name="Old Password"  value="">
        </div> 
        <div class="col form-group">
          <label>confirm Password</label>
            <input type="Password" name="confirm_password" class="form-control" name="Old Password"  value="">
        </div> 
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="brand_data" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
 <!--End change password Modal -->
</main>
<?php include(APPPATH . 'views/admin/include/footer.php'); ?>

<script type="text/javascript">

$(function showallData(){ 
  showallData();

          $('#addadmin').click(function(){
          $('#myform')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModal1').find('.modal-title').text('Add Admin');
          $('#myform').attr('action','<?php echo base_url(); ?>api/Super_admin/Add_admin');
      });

 //for save / insert data

$('#btnSave').click(function(){
   var url = $('#myform').attr('action');
    var data = $('#myform').serialize();

    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){


               $('#myform')[0].reset();
               $('#exampleModal1').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                }
                else{
                   toastr.error(response.message);
                }
                
                showallData();
        },

      error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);

                showallData();
        }

    });
});

//Active Status Change
        
$('#brand_data').on('change','#is_active', function() {

   var $this = $( this ),
        admin_id = $this.val();
        $.ajax({
          url:"<?php echo base_url('api/Super_admin/change_is_active/');?>"+admin_id,
          method:"post",
          async: false,
          dataType: 'json',  
            success:function(response){
              data=response.data;
              toastr.success(response.message);
              
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(response.message);

            }
        });

});

//edit
$('#brand_data').on('click', '.item-edit', function(){
    var id = $(this).attr('data');

    $('#exampleModal').modal('show');
    $('#btnSave').html('Update');
    $('#exampleModal').find('.modal-title').text('Edit password');
    $('#myform').attr('action','<?php echo base_url(); ?>api/User/update_user_password')

    
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/User/fetch_user',
        async: false,
        data: {user_id: id},
        dataType: 'json',
        success: function(response){
            
            if (response.status) {
                var data=response.data;
                $('input[name=old_password]').val(data.old_password);
                $('input[name=new_password]').val(data.new_password);
                $('input[name=confirm_password]').val(data.confirm_password);

            }

        },
        error: function(){
             $('#exampleModal').modal('hide');
             toastr.error(response.message);
        }
    });

});


 function showallData(){

          $.ajax({
                type: 'ajax',
                method:'get',
                url: "<?php echo base_url() ?>api/Super_admin/fetch_admin",
                async: false,
                data : {
                  user_type_id:2
                },
                dataType: 'json',
                success: function(response) {
                    // body...
                    var html ='';
                    var x,i;
                    var data=response.data;
                        for (x =0 ; x<data.length; x++) {
                         var i=x+1

                                    if (data[x].profile_images!=null) {
                                      var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[x].user_type_id+'"><img src="<?php echo base_url(); ?>uploads/users_profile/'+data[x].profile_images+'" style="height:50px; width:50px;" ></a>';
                                      }

                                      else{
                                        var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[x].user_type_id+'"><img src="<?php echo base_url(); ?>uploads/users_profile/default.png" style="height:50px; width:50px;" ></a>';
                                        }
                                        
                                          if (data[x].is_active=='Y') {

                                              $menu ='<label class="switch">'+
                                              '<input type="checkbox"  id="is_active"  value="'+data[x].admin_id+'" checked>'+
                                              '<span class="slider round"></span>'+
                                              '</label>'+
                                              '</span>';
                                              }
                                              else{
                                              $menu ='<label class="switch">'+
                                              '<input type="checkbox" href="javascript:;" value="'+data[x].admin_id+'" id="is_active" >'+
                                              '<span class="slider round"></span>'+
                                              '</label>'+
                                              '</span>';
                                              }
                           

                              html+='<tr>'+
                                  '<td>'+i+'</td>'+
                                  // '<td>'+image_path+'</td>'+
                                  '<td>'+data[x].admin_name+'</td>'+
                                  '<td>'+data[x].email+'</td>'+
                                  '<td>'+data[x].mobile+'</td>'+
                                  '<td>'+'<a  style="margin: 5px;" href="<?php echo base_url('Super_admin/State_location/'); ?>'+data[x].admin_id+'" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-circle"></i> State</a>'+'</td>'+

                                  '<td>'+$menu+'</td>'+
                                  '<td>'+'<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-primary item-edit" data="'+data[x].user_id+'"><i class="fas fa-edit"></i></a>'+'</td>'
                                  '<td>'+data[x].credential+'</td>'+
                                  // '<td>'+'<button  style="margin: 5px;"  data=" ' +data[x].user_id +'"  class="btn btn-sm btn-outline-secondary" id="btnaddPassword" ><i class="fas fa-plus-circle"></i> Update Password</button>'+'</td>'+

                                '</tr>';
                        }

                        $('#brand_data').html(html);  
                    },
                    error: function()
                    {
                      var text=JSON.parse(response.responseText);
                      toastr.error(text.message); 
                    }
            });
        }
});

</script>

