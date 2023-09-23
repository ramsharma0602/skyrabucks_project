<?php
require APPPATH . 'libraries/REST_Controller.php';
class Customer extends REST_Controller {
    public function __construct() {
       parent::__construct();
       $this->load->database();
    //   $this->load->library('cart');
      // $this->load->model('Email_Model');

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
            
        public function index_get(){
            
            if($this->input->get('customer_id')){
      
              $customer_id=$this->input->get('customer_id');
                
            }
            else{
                   $customer_id= $this->session->userdata('active_customer');
            }


        // checking form submittion have any error or not
            if(!empty($customer_id) && is_numeric($customer_id)){
                    $con['conditions'] = array(
                      'customer_id' => $customer_id
                    );
                     
              
                  if($customer_addresse=$this->Crud_model->getRows('customer',$con,'row')){
                      $temp=array($customer_addresse);
                        $this->response([
                          'status' => TRUE,
                          "message" => "Successfully updated",
                          "data"=>$temp,
                          "redirect_page"=>null
                          
                      ], REST_Controller::HTTP_OK);
                      
                  }else{
                             $this->response([
                     'status' => FALSE,
                     "message" => "Customer Not Found."],
                     REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
                
            }
            else{
                       $this->response([
                     'status' => FALSE,
                     "message" => "Invalid Data."],
                     REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
            
        }

        public function Register_post() {
            
            
            $name = $this->security->xss_clean($this->post("full_name"));
            $email = $this->security->xss_clean($this->post("email"));
            $mobile = $this->security->xss_clean($this->post("phone"));
            $password = $this->security->xss_clean($this->post("password"));    
            $pincode = $this->security->xss_clean($this->post("pincode"));
            $city = $this->security->xss_clean($this->post("city"));
            $state = $this->security->xss_clean($this->post("state"));
            $country = $this->security->xss_clean($this->post("country"));
            $address_lines = $this->security->xss_clean($this->post("address_lines"));    
            $land_mark = $this->security->xss_clean($this->post("land_mark")); 
            $referral_code = $this->security->xss_clean($this->post("referral_code"));  
                        
 
       
         
        if(!empty($name) && !empty($password) && !empty($city) && !empty($state) && !empty($country) && !empty($mobile) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10) && !empty($pincode) && !empty($address_lines) && !empty($land_mark)){
              
              $con['conditions'] = array(
                  'email' => $email,
              );
              $userCount=$this->Crud_model->getRows('customer',$con,'row');
              $con['conditions'] = array(
                  'mobile_number' => $mobile,
              );
               $userCountByPhone=$this->Crud_model->getRows('customer',$con,'result');
              if($userCount){
                  // Set the response and exit
                  $this->response([
                      'status' => FALSE,
                      "message" => "Email already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }
              else if($userCountByPhone){
                  $this->response([
                      'status' => FALSE,
                      "message" => "Mobile number already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }
              else{
               
                $my_referral=strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6));
                $flag=true;
                    while($flag) {
                        if(!$this->db->get_where('customer', array('my_referral =' => $my_referral))->row()){
                            $flag=false;
                        }
                    }

             if(!empty($referral_code)){
                  if($this->db->get_where('customer', array('my_referral =' => $referral_code))->row()){
                           $customer = array(
                            "full_name" => $name,
                            "email" => $email,
                            "mobile_number" => $mobile,
                            "credential" => password_hash($password, PASSWORD_DEFAULT),
                               "referral_code"=>$referral_code,
                            "OTP"=>mt_rand(100000, 999999),
                            "my_referral"=>$my_referral
                            
                          );
                    }
                    else{
                           $customer = array(
                                "full_name" => $name,
                                "email" => $email,
                                "mobile_number" => $mobile,
                                "credential" => password_hash($password, PASSWORD_DEFAULT),
                                "OTP"=>mt_rand(100000, 999999),
                                "my_referral"=>$my_referral
                                
                              );
                    }
            }
            else{
                $customer = array(
                    "full_name" => $name,
                    "email" => $email,
                    "mobile_number" => $mobile,
                    "credential" => password_hash($password, PASSWORD_DEFAULT),
                    "OTP"=>mt_rand(100000, 999999),
                    "my_referral"=>$my_referral
                    
                  );
            }
    

                 $username=$name;    
                 $phone=$mobile;    
                       $tempId='1207164345413991193';
                        $message = urlencode("Dear Customer, One Time Password is ".$customer['OTP'].", Do not share it with anyone - Team Medical Aadhar");
                
                  if($this->sendsms($phone,$message,$tempId)){
                      
                      // Set the response and exit

                            if ($customer_id=$this->Crud_model->insert('customer',$customer)) {
                                 $this->response([
                                       'status' => TRUE,
                                       "message" => "Customer registered successfully.",
                                       "customer_id"=>$customer_id,
                                    //   "data"=>"HI"
                                   ], REST_Controller::HTTP_OK);
                                   
                                    $this->session->set_userdata('customer_id_for_otp', $customer_id);
                                    $customer_addresse = array(
                                    "customer_id" => $customer_id,
                                    "pincode" => $pincode,
                                    "addresses" => $address_lines,
                                    "land_mark" => $land_mark,
                                    "city" => $city,
                                    "state" => $state,
                                    "is_default" => 'Y',
                                    "country" => $country
                                 
                                    ); 
                                    $this->Crud_model->insert('customer_addresses',$customer_addresse);
                                   
                            } else {
                                    $this->response([
                                      'status' => FALSE,
                                      "customer_id"=>NULL,
                                      "message" => "Failed to register registered."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "OTP NOT SENT"],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    public function resend_otp_post(){
      
          $mobile = $this->security->xss_clean($this->post("mobile"));
        
              $con['conditions'] = array(
                 'mobile' => $mobile,
              );
        
           $userCount=$this->Crud_model->getRows('customer',$con,'row');
            // print_r($userCount);
            // echo("sfzvzcv");
                  $customer = array(
                    "full_name" => $userCount->full_name,
                    "mobile" => $userCount->mobile,
                    "OTP"=>mt_rand(100000, 999999)
                    );
             
                    $phone=$userCount->mobile;    
                    $tempId='1207164345413991193';
                    $message = urlencode("Dear Customer, One Time Password is ".$customer['OTP'].", Do not share it with anyone - Team Medical Aadhar");
                
                  if($this->sendsms($phone,$message,$tempId)){
                         $customer = array(
                                        "OTP_created" =>  date("Y-m-d h:i:sa"),
                                        "OTP"=>$customer['OTP']
                                      );
                     if($customer_id=$this->Crud_model->update('customer',$customer,$con)){
                                $this->response([
                                  'status' => TRUE,
                                  "message" => "OTP Resend Successfully.."
                              ], REST_Controller::HTTP_OK);
                     }
                     else{
                            $this->response([
                             'status' => FALSE,
                             "message" => "Failed to resend otp."],
                             REST_Controller::HTTP_INTERNAL_SERVER_ERROR);    
                     }
                      
                  }
                  else {
                     $this->response([
                     'status' => FALSE,
                     "message" => "Failed to resend otp."],
                     REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
    }

      public function verify_otp_post() {
          $mobile = $this->security->xss_clean($this->post("mobile"));
          $otp = $this->security->xss_clean($this->post("OTP"));

        if(!empty($mobile) &&  is_numeric($mobile) &&  is_numeric($otp)  && $this->form_validation->exact_length($otp, 6)){

                
              $con['conditions'] = array(
                  'mobile' => $mobile,
                  'is_active'=>'N',
                  'OTP'=>$otp
              );
                
            $userCount=$this->Crud_model->getRows('customer',$con,'row');
                if($userCount){
                  // Set the response and exit
                 $customer = array(
                    "is_active" => 'Y',
                    "OTP_created" =>NULL,
                    "OTP"=>NULL
                  );

                  // Check if the user data is inserted
                  if($this->Crud_model->update($this->table,$customer,$con)){
                      // Set the response and exit
                    $this->session->unset_userdata('customer_id_for_otp');

                     $this->session->set_userdata('msg','Registration Successful, Please login.');
                        
                       $username=$userCount->full_name;    
                       $phone=$userCount->mobile;    
                       $tempId='1207164345425627072';
                      
                       $message = urlencode("Dear ".$username.", Thanks for signing up with Skyrabucks. Now you can order your medicines at your door steps. Team Skyrabucks");
                
                  $this->sendsms($phone,$message,$tempId);
                        
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
                      "message" => "OTP not match.",
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
             
             if($this->security->xss_clean($this->post("customer_id"))){
                  $customer_id = $this->security->xss_clean($this->post("customer_id"));
             }
             else{
                $customer_id = $this->security->xss_clean($this->session->userdata('active_customer'));
             }
            $name = $this->security->xss_clean($this->post("full_name"));
            $email = $this->security->xss_clean($this->post("email"));
            $mobile_number = $this->security->xss_clean($this->post("mobile_number"));
            

        if(!empty($customer_id) && !empty($name) && !empty($email) && !empty($mobile_number) ){
        // if(true){
                
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
                  'is_active'=>'Y'
              );
                
            $userCount=$this->Crud_model->getRows('customer',$con,'row');
                if($userCount){
                  // Set the response and exit
                      $customer = array(
                    "full_name" =>  $name,
                    "email" => $email,
                    "mobile_number"=>$mobile_number 
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->update($this->table,$customer,$con)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Successfully updated",
                          
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
             
             if($this->security->xss_clean($this->post("customer_id"))){
                  $customer_id = $this->security->xss_clean($this->post("customer_id"));
             }
             else{
                $customer_id = $this->security->xss_clean($this->session->userdata('active_customer'));
             }
          $old_password = $this->security->xss_clean($this->post("old_password"));
          $new_password = $this->security->xss_clean($this->post("new_password"));
          $confirm_password = $this->security->xss_clean($this->post("confirm_password"));

        if(!empty($customer_id) && is_numeric($customer_id) && !empty($old_password) && !empty($new_password) && !empty($confirm_password) && $new_password == $confirm_password ){

                
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
                  'is_active'=>"Y");
          
            $userCount=$this->Crud_model->getRows('customer',$con,'row');
         
                if($userCount){
                    //old password verification 
                    if (password_verify($old_password,$userCount->credential)) {
                        # code...
                    
                  // Set the response and exit
                            $customer = array(
                            "credential" => password_hash($new_password, PASSWORD_DEFAULT)
                          );
                          // Check if the user data is inserted
                          if($this->Crud_model->update($this->table,$customer,$con)){
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
                   "message" => "Invalid records."], 
                   REST_Controller::HTTP_BAD_REQUEST);
        }

      }

      public function  fetch_single_address_get($customer_id){        
                // checking form submission have any error or not
                if(!empty($customer_id) && is_numeric($customer_id)){
                        $con['conditions'] = array(
                          'customer_id' => $customer_id,
                        );
                         
                  
                      if($customer_address=$this->Crud_model->getRows('address',$con,'row')){
                          // Set the response and exit
                            $this->response([
                                  'status' => TRUE,
                                  "message" => "address load successfully.",
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
        
        public function update_address_post() {
            $customer_id = $this->security->xss_clean($this->post("customer_id"));
            // $address = $this->security->xss_clean($this->post("address"));
            $city_id = $this->security->xss_clean($this->post("city_id"));
            $pincode = $this->security->xss_clean($this->post("pincode"));
            $landmark = $this->security->xss_clean($this->post("landmark"));
            $mobile= $this->security->xss_clean($this->post("mobile"));
            $state_id = $this->security->xss_clean($this->post("state_id"));

        if(!empty($customer_id)&& is_numeric($customer_id) && !empty($city_id)&& is_numeric($city_id) && !empty($pincode) && is_numeric($pincode) && $this->form_validation->exact_length($pincode, 6) && !empty($landmark) &&!empty($mobile)&&!empty($state_id)&& is_numeric($state_id)){

              $con['conditions'] = array(
                  'customer_id' => $customer_id,
                     );
                
            $userCount=$this->Crud_model->getRows('address',$con,'row');
            
                if($userCount){
                  // Set the response and exit
                      $customer = array(
                        "customer_id" => $customer_id,
                        // "address" =>  $address,
                        "city_id"=>$city_id,
                        "pincode"=>$pincode,
                        "landmark"=>$landmark,
                        "state_id"=>$state_id,
                        "mobile" =>$mobile              
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
 public function insert_address_post(){
    $customer_id = $this->security->xss_clean($this->post("customer_id"));
    $address = $this->security->xss_clean($this->post("address"));
    $city_id = $this->security->xss_clean($this->post("city_id"));
    $pincode = $this->security->xss_clean($this->post("pincode"));
    $landmark = $this->security->xss_clean($this->post("landmark"));
    $mobile= $this->security->xss_clean($this->post("new_mobile"));
    $state_id = $this->security->xss_clean($this->post("state_id"));

    if(!empty($customer_id) && is_numeric($customer_id) && !empty($address) && !empty($city_id) && !empty($pincode) && is_numeric($pincode) && $this->form_validation->exact_length($pincode, 6) && !empty($landmark) && !empty($mobile) && !empty($state_id)){

                      
        $con['conditions'] = array(
            'customer_id' => $customer_id,
        );
                            
             if( $userCount = $this->Crud_model->getRows('address',$con,'row')){
                           $address = array(
                                "customer_id" => $customer_id,
                                "address" => $address,
                                "city_id" =>$city_id ,
                                "pincode" => $pincode,
                                "landmark"=>$landmark,
                                "new_mobile" =>$mobile,
                                "state_id"=>$state_id,
                                "is_default"=>"0"

                            );
             }
             else{
                        $address = array(
                            "customer_id" => $customer_id,
                            "address" => $address,
                            "city_id" =>$city_id,
                            "pincode" => $pincode,
                            "landmark"=>$landmark,
                            "new_mobile" =>$mobile,
                            "state_id"=>$state_id,
                            "is_default"=>"1"
                            );
             }
            if($customer_id=$this->Crud_model->insert('address',$address)){
                $this->response([
                    'status' => TRUE,
                    "message" => "New address added successfully."
                ], REST_Controller::HTTP_OK);

            }
            else{
                $this->response([
                    'status' => FALSE,
                    "message" => "Failed to add new address."],
                    REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
       
  }
  else{
    $this->response([
        'status' => FALSE,
        'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
  }
}
 
public function update_default_address_get(){
    $address_id = $this->security->xss_clean($this->get("address_id"));
    
    if(!empty($address_id)&& is_numeric($address_id)){
        $con['conditions'] = array(
            'address_id' => $address_id,
            'is_default' => '0'
        );
        if($address=$this->Crud_model->getRows('address',$con,'row')){
            $address['conditions']=array(
                'address_id' => $address_id,
                'is_default' => '0'
            );
            
            if($address_id=$this->Crud_model->update('address',$address,$con)){
                $address->is_default='1';
              }
              else{
                $address->is_default='0';
            }
            $this->response([
                'status' => TRUE,
                "message" => "Address load successfully.",
                "customer" => $address
            ], REST_Controller::HTTP_OK);
        // Check if the user data is inserted
           
    }
    else{
      $this->response([
            'status' => FALSE,
            "message" => "Failed to load address."],
            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
}
else{
  $this->response([
      'status' => FALSE,
      'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
}
}
public function fetch_new_address_get($customer_id){
    // $customer_id = $this->security->xss_clean($this->post("log_data"));
    if(empty($customer_id)){
        $customer_id = $this->security->xss_clean($this->get("customer_id"));
   }
   
    $con['conditions'] = array(
        'customer_id'=>$customer_id
    );
    if($customer=$this->Crud_model->getRows('address',$con,'result')){
        $customer_address=$this->Crud_model->getRows('address',$con,'result');
        $this->response([
            'status' => TRUE,
            "message" => "Address load successfully.",
            "customer" => $customer,
            "data"=>$customer_address
        ], REST_Controller::HTTP_OK);
    // Check if the user data is inserted
 
}

else{
  $this->response([
        'status' => FALSE,
        "message" => "Address does not exist.",
    ], REST_Controller::HTTP_BAD_REQUEST);
  
}
     


}

 public function login_customer_post(){
        $email = $this->security->xss_clean($this->post('Username'));
        $Password = $this->security->xss_clean($this->post('Password'));
        // Validate the post data
        if(!empty($email) && !empty($Password)){
            // Check if any user exists with the given credentials
            
                 
            if(is_numeric($email)){
                 $con['conditions'] = array(
                  'mobile_number' => $email,
                  'is_deleted'=>'N',
                'is_active'=>'Y'
              );
            }
            
            else{
                 $con['conditions'] = array(
                  'email' => $email,
                  'is_deleted'=>'N',
                  'is_active'=>'Y'
              );
            }
            
            // $con['conditions'] = array(
            //     'email' => $email,
            //     'is_deleted'=>'N',
            //     'is_active'=>'Y'
            // );
            
            if($userCount = $this->Crud_model->getRows('customer',$con,'row')){
              if (password_verify($Password,$userCount->credential)) {
                // Set the response and exit
                 $this->session->set_userdata('active_customer', $userCount->customer_id);
                    $order_Rx=json_decode($userCount->order_Rx);
                            $redit_page;
                            if(!empty(json_decode($userCount->cart_details))){
                                $redit_page="cart";    
                            }
                            else if(!empty($order_Rx)){
                                 $redit_page='prx_up';    
                            }
                            else{
                                $redit_page="home";     
                            }
                        
                        $con['conditions'] = array(
                        'customer_id' =>  $userCount->customer_id
                        );
                            $temp=array($userCount);
                            
                            $this->response([
                                    'status' => TRUE,
                                    'message' => 'User login successful.',
                                    'redirect_page'=>$redit_page,
                                    'data'=>$temp
                            ], REST_Controller::HTTP_OK);
              }
              else{
                $this->response([
                      'status' => FALSE,
                      'message' => 'Wrong password.'
                  ], REST_Controller::HTTP_BAD_REQUEST);
            }
            
                  
            }else{
                $this->response([
                      'status' => FALSE,
                      'message' => 'Wrong email or password.'
                  ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    else{
        $this->response([
                  'status' => FALSE,
                  'message' => 'User not found.'
              ], REST_Controller::HTTP_BAD_REQUEST);
    }
 }


   public function forget_pass_request_post() {

        $email = $this->security->xss_clean($this->post("Username"));
          
        // checking form submittion have any error or not
        if(!empty($email)){
            
            if(is_numeric($email)){
                 $con['conditions'] = array(
                  'mobile_number' => $email,
                  'is_active' => 'Y'
              );
            }
            
            else{
                 $con['conditions'] = array(
                  'email' => $email,
                  'is_active' => 'Y'
              );
            }
                
         //   }
              
             
              $userCount = $this->Crud_model->getRows($this->table,$con,'row');
             
              if($userCount){
                  // Set the response and exit
                  $customer = array(
                    "OTP_created" =>  date("Y-m-d h:i:sa"),
                    "OTP"=>mt_rand(100000, 999999)
                  );
                  // Check if the user data is inserted
                  
                // $subject="Password Reset OTP";
                       $username=$userCount->full_name;    
                       $phone=$userCount->mobile_number;    
                       $tempId='1207164345413991193';
                  
                        $message = urlencode("Dear Customer, One Time Password is ".$customer['OTP'].", Do not share it with anyone - Team Medical Aadhar");

                // print_r($userCount);
                // die();
                //   $this->Email_Model->use_mails($email ,$subject,$message);
                  
                  if($this->sendsms($phone,$message,$tempId)){
                      
                          if($customer_id=$this->Crud_model->update($this->table,$customer,$con)){
                              // Set the response and exit
                            $this->session->set_userdata('customer_id_for_otp', $userCount->customer_id);
                               $this->response([
                                   'status' => TRUE,
                                   "message" => 'OTP Sent Successfully.',
                                   "data"=>$userCount->customer_id
                               ], REST_Controller::HTTP_OK);
        
                            
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to change Password."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
                          
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to send otp."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }

              }
             
              else{
                  $this->response([
                      'status' => FALSE,
                      "message" => "Mobile No. not found.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    
    
    
    
     public function all_customer_referrals_get() {
     
         $referral_code = $this->security->xss_clean($this->get("referral_code"));
          
        // checking form submittion have any error or not
        if(!empty($referral_code)){
                
        $option = array('select' => 'customer.full_name,customer.created_on', 'table' => 'customer','where' =>array('customer.referral_code' => $referral_code));
               if( $product_data=$this->Crud_model->commonGet($option)){
                              $this->response([
                                  'status' => TRUE,
                                  "message" => "load Successfully",
                                  'data'=>$product_data
                              ], REST_Controller::HTTP_OK);
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to update Password."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
            
        }else{
         
            $this->response([
                          'status' => FALSE,
                          "message" => "Invalid referral."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            
        }
                     
         
     }
    
    
     public function group_referral_get() {
     
                    $option = array(
                                    'select' => 'customer.referral_code,count(*) as no_reffer',
                                    'table' => 'customer',
                                    'where' =>array('customer.referral_code!= ' => ''),
                                    'group'=>'customer.referral_code'
                                
                            );
                            
                                 if( $product_data=$this->Crud_model->commonGet($option)){
                                 
                                        $data=array();
                                     foreach($product_data as $product_data_key => $product_data_value)
                                     {
                                        
                                         if($by_refferal=$this->db->get_where('customer', array('my_referral =' => $product_data_value->referral_code))->row()){
                                                       $product_data[$product_data_key]->full_name=$by_refferal->full_name;
                                         }
                                         
                                         
                                     }
                              $this->response([
                                  'status' => TRUE,
                                  "message" => "load Successfully",
                                  'data'=>$product_data
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
          
            $userCount=$this->Crud_model->getRows('customer',$con,'row');
         
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
                          if($this->Crud_model->update($this->table,$customer,$con)){
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
              'message' =>  "Incomplete Data."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
     public function update_password_forget_post() {

        $customer_id = $this->security->xss_clean($this->post("phone_number"));
        $new_password = $this->security->xss_clean($this->post("new_password"));
        $confirm_password = $this->security->xss_clean($this->post("confirm_password"));

        if(!empty($customer_id) && is_numeric($customer_id) && !empty($new_password) && !empty($confirm_password)){

            if ($new_password == $confirm_password) {
              # code...
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
                  'is_active'=>"Y");
          
            $userCount=$this->Crud_model->getRows('customer',$con,'row');
         
                if($userCount){
                   
                  // Set the response and exit
                            $customer = array(
                            "credential" => password_hash($new_password, PASSWORD_DEFAULT),
                            "OTP_created" =>NULL,
                            "OTP"=>NULL
                          );


                          // Check if the user data is inserted
                          if($this->Crud_model->update($this->table,$customer,$con)){
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

    public function verify_otp_for_forget_pass_post() {

       // $customer_id = $this->security->xss_clean($this->post("customer_id"));
        $otp = $this->security->xss_clean($this->post("OTP"));
        
        $email = $this->security->xss_clean($this->post("Username"));
          
        // checking form submittion have any error or not
     
        if(!empty($email)){
            
            $con['conditions'] = array(
                  'customer_id' => $email,
                  'is_active' => 'Y'
              );
          
            $userCount=$this->Crud_model->getRows('customer',$con,'row');
         
            if($userCount){
                    
                     $conOTP['conditions'] = array(
                          'OTP' => $otp,
                          'customer_id' => $userCount->customer_id,
                          'is_active'=>"Y");
                          
                 $userCountOTP=$this->Crud_model->getRows('customer',$conOTP,'row');
                 
                     if($userCountOTP){
                            $this->response([
                                      'status' => TRUE,
                                      "message" => "OTP Verified Successfully."
                                  ], REST_Controller::HTTP_OK);
                     }
                     
                     else{
                           $this->response([
                          'status' => FALSE,
                          "message" => "OTP Mismatch.",
                      ], REST_Controller::HTTP_BAD_REQUEST);
                     }
                 
                }

              else{
                 $this->response([
                      'status' => FALSE,
                      'data'=>$email,
                      "message" => "Customer Not Found.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }
    
        }
        
        else{
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
                    if ( $customer=$this->Crud_model->getRows($this->table,$con,'row')) {
                    # code...
                              if ($customer->profile_images) {
                              # code...
                              unlink("./uploads/users_profile/".$customer->profile_images);
                              }
                              $customer = array(
                              "is_active" => 'Y',
                               "profile_images" =>$newName
                              );
                                  if($this->Crud_model->update($this->table,$customer,$con)){
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



public function  all_customer_address_get(){

      
     if($this->input->get('customer_id')){
      
      $customer_id=$this->input->get('customer_id');
        
    }
    else{
           $customer_id= $this->session->userdata('active_customer');
    }


        // checking form submittion have any error or not
        if(!empty($customer_id) && is_numeric($customer_id)){
                $con['conditions'] = array(
                  'customer_id' => $customer_id
                );
                 
          
              if($customer_addresse=$this->Crud_model->getRows('customer_addresses',$con,'result')){
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
                        "data" => ""
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
}





public function  default_customer_address_get(){
  
   $session_address_id = $this->security->xss_clean($this->get("session_address_id"));
   $customer_id = $this->security->xss_clean($this->get("customer_id"));

        // checking form submittion have any error or not
        if(!empty($session_address_id) && is_numeric($session_address_id)){
               
                $con['conditions'] = array(
                  'c_addresses_id' => $session_address_id,
                  'customer_id' => $customer_id,
                );
                 
        }
        else{
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
                  'is_default' => 'Y'
                );
        }
              if($customer_addresse[]=$this->Crud_model->getRows('customer_addresses',$con,'row')){
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
        



public function  customer_address_get(){
   $customer_id = $this->security->xss_clean($this->get("customer_id"));

        // checking form submittion have any error or not
        if(!empty($customer_id) && is_numeric($customer_id)){
                $con['conditions'] = array(
                  'customer_id' => $customer_id,
                  'is_default'=>'Y'
                );
                 
          
              if($customer_addresse=$this->Crud_model->getRows('customer_addresses',$con,'row')){
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




  public function add_customer_address_post() {
  

            $customer_id= $this->session->userdata('active_customer');
            $address = $this->security->xss_clean($this->post("addresses"));
            $landmark = $this->security->xss_clean($this->post("land_mark"));    
            $pincode = $this->security->xss_clean($this->post("pincode")); 
            $city = $this->security->xss_clean($this->post("city")); 
            $state = $this->security->xss_clean($this->post("state")); 
            $country = $this->security->xss_clean($this->post("country")); 
            
            
        // checking form submittion have any error or not
        if(!empty($customer_id) &&!empty($address) && !empty($landmark) && !empty($pincode)){
              
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
              );
             
             
              if( $userCount = $this->Crud_model->getRows($this->table,$con,'row')){
                  // Set the response and exit
                  
                   if( $userCount = $this->Crud_model->getRows('customer_addresses',$con,'row')){
                                 $customer = array(
                                    "addresses" => $address,
                                    "customer_id" => $customer_id,
                                    "pincode" => $pincode,
                                    "city" =>$city ,
                                    "state"=>$state,
                                    "country"=>$country,
                                    "land_mark"=>$landmark
                                  );
                   }
                   else{
                              $customer = array(
                                    "addresses" => $address,
                                    "customer_id" => $customer_id,
                                    "pincode" => $pincode,
                                    "city" =>$city ,
                                    "state"=>$state,
                                    "country"=>$country,
                                    "land_mark"=>$landmark,
                                    "is_default"=>"Y"
                                  );
                   }
                  // Check if the user data is inserted
                  if($customer_id=$this->Crud_model->insert('customer_addresses',$customer)){
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
                      "message" => "Customer not available.",
                  ], REST_Controller::HTTP_BAD_REQUEST);

              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function add_customer_address_mob_post() {
        $customer_id=$this->security->xss_clean($this->post("user_id"));
        $house_no = $this->security->xss_clean($this->post("house_no"));
        $landmark = $this->security->xss_clean($this->post("land_mark"));    
        $pincode = $this->security->xss_clean($this->post("pincode")); 
        $city = $this->security->xss_clean($this->post("city")); 
        $addresses = $this->security->xss_clean($this->post("addresses")); 
        $lat = $this->security->xss_clean($this->post("lat")); 
        $lag = $this->security->xss_clean($this->post("lag")); 
        $type = $this->security->xss_clean($this->post("type")); 
        $state = $this->security->xss_clean($this->post("state")); 
        $country = $this->security->xss_clean($this->post("country")); 
        
      
        
        
        // if($landmark==0){
        //     $landmark=null;
        // }
        
        //   if($house_no==0){
        //     $house_no=null;
        // }
        
        // checking form submittion have any error or not
    //     if(!empty($customer_id)){
    //                 $this->response([
    //           'status' => FALSE,
    //           'message' =>  "Customer ID not found."], REST_Controller::HTTP_BAD_REQUEST);
    
    // }
    // else if(!empty($house_no)){
    //          $this->response([
    //           'status' => FALSE,
    //           'message' =>  "Incomplete House No."], REST_Controller::HTTP_BAD_REQUEST);
    // }
    // else if(!empty($landmark)){
    //          $this->response([
    //           'status' => FALSE,
    //           'message' =>  "Incomplete land mark."], REST_Controller::HTTP_BAD_REQUEST);
    // }
    // else if( !empty($pincode)){
    //          $this->response([
    //           'status' => FALSE,
    //           'message' =>  "Incomplete Pincode."], REST_Controller::HTTP_BAD_REQUEST);
    // }
    //   else if( !empty($addresses)){
    //          $this->response([
    //           'status' => FALSE,
    //           'message' =>  "Incomplete address."], REST_Controller::HTTP_BAD_REQUEST);
    // }
    //     else{
    
              
              
              $con['conditions'] = array(
                  'customer_id' => $customer_id,
              );
             
             
              if( $userCount = $this->Crud_model->getRows($this->table,$con,'row')){
                  // Set the response and exit
                  
                  
                
                   if( $userCount = $this->Crud_model->getRows('customer_addresses',$con,'row')){
                                 $customer = array(
                                    "addresses"=>$addresses,
                                    "customer_id" => $customer_id,
                                    "pincode" => $pincode,
                                    "city" =>$city ,
                                    "house_no"=>$house_no,
                                    "lat"=>$lat,
                                    "lag"=>$lag,
                                    "type"=>$type,
                                    "land_mark"=>$landmark,
                                    "state"=>$state,
                                    "country"=>$country
                                    
                                  );
                   }
                   else{
                              $customer = array(
                                    "addresses"=>$addresses,
                                        "customer_id" => $customer_id,
                                        "pincode" => $pincode,
                                        "city" =>$city ,
                                        "house_no"=>$house_no,
                                        "lat"=>$lat,
                                        "lag"=>$lag,
                                        "type"=>$type,
                                        "land_mark"=>$landmark,
                                        "is_default"=>"Y",
                                        "state"=>$state,
                                        "country"=>$country
                                  );
                   }
                  // Check if the user data is inserted
                  if($customer_id=$this->Crud_model->insert('customer_addresses',$customer)){
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
                      "message" => "Customer not available.",
                  ], REST_Controller::HTTP_BAD_REQUEST);

              }
              
        // }
    
    }


        

  public function update_customer_address_post() {
            $c_address_id = $this->security->xss_clean($this->post("c_address_id"));
            $address = $this->security->xss_clean($this->post("addresses"));
            $landmark = $this->security->xss_clean($this->post("land_mark"));    
            $pincode = $this->security->xss_clean($this->post("pincode")); 
            $city = $this->security->xss_clean($this->post("city")); 
            $state = $this->security->xss_clean($this->post("state")); 
            $country = $this->security->xss_clean($this->post("country"));   
        // checking form submittion have any error or not
        if(!empty($c_address_id) && !empty($address) && !empty($landmark) && !empty($pincode) &&  !empty($city) && !empty($state) && !empty($country)){
              
    
                  // Set the response and exit
                 $customer = array(
                            "addresses" => $address,
     
                    "pincode" => $pincode,
                    "city" =>$city ,
                    "state"=>$state,
                    "country"=>$country,
                    "land_mark"=>$landmark
                  );
                     $con['conditions'] = array(
                  'c_addresses_id' => $c_address_id
                );
                   
                  // Check if the user data is inserted
                  if($customer_id=$this->Crud_model->update('customer_addresses',$customer,$con)){
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
    
    public function update_customer_address_mob_post() {
  

            $user_id= $this->security->xss_clean($this->post("user_id"));
            $house_no = $this->security->xss_clean($this->post("house_no"));
            $land_mark = $this->security->xss_clean($this->post("land_mark"));    
            $pincode = $this->security->xss_clean($this->post("pincode")); 
            $city = $this->security->xss_clean($this->post("city")); 
           
            $addresses = $this->security->xss_clean($this->post("addresses")); 
            $lat = $this->security->xss_clean($this->post("lat")); 
            $lag = $this->security->xss_clean($this->post("lag")); 
            $type = $this->security->xss_clean($this->post("type")); 
            $state = $this->security->xss_clean($this->post("state")); 
            $pincode1 = $this->security->xss_clean($this->post("pincode1"));   
           
            $country = $this->security->xss_clean($this->post("country"));   
           
            $c_address_id = $this->security->xss_clean($this->post("aid"));   
            
        // checking form submittion have any error or not
        if(!empty($c_address_id) && !empty($user_id)){
              
    
                  // Set the response and exit
                 $customer = array(
                    "house_no" => $house_no,
                    "land_mark" => $land_mark,
                    "pincode" => $pincode1,
                    "city" => $city,
                    "addresses" => $addresses,
                    "lat" => $lat,
                    "lag" => $lag,
                    "type" => $type,
                    "state" => $state,
                    "country" => $country,
              
                  );
                    
                     $con['conditions'] = array(
                         'c_addresses_id' => $c_address_id,
                         'customer_id' => $user_id,
                  
                );
                   
                  // Check if the user data is inserted
                  if($customer_id=$this->Crud_model->update('customer_addresses',$customer,$con)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Address Updated successfully."
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
    
    
    public function remove_address_delete($address_id=''){
     
        if(!empty($address_id) && is_numeric($address_id)){
              $con['conditions'] =array(
                  'address_id' => $address_id
                );
                $userCount = $this->Crud_model->getRows('address',$con,'row');
                
          if($userCount){
            // if($customer_address=$this->Crud_model->delete('address',$con)){
                if($customer_address=$this->Crud_model->delete('address',$con)){
                    
                    $this->response([
                          'status' => TRUE,
                          "message" => "address deleted successfully.",
                          "data" => $customer_address
                      ], REST_Controller::HTTP_OK);
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "address does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
            }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }



public function  set_default_address_get(){
   $address_id = $this->security->xss_clean($this->get("caddress_id"));

        // checking form submittion have any error or not
        if(!empty($address_id) && is_numeric($address_id)){
                $con['conditions'] = array(
                  'c_addresses_id' => $address_id
                );
                 
          
              if($customer_addresse=$this->Crud_model->getRows('customer_addresses',$con,'row')){

                   $default_n = array('is_default' => 'N');
                   
                      $default_y = array('is_default' => 'Y');
                       
                        $conn['conditions'] = array(
                  'customer_id' => $this->session->userdata('active_customer')
                );
                 
                  $cony['conditions'] = array(
                  'c_addresses_id' => $address_id
                );
                 
                  $this->Crud_model->update('customer_addresses',$default_n,$conn);
                  
                  
                    if($this->Crud_model->update('customer_addresses',$default_y,$cony)){
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
                  'is_default' => 'Y',
                  'customer_id'=>$customer_id
              );
  
              if($customer=$this->Crud_model->getRows($this->table,$con,'row')){
                 
                 $customer_addresse=$this->Crud_model->getRows('customer_addresses',$conca,'row');

                  $customer->cart_details=json_decode($customer->cart_details);
                  
                  $customer->order_Rx=json_decode($customer->order_Rx);
                  
                  $customer->quick_rx_order=json_decode($customer->quick_rx_order);
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


public function fetch_customer_get() {

    $con['conditions'] = array(
        // 'customer_id' => $user_id,
        // 'is_active' =>  'Y' ,        
      );

    $userCount = $this->Crud_model->getRows('customer',$con,'result');
  
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




public function change_is_active_post($user_id=''){

        // $user_id = $this->security->xss_clean($this->get("user_id"));

        if (!empty($user_id)) {
            
                $con['conditions'] = array(
                'customer_id' => $user_id,
                );

                $userCount = $this->Crud_model->getRows('customer',$con,'row');
                if ($userCount->is_active =='Y') {

                $customer_update = array(
                "is_active" => 'Y',     
                );
                }
                else{
                $customer_update = array(
                "is_active" => 'N',      
                );
                }

        if($this->Crud_model->update('customer',$customer_update,$con)){
        // Set the response and exit
            $this->response([
            'status' => TRUE,
            "message" => "Status Updated Successfully"
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