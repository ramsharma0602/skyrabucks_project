<?php
require APPPATH . 'libraries/REST_Controller.php';
class Admin_city extends REST_Controller {
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
     }



     public function add_city_post() {

          $city_id =  $this->security->xss_clean($this->post("city_id"));
          $sub_admin_id =  $this->security->xss_clean($this->post("sub_admin_id"));
        // checking form submittion have any error or not

        if(!empty($city_id) && is_numeric($city_id)  && !empty($sub_admin_id)){
          
              $con['conditions'] = array(
                  'city_id' => $city_id,);

              $userCount = $this->Crud_model->getRows('cities_and_sub_admin',$con,'row');
        
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
                    "sub_admin_id" => $sub_admin_id, 
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->insert('cities_and_sub_admin',$category,$con)){
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
                  'id' => $id,
              );

              $userCount = $this->Crud_model->getRows('cities',$con,'row');

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

    
 public function change_is_active_post($id=''){
 
  // $id = $this->security->xss_clean($this->get("id"));

  if (!empty($id)) {
    # code...

   $con['conditions'] = array(
        'id' => $id,
   );

    $userCount = $this->Crud_model->getRows('cities',$con,'row');
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

      if($this->Crud_model->update('cities',$product_update,$con)){
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

 
  

public function states_is_active_post($id=''){
 
  // $id = $this->security->xss_clean($this->get("id"));

  if (!empty($id)) {
    # code...

   $con['conditions'] = array(
        'id' => $id,
   );

    $userCount = $this->Crud_model->getRows('states',$con,'row');
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

      if($this->Crud_model->update('states',$product_update,$con)){
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


public function delete_states_delete($city_id='') {

         
        if(!empty($city_id) ){

           
              $con['conditions'] = array(
                  'city_id' => $city_id,
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

            $userCount = $this->Crud_model->getRows('cities_and_sub_admin',$arrayname =array(),'result');


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
                
?>