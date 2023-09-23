<?php
require APPPATH . 'libraries/REST_Controller.php';
class Cities_and_support_team extends REST_Controller {
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
    //    $this->load->database();
     }

     
     public function fetch_city_get(){

       $active_support_team= $this->session->userdata('active_support_team');

        $option = array(
             // 'select' =>'cities.city_id','cities_and_support_team.city_id',
             'select' =>'cities_and_support_team.*,cities.city',
             'table'=>'cities_and_support_team',
             'join'=>array(array('cities'=>'cities.city_id=cities_and_support_team.city_id')),
             'where' =>array('cities_and_support_team.support_team_id' => $active_support_team),
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
                       "message" => "city not found",
                   ], REST_Controller::HTTP_BAD_REQUEST);
               }
             
             }



public function add_city_post() {

          $city_id =  $this->security->xss_clean($this->post("city_id"));
          $support_team_id =   $this->security->xss_clean($this->post("support_team_id"));
        // checking form submittion have any error or not

        if(!empty($city_id) && is_numeric($city_id)  && !empty($support_team_id)){
          
              $con['conditions'] = array(
                  'city_id' => $city_id,);

              $userCount = $this->Crud_model->getRows('cities_and_support_team',$con,'row');
        
              if($userCount){
                  // Set the response and exit
                  $this->response([
                      'status' => FALSE,
                      "message" => "State Location already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
          
              }
              
              else{
                  $category = array(
                    "city_id" => $city_id,
                    "support_team_id" => $support_team_id, 
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->insert('cities_and_support_team',$category,$con)){
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

public function delete_location_delete($id='') {

         
        if(!empty($id) ){

           
              $con['conditions'] = array(
                  'cs_id' => $id,
              );

              $userCount = $this->Crud_model->getRows('cities_and_support_team',$con,'row');

              if($userCount){
                  // Set the response and exit
                     if($this->Crud_model->delete('cities_and_support_team',$con)){
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
               'select' => 'cities_and_support_team.*,cities.city,support_team.name',
                 'table' => 'cities_and_support_team',
                 'join'=>array(array('cities'=>'cities.city_id=cities_and_support_team.city_id'),array('support_team'=>'support_team.support_team_id=cities_and_support_team.support_team_id')),
        
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
     public function fetch_all_cities_get() {

            $userCount = $this->Crud_model->getRows('cities',$arrayname =array(),'result');


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