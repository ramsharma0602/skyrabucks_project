<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>
 
<main class="page-content">
    <div class="container-fluid" id="product_body">
         <div class="row">
            <div class="col-md-10">    
                <h2>Edit Job</h2>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url('Super_admin/all_products') ?>" class="btn btn-outline-primary btn-sm" style="float:right;"><i class="fa fa-list"> </i> Job Lists</a>
            </div>
      <hr>
  
        <div class="card">
          <div class="card-header">
           Job Information
          </div>
             <form id="myform" action="">
          <div class="card-body">
             
             <input type="text" name="job_id" hidden="">
               
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
                  <label for="input short_description">short_description</label>
                  <textarea class="form-control" placeholder="Enter Job short_description" id="input short_description" rows="3" name="short_description" required></textarea>
                </div>
                                
              
             
                <div class="form-group col-md-6">

                  <label for="inputnumber">Price</label>
                  <input type="number" id="price" name="price" class="form-control" placeholder="Price" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="exampleFormControlFile1">Product Discounted Price</label>
                  <input type="number" id="discount" name="discount" class="form-control" placeholder="Product discounted Price">
                </div>
        
                <div class="card-footer">
                   <button id="btnSave" class="btn btn-outline-secondary">Submit</button>
          </div>
        
        </div>
      
    </div>



</main>
<?php include(APPPATH . 'views/super_admin/include/footer.php'); ?>

<script type="text/javascript" language="javascript">

$(function()
{ 
   var sub_service_id=0;
  $('#product_body').on('change','#main_service_id', function() {

   var $this = $( this ),
   main_service_id = $this.val();
   

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
    $.ajax({
        type: 'ajax',
        method:'post',
        url: '<?php echo base_url(); ?>api/Product/update_product',
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){

                if (response.status) {
                 toastr.success(response.message);
                }
                else{
                   toastr.error(response.message);
                }
              
        },
      

        error: function(){

                 toastr.error(response.message);

        }
    });

});



    all_category();
    function all_category(){
    $.ajax({
          url:"<?php echo base_url('api/Main_category/fetch_all_category');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select category</option>';

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

    showallData();
    function showallData(){
    var job_id='<?php echo $job_id; ?>';
    console.log(job_id);
     $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url('api/Product/fetch_product_single/'); ?>'+job_id,
        async: false,
        dataType: 'json',
        success: function(response){
            data=response.data;
           
            $('input[name=job_id]').val(data.job_id);
            $('input[name=job_name]').val(data.job_name);
            $('select[name=main_service_id]').val(data.main_service_id);
           sub_service_id=data.sub_service_id;
            $('textarea[name=short_description]').val(data.short_description);
            $('input[name=price]').val(data.price);
            $('input[name=discount]').val(data.discount);     

            load_sub_service(data.main_service_id);

               },
        error: function(){
          
        }
    });   
    }

function load_sub_service(main_service_id){


        $.ajax({
          url:"<?php echo base_url('api/Sub_category/fetch_from_main_service_id');?>",
          method:"get",
          async: false,
          data:{
            main_service_id:main_service_id
          },
          dataType: 'json',  
            success:function(response){
                var html='';
                var x,i;
                var data=response.data;
                  if (data) {
                    for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                         if(sub_service_id==data[x].sub_service_id){
                         html+=' <option selected value="'+data[x].sub_service_id+'">'+data[x].sub_service_name+'</option>'; 
                     }else{
                         html+=' <option value="'+data[x].sub_service_id+'">'+data[x].sub_service_name+'</option>'; 
                     }
                      }
                }
               
            
   

               $('#sub_service_id').html(html); 
   
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(data.message);

            }
        });
}

//start show all category

//end show all category




//  $('#product_body').on('change','#brand_category_id', function() {

//    var $this = $(this),

//    brand_category_id = $this.val();
     
//    var main_category_id = $('#product_main_category_id option:selected').val();
//    var sub_category_id = $('#product_sub_category_id option:selected').val();

//     $.ajax({
//           url:"<?php echo base_url('api/Product/fetch_product_from_main_sub_brand_category');?>",
//           method:"get",
//           async: false,
//           dataType: 'json',  
//           data:{'brand_category_id':brand_category_id,'main_category_id':main_category_id,'sub_category_id':sub_category_id},  
//             success:function(response){
                 
//                 var html='<div class=""><label for="inputState">Same Products</label><select id="meld_products" multiple="multiple" name="meld_products[]" class="form-control"><option hidden="">Choose...</option>';

//                 var x,i;
//                 var data=response.data;
//                   if (data) {
//                     for (x =0 ; x<data.length; x++) {
//                          var i=x+1;
//                          html+='<option value="'+data[x].product_id+'">'+data[x].product_name+'</option>';
                        
//                       }
//                 }
//                   html+='</select></div>';
            
//                 // $('#meld_products_div').show(); 

//                $('#meld_products_div').html(html); 
   
//             },

//             error: function(response){
//               var data =JSON.parse(response.responseText);
//               toastr.error(data.message);

//             }
//         });

// });


window.onmousedown = function (e) {
    var el = e.target;
    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
        e.preventDefault();

        // toggle selection
        if (el.hasAttribute('selected')) el.removeAttribute('selected');
        else el.setAttribute('selected', '');

        // hack to correct buggy behavior
        var select = el.parentNode.cloneNode(true);
        el.parentNode.parentNode.replaceChild(select, el.parentNode);
    }
}
    
    
});

</script>


 <script type="text/javascript">
 
    $(function()
    {
         
     $("#returnChecked").on('change', function()
      {
           this.value='N';
        if ($(this).is(':checked')) {
            this.value='Y';
            var html='<label class="control-label" for="returnChecked">Return Days</label><div><input type="text" class="form-control" id="returnDays" name="returnDays"></div>';
           $('#showReturnDays').html(html);
        };
      });
      
       $("#replaceChecked").on('change', function()
      {
            this.value='N';
        if ($(this).is(':checked')) {
                this.value='Y';
          
            var html1='<label class="control-label" for="replaceChecked">Replace Days</label><div><input type="text" class="form-control" id="replaceDays" name="replaceDays"></div>';
           $('#showReplaceDays').html(html1);
        };
      }); 
      
    });
    
  </script>

