<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Manage Job File</h2>
      <hr>
      <div class="row">
      	<div class="col-lg-12" style="padding: 10px;">
      		<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>
 Job File
</button>
      	</div>
       <div class="col-lg-12">
       	<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Product Image </th>
		      <th scope="col">Action</th>
		      <!-- <th scope="col">Action</th> -->
		    </tr>
		  </thead>
		  <tbody id="category_data">
		    
		  </tbody>
		</table>
       </div>
      </div>
  </div>
  <!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
 
  <div class="form-group">
    
    <input type="file" name="upload" data="<?php echo $job_id;?>"id="upload" accept="image/*" required="">
  </div>

</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- image Modal -->


<div class="modal" id="image_crop_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
<?php include(APPPATH . 'views/super_admin/include/footer.php'); ?>
<!--Edit Image Modal -->



</main>
<script type="text/javascript">

   $(function(){ 

    var job_id='<?php echo $job_id; ?>';
    showallData(job_id);
    
id = '<?php echo $job_id; ?>';

  
  
  
 $image_crop = $('#image').croppie({
    enableExif: true,
   viewport: { width: 100, height: 100 },
    boundary: { width: 300, height: 300 },
     showZoomer: false,
    enableResize: true,
    // enableOrientation: true,
    mouseWheelZoom: 'ctrl'
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
     $('#exampleModal').modal('hide');
    $('#image_crop_model').modal('show');

  });


  $('.crop_image').click(function(event){
    
    $('.crop_image').attr("disabled", true);
    $("#upload").val('');
    
    $image_crop.croppie('result', {
      type: 'canvas',
       // size: 'viewport',
      size: 'original',
      quality: 1
    }).then(function(response){
      $.ajax({
        url:'<?php echo base_url(); ?>api/Product_Image/add_product_file',
        type: "POST",
         dataType: 'json',
        data:{"image": response,
              "job_id": id },
              
              
        success:function(response)
        {

                $('.crop_image').attr("disabled", false);
          $('#image_crop_model').modal('hide');
              $('#exampleModal').modal('hide');
         if (response.status) {
                  showallData(job_id);
                 toastr.success(response.message);
                }
                else{
                  showallData(job_id);
                   toastr.error(response.message);
                }
           $('#image').croppie('destroy');
        },
       
        error: function(response){
            
            $('.crop_image').attr("disabled", false);
            var text=JSON.parse(response.responseText);
            toastr.error(text.message);
        }
      });
    })
  });

//Category deleting
$('#category_data').on('click','.item-delete',function(){
    var id= $(this).attr('data');
    $('#myModal_for_delete_message').find('.modal-title').text('Delete Product Image');
    $('#myModal_for_delete_message').modal('show');

    $('#btdelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Product_Image/delete_Product_Image/'+id,
            data: {id: id},
            dataType: 'json',
            success: function(response)
            {
               
                 $('#myModal_for_delete_message').modal('hide');
                        showallData(job_id);
                  toastr.success(response.message);
          
            },

            error: function() 
            {
              $('#myModal_for_delete_message').modal('hide');
                     showallData(job_id);
              toastr.error(response.message);

            }
        });

    });

});

 function showallData(job_id=''){

          $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Product_Image/fetch_Product_Image/"+job_id,
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    var html ='';
                    var x,i;
                    var data=response.data;
                    console.log(data[0]);
                        for (x =0 ; x<data.length; x++) {
                         var i=x+1

                                    if (data[x]!=null) {
                                      var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[x].product_file_id+'"><img src="<?php echo base_url(); ?>uploads/product/'+data[x]+'" style="height:100px; width:auto;" ></a>';
                                      }

                                      else{
                                        var image_path='--------';
                                        }
                                        

                                html+='<tr>'+
                                    '<td>'+i+'</td>'+
                           
                                      '<td>'+image_path+'</td>'+
                                  
                                    '<td>'+
                            
                                        '<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-danger item-delete" data="'+data[x].product_file_id+'"><i class="fas fa-trash-alt"></i></a>'+
                                    '</td>'+
                                  '</tr>';

                        }

                        $('#category_data').html(html);  
                    },
                    error: function()
                    {
                          
                    }

            });

        }
 
 });

</script>

