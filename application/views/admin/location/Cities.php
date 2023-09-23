<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2> Cities Location </h2>
      
      <!-- <div class="input-group mb-3">
          <input type="text" class="form-control search_field" id="search_field" placeholder="Search...">
          
        </div> -->
        
      <hr>
      <div class="row">
      	
       <div class="col-lg-12">
       	<table id="myTable" class="table table-bordered">
		  <thead id="myHead" >
		    <tr>
		      <th scope="col">#</th>      
		      <th scope="col"> City Name</th>
		      <th scope="col">Enable</th>
          <th scope="col">Delete</th>
		    </tr>
		  </thead>
      
		  <tbody id="brand_data">
		
		  </tbody>
		</table>
    
       </div>
      </div>
  </div>

 <!-- Modal -->
 

<div class="modal fade" id="myModal_for_delete_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
                Are sure to delete this record.
             </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-outline-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="btdelete">Delete</button>
            </div>
        </div>
    </div>
</div>

</main>
<?php include(APPPATH . 'views/super_admin/include/footer.php'); ?>

<script type="text/javascript">

$(function showallData(){ 
  showallData();
          $('#addSupportTeam').click(function(){
          $('#myform')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModal1').find('.modal-title').text('Add Delivery');
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
        id = $this.val();
        $.ajax({
          url:"<?php echo base_url('api/Location/change_is_active/');?>"+id,
          method:"POST",
          async: false,
          dataType: 'json',  
            success:function(response){
              data=response.data;
              showallData();
              toastr.success(response.message);
              
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              showallData();
              toastr.error(response.message);

            }
        });

});



$('#brand_data').on('click','.item-delete',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message').find('.modal-title').text('Delete Location');
    $('#myModal_for_delete_message').modal('show');

    $('#btdelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Location/delete_location/'+id,
            data: {id: id},
            dataType: 'json',
            success: function(response)
            {
               
                 $('#myModal_for_delete_message').modal('hide');
                            showallData();
                  toastr.success(response.message);
          
            },

            error: function(response) 
            {
              console.log(json_decode(response));
              $('#myModal_for_delete_message').modal('hide');
                         showallData();
              toastr.error(response.message);

            }
        });

    });

});



 function showallData(){

          $.ajax({
                type: 'ajax',
                method:'get',
                url: "<?php echo base_url() ?>api/Location/fetch_all_location",
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
                                              '<input type="checkbox"  id="is_active"  value="'+data[x].id+'" checked>'+
                                              '<span class="slider round"></span>'+
                                              '</label>'+
                                              '</span>';
                                              }
                                              else{
                                              $menu ='<label class="switch">'+
                                              '<input type="checkbox" href="javascript:;" value="'+data[x].id+'" id="is_active" >'+
                                              '<span class="slider round"></span>'+
                                              '</label>'+
                                              '</span>';
                                              }

                           

                              html+='<tr>'+
                                  '<td>'+i+'</td>'+
                                    // '<td>'+image_path+'</td>'+
                                  '<td>'+data[x].city+'</td>'+
                                  
                                    
                                  '<td>'+$menu+'</td>'+
                                  '<td>'+'<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-primary item-delete" data="'+data[x].id+'"><i class="fas fa-trash-alt"></i></a>'+'</td>'


                                  

                                  
                                '</tr>';

                        }

                        $('#brand_data').html(html);  
                    },
                    error: function()
                    {
                          
                    }

            });

        }

});

</script>

