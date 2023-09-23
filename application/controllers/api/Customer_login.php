<?php  

require APPPATH . 'libraries/REST_Controller.php';

     

class Customer_login extends REST_Controller {


    public function __construct() {

       parent::__construct();

       $this->load->database();

       $this->load->library('cart');
       $this->load->library('session');
    //    $this->load->model('Email_Model');

    }


      public function sendsms($phone,$message,$tempId){
            
                $url = 'http://103.16.101.52/sendsms/bulksms?username=cart-svstrm&password=svstrm&type=0&dlr=1&destination='.$phone.'&source=SVSTRM&message='.$message.'&entityid=1201161191887735505&tempid='.$tempId;

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                if($response){

                    return $response;
                    
                }else{
                    return false;
                }
                curl_close($ch);
          
            }
       /**customer registration**/

        public function Register_post() {
            $full_name = $this->security->xss_clean($this->post("full_name"));
            $email = $this->security->xss_clean($this->post("email"));
            $mobile=$this->security->xss_clean($this->post("mobile"));
            $credential = $this->security->xss_clean($this->post("credential"));
            $address=$this->security->xss_clean($this->post("address"));
            $city_id=$this->security->xss_clean($this->post("city_id"));
            $landmark=$this->security->xss_clean($this->post("landmark"));
            $pincode=$this->security->xss_clean($this->post("pincode"));
            $state_id=$this->security->xss_clean($this->post("state_id"));
           
            if(!empty($full_name)  && !empty($mobile) && !empty($email)  &&!empty($credential) &&!empty($address) &&!empty($city_id) &&!empty($pincode) &&!empty($state_id) &&  $this->form_validation->valid_email($email)){
                    
                 $con1['conditions'] = array(
                    'mobile' => $mobile,
                  );
                $userCount = $this->Crud_model->getRows('customer',$con1,'row');
                if($userCount){

                    $this->response([
                           'status' => FALSE,
                           "message" => "Mobile already exist.",
                       ], REST_Controller::HTTP_OK);
               
                }
                else{
                    $customer = array(
                      "full_name" => $full_name,
                      "mobile"=>$mobile,
                      "email" => $email,
                      "is_active" => 'Y',
                      "credential" => password_hash($credential, PASSWORD_DEFAULT),);
                      // "credential" => $credential );
          
                    
                        if ($this->Crud_model->insert('customer',$customer,'row'))
                         {
                            $id = $this->db->insert_id();
                          
                            if($id)
                            {
                                $address_cust = array(
                                "customer_id" => $id,
                                "address" => $address,
                                "city_id"=>$city_id,
                                "state_id" => $state_id,
                                "landmark"=>$landmark,
                                "pincode" => $pincode,
                                "is_default"=>1,
                              );
                              if ($this->Crud_model->insert('address',$address_cust)){

                                         $this->response([
                                        'status' => TRUE,
                                        "message" => "Successfully Added Customer"
                                    ], REST_Controller::HTTP_OK);
                                  }else{
                                      $this->response([
                                      'status' => FALSE,
                                      "message" => "Failed to add Customer."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                    }
                                
                        }
                        else {
                        $this->response([
                            'status' => FALSE,
                            "message" => "Invalid Customer Id."],
                            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                        }
                }
                else {
                        $this->response([
                            'status' => FALSE,
                            "message" => "Failed to add Customer in Customer table."],
                            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                        }
            //   $userCountByPhone = $this->Crud_model->getRows('customer',$con1,'row');

                  // Set the response and exit
                    //    $this->session->set_userdata('customer_id_for_otp', $userCount->customer_id);
            }
          }
            else{
            $this->response([
                'status' => FALSE,
                'message' =>  "Incomplete information."],
                REST_Controller::HTTP_BAD_REQUEST);
            }
        }



    public function resend_otp_post(){
        

        // $customer_id = $this->security->xss_clean($this->post("customer_id"));
        $mobile = $this->security->xss_clean($this->post("mobile"));

        $con['conditions'] = array(
                  'mobile'=>$mobile,
              );
        
        $userCount = $this->Crud_model->getRows('customer',$con,'row');
        // print_r($userCount);
        $customer_id = $userCount->customer_id;
      if($userCount){
        // print_r($userCount);
                  $customer = array(
                    "OTP"=>mt_rand(100000, 999999),
                    "OTP_created"=>NULL,
                  );
                  $params['conditions'] = array(
                    'customer_id' => $customer_id,
                );
                    $phone=$userCount->mobile;
                    $tempId='1207163514335625277';
                    $message = urlencode("Dear Customer, One Time Password is ".$customer['OTP'].", Do not share it with anyone - Stree Vastram");
                    
                    if($this->sendsms($phone,$message,$tempId)){
                      if($this->Crud_model->update('customer',$customer,$params)){
                        // Set the response and exit
                          $this->session->set_userdata('active_customer', $customer_id);
                          $this->response([
                              'status' => TRUE,
                              "message" => "OTP Sent to mobile Number. Please verify OTP."
                          ], REST_Controller::HTTP_OK);
                      }
                      else{
                          // Set the response and exit
                          $this->response([
                              'status' => FALSE,
                              "message" => "Fail to update customer otp."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      }

                    }
               else{
                            // Set the response and exit
                            $this->response([
                                'status' => FALSE,
                                "message" => "Fail to send OTP."],
                                REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                        }
      }
         else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "User Not Found."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }

    }

    public function verify_otp_post() {
          $mobile = $this->security->xss_clean($this->post("mobile"));
          $otp = $this->security->xss_clean($this->post("OTP"));

        if(!empty($mobile) &&  is_numeric($mobile) &&  is_numeric($otp)  && $this->form_validation->exact_length($otp, 6)){

                
              $con['conditions'] = array(
                  'mobile' => $mobile,
                  'OTP'=>$otp
              );
                
            $userCount = $this->Crud_model->getRows('customer',$con,'row');
            $customer_id = $userCount->customer_id;
                if($userCount){
                  // Set the response and exit
                  $customer = array(
                    "is_active" => 'Y',
                    "OTP_created" =>NULL,
                    "OTP"=>NULL
                  );
                  $params = array(
                    'customer_id'=>$customer_id,
                  );

                  // Check if the user data is inserted
                  if($this->Crud_model->update('customer',$customer,$params)){
                      // Set the response and exit
                    $this->session->unset_userdata('active_customer');                       
                       $full_name=$userCount->full_name;    
                       $phone=$userCount->mobile;    
                       $tempId='1207163514366617146';
                       $message = urlencode("Hi ".$full_name.", Thanks for signing up with Stree Vastram !");
             
                       $this->sendsms($phone,$message,$tempId);

                     // $this->session->set_userdata('msg','Registration Successsful, Please login.');

                      $this->response([
                          'status' => TRUE,
                          "message" => "Successfully verified"
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to verify."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
                 
              }
              else{
                 $this->response([
                      'status' => FALSE,
                      "message" => "Invalid records.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }


        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Invaild information."], REST_Controller::HTTP_BAD_REQUEST);
        }

      }



         public function update_info_post() {
          $customer_id = $this->security->xss_clean($this->post("customer_id"));
         $name = $this->security->xss_clean($this->post("name"));
            $email = $this->security->xss_clean($this->post("email"));
            $mobile = $this->security->xss_clean($this->post("phone"));

        if(!empty($customer_id) && is_numeric($customer_id) && !empty($name) && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)){

                
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
                  'is_active'=>'Y'
              );
                
            $userCount = $this->Customer_model->getRows($con);
                if($userCount){
                  // Set the response and exit
                      $customer = array(
                    "full_name" =>  $name,
                    "email" => $email,
                    "mobile"=>$mobile 
                  );
                  // Check if the user data is inserted
                  if($this->Customer_model->update_customer($customer,$customer_id)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Successfully updated"
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to update information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
                 
              }
              else{
                 $this->response([
                      'status' => FALSE,
                      "message" => "Invalid records.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }


        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Invaild information."], REST_Controller::HTTP_BAD_REQUEST);
        }

      }

public function update_password_post() {
    $customer_id = $this->security->xss_clean($this->post("customer_id"));
    // $old_password = $this->security->xss_clean($this->post("old_password"));
    $newpassword = $this->security->xss_clean($this->post("newpassword"));
    $confirmPassword = $this->security->xss_clean($this->post("confirmPassword"));

    if(!empty($customer_id) && is_numeric($customer_id)  && !empty($newpassword) && !empty($confirmPassword) && $newpassword == $confirmPassword ){
                
      $con['conditions'] = array(
          'customer_id' => $customer_id,
          'is_active'=>"Y");
          
        $userCount = $this->Crud_model->getRows('customer',$con,'row');
         
            if($userCount){
                //old password verification 
                 if (password_verify($old_password,$userCount->credential)) {
                 
  
                    // Set the response and exit
                          $customer = array(
                          "credential" => password_hash($newpassword, PASSWORD_DEFAULT)
                        );
                      // Check if the user data is inserted
                          if($this->Crud_model->update('customer',$customer,$con)){
                              // Set the response and exit
                            $this->response([
                                'status' => TRUE,
                                "message" => "Password Successfully updated"
                            ], REST_Controller::HTTP_OK);
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to update Password."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
                 }
                 else{
                      $this->response([
                          'status' => FALSE,
                          "message" => "Invalid Old Password"],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                 }
              }

              else{
                 $this->response([
                      'status' => FALSE,
                      "message" => "Invalid records.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }


        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "password doesnt match."], REST_Controller::HTTP_BAD_REQUEST);
        

      //  if(password($newpassword == $confirmPassword)){

      //                     $customer = array(
      //                     "credential" => password_hash($newpassword, PASSWORD_DEFAULT)
      //                   );

      //                 // Check if the user data is inserted
      //                     if($this->Crud_model->update('customer',$customer,$con)){
      //                         // Set the response and exit
      //                       $this->response([
      //                           'status' => TRUE,
      //                           "message" => "Password Successfully updated"
      //                       ], REST_Controller::HTTP_OK);
      //                     }
      //                     else{
      //                         // Set the response and exit
      //                         $this->response([
      //                             'status' => FALSE,
      //                             "message" => "Failed to update Password."],
      //                             REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
      //                     }
      //                     else{
      //                            $this->response([
      //                                 'status' => FALSE,
      //                                 "message" => "Invalid records.",
      //                             ], REST_Controller::HTTP_BAD_REQUEST);
      //                         }
      //                  }


        }

      }


//start of update_address_post

public function update_address_post() {
  $customer_id = $this->security->xss_clean($this->post("customer_id"));
  // $address_id = $this->security->xss_clean($this->post("address_id"));
  $address = $this->security->xss_clean($this->post("address"));
  $city = $this->security->xss_clean($this->post("city"));
  // $country = $this->security->xss_clean($this->post("country"));
  $post_code = $this->security->xss_clean($this->post("post_code"));
  $mobile= $this->security->xss_clean($this->post("mobile"));
  $state = $this->security->xss_clean($this->post("state"));

if(!empty($customer_id) && is_numeric($customer_id) && !empty($address)  && !empty($city)  && !empty($post_code)  && $this->form_validation->exact_length($post_code, 6)&& is_numeric($post_code) &&!empty($mobile)&& !empty($state) && !empty($state))
{

      
    $con['conditions'] = array(
        'customer_id' => $customer_id,
           );
      
  $userCount=$this->Crud_model->getRows('address',$con,'row');
      if($userCount){
        // Set the response and exit
            $customer = array(
              "customer_id" => $customer_id,
              // "address_id"=> $address_id,
              "mobile" =>$mobile,
              "address" =>  $address,
              "city"=>$city,
              "state"=>$state,
              "post_code"=>$post_code,
              // "state" =>  $state,
          // "full_name" =>  $full_name,
          // "email" =>  $email,
        );
        $con1['conditions'] = array(
          'customer_id' => $customer_id,
        );
        // Check if the user data is inserted
        if($this->Crud_model->update('address',$customer,$con1)){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                "message" => "Successfully updated"
            ], REST_Controller::HTTP_OK);
        }
        else{
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                "message" => "Failed to update information."],
                REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
       
    }
    else{
       $this->response([
            'status' => FALSE,
            "message" => "Invalid records.",
        ], REST_Controller::HTTP_BAD_REQUEST);
    }


}
else{
$this->response([
    'status' => FALSE,
    'message' =>  "Invalid information."], REST_Controller::HTTP_BAD_REQUEST);
}

}


      public function customer_login1_post(){
      
        $email = $this->security->xss_clean($this->post("email"));
         $credential= $this->security->xss_clean($this->post("credential"));
  
         if( $email ==""){
  
  
           $this->response([
                        'status' => FALSE,
                        "message" => "username not found.",
                    ], REST_Controller::HTTP_BAD_REQUEST);
  
         }
          else if($credential==""){
                $this->response([
                        'status' => FALSE,
                        "message" => "Please enter password",
                    ], REST_Controller::HTTP_BAD_REQUEST);
          }
          else{
  
  
              $cons['conditions'] = array(
                    'email' => $email
                );
    
              $result=$this->Crud_model->getRows('customer',$cons,'row');
              // print_r($result);
              // exit();
              if($result){
                  $hash = $result->credential;
  
                  if (password_verify($credential, $hash)) {
                       // print_r(unserialize($result->cart_details));
                      // exit();
                    // $result->cart_details = unserialize($result->cart_details);
                    // $this->session->set_userdata('active_customer',$result );
                    if(!empty($result->cart_details)){
                      // print_r($result->cart_details);
                      $result->cart_details = unserialize($result->cart_details);
                      // $cart= $result->cart_details;
                      // $this->cart->insert($cart);
                    }
                     $this->session->set_userdata('active_customer',$result );
                     
                     if(!empty($result->cart_details)){
                      $cart= $result->cart_details;
                      $this->cart->insert($cart);
                    }
                    // if (!empty($result->cart_details)) {
                    //       $cartDetails = unserialize($result->cart_details);
                    //       $result->cart_details = $cartDetails;

                    //       $this->session->set_userdata('active_customer', $result);

                    //       if (!empty($cartDetails)) {
                    //           $this->cart->insert($cartDetails);
                    //       }
                    //   }

                     $this->response([
                            'status' => TRUE,
                            "message" => "Successfully login"
                        ], REST_Controller::HTTP_OK);
                        // $this->session->set_userdata('active_customer',$result );
                      }
                      else{
                         $this->response([
                        'status' => FALSE,
                        "message" => "Please check password.",
                    ], REST_Controller::HTTP_BAD_REQUEST);
                      }
  
                }else{
  
                    $this->response([
                        'status' => FALSE,
                        "message" => "User not found",
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
  
                 
          }
  
       }
//customer logout  
public function customer_logout_get(){

  if($this->session->userdata('active_customer')){
    //if customer is logged in
        if(  $this->session->unset_userdata('active_customer') ){
          //session destroyed
          $this->response([
            'status' => TRUE,
            "message" => "Successfully logged out"
        ], REST_Controller::HTTP_OK);
      }
        else{
          //session is not destroyed
          $this->response([
            'status' => FALSE,
            "message" => "Session not cleared",
        ], REST_Controller::HTTP_BAD_REQUEST);

        }
      }else{
    //not logged in
    $this->response([
      'status' => FALSE,
      "message" => "Please log in",
  ], REST_Controller::HTTP_BAD_REQUEST);
  }

}
//end customer logout

   public function forget_pass_request_post() {

            $email = $this->security->xss_clean($this->post("Username"));
          
        // checking form submittion have any error or not
        if(!empty($email) && $this->form_validation->valid_email($email)){
              
              $con['conditions'] = array(
                  'email' => $email,
                  'is_active' => 'Y'
              );
              $userCount = $this->Customer_model->getRows($con);
             
              if($userCount){
                  // Set the response and exit
                  $customer = array(
                    "OTP_created" =>  date("Y-m-d h:i:sa"),
                    "OTP"=>mt_rand(100000, 999999)
                  );
                  // Check if the user data is inserted
                  
                $subject="Password Reset OTP";
                $message="Hi , ".$userCount->full_name.", OTP to reset your password is :   ".$customer['OTP']." Please contact the administration team if you have any further queries. Best wishes. Thank You !";
                 
                  if($this->Email_Model->use_mails($email ,$subject,$message)){
                  
                //   if($this->Sms_model->smssend($mobile,$message)){
                          if($customer_id=$this->Customer_model->update_customer($customer,$userCount->customer_id)){
                              // Set the response and exit
                            $this->session->set_userdata('customer_id_for_otp', $userCount->customer_id);
        
        
                               $this->response([
                                   'status' => TRUE,
                                   "message" => 'Customer otp successfully.'
                               ], REST_Controller::HTTP_OK);
        
                            
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to register customer."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
                          
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to register customer."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }

              }
             
              else{
                  $this->response([
                      'status' => FALSE,
                      "message" => "Email not found.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


       public function change_password_with_otp_post() {

            $customer_id = $this->security->xss_clean($this->post("customer_id"));
            $otp = $this->security->xss_clean($this->post("OTP"));
            $new_password = $this->security->xss_clean($this->post("new_password"));
            $confirm_password = $this->security->xss_clean($this->post("confirm_password"));

              if(!empty($customer_id) && is_numeric($customer_id) && !empty($new_password) && !empty($confirm_password) && $new_password==$confirm_password){

            if ($new_password == $confirm_password) {
              # code...
              $con['conditions'] = array(
                  'OTP' => $otp,
                  'customer_id' => $customer_id,
                  'is_active'=>"Y");
          
            $userCount = $this->Customer_model->getRows($con);
         
                if($userCount){
                    //old password verification 
                    // if (password_verify($old_password,$userCount->credential)) {
                        # code...
                    
                  // Set the response and exit
                            $customer = array(
                            "credential" => password_hash($new_password, PASSWORD_DEFAULT),
                            "OTP_created" =>NULL,
                            "OTP"=>NULL
                          );


                          // Check if the user data is inserted
                          if($this->Customer_model->update_customer($customer,$customer_id)){
                              // Set the response and exit
                            $this->session->unset_userdata('customer_id_for_otp');
                            
                              $this->response([
                                  'status' => TRUE,
                                  "message" => "Password Successfully updated"
                              ], REST_Controller::HTTP_OK);
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to update Password."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
                 // }
                 // else{
                 //      $this->response([
                 //          'status' => FALSE,
                 //          "message" => "Invalid Old Password"],
                 //          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                 // }


              }

              else{
                 $this->response([
                      'status' => FALSE,
                      "message" => "Invalid records.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }

            }
            else{
                $this->response([
                    'status' => FALSE,
                    'message' =>  "Password doesn't match."], REST_Controller::HTTP_BAD_REQUEST);
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplate Data."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

  public function change_password_with_otp1_post() {

    // $customer_id = $this->security->xss_clean($this->post("customer_id"));
    $mobile_no = $this->security->xss_clean($this->post("mobile_no"));
    $otp = $this->security->xss_clean($this->post("OTP_status"));
    $newpassword = $this->security->xss_clean($this->post("newpassword"));
    $confirmPassword = $this->security->xss_clean($this->post("confirmPassword"));
    
        if(!empty($mobile_no) && is_numeric($mobile_no) && !empty($newpassword) && !empty($confirmPassword)){
            if ($newpassword == $confirmPassword) {
              if($otp=="TRUE"){
                $con['conditions'] = array(
                    'mobile_no' => $mobile_no,
                    'is_active'=>"Y");
                $userCount = $this->Crud_model->getRows('customer',$con,'row');
                if($userCount){
                  // Set the response and exit
                            $customer = array(
                            "credential" => password_hash($newpassword, PASSWORD_DEFAULT),
                          );
                            $condition['conditions'] = array(
                              'mobile_no' => $mobile_no,
                            );
                          // Check if the user data is inserted
                          if($this->Crud_model->update('customer',$customer,$condition)){
                              // Set the response and exit
                            $this->session->unset_userdata('active_customer');
                              $this->response([
                                  'status' => TRUE,
                                  "message" => "Password Successfully updated"
                              ], REST_Controller::HTTP_OK);
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to update Password."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
                }

                else{
                  $this->response([
                        'status' => FALSE,
                        "message" => "Invalid records.",
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
              }else{
                $this->response([
                  'status' => FALSE,
                  "message" => "Please verify OTP.",
              ], REST_Controller::HTTP_BAD_REQUEST);
              }

            }else{
                $this->response([
                    'status' => FALSE,
                    'message' =>  "Password doesn't match please confirm !."], REST_Controller::HTTP_BAD_REQUEST);
              }
        }else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplate Data."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }











  public function upload_customer_image_post($value='')
  {

  $customer_id=$this->input->post('customer_id');
  $data = $this->input->post('image');
          if (!empty($data) && !empty($customer_id)) {

          $image_array_1 = explode(";", $data);
          $image_array_2 = explode(",", $image_array_1[1]);
          $data = base64_decode($image_array_2[1]);
          $imageName = time() . '.png';
          file_put_contents("./uploads/users_profile/".$imageName, $data);
          
          
          $dir = './uploads/users_profile/';
          $newName = time().'.webp';
    // Create and save
          $img = imagecreatefrompng($dir . $imageName);
          imagepalettetotruecolor($img);
          imagealphablending($img, true);
          imagesavealpha($img, true);
          imagewebp($img, $dir . $newName, 50);
          imagedestroy($img);
    
          unlink("./uploads/users_profile/".$imageName);




          $con['conditions'] = array(
          'customer_id' => $customer_id
          );
                    if ( $customer=$this->Customer_model->getRows($con)) {
                    # code...
                              if ($customer->profile_images) {
                              # code...
                              unlink("./uploads/users_profile/".$customer->profile_images);
                              }
                              $customer = array(
                              "is_active" => 'Y',
                               "profile_images" =>$newName
                              );
                                  if($this->Customer_model->update_customer($customer,$customer_id)){
                                  $this->response([
                                  'status' => TRUE,
                                  "message" => "Successfully uploaded Image",
                                  'image_name'=>$newName
                                  ], REST_Controller::HTTP_OK);

                                  }
                                  else{
                                  $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to uploaded  Image."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                                  }

                            } 
                    else{

                    $this->response([
                    'status' => FALSE,
                    "message" => "Failed to uploaded  Image."],
                    REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                    }
          } 
          else{

          $this->response([
          'status' => FALSE,
          "message" => "Customer not fount."],
          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

          }
  }



public function  all_customer_address_get($customer_id=''){
  

        // checking form submittion have any error or not
        if(!empty($customer_id) && is_numeric($customer_id)){
                $con['conditions'] = array(
                  'customer_id' => $customer_id
                );
                 
          
              if($customer_addresse=$this->Customer_model->fetch_customer_addresse($con)){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "address load successfully.",
                          "data" => $customer_addresse
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "address does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
}



//fetch address by customer_id
public function  fetch_single_address_get($customer_id){
     
     // $customer_id = $this->security->xss_clean($this->get("customer_id"));
    // print_r($customer_id);
    $option = array(
                 'select' => 'address.address_id,address.customer_id,address.address,address.city_id,address.pincode,address.new_mobile,customer.full_name,customer.mobile',
                 'table' => 'address',
                 'join'=>array(array('customer'=>'customer.customer_id = address.customer_id')),
                 'where' =>array('address.customer_id' => $customer_id)
                 );

    $result=$this->Crud_model->commonGet($option);
    // print_r($result);
    if($result=$this->Crud_model->commonGet($option)){

            $this->response([
                        'status' => TRUE,
                        "message" => "Successfully fetch customer address ",
                        "data"=> $result
                    ], REST_Controller::HTTP_OK);
  
                    // $this->session->set_userdata($result->customer_id);
                  }
  
            else{
  
                $this->response([
                    'status' => FALSE,
                    "message" => "address not found",
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
          
          }


//   if(!empty($customer_id) && is_numeric($customer_id)){
//           $con['conditions'] = array(
//             'customer_id' => $customer_id
//           );
            
    
//         if($customer_address=$this->Crud_model->getRows('address',$con,'row')){
//             // Set the response and exit
//               $this->response([
//                     'status' => TRUE,
//                     "message" => "address load successfully.",
//                     "data" => $customer_address
//                 ], REST_Controller::HTTP_OK);
//             // Check if the user data is inserted
          
//         }
        
//         else{
//           $this->response([
//                 'status' => FALSE,
//                 "message" => "address does not exist.",
//             ], REST_Controller::HTTP_BAD_REQUEST);
          
//         }
//   }
//   else{
//     $this->response([
//         'status' => FALSE,
//         'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
//   }
// }

//end of fetch address by customer id


  public function add_customer_address_post() {
  
            $customer_id= $this->session->userdata('active_customer');
            $full_name = $this->security->xss_clean($this->post("firstname"));
            $last_name = $this->security->xss_clean($this->post("lastname"));
            $email = $this->security->xss_clean($this->post("email"));
            $contact_number = $this->security->xss_clean($this->post("contact_no"));
            $address = $this->security->xss_clean($this->post("address"));
            $apartment = $this->security->xss_clean($this->post("address_2"));
            $city = $this->security->xss_clean($this->post("city"));
            $post_code = $this->security->xss_clean($this->post("postcode"));
            $country = $this->security->xss_clean($this->post("country_id"));
            $state =  $this->security->xss_clean($this->post("zone_id"));
            // $password =  $this->security->xss_clean($this->post("password"));
            exit();
        // checking form submittion have any error or not
        if(!empty($customer_id) &&!empty($address) && !empty($landmark) && !empty($pincode)){
              
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
              );
             
              if( $userCount = $this->Customer_model->getRows($con)){
                  // Set the response and exit
                 $customer = array(
                    "addresses" => $address,
                    "customer_id" => $customer_id,
                    "pincode" => $pincode,
                    "city" =>1 ,
                    "state"=>1,
                    "country"=>1,
                    "land_mark"=>$landmark
                  );
                   
                  // Check if the user data is inserted
                  if($customer_id=$this->Customer_model->insert_customer_address($customer)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Address added succesfully."
                      ], REST_Controller::HTTP_OK);

  

                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to register student."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
              }
           
              else{
                  $this->response([
                      'status' => FALSE,
                      "message" => "Email already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);

              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


  public function update_customer_address_post() {
  

            $c_address_id = $this->security->xss_clean($this->post("c_address_id"));
            $address = $this->security->xss_clean($this->post("address"));
            $landmark = $this->security->xss_clean($this->post("landmark"));    
            $pincode = $this->security->xss_clean($this->post("pincode"));    
        // checking form submittion have any error or not
        if(!empty($c_address_id) && !empty($address) && !empty($landmark) && !empty($pincode)){
              
    
                  // Set the response and exit
                 $customer = array(
                    "addresses" => $address,
                    "pincode" => $pincode,
                    "city" =>1 ,
                    "state"=>1,
                    "country"=>1,
                    "land_mark"=>$landmark
                  );
                   
                  // Check if the user data is inserted
                  if($customer_id=$this->Customer_model->update_customer_address($customer,$c_address_id)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Customer registered successfully."
                      ], REST_Controller::HTTP_OK);

  

                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to address UPDATE."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
             
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function delete_customer_address_delete($address_id='')
    {
      # code...
        // checking form submittion have any error or not
        if(!empty($address_id) && is_numeric($address_id)){
            
              if($customer_address=$this->Customer_model->delete_customer_address($address_id)){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "address deleted successfully.",
                          "data" => $customer_address
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "address does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

// Start customer get
public function customer_load_get() {
      //$owner_id = $this->security->xss_clean($this->get("id"));
      $Customer = $this->session->userdata('active_customer');
      $Customer_id = $Customer->customer_id;
  // checking form submittion have any error or not
  if(!empty($Customer_id) ){

     
        $con['conditions'] = array(
            'customer_id' => $Customer_id,
        );

        $userCount = $this->Crud_model->getRows('customer',$con,'row');
      
        if($userCount){
            // Set the response and exit
              $this->response([
                    'status' => TRUE,
                    "message" => "Customer load successfully.",
                    "data" => $userCount
                ], REST_Controller::HTTP_OK);
            // Check if the user data is inserted
         
        }
        
        else{
          $this->response([
                'status' => FALSE,
                "message" => "Customer does not exist.",
            ], REST_Controller::HTTP_BAD_REQUEST);
          
        }
  }
  else{
    $this->response([
        'status' => FALSE,
        'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
  }
}
//End  customer get

// start customer update
public function update_customer_post(){
  $customer_id = $this->security->xss_clean($this->post("customer_id"));
  $full_name = $this->security->xss_clean($this->post("full_name"));
  // $last_name = $this->security->xss_clean($this->post("last_name"));
  $email = $this->security->xss_clean($this->post("email"));
  $mobile = $this->security->xss_clean($this->post("mobile"));
  $address=$this->security->xss_clean($this->post("address"));
  $city=$this->security->xss_clean($this->post("city"));
  $country=$this->security->xss_clean($this->post("country"));
  $post_code=$this->security->xss_clean($this->post("post_code"));
  $state=$this->security->xss_clean($this->post("state"));


if(!empty($customer_id) && is_numeric($customer_id) && !empty($full_name) && !empty($address) && !empty($city)&& !empty($country)&& !empty($post_code)   && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)){

      
    $con['conditions'] = array(
        'customer_id' => $customer_id   
        );
        
        $userCount = $this->Crud_model->getRows('customer',$con,'row');
      if($userCount){
        // Set the response and exit
            $customer = array(
          "full_name" =>  $full_name,
          "last_name" =>  $last_name,
          "email" => $customer_email,
          "mobile"=>$mobile 
        );
        // Check if the user data is inserted
        if($this->Crud_model->update('customer',$customer,$con)){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                "message" => "Successfully updated"
            ], REST_Controller::HTTP_OK);
        }
        else{
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                "message" => "Failed to update information."],
                REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
       
    }
    else{
       $this->response([
            'status' => FALSE,
            "message" => "Invalid records.",
        ], REST_Controller::HTTP_BAD_REQUEST);
    }


}
else{
$this->response([
    'status' => FALSE,
    'message' =>  "Invaild information."], REST_Controller::HTTP_BAD_REQUEST);
}

}

// End customer update


public function  set_default_address_get(){
   $address_id = $this->security->xss_clean($this->get("caddress_id"));

        // checking form submittion have any error or not
        if(!empty($address_id) && is_numeric($address_id)){
                $con['conditions'] = array(
                  'c_addresses_id' => $address_id
                );
                 
          
              if($customer_addresse=$this->Customer_model->fetch_single_address($con)){

                   $default_n = array('is_default' => 'N');
                      $default_y = array('is_default' => 'Y');
                       
                  $this->Customer_model->address_udefault_N($default_n,$this->session->userdata('active_customer'));
                    if($this->Customer_model->update_customer_address($default_y,$address_id)){
                  // Set the response and exit
                            $this->response([
                                  'status' => TRUE,
                                  "message" => "address load successfully."
                              ], REST_Controller::HTTP_OK);
                          // Check if the user data is inserted
                       
                      }
                      
                      else{
                        $this->response([
                              'status' => FALSE,
                              "message" => "address does not change.",
                          ], REST_Controller::HTTP_BAD_REQUEST);
                        
                      }
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "address does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
}

// public function  all_customers_get(){
                
//                   $con['conditions'] = array(
//                   'is_deleted' => 'N',
//               );
             
  
//               if($customer_address=$this->Crud_model->getRows('customer',$con,'result')){
//                   // Set the response and exit
//                     $this->response([
//                           'status' => TRUE,
//                           "message" => "Customer load successfully.",
//                           "data" => $customer_address
//                       ], REST_Controller::HTTP_OK);
//                   // Check if the user data is inserted
               
//               }
              
//               else{
//                 $this->response([
//                       'status' => FALSE,
//                       "message" => "Customers does not exist.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
                
//               }
  
// }


public function  all_customers_get(){
                
            //       $con['conditions'] = array(
            //       'is_deleted' => 'N',
            //   );
             
  
            //   if($customer_addresse=$this->Crud_model->getRows($this->table,$con,'result')){
                  
                      $option = array('select' => 'customer.*', 'table' => 'customer','where' =>array('customer.is_deleted' => 'N'),
                      'order'=>array('customer.customer_id'=>'desc'));
               if( $customers_data=$this->Crud_model->commonGet($option)){
                   
                   
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Customer load successfully.",
                          "data" => $customers_data
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Customers does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
  
}

public function  customer_fetch_details_get($customer_id=''){
                if(empty($customer_id)){
                     $customer_id = $this->security->xss_clean($this->get("customer_id"));
                }
                  $con['conditions'] = array(
                  'is_deleted' => 'N',
                  'customer_id'=>$customer_id
              );
                 $conca['conditions'] = array(
                  'customer_id'=>$customer_id
              );
  
              if($customer=$this->Crud_model->getRows('customer',$con,'row')){
                  $customer_addresse=$this->Crud_model->getRows('customer',$conca,'row');                 
                  $customer->cart_details=json_decode($customer->cart_details);                 
                  // $customer->order_Rx=json_decode($customer->order_Rx);                  
                  // $customer->quick_rx_order=json_decode($customer->quick_rx_order);
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Customer load successfully.",
                          "customer" => $customer,
                          "customer_address"=>$customer_addresse
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Customers does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
  
}


 public function change_is_active_post($customer_id=''){

    if (!empty($customer_id)) {
      # code...

     $con['conditions'] = array(
          'customer_id' => $customer_id,
     );

      $userCount = $this->Crud_model->getRows($this->table,$con,'row');
      if ($userCount->is_active=='Y') {
        # code...

        $product_update = array(
           "is_active" => 'N',
                   
         );
      }
      else{
        $product_update = array(
           "is_active" => 'Y',
                   
         );
      }

        if($this->Crud_model->update($this->table,$product_update,$con)){
           // Set the response and exit
             $this->response([
             'status' => TRUE,
             "message" => "Updated Successfully"
               ], REST_Controller::HTTP_OK);
        }
        else{
                      // Set the response and exit
           $this->response([
           'status' => FALSE,
           "message" => "Failed to update Status."],
            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
       }

    } 
   }
 

}



