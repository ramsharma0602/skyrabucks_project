<?php

require APPPATH . 'libraries/REST_Controller.php';

class Sub_category extends REST_Controller {
  
    public function __construct() {

       parent::__construct();

       $this->load->database();

    }

     
        public function add_sub_category_post() {
        //   $main_service_name =  str_replace(' ','-', $this->security->xss_clean($this->post("main_service_name")));
          $sub_service_name =  $this->security->xss_clean($this->post("sub_service_name"));
          $main_service_id =   $this->security->xss_clean($this->post("main_service_id"));

           
        // checking form submission have any error or not
        if(!empty($sub_service_name) && !empty($main_service_id)  ){

           
              $con['conditions'] = array(
                  'sub_service_name' => $sub_service_name,
               

              );

              $userCount = $this->Crud_model->getRows('sub_services',$con,'row');
        
              if($userCount){
                  // Set the response and exit
                  $this->response([
                      'status' => FALSE,
                      "message" => "Sub services already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
          
              }
              
              else{
                  $category = array(
                    "sub_service_name" => $sub_service_name ,
                    'main_service_id' => $main_service_id,
                 
                    
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->insert('sub_services',$category)){
                      // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Sub_Category added successfully."
                      ], REST_Controller::HTTP_OK);
            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Failed to add sub_category."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }
              }
        }
        else{
         $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);

        // $option = array(
        //     'select' => 'main_service.main_service_id,main_service.main_service_name,main_service.main_image,sub_services.sub_service_id,sub_services.main_service_id,sub_services.sub_service_name,sub_services.main_service_name',
        //     'table' => 'sub_services',
        //     // 'join'=>array(array('sub_services'=>'main_service.sub_service_id=sub_services.sub_service_id')),
        //     'join'=>array(array('main_service'=>'sub_service.main_service_id=main_service.main_service_id')),
        //     'where' =>array('main_service_id' => $main_service_id),
        //     'single'=>true
        //     );
    
        //     if($result=$this->Crud_model->commonGet($option)){
    
    
        //         if (main_service_name_verify($main_service_name, $result->main_image)) {
        //            $this->response([
        //                   'status' => TRUE,
        //                   "message" => "Successfully login",
        //                   "data"=> $result->sub_service_name
        //               ], REST_Controller::HTTP_OK);
    
        //               $this->session->set_userdata($result->session_name,$result->main_service_id);
        //             }
        //             else{
        //                $this->response([
        //               'status' => FALSE,
        //               "message" => "Please check main_service_name.",
        //           ], REST_Controller::HTTP_BAD_REQUEST);
        //             }
    
        //       }else{
    
        //           $this->response([
        //               'status' => FALSE,
        //               "message" => "user not found",
        //           ], REST_Controller::HTTP_BAD_REQUEST);
        //       }
            
         
        }

    }


     public function update_sub_category_post() {
         $sub_service_id = $this->security->xss_clean($this->post("sub_service_id"));
         $sub_service_name = $this->security->xss_clean($this->post("sub_service_name"));
        $main_service_id = $this->security->xss_clean($this->post("main_service_id"));
        //  $sub_service_image = $this->security->xss_clean($this->post("sub_service_image"));

        if(!empty($sub_service_id) && is_numeric($sub_service_id) && !empty($sub_service_name)&&($main_service_id)){

                
              $con['conditions'] = array(
                  'sub_service_id' => $sub_service_id
              );
                
            $userCount = $this->Crud_model->getRows('sub_services',$con,'row');
                if($userCount){
                  // Set the response and exit
                      $category_update = array(
                    "sub_service_id" =>  $sub_service_id,
                    "sub_service_name" =>  $sub_service_name,
                    "main_service_id" => $main_service_id,
                    // 'sub_service_image' => $sub_service_image
          
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->update('sub_services',$category_update,$con)){
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


        public function fetch_sub_category_get($sub_service_id='') {
             // public function fetch_category_get() {
          $sub_service_id = $this->security->xss_clean($this->get("sub_service_id"));
           
        // checking form submission have any error or not
        if(!empty($sub_service_id) ){

           
              $con['conditions'] = array(
                  'sub_service_id' => $sub_service_id,
              );

              $userCount = $this->Crud_model->getRows('sub_services',$con,'row');

              

              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Sub_category load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Sub_category does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function fetch_from_main_service_id_get($main_service_id=0) {     
           
        // checking form submission have any error or not

         $main_service_id = $this->security->xss_clean($this->get("main_service_id"));

      
        if(!empty($main_service_id) ){

           
              $con['conditions'] = array(
                  'main_service_id' => $main_service_id
              );

              $userCount = $this->Crud_model->getRows('sub_services',$con,'result');

              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Sub category load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Sub category does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
 public function fetch_all_sub_category_get() {
            
         
              $userCount = $this->Crud_model->getRows('sub_services',$arrayname = array(),'result');


              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Sub_category load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Sub_category does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        
        
    }




    public function delete_sub_category_delete($sub_service_id='') {

         
        if(!empty($sub_service_id) ){

           
              $con['conditions'] = array(
                  'sub_service_id' => $sub_service_id,
              );

              $userCount = $this->Crud_model->getRows('sub_services',$con,'row');

              if($userCount){
                  // Set the response and exit
                     if($this->Crud_model->delete('sub_services',$con)){
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
                      "message" => "Sub_category does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


     public function upload_sub_category_image_post($value='')
   {
  
    if ($data = $this->input->post('image')) {
   
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = time() . '.png';
    file_put_contents("./uploads/Sub_category_Images/".$imageName, $data);
    
    
    
    //  $dir = './uploads/Sub_category_Images/';
    // $newName = time().'.webp';
    // // Create and save
    // $img = imagecreatefrompng($dir . $imageName);
    // imagepalettetotruecolor($img);
    // imagealphablending($img, true);
    // imagesavealpha($img, true);
    // imagewebp($img, $dir . $newName, 50);
    // imagedestroy($img);
    
    // unlink("./uploads/Sub_category_Images/".$imageName);



    
    $category_id=$this->input->post('id');

             $con['conditions'] = array(
                  'sub_service_id' => $category_id
              );
  
    $category_details=$this->Crud_model->getRows('sub_services',$con,'row');

      if ($category_details->main_image) {
      # code...
         unlink("./uploads/Sub_category_Images/".$category_details->main_image);
      }
       
      $data_update = array('main_image' => $imageName );
      if ($this->Crud_model->update('sub_services',$data_update,$con)) {

             $this->response([
                          'status' => TRUE,
                          "message" => "Successfully uploaded Sub_category Image"
                      ], REST_Controller::HTTP_OK);

      }
      else{

        $this->response([
                          'status' => FALSE,
                          "message" => "Failed to uploaded Sub_category Image."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

      }
    
    } 
    

   }

public function delete_sub_category_image_delete($sub_service_id='') {
   
        if(!empty($sub_service_id) ){

           
              $con['conditions'] = array(
                  'sub_service_id' => $sub_service_id,
              );

              $category_details = $this->Crud_model->getRows('sub_services',$con,'row');

              if($category_details->main_image){
                  // Set the response and exit

                 $image=unlink("./uploads/Sub_category_Images/".$category_details->main_image);
              
              }
                 if($image){

                    $update_data=array('main_image' => NULL);
                 
                     if($this->Crud_model->update('sub_services', $update_data,$con)){
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