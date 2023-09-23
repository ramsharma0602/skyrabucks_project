<?php include(APPPATH . 'views/support_team/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
    <div class="row">
      <h2>Order details</h2>
      <div class="col-xl-10 col-sm-10">
      <div class="dropdown " style="float:right">
            <select class="form-control target" id="city_id" name="city_id">
                    <option value="" selected=" " hidden="">Please Select City</option>
            </select>
      </div>
        </div>
</div>
      <hr>
      <div class="row">
      	<div class="col-lg-12" style="padding: 10px;">
           <!-- <button type="button" id="addsupport_team" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-plus-circle"></i> Add Support team</button> -->
      	</div>
        
       <div class="col-lg-12">
       	<table id="myTable" class="table table-bordered">
		  <thead id="myHead" >
		    <tr>
		      <!-- <th scope="col">#</th> -->
		      <th scope="col"></th>
		      <th scope="col">Order detail id</th>
		      <th scope="col">order code</th>
          <th scope="col">Product detail</th>
          <th scope="col">Shipping address</th>
          <th scope="col">payment status</th>
          <th scope="col">Grand total</th>
          <th scope="col">Customer id</th>
          <th scope="col">order date</th>
          <th scope="col">City</th>
          <th scope="col">is_delivered</th>

		    </tr>
		  </thead>
		  <tbody id="brand_data">
		  </tbody>
		</table>
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
          <input type="hidden" name="service_provider_id">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Service Provider Name</label>
             <select type="text" id="service_provider_id" name="service_provider_id" class="form-control">
              <option selected hidden="">Service provider name</option>
             </select>
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
 -->


      <style type="text/css">
  
.modal-lg {
    max-width: 90% !important;
}

</style>

<div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="myform1">

      <div class="modal-body">
         <table  class="table table-bordered">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Image</th>
                     <th scope="col">Product Name</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Discounted Price</th>
                     <th scope="col">Grand Total ((Disc.P)*Qty)</th>
                     <th scope="col">Main Service</th>
                     <th scope="col">Service Provider</th>
                </tr>
              </thead>
             <tbody id="product_data">
              </tbody>

         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-secondary" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>
  </div>
</main>
<?php include(APPPATH . 'views/support_team/include/footer.php'); ?>

<script type="text/javascript">

$( "#city_id" ).on( "change", function() {
var city_id = $(this).val();
$.ajax({
          url:"<?php echo base_url().('api/Cities_and_support_team/fetch_city/');?>"+city_id,
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                console.log("success");
            },error: function(response){
                console.log("error");
            }

});
} );

let order_code='';
// var job_name; 
// $('#brand_data').on('click', '.item-edit', function(){
//     var id = $(this).attr('data');

//     $('#exampleModal').modal('show');
//     $('#btnSave').html('Update');
//     $('#exampleModal').find('.modal-title').text('Edit category');
//     $('#myform').attr('action','<?php echo base_url(); ?>api/Main_category/update_service')

    
//     $.ajax({
//         type: 'ajax',
//         method: 'get',
//         url: '<?php echo base_url(); ?>api/Cities_and_service_provider/fetch_all_location',
//         async: false,
//         data: {city_id: id},
//         dataType: 'json',
//         success: function(response){
            
//             if (response.status) {
//                 var data=response.data;
//                 $('input[name=name]').val(data.name);
//                 // $('input[name=city_id]').val(data.city_id);
//             }

//         },
//         error: function(){
//              $('#exampleModal').modal('hide');
//              toastr.error(response.message);
//         }
//     });

// });

// Define a global variable to store the job name
var globalJobNames = [];

$('#brand_data').on('click', '.item-products', function() {
    order_code = $(this).data('order-code');

    $('#myform1')[0].reset();
    $('#viewProduct').modal('show');

    $('#viewProduct').find('.modal-title').text('Product Details');
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Order_details/fetch_single_order_product/' + order_code,
        async: false,
        dataType: 'json',

        success: function(response) {
            if (response.status) {
                var data = response.data.product_details;
                var grand_total = response.grand_total;

                var html = '';
                globalJobNames = []; // Reset the global job names array

                for (var x = 0; x < data.length; x++) {
                    var i = x + 1;

                    var serviceProvidersHtml = '<select id="service_provider_id' + i + '" name="service_provider_id" class="form-control" data-index="' + x + '" required>';
                    serviceProvidersHtml += '<option selected hidden>Choose...</option>';

                    for (var a = 0; a < data[x].service_provider_detail.length; a++) {
                        var serviceProvider = data[x].service_provider_detail[a];
                        serviceProvidersHtml += '<option value="' + serviceProvider.service_provider_id + '">' + serviceProvider.name + '</option>';
                    }

                    serviceProvidersHtml += '</select>';

                    // Store job names in the global array
                    globalJobNames[x] = data[x].job_name;

                    html += '<tr>' +
                        '<td>' + i + '</td>' +
                        '<td><img src="<?php echo base_url() ?>uploads/job/' + data[x].img.job_image + '" width="100" height="100"></td>' +
                        '<td>' + data[x].job_name + '</td>' +
                        '<td>' + data[x].qty + '</td>' +
                        '<td>' + data[x].discount + '</td>' +
                        '<td>' + data[x].sub_total + '</td>' +
                        '<td>' + data[x].main_service_id.main_service_name + '</td>' +
                        '<td>' +
                        '<div class="form-group col-md-20">' +
                        serviceProvidersHtml +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                }

                html += '<tr>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '</tr>';

                $('#product_data').html(html);
            }
        },
        error: function() {
            $('#viewProduct').modal('hide');
            toastr.error(response.message);
        }
    });
});

$('#viewProduct').on('change', '[id^="service_provider_id"]', function() {
    var service_provider_id = $(this).val();
    var index = parseInt($(this).data('index')); // Extract the index
    var job_name = globalJobNames[index]; // Retrieve the job name using the index

    $.ajax({
        type: 'ajax',
        url: '<?php echo base_url(); ?>api/Order_details/add_job_to_service_provider',
        method: 'post',
        dataType: 'json',
        data: {
            service_provider_id: service_provider_id,
            order_code: order_code,
            job_name: job_name,
        },
        success: function(response) {
            // Handle the success response here
        },
        error: function(xhr, status, error) {
            // Handle the error response here
        }
    });
});



//    $('#btnSave').click(function(){
//    var url = $('#myform').attr('action');
//    var data = $('#myform').serialize();
//    var main_service_id =$('#main_service_id').val();  
//    var service_provider_id =$('#service_provider_id').val();
//    var main_service_id1 =$('#main_service_id1').val();  
//    var service_provider_id1 =$('#service_provider_id1').val();   

//    console.log(order_code); 
//     $.ajax({
//         type: 'ajax',
//         method:'post',
//         url: '<?php echo base_url(); ?>api/Order_details/add_job_to_service_provider',
//         data: {
//           main_service_id:main_service_id,
//           service_provider_id:service_provider_id,
//           order_code:order_code,
//           main_service_id1:main_service_id1,
//           service_provider_id1:service_provider_id1,
//           order_code:order_code,
//         },
//         async: false,
//         dataType: 'json',
//         success: function(response){

//                $('#myform')[0].reset();
//                $('#exampleModal').modal('hide');

//                 if (response.status) {
//                  toastr.success(response.message);
//                 }
//                 else{
//                    toastr.error(response.message);
//                 }
//                 showallData();
                
      
//         },
//         complete: function(){
//             $('#exampleModal').modal('hide');
//             },

//         error: function(){
//                 $('#exampleModal').modal('hide');
//                  toastr.error(response.message);

//         }
//     });

// });






all_location()
function all_location(){
    $.ajax({
          url:"<?php echo base_url().('api/Cities_and_support_team/fetch_city');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select City</option>';
                var x,i;
                var data=response.data;
                  if (data) {
                    for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                         html+='<option value="'+data[x].city_id+'">'+data[x].city+'</option>';
                        
                      }
                }
                
            $('#city_id').html(html);
           
   
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
    url: "<?php echo base_url() ?>api/City/fetch_all_location/",
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
           
           html+='<tr>'+
                   '<td>'+i+'</td>'+
                   '<td>'+data[x].city_id+'</td>'+
                   '<td>'+data[x].city+'</td>'+
                '</tr>';
                   
          
            }

            $('#city_id').html(html);  
        },
        error: function(response)
        {
          var html='';   
            $('#city_id').html(html);  
            var data =JSON.parse(response.responseText);
            toastr.error(data.message);

        }

});

}



showallData1()
 function showallData1(){


         
          $.ajax({
                type: 'ajax',
                method:'get',
                url: "<?php echo base_url() ?>api/Order_details/customer_fetch_all_order/",
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
                                              '<input type="checkbox"  id="is_active"  value="'+data[x].customer_id+'" checked>'+
                                              '<span class="slider round"></span>'+
                                              '</label>'+
                                              '</span>';
                                              }
                                              else{
                                              $menu ='<label class="switch">'+
                                              '<input type="checkbox" href="javascript:;" value="'+data[x].customer_id+'" id="is_active" >'+
                                              '<span class="slider round"></span>'+
                                              '</label>'+
                                              '</span>';
                                              }
                           
                              var ship = JSON.parse(data[x].shipping_address);
                              html+='<tr>'+
                                  '<td>'+i+'</td>'+
                                  '<td>'+data[x].order_detail_id+'</td>'+
                                  '<td>'+data[x].order_code+'</td>'+
                                  '<td>'+
                                       '<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-secondary item-products" data="'+data[x].order_code+'"><i class="fas fa-eye" id="product-details-show"></i></a>'+
                                    '</td>'+
                                  '<td>'+ship.billing_address+'</td>'+
                                  '<td>'+data[x].payment_status+'</td>'+
                                  '<td>'+data[x].grand_total+'</td>'+
                                  '<td>'+data[x].customer_id+'</td>'+
                                  '<td>'+data[x].order_date+'</td>'+
                                  '<td>'+ship.billing_city+'</td>'+

                                                
                                  // '<td>'+'<a  style="margin: 5px;" href="<?php echo base_url('Support_team/Location/'); ?>'+data[x].support_team_id+'" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-circle"></i> Specification</a>'+'</td>'+

                                  '<td>'+$menu+'</td>'+
                                  // '<td>'+'<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-primary item-edit" data="'+data[x].support_team_id+'"><i class="fas fa-edit"></i></a>'+'</td>'
                                  // '<td>'+data[x].credential+'</td>'+
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

</script>

