<?php
require APPPATH . 'libraries/REST_Controller.php';
class Owner extends REST_Controller {
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
     }



     public function login_post(){
        $email = $this->security->xss_clean($this->post("user_name"));
        $password= $this->security->xss_clean($this->post("user_password"));
 
        if( $email ==""){
 
 
          $this->response([
                       'status' => FALSE,
                       "message" => "username not found.",
                   ], REST_Controller::HTTP_BAD_REQUEST);
 
        }
         else if($password==""){
               $this->response([
                       'status' => FALSE,
                       "message" => "Please enter password",
                   ], REST_Controller::HTTP_BAD_REQUEST);
         }
         else{
 
 
 
 
            $option = array(
                 'select' => 'users.user_id,users.user_type_id,users.email,users.credential,user_type.user_type_id,user_type.controller_name,user_type.session_name',
                 'table' => 'users',
                 'join'=>array(array('user_type'=>'users.user_type_id=user_type.user_type_id')),
                 'where' =>array('users.email' => $email),
                 'single'=>true
                 );
 
               if($result=$this->Crud_model->commonGet($option)){
 
 
 
                 if (password_verify($password, $result->credential)) {
                    $this->response([
                           'status' => TRUE,
                           "message" => "Successfully login",
                           "data"=> $result->controller_name
                       ], REST_Controller::HTTP_OK);
 
                       $this->session->set_userdata($result->session_name,$result->user_id);
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
                       "message" => "user not found",
                   ], REST_Controller::HTTP_BAD_REQUEST);
               }
 
                
         }
 
      }
 
 
// super admin update

public function update_super_admin_post(){
            $user_id= $this->session->userdata('active_super_admin');
            $name = $this->security->xss_clean($this->post("name"));
            $email = $this->security->xss_clean($this->post("email"));
            $mobile = $this->security->xss_clean($this->post("mobile"));

            

            if(!empty($user_id) && is_numeric($user_id) && !empty($name) && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)) {

                
              $con['conditions'] = array(
                  'super_admin_id' => $user_id,
                );
                
            $userCount = $this->Crud_model->getRows('super_admin',$con,'row');
            
                if($userCount){
                        $owner = array(
                   "super_admin_id"=>$user_id,
                    "name" =>  $name,
                    "email" => $email,
                    "mobile"=> $mobile 
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->update('super_admin',$owner,$con)){
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

public function update_admin_post(){

        $user_id= $this->session->userdata('active_admin');
        $name = $this->security->xss_clean($this->post("admin_name"));
        $email = $this->security->xss_clean($this->post("email"));
        $mobile = $this->security->xss_clean($this->post("mobile"));


    if(!empty($user_id) && is_numeric($user_id) && !empty($name) && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)) {

            
          $con['conditions'] = array(
              'admin_id' => $user_id,
            );
            
        $userCount = $this->Crud_model->getRows('admin',$con,'row');
        
            if($userCount){
              // Set the response and exit
                    $owner = array(
               "admin_id"=>$user_id,
                "name" =>  $name,
                "email" => $email,
                "mobile"=> $mobile 
              );
              // Check if the user data is inserted
              if($this->Crud_model->update('admin',$owner,$con)){
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
  
 
      public function update_owner_password_post() {

         $customer_id = 2;
        //  $user_id = $this->security->xss_clean($this->post("user_id"));
         $old_password = $this->security->xss_clean($this->post("old_password"));
         $new_password = $this->security->xss_clean($this->post("new_password"));
         $confirm_password = $this->security->xss_clean($this->post("confirm_password"));
           

           
        if(!empty($customer_id) && is_numeric($customer_id) && !empty($old_password) && !empty($new_password) && !empty($confirm_password)){
          if($new_password == $confirm_password){    
              $con['conditions'] = array(
                  'customer_id' => $customer_id
              );
                
            $userCount = $this->Crud_model->getRows('customer',$con,'row');
                if($userCount){
                    //old password verification
                    if (password_verify($old_password,$userCount->credential)) {
                        # code...
                  // Set the response and exit
                            $customer = array(
                            "credential" => password_hash($new_password, PASSWORD_DEFAULT)
                          );
                          // Check if the user data is inserted
                          if($this->Crud_model->update('customer',$customer)){
                              // Set the response and exit
                              $this->response([
                                  'status' => TRUE,
                                  "message" => "Password Successfully updated."
                              ], REST_Controller::HTTP_OK);
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => TRUE,
                                  "flag" => 0,
                                  "message" => "Failed to update Password."],
                                  REST_Controller::HTTP_OK);
                          }
                 }
                 else{
                      $this->response([
                          'status' => TRUE,
                          "flag" => 0,
                          "message" => "Invalid Old Password."],
                          REST_Controller::HTTP_OK);
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
              'status' => TRUE,
               "flag" => 0,
              'message' =>  "New and Confirm Password does not match"], REST_Controller::HTTP_OK);
            }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Invalid records!!"], REST_Controller::HTTP_BAD_REQUEST);
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

    if (!empty($user_id)) {
      # code...

     $con['conditions'] = array(
          'customer_id' => $user_id,
     );

      $userCount = $this->Crud_model->getRows('customer',$con,'row');
      if ($userCount->is_active=='Y') {
        # code...

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
//fetch super admin
public function super_admin_get($user_id=1) {
            
          //$owner_id = $this->security->xss_clean($this->get("id"));

         $super_admin= $this->session->userdata('active_super_admin');
           // $user_id = $super_admin->user_id;
        // checking form submittion have any error or not
        if(!empty($user_id) ){

           
              $con['conditions'] = array(
                  'super_admin_id' => $user_id,
              );

              $userCount = $this->Crud_model->getRows('super_admin',$con,'row');
            
              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Owner load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Owner does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function admin_get($user_id=1) {
            
        //$owner_id = $this->security->xss_clean($this->get("id"));
    
       $admin= $this->session->userdata('active_admin');
         // $user_id = $super_admin->user_id;
      // checking form submittion have any error or not
      if(!empty($admin) ){
    
         
            $con['conditions'] = array(
                'admin_id' => $user_id,
            );
    
            $userCount = $this->Crud_model->getRows('admin',$con,'row');
          
            if($userCount){
                // Set the response and exit
                  $this->response([
                        'status' => TRUE,
                        "message" => "Owner load successfully.",
                        "data" => $userCount
                    ], REST_Controller::HTTP_OK);
                // Check if the user data is inserted
             
            }
            
            else{
              $this->response([
                    'status' => FALSE,
                    "message" => "Owner does not exist.",
                ], REST_Controller::HTTP_BAD_REQUEST);
              
            }
      }
      else{
        $this->response([
            'status' => FALSE,
            'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
    
    
    //fetch sub admin 

    public function sub_admin_get($user_id=1) {
            
        //$owner_id = $this->security->xss_clean($this->get("id"));

       $sub_admin= $this->session->userdata('active_sub_admin');
         // $user_id = $super_admin->user_id;
      // checking form submittion have any error or not
      if(!empty($sub_admin) ){

         
            $con['conditions'] = array(
                'Sub_admin_id' => $user_id,
            );

            $userCount = $this->Crud_model->getRows('sub_admin',$con,'row');
          
            if($userCount){
                // Set the response and exit
                  $this->response([
                        'status' => TRUE,
                        "message" => "Owner load successfully.",
                        "data" => $userCount
                    ], REST_Controller::HTTP_OK);
                // Check if the user data is inserted
             
            }
            
            else{
              $this->response([
                    'status' => FALSE,
                    "message" => "Owner does not exist.",
                ], REST_Controller::HTTP_BAD_REQUEST);
              
            }
      }
      else{
        $this->response([
            'status' => FALSE,
            'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
      }
  }
  
  
// super admin update

public function update_sub_admin_post(){
  $user_id= $this->session->userdata('active_sub_admin');
  $name = $this->security->xss_clean($this->post("name"));
  $email = $this->security->xss_clean($this->post("email"));
  $mobile = $this->security->xss_clean($this->post("mobile"));


if(!empty($user_id) && is_numeric($user_id) && !empty($name) && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)) {

        
      $con['conditions'] = array(
          'sub_admin_id' => $user_id,
        );
        
    $userCount = $this->Crud_model->getRows('sub_admin',$con,'row');
    
        if($userCount){
          // Set the response and exit
                $owner = array(
           "sub_admin_id"=>$user_id,
            "name" =>  $name,
            "email" => $email,
            "mobile"=> $mobile 
          );
          // Check if the user data is inserted
          if($this->Crud_model->update('sub_admin',$owner,$con)){
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
public function update_support_team_post(){

  $user_id= $this->session->userdata('active_support_team');
  $name = $this->security->xss_clean($this->post("admin_name"));
  $email = $this->security->xss_clean($this->post("email"));
  $mobile = $this->security->xss_clean($this->post("mobile"));


if(!empty($user_id) && is_numeric($user_id) && !empty($name) && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)) {

      
    $con['conditions'] = array(
        'support_team_id' => $user_id,
      );
      
  $userCount = $this->Crud_model->getRows('support_team',$con,'row');
  
      if($userCount){
        // Set the response and exit
              $owner = array(
         "support_team_id"=>$user_id,
          "name" =>  $name,
          "email" => $email,
          "mobile"=> $mobile 
        );
        // Check if the user data is inserted
        if($this->Crud_model->update('support_team',$owner,$con)){
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
public function update_service_provider_post(){
  $user_id= $this->session->userdata('active_service_provider');
  $name = $this->security->xss_clean($this->post("name"));
  $email = $this->security->xss_clean($this->post("email"));
  $mobile = $this->security->xss_clean($this->post("mobile"));

  

  if(!empty($user_id) && is_numeric($user_id) && !empty($name) && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)) {

      
    $con['conditions'] = array(
        'service_provider_id' => $user_id,
      );
      
  $userCount = $this->Crud_model->getRows('service_provider',$con,'row');
  
      if($userCount){
              $owner = array(
         "service_provider_id"=>$user_id,
          "name" =>  $name,
          "email" => $email,
          "mobile"=> $mobile 
        );
        // Check if the user data is inserted
        if($this->Crud_model->update('service_provider',$owner,$con)){
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
public function update_delivery_partner_post(){
  $user_id= $this->session->userdata('active_delivery_partner');
  $name = $this->security->xss_clean($this->post("name"));
  $email = $this->security->xss_clean($this->post("email"));
  $mobile = $this->security->xss_clean($this->post("mobile"));

  

  if(!empty($user_id) && is_numeric($user_id) && !empty($name) && !empty($email) && !empty($mobile) && $this->form_validation->valid_email($email) && is_numeric($mobile) && $this->form_validation->exact_length($mobile, 10)) {

      
    $con['conditions'] = array(
        'delivery_partner_id' => $user_id,
      );
      
  $userCount = $this->Crud_model->getRows('delivery_partner',$con,'row');
  
      if($userCount){
              $owner = array(
         "delivery_partner_id"=>$user_id,
          "name" =>  $name,
          "email" => $email,
          "mobile"=> $mobile 
        );
        // Check if the user data is inserted
        if($this->Crud_model->update('delivery_partner',$owner,$con)){
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
public function support_team_get($user_id=1) {
            
  //$owner_id = $this->security->xss_clean($this->get("id"));

 $support_team= $this->session->userdata('active_support_team');
   // $user_id = $super_admin->user_id;
// checking form submittion have any error or not
if(!empty($support_team) ){

   
      $con['conditions'] = array(
          'support_team_id' => $user_id,
      );

      $userCount = $this->Crud_model->getRows('support_team',$con,'row');
    
      if($userCount){
          // Set the response and exit
            $this->response([
                  'status' => TRUE,
                  "message" => "support_team load successfully.",
                  "data" => $userCount
              ], REST_Controller::HTTP_OK);
          // Check if the user data is inserted
       
      }
      
      else{
        $this->response([
              'status' => FALSE,
              "message" => "support_team does not exist.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
}
else{
  $this->response([
      'status' => FALSE,
      'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
}
}

public function service_provider_get($user_id=1) {
            
  //$owner_id = $this->security->xss_clean($this->get("id"));

 $service_provider= $this->session->userdata('active_service_provider');
   // $user_id = $super_admin->user_id;
// checking form submission have any error or not
if(!empty($service_provider) ){

   
      $con['conditions'] = array(
          'service_provider_id' => $user_id,
      );

      $userCount = $this->Crud_model->getRows('service_provider',$con,'row');
    
      if($userCount){
          // Set the response and exit
            $this->response([
                  'status' => TRUE,
                  "message" => "service provider load successfully.",
                  "data" => $userCount
              ], REST_Controller::HTTP_OK);
          // Check if the user data is inserted
       
      }
      
      else{
        $this->response([
              'status' => FALSE,
              "message" => "service provider does not exist.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
}
else{
  $this->response([
      'status' => FALSE,
      'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
}
}
public function delivery_partner_get($user_id=1) {
            
  //$owner_id = $this->security->xss_clean($this->get("id"));

 $delivery_partner= $this->session->userdata('active_delivery_partner');
   // $user_id = $super_admin->user_id;
// checking form submission have any error or not
if(!empty($delivery_partner) ){

   
      $con['conditions'] = array(
          'delivery_partner_id' => $user_id,
      );

      $userCount = $this->Crud_model->getRows('delivery_partner',$con,'row');
    
      if($userCount){
          // Set the response and exit
            $this->response([
                  'status' => TRUE,
                  "message" => "Delivery Partner load successfully.",
                  "data" => $userCount
              ], REST_Controller::HTTP_OK);
          // Check if the user data is inserted
       
      }
      
      else{
        $this->response([
              'status' => FALSE,
              "message" => "Delivery Partner does not exist.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
}
else{
  $this->response([
      'status' => FALSE,
      'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
}
}
// public function update_owner_password_post() {

//  $customer_id = 2;
// //  $user_id = $this->security->xss_clean($this->post("user_id"));
//  $old_password = $this->security->xss_clean($this->post("old_password"));
//  $new_password = $this->security->xss_clean($this->post("new_password"));
//  $confirm_password = $this->security->xss_clean($this->post("confirm_password"));
   

   
// if(!empty($customer_id) && is_numeric($customer_id) && !empty($old_password) && !empty($new_password) && !empty($confirm_password)){
//   if($new_password == $confirm_password){    
//       $con['conditions'] = array(
//           'customer_id' => $customer_id
//       );
        
//     $userCount = $this->Crud_model->getRows('customer',$con,'row');
//         if($userCount){
//             //old password verification
//             if (password_verify($old_password,$userCount->credential)) {
//                 # code...
//           // Set the response and exit
//                     $customer = array(
//                     "credential" => password_hash($new_password, PASSWORD_DEFAULT)
//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('customer',$customer)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Password Successfully updated."
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "flag" => 0,
//                           "message" => "Failed to update Password."],
//                           REST_Controller::HTTP_OK);
//                   }
//          }
//          else{
//               $this->response([
//                   'status' => TRUE,
//                   "flag" => 0,
//                   "message" => "Invalid Old Password."],
//                   REST_Controller::HTTP_OK);
//          }
//       }
//       else{
//          $this->response([
//               'status' => FALSE,
//               "message" => "Invalid records.",
//           ], REST_Controller::HTTP_BAD_REQUEST);
//       }

//     }
//     else{
//        $this->response([
//       'status' => TRUE,
//        "flag" => 0,
//       'message' =>  "New and Confirm Password does not match"], REST_Controller::HTTP_OK);
//     }
// }
// else{
//   $this->response([
//       'status' => FALSE,
//       'message' =>  "Invalid records!!"], REST_Controller::HTTP_BAD_REQUEST);
// }

// }

  

}