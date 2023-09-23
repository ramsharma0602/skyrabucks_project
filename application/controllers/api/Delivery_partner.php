<?php
require APPPATH . 'libraries/REST_Controller.php';
class Delivery_partner extends REST_Controller {
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
               'select' => 'delivery_partner.delivery_partner_id,delivery_partner.user_type_id,delivery_partner.email,delivery_partner.credential,user_type.user_type_id,user_type.controller_name,user_type.session_name',
                 'table' => 'delivery_partner',
                 'join'=>array(array('user_type'=>'delivery_partner.user_type_id=user_type.user_type_id')),
                 'where' =>array('delivery_partner.email' => $email),
                 'single'=>true
                );

              if($result=$this->Crud_model->commonGet($option)){

                if (password_verify($password, $result->credential)) {
                   $this->response([
                          'status' => TRUE,
                          "message" => "Successfully login",
                          "data"=> $result->controller_name
                      ], REST_Controller::HTTP_OK);

                      $this->session->set_userdata($result->session_name,$result->delivery_partner_id);
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

    public function Add_user_post() {
      
      $user_type_id = $this->security->xss_clean($this->post("user_type_id"));
      $user_name = $this->security->xss_clean($this->post("name"));
      $user_email = $this->security->xss_clean($this->post("email"));
      $user_mobile = $this->security->xss_clean($this->post("mobile"));
          
        $con['conditions'] = array(
            'email' => $user_email,
            'mobile' => $user_mobile
            );
            
            $userCount = $this->Crud_model->getRows('delivery_partner',$con,'row');
                if($userCount){
                    // Set the response and exit
                    $this->response([
                        'status' => FALSE,
                        "message" => "User already exist.",
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
                else{
                    $user = array(
                     " user_type_id" => $user_type_id,
                      "name" => $user_name,
                      "email" => $user_email,
                      "mobile" => $user_mobile
                      );
                    // Check if the user data is inserted
                    if($this->Crud_model->insert('delivery_partner',$user)){
                        // Set the response and exit
                        $this->response([
                            'status' => TRUE,
                            "message" => "User Added successfully."
                        ], REST_Controller::HTTP_OK);
                    }
                    else{
                        // Set the response and exit
                        $this->response([
                            'status' => FALSE,
                            "message" => "Failed to Add User."],
                            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }
               }
          
        }
        

public function update_user_post(){
            $user_type_id = $this->security->xss_clean($this->post("user_type_id"));
            $user_name = $this->security->xss_clean($this->post("name"));
            $user_email = $this->security->xss_clean($this->post("email"));
            $user_phone = $this->security->xss_clean($this->post("mobile"));


        if(!empty($user_type_id) && is_numeric($user_type_id) && !empty($user_name) && !empty($user_email) && !empty($user_phone) && $this->form_validation->valid_email($user_email) && is_numeric($user_phone) && $this->form_validation->exact_length($user_phone, 10)){

                
              $con['conditions'] = array(
                  'user_type_id' => $user_type_id
                  );
                  
                  $userCount = $this->Crud_model->getRows('delivery_partner',$con,'row');
                //   print_r($userCount);
                if($userCount){
                  // Set the response and exit
                      $user = array(
                    "user_type_id" => $user_type_id,
                    "name" =>  $user_name,
                    "email" => $user_email,
                    "mobile"=> $user_phone 
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->update('delivery_partner',$user,$con)){
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

      public function update_user_password_post() {
        //$admin_id = 1;
         $delivery_partner_id = $this->security->xss_clean($this->post("delivery_partner_id"));
         $old_password = $this->security->xss_clean($this->post("old_password"));
         $new_password = $this->security->xss_clean($this->post("new_password"));
         $confirm_password = $this->security->xss_clean($this->post("confirm_password"));
           
        if(!empty($delivery_partner_id) && is_numeric($delivery_partner_id) && !empty($old_password) && !empty($new_password) && !empty($confirm_password)){
          if($new_password == $confirm_password){
         
              $con['conditions'] = array(
                    ' delivery_partner_id'=>$delivery_partner_id,
                  // 'old_password' => $old_password,
                  // 'new_password' => $new_password,
                  // 'confirm_password' => $confirm_password
                  );
                
                 $userCount = $this->Crud_model->getRows('delivery_partner',$con,'row');
                if($userCount){
                    //old password verification
                    if (password_verify($old_password,$userCount->credential)) {
                        # code...
                  // Set the response and exit
                            $user = array(
                             "credential" => password_hash($new_password, PASSWORD_DEFAULT)
                              );
                          // Check if the user data is inserted
                             if($this->Crud_model->update('delivery_partner',$user,$con)){
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
              'message' =>  "Invalid records....!!!!"], REST_Controller::HTTP_BAD_REQUEST);
        }

        }


        public function fetch_delivery_partner_get($user_type_id = '') {
            
          $user_type_id = $this->security->xss_clean($this->get("user_type_id"));
            //$admin_id = $this->session->userdata('active_admin');
        // checking form submission have any error or not
        if(!empty($user_type_id) ){
              $con['conditions'] = array(
                  'user_type_id' => $user_type_id,
              );

              $userCount = $this->Crud_model->getRows('delivery_partner',$con,'result');
            
              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "user load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      "status" => FALSE,
                      "message" => "user does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    
 public function change_is_active_post($delivery_partner_id=''){
 
  // $delivery_partner_id = $this->security->xss_clean($this->get("delivery_partner_id"));

  if (!empty($delivery_partner_id)) {
    # code...

   $con['conditions'] = array(
        'delivery_partner_id' => $delivery_partner_id,
   );

    $userCount = $this->Crud_model->getRows('delivery_partner',$con,'result');
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

      if($this->Crud_model->update('delivery_partner',$product_update,$con)){
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

      public function user_get($delivery_partner_id = '') {
        
        $delivery_partner_id = $this->security->xss_clean($this->get("delivery_partner_id"));

          //$admin_id = $this->security->xss_clean($this->get("id"));
            //$admin_id = $this->session->userdata('active_admin');
        // checking form submission have any error or not
        if(!empty($delivery_partner_id) ){
              $con['conditions'] = array(
                  'delivery_partner_id' => $delivery_partner_id,
              );

              $userCount = $this->Crud_model->getRows('delivery_partner',$con,'row');
            
              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Crud load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      "status" => FALSE,
                      "message" => "user does not exist.",
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
                
?>