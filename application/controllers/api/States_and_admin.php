<?php
require APPPATH . 'libraries/REST_Controller.php';
class States_and_admin extends REST_Controller {
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
    //    $this->load->database();
     }

     
     public function fetch_state_get(){

       $active_admin= $this->session->userdata('active_admin');

        $option = array(
             
             'select' =>'states_and_admin.*,states.state_name',
             'table'=>'states_and_admin',
             'join'=>array(array('states'=>'states.state_id=states_and_admin.state_id')),
             'where' =>array('states_and_admin.admin_id' => $active_admin),
             'single'=>false,  
             );
     
             if($result=$this->Crud_model->commonGet($option)){
            //   print_r($result);
            //   exit();
                    $this->response([
                           'status' => TRUE,
                           "message" => "Successfully added location",
                           "data"=> $result
                       ], REST_Controller::HTTP_OK);
     
                    //    $this->session->set_userdata($result->session_name,$result->city_id);
                     }
     
               else{
     
                   $this->response([
                       'status' => FALSE,
                       "message" => "state not found",
                   ], REST_Controller::HTTP_BAD_REQUEST);
               }
             
             }



public function add_state_post() {

          $state_id =   $this->security->xss_clean($this->post("state_id"));
          $admin_id =   $this->security->xss_clean($this->post("admin_id"));
        // checking form submission have any error or not

        if(!empty($state_id) && is_numeric($state_id)  && !empty($admin_id)){
          
              $con['conditions'] = array(
                  'state_id' => $state_id,);

              $userCount = $this->Crud_model->getRows('states_and_admin',$con,'row');
        
              if($userCount){
                  // Set the response and exit
                  $this->response([
                      'status' => FALSE,
                      "message" => "State Location already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
          
              }
              
              else{
                  $category = array(
                    "state_id" => $state_id,
                    "admin_id" => $admin_id, 
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->insert('states_and_admin',$category,$con)){
                      // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "State added successfully."
                      ], REST_Controller::HTTP_OK);
            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to add Service."],
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



public function delete_states_delete($state_id='') {

         
        if(!empty($state_id) ){

           
              $con['conditions'] = array(
                  'state_id' => $state_id,
              );

              $userCount = $this->Crud_model->getRows('states',$con,'row');

              if($userCount){
                  // Set the response and exit
                     if($this->Crud_model->delete('states',$con)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Location Successfully deleted"
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to delete Location."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Locations does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
      
 public function fetch_all_location_get() {

            // $userCount = $this->Crud_model->getRows('state_admin',$arrayname =array(),'result');

           $option = array(
                 'select' => 'states_and_admin.*,states.state_name,admin.name',
                 'table' => 'states_and_admin',
                 'join'=>array(array('states'=>'states.state_id=states_and_admin.state_id'),array('admin'=>'admin.admin_id=states_and_admin.admin_id')),
        
                );

              if($result=$this->Crud_model->commonGet($option)){

        
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Location load successfully.",
                          "data" => $result
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Location does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        
        
    }
     public function fetch_all_state_get() {

            $userCount = $this->Crud_model->getRows('states',$arrayname =array(),'result');


              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Location load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Location does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        
        
    }


    }