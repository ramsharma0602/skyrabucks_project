
<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>
<main class="page-content">
  
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <div class="container-fluid">
      <h2>Banner</h2>
      <hr>
      <div class="row">
      	<div class="col-lg-12" style="padding: 10px;">
      		<button type="button" id="addBanner" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
           Add 
          </button>
      	</div>

       <div class="col-lg-12">
       	<table class="table table-bordered">
		  <thead>
		    <tr>
                <th scope="col">#</th>
                <th scope="col">Banner Name</th>
                <th scope="col">Image</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody id="banner_body">
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
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      

      <div class="modal-body">
        <form id="myform" action="">
         <input type="hidden" name="txtID">
          <div class="form-group">
            <label for="exampleFormControlSelect2">Banner Title</label>
           <input type="text" name="banner_title" class="form-control" placeholder="Banner Title">
          </div>
          
           <div class="form-group">
            <label for="exampleFormControlSelect2">Banner link</label>
           <input type="text" name="banner_link" class="form-control" placeholder="Banner link">
          </div>


              <div class="form-group">
                <label for="exampleFormControlSelect2">Banner Description</label>
               <textarea type="text" name="banner_description" class="form-control" placeholder="Banner Description"></textarea>
              </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
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

<div class="modal fade" id="image_show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Select Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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

$(function()
{
    showallData();

          $('#addBanner').click(function(){
          $('#myform')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModal').find('.modal-title').text('Add Banner');
          $('#myform').attr('action','<?php echo base_url(); ?>api/Banner/Add_banner');
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
               $('#exampleModal').modal('hide');

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


        }

    });
});

$('#banner_body').on('click', '.item-image', function(){

    banner_id = $(this).attr('data');
    $('#image').croppie('destroy');
    $('#image_show').modal('show');

        $image_crop = $('#image').croppie({
          enableExif: true,
          viewport: {
           width:200,
            height:70,
            type:'square' //circle
          },
          boundary:{
            width:300,
            height:300
          }
        });

});

  $('#upload').on('change', function(){

        fileName = document.querySelector('#upload').value; 

    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
     $('#image_show').modal('hide');
    $('#image_crop_model').modal('show');

  });


  $('.crop_image').click(function(event){

         $('.crop_image').prop('disabled', true);
    $image_crop.croppie('result', {
      type: 'canvas',
    //   size: 'viewport',
      size: 'original',
      quality: 1
    }).then(function(response){
      $.ajax({
        url:'<?php echo base_url(); ?>api/Banner/upload_banner',
        type: "POST",
         dataType: 'json',
        data:{'banner_id':banner_id,"image": response},
        success:function(response)
        {
             $('.crop_image').prop('disabled', false);
          $('#image_crop_model').modal('hide');
         if (response.status) {
                
                 toastr.success(response.message);
                   showallData();
                }
                else{
                 
                   toastr.error(response.message);
                    showallData();
                }
         
        },
              error: function(){
                   $('.crop_image').prop('disabled', false);
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);


        }
      });
    })
  });

  //Category deleting
$('#banner_body').on('click','.item-delete',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message').find('.modal-title').text('Delete Banner');
    $('#myModal_for_delete_message').modal('show');

    $('#btdelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Banner/delete_banner/'+id,
            data: {id: id},
            dataType: 'json',
            success: function(response)
            {
                  $('#myModal_for_delete_message').modal('hide');
                     showallData();
                  toastr.success(response.message);
                  
            },

               error: function() 
            {
              $('#myModal_for_delete_message').modal('hide');
                    //  showallData();
              toastr.error(response.message);

            }
        });

    });

});

     function showallData(){
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Banner/all_banner",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
                    var html="";
                    var tbt="";
                    var i ="";
                    for (var i = 0; i < data.length; i++) {
                      var x=i+1;
                         if (data[i].image_name!=null) {
                              var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[i].banner_id+'"><img src="<?php echo base_url(); ?>uploads/banners/'+data[i].image_name+'" style="height:70px; width:auto;" ></a>';
                            }
                              else{
                            var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[i].banner_id+'"><i class="fas fa-upload"></i></a>';
                            }

                            if (data[i].enable=='Y') {
                              tbt='<label class="switch"> <input type="checkbox" checked> <span class="slider round"></span> </label>';

                            }else{

                                 tbt='<label class="switch"> <input type="checkbox"> <span class="slider round"></span> </label>';
                            }

       

                      
                      html+='<tr> <td>'+x+'</td><td>'+data[i].banner_title+'</td><td>'+image_path+'</td><td>'+tbt+'</td><td><a href="javascript:;" class="btn btn-sm btn-outline-danger item-delete" data="'+data[i].banner_id+'"><i class="fas fa-trash-alt"></i></a></td></tr>';
                    }
                 

                   $('#banner_body').html(html);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });
        }

});

</script>
