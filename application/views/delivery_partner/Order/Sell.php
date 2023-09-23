<?php include(APPPATH . 'views/delivery_partner/include/header.php'); ?>

<main class="page-content">
    <div class="container-fluid">
      <h2>Orders</h2>
      
      <!-- <div class="input-group mb-3">
          <input type="text" class="form-control search_field" id="search_field" placeholder="Search...">
         
        </div> -->
 
      <hr>
      <div class="row">
        <div class="col-lg-12" style="padding: 10px;">

        </div>
       <div class="col-lg-12 table-responsive ">
        <table id="myTable" class="table table-bordered">
      <thead id="myHead">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Sell Code</th>
          <th scope="col">Buyer</th>
          <th scope="col">Sale Date</th>
          <th scope="col">Payment Status</th>
          <!-- <th scope="col">See products</th>          
          <th scope="col">Invoice</th>          
          <th scope="col">Screenshot</th>           -->
          
        </tr>
      </thead>
      <tbody id="category_data">

      </tbody>
    </table>
       </div>
      </div>
  </div>
  <!-- Delivary Payment Modal -->
<!-- <div class="modal fade" id="delivaryStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivary Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-bordered">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Cart</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Current Delivery Status</th>
                     <th scope="col">Change Delivery Status</th>
                 </tr>
              </thead>
               
              
              <tbody id="product_data1">
              </tbody>
            
         </table>
      </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
       <!--  <button type="button" id="StatusButton" class="btn btn-outline-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
 <!-- End Delivary Payment Modal -->
  <!-- View Modal -->

<style type="text/css">
  
.modal-lg {
    max-width: 80% !important;
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
      <div class="modal-body">
         <table class="table table-bordered">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Image</th>
                     <th scope="col">Product Name</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Discounted Price</th>
                     <th scope="col">Grand Total ((Disc.P)*Qty)</th>
                </tr>
              </thead>
             <tbody id="product_data">
              </tbody>

         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="AdminPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content " >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
         <table class="table table-bordered">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Product</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Unit Price</th>
                     <th scope="col">Discounted Price</th>
                     <th scope="col">Grand Total ((Dis.P + CGST + SGST)*qty)+shipping</th>
                     <th scope="col">Closing Fees</th>
                     <th scope="col">Refferal Fees</th>
                     <th scope="col">Total (Paying amount)</th>
                     <th scope="col">Paid Amount (Paid amount)</th>
                 </tr>
              </thead>
             
             <tbody id="product_data3">
             </tbody>

         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!--End View Modal -->



</form>
      </div>
      
    </div>
  </div>
</div>


</main>

<?php include(APPPATH . 'views/delivery_partner/include/footer.php'); ?>

<script type="text/javascript">
     $(function(){ 


showallData();

$('#category_data').on('click', '.item-products', function(){
    var id = $(this).attr('data');

    $('#viewProduct').modal('show');

    $('#viewProduct').find('.modal-title').text('Product Details');
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Order_details/fetch_single_order_product/'+id,
        async: false,
        dataType: 'json',

        success: function(response){
            
            if (response.status) {
                var data=response.data.product_details;
                console.log(data[0].img.job_image);
                var grand_total = response.grand_total;
                var html='';
                var total=''
                for (x =0 ; x<data.length; x++) {
                  var i=x+1


                        var grand_total=(Number(data[x].discount)*Number(data[x].quantity));
                        
                              html+='<tr>'+
                                  '<td>'+i+'</td>'+
                                  '<td><img src="<?php echo base_url() ?>uploads/job/'+data[x].img.job_image+'"  width="100" height="100"></td>'+
                                   '<td>'+data[x].job_name+'</td>'+
                                   '<td>'+data[x].qty+'</td>'+
                                   '<td>'+data[x].discount+'</td>'+
                                   '<td>'+ data[x].sub_total+'</td>';       
                                
                                // if(data[x].cancel_product=='Y'){
                                //     html+= '<td>Product Cancelled</td>';
                                // } else{
                                //      html+= '<td>'+ data[x].shipment_track+'</td>';
                                // }    
                              
                                       
                                    
                                 
                                
                                 html+='</tr>';
                            // var total = Number(total) + Number(grand_total);    
                        }
                html+='<tr>'+
                                  '<td></td>'+
                                   '<td></td>'+
                                   '<td></td>'+
                                   '<td></td>'+
                                  //  '<th>Total</th>'+
                                  //  '<th>'+response.grand_total+'</th>'+            
                                '</tr>';
            }
                $('#product_data').html(html);  
        }
        ,
        error: function(){
             $('#viewProduct').modal('hide');
             toastr.error(response.message);
        }
    });

});

// $('#category_data').on('click', '.item-deliveryStatus', function(){
//     var id = $(this).attr('data');

//     $('#delivaryStatus').modal('show');
//     $('#delivaryStatus').find('.modal-title').text('Delivery Status');
//     $.ajax({
//         type: 'ajax',
//         method: 'get',
//         url: '<?php echo base_url(); ?>api/Order_details/fetch_order_product/'+id,
//         async: false,
//         success: function(response){
//           console.log("dawdwd");
//             if (response.status) {
//                 var data=response.data;
//                 data = data.product_detail;
//                 var html='';
//                 var total=''
//                   for (x =0 ; x<data.length; x++) {
//                          var i=x+1

//                               html+='<tr>'+
//                                   '<td>'+i+'</td>'+
//                                    '<td>'+data[x].product_name+'</td>'+
//                                    '<td>'+data[x].quantity+'</td>'+
//                                    '<td>'+data[x].shipment_track+'</td>'+
//                                    '<td>'+
//                                       '<input type="" hidden="" name="product_id" value="'+data[x].product_id+'">'+
//                                       '<input type="" hidden="" name="order_detail_id" value="'+id+'">'+
//                                       '<select name="shipment_track" id="shipment_track1" product_id="'+data[x].product_id+'" order_id="'+id+'" class="form-control shipment_track1">'+
//                                         '<option value="" selected=" ">Please Select Status</option>'+
//                                         '<option value="Dispatching_soon">Dispatching soon</option>'+
//                                         '<option value="Dispatched">Dispatched</option>'+
//                                         '<option value="In_Transit">In Transit</option>'+
//                                         '<option value="Out_For_delivery">Out For delivery</option>'+
//                                         '<option value="Delivered">Delivered</option>'+
//                                         '<option value="Cancelled">Cancelled</option>'+
//                                     '</select></td>'+            
//                                 '</tr>';
                            
//                         }
//                }
//                 $('#product_data1').html(html);  
//         }
//         ,
//         error: function(){
//              $('#delivaryStatus').modal('hide');
//              toastr.error(response.message);
//         }
//     });

// });

    // $('#product_data1').change('#shipment_track1',function() {
      $('#product_data1').on('change', '.shipment_track1', function(){

     var shipment_track=$(this).find(":selected").val();
     var job_id= $(this).attr('job_id');
     var order_detail_id=$(this).attr('order_id');


         $.ajax({

        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url(); ?>api/Order_details/Change_delivery_status/',
        async: false,
        dataType: 'json',
        data:{
          "shipment_track":shipment_track,"job_id":job_id,"order_detail_id":order_detail_id
        },

        success: function(response){

                if (response.status) {
                //   $('#delivaryStatus').modal('hide');
                 toastr.success(response.message);

                }
                else{
                   toastr.error(response.message);
                }
                
                showallData();
        },

        error: function(){

                 toastr.error(response.message);

        }
    });

      });

 function showallData(){

          $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Order_details/fetch_all_orders/",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    var html ='';
                    var html1 ='';
                    var x,i;
                    var data=response.data;
     
                   
                        for (x =0 ; x<data.length; x++) {
                         var i=x+1
                            if(data[x].delivered=='Y'){
                              html+='<tr style="background-color:#90ee90">';
                            }
                            else{
                            html+='<tr>';
                                
                            }
                            var ship = JSON.parse(data[x].shipping_address);
                            html+='<td>'+i+'</td>'+
                                   '<td>'+data[x].order_code+'</td>'+
                                   '<td>'+ship.billing_customer_name+'</td>'+
                                   '<td>'+data[x].order_date+'</td>'+ 
                                   '<td>'+data[x].payment_status+'</td>';
                                  //  '<td>'+
                                  //      '<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-secondary item-products" data="'+data[x].order_code+'"><i class="fas fa-eye" id="product-details-show"></i></a>'+
                                  //   '</td>'+
                                  //   '<td>'+  
                                      //  '<a href="<?php echo base_url('Super_admin/order_invoice_sample/');?>'+data[x].order_detail_id+'" style="margin: 10px;" class="btn btn-sm btn-outline-primary" data="'+data[x].order_detail_id+'"><i class="fas fa-file-invoice"></i></i></a>'+
                                      //  '</td>'+
                                       //  '<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-success item-deliveryStatus" data="'+data[x].order_detail_id+'"><i class="fas fa-truck"></i></a>'+
                                       // '<td>'+
                                       // '<a href="<?php echo base_url('Admin/shiprocket_order/');?>'+data[x].order_code+'" style="margin: 10px;" class="btn btn-sm btn-outline-success item-deliveryStatus" data="'+data[x].order_detail_id+'"><i class="fas fa-truck"></i></a>'+
                                      
                                  // '</td>';

                                // if(data[x].payment_image != ""){
                                //   html+='<td>'
                                //   + '<a target="_blank" href="<?php echo base_url('/uploads/Payments/');?>'+data[x].payment_image+'" style="margin: 10px;" class="btn btn-sm btn-outline-primary" >Image</a>'+
                                //   '</td>'; 
                                // }else{
                                //   html+='<td>'+'-------'+'</td>'; 

                                // }
                                '</tr>';
                        }

                        $('#category_data').html(html); 
                      //   $('#myTable').DataTable({
                      //         dom: 'Bfrtip',
                      //         buttons: [
                      //             'copy', 'csv', 'excel', 'pdf', 'print'
                      //         ]
                      // }); 
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