<?php require APPPATH . 'libraries/REST_Controller.php';

class General_setting extends REST_Controller {
      /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {

       parent::__construct();

       $this->load->database();
       $this->table ='general_settings';
    }
       /**General Setting**/


       public function index_get() {
            
        $con=array();
           
        $userCount=$this->Crud_model->getRows('general_settings',$con,'result');
           
             if($userCount){
                 // Set the response and exit
                   $this->response([
                         'status' => TRUE,
                         "message" => "General_setting load successfully.",
                         "data" => $userCount
                     ], REST_Controller::HTTP_OK);
                 // Check if the user data is inserted
              
             }
             
             else{
               $this->response([
                     'status' => FALSE,
                     "message" => "General_setting does not exist.",
                 ], REST_Controller::HTTP_BAD_REQUEST);
               
             }
     
   }
   public function update_post() {
    $general_settings_id = $this->security->xss_clean($this->post("g_s_id"));
    $meta_value = $this->security->xss_clean($this->post("value"));
       
     if(!empty($general_settings_id) && !empty($meta_value)){
        $con['conditions'] = array(
              'general_settings_id' => $general_settings_id,
            
        );
          // Set the response and exit
         $data_values = array(
            "value" => $meta_value);
          
         
          // Check if the user data is inserted
          if( $this->Crud_model->update('general_settings',$data_values,$con) ){
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


 public function upload_image_post()
   {

    $imageName=NULL;
    $general_settings_id=$this->input->post('general_settings_id');
    if ($data = $this->input->post('image')) {
      # code...
    // $extension= $this->input->post('extension');

    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = time() . '.png';
    file_put_contents("./uploads/logos/".$imageName, $data);
    
    // $dir = './uploads/logos/';
    // $newName = time().'.webp';
    // // Create and save
    // $img = imagecreatefrompng($dir . $imageName);
    // imagepalettetotruecolor($img);
    // imagealphablending($img, true);
    // imagesavealpha($img, true);
    // imagewebp($img, $dir . $newName, 50);
    // imagedestroy($img);
    
    // unlink("./uploads/logos/".$imageName);

    
    
          $con['conditions'] = array(
                  'general_settings_id' => $general_settings_id,
         );
         if($row_data=$this->Crud_model->getRows('general_settings',$con,'row')){
 

                    if ($row_data->value!="") {
                      # code...
                 
                    unlink("./uploads/logos/".$row_data->value);
                     }
                
                    $system_info = array("value" => $imageName);
                 
                        if($this->Crud_model->update('general_settings',$system_info,$con)){
                              // Set the response and exit

                              $this->response([
                                  'status' => TRUE,
                                  "message" => "Successfully Uploaded logo"
                              ], REST_Controller::HTTP_OK);
                          }
                          else{
                              // Set the response and exit
                              $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to upload Logo."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          }
                      }

                else{
                    $this->response([
                        'status' => FALSE,
                        'message' =>  "General setting not found."], REST_Controller::HTTP_BAD_REQUEST);
                  }
       }

      else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
        }
}
public function fetch_theme_post(){
    $general_settings_id = $this->security->xss_clean($this->post("g_s_id"));

    $con['conditions'] = array(
        'general_settings_id' => $general_settings_id,
    );

         if($result=$this->Crud_model->getRows('general_settings',$con,'row')){
         //  print_r($result);
         //  exit();
                $this->response([
                       'status' => TRUE,
                       "message" => "Successfully added theme",
                       "data"=> $result
                   ], REST_Controller::HTTP_OK);
 
                //    $this->session->set_userdata($result->session_name,$result->g_s_id);
                 }
 
           else{
 
               $this->response([
                   'status' => FALSE,
                   "message" => "theme not found",
               ], REST_Controller::HTTP_BAD_REQUEST);
           }
         
         }

public function theme_update_post(){
 $theme_value = $this->security->xss_clean($this->post("value"));
 $general_settings_id = $this->security->xss_clean($this->post("g_s_id"));
 

 if( !empty($general_settings_id) && !empty($theme_value) ){

            $con['conditions'] = array(
            'general_settings_id' => $general_settings_id,
            );

           $data_values = array(
                      "value" => $theme_value
                    );  
               if( $this->Crud_model->update('general_settings',$data_values,$con)){
                $this->response([
                      'status' => TRUE,
                      "message" => "Successfully Uploaded theme"
                  ], REST_Controller::HTTP_OK);
                }
                else{
                //failed to update theme
                  $this->response([
                  'status' => FALSE,
                  'message' =>  "Failed to update theme."], REST_Controller::HTTP_BAD_REQUEST);
                }
 }else{
  //incomplete info
$this->response([
'status' => FALSE,
'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);

 }
        
}

// public function update_policy_post() {
//     $privacy_policy = $this->security->xss_clean($this->post("value"));
//     $general_settings_id = $this->security->xss_clean($this->post("g_s_id"));


//     if(!empty($privacy_policy)){
//           $con['conditions'] = array(
//         //   'type' => 'privacy_policy'
//           'general_settings_id' => $general_settings_id,
//       );
       

       
//     $userCount = $this->Crud_model->getRows('general_settings',$con,'row');
//         if($userCount){
//           // Set the response and exit
//               $system_info = array(
//             "value" => $privacy_policy,
            

//           );
//           // Check if the user data is inserted
//           if($this->Crud_model->update('general_settings',$system_info,$con)){
//               // Set the response and exit
//               $this->response([
//                   'status' => TRUE,
//                   "message" => "Successfully updated"
//               ], REST_Controller::HTTP_OK);
//           }
//           else{
//               // Set the response and exit
//               $this->response([
//                   'status' => FALSE,
//                   "message" => "Failed to update information."],
//                   REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//           }
         
//       }
//       else{
//          $this->response([
//               'status' => FALSE,
//               "message" => "Invalid records.",
//           ], REST_Controller::HTTP_BAD_REQUEST);
//       }


// }else{
//   $this->response([
//       'status' => FALSE,
//       'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
// }
// }


//     public function update_system_info_post() {

//             $system_name = $this->security->xss_clean($this->post("update_system_name"));
//             $short_name = $this->security->xss_clean($this->post("update_short_name"));
//             $contact_no = $this->security->xss_clean($this->post("update_contact_no"));
//             $address = $this->security->xss_clean($this->post("update_address"));
           
//            if(!empty($system_name) && !empty($short_name) && !empty($contact_no) && !empty($address) && is_numeric($contact_no) && $this->form_validation->exact_length($contact_no, 10))
           
//             {
//                 $con_system_name['conditions'] = array(
//                       'type' => 'system_name',
//                  );
                
//                  $con_short_name['conditions'] = array(
//                      'type' => 'short_name',
//                  );
                
//                  $con_contact_no['conditions'] = array(
//                     'type' => 'contact_no',
//                 );
                
//                  $con_address['conditions'] = array(
//                       'type' => 'address'
//                 );

//                    $system_name=$this->Crud_model->getRows('general_settings',$con_system_name,'row');
//                    $short_name=$this->Crud_model->getRows('general_settings',$con_short_name,'row');
//                    $contact_no=$this->Crud_model->getRows('general_settings',$con_contact_no,'row');
//                    $address=$this->Crud_model->getRows('general_settings',$con_address,'row');
                  
//                     $system_system_name = array(
//                         "value" => $system_name,
//                     );
                    
//                     $system_short_name = array(
//                         "value" => $short_name,
//                     );
                    
//                     $system_contact_no = array(
//                         "value" => $contact_no,
//                     );
                    
//                     $system_address = array(
//                         "value" => $address,
//                     );
//                             // Check if the user data is inserted
//                     if($this->Crud_model->update('general_settings',$system_system_name,$con_system_name) || $this->Crud_model->update('general_settings',$system_short_name,$con_short_name) || $this->Crud_model->update('general_settings',$system_contact_no,$con_contact_no) || $this->Crud_model->update('general_settings',$system_address,$con_address)){
                     
//                         $this->response([
//                            'status' => TRUE,
//                            "message" => "Successfully updated"
//                         ], REST_Controller::HTTP_OK);
//                     }
                    
//                     else{
                       
//                        $this->response([
//                             'status' => FALSE,
//                             "message" => "Failed to update information."],
//                             REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                     }
//               }
//               else{
//                   $this->response([
//                       'status' => FALSE,
//                       'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//                 }
//     }

 



// public function update_vision_mission_post() {
//             $vision = $this->security->xss_clean($this->post("institute_vision"));
//             $mission = $this->security->xss_clean($this->post("institute_mission"));
     
//        if(!empty($vision) && !empty($mission)){
//                   $con['conditions'] = array(
//                   'vision' => $vision
//               );
               
               
//            $userCount=$this->Crud_model->getRows('general_settings',$con,'result');

//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "vision" => $vision,
//                     "mission" => $mission
                 
//                    );


//                   // Check if the user data is inserted
             
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit

//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

       

//       }
//        else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }





// public function update_about_post() {
//             $about_us = $this->security->xss_clean($this->post("about_us"));
            
//             if(!empty($about_us)){
//                   $con['conditions'] = array(
//                   'type' => 'about_us'
//               );
               
        
               
//             $userCount = $this->Crud_model->getRows('general_settings',$con,'row');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "value" => $about_us,
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

        

//       }

//       else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }



// public function update_google_code_put() {
//             $google_analytics_code = $this->security->xss_clean($this->put("google_analytics_code"));
            
//               if(!empty($google_analytics_code)){
//                       $con['conditions'] = array(
//                       'google_analytics_code' => $google_analytics_code
//               );
               
      
               
//             $userCount=$this->Crud_model->getRows('general_settings',$con,'result');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "google_analytics_code" => $google_analytics_code,
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

       

//       }  else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }


// public function update_social_media_post() {
//             $facebook = $this->security->xss_clean($this->post("facebook_url"));
//             $instagram = $this->security->xss_clean($this->post("instagram_url"));
//             $twitter = $this->security->xss_clean($this->post("twitter_url"));
//             $youtube = $this->security->xss_clean($this->post("youtube_url"));
//             $linkedin = $this->security->xss_clean($this->post("linkedin_url"));

//             if(!empty($facebook) &&! empty($instagram) && !empty($twitter) && !empty($youtube) && !empty($linkedin)){
//                       $con['conditions'] = array(
//                       'type' => $facebook,
//                       'type' => $instagram,
//                       'type' => $twitter,
//                       'type' => $youtube,
//                       'type' => $linkedin
//               );

                      
//             $userCount=$this->Crud_model->getRows('general_settings',$con,'row');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "value" => $facebook,
//                     "value" => $instagram,
//                     "value" => $twitter,
//                     "value" => $youtube,
//                     "value" => $linkedin
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

       

//       }else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }


// public function update_analytics_code_post() {
//             $analytics_script = $this->security->xss_clean($this->post("google_analytics"));
              

//               if(!empty($analytics_script)){
//                       $con['conditions'] = array(
//                       'type' => 'analytics_script'
//               );
               

//             $userCount=$this->Crud_model->getRows('general_settings',$con,'result');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "value" => $analytics_script,
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

        

//       }else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }



    //  public function update_cookies_post() {
    //         $cookies = $this->security->xss_clean($this->post("cookies"));
            
    //         if(!empty($cookies)){
    //               $con['conditions'] = array(
    //               'type' => 'cookies'
    //           );
               
        
               
    //         $userCount = $this->Crud_model->getRows('general_settings',$con,'row');
    //             if($userCount){
    //               // Set the response and exit
    //                   $system_info = array(
    //                 "value" => $cookies,
                    

    //               );
    //               // Check if the user data is inserted
    //               if($this->Crud_model->update('general_settings',$system_info,$con)){
    //                   // Set the response and exit
    //                   $this->response([
    //                       'status' => TRUE,
    //                       "message" => "Successfully updated"
    //                   ], REST_Controller::HTTP_OK);
    //               }
    //               else{
    //                   // Set the response and exit
    //                   $this->response([
    //                       'status' => FALSE,
    //                       "message" => "Failed to update information."],
    //                       REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    //               }
                 
    //           }
    //           else{
    //              $this->response([
    //                   'status' => FALSE,
    //                   "message" => "Invalid records.",
    //               ], REST_Controller::HTTP_BAD_REQUEST);
    //           }

        
    //   }else{
    //       $this->response([
    //           'status' => FALSE,
    //           'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }
    
    
//     public function update_hyperlink_post() {
//             $hyperlink = $this->security->xss_clean($this->post("hyperlink"));
            
//             if(!empty($hyperlink)){
//                   $con['conditions'] = array(
//                   'type' => 'hyperlink'
//               );
               
        
               
//             $userCount = $this->Crud_model->getRows('general_settings',$con,'row');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "value" => $hyperlink,
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

        
//       }else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }
    
    
//         public function update_terms_conditions_post() {
//             $terms_conditions = $this->security->xss_clean($this->post("terms_conditions"));
            
//             if(!empty($terms_conditions)){
//                   $con['conditions'] = array(
//                   'type' => 'terms_conditions'
//               );
               
        
               
//             $userCount = $this->Crud_model->getRows('general_settings',$con,'row');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "value" => $terms_conditions,
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

        
//       }else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }
//        public function update_copyright_post() {
//             $copyright = $this->security->xss_clean($this->post("copyright"));
            
//             if(!empty($copyright)){
//                   $con['conditions'] = array(
//                   'type' => 'copyright'
//               );
               
        
               
//             $userCount = $this->Crud_model->getRows('general_settings',$con,'row');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "value" => $copyright,
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

        
//       }else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }


      

        
      

//       public function update_google_map_put() {
//             $google_map = $this->security->xss_clean($this->put("google_map"));
             
//             if(!empty($google_map)){
//                       $con['conditions'] = array(
//                       'google_map' => $google_map
//               );

//             $userCount=$this->Crud_model->getRows('general_settings',$con,'result');
//                 if($userCount){
//                   // Set the response and exit
//                       $system_info = array(
//                     "google_map" => $google_map,
                    

//                   );
//                   // Check if the user data is inserted
//                   if($this->Crud_model->update('general_settings',$system_info,$con)){
//                       // Set the response and exit
//                       $this->response([
//                           'status' => TRUE,
//                           "message" => "Successfully updated"
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to update information."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
                 
//               }
//               else{
//                  $this->response([
//                       'status' => FALSE,
//                       "message" => "Invalid records.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
//               }

//       }else{
//           $this->response([
//               'status' => FALSE,
//               'message' =>  "Incomplete Information."], REST_Controller::HTTP_BAD_REQUEST);
//         }
//     }

     

//             public function fetch_closing_fees_from_amount_get($amount) {
//                 $con=array();

//                   $userCount=$this->Crud_model->getRows('general_settings',$con,'result');
//                     $closing_fees=json_decode($userCount->closing_fees);
//                     foreach($closing_fees as $key =>$close_fees){
                        
//                         if($amount>=$close_fees->min_price && $amount<=$close_fees->max_price){
//                              $closing_amount=$close_fees->closing_fees;
                            
//                         }
//                     }
              
//               if($closing_amount){
//                   // Set the response and exit
//                     $this->response([
//                           'status' => TRUE,
//                           "message" => "General_setting load successfully.",
//                           "data" => $closing_amount
//                       ], REST_Controller::HTTP_OK);
//                   // Check if the user data is inserted
               
//               }
              
//               else{
//                 $this->response([
//                       'status' => FALSE,
//                       "message" => "General_setting does not exist.",
//                   ], REST_Controller::HTTP_BAD_REQUEST);
                
//               }
      
//     }

}