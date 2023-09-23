<?php require APPPATH . 'libraries/REST_Controller.php';
class Order_details extends REST_Controller {
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */

    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->table ='order_details';
       $this->load->library('cart');
      //  $this->load->model('Email_Model');
       date_default_timezone_set('Asia/Kolkata');
    }
       
         public function sendsms($phone,$message,$tempId){
        
                $url = 'http://103.16.101.52/sendsms/bulksms?username=cart-medadr&password=medadr&type=0&dlr=1&destination='.$phone.'&source=MEDADR&message='.$message.'&entityid=1201161191887735505&tempid='.$tempId;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                if($response){
                    return true;
                    
                }else{
                    return false;
                }
                curl_close($ch);
          
            }
        
          public function quick_place_order_post($customer_id='') {
        // checking form submission have any error or not
        // $shipping_address=array();
        // $grand_total=0;
        // $flag=TRUE;
        // $product_detail=array();
  
            $customer_id = $this->session->userdata('active_customer');
            if(!empty($customer_id))
             {
                $conCustomer['conditions'] = array(
                    'customer_id' => $customer_id

                );

            $customer_details=$this->Crud_model->getRows('customer',$conCustomer,'row');

                 $cust_details= array(

                      'customer_id' => $customer_id,
                      'full_name' => $full_name,
                      'email' => $email,
                      'mobile' =>$post_code
                 );
            
            if ($cart_details=json_decode($customer_details->cart_details)) {

                foreach ($cart_details as $key => $value_cart) {
                    $con['conditions'] = array(
                        'job_id' => $value_cart->job_id
                     );
                    
                $jobs=$this->Crud_model->getRows('jobs',$con,'row');
                $product_update = array('no_of_tym_order'=> $jobs->no_of_tym_order+1);
                $this->Crud_model->update('jobs',$product_update,$con);
                $job_img='default.jpg';
                
                if ($imag_tmp=$this->db->get_where('jobs', array('job_id '=>$jobs->job_id ))->row()) {
                                      # code...
                                      $job_img=$imag_tmp->job_name;
                         }
                                    
                                      $product_detail[] = array(
                                        "job"=>$jobs->jobs_id, 
                                        "job_name"=>$jobs->job_name, 
                                        "price"=>$jobs->price,
                                        "discount"=>round($jobs->discount,2),
                                        "quantity"=>$value_cart->qty,  
                                        "discount"=>$jobs->discount_percentage, 
                                        "product_image"=> $job_img, 
                                        "totals"=>round($jobs->shipping_price+($jobs->discount*$value_cart->qty),2),
                                        "shipping_price"=>$jobs->shipping_price,  //Added by Uttkarsh
                                        "delivery_boy"=>'',
                                        "shipment_id"=>'',
                                        "shipment_track"=>'Dispatching_soon', 
                                        "shipment_date"=>'', 
                                        "delivery_date"=>'');
                                        
                                    $grand_total+=($jobs->discount*$value_cart->qty)+$jobs->shipping_price;
                                          
                                }
                  
                      
                             }

                    $shipping_address = array(
                    "billing_customer_fill_name"=>$full_name,
                    "order_notes"=>$order_notes,
                    "billing_address"=>$address, 
                    "billing_address_2"=>$land_mark, 
                    "billing_city" =>$city, 
                    "billing_pincode"=>$post_code, 
                    "billing_state"=>$state, 
                    "billing_country"=> $country, 
                    "billing_email" =>$email, 
                    "billing_phone" =>$mobile, 
                    "shipping_is_billing" =>true, 
                    "shipping_customer_fill_name"=>$full_name, 
                    "shipping_address"=>$address, 
                    "shipping_address_2"=>$land_mark, 
                    "shipping_city" =>$city, 
                    "shipping_pincode" =>$post_code, 
                    "shipping_country"=> $country,
                    "shipping_state"=> $state, 
                    "shipping_email"=>$email, 
                    "shipping_phone"=>$mobile, 
                    "payment_method"=>"cod", 
                    "shipping_charges"=> 0, 
                    "giftwrap_charges"=>0, 
                    "transaction_charges"=>0,
                    "shipping_lag"=>NULL, 
                    "shipping_lat"=>NULL);
                          

               $order_data= array(
                    "product_detail" => json_encode($product_detail), 
                    "shipping_address" => json_encode($shipping_address), 
                    "customer_id" =>$customer_id, 
                    "grand_total" => $grand_total,
                     
                  );
                                             
                    $username=$full_name;    
                    //   $phone=$phone;    
                    
                    
                      $tempId='1207164345439331213';
                     
                      $messagephone = urlencode("Thanks ".$customer_details->full_name." for ordering Medicines with us. We will verify your order and get back to you shortly. Team Medical Aadhar");
                     
                      $this->sendsms($customer_details->mobile_number,$messagephone,$tempId);
                      
                      $tempIDOwner='1207165397716227559';
                      
                      $messageOwner=urlencode("Hello Medical Aadhar, You have new order having Order ID ".$ord_code.", please login and confirm the order. Thank you.");
                      
                      $this->sendsms('8007772000',$messageOwner,$tempIDOwner);

                       $this->response([
                          'status' => TRUE,
                          "message" => "successfully order placed."
                      ], REST_Controller::HTTP_OK);

                        

            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to order place."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
                
             }
            

      //        else{
      //            $this->response([
      //                   'status' => FALSE,
      //                   "message" => "Invalid Customer id"],
      //                   REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
      //        }
                
                
                
      // }
    
    
    
      public function place_order_post() {
        // checking form submittion have any error or not
    $shipping_address=array();
    $grand_total=0;

        $flag=TRUE;
        $product_detail=array();
  
            $fill_name = $this->security->xss_clean($this->post("fill_name"));

            $phone = $this->security->xss_clean($this->post("phone"));
            $land_mark = $this->security->xss_clean($this->post("land_mark"));
            $city = $this->security->xss_clean($this->post("city"));
            $state = $this->security->xss_clean($this->post("state"));
            $country = $this->security->xss_clean($this->post("country"));
            $pincode = $this->security->xss_clean($this->post("pincode"));
            $email = $this->security->xss_clean($this->post("email"));
            $order_notes = $this->security->xss_clean($this->post("order_notes"));
            $address = $this->security->xss_clean($this->post("address"));
            $customer_id= $this->security->xss_clean($this->post("customer_id"));
            $patient_name = $this->security->xss_clean($this->post("patient_name"));
            $doctor_name = $this->security->xss_clean($this->post("doctor_name"));
            
            
              $conCustomer['conditions'] = array(
                                  'customer_id' =>$customer_id,
                            );
                            
                            $customer_details=$this->Crud_model->getRows('customer',$conCustomer,'row');
            
        if(empty($fill_name)){
        
               $this->response([
                          'status' => FALSE,
                          "message" => "Please enter full name."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            
        }
            else if(empty($phone)){
               $this->response([
                          'status' => FALSE,
                          "message" => "Please check phone number."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            else if(empty($land_mark)){
               $this->response([
                          'status' => FALSE,
                          "message" => "Please enter Street address."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            else if(empty($city)){
               $this->response([
                          'status' => FALSE,
                          "message" => "Please enter city."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            else if(empty($state) ){
                   $this->response([
                          'status' => FALSE,
                          "message" => "Please enter state."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                
            }
            else if(empty($country) ){
                   $this->response([
                          'status' => FALSE,
                          "message" => "Please enter country."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            else if(empty($pincode) ){
                   $this->response([
                          'status' => FALSE,
                          "message" => "Please enter pincode."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            else if(empty($email)){
                   $this->response([
                          'status' => FALSE,
                          "message" => "Please enter email."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
              else if(empty($address)){
                   $this->response([
                          'status' => FALSE,
                          "message" => "Please enter address."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        else if(empty($patient_name)){
                   $this->response([
                          'status' => FALSE,
                          "message" => "Please enter patient name."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            else{
                
                
                if ($cart_details=json_decode($customer_details->cart_details)) {

                                 foreach ($cart_details as $key => $value_cart) {
                                      $con['conditions'] = array(
                                      'product_id' => $value_cart->product_id
                                      );
                    
                                       $product=$this->Crud_model->getRows('product',$con,'row');
                    
                                       $product_update = array('product_quantity' => $product->product_quantity - $value_cart->qty,'no_of_tym_order'=> $product->no_of_tym_order+1);
                                        
                                        $this->Crud_model->update('product',$product_update,$con);
                    
                                      $product_img='default.jpg';
                                      
                                        
                                      
                                      if ($imag_tmp=$this->db->get_where('product_file', array('product_id '=>$product->product_id ))->row()) {
                                      # code...
                                      $product_img=$imag_tmp->product_file_name;
                                      }
                                    
                                      $product_detail[] = array(
                                        "product"=>$product->product_id, 
                                        "product_name"=>$product->product_name, 
                                        "mrp"=>$product->mrp,
                                        "Mfr"=>$product->manufacturer,
                                        "discounted_price"=>round($product->discounted_price,2),
                                        "quantity"=>$value_cart->qty, 
                                        "saling_price"=>$product->product_saling_price, 
                                        "discount"=>$product->discounted_percentage, 
                                        "product_image"=> $product_img, 
                                        "totals"=>round($product->shipping_price+($product->discounted_price*$value_cart->qty),2),
                                        "shipping_price"=>$product->shipping_price,  //Added by Uttkarsh
                                        "seller_id"=>$product->created_by,
                                        "delivery_boy"=>'',
                                        "shipment_id"=>'',
                                        "shipment_track"=>'Dispatching_soon', 
                                        "shipment_date"=>'', 
                                        "delivery_date"=>'', 
                                        "cancle_product"=>"N",
                                        "cancle_date"=>'',
                                        "return_product"=>"N",
                                        "return_track"=>'', 
                                        "return_date"=>'', 
                                        "seller_received_return_product_date" =>'');
                                        
                                    $grand_total+=($product->discounted_price*$value_cart->qty)+$product->shipping_price;
                                          
                                }
                  
                      
                             }
                             
                     
                   $shipping_address = array("billing_customer_fill_name"=>$fill_name,
  
                    "order_notes"=>$order_notes,
                    "billing_address"=>$address, 
                    "billing_address_2"=>$land_mark, 
                    "billing_city" =>$city, 
                    "billing_pincode"=>$pincode, 
                    "billing_state"=>$state, 
                    "billing_country"=> $country, 
                    "billing_email" =>$email, 
                    "billing_phone" =>$phone, 
                    "shipping_is_billing" =>true, 
                    "shipping_customer_fill_name"=>$fill_name, 
                    "shipping_address"=>$address, 
                    "shipping_address_2"=>$land_mark, 
                    "shipping_city" =>$city, 
                    "shipping_pincode" =>$pincode, 
                    "shipping_country"=> $country,
                    "shipping_state"=> $state, 
                    "shipping_email"=>$email, 
                    "shipping_phone"=>$phone, 
                    "payment_method"=>"cod", 
                    "shipping_charges"=> 0, 
                    "giftwrap_charges"=>0, 
                    "transaction_charges"=>0,
                    "shipping_lag"=>NULL, 
                    "shipping_lat"=>NULL);
                          
                          
                          if(!empty($customer_details->order_Rx)){
                           
                           if($order_Rx=json_decode($customer_details->order_Rx))
                              {
                              foreach($order_Rx as $order_Rx_key => $order_Rx_value){
                                 
                                  
                                  $srcfile = './uploads/prescription/'.$order_Rx[$order_Rx_key]->image_rx_name;
                                    $destfile = './uploads/prescription_order/'.$order_Rx[$order_Rx_key]->image_rx_name;
                                 copy($srcfile, $destfile);
                                  
                                  
                                    }
                              }
                          }
                          
                          
                        $delivery_details[]=array('track'=>'pending' , 'date'=> date("Y-m-d h:i:s"));   
                            $ord_code=date('YmdHi').''.mt_rand(1000, 9999);
               $order_data= array(
                    "order_code" => $ord_code,
                    "product_detail" => json_encode($product_detail), 
                    "shipping_address" => json_encode($shipping_address), 
                    "customer_id" =>$customer_id, 
                    "grand_total" => $grand_total,
                    "prescription_details" => $customer_details->order_Rx,
                    "doctor_name"=>$doctor_name,
                    "patient_name"=>$patient_name,
                     "delivery_details"=> json_encode($delivery_details)
                  );
                  
                  // Check if the user data is inserted
             if($grand_total>=500) {
                  if($this->Crud_model->insert('order_details',$order_data)){
                      // Set the response and exit
                
                    $this->cart->destroy();
                    
                    

                      $status_update = array("order_Rx" => NULL,
                      "cart_details"=>NULL
                      );
           
            $this->Crud_model->update('customer',$status_update,$conCustomer);
                    
                    
                        // Email for customer
                        
                        // $this->session->set_flashdata('message_oreder', 'Your order has been placed!.');
                        // $subject="Order Placed";
                        // $message="Dear ".$customer_deatails->full_name.", Your order has been successfully placed. Thank You, Team MedicalAadhar";
                        // $this->Email_Model->use_mails($customer_deatails->email ,$subject,$message);
                        
                       // send sms cumer
                       
                      $username=$fill_name;    
                    //   $phone=$phone;    
                    
                    
                      $tempId='1207164345439331213';
                     
                      $messagephone = urlencode("Thanks ".$customer_details->full_name." for ordering Medicines with us. We will verify your order and get back to you shortly. Team Medical Aadhar");
                     
                      $this->sendsms($customer_details->mobile_number,$messagephone,$tempId);
                      
                      $tempIDOwner='1207165397716227559';
                      
                      $messageOwner=urlencode("Hello Medical Aadhar, You have new order having Order ID ".$ord_code.", please login and confirm the order. Thank you.");
                      
                      $this->sendsms('8007772000',$messageOwner,$tempIDOwner);
                    
                    
                    
                    
                    $this->response([
                          'status' => TRUE,
                          "message" => "successfully order placed."
                      ], REST_Controller::HTTP_OK);

                        

            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to order place."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
                
             }
             else{
                 $this->response([
                                      'status' => FALSE,
                                      "message" => "Order Amount should be Rs.500 or more. Please Add more medicines to proceed."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
             }
                
                
                
            }
    

    }


      public function place_order_mob_post() {
        // checking form submission have any error or not
        
        $customer_id =  $this->security->xss_clean($this->post("customer_id"));  
     
        $Address_ID = $this->security->xss_clean($this->post("session_address_id"));
        $grand_total=0;
      
        if(!empty($customer_id))
        {
             $con['conditions'] = array(
                'customer_id' => $customer_id,
            );
              if($customer_details=$this->Crud_model->getRows('customer',$con,'row')){
                  
                if($Address_ID){
                    $caddress=$this->db->get_where('customer_addresses', array('customer_id =' =>$customer_id,'c_addresses_id'=>$Address_ID))->row();
                
                }else{
                    $caddress=$this->db->get_where('customer_addresses', array('customer_id =' =>$customer_id,'is_default'=>'Y'))->row();
                
                }
                
                if ($cart=json_decode($customer_details->cart_details)) {
                   

                                 foreach ($cart as $key => $value_cart) {
                                      
                                      $con_pro['conditions'] = array(
                                      'job_id' => $value_cart->job_id
                                      );
                    
                                       $job_row=$this->Crud_model->getRows('jobs',$con_pro,'row');
                    
                                       $job_update = array('product_quantity' => $job_row->product_quantity - $value_cart->job_id ,'no_of_tym_order'=> $job_row->no_of_tym_order+1);
                                        
                                        $this->Crud_model->update('jobs',$job_update,$con_pro);
                    
                                      $job_img='default.jpg';
                                      
                                        
                                      
                                      if ($imag_tmp=$this->db->get_where('product_file', array('job_id '=>$job_row->job_id ))->row()) {
                                      # code...
                                      $job_img=$imag_tmp->product_file_name;
                                      }
                                    
                                      $product_detail[] = array(
                                        "job_id"=>$job_row-->job_id, 
                                        "job_name"=>$job_row-->job_name, 
                                        "mrp"=>$job_row-->mrp,
                                        "Mfr"=>$job_row-->manufacturer,
                                        "discount"=>round($job_row-->discount,2),
                                        "quantity"=>$value_cart->qty, 
                                        "saling_price"=>$job_row-->product_saling_price, 
                                        "percentage"=>$job_row-->percentage, 
                                        "job_image"=> $job_img, 
                                        "totals"=>round($job_row-->shipping_price+($job_row-->discount*$value_cart->qty),2),
                                        "shipping_price"=>$job_row-->shipping_price,  //Added by Uttkarsh
                                        "seller_id"=>$job_row-->created_by,
                                        "delivery_boy"=>'',
                                        "shipment_id"=>'',
                                        "shipment_track"=>'Dispatching_soon', 
                                        "shipment_date"=>'', 
                                        "delivery_date"=>'', 
                                        "cancle_product"=>"N",
                                        "cancle_date"=>'',
                                        "return_product"=>"N",
                                        "return_track"=>'', 
                                        "return_date"=>'', 
                                        "seller_received_return_product_date" =>'');
                                        
                                    $grand_total+=($job_row-->discount*$value_cart->qty)+$job_row-->shipping_price;
                                          
                                }
                  
                      
                             }
                             
              $shipping_address = array("billing_customer_fill_name"=>$customer_details->full_name,
                   "company_name"=>'',
                    "billing_address"=>$caddress->addresses, 
                    "billing_address_2"=>$caddress->land_mark, 
                    "billing_city" =>$caddress->city, 
                    "billing_pincode"=>$caddress->pincode, 
                    "billing_state"=>$caddress->state, 
                    "billing_country"=> $caddress->country, 
                    "billing_email" =>$customer_details->email, 
                    "billing_phone" =>$customer_details->mobile_number, 
                    "shipping_is_billing" =>true, 
                    "shipping_customer_fill_name"=>$customer_details->full_name, 
                    "shipping_address"=>$caddress->addresses, 
                    "shipping_address_2"=>$caddress->land_mark, 
                    "shipping_city" =>$caddress->city, 
                    "shipping_pincode" =>$caddress->pincode, 
                    "shipping_country"=> $caddress->country,
                    "shipping_state"=> $caddress->state, 
                    "shipping_email"=>$customer_details->email, 
                    "shipping_phone"=>$customer_details->mobile_number, 
                    "payment_method"=>"cod", 
                    "shipping_charges"=> 0, 
                    "giftwrap_charges"=>0, 
                    "transaction_charges"=>0,
                    "shipping_lag"=>$caddress->lag, 
                    "shipping_lat"=>$caddress->lat);
                  
                             $delivery_details[]=array('track'=>'pending' , 'date'=> date("Y-m-d h:i:s"));   
                              $ord_code=date('YmdHi').''.mt_rand(1000, 9999);
                    
                        $order_data= array(
                            "order_code" => $ord_code,
                            "product_detail" => json_encode($product_detail), 
                            "shipping_address" => json_encode($shipping_address), 
                            "customer_id" =>$customer_id, 
                            "grand_total" => $grand_total,
                            "prescription_details" => NULL,
                            "doctor_name"=>null,
                            "patient_name"=>null,
                            "delivery_details"=> json_encode($delivery_details)
                          );
                    
                     if($grand_total>=500) {
                  
                    
                          if($this->Crud_model->insert('order_details',$order_data)){
                              
                                 $status_update = array(
                                  "order_Rx" => NULL,
                                  "cart_details"=>NULL,
                             
                              );
                              
                               
                              $tempId='1207164345439331213';
                             
                              $messagephone = urlencode("Thanks ".$customer_details->full_name." for ordering Medicines with us. We will verify your order and get back to you shortly. Team Skyrabucks.");
                             
                              $this->sendsms($customer_details->mobile_number,$messagephone,$tempId);
                              
                              $tempIDOwner='1207165397716227559';
                              
                              $messageOwner=urlencode("Hello Skyrabucks, You have new order having Order ID ".$ord_code.", please login and confirm the order. Thank you.");
                              
                              $this->sendsms('8007772000',$messageOwner,$tempIDOwner);
                              
                              $this->Crud_model->update('customer',$status_update,$con);
                              
                                 $this->response([
                                          'status' => TRUE,
                                          "message" => "Successfully order place, Thank You."
                                      ], REST_Controller::HTTP_OK);
                                  }
                   }
                   else
                       {
                                 $this->response([
                                      'status' => FALSE,
                                      "message" => "Order Amount should be Rs.500 or more. Please Add more medicines to proceed."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      }
                      
                  }
                  
                 else{
                              // Set the response and exit
                            $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to order place."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                 }
                
                  
              }
             
              else
                    {
                       
                            $this->response([
                                  'status' => FALSE,
                                  "message" => "Customer not found."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                       
                    }   
   

    }


       public function customer_fetch_all_order_get() {

         $support_team_id= $this->session->userdata('active_support_team');

           // if($this->input->get('customer_id')){
           //      $customer_id=  $this->input->get('customer_id');
           // }else{
           //      $customer_id=  $this->session->userdata('active_customer');
           // }
          
            $option = array(
            'select' => 'order_details.*,cities_and_support_team.*',
            'table' => 'order_details',
            'order'=>array('order_detail_id'=> 'desc'),
            'join'=>array(array('cities_and_support_team'=>'cities_and_support_team.city_id
                =order_details.customer_city_id')),
            'where' =>array('support_team_id'=>$support_team_id)
            );

    
              if( $order_details=$this->Crud_model->commonGet($option)){
                  
                  foreach($order_details as $order_details_row=>$order_details_val){
                        if(!empty($order_details_val->delivery_person_id)){
                               $con['conditions'] = array(
                                  'delivary_boy_id' => $order_details_val->delivery_person_id
                               );
                                $userCount=$this->Crud_model->getRows('delivary_boy',$con,'row');
                            $order_details_val->delivery_full_name=$userCount->delivery_full_name;
                        }
                        else{
                            $order_details_val->delivery_full_name="";
                        }
                    }
           
                    $this->response([
                          'status' => TRUE,
                          "message" => "Orders load successfully.",
                          "data" => $order_details,
                  
                      ], REST_Controller::HTTP_OK);
             
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Orders does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
       
   }


public function fetch_single_order_product_get($order_code = '') {
    // Fetch order details from the database based on the provided order code
    $con['conditions'] = array('order_code' => $order_code);
    $userCount = $this->Crud_model->getRows('order_details', $con, 'row');

    if (!empty($userCount)) {
        $customer = $userCount->customer_id;

        // Fetch customer details from the database based on the customer ID
        $con1['conditions'] = array('customer_id' => $customer);
        $customer_detail = $this->Crud_model->getRows('customer', $con1, 'row');
        $customer_address = $this->Crud_model->getRows('address', $con1, 'row');

        $product_detail = json_decode($userCount->product_detail);
        foreach ($product_detail as $key => $value) {
            $main_service_id = $value->main_service_id;

            // Fetch main service details from the database based on the main service ID
            $con2['conditions'] = array('main_service_id' => $main_service_id);
            $main_service = $this->Crud_model->getRows('main_service', $con2, 'row');

            $product_detail[$key]->main_service_id = $main_service;
        }

        $userCount->product_detail = json_encode($product_detail);
        $product_detail = json_decode($userCount->product_detail);

        foreach ($product_detail as $key => $value) {
            $main_service_id = $value->main_service_id->main_service_id;

            // Fetch service provider details from the database based on the main service ID
            $con3['conditions'] = array('main_service_id' => $main_service_id);
            $service_provider = $this->Crud_model->getRows('service_provider', $con3, 'result');

            $product_detail[$key]->service_provider_detail = $service_provider;
        }

        $order_detail = array(
            "order_code" => $order_code,
            "full_name" => $customer_detail->full_name,
            "mobile" => $customer_detail->mobile,
            "address" => $customer_address,
            "product_details" => $product_detail,
            "shipping_address" => json_decode($userCount->shipping_address),
            "grand_total" => $userCount->grand_total,
        );

        if (!empty($order_detail)) {
            $this->response([
                'status' => TRUE,
                "message" => "Order loaded successfully.",
                "data" => $order_detail,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                "message" => "Order not found.",
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    } else {
        $this->response([
            'status' => FALSE,
            "message" => "Invalid Order Id.",
        ], REST_Controller::HTTP_BAD_REQUEST);
    }
}



   //start of fetch order by customer id 
public function fetch_orders_customer_get($customer_id='') {

 $customer_id=$this->security->xss_clean($this->get("customer_id"));
  if (!empty($customer_id) && is_numeric($customer_id)) {
    # code...
    $con['conditions'] = array(
          'customer_id' => $customer_id
          );
        if ($userCount = $this->Crud_model->getRows('order_details',$con ,'result')) {
          foreach($userCount as $key=>$value){
            $value->product_detail = json_decode($value->product_detail); 
            $value->shipping_address = json_decode($value->shipping_address); 
          }
          # code...
          // print_r($userCount);
            $this->response([
                  'status' => TRUE,
                  "message" => "Order Details load successfully.",
                  "data" => $userCount,
          
              ], REST_Controller::HTTP_OK);        
        }
          else{
            $this->response([
                  'status' => FALSE,
                  "message" => "There are no orders",
              ], REST_Controller::HTTP_BAD_REQUEST);
            
          }
    
    } 
  else{
            $this->response([
                  'status' => FALSE,
                  "message" => "please check order id.",
              ], REST_Controller::HTTP_BAD_REQUEST);
            
  }
}
    
    public function customer_order_list_get(){
        
          if($this->input->get('customer_id')){
                $customer_id=  $this->input->get('customer_id');
           }else{
                $customer_id=  $this->session->userdata('active_customer');
           }
           
             $option = array(
                'select' => 'order_details.order_detail_id,order_details.order_code,order_details.order_date,order_details.grand_total,order_details.payment_status,order_details.product_detail,order_details.shipping_address,order_details.is_delivered',
                'table' => 'order_details',
                'order'=>array('order_details.order_detail_id'=> 'desc'),
                'limit'=>1,
                // 'join'=>array(array('product_file'=>'product_file.product_id=product.product_id')),
                'where' =>array('order_details.customer_id' => $customer_id,'order_details.cancel_order' =>'N')
            );
            
            if( $order_details=$this->Crud_model->commonGet($option)){
                foreach($order_details as $key=>$value){
                 // print_r($value);
                 // exit();
                    $value->product_detail = json_decode($value->product_detail); 
                    $value->shipping_address = json_decode($value->shipping_address); 
                   }

                    $this->response([
                          'status' => TRUE,
                          "message" => "Orders load successfully.",
                          "data" => $order_details,
                  
                      ], REST_Controller::HTTP_OK);
             
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Orders does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
    
        
    }
    
    public function fetch_customer_order_info_get(){
        
              if($this->input->get('order_code')){
             
               $con['conditions'] = array(
                  'order_code' => $this->input->get('order_code')
                  );

                 if($order_details=$this->Crud_model->getRows('order_details',$con,'row')){
                   
                    
                     $delivery_details=json_decode($order_details->delivery_details);
                     $shipping_address=json_decode($order_details->shipping_address);
                     $track='';
                    if($delivery_details){
                        $track=   str_replace("_"," ",$delivery_details[count($delivery_details)-1]->track);  
                    }else{
                        $track="waiting..";
                    }
                   
                   
                    $order_info[]=array(
                        "order_detail_id"=>$order_details->order_detail_id,
                        "order_code"=>$order_details->order_code,
                        "payment_status"=>$order_details->payment_status,
                        "grand_total"=>$order_details->grand_total,
                        "order_date"=>$order_details->order_date,
                        "patient_name"=>$order_details->patient_name,
                        "payment_type"=>$order_details->payment_type,
                        
                        "delivery_status"=>$track,
                        
                        "shipping_customer_fill_name"=>$shipping_address->shipping_customer_fill_name,
                        "shipping_address"=>$shipping_address->shipping_address,
                        "shipping_address_2"=>$shipping_address->shipping_address_2,
                        "shipping_city"=>$shipping_address->shipping_city,
                        "shipping_pincode"=>$shipping_address->shipping_pincode,
                        "shipping_country"=>$shipping_address->shipping_country,
                        "shipping_state"=>$shipping_address->shipping_state,
                        "shipping_email"=>$shipping_address->shipping_email,
                        "shipping_phone"=>$shipping_address->shipping_phone,
                        "payment_method"=>$shipping_address->payment_method,
                        "shipping_charges"=>$shipping_address->shipping_charges,
                        "giftwrap_charges"=>$shipping_address->giftwrap_charges,
                        "transaction_charges"=>$shipping_address->transaction_charges,
                        "shipping_lag"=>$shipping_address->shipping_lag,
                        "shipping_lat"=>$shipping_address->shipping_lat,
                        );
                    //  $order_info->order_code=$order_details->order_code;
                    //  $order_info->payment_status=$order_details->payment_status;
                    //  $order_info->grand_total=$order_details->grand_total;
                    //  $order_info->order_date=$order_details->order_date;
                    //  $order_info->patient_name=$order_details->patient_name;
                    //  $order_info->payment_type=$order_details->payment_type;
                    
                    //  $order_info->delivery_status=$delivery_details->shipment_track;
                    
                    //  $order_info->shipping_customer_fill_name=$shipping_address->shipping_customer_fill_name;
                    //  $order_info->shipping_address=$shipping_address->shipping_address;
                    //  $order_info->shipping_address_2=$shipping_address->shipping_address_2;
                    //  $order_info->shipping_city=$shipping_address->shipping_city;
                    //  $order_info->shipping_pincode=$shipping_address->shipping_pincode;
                    //  $order_info->shipping_country=$shipping_address->shipping_country;
                    //  $order_info->shipping_state=$shipping_address->shipping_state;
                    //  $order_info->shipping_email=$shipping_address->shipping_email;
                    //  $order_info->shipping_phone=$shipping_address->shipping_phone;
                    //  $order_info->payment_method=$shipping_address->payment_method;
                    //  $order_info->shipping_charges=$shipping_address->shipping_charges;
                    //  $order_info->giftwrap_charges=$shipping_address->giftwrap_charges;
                    //  $order_info->transaction_charges=$shipping_address->transaction_charges;
                     
                      $this->response([
                          'status' => TRUE,
                          "message" => "Order Information load successfully.",
                          "data" => $order_info,
                  
                      ], REST_Controller::HTTP_OK);
                     
             
                     
                 }
                 else{
                       $this->response([
                          'status' => FALSE,
                          "message" => "Order Not Found.",
                      ], REST_Controller::HTTP_BAD_REQUEST);
                
                     
                 }
             
          }
          else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Invalid Data.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
          }
              
    }
        
   
    
     public function fetch_all_orders_get() {
         
 $option = array(
            'select' => 'order_details.*,customer.*',
            'table' => 'order_details',
            'order'=>array('order_detail_id'=> 'desc'),
            'join'=>array(array('customer'=>'customer.customer_id=order_details.customer_id')),
            // 'where' =>array('DATE(order_details.order_date)' => date('Y-m-d'))
            );
              if($order_details=$this->Crud_model->commonGet($option)){
                
                    foreach($order_details as $order_details_row=>$order_details_val){
                        if(!empty($order_details_val->delivery_person_id)){
                               $con['conditions'] = array(
                                  'delivary_boy_id' => $order_details_val->delivery_person_id
                               );
                                $userCount=$this->Crud_model->getRows('delivary_boy',$con,'row');
                            $order_details_val->delivery_full_name=$userCount->delivery_full_name;
                        }
                        else{
                            $order_details_val->delivery_full_name="";
                        }
                    }
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Sales load successfully.",
                          "data" => $order_details,
                  
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Sales does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
                
     
        
        
   }
   
   
   
   

  //       public function fetch_order_product_get($order_id='') {

  //           if($order_code=$this->input->get('order_code')){
  //                $con['conditions'] = array(
  //                 'order_code' => $order_code
  //                 );
  //           }   
  //           else{
  //               $con['conditions'] = array(
  //                 'order_detail_id' => $order_id
  //                 );
  //           }
  //            $userCount=$this->Crud_model->getRows('order_details',$con,'row');
  //            $userCount1=json_decode($userCount->job_detail);
             
  //            foreach ($userCount1 as $key => $value) {
  //              # code...
  //               // if ($value->seller_id==$this->session->userdata('active_admin')) {
  //                 # code...
  //                     $value1[]=$value;
  //               // }
  //            }
 
  //             if($value1){

  //                 // Set the response and exit
  //                   $this->response([
  //                         'status' => TRUE,
  //                         "message" => "Product load successfully.",
  //                         "data" => $value1,
                  
  //                     ], REST_Controller::HTTP_OK);
  //                 // Check if the user data is inserted
               
  //             }
              
  //             else{
  //               $this->response([
  //                     'status' => FALSE,
  //                     "message" => "Product does not exist.",
  //                 ], REST_Controller::HTTP_BAD_REQUEST);
                
  //             }
        
        
  //  }
  public function fetch_order_product_get($order_code='') {

    $con['conditions'] = array(
      'order_code' => $order_code,
      );
    $userCount = $this->Crud_model->getRows('order_details',$con,'row');
    $userCount1=json_decode($userCount->job_detail);
    // print_r($userCount1);
    $grand_total=0;

    if(!empty($userCount)){
      foreach($userCount1 as $key => $value) {
        if($key !='grand_total'){

          //   print_r($userCount1);
          
            $con1['conditions'] = array(
                'job_id' => ($value->job_id),
              );
            $img_single = $this->Crud_model->getRows('jobs',$con1,'row');
            $value->img_single=$img_single->job_name;      
            $value1[]=$value;
          }
      }
      $grand_total = $userCount->grand_total;
      if($value1){
          // Set the response and exit
            $this->response([
                  'status' => TRUE,
                  "message" => "Product load successfully.",
                  "data" => $value1,'grand_total'=> $grand_total,
          
              ], REST_Controller::HTTP_OK);
          // Check if the user data is inserted
      }
      else{
        $this->response([
              'status' => FALSE,
              "message" => "Product does not exist.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
    }else{
      $this->response([
        'status' => FALSE,
        "message" => "Invalid Order Id.",
    ], REST_Controller::HTTP_BAD_REQUEST);
    }
}
   
   
   public function change_delivery_person_post(){
        $order_detail_id=$this->security->xss_clean($this->post("order_detail_id"));
        $delivery_person_id=$this->security->xss_clean($this->post("delivery_person_id"));
        $flag=true;
          if(!empty($order_detail_id) and !empty($delivery_person_id)){
              
              $con['conditions'] = array(
                'order_detail_id' => $order_detail_id
                );
             
               $status_update = array("delivery_person_id"=>$delivery_person_id);
                
                 if($update_status=$this->Crud_model->update('order_details',$status_update,$con)){
                      
                                            $this->response([
                                            'status' => TRUE,
                                            "message" => "Delivery Person Updated Successfully",
                                            "data"=>$update_status  
                                            ], REST_Controller::HTTP_OK);
                     
                 }else{
                       $this->response([
                                                  'status' => FALSE,
                                                  "message" => "Failed to update delivery person."],
                                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                 }
          }
          else{
            
                $this->response([
                          'status' => FALSE,
                          "message" => "Invalid Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
   }
    public function Change_delivery_status_post() {

     
        $shipment_track=$this->security->xss_clean($this->post("shipment_track"));
        $order_detail_id=$this->security->xss_clean($this->post("order_detail_id"));
        if(!empty($this->security->xss_clean($this->post("cancel_reason")))){
            $cancel_reason=$this->security->xss_clean($this->post("cancel_reason"));
        }
        else{
            $cancel_reason=NULL;
        }
        
        $flag=true;
    
    
        if(!empty($order_detail_id) and !empty($shipment_track)){
           

                $con['conditions'] = array(
                'order_detail_id' => $order_detail_id
                );

        $order_details=$this->Crud_model->getRows('order_details',$con,'row');
        
        if($order_details){
            
            if($shipment_track!="Cancelled"){
                 if($order_details->is_verified==1 ){
                
          
                $delivery_details=json_decode($order_details->delivery_details);
                
                if($delivery_details){
            
                        
                            foreach($delivery_details as $delivery_details_key => $delivery_details_value)
                            {
                                if($delivery_details_value->track==$shipment_track){
                                    $flag=false;
                                }
                             
                                
                            }
                            if($flag){
                                
                                $delivery_details[]=array('track'=>$shipment_track , 'date'=> date("Y-m-d h:i:s"),'cancel_reason'=>$cancel_reason);
                        
                        
                                    if($shipment_track=='Delivered'){
                                           $status_update = array("payment_status"=>"PAID","is_delivered"=>1,"delivery_details" => json_encode($delivery_details));
                                    }
                                    else if($shipment_track=='Cancelled'){
                                      $status_update = array("cancel"=>1,"delivery_details" => json_encode($delivery_details));  
                                    }
                                    else{
                                          $status_update = array("delivery_details" => json_encode($delivery_details));
                                    }
                                
            
                                   
                                    if($update_status=$this->Crud_model->update('order_details',$status_update,$con)){
                                             
                                              $shipping_address=json_decode($order_details->shipping_address);
                                              
                                              $username=$shipping_address->shipping_customer_fill_name;    
                                              $phone=$shipping_address->shipping_phone;  
                                          
                                              $tempId='1207164345484853978';
                                        
                                              $messagephone = urlencode("Hi Customer. Delivery status for your order is ".$shipment_track.". Team Medical Aadhar");
                                              $this->sendsms($phone,$messagephone,$tempId);
                                         
                                            
                                            $this->response([
                                            'status' => TRUE,
                                            "message" => "Status Updated Successfully",
                                            "data"=>$delivery_details
                                            ], REST_Controller::HTTP_OK);
                           
                                    }
                                    else{
                                              // Set the response and exit
                                              $this->response([
                                                  'status' => FALSE,
                                                  "message" => "Failed to update status."],
                                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                    }
                                                
                            }
                            else{
                                  $this->response([
                                                      'status' => FALSE,
                                                      "message" => "Already this status uploades."],
                                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }
            
                }
                else{
                       $delivery_details[]=array('track'=>$shipment_track , 'date'=> date("Y-m-d h:i:s"),'cancel_reason'=>$cancel_reason);
                        

                           if($shipment_track=='Delivered'){
                                           $status_update = array("payment_status"=>"PAID","is_delivered"=>1,"delivery_details" => json_encode($delivery_details));
                                    }
                                    else if($shipment_track=='Cancelled'){
                                      $status_update = array("cancel"=>1,"delivery_details" => json_encode($delivery_details));  
                                    }
                                    else{
                                          $status_update = array("delivery_details" => json_encode($delivery_details));
                                    }
                                
                                   
                                    if($update_status=$this->Crud_model->update('order_details',$status_update,$con)){
                                             
                                              $shipping_address=json_decode($order_details->shipping_address);
                                              
                                              $username=$shipping_address->shipping_customer_fill_name;    
                                              $phone=$shipping_address->shipping_phone;  
                                          
                                              $tempId='1207164345484853978';
                                        
                                              $messagephone = urlencode("Hi Customer. Delivery status for your order is ".$shipment_track.". Team Medical Aadhar");
                                           $this->sendsms($phone,$messagephone,$tempId);
                                         
                                            
                                            $this->response([
                                            'status' => TRUE,
                                            "message" => "Status Updated Successfully",
                                            "data"=>$delivery_details
                                            ], REST_Controller::HTTP_OK);
                           
                                    }
                                    else{
                                              // Set the response and exit
                                              $this->response([
                                                  'status' => FALSE,
                                                  "message" => "Failed to update status."],
                                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                    }
                }
            
            }
            else{
                
                            $this->response([
                              'status' => FALSE,
                              "message" => "Please verify your order."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
         }
         else{
             
                $delivery_details=json_decode($order_details->delivery_details);
                
                if($delivery_details){
            
                        
                            foreach($delivery_details as $delivery_details_key => $delivery_details_value)
                            {
                                if($delivery_details_value->track==$shipment_track){
                                    $flag=false;
                                }
                             
                                
                            }
                            if($flag){
                                
                                $delivery_details[]=array('track'=>$shipment_track , 'date'=> date("Y-m-d h:i:s"),'cancel_reason'=>$cancel_reason);
                        
                        
                                    if($shipment_track=='Delivered'){
                                           $status_update = array("payment_status"=>"PAID","is_delivered"=>1,"delivery_details" => json_encode($delivery_details));
                                    }
                                    else if($shipment_track=='Cancelled'){
                                      $status_update = array("cancel"=>1,"delivery_details" => json_encode($delivery_details));  
                                    }
                                    else{
                                          $status_update = array("delivery_details" => json_encode($delivery_details));
                                    }
                                
            
                                   
                                    if($update_status=$this->Crud_model->update('order_details',$status_update,$con)){
                                             
                                              $shipping_address=json_decode($order_details->shipping_address);
                                              
                                              $username=$shipping_address->shipping_customer_fill_name;    
                                              $phone=$shipping_address->shipping_phone;  
                                          
                                              $tempId='1207164345484853978';
                                        
                                              $messagephone = urlencode("Hi Customer. Delivery status for your order is ".$shipment_track.". Team Medical Aadhar");
                                             $this->sendsms($phone,$messagephone,$tempId);
                                         
                                            
                                            $this->response([
                                            'status' => TRUE,
                                            "message" => "Status Updated Successfully",
                                            "data"=>$delivery_details
                                            ], REST_Controller::HTTP_OK);
                           
                                    }
                                    else{
                                              // Set the response and exit
                                              $this->response([
                                                  'status' => FALSE,
                                                  "message" => "Failed to update status."],
                                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                    }
                                                
                            }
                            else{
                                  $this->response([
                                                      'status' => FALSE,
                                                      "message" => "Already this status uploades."],
                                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }
            
                }
                else{
                       $delivery_details[]=array('track'=>$shipment_track , 'date'=> date("Y-m-d h:i:s"),'cancel_reason'=>$cancel_reason);
                        

                           if($shipment_track=='Delivered'){
                                           $status_update = array("payment_status"=>"PAID","is_delivered"=>1,"delivery_details" => json_encode($delivery_details));
                                    }
                                    else if($shipment_track=='Cancelled'){
                                      $status_update = array("cancel"=>1,"delivery_details" => json_encode($delivery_details));  
                                    }
                                    else{
                                          $status_update = array("delivery_details" => json_encode($delivery_details));
                                    }
                                
                                   
                                    if($update_status=$this->Crud_model->update('order_details',$status_update,$con)){
                                             
                                              $shipping_address=json_decode($order_details->shipping_address);
                                              
                                              $username=$shipping_address->shipping_customer_fill_name;    
                                              $phone=$shipping_address->shipping_phone;  
                                          
                                              $tempId='1207164345484853978';
                                        
                                              $messagephone = urlencode("Hi Customer. Delivery status for your order is ".$shipment_track.". Team Medical Aadhar");
                                            $this->sendsms($phone,$messagephone,$tempId);
                                         
                                            
                                            $this->response([
                                            'status' => TRUE,
                                            "message" => "Status Updated Successfully",
                                            "data"=>$delivery_details
                                            ], REST_Controller::HTTP_OK);
                           
                                    }
                                    else{
                                              // Set the response and exit
                                              $this->response([
                                                  'status' => FALSE,
                                                  "message" => "Failed to update status."],
                                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                    }
                }
         }
            
           
        }
        else{
             $this->response([
                          'status' => FALSE,
                          "message" => "order not found."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        } 
            
        }else{
            
                $this->response([
                          'status' => FALSE,
                          "message" => "Invaild Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
        public function fetch_delivery_status_get() {

     
        $order_detail_id=$this->security->xss_clean($this->get("order_detail_id"));
       
        $con['conditions'] = array(
           'order_detail_id' => $order_detail_id
        );

        $order_details=$this->Crud_model->getRows('order_details',$con,'row');
        
        if($order_details){
                    $delivery_details=json_decode($order_details->delivery_details);
                    $this->response([
                    'status' => TRUE,
                    "message" => "Delivery status fetch Successfully",
                    "data"=>$delivery_details
                    ], REST_Controller::HTTP_OK);
   
            }
            else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to status fetch."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
      
                     
    }
    
    
    
       public function fetch_details_orders_get() {

     
        $order_detail_id=$this->security->xss_clean($this->get("order_detail_id"));
       
       
        if($order_detail_id){
            
  
      $option = array(
            'select' => 'order_details.*,customer.*',
            'table' => 'order_details',
            'join'=>array(array('customer'=>'customer.customer_id=order_details.customer_id')),
            'where' =>array('order_details.order_detail_id' => $order_detail_id),
            'single'=>true
            );
                  if( $order_details=$this->Crud_model->commonGet($option)){
       
                    if($order_details->product_detail){
                         	$order_details->product_detail=json_decode($order_details->product_detail);
 
                    }
                                 if($order_details->delivery_details){
                           $order_details->delivery_details=json_decode($order_details->delivery_details);
                    
                    }
                                   if($order_details->prescription_details){
                           $order_details->prescription_details=json_decode($order_details->prescription_details);
                    
                    }
                                   if($order_details->shipping_address){
                           $order_details->shipping_address=json_decode($order_details->shipping_address);
                    
                    }
             
           
                  
                  
                    $this->response([
                    'status' => TRUE,
                    "message" => "Delivery status fetch Successfully",
                    "data"=>$order_details
                    ], REST_Controller::HTTP_OK);
   
        
        }
        else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "order not found."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        
            
        }else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "order id not foud."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
                     
    }
    
    
   
    public function fetch_order_product_and_payment_details_get($order_id='') {

                $con['conditions'] = array(
                  'order_detail_id' => $order_id
                  );

                $cond5['conditions'] = array(
                  'g_s_id' => 1
                  );

             $userCount=$this->Crud_model->fetch_order_product('order_details',$con,'result');

              $generalSettingData=$this->Crud_model->getRows('order_details',$cond5,'result');
             $closing_fees= json_decode($generalSettingData->closing_fees);

             $userCount1=json_decode($userCount->product_detail);

         
             foreach ($userCount1 as $key => $value) {


               # code...
                if ($value->seller_id==$this->session->userdata('active_seller')) {
                  # code...
                      $value1[]=$value;
                }
             }
 
              if($value1){

                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Product load successfully.",
                          "data" => $value1,
                 
                          "closing_fees"=>$closing_fees
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Product does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
            }

   public function order_cancel_post() {

           $order_no=$this->security->xss_clean($this->post("order_no"));
           if($order_no){
            
            $product_update = array( "cancel" => 1 );
            $con_custom['conditions'] = array('order_code' => $order_no);   

                 if($this->Crud_model->update($this->table,$product_update,$con_custom)){
            
                   $order_details = $this->Crud_model->getRows('order_details',$con_custom,'row');
                  
                      // $subject="Order Cancelled";
                        // $message="Your order for ".$product_name." is successfully cancelled. If it was prepaid, you will get refund in 3 working days. Thank You.";
                        // $this->Email_Model->use_mails($customer_deatails->email ,$subject,$message);

                  
                   $shipping_address=json_decode($order_details->shipping_address);
                   $username=$shipping_address->shipping_customer_fill_name;    
                   $phone=$shipping_address->shipping_phone;  
                  
             
                    $tempId='1207164345493364829';
                    $messagephone = urlencode("Dear ".$username.", We are sorry that you wish to cancel your order from Medical Aadhar. We will update you soon about the refund if any. Thank you. Team Medical Aadhar");
                    $this->sendsms($phone,$messagephone,$tempId);
                  
                  
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Product Successfully canceled"
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to cancel Product."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
           }else{
               $this->response([
                          'status' => FALSE,
                          "message" => "Order No. not found."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
         
   }

     public function fetch_orders_get() {

        $order_code=$this->security->xss_clean($this->get("order_id"));

      if (!empty($order_code) && is_numeric($order_code)) {
        # code...
         $con['conditions'] = array(
                  'order_code' => $order_code
                  );

             
             if ($userCount = $this->Crud_model->getRows('order_details',$con,'row')) {
               # code...
            
            
            // print_r($userCount);
            
            // exit();

           
            $userCount->product_detail=json_decode($userCount->product_detail);
 
            $userCount->prescription_details=json_decode($userCount->prescription_details);
             
             $date=date_create($userCount->order_date);
             $return_ex= date_format($date,"Y-m-d");
             
              if ($return_ex > date("Y-m-d")){
                  $userCount->return_ex="Y";
              }else{
                  $userCount->return_ex="N";
              }
              if($userCount){
                    $this->response([
                          'status' => TRUE,
                          "message" => "Product load successfully.",
                          "data" => $userCount,
                      ], REST_Controller::HTTP_OK);
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Product does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
             }
             else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Product does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        
      } 
       else{
                $this->response([
                      'status' => FALSE,
                      "message" => "please check order id.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }

               
        
   }
   
   public function add_product_to_order_seller_post(){
       
        $product_id=$this->security->xss_clean($this->post("product_id"));
        $order_id=$this->security->xss_clean($this->post("order_id"));
        $quantity=$this->security->xss_clean($this->post("quantity"));
        
        $dont_add=0;
        $grand_total=0;
        
        $flag=TRUE;
        
        $conOrder['conditions'] = array(
                  'order_detail_id' => $order_id
                  );  
        $order_details = $this->Crud_model->getRows('order_details',$conOrder,'row');
        
        $old_product_detail=json_decode($order_details->product_detail);
        
     if( $old_product_detail){
            foreach($old_product_detail as $old_product_detail_row =>$old_product_detail_val){
            if($old_product_detail_val->product==$product_id){
                    
               $dont_add=1;
               
            }
        }
     }
     
        
        $con2['conditions'] = array(
                  'product_id' => $product_id
                  );  
        $product = $this->Crud_model->getRows('product',$con2,'row');
        
        if ($product->product_quantity <= 0) {
            $flag=FALSE;
            return 0;
        }  
        
        
        $product_update = array('product_quantity' => $product->product_quantity - $quantity);
                                        
        $this->Crud_model->update('product',$product_update,$con2);
                    
        $product_img='default.jpg';
        
        if ($imag_tmp=$this->db->get_where('product_file', array('product_id '=>$product->product_id ))->row()) {
              $product_img=$imag_tmp->product_file_name;
        }
                                    
        $product_detail[] = array(
            
             "product"=>$product->product_id, 
             "product_name"=>$product->product_name, 
             "mrp"=>$product->mrp,
             "Mfr"=>$product->manufacturer,
             "discounted_price"=>round($product->discounted_price,2),
             "quantity"=>$quantity, 
             "saling_price"=>$product->product_saling_price, 
             "discount"=>$product->discounted_percentage, 
             "product_image"=> $product_img, 
             "totals"=>round($product->shipping_price+($product->discounted_price*$quantity),2),
             "shipping_price"=>$product->shipping_price,  //Added by Uttkarsh
             "seller_id"=>$product->created_by,
             "delivery_boy"=>'',
             "shipment_id"=>'',
             "shipment_track"=>'Dispatching_soon', 
             "shipment_date"=>'', 
             "delivery_date"=>'', 
             "cancle_product"=>"N",
             "cancle_date"=>'',
             "return_product"=>"N",
             "return_track"=>'', 
             "return_date"=>'', 
             "seller_received_return_product_date" =>''
           
           );
             
        $grand_total+=($product->discounted_price*$quantity)+$product->shipping_price;
        if(!empty($old_product_detail)){
        $old_product_detail=array_merge($old_product_detail,$product_detail);
        }else{
            $old_product_detail=$product_detail;
        }
        $order_data= array(
                    "product_detail" => json_encode($old_product_detail), 
                    "grand_total" => $order_details->grand_total+round($grand_total),
        );
        
        if($dont_add==0){
           if($this->Crud_model->update('order_details',$order_data,$conOrder)){
                  $this->response([
                          'status' => TRUE,
                          "message" => "successfully added Product to order."
                      ], REST_Controller::HTTP_OK);

                  }
          else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to add product to order."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
        }else{
                // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Product already in order."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
      
   }
    public function abc_post(){
       

        echo "gsug";
        exit();      
        // $main_service_id=$this->security->xss_clean($this->post("main_service_id"));
        $service_provider_id=$this->security->xss_clean($this->post("service_provider_id"));
        $order_code=$this->security->xss_clean($this->post("order_code"));
        echo $order_code;
        exit();
        // $job_name=$this->security->xss_clean($this->post("job_name"));

        
        
        $conOrder['conditions'] = array(
                  'order_code' => $order_code,
                  );  

        $order_details = $this->Crud_model->getRows('order_details',$conOrder,'row');
        $shipping_details = $order_details->shipping_address;

        // $shipping_address=json_decode($order_details->shipping_address);
        
        $old_product_detail=json_decode($order_details->product_detail);
        $con2['conditions'] = array(
                  'product_id' => $product_id
                  );  
        $product = $this->Crud_model->getRows('product',$con2,'row');
        
        if ($product->product_quantity <= 0) {
            $flag=FALSE;
            return 0;
        }  
        
        
        $product_update = array('product_quantity' => $product->product_quantity - $quantity);
                                        
        $this->Crud_model->update('product',$product_update,$con2);
                    
        $product_img='default.jpg';
        
        if ($imag_tmp=$this->db->get_where('product_file', array('product_id '=>$product->product_id ))->row()) {
              $product_img=$imag_tmp->product_file_name;
        }
                                    
        $product_detail[] = array(
            
             "product"=>$product->product_id, 
             "product_name"=>$product->product_name, 
             "mrp"=>$product->mrp,
             "Mfr"=>$product->manufacturer,
             "discounted_price"=>round($product->discounted_price,2),
             "quantity"=>$quantity, 
             "saling_price"=>$product->product_saling_price, 
             "discount"=>$product->discounted_percentage, 
             "product_image"=> $product_img, 
             "totals"=>round($product->shipping_price+($product->discounted_price*$quantity),2),
             "shipping_price"=>$product->shipping_price,  //Added by Uttkarsh
             "seller_id"=>$product->created_by,
             "delivery_boy"=>'',
             "shipment_id"=>'',
             "shipment_track"=>'Dispatching_soon', 
             "shipment_date"=>'', 
             "delivery_date"=>'', 
             "cancle_product"=>"N",
             "cancle_date"=>'',
             "return_product"=>"N",
             "return_track"=>'', 
             "return_date"=>'', 
             "seller_received_return_product_date" =>''
           
           );
             
        $grand_total+=($product->discounted_price*$quantity)+$product->shipping_price;
        if(!empty($old_product_detail)){
        $old_product_detail=array_merge($old_product_detail,$product_detail);
        }else{
            $old_product_detail=$product_detail;
        }
        $order_data= array(
                    "product_detail" => json_encode($old_product_detail), 
                    "grand_total" => $order_details->grand_total+round($grand_total),
        );
        
        if($dont_add==0){
           if($this->Crud_model->update('order_details',$order_data,$conOrder)){
                  $this->response([
                          'status' => TRUE,
                          "message" => "successfully added Product to order."
                      ], REST_Controller::HTTP_OK);

                  }
          else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to add product to order."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
        }else{
                // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Product already in order."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
      
   }
   
      public function product_quantity_change_order_post(){
       
        $order_id=$this->security->xss_clean($this->post("order_id"));
        $product_id=$this->security->xss_clean($this->post("product_id"));
        $qty=$this->security->xss_clean($this->post("qty"));
        $dont_add=0;
        $grand_total=0;
        $flag=TRUE;
        
        if(!empty($order_id)&& !empty($product_id) && !empty($qty)){
            
                 
        $conOrder['conditions'] = array(
                  'order_detail_id' => $order_id
                  );  
                  
        $order_details = $this->Crud_model->getRows('order_details',$conOrder,'row');
        
        $old_product_detail=json_decode($order_details->product_detail);
        
            
        $con2['conditions'] = array(
                  'product_id' => $product_id
                  );  
                  
        $product = $this->Crud_model->getRows('product',$con2,'row');
        
        if ($product->product_quantity <= $qty) {
                $flag=FALSE;
              
        } 
        if($flag){
               foreach($old_product_detail as $old_product_detail_row =>$old_product_detail_val){
            if($old_product_detail_val->product==$product_id){
                    
                     $old_quantity=$old_product_detail[$old_product_detail_row]->quantity;
                     
                     $old_product_detail[$old_product_detail_row]->quantity=$qty; 
                     
                     $old_product_detail[$old_product_detail_row]->totals=$old_product_detail_val->shipping_price+($old_product_detail_val->discounted_price*$qty); 
                     
                    //  $grand_total+=($old_product_detail_val->discounted_price*$qty)+$old_product_detail_val->shipping_price;      
           
            }
            
           
            $grand_total=$grand_total+$old_product_detail[$old_product_detail_row]->totals;
            
            
        }
       
         $order_data= array("product_detail" => json_encode($old_product_detail),"grand_total" => round($grand_total));
        
         if($this->Crud_model->update('order_details',$order_data,$conOrder)){
               
                $product_update = array('product_quantity' => $product->product_quantity + $old_quantity - $qty);
                $this->Crud_model->update('product',$product_update,$con2);   
                  
                  $this->response([
                          'status' => TRUE,
                          "message" => "successfully quantity changed."
                      ], REST_Controller::HTTP_OK);

                  }
          else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to change quantity."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
        
        }else{
                     $this->response([
                          'status' => FALSE,
                          "message" => "Quantity not available."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
     
       
            
        }else{
                     $this->response([
                          'status' => FALSE,
                          "message" => "Invaild record."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
      }
     
     
    public function verify_order_seller_post($order_detail_id=''){
          $order_detail_id=$this->security->xss_clean($this->post("order_id"));
          $patient_name=$this->security->xss_clean($this->post("patient_name"));
          $doctor_name=$this->security->xss_clean($this->post("doctor_name"));
        
        $conOrder['conditions'] = array(
                  'order_detail_id' => $order_detail_id
                  );  
        $order_details = $this->Crud_model->getRows('order_details',$conOrder,'row');
        
        if($order_details->is_verified==0){
               $order_data= array(
                  "is_verified" => 1, 
                  "patient_name" => $patient_name, 
                  "doctor_name" => $doctor_name, 
               );
         if($order_details->grand_total>499) {
                 
             if($this->Crud_model->update('order_details',$order_data,$conOrder)){
                    
                    $shipping_address=json_decode($order_details->shipping_address);
                    $username=$shipping_address->shipping_customer_fill_name;    
                    $phone=$shipping_address->shipping_phone;    
                    $order_amount=$order_details->grand_total;   
                    
                    $tempId='1207164345465734368';
                    
                    $messagephone = urlencode("Dear Customer, Your Order is successfully verified by us. Now you can login and proceed with your payment. Total Order Amount is  ".$order_amount.". Thank you. Team Medical Aadhar");
                         
                    $this->sendsms($phone,$messagephone,$tempId);
                        
                    
                      $this->response([
                              'status' => TRUE,
                              "message" => "successfully order_verified."
                          ], REST_Controller::HTTP_OK);
    
                      }
                      else{
                                  // Set the response and exit
                                $this->response([
                                      'status' => FALSE,
                                      "message" => "Error in Order verifying."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                  
                         } 
                 }
             else{
                  $this->response([
                                      'status' => FALSE,
                                      "message" => "Order Amount is less than 500."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
             }
     
        }
        
           else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Order is already Verified."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
             }   
        
        
        
      }
      
      public function delete_product_from_order_post(){
        $order_id=$this->security->xss_clean($this->post("order_id"));
        $product_id=$this->security->xss_clean($this->post("product_id"));  
        $grand_total=0;
        $new_product_array=array();
        $conOrder['conditions'] = array(
                  'order_detail_id' => $order_id
                  );  
                  
        $order_details = $this->Crud_model->getRows('order_details',$conOrder,'row');
        
        $old_product_detail=json_decode($order_details->product_detail);
       
        foreach($old_product_detail as $old_product_detail_row =>$old_product_detail_val){
          
            if($old_product_detail_val->product==$product_id){
                   
                    unset($old_product_detail[$old_product_detail_row]);
                     
           
            }
         
        }
        
         foreach($old_product_detail as $old_product_detail_row =>$old_product_detail_val){
          
             $new_product_array[]=$old_product_detail[$old_product_detail_row];
             
             $grand_total=$grand_total+$old_product_detail[$old_product_detail_row]->totals;
          
           }
        
        
      
    //   echo "<pre>";
    //   print_r($new_product_array);
    //   die();
       $order_data= array(
             
                    "product_detail" => json_encode($new_product_array), 
                    
                    "grand_total" => round($grand_total),
        );
        
       if($this->Crud_model->update('order_details',$order_data,$conOrder)){
               
                  $this->response([
                          'status' => TRUE,
                          "message" => "successfully Deleted Product from order."
                      ], REST_Controller::HTTP_OK);

                  }
          else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to delete product from order."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
        
      }
      
         
    public function fetch_todays_orders_get() {
      
        $option = array(
            'select' => 'order_details.*,customer.*',
            'table' => 'order_details',
            'order'=>array('order_detail_id'=> 'desc'),
            'join'=>array(array('customer'=>'customer.customer_id=order_details.customer_id')),
            'where' =>array('DATE(order_details.order_date)' => date('Y-m-d'))
            );
              if( $order_details=$this->Crud_model->commonGet($option)){
                  // Set the response and exit
                           foreach($order_details as $order_details_key =>$order_details_val){
                          
                             $order_details[$order_details_key]->delivery_details=json_decode($order_details_val->delivery_details);
                          
                             $order_details[$order_details_key]->order_date=date("d/M/Y g:i a", strtotime($order_details_val->order_date));
                                  if(!empty($order_details_val->delivery_person_id)){
                               $con['conditions'] = array(
                                  'delivary_boy_id' => $order_details_val->delivery_person_id
                               );
                                $userCount=$this->Crud_model->getRows('delivary_boy',$con,'row');
                            $order_details_val->delivery_full_name=$userCount->delivery_full_name;
                        }
                        else{
                            $order_details_val->delivery_full_name="";
                        }  
                           }
                           
                              
                 
                    $this->response([
                          'status' => TRUE,
                          "message" => "Sales load successfully.",
                          "data" => $order_details,
                  
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Sales does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
     
   }
   
   public function save_Paytm_Response_post(){
       
       $order_id = $this->security->xss_clean($this->post("sale_code"));
       $paytm_MID =  $this->security->xss_clean($this->post("paytm_MID"));  
       $paytm_ORDERID = $this->security->xss_clean($this->post("paytm_ORDERID"));
       $paytm_STATUS = $this->security->xss_clean($this->post("paytm_STATUS"));
       $paytm_CHECKSUMHASH = $this->security->xss_clean($this->post("paytm_CHECKSUMHASH"));
       $paytm_TXNAMOUNT = $this->security->xss_clean($this->post("paytm_TXNAMOUNT"));
       $paytm_TXNDATE = $this->security->xss_clean($this->post("paytm_TXNDATE"));
       $paytm_TXNID = $this->security->xss_clean($this->post("paytm_TXNID"));
       $paytm_RESPCODE = $this->security->xss_clean($this->post("paytm_RESPCODE"));
       $paytm_PAYMENTMODE = $this->security->xss_clean($this->post("paytm_PAYMENTMODE"));
       $paytm_BANKTXNID = $this->security->xss_clean($this->post("paytm_BANKTXNID"));
       $paytm_RESPMSG = $this->security->xss_clean($this->post("paytm_RESPMSG"));
       
       
       
       if(!empty($order_id)){
           
            $conOrder['conditions'] = array(
                  'order_code' => $order_id,
                );  
                  
        $order_details = $this->Crud_model->getRows('order_details',$conOrder,'row');
               $resp_array=array(
                                 "sale_code"           => $order_id,
                                 "paytm_MID"           => $paytm_MID,
                                 "paytm_ORDERID"       => $paytm_ORDERID,
                                 "paytm_STATUS"        => $paytm_STATUS,
                                 "paytm_CHECKSUMHASH"  => $paytm_CHECKSUMHASH,
                                 "paytm_TXNAMOUNT"     => $paytm_TXNAMOUNT,
                                 "paytm_TXNDATE"       => $paytm_TXNDATE,
                                 "paytm_TXNID"         => $paytm_TXNID,
                                 "paytm_RESPCODE"      => $paytm_RESPCODE,
                                 "paytm_PAYMENTMODE"   => $paytm_PAYMENTMODE,
                                 "paytm_BANKTXNID"     => $paytm_BANKTXNID,
                                 "paytm_RESPMSG"       => $paytm_RESPMSG
                            );
           
           
             $order_data= array(
                  "online_pay_details" => json_encode($resp_array), 
                  'payment_status'=>"PAID",
                  "payment_type"=>"ONLINE"
              );
              
                  if($this->Crud_model->update('order_details',$order_data,$conOrder)){
                     
                    $this->response([
                          'status' => TRUE,
                          "message" => "Payment Details saved successfully.",
                      
                  
                      ], REST_Controller::HTTP_OK);
                  }else{
                        $this->response([
                          'status' => FALSE,
                          "message" => "Payment Information not Updated.",
                      ], REST_Controller::HTTP_BAD_REQUEST);
                  }
       }else{
             $this->response([
                      'status' => FALSE,
                      "message" => "Order Information does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
       }
   }
   
      
     public function signature_submit_post(){
       
        $oid =  $this->security->xss_clean($this->post("oid"));  
        $rid = $this->security->xss_clean($this->post("rid"));
        $size = $this->security->xss_clean($this->post("size"));
     
        if(empty($oid) && empty($rid))
        {
          $this->response([
                'status' => FALSE,
                "message" => "Order ID or RID required",
            ], REST_Controller::HTTP_OK);
        }
    
        else
        {
        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        $target_path =$_SERVER['DOCUMENT_ROOT'].'/uploads/sign_images/';
        $url = 'uploads/sign_images/';
        
    

      //  $images_pre = array();
          
                    $newname = date('YmdHis',time()).mt_rand().'.jpg';
        	//		$images_pre[] = array('image_signature'=>$newname);
                    move_uploaded_file($_FILES['parts']['tmp_name'], $target_path .$newname);
          
            
            $conCustomer['conditions'] = array(
             'order_code' =>$oid,
            );
                                    
            $customer_details=$this->Crud_model->getRows('order_details',$conCustomer,'row');

        
       
            $order_data = array(
                           
                            "customer_sign" => $newname,
                           
                          );
                  
                  // Check if the user data is inserted
                       
                  if($this->Crud_model->update('order_details',$order_data,$conCustomer)){
           
                    
                    $this->response([
                          'status' => TRUE,
                          "message" => "successfully Signature uploaded."
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to upload signature."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
        }
   }
   public function cod_full_payment_post(){
    //if cart is empty exit    
  if($this->session->userdata('active_customer')){
        if(!empty($this->cart->contents())){
        
          $customer_id= $this->session->userdata('active_customer');
        
  
                  //customer address has been created in validation
                  $cart_detail = $this->cart->contents();
                  $flag_available =true;
                  //checking if qty available or not
                  foreach($cart_detail as $key => $value){
                    $requested_quantity = $value['qty'];
                    $job_id = $value['id'];
                    
                    //now from size_id and product_id fetch quantity and check if quantity is available
                  }
  
              if(!($flag_available)){
                //quantity is not available
                $this->response([
                  'status' => FALSE,
                  "message" => "Sorry product out of stock."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }else{
                //quantity is available
                $cart_detail = $this->cart->contents();
                $product_detail =array();
                $grand_total =0;
                $total_shipping =0;
                $i=0;
  
                
                foreach($cart_detail as $key => $value){

                  $grand_total += $value['subtotal'] +$value['shipping_charges'];
                  $requested_quantity = $value['qty'];
                  $job_id = $value['id'];
                  $total_shipping +=$value['shipping_charges'];
                  //fetch product row and add it into product detail
                  $con_product['conditions'] = array(
                    'job_id' => $job_id,
                    );
  
                  $temp = $this->Crud_model->getRows('jobs',$con_product,'row');
                  $tempFile  = $this->Crud_model->getRows('jobs',$con_product,'result');
                  $temp->{"img"} = $tempFile[0];
                  $temp->{"qty"} = $requested_quantity;
                  $temp->{"sub_total"} = $value['subtotal'];
                  $product_detail[$i] = $temp;
                  $i+=1;
                  
                  // print_r($temp);
                  
              }
  
                  // $product_detail["grand_total"] =$grand_total;
                  //end of product detail creation ,grand total and reduce quantity in database.     


                  //initialization of shipping details.
                $shipping_details = array();
                $customer_id= $this->session->userdata('active_customer');
                $id  = $customer_id->customer_id;

                $con_customer['conditions'] = array(
                    'customer_id' => $id,   
                    );

                $customer_row = $this->Crud_model->getRows('customer',$con_customer,'row'); 

                 $con_addre['conditions'] = array(
                    'customer_id' => $id,
                    'is_default'=>1    
                    );
  
                  $address = $this->Crud_model->getRows('address',$con_addre,'row');
                //initialization of order details.
                  $shipping_details = array(
                    "order_id" => "",
                    "order_date" => date("d-m-Y h:i"),
                    "pickup_location" => "Maharashtra",
                    "channel_id"=> "",
                    "comment"=> "Seller: Skyrabucks",
                    "billing_customer_name" => $customer_id->full_name,
                    "billing_address" => $address->address,
                    "billing_address_2" => "",
                    "billing_city" => $address->city_id,
                    "billing_pincode" => $address->pincode,
                    "billing_state" => $address->state_id,
                    "billing_email" => $customer_id->email,
                    "billing_phone" =>$customer_id->mobile,
                    "shipping_is_billing" => true,
                    "shipping_customer_name" =>$customer_id->full_name,
                    "shipping_address" => $address->address,
                    // "shipping_address_2"=> "",
                    "shipping_city" => $address->city_id,
                    "shipping_pincode"=> $address->pincode,
                    "shipping_state"=> $address->state_id,
                    "shipping_email"=> $customer_id->email,
                    "shipping_phone"=> $customer_id->mobile,
                    "order_items"=> $product_detail,
                    "payment_method"=> "FULL_COD",
                    "shipping_charges"=> 0 ,
                    "giftwrap_charges"=> 0,
                    "transaction_charges"=> 0,
                    "total_discount"=> 0,
                    "total"=> 0,
                    "length"=> 0,
                    "breadth"=> 0,
                    "height"=> 0,
                    "weight"=> 0 
  
                    );
  
                  $order_details_array = array(
                    "product_detail" => json_encode($product_detail),
                    "shipping_address" => json_encode($shipping_details),
                    "payment_status" => "UNPAID",
                    "grand_total" => $grand_total ,
                    "customer_id " => $id,
                    "is_delivered" => "N",
                    "customer_city_id"=>$address->city_id,
                    "order_code" => date("Ymdhis"),
               
                    // "shipping_charges" => $total_shipping ,
                  );
                  //inserting into order table

                        if($this->Crud_model->insert('order_details',$order_details_array)){
                                      //order sucessfull
                                $this->cart->destroy();
                                $this->session->set_userdata('active_customer',$customer_row);
                               $this->response([
                                       'status' => TRUE,
                                       "message" => "successfully order place."
                                        ], REST_Controller::HTTP_OK);
                            }else{
                                      //order failed
                                      $this->response([
                                                    'status' => FALSE,
                                                    "message" => "Failed to order place."],
                                                    REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                    }
      }
  
    }else{
      //cart is empty
      $this->response([
          'status' => FALSE,
          "message" => "Cart is empty."],
          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
  
    }
  }else{
    //customer is not logged in without validation 
    $this->response([
      'status' => FALSE,
      "message" => "Customer is not logged in."],
      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
  }
}

public function fetch_service_provider_get($main_service_id=0) {     
           
        // checking form submission have any error or not

         $main_service_id = $this->security->xss_clean($this->get("main_service_id"));

      
        if(!empty($main_service_id) ){

           
              $con['conditions'] = array(
                  'main_service_id' => $main_service_id
              );

              $userCount = $this->Crud_model->getRows('service_provider',$con,'result');

              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Service Provider load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Service Provider does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}