<?php
require APPPATH . 'libraries/REST_Controller.php';
class Sub_admin extends REST_Controller {
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

       if($email ==""){


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
               'select' => 'sub_admin.sub_admin_id,sub_admin.user_type_id,sub_admin.email,sub_admin.credential,user_type.user_type_id,user_type.controller_name,user_type.session_name',
                 'table' => 'sub_admin',
                 'join'=>array(array('user_type'=>'sub_admin.user_type_id=user_type.user_type_id')),
                 'where' =>array('sub_admin.email' => $email),
                 'single'=>true
                );

              if($result=$this->Crud_model->commonGet($option)){

                if (password_verify($password, $result->credential)) {
                   $this->response([
                          'status' => TRUE,
                          "message" => "Successfully login",
                          "data"=> $result->controller_name
                      ], REST_Controller::HTTP_OK);

                      $this->session->set_userdata($result->session_name,$result->sub_admin_id);
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
            
            $userCount = $this->Crud_model->getRows('sub_admin',$con,'row');
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
                    if($this->Crud_model->insert('sub_admin',$user)){
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
                  
                  $userCount = $this->Crud_model->getRows('sub_admin',$con,'row');
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
                  if($this->Crud_model->update('sub_admin',$user,$con)){
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
         $user_id = $this->security->xss_clean($this->post("user_id"));
         $old_password = $this->security->xss_clean($this->post("old_password"));
         $new_password = $this->security->xss_clean($this->post("new_password"));
         $confirm_password = $this->security->xss_clean($this->post("confirm_password"));
           
        if(!empty($user_id) && is_numeric($user_id) && !empty($old_password) && !empty($new_password) && !empty($confirm_password)){
          if($new_password == $confirm_password){
         
              $con['conditions'] = array(
                    ' user_id'=>$user_id,
                  // 'old_password' => $old_password,
                  // 'new_password' => $new_password,
                  // 'confirm_password' => $confirm_password
                  );
                
                 $userCount = $this->Crud_model->getRows('sub_admin',$con,'row');
                if($userCount){
                    //old password verification
                    if (password_verify($old_password,$userCount->credential)) {
                        # code...
                  // Set the response and exit
                            $user = array(
                             "credential" => password_hash($new_password, PASSWORD_DEFAULT)
                              );
                          // Check if the user data is inserted
                             if($this->Crud_model->update('sub_admin',$user,$con)){
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


        public function fetch_sub_admin_get($user_type_id = '') {
            
          $user_type_id = $this->security->xss_clean($this->get("user_type_id"));
            //$admin_id = $this->session->userdata('active_admin');
        // checking form submission have any error or not
             $option = array(
               'select' => 'cities_and_sub_admin.*,cities.city,sub_admin.name,sub_admin.email,sub_admin.mobile',
                 'table' => 'cities_and_sub_admin',
                 'join'=>array(array('cities'=>'cities.city_id=cities_and_sub_admin.city_id'),array('sub_admin'=>'sub_admin.sub_admin_id=cities_and_sub_admin.sub_admin_id')),
        
                );
        if(!empty($user_type_id) ){
              $con['conditions'] = array(
                  'user_type_id' => $user_type_id,
              );

              $userCount = $this->Crud_model->getRows('sub_admin',$con,'result');
            
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


    
 public function change_is_active_post($user_id=''){
 
  $user_id = $this->security->xss_clean($this->get("user_id"));

  if (!empty($user_id)) {
    # code...

   $con['conditions'] = array(
        'user_id' => $user_id,
   );

    $userCount = $this->Crud_model->getRows('sub_admin',$con,'row');
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

      if($this->Crud_model->update('sub_admin',$product_update,$con)){
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

      public function user_get($user_id = '') {
        
        $user_id = $this->security->xss_clean($this->get("user_id"));

          //$admin_id = $this->security->xss_clean($this->get("id"));
            //$admin_id = $this->session->userdata('active_admin');
        // checking form submission have any error or not
        if(!empty($user_id) ){
              $con['conditions'] = array(
                  'user_id' => $user_id,
              );

              $userCount = $this->Crud_model->getRows('sub_admin',$con,'row');
            
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