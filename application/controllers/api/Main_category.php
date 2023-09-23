<?php

require APPPATH . 'libraries/REST_Controller.php';

class Main_category extends REST_Controller {

    public function __construct() {

       parent::__construct();

       $this->load->database();

    }

     
        public function add_service_post() {

          $service_name =  $this->security->xss_clean($this->post("main_service_name"));
           
           
        // checking form submittion have any error or not
        if(!empty($service_name)){

           
              $con['conditions'] = array(
                  'main_service_name' => $service_name,);

              $userCount = $this->Crud_model->getRows('main_service',$con,'row');
        
              if($userCount){
                  // Set the response and exit
                  $this->response([
                      'status' => FALSE,
                      "message" => "Service Name already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
          
              }
              
              else{
                  $category = array(
                    "main_service_name" => $service_name 
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->insert('main_service',$category,$con)){
                      // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Service added successfully."
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


     public function update_service_post() {
         $service_id = $this->security->xss_clean($this->post("main_service_id"));
         $service_name = $this->security->xss_clean($this->post("main_service_name"));

        if(!empty($service_id) && is_numeric($service_id) && !empty($service_name) ){

                
              $con['conditions'] = array(
                  'main_service_id' => $service_id
              );
                
            $userCount = $this->Crud_model->getRows('main_service',$con,'row');
                if($userCount){
                  // Set the response and exit
                      $service_update = array(
                    "main_service_name" =>  $service_name,
          
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->update('main_service',$service_update,$con)){
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


        public function fetch_category_get($service_id='') {
             // public function fetch_category_get() {
       $service_id = $this->security->xss_clean($this->get("main_service_id"));
           
        // checking form submittion have any error or not
        if(!empty($service_id) && is_numeric($service_id) ){
              $con['conditions'] = array(
                  'main_service_id' => $service_id,
              );

              $userCount = $this->Crud_model->getRows('main_service',$con,'row');

              

              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Category load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Category does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

 public function fetch_all_category_get() {
            
         
            $userCount = $this->Crud_model->getRows('main_service',$arrayname =array(),'result');


              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Category load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Category does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        
        
    }




    public function delete_service_delete($main_service_id='') {
          
          // $main_service_id = $this->security->xss_clean($this->post("main_service_id"));

        if(!empty($main_service_id) ){

           
              $con['conditions'] = array(
                  'main_service_id' => $main_service_id,
              );

              $userCount = $this->Crud_model->getRows('main_service',$con,'row');

              if($userCount){
                  // Set the response and exit
                     if($this->Crud_model->delete('main_service',$con)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Successfully deleted"
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to delete information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Category does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function upload_category_image_post($value='')
   {
  
    if ($data = $this->input->post('image')) {
   
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = time() . '.png';
    file_put_contents("./uploads/Category_Images/".$imageName, $data);
    
    
    
    //  $dir = './uploads/Category_Images/';
    // $newName = time().'.webp';
    
    // $img = imagecreatefrompng($dir . $imageName);
    // imagepalettetotruecolor($img);
    // imagealphablending($img, true);
    // imagesavealpha($img, true);
    // imagewebp($img, $dir . $newName, 50);
    // imagedestroy($img);
    
    // unlink("./uploads/Category_Images/".$imageName);



    
    $category_id=$this->input->post('id');

             $con['conditions'] = array(
                  'main_service_id' => $category_id
              );
  
    $category_details=$this->Crud_model->getRows('main_service',$con,'row');

      if ($category_details->main_image) {
      # code...
         unlink("./uploads/Category_Images/".$category_details->main_image);
      }
    
      $data_update = array('main_image' => $imageName );

      if ($this->Crud_model->update('main_service',$data_update,$con))
       {

             $this->response([
                          'status' => TRUE,
                          "message" => "Successfully uploaded Category Image"
                      ], REST_Controller::HTTP_OK);

      }
      else{

        $this->response([
                          'status' => FALSE,
                          "message" => "Failed to uploaded Category Image."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

      }
    
    } 
    

   }

public function delete_service_image_delete($service_id='') {
   
        if(!empty($service_id) ){

           
              $con['conditions'] = array(
                  'main_service_id' => $service_id,
              );

              $category_details = $this->Crud_model->getRows('main_service',$con,'row');

              if($category_details->main_image){
                  // Set the response and exit

                 $image=unlink("./uploads/Category_Images/".$category_details->main_image);
              
              }
                 if($image){
                  
                 
                    $update_data=array('main_image'=>NULL);

                     if($this->Crud_model->update('main_service',$update_data,$con)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Successfully deleted"
                      ], REST_Controller::HTTP_OK);
                  }
                      else{
                          // Set the response and exit
                          $this->response([
                              'status' => FALSE,
                              "message" => "Failed to delete Image."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      }
                  }
               
              
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Image does not exist.",
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