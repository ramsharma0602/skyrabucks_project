<?php
require APPPATH . 'libraries/REST_Controller.php';
class Banner extends REST_Controller {

    public function __construct() {

       parent::__construct();

       $this->load->database();
        $this->table ='banner';
        
        // Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

    }

    
public function Add_banner_post() {
            
            // Get the post data
            //India time (GMT+5:30)

            $banner_title = $this->security->xss_clean($this->post("banner_title"));
            $banner_description = $this->security->xss_clean($this->post("banner_description"));
            $banner_link = $this->security->xss_clean($this->post("banner_link"));
            

        // checking form submission have any error or not
             //   if(!empty($banner_title) && !empty($banner_link)){
                    
                    //   $con_banner['conditions'] = array(
                    //       'banner_title' => $banner_title,
                    //   );
                      
                    //   $userCount=$this->Crud_model->getRows($this->table,$con_banner,'result');
                    //   if($userCount){
                    //       // Set the response and exit
                    //       $this->response([
                    //           'status' => FALSE,
                    //           "message" => "Banner already exist.",
                    //       ], REST_Controller::HTTP_BAD_REQUEST);
                    //   }
                    //   else{
                          $banner = array(
                            "banner_title" => $banner_title,
                            "banner_link" => $banner_link,
                            "banner_description" => $banner_description
                            );
                          // Check if the user data is inserted
                          if($this->Crud_model->insert('banner',$banner)){
                              // Set the response and exit
                              $this->response([
                                  'status' => TRUE,
                                  "message" => "Banner Added successfully."
                              ], REST_Controller::HTTP_OK);
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to Add Banner."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
                     // }
                // }
                // else{
                //   $this->response([
                //       'status' => FALSE,
                //       'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
                // }
    }



       public function delete_banner_delete($banner_id='') {
          
        
        // $banner_id = $this->security->xss_clean($this->get("banner_id"));
            
        // checking for submission have any error or not
        
        // if(empty($banner_id)){
            //  $banner_id = $this->security->xss_clean($this->post("banner_id"));
            
        // }
        
        if(!empty($banner_id) ){

           
              $con['conditions'] = array(
                  'banner_id' => $banner_id,
                  
              );

               $userCount=$this->Crud_model->getRows('banner',$con,'row');

              if($userCount){
                  // Set the response and exit
                     if($this->Crud_model->delete('banner',$con)){
                      // Set the response and exit
                      
                      if(file_exists("./uploads/banners/".$userCount->image_name) and !empty($userCount->image_name)){
                          
                          unlink("./uploads/banners/".$userCount->image_name);
                      }
                           
                    
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
                      "message" => "Banner does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function update_banner_post() {
        $banner_id = $this->security->xss_clean($this->post("banner_id"));
        $banner_title = $this->security->xss_clean($this->post("banner_title"));
        $banner_description = $this->security->xss_clean($this->post("banner_description"));
        $banner_link = $this->security->xss_clean($this->post("banner_link"));
        
           
        if(!empty($banner_id) && is_numeric($banner_id) && !empty($banner_link) && !empty($banner_title) && !empty($banner_description)){

                
              $con_banner['conditions'] = array(
                  'banner_id' => $banner_id
                  
              );
                
             $userCount=$this->Crud_model->getRows($this->table,$con_banner,'row');
                if($userCount){
                  // Set the response and exit
                      $category_update = array(
                    "banner_title" =>  $banner_title,
                    "banner_link" => $banner_link,
                    "banner_description"=>$banner_description
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->update($this->table,$category_update,$con_banner)){
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



 public function fetch_banner_get() {
            
          $banner_id = $this->security->xss_clean($this->get("banner_id"));
           
        // checking form submission have any error or not
        if(!empty($banner_id) ){

           
              $con_banner['conditions'] = array(
                  'banner_id' => $banner_id,
              );

               $userCount=$this->Crud_model->getRows($this->table,$con_banner,'row');

              

              if($userCount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Banner load successfully.",
                          "data" => $userCount
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Banner does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }




     public function all_banner_get() {
            
        
           
        // checking form submission have any error or not
        $con_banner=array();
         $bannercount=$this->Crud_model->getRows($this->table,$con_banner,'result');

//$data=array("name"=> "John Smith", "email"=> "john@example.com","username"=>"username");
//   "email": "john@example.com")
// {
//   "name": "John Smith",
//   "email": "john@example.com"
// }


              if($bannercount){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Banner load successfully.",
                          "data" => array_reverse($bannercount)
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Banner does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
       
    }
     
   public function upload_banner_post($value='')
   {

    $imageName=NULL;
    
    if (($data = $this->input->post('image')) && ($banner_id=$this->input->post('banner_id')) && is_numeric($this->input->post('banner_id'))) {

    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = time() . '.png';
    file_put_contents("./uploads/banners/".$imageName, $data);
    
    
    
    // $dir = './uploads/banners/';
    // $newName = time().'.webp';
    // // Create and save
    // $img = imagecreatefrompng($dir . $imageName);
    // imagepalettetotruecolor($img);
    // imagealphablending($img, true);
    // imagesavealpha($img, true);
    // imagewebp($img, $dir . $newName, 50);
    // imagedestroy($img);
    // unlink("./uploads/banners/".$imageName);

   
    $con_banner['conditions'] = array(
       'banner_id' => $banner_id,
    );

     $userCount=$this->Crud_model->getRows('banner',$con_banner,'row');
 
      if ($userCount->image_name) {
           unlink("./uploads/banners/".$userCount->image_name);
       }
       $system_info = array("image_Name" => $imageName);
          if($this->Crud_model->update('banner',$system_info,$con_banner)){
                $this->response([
                  'status' => TRUE,
                  "message" => "Successfully Uploaded Banner Image"
                ], REST_Controller::HTTP_OK);
          }
          else {
              $this->response([
              'status' => FALSE,
              "message" => "Failed to upload Banner Image."],
              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }
   }
   else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
    }
}

   public function change_banner_status_post($value='')
    {
      # code...
     $banner_id = $this->security->xss_clean($this->post("banner_id"));

    if (!empty($banner_id)) {
        # code...
             $con['conditions'] = array(
                  'banner_id' => $banner_id,
             );

       if($branches_row=$this->Crud_model->getRows($this->table,$con,'row')){

          if($branches_row->enable=='N'){
               $data = array(
                  'enable' => 'Y',
                  
              );
          }
          else{
             $data = array(
              'enable' => 'N',
              );
          }
           
              if($branches_row=$this->Crud_model->update($this->table,$data,$con)){
           
                $this->response([
                      "status" => TRUE,
                      "message" => "Banner Status Updated Successfully.",
                      "data"=>$branches_row
                  ], REST_Controller::HTTP_OK);
        
              }

              else{
                  // Set the response and exit
                $this->response([
                      'status' => FALSE,
                      "message" => "Banner Status Not Updated."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  
              }
       
        }

        else{
              // Set the response and exit
            $this->response([
                  'status' => FALSE,
                  "message" => "Banner not Found ."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              
          }
     }
     
     else{
        // Set the response and exit
                $this->response([
                      'status' => FALSE,
                      "message" => "invalid data."
                       ], REST_Controller::HTTP_BAD_REQUEST);
                  
     }
  }

}