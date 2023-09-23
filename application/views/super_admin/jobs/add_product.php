<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>

<main class="page-content">
    
    <div class="container-fluid" id="product_body">
        <div class="row">
            <div class="col-md-10">    
                <h2>Add Jobs</h2>
            </div>
            <div class="col-md-2">
                 <a href="<?php echo base_url('Super_admin/all_products') ?>" class="btn btn-outline-primary btn-sm" style="float:right;"><i class="fa fa-list"> </i> Jobs Lists</a>
            </div>
        </div>
      <hr>
  
        <div class="card">
          <div class="card-header">
           Jobs Information
          </div>
            <form id="myform" >
            <div class="card-body">
             
               
            <div class="row">
                 <div class="form-group col-md-6">
                     <label for="text">Job Name</label>
                     <input type="text" class="form-control" id="text" placeholder="Job Name" name="job_name" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputState">Main service</label>
                    <select id="main_service_id"  name="main_service_id" class="form-control" required>
 
                      <option selected hidden="">Choose...</option>
                      
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputState">Sub service</label>
                    <select id="sub_service_id"  name="sub_service_id" class="form-control" required>
 
                      <option selected hidden="">Choose...</option>
                      
                    </select>
                </div>

              <div class="form-group col-md-6">

                <label for="inputnumber">Price</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Price" required>
              </div>

              <div class="form-group col-md-6">
               <label for="exampleFormControlFile1">Job Discount Price</label>
                <input type="number" id="discount" name="discount" class="form-control" placeholder="Job discount Price">
              </div>

               <div class="form-group col-md-6">
                  <label for="inputsortdescription">Sort Description</label>
                  <textarea class="form-control" placeholder="Enter Job Sort Description" id="inputsortdescription" rows="3" name="sort_description" required></textarea>
                </div>

              <!-- <div class="form-group col-md-6">
               <label for="exampleFormControlFile1">Recommended</label>
                <input type="inputrecommended" id="recommended" name="recommended" class="form-control" placeholder="Recommended">
              </div> -->

              <!-- <div class="form-group col-md-6">
               <label for="exampleFormControlFile1">Included</label>
                <input type="inputincluded" id="included" name="included" class="form-control" placeholder="Included">
              </div>

              <div class="form-group col-md-6">
               <label for="exampleFormControlFile1">Excluded</label>
                <input type="inputexcluded" id="excluded" name="excluded" class="form-control" placeholder="Excluded">
              </div> -->


              <div class="card-footer">
               <button id="btnSave" class="btn btn-outline-secondary" type="button"> Submit</button>
          </div>
        
          </form> 
          </div>
           
        </div>
     </div>



</main>
<?php include(APPPATH . 'views/super_admin/include/footer.php'); ?>
<script type="text/javascript">


  $('#meld_products_div').hide(); 
  
  
  $('#product_body').on('change','#main_service_id', function() {

   var $this = $( this ),main_service_id = $this.val();
   

        $.ajax({
          url:"<?php echo base_url('api/Sub_category/fetch_from_main_service_id');?>",
          method:"get",
          async: false,
          data:{
            main_service_id:main_service_id
          },
          dataType: 'json',  
            success:function(response){
                var html=' <option selected hidden="">Choose...</option>';

                var x,i;
                var data=response.data;
                  if (data) {
                    for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                         html+=' <option value="'+data[x].sub_service_id+'">'+data[x].sub_service_name+'</option>'; 
                      }
                }
               
            
   

               $('#sub_service_id').html(html); 
   
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(data.message);

            }
        });

});


$('#btnSave').click(function(){
 

   var url = $('#myform').attr('action');
   var data = $('#myform').serialize();
   

  var job_name=$('input[name=job_name]');
  var main_service_id=$('select[name=main_service_id]');
  var sub_service_id=$('input[name=sub_service_id]');
  var sort_description=$('textarea[name=sort_description]');
  
  var price=$('input[name=price]');
  var discount=$('input[name=discount]');
  // var job_recommended=$('textarea[name=product_recommended]');
  // var job_included=$('textarea[name=product_included]'); 
  // var job_excluded=$('textarea[name=product_excluded]');
  // console.log(job_name,main_service_id,sub_service_id,sort_description,page,price,discount);
  if (job_name.val()=='') {
        toastr.error('Please Enter Job Name');
  }else if(main_service_id.val()==''){
        toastr.error('please select Main service');
  }else if (sub_service_id.val()=='') {
        toastr.error('Please Select Sub service');
  }
  else if (sort_description.val()=='') {
       toastr.error('Please Enter Description');
  }
  // else if(page.val()==''){
  //      toastr.error('please Job page');
  // }
  else if(price.val()==''){
        toastr.error('please Enter price');
  }
  // else if(product_recommended.val()==''){
  //   toastr.error('please Enter recommended');
  // }

  // else if(product_included.val()==''){
  //   toastr.error('please Enter Included');
  // }

  // else if(product_excluded.val()==''){
  //   toastr.error('please Enter Excluded');
  // }


  else{
  
    $.ajax({
        type: 'ajax',
        method:'post',
        url: '<?php echo base_url(); ?>api/Product/Add_product',
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){

               $('#myform')[0].reset();

                if (response.status) {
                 toastr.success(response.message);
                 
                }
                else{
                   toastr.error(response.message);
                }
                
                // showallData();
        },
        complete: function(){
            // $('#exampleModal').modal('hide');
            },

        error: function(){
                // $('#exampleModal').modal('hide');
                 toastr.error(response.message);

        }
    });
    
}

});


all_category();

function all_category(){
    $.ajax({
          url:"<?php echo base_url('api/Main_category/fetch_all_category');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select service</option>';

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




// all_brands();

// function all_brands(){
//     $.ajax({
//           url:"<?php echo base_url('api/brand/all_brand');?>",
//           method:"get",
//           async: false,
//           dataType: 'json',  
//             success:function(response){
                 
//                 var html='<option value="" selected hidden>Please select brand</option>';

//                 var x,i;
//                 var data=response.data;
//                   if (data) {
//                     for (x =0 ; x<data.length; x++) {
//                          var i=x+1;
//                          html+='<option value="'+data[x].brand_category_id+'">'+data[x].brand_name+'</option>';
                        
//                       }
//                 }
                
//             $('#product_brand_category_id').html(html);
           
   
//             },

//             error: function(response){
//               var data =JSON.parse(response.responseText);
//               toastr.error(data.message);

//             }
//         });


//       }


</script>



