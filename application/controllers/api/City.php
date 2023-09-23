<?php
require APPPATH . 'libraries/REST_Controller.php';
class City extends REST_Controller {
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
     }
     public function fetch_city_get($city_id=''){

     $option = array(
          // 'select' =>'cities.city_id','cities_and_support_team.city_id',
          'select' =>'cities_and_support_team.*','cities.city','cities.city_id',
          'table'=>'cities_and_support_team',
          'join'=>array(array('cities_and_support_team'=>'cities.city_id=cities_and_support_team.city_id')),
          'where' =>array('city_id' => $city_id),
          'single'=>false,  
          );
  
          if($result=$this->Crud_model->commonGet($option)){
          //  print_r($result);
          //  exit();
                 $this->response([
                        'status' => TRUE,
                        "message" => "Successfully added location",
                        "data"=> $result
                    ], REST_Controller::HTTP_OK);
  
                    $this->session->set_userdata($result->session_name,$result->city_id);
                  }
  
            else{
  
                $this->response([
                    'status' => FALSE,
                    "message" => "city not found",
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
          
          }
public function delete_location_delete($city_id='') {

         
        if(!empty($city_id) ){

           
              $con['conditions'] = array(
                  'city_id' => $city_id,
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

    
 public function change_is_active_post($id=''){
 
  // $id = $this->security->xss_clean($this->get("id"));

  if (!empty($id)) {
    # code...

   $con['conditions'] = array(
        'id' => $id,
   );

    $userCount = $this->Crud_model->getRows('cities_and_support_team',$con,'row');
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

      if($this->Crud_model->update('cities_and_support_team',$product_update,$con)){
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

 public function fetch_all_location_get() {

            $userCount = $this->Crud_model->getRows('cities_and_support_team',$arrayname =array(),'result');


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

    public function set_location_get($city='') {
      $con['conditions'] = array(
        'city' => $city,
      );
      $userCount = $this->Crud_model->getRows('cities',$con,'row');
      if($userCount){
        $this->session->set_userdata('active_location',$userCount);
        if($this->session->userdata('active_location')){
          $this->response([
            'status' => TRUE,
            "message" => "location Updated Successfully"
              ], REST_Controller::HTTP_OK);
        }else{
          $this->response([
            'status' => FALSE,
            "message" => "Failed to set city."],
             REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

        }
      }else{
        //invalid city name
        $this->response([
          'status' => FALSE,
          "message" => "Invalid information."],
           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

      } 
      
}


public function cities_is_active_post($city_id=''){
 
  // $id = $this->security->xss_clean($this->get("id"));

  if (!empty($city_id)) {
    # code...

   $con['conditions'] = array(
        'city_id' => $city_id,
   );

    $userCount = $this->Crud_model->getRows('cities_and_support_team',$con,'row');
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

      if($this->Crud_model->update('cities_and_support_team',$product_update,$con)){
         // Set the response and exit
           $this->response([
           'status' => TRUE,
           "message" => "Cities Updated Successfully"
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


public function delete_cities_delete($city_id='') {

         
        if(!empty($city_id) ){

           
              $con['conditions'] = array(
                  'City_id' => $city_id,
              );

              $userCount = $this->Crud_model->getRows('cities_and_support_team',$con,'row');

              if($userCount){
                  // Set the response and exit
                     if($this->Crud_model->delete('cities',$con)){
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
      
 public function fetch_all_cities_get() {

            $userCount = $this->Crud_model->getRows('cities_and_support_team',$arrayname =array(),'result');


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
                
?>