<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice | Skyrabucks</title>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 5px;
				border: 1px solid black;
				/*font-size: 10px;*/
				line-height: 5px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: black;
			}

			/*.invoice-box table {*/
			/*	width: 100%;*/
			/*	line-height: inherit;*/
			/*	text-align: left;*/
			/*}*/
			
			.invoice-box h2 {
				width: 100%;
				text-align:center; 
			    font-size:30px;
			    text-transform: uppercase;
			   
			}
			
				.invoice-box h3 {
				width: 100%;
				text-align:center; 
			    font-size:25px;
			    text-transform: uppercase;
			 
			}
				.invoice-box p {
				width: 100%;
			
				text-align:center; 
			    font-size:10px;
			    text-transform: uppercase;
			}


			/*.invoice-box table td {*/
			/*	padding: 5px;*/
			/*	vertical-align: top;*/
				
			/*}*/

			/*.invoice-box table tr td:nth-child(2) {*/
			/*	text-align: right;*/
			/*}*/

			/*.invoice-box table tr.top table td {*/
			/*	padding-bottom: 10px;*/
			/*}*/

			/*.invoice-box table tr.top table td.title {*/
			/*	font-size: 12px;*/
			/*	line-height: 8px;*/
			/*	color: black;*/
			/*}*/

			/*.invoice-box table tr.information table td {*/
			/*	padding-bottom: 5px;*/
			/*}*/

			/*.invoice-box table tr.heading td {*/
			/*	background: black;*/
			/*	border-bottom: 1px solid black;*/
			/*	font-weight: bold;*/
			/*}*/

			/*.invoice-box table tr.details td {*/
			/*	padding-bottom: 20px;*/
			/*}*/

			/*.invoice-box table tr.item td {*/
			/*	border-bottom: 1px solid black;*/
			/*}*/

			/*.invoice-box table tr.item.last td {*/
			/*	border-bottom: none;*/
			/*}*/

			/*.invoice-box table tr.total td:nth-child(2) {*/
			/*	border-top: 2px solid black;*/
			/*	font-weight: bold;*/
			/*}*/

			/*@media only screen and (max-width: 600px) {*/
			/*	.invoice-box table tr.top table td {*/
			/*		width: 100%;*/
			/*		display: block;*/
			/*		text-align: center;*/
			/*	}*/

			/*	.invoice-box table tr.information table td {*/
			/*		width: 100%;*/
			/*		display: block;*/
			/*		text-align: center;*/
			/*	}*/
			/*}*/

			/** RTL **/
			/*.invoice-box.rtl {*/
			/*	direction: rtl;*/
			/*	font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;*/
			/*}*/

			/*.invoice-box.rtl table {*/
			/*	text-align: right;*/
			/*}*/

			/*.invoice-box.rtl table tr td:nth-child(2) {*/
			/*	text-align: left;*/
			/*}*/
		</style>
		<style>
            table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
              vertical-align: top;
              text-align: left;
              line-height:12px;
              /*padding-top:-10px;*/
              padding-left:10px;
              font-size:12px;
              text-transform: uppercase;
              
             
            }
        </style>
	</head>
	<body>

	<?php foreach($order_invoice as $key => $value ){
			$shipping = $value->shipping_address;
			$product_detail=$value->product_detail;
			$ok = json_decode($shipping);
			$ok1 = json_decode($product_detail);
				
			// print_r($ok->shipping_customer_name);
			// print_r($value->product_detail);
			// print_r($value);
		}?>
		<div class="invoice-box">
		    <h2>Skyrabucks</h2>
		    <p>Opposite Sakshi Girls Hostel,</p>
		    <p>Old Mondha, Nanded.</p>
		    <p><b>Mob. No: +91 024623521559</b></p>
		    <p><b>GSTIN : 27CIEPA5739E1ZG</b></p>
		    <h3> Tax Invoice</h3>
		 
		    
            <table style="width:100%">
              <tr>
                  
                <td style="height: auto;">Bill to (Customer):
				<h4 style="width:100%; font-size:15px;"><?php echo($ok->billing_customer_name); ?></h4>
                    <p style="text-align:left;"><b>Address</b>:-<?php echo($ok->billing_address); echo",",$ok->billing_city;echo",",$ok->billing_pincode; echo",",$ok->billing_state;?></p>
                    <p style="text-align:left;"><b>Mobile No</b>:-<?php echo($ok->billing_phone);?></p>
                </td>

                <td style="height: auto;">Delivery Address:
                    <h4 style="width:100%; font-size:15px;"><?php echo($ok->shipping_customer_name); ?></h4>
                    <p style="text-align:left;"><b>Address</b>:-<?php echo($ok->shipping_address); echo",",$ok->shipping_city;echo",",$ok->shipping_pincode; echo",",$ok->shipping_state;?></p>
                    <p style="text-align:left;"><b>Mobile No</b>:-<?php echo($ok->shipping_phone);?></p>  
                </td>
                
                <td style="height: auto;">
                    <!-- <p style="text-align:left;"><b> Invoice No: </b><?php echo($order_code);?></p> -->
                    <p style="text-align:left;"><b>Invoice Date: </b><?php echo $value->order_detail_id?></p>
                    <p style="text-align:left;"><b> Transport: </b> DHL</p>
                    <p style="text-align:left;"><b> LR No: </b> </p>
                    <p style="text-align:left;"><b>LR Date: </b> 28/01/2023</p>
                    <p style="text-align:left;"><b>Weight: </b> 8kg</p>
                    <p style="text-align:left;"><b>Referencer Name: </b> </p>
                  
                </td>
              </tr>
             
            </table>

			<table style="width:100%">
				<tr>
					<th>S.No.</th>
					<th>Job Name</th>
					<!-- <th>Category</th> -->
					<th>Set</th>
				    <th>HSN Code</th>
					<th>Qty</th>
					<th>Rate</th>
				    <th>Amt.</th>
				    <!--<th>Taxable Amt.</th>-->
             
                    <th>IGST</th>
                    
                    
				</tr>
                   <?php foreach($ok1 as $key=>$details){?>  
                <tr>
					<td>1</td>
					<td><?php echo($details->job_name);?></td>
					<!-- <td>SHIRT</td> -->
					<td>1</td>
				    <td>62052000</td>
                    <td><?php echo($details->qty);?></td>
                    <td><?php echo($details->discount);?></td>
                    <td><?php echo($details->sub_total);?></td>
                  <td> 0</td>
                  
				</tr>
				<?php } ?>
				                    
                    <tr>
                    <td></td>
					<td></td>
					<!-- <td></td> -->
					<td></td>
                    <td>Total</td>
                    <td>15</td>
                    <th></th>
                    <th><?php echo $value->grand_total?></th>
                
                    <th>0</th>
                     
                    </tr>
            
			
				
			</table>
			<table style="width:100%">
				<tr>
					<!--<th>Tax %</th>-->
					<th>Ass.Value</th>
				
					<th>IGST</th>
				
					<th>Total Amt.</th>
		
                   
                </tr>
                	<tr>
				
					<th>8295</th>
			        <th>0</th>
					<th><?php echo $value->grand_total?></th>
				
                </tr>
			</table>
			
			<table style="width:100%">
				<tr>
					<td>
    					 <b><u>Bank Details for RTGS / NEFT :</u></b><br />
    					 <p style="text-align:left;"><b>Name</b>:- Skyrabucks
    					 <b>Bank Name</b>:- AXIS BANK
    				     <b>A/c No</b>:- 922020028641529
    					 <b>IFSC Code</b>:- UTIB0000318</p>
					</td>
                </tr>
			</table>
			<table style="width:100%">
				<tr>
					<td>
    					 <b><u>TERMS & CONDITIONS:</u></b><br />
    					 <p style="text-align:justify;  text-transform: capitalize;">1.Any claim or dispute arising from change in quality or shortage in quantity or any cause
                         whatsoever will not be entertained once the goods are deliverd.</p>
    					<p style="text-align:justify;  text-transform: capitalize;">2.We are not responsible for any loss or damage during transit.</p>
    					<p style="text-align:justify;  text-transform: capitalize;">3.Subject to NANDED Jurisdiction only.</p>
    					<p style="text-align:justify;  text-transform: capitalize;">4.Payment to be made by Payee A/c Cheue,Draft or NEFT/RTGS/IMPS.</p>
    					
					</td>
                </tr>
			</table>
			<table style="width:100%">
				<tr><br>
					<td>
    				   <p style="text-align:right;">E & O.E. For Skyrabucks</p> 
					</td>
                </tr>
			</table>
				
		</div>
	</body>
</html>