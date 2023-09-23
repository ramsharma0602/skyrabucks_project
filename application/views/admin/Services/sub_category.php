<?php  include(APPPATH.'views/super_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Sub Service Management</h2>
      <hr>
      <div class="row">
      	<div class="col-lg-12" style="padding: 12px;">
      		<button type="button" id="btnadd" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Create Sub Category</button>
      	</div>
       <div class="col-lg-12">
        
        <br>

       	<table class="table table-bordered">
        		  <thead>
        		    <tr>
        		      <th scope="col">#</th>
                  <!-- <th scope="col">Main category Name</th> -->
        		      <th scope="col">Sub category Name</th>
        		      <th scope="col">Sub category Image</th>
        		      <th scope="col">Action</th>
        		    </tr>
        		  </thead>
        		  <tbody id="sub_category_data">
        		  </tbody>
	   	</table>
       </div>
      </div>
  </div>

    <!-- Modal -->
  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="hidden" name="sub_service_id">
        
            <div class="form-group">
              <label for="exampleFormControlSelect2">Service Name</label>
             <input type="text" name="sub_service_name" class="form-control" placeholder="Service name">
            </div>-->
            <!-- <div class="form-group">
              <label for="exampleFormControlSelect2">Category Image</label>
             <input type="text" name="category" class="form-control" placeholder="Category Image">
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

  <div class="modal fade" id="myModal_for_delete_message2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                Are you sure to delete this image.
             </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-outline-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="btdelete2">Delete</button>
            </div>
        </div>
    </div>
</div> -->

  
   <!-- sub Category image Modal -->

   <div class="modal fade" id="category_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Select Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
          <form action="" method="post" enctype="multipart/form-data" id="skform">
      <div class="modal-body">
         <div align="center" id="alert_body">
            <input type="text" hidden="" name="display_content_id" >
              <input type="file" name="upload" id="upload" accept="image/*" required="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal" id="image_crop_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            
            <h4 class="modal-title">Upload & Crop Image</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-8 text-center">
              <div id="image" style="width:250px; margin-top:20px"></div>
            </div>
            <div class="col-md-4" style="padding-top:20px;">
              <br />
              <br />
              <br/>
              
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success crop_image">Crop & Upload Image</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>

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

<div class="modal fade" id="myModal_for_delete_message2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                Are sure to delete this image.
             </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-outline-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="btdelete2">Delete</button>
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
  <form id="myform">
      <div class="modal-body">

            <div class="form-group">
               <label for="exampleFormControlSelect2">Sub category Name</label>
               <input type="text" name="sub_category_name" class="form-control" placeholder="Sub Category name">
            </div>

            <input type="hidden" name="sub_service_name">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Main category Name</label>
                </div>
              <select class="form-control target" id="main_service_id" name="main_service_id">
               <option value="" selected=" " hidden="">Please Select Main Category</option>
              </select>
 

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  id="btnSave" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

    <!-- sub Category image Modal End-->

</main>
<?php  include(APPPATH.'views/super_admin/include/footer.php'); ?>
<script type="text/javascript">
        $("#myform").keypress(function(e) {
          //Enter key
          if (e.which == 13) {
            return false;
          }
        });
</script>

<script type="text/javascript">
  $(function(){
    showallData();
      var id_DT;


 $('#btnadd').click(function(){

   $('#myform')[0].reset();
   $('#btnSave').html('Submit');
   $('#exampleModal').find('.modal-title').text('Add Sub Category');
   $('#myform').attr('action','<?php echo base_url(); ?>api/Sub_category/add_sub_category');
 });

 //for save / insert data

$('#btnSave').click(function(){
   var url = $('#myform').attr('action');
   var data = $('#myform').serialize();
   console.log(data); 
    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){

               $('#myform')[0].reset();
               $('#exampleModal').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                }
                else{
                   toastr.error(response.message);
                }
                showallData();
                
      
        },
        complete: function(){
            $('#exampleModal').modal('hide');
            },

        error: function(){
                $('#exampleModal').modal('hide');
                 toastr.error(response.message);

        }
    });

});


//   $( ".target" ).change(function() {
//       id_DT = $(this).children("option:selected").val();
//         // alert(id_DT);
//       showallData(id_DT);

// });

  //edit
$('#sub_category_data').on('click', '.item-edit', function(){
    var id = $(this).attr('data');
    $('#exampleModal').modal('show');
     $('#btnSave').html('Update');
    $('#exampleModal').find('.modal-title').text('Edit Sub Category');
    $('#myform').attr('action','<?php echo base_url(); ?>api/Sub_category/update_sub_category')
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Sub_category/fetch_sub_category/',
        async: false,
        data: {'sub_service_id': id},
        dataType: 'json',

        success: function(response){
            
            if (response.status) {
                var data=response.data;
                $('input[name=sub_service_name]').val(data.sub_service_name);
                // $('select[name=main_service_id]').val(data.main_service_id);
                $('input[name=sub_service_id]').val(data.sub_service_id);
                // $('input[name=sub_service_image]').val(data.sub_service_image);
              
            }
            showallData();
        }
        ,
        error: function(){
             $('#exampleModal').modal('hide');
             toastr.error(response.message);
        }
    });

});


//Category deleting
$('#sub_category_data').on('click','.item-delete',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message').find('.modal-title').text('Delete Sub Category');
    $('#myModal_for_delete_message').modal('show');

    $('#btdelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Sub_category/delete_sub_category/'+id,
            data: {id: id},
            dataType: 'json',
            success: function(response)
            {
               
                 $('#myModal_for_delete_message').modal('hide');
                           showallData(id_DT);
                  toastr.success(response.message);
          
            },

            error: function(response) 
            {
              console.log(json_decode(response));
              $('#myModal_for_delete_message').modal('hide');
                        //  showallData(id_DT);
              toastr.error(response.message);

            }
        });

    });

});


$('#sub_category_data').on('click', '.item-image', function(){
    id = $(this).attr('data');
    $('#category_image').modal('show');

});

 $image_crop = $('#image').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:220,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
     $('#category_image').modal('hide');
    $('#image_crop_model').modal('show');

  });


  $('.crop_image').click(function(event){

    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport',
      // size: 'original',
      quality: 1
    }).then(function(response){
      $.ajax({
        url:'<?php echo base_url(); ?>api/Sub_category/upload_sub_category_image',
        type: "POST",
         dataType: 'json',
        data:{"image": response,
              "id": id },
        success:function(response)
        {

          $('#image_crop_model').modal('hide');
         if (response.status) {
                    showallData();
                 toastr.success(response.message);
                }
                else{
                      showallData();
                   toastr.error(response.message);
                }
         
        }
      });
    })
  });

  //Image  deleting
$('#sub_category_data').on('click','.item-delete2',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message2').find('.modal-title').text('Delete Category Image ');
    $('#myModal_for_delete_message2').modal('show');

    $('#btdelete2').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Sub_category/delete_sub_category_image/'+id,
            data: {id: id},
            dataType: 'json',
            success: function(response)
            {
               
                 $('#myModal_for_delete_message2').modal('hide');`
                  toastr.success(response.message);
                 showallData();
            },

            error: function() 
            {
              $('#myModal_for_delete_message2').modal('hide');
              toastr.error(response.message);

            }
        });

    });

});
all_category()
function all_category(){
    $.ajax({
          url:"<?php echo base_url().('api/Main_category/fetch_all_category');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select main category</option>';
                var x,i;
                var data=response.data;
                  if (data) {
                    for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                         html+='<option value="'+data[x].main_service_id+'">'+data[x].main_service_name+'</option>';
                        
                      }
                }
                
            $('#main_service_id').html(html);
           
   
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(data.message);

            }
        });


      }

  
 function showallData(){

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Sub_category/fetch_all_sub_category/",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...

                    var data=response.data;
                    var html ='';
                    // var tbt="";
                    // var x ="";
                    var x,i;
                    var data=response.data;
                    for (x =0 ; x<data.length; x++) {
                      var i=x+1
                        if (data[x].main_image!=null) {
                            var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[x].sub_service_id+'"><img src="<?php echo base_url(); ?>uploads/Sub_category_Images/'+data[x].main_image+'" style="height:50px; width:50px;" ></a><a href="javascript:;"  class="btn btn-sm item-delete2 btn-outline-danger"  data="'+data[x].sub_service_id+'"><i class="fas fa-trash-alt"></i></a>';
                        }
                        else{
                            var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[x].sub_service_id+'"><i class="fas fa-upload"></i></a>';
                        }
                       

                    
                       html+='<tr>'+
                               '<td>'+i+'</td>'+
                               '<td>'+data[x].sub_service_name+'</td>'+
                               '<td>'+image_path+'</td>'+
                              
                               '<td>'+
                               '<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-primary item-edit" data="'+data[x].sub_service_id+'"><i class="fas fa-edit"></i></a>'+
                               '<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-danger item-delete" data="'+data[x].sub_service_id+'"><i class="fas fa-trash-alt"></i></a>'+
                               '</td>'+
                           '</tr>';
                               
                      
                        }

                        $('#sub_category_data').html(html);  
                    },
                    error: function(response)
                    {
                      var html='';   
                        $('#sub_category_data').html(html);  
                        var data =JSON.parse(response.responseText);
                        toastr.error(data.message);

                    }

            });

        }

  });
</script>


