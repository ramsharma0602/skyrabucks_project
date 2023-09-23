<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>
 
 
<main class="page-content">
  	  <div class="container-fluid" id="product_body">
    	<div class="card print">
          <div class="card-header">
           <img class="logo" style="width: 200px; height: auto;" src="<?php echo base_url('uploads/logos/').$setting_data->large_logo; ?>">
             <div class="float-right">
                 <h3 class="mb-0">Invoice #<?php echo $Order_details->order_code;?></h3>
                	 Date: <?php echo date("d/m/Y"); ?></br>
                	 Order Date: <?php echo date("d/m/y",strtotime($Order_details->order_date));?>
             </div>
          </div>
             
         <div class="card-body">
             <div class="row mb-4">
                 <div class="col-sm-6">
                     <h5 class="mb-3">From:</h5>
                     <h3 class="text-dark mb-1"><?php echo $Seller_details->user_name;?></h3>
                     <div><?php echo $Seller_details->user_email;?></div>
                     
                     
                 </div>
                 <div class="col-sm-6 " >
                     <h5 class="mb-3" >To:</h5>
                     <?php $shipping_details=json_decode($Order_details->shipping_address);?>	
                        <h3 class="text-dark mb-1"><?php echo $shipping_details->shipping_customer_name;?></h3>
                   		<div><?php echo $shipping_details->shipping_address;?></div>
                    	<div><?php echo $shipping_details->shipping_address_2;?></div>
                    	<div><?php echo $shipping_details->shipping_city;?>,<?php echo $shipping_details->shipping_state;?>,<?php echo $shipping_details->shipping_country;?>,<?php echo $shipping_details->shipping_pincode;?></div>
                     	<div>Email: <?php echo $shipping_details->shipping_email;?></div>
                     	<div>Phone: <?php echo $shipping_details->shipping_phone;?></div>
                 
                 </div>
             </div>
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                       
                         <tr>
                             <th class="center">#</th>
                             <th>Item</th>
                             <th>Unit Cost</th>
                             <th class="right">Discounted Price</th>
                             <th class="center">Qty</th>
                             <th class="right">Total</th>
                         </tr>
                    
                     </thead>
                     <tbody>


                         <?php 
                             $i=1;
                             $grandtotal=0;
                            
                            foreach ($job_detail as $key => $value) {
                         
                              $total=($value->discount*$value->quantity);
                         ?>
                         <tr>
                             <td class="center"><?php echo $i;?></td>
                             <td class="left strong"><?php echo $value->job_name;?></td>
                             <td class="left"><?php echo $value->selling_price;?></td> 
                             <td class="right"><?php echo $value->discount;?></td>
                             <td class="center"><?php echo $value->quantity;?></td>
                             <td class="right"><?php echo round($total); ?></td>
                         </tr>
                         <?php $i++; 
                            $grandtotal=$grandtotal+$total;
                            }
                             ?>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-sm-5">
                        <table class="table table-clear">
                         <tbody>
                             <?php 
                                        
                                  $payment_details=json_decode($Order_details->online_payment_details);
                                  if($payment_details){
                              ?>
                             <tr>
                                
                                 <td class="left">
                                     <strong class="text-dark">Payment Mode</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark"><?php echo $Order_details->payment_status;?></strong>
                                 </td>
                                 </tr>
                                 <tr>
                                <td class="left">
                                     <strong class="text-dark">Name:-<?php echo $payment_details->Name;?></strong>
                                 </td>
                                <td class="right">
                                     <strong class="text-dark">Transaction ID:-<?php echo $payment_details->TransactionID;?></strong>
                                 </td>
                             </tr>
                             
                             <?php } else{?>
                             <tr>
                                
                                 <td class="left">
                                     <strong class="text-dark">Payment Mode</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark"><?php echo $Order_details->payment_status;?></strong>
                                 </td>
                                 </tr>
                                 
                             <?php }?>
                         </tbody>
                     </table>
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
             
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Grand Total</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark"><?php echo $Order_details->grand_total;?></strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
           <div class="card-footer print_btn">
               <button id="btnSave" class="btn btn-outline-info" onclick="print()">Print</button>
          </div>
        
        </div>
    </div>
      	

</main>

<?php include(APPPATH . 'views/super_admin/include/footer.php'); ?>

<style type="text/css">
@media print {
	.print_btn{
		display:none;
	}	
}
</style>
<script  type="text/javascript">
</script>
