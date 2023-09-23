<?php include(APPPATH . 'views/admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Support Team </h2>
      
      
      <hr>
      <div class="row">
      	<div class="col-lg-12" style="padding: 10px;">
          <div class="dropdown " style="float:right">
          <select class="form-control target" id="state_id" name="state_id">
                    <option value="" selected=" " hidden="">Please Select state</option>
            </select>
          </div>
      	</div>
       <div class="col-lg-12">
       	<table id="myTable" class="table table-bordered">
		  <thead id="myHead" >
		    <tr>
		      <th scope="col">#</th>
		      <!-- <th scope="col">Customer Image</th> -->
           <th scope="col">Cities</th>
		      <th scope="col"> Support Team Name</th>
		      <th scope="col">Support Team  Email</th>
		      <th scope="col">support Team  Mobile No.</th>
          
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
         <input type="hidden" name="support_team_type_id" value= "4">
          <div class="form-group">
            <label for="exampleFormControlSelect2">Support Team Name</label>
           <input type="text" name="name" class="form-control" placeholder="Support Team Name">
          </div>
          
           <div class="form-group">
            <label for="exampleFormControlSelect2">Support Team Email</label>
           <input type="text" name="email" class="form-control" placeholder="Support Team Email">
          </div>


              <div class="form-group">
                <label for="exampleFormControlSelect2">support Team Mobile No.</label>
               <input type="int" name="mobile" class="form-control" placeholder="support Team Mobile No.">
              </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  id="btnSave" class="btn btn-primary">Save changes</button>
          </div>
  
      </div>
     
              
</div>
</div>
</div>

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
          <input type="hidden" name="support_team_id">
            <div class="col form-group">
	      <label>Old Password</label>
	        <input type="credential" name="old_password" class="form-control" name="Old Password"  value="">
	    </div> 
        <div class="col form-group">
          <label>New Password</label>
            <input type="credential" name="new_password" class="form-control" name="Old Password"  value="">
        </div> 
        <div class="col form-group">
          <label>confirm Password</label>
            <input type="credential" name="confirm_password" class="form-control" name="Old Password"  value="">
           </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  id="btnSave" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

</main>
<?php include(APPPATH . 'views/admin/include/footer.php'); ?>

<script type="text/javascript">


$(function(){ 


all_location()
function all_location(){
    $.ajax({
          url:"<?php echo base_url().('api/State_location/fetch_admin_state');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select state</option>';
                var x,i;
                var data=response.data;
                  if (data) {
                    for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                         html+='<option value="'+data[x].state_id+'">'+data[x].state_name+'</option>';
                        
                      }
                }
                
            $('#state_id').html(html);
           
   
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(data.message);

            }
        });


      }


      $( "#state_id" ).on( "change", function() {
        var state_id = $(this).val();
          $.ajax({
                type: 'ajax',
                method:'get',
                url: "<?php echo base_url() ?>api/Admin/fetch_sub_admin",
                async: false,
                data : {
                  state_id:state_id
                },
                dataType: 'json',
                success: function(response) {
                    // body...
                    var html ='';
                    var x,i;
                    var data=response.data;
                        for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                              html+='<tr>'+
                                  '<td>'+i+'</td>'+
                              
                                   '<td>'+data[x].city+'</td>'+
                                  '<td>'+data[x].name+'</td>'+
                                  '<td>'+data[x].email+'</td>'+
                                  '<td>'+data[x].mobile+'</td>'+
                                
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
        } );


          $('#addSupportTeam').click(function(){
          $('#myform')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModal1').find('.modal-title').text('Add Support Team');
          $('#myform').attr('action','<?php echo base_url(); ?>api/Support_team/Add_user');
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
        user_id = $this.val();
        $.ajax({
          url:"<?php echo base_url('api/User/change_is_active/');?>"+sub_admin_id,
          method:"POST",
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
    $('#exampleModal').find('.modal-title').text('Edit Password');
    $('#myform').attr('action','<?php echo base_url(); ?>api/Support_team/update_user_password')

    
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Support_team/fetch_user_get',
        async: false,
        data: {support_team_id: id},
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

    
});   
</script>

