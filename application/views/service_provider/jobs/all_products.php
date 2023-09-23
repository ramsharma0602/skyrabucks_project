<?php include(APPPATH . 'views/service_provider/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>All Products</h2>
      <hr>
      <div class="row">
         <div class="col-lg-12" style="padding: 10px;">
          
          <a href="<?php echo base_url('Service_Provider/add_product') ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus-circle"></i>
         Create Product</a>
    
        </div>
       <div class="col-lg-12 table-responsive">
        <table id="myTable" class="table table-bordered ">
      <thead id="myHead">
        <tr>
          <th scope="col">#</th>
          
     <!--<th scope="col">Image</th>-->
          <th scope="col">Image</th>
          <th scope="col" width="200">Title</th>
          <th scope="col">Publish</th>
            <th scope="col">Page Details</th>
            <!-- <th scope="col">Features</th> -->
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
      </thead>

      <tbody id="product_body">
       
        
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
                              Delete Product

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


<!-- < div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="discountModalLabel" aria-hidden="true"> -->
  <!-- <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <
           <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>  -->

<!-- add image -->

<div class="modal fade" id="addproductModal" tabindex="-1" role="dialog" aria-labelledby="addproductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addproductModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
           <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="destroyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="destroyModalLabel">Remove Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
          
   
       </form>
       </div>
           <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Image</h5>
           

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
           <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
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

<!-- model
 -->
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

<!-- <div class="modal fade" id="addimageModal" tabindex="-1" role="dialog" aria-labelledby="addimageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addimageModalLabel">Select Image</h5>
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
          <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

 -->
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
        


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  id="btnSave" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="reduceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="myform1" action="">
          <input type="hidden" name="txtID">
        
      

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  id="btnSave1" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div> 

</main>
<?php include(APPPATH . 'views/service_provider/include/footer.php'); ?>


<script type="text/javascript">



   $(function(){ 

    
    showallData();
    //edit
$('#product_body').on('click', '.item-stock-increase', function(){

    var id = $(this).attr('data');
    $('#exampleModal').modal('show');
    $('#btnSave').html('Update');
    $('#exampleModal').find('.modal-title').text('Stock Increase');
    $('#myform').attr('action','<?php echo base_url(); ?>api/Product/increase_product_stock/'+id);
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Product/fetch_product_single/'+id,
        async: false,
        dataType: 'json',

        success: function(response){
            
            if (response.status) {
                var data=response.product;
                $('input[name=product_quantity]').val(data.product_quantity);
                $('input[name=txtID]').val(data.category_id);

            }

        }
        ,
        error: function(){
             $('#exampleModal').modal('hide');
             toastr.error(response.message);
        }
    });

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
                 showallData();
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
                showallData();
                 toastr.error(response.message);

        }
    });

});

$('#product_body').on('click', '.item-stock-reduce', function(){

    var id = $(this).attr('data');
    $('#reduceModal').modal('show');
    $('#btnSave1').html('Update');
    $('#reduceModal').find('.modal-title').text('Stock Increase');
    $('#myform1').attr('action','<?php echo base_url(); ?>api/Product/reduct_product_stock/'+id);
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Product/fetch_product_single/'+id,
        async: false,
        dataType: 'json',

        success: function(response){
            
            if (response.status) {
                var data=response.product;
                $('input[name=product_quantity]').val(data.product_quantity);
                $('input[name=txtID]').val(data.category_id);
            }

        }
        ,
        error: function(){
             $('#reduceModal').modal('hide');
             toastr.error(response.message);
        }
    });

});

//for save / insert data

$('#btnSave1').click(function(){
   var url = $('#myform1').attr('action');
   var data = $('#myform1').serialize();
 
    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){

               $('#myform1')[0].reset();
               $('#reduceModal').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                 showallData();
                }
                else{
                   toastr.error(response.message);
                }
                
                showallData();
        },
        complete: function(){
            $('#reduceModal').modal('hide');
            },

        error: function(){
                $('#reduceModal').modal('hide');
                showallData();
                 toastr.error(response.message);

        }
    });

});


//Category deleting
$('#product_body').on('click','.item-delete',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message').find('.modal-title').text('Delete Product');
    $('#myModal_for_delete_message').modal('show');

    $('#btdelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Product/delete_product/'+id,
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
                     showallData();
              toastr.error(response.message);

            }
        });

    });

});


  //Active Status Change
        
$('#product_body').on('change','#is_active', function() {

   var $this = $( this ),
        job_id = $this.val();
        $.ajax({
          url:"<?php echo base_url('api/Product/change_is_active/');?>"+job_id,
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

//Todays Deal Change

        
// $('#product_body').on('change','#todays_deal', function() {

//    var $this = $( this ),
//         product_id = $this.val();
//         $.ajax({
//           url:"<?php echo base_url('api/Product/change_todays_deal/');?>"+product_id,
//           method:"POST",
//           async: false,
//           dataType: 'json',  
//             success:function(response){
//               data=response.data;
//               toastr.success(response.message);
              
//             },

//             error: function(response){
//               var data =JSON.parse(response.responseText);
//               toastr.error(response.message);

//             }
//         });

// });

// Upload_category_image
$('#product_body').on('click', '.item-image', function(){

    id = $(this).attr('data');

    $('#category_image').modal('show');

});

 $image_crop = $('#image').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
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
    //   size: 'original',
      quality: 1
    }).then(function(response){
      $.ajax({
        url:'<?php echo base_url(); ?>api/Product/upload_category_image',
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
$('#product_body').on('click','.item-delete2',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message2').find('.modal-title').text('Delete Category Image ');
    $('#myModal_for_delete_message2').modal('show');

    $('#btdelete2').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Product/delete_category_image/'+id,
            data: {id: id},
            dataType: 'json',
            success: function(response)
            {
               
                 $('#myModal_for_delete_message2').modal('hide');
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




        
         function showallData(){

          $.ajax({
                type: 'ajax',
                method:'get',
                url: "<?php echo base_url() ?>api/Product/fetch_all_product/",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    var html ='';
                    var x,i;
                    var data=response.data;
                    var images=response.files;

                        for (x =0 ; x<data.length; x++) {
                         var i=x+1

                              if (data[x].job_image!=null) {
                              var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[x].job_id+'"><img src="<?php echo base_url(); ?>uploads/job/'+data[x].job_image+'" style="height:50px; width:50px;" ></a><a href="javascript:;"  class="btn btn-sm item-delete2 btn-outline-danger"  data="'+data[x].job_id+'"><i class="fas fa-trash-alt"></i></a>';
                                      }

                              else{
                              var image_path='<a href="javascript:;" style="margin: 10px;" class="item-image" data="'+data[x].job_id+'"><i class="fas fa-upload"></i></a>';
                                        }

                         
                              if (data[x].is_active=='Y') {

                              $menu ='<label class="switch">'+
                              '<input type="checkbox"  id="is_active"  value="'+data[x].job_id+'" checked>'+
                              '<span class="slider round"></span>'+
                              '</label>'+
                              '</span>';
                              }
                              else{
                              $menu ='<label class="switch">'+
                              '<input type="checkbox" href="javascript:;" value="'+data[x].job_id+'" id="is_active" >'+
                              '<span class="slider round"></span>'+
                              '</label>'+
                              '</span>';
                              }
                              
                              
                                if(data[x].product_quantity==0){
                                    
                                    var quantity_zero="style='background-color: #ffcccb;'";
                              
                                }
                                
                                else{
                                    
                                    var quantity_zero="style='background-color: #fff;'";
                               
                                }
                                
                               
                                
                             
                                // var url=encodeURI('<?php echo base_url("Home/product_detail/");?>'+job_name);
                                
                             html+='<tr '+quantity_zero+' >'+
                                  '<td>'+i+'</td>'+
                                   '<td>'+image_path+'</td>'+
                                  '<td>'+data[x].job_name+'</td>'+
                                  // '<td>'+data[x].product_quantity+'</td>'+
                                  
                                  // '<td>'+
                                  // '<a href="javascript:;" style="margin: 5px;" class="btn btn-sm btn-outline-info item-stock-increase" data="'+data[x].job_id+'"></i> Stock</a>'
                                  // +
                                  // '</td>'+
                                  '<td>'+$menu+'</td>'+
                                  // '<td>'+todays_deal_var+'</td>'+
                                  '<td>'+'<a  style="margin: 5px;" href="<?php echo base_url('Service_Provider/product_specification/'); ?>'+data[x].job_id+'" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-circle"></i> Specification</a>'+'</td>'+
                                  // '<td>'+'<a style="margin: 5px;" href="<?php echo base_url('Service_Provider/product_feature/'); ?>'+data[x].job_id+'" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus-circle"></i> Feature</a>'+'</td>'+
                                  '<td>'+
                                  '<a href="<?php echo base_url('Service_Provider/edit_products/'); ?>'+data[x].job_id+'" style="margin: 5px;" class="btn btn-sm btn-outline-primary item-edit" data="'+data[x].job_id+'"><i class="fas fa-edit"></i></a>'
                                  +'</td>'+
                                  '<td>'+'<a href="javascript:;" style="margin: 5px;" class="btn btn-sm btn-outline-danger item-delete" data="'+data[x].job_id+'"><i class="fas fa-trash-alt"></i></a>'+'</td>'+
                                  
                                '</tr>';

                        }

                        $('#product_body').html(html);  
                    },
                    error: function()
                    {
                          
                    }

            });

        }


    });

</script>

<script>
    $('#search_field').on('keyup', function() {
  var value = $(this).val();
  var patt = new RegExp(value, "i");

  $('#myTable').find('tr').each(function() {
    if (!($(this).find('td').text().search(patt) >= 0)) {
      $(this).not('.myHead').hide();
    }
    if (($(this).find('td').text().search(patt) >= 0)) {
      $(this).show();
    }

  });

 
});
</script>
