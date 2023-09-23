<?php include(APPPATH . 'views/sub_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Customer</h2>
      
      <!-- <div class="input-group mb-3">
          <input type="text" class="form-control search_field" id="search_field" placeholder="Search...">
        </div> -->
        
      <hr>
       <div class="col-lg-12">
       	<table id="myTable" class="table table-bordered">
		  <thead id="myHead" >
		    <tr>
		      <th scope="col">#</th>
		      <!-- <th scope="col">Customer Image</th> -->
		      <th scope="col">Customer Name</th>
		      <th scope="col">Customer Email</th>
		      <th scope="col">Customer Mobile No.</th>
		      <th scope="col">is_active</th>
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
         <input type="hidden" name="user_type_id" value="7">
          <div class="form-group">
            <label for="exampleFormControlSelect2">Customer Name</label>
           <input type="text" name="name" class="form-control" placeholder="Customer Name">
          </div>
          
           <div class="form-group">
            <label for="exampleFormControlSelect2">Customer Email</label>
           <input type="text" name="email" class="form-control" placeholder="Customer Email">
          </div>

              <div class="form-group">
                <label for="exampleFormControlSelect2">Customer Mobile</label>
               <input type="int" name="mobile" class="form-control" placeholder="Customer mobile number">
              </div>  
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
              </div> -->
      </div>
    </div>
  </div>
</div>

      </form>
    </div>
  </div>
</div>
 <!--End change password Modal -->
</main>
<?php include(APPPATH . 'views/sub_admin/include/footer.php'); ?>

<script type="text/javascript">

  $(function showallData(){ 
  showallData();

          $('#addcustomer').click(function(){
          $('#myform')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModal1').find('.modal-title').text('Add Customer');
          $('#myform').attr('action','<?php echo base_url(); ?>api/User/Add_user');
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
        customer_id = $this.val();
        $.ajax({
          url:"<?php echo base_url('api/Customer/change_is_active/');?>"+customer_id,
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



 function showallData(){

          $.ajax({
                type: 'ajax',
                method:'get',
                url: "<?php echo base_url() ?>api/Customer/fetch_customer",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    var html ='';
                    var x,i;
                    var data=response.data;
                        for (x =0 ; x<data.length; x++) {
                         var i=x+1
                         if (data[x].is_active=='Y') {

                                $menu ='<label class="switch">'+
                                '<input type="checkbox"  id="is_active"  value="'+data[x].user_id+'" checked>'+
                                '<span class="slider round"></span>'+
                                '</label>'+
                                '</span>';
                                }
                                else{
                                $menu ='<label class="switch">'+
                                '<input type="checkbox" href="javascript:;" value="'+data[x].user_id+'" id="is_active" >'+
                                '<span class="slider round"></span>'+
                                '</label>'+
                                '</span>';
                                }

                              html+='<tr>'+
                                  '<td>'+i+'</td>'+
                                   '<td>'+data[x].full_name+'</td>'+
                                    '<td>'+data[x].email+'</td>'+
                                    '<td>'+data[x].mobile+'</td>'+
                                    // '<td>'+data[x].is_active+'</td>'+
                                    '<td>'+$menu+'</td>'+

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

