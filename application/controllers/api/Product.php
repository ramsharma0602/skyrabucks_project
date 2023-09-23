<?php

require APPPATH . 'libraries/REST_Controller.php';

class Product extends REST_Controller {

    public function __construct() {

       parent::__construct();



    }

    public function index_get(){
      if($all_product_data=$this->Crud_model->getRows('jobs')){
          // Set the response and exit
            $this->response([
                  'status' => TRUE,
                  "message" => "Products load successfully.",
                  "data" => $all_product_data
              ], REST_Controller::HTTP_OK);
          // Check if the user data is inserted
       
      }
      
      else{
        $this->response([
              'status' => FALSE,
              "message" => "Products does not exist.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
    }

    public function Add_product_post() {
          
           
             $job_name = $this->security->xss_clean($this->post("job_name"));
             $main_service_id = $this->security->xss_clean($this->post("main_service_id"));
             $sub_service_id = $this->security->xss_clean($this->post("sub_service_id"));
             $short_description = $this->security->xss_clean($this->post("short_description"));
             $price = $this->security->xss_clean($this->post("price"));
              if(empty($this->security->xss_clean($this->post("discount")))){
                   $discount= $price;
                }else{
                      $discount = $this->security->xss_clean($this->post("discount"));
                      }
          
              $con['conditions'] = array(
                  'job_name' => $job_name,
              );
              
              $userCount = $this->Crud_model->getRows('jobs',$con,'row');
              if($userCount){
                  // Set the response and exit
                  $this->response([
                      'status' => FALSE,
                      "message" => "Product already exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }
              else{
                  $product = array(
                    "job_name" => $job_name,
                
                    "main_service_id" => $main_service_id,
                  
                    "sub_service_id" =>  $sub_service_id,
                  
                    "short_description" => $short_description,
                    
                    "price" => $price,
                    
                    "discount" => $discount,
                                                  
                    );
                  // Check if the user data is inserted
                  if($this->Crud_model->insert('jobs',$product,$con)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "product Added successfully."
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to Add Product."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
              }
    }


public function update_product_post() {
           
             $job_id = $this->security->xss_clean($this->post("job_id"));

             $job_name = $this->security->xss_clean($this->post("job_name"));
 
             $main_service_id = $this->security->xss_clean($this->post("main_service_id"));

             $sub_service_id = $this->security->xss_clean($this->post("sub_service_id"));

             $short_description = $this->security->xss_clean($this->post("short_description"));
            
             $price = $this->security->xss_clean($this->post("price"));

             $discount = $this->security->xss_clean($this->post("discount"));
             
            if(empty($this->security->xss_clean($this->post("discount")))){
                   $discount= $price;
                }else{
                      $discount = $this->security->xss_clean($this->post("discount"));
                      }
 
              $con['conditions'] = array(
                  'job_id' => $job_id
              );
                
            $userCount = $this->Crud_model->getRows('jobs',$con,'row');
 

                if($userCount){
                  // Set the response and exit
                      $product_update = array(
             
                    "job_name" => $job_name,
                    "main_service_id" => $main_service_id,
                    "sub_service_id" => $sub_service_id,
                    "short_description" => $short_description,
                    "price" => $price,
                    "discount" => $discount,
                    
  
                  );
                 
                  // Check if the user data is inserted
                  if($this->Crud_model->update('jobs',$product_update,$con)){
                      // Set the response and exit
                      $this->response([
                          'status' => TRUE,
                          "message" => "Product Successfully updated"
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to update Product."],
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

// specifications fetch 
public function fetch_specification_get($job_id=''){
  
      $job_id = $this->security->xss_clean($this->get("job_id"));
   
        // checking form submittion have any error or not
        if(!empty($job_id) && is_numeric($job_id)){
                $con['conditions'] = array(
                  'job_id' => $job_id,
                  'is_deleted' => 'N',

                );
             
              if ($product=$this->Crud_model->getRows('jobs',$con,'row')) {
                # code...
            
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Specification load successfully.",
                          "data" => $product,
                      
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "Specification does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }

        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
}


public function fetch_product_single_get($job_id=''){
  
      // $job_id = $this->security->xss_clean($this->get("job_id"));
   
        // checking form submittion have any error or not
        if(!empty($job_id) && is_numeric($job_id)){
                $con['conditions'] = array(
                  'job_id' => $job_id,
                  'is_deleted' => 'N',

                );
             
              if ($product=$this->Crud_model->getRows('jobs',$con,'row')) {
                # code...
            
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "Job load successfully.",
                          "data" => $product,
                      
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "product does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }

        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
}


public function fetch_product_post(){
  
          $main_category_id = $this->security->xss_clean($this->post("main_category_id"));
          $sub_category_id = $this->security->xss_clean($this->post("sub_category_id"));
         
     
           $con['conditions'] = array(
                  'main_category_id' => $main_category_id,
                //   "product_selling_price >=" => $price_low,
                //   "product_selling_price <=" => $price_high,
                   'sub_category_id' => $sub_category_id,
                  
                    
                  );



              $data = $this->Crud_model->getRows('jobs',$con,'result');
         
              if($data){
                    $this->response([
                          'status' => TRUE,
                          "message" => "product load successfully.",
                          "data" => $data
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "product does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        // }
        // else{
        //   $this->response([
        //       'status' => FALSE,
        //       'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        // }
}

     

public function delete_product_delete($job_id=0) {

         if(!empty($job_id) ){
              $con['conditions'] = array(
                  'job_id' => $job_id,
              );

              $userCount = $this->Crud_model->getRows('jobs',$con,'row');

              if($userCount){
                 $product_update = array(
                    "is_deleted" => 'Y'
                       );
                  // Set the response and exit
                     if($this->Crud_model->delete('jobs',$con)){

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
                      "message" => "Product does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Incomplete information."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }




public function active_product_get(){

            $con['conditions'] = array(
                  'is_active' => 'Y',
                  'is_deleted' => 'N',

                );

      if($all_product_data=$this->Crud_model->getRows('product',$con,'result')){
          // Set the response and exit
            $this->response([
                  'status' => TRUE,
                  "message" => "Products load successfully.",
                  "data" => $all_product_data
              ], REST_Controller::HTTP_OK);
          // Check if the user data is inserted
       
      }
      
      else{
        $this->response([
              'status' => FALSE,
              "message" => "Products does not exist.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
    }

public function fetch_all_product_get(){
  
        
      #code...
                       $cond['conditions'] = array(
                       'is_deleted' => 'N',
                       

                       );
             
              if ($product=$this->Crud_model->getRows('jobs',$cond,'result')) {

                  foreach ($product as $key => $value) {
                    # code...
                       $con1['conditions'] = array(
                       'job_id' => $value->job_id,


                       );
                      // if($product_img= $this->Crud_model->getRows('jobs',$con1,'row')){
                      //     $product[$key]->img=$product_img->product_file_name;
                      // }
                      // else{
                      //     $product[$key]->img="default.jpg";
                      // }
                  } 
              }
              
              if($product){
                  // Set the response and exit
                    $this->response([
                          'status' => TRUE,
                          "message" => "product load successfully.",
                          "data" => $product
                      ], REST_Controller::HTTP_OK);
                  // Check if the user data is inserted
               
              }
              
              else{
                $this->response([
                      'status' => FALSE,
                      "message" => "product does not exist.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
                
              }
        
}

 public function change_is_active_post($job_id=''){

    if (!empty($job_id)) {
      # code...

     $con['conditions'] = array(
          'job_id' => $job_id,
     );

      $userCount = $this->Crud_model->getRows('jobs',$con,'row');
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

        if($this->Crud_model->update('jobs',$product_update,$con)){
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



   public function change_is_seasonal_post($job_id=''){

    if (!empty($job_id)) {
      # code...

     $con['conditions'] = array(
          'job_id' => $job_id,
     );

      $userCount = $this->Crud_model->getRows('jobs',$con,'row');
      if ($userCount->is_seasonal=='Y') {
        # code...

        $product_update = array(
           "is_seasonal" => 'N',
                   
         );
      }
      else{
        $product_update = array(
           "is_seasonal" => 'Y',
                   
         );
      }

        if($this->Crud_model->update('jobs',$product_update,$con)){
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


     public function change_is_day_to_day_post($job_id=''){

    if (!empty($job_id)) {
      # code...

     $con['conditions'] = array(
          'job_id' => $job_id,
     );

      $userCount = $this->Crud_model->getRows('jobs',$con,'row');
      if ($userCount->is_day_to_day=='Y') {
        # code...

        $product_update = array(
           "is_day_to_day" => 'N',
                   
         );
      }
      else{
        $product_update = array(
           "is_day_to_day" => 'Y',
                   
         );
      }

        if($this->Crud_model->update('jobs',$product_update,$con)){
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


    public function upload_category_image_post($value='')
   {
  
    if ($data = $this->input->post('image')) {
   
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = time() . '.png';
    file_put_contents("./uploads/job/".$imageName, $data);
    
    
    
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
                  'job_id' => $category_id
              );
  
    $category_details=$this->Crud_model->getRows('jobs',$con,'row');

      if ($category_details->job_image) {
      # code...
         unlink("./uploads/job/".$category_details->job_image);
      }
    
      $data_update = array('job_image' => $imageName );

      if ($this->Crud_model->update('jobs',$data_update,$con))
       {

             $this->response([
                          'status' => TRUE,
                          "message" => "Successfully uploaded Job Image"
                      ], REST_Controller::HTTP_OK);

      }
      else{

        $this->response([
                          'status' => FALSE,
                          "message" => "Failed to uploaded Job Image."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

      }
    
    } 
    

   }


public function delete_category_image_delete($service_id='') {
   
        if(!empty($service_id) ){

           
              $con['conditions'] = array(
                  'job_id' => $service_id,
              );

              $category_details = $this->Crud_model->getRows('jobs',$con,'row');

              if($category_details->job_image){
                  // Set the response and exit

                 $image=unlink("./uploads/job/".$category_details->job_image);
              
              }
                 if($image){
                  
                 
                    $update_data=array('job_image'=>NULL);

                     if($this->Crud_model->update('jobs',$update_data,$con)){
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



 public function increase_product_stock_post($product_id=0)
     {
       $stockincrease = $this->security->xss_clean($this->post("stockincrease"));
        if (!empty($product_id)) {
          # code...

         $con['conditions'] = array(
              'product_id' => $product_id,
         );

          $userCount = $this->Crud_model->getRows('jobs',$con,'row');
          
            # code...

            $product_update = array(
               "product_quantity" => $userCount->product_quantity + $stockincrease,
            );
            
            
             $product_stock_update = array(
               'product_id' => $product_id,
               'entry_type' =>'Increase',
               'quantity'   => $stockincrease
            );
        
     
            if($this->Crud_model->update('product',$product_update,$product_id)){
               
                $this->Product_model->update_product_stock($product_stock_update);
                   
                 
                 $this->response([
                 'status' => TRUE,
                 "message" => "Stock Increased Successfully"
                   ], REST_Controller::HTTP_OK);
                   
            }
            else{
                          // Set the response and exit
               $this->response([
               'status' => FALSE,
               "message" => "Failed to update Stock."],
                REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

        } 
       }


 public function reduct_product_stock_post($product_id='')
     {
       $stockreduce = $this->security->xss_clean($this->post("stockreduce"));
  
        if (!empty($product_id)) {
          # code...

         $con['conditions'] = array(
              'product_id' => $product_id,
         );

          $userCount = $this->Product_model->getRows($con);
          
            # code...

            $product_update = array(
               "product_quantity" => $userCount->product_quantity - $stockreduce,
                       
             );
             
             $product_stock_update = array(
               "product_id" => $product_id,
               "entry_type" =>'Reduce',
               "quantity"   => $stockreduce,
            );
     
            if($this->Product_model->update_product($product_update,$product_id)){
               // Set the response and exit
                 $this->Product_model->update_product_stock($product_stock_update);
                 $this->response([
                 'status' => TRUE,
                 "message" => "Stock Increased Successfully"
                   ], REST_Controller::HTTP_OK);
            }
            else{
                          // Set the response and exit
               $this->response([
               'status' => FALSE,
               "message" => "Failed to update Stock."],
                REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

        } 
       }

public function update_specification_post() {

         $job_id = $this->security->xss_clean($this->post("job_id"));
         $job_specification = $this->security->xss_clean($this->post("job_specification"));

        if(!empty($job_id) && is_numeric($job_id) && !empty($job_specification) ){

                
              $con['conditions'] = array(
                  'job_id' => $job_id
              );
                
            $userCount = $this->Crud_model->getRows('jobs',$con,'row');
                if($userCount){
                  // Set the response and exit
                      $job_update = array(
                    "job_specification" =>  $job_specification,
          
                  );
                  // Check if the user data is inserted
                  if($this->Crud_model->update('jobs',$job_update,$con)){
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

// public function fetch_specification_get() {
            
//       $job_id= $this->security->xss_clean($this->get("job_id"));

//        $con['conditions'] = array(
//                   'job_id' => $job_id,
//               );
              
//            if($jobs = $this->Crud_model->getRows('jobs',$con,'result')){
//                  $this->response([
//                      'status' => TRUE,
//                      "message" => "Job Specification load successfully.",
//                      "data" =>$jobs,
//                       ], REST_Controller::HTTP_OK);
//                   }
//                   else{
//                       // Set the response and exit
//                       $this->response([
//                           'status' => FALSE,
//                           "message" => "Failed to load Job Specification."],
//                           REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                   }
         

   
//     }
    
    
    public function add_feature_post($job_id='') {
            
      $feature_type= $this->security->xss_clean($this->post("feature_type"));

      $feature =$this->security->xss_clean($this->post("feature")); 

        foreach ($feature_type as $key => $value) {
                    
                     $data[] = array("feature_type"=>$feature_type[$key],"feature"=> $feature[$key]);
            }
      $updata_data = array("product_features"=>json_encode($data));
      
           if($this->Crud_model->update_product($updata_data,$job_id)){
                 $this->response([
                     'status' => TRUE,
                     "message" => "product feature Added successfully."
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to Add Product feature."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
         

   
    }
public function fetch_feature_get() {
            
      $job_id= $this->security->xss_clean($this->get("job_id"));

   $con['conditions'] = array(
                  'job_id' => $job_id,
              );
              
           if($product = $this->Crud_model->getRows($con)){
                 $this->response([
                     'status' => TRUE,
                     "message" => "product feature load successfully.",
                     "data" =>json_decode($product->product_features)
                      ], REST_Controller::HTTP_OK);
                  }
                  else{
                      // Set the response and exit
                      $this->response([
                          'status' => FALSE,
                          "message" => "Failed to load Product feature."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }
      
    }
    
    public function fetch_product_stock_get($seller_id=''){


        $product=$this->Product_model->getStockRows($con=array());
       
            if($product){
                $this->response([
                    'status' => TRUE,
                    "message" => "product stock successfully.",
                    "product_stock"=>$product
                ], REST_Controller::HTTP_OK);
                   
            }
            
            else{
                $this->response([
                'status' => FALSE,
                "message" => "product does not exist.",
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
      
}

  // public function fetch_all_info_job_get( $job_id=0){

  //   $result=array();
  //   if(!empty($job_id) && is_numeric($job_id)){
  //       $con['conditions'] = array(
  //           'job_id' => $job_id,
  //           'is_deleted' => 'N',
  //         );
  //         // $con_product_file['conditions'] = array(
  //         //   'product_id' => $product_id,
  //         // );
  //         $job_row=$this->Crud_model->getRows('jobs',$con,'row');
  //         // $result[]= array("product"=>$product_row);
  //         if(!empty($job_row)){
  //               $sub_service_array =json_decode($job_row->sub_service_id);
  //               if(!empty($sub_service_array)){
  //               //for each sub_category_id
  //               // $sizes=array();
  //               foreach($sub_service_array as $index => $value) {

  //                   $con_sub_category['conditions'] =array(
  //                       'sub_service_id' =>$value,
  //                   );
  //                   $sub_service_row=$this->Crud_model->getRows('sub_services',$con_sub_category,'row'); 
  //                 $result[]=array('jobs'=>$job_row,'sub_cate_name'=>$sub_service_row->sub_category_name);
                      
  //                 }          
  //                 if($result){
  //                   $this->response([
  //                       'status' => TRUE,
  //                       "message" => "Job description loaded successfully.",
  //                       "data" => $result
  //                   ], REST_Controller::HTTP_OK);
  //               }
  //               else{
  //                   $this->response([
  //                         'status' => FALSE,
  //                         "message" => "Job description not available.",
  //                     ], REST_Controller::HTTP_BAD_REQUEST);
                    
  //                 }

  //               }
  //               else{
  //                 //sub category does not exists
  //                 $this->response([
  //                       'status' => FALSE,
  //                       "message" => "Sub category not available.",
  //                   ], REST_Controller::HTTP_BAD_REQUEST);
                  
  //               }
  //         }
  //         else{
  //           //product not available
  //           $this->response([
  //                 'status' => FALSE,
  //                 "message" => "Job not available.",
  //             ], REST_Controller::HTTP_BAD_REQUEST);
            
  //         }

  //   }else{
  //     //product id is empty or not numeric
  //     $this->response([
  //       'status' => FALSE,
  //       "message" => "Invalid information",
  //   ], REST_Controller::HTTP_BAD_REQUEST);
  //   }
  // }
// =============================================================================================
public function fetch_all_info_job_get($job_id = 0) {
  $result = array();

  if (!empty($job_id) && is_numeric($job_id)) {
      $con['conditions'] = array(
          'job_id' => $job_id,
          'is_deleted' => 'N',
      );

      $job_row = $this->Crud_model->getRows('jobs', $con, 'row');

      if (!empty($job_row)) {
          $sub_service_id = json_decode($job_row->sub_service_id);
        
          $con_sub['conditions'] = array(
              'sub_service_id' => $sub_service_id,
          );
          
          $sub_service_array = $this->Crud_model->getRows('jobs',$con_sub,'result');
          // print_r($sub_service_array);

          if (!empty($sub_service_array)) {
              foreach ($sub_service_array as $index => $value) {
                  $result[] = array(
                      'job' => $value
                  );
              }

              if (!empty($result)) {
                  $response = array(
                      'status' => TRUE,
                      'message' => 'Job description loaded successfully.',
                      'data' => $result
                  );
              } else {
                  $response = array(
                      'status' => FALSE,
                      'message' => 'Job description not available.'
                  );
              }
          } else {
              $response = array(
                  'status' => FALSE,
                  'message' => 'Sub category not available.'
              );
          }
      } else {
          $response = array(
              'status' => FALSE,
              'message' => 'Job not available.'
          );
      }
  } else {
      $response = array(
          'status' => FALSE,
          'message' => 'Invalid information'
      );
  }

  echo json_encode($response);
}




    public function fetch_product_from_main_sub_brand_category_get(){
      
              $brand_category_id = $this->security->xss_clean($this->get("brand_category_id"));
              $main_category_id = $this->security->xss_clean($this->get("main_category_id"));
              $sub_category_id = $this->security->xss_clean($this->get("sub_category_id"));
             
               $con['conditions'] = array(
                      'main_category_id' => $main_category_id,
                      'sub_category_id' => $sub_category_id,
                      'brand_category_id' => $brand_category_id,
                      'is_active' => 'Y',
                      'is_deleted' => 'N',
                        
                      );
    
    
                  $data = $this->Product_model->getAllRows($con);
             
                  if($data){
                        $this->response([
                              'status' => TRUE,
                              "message" => "product load successfully.",
                              "data" => $data
                          ], REST_Controller::HTTP_OK);
                      // Check if the user data is inserted
                   
                  }
                  
                  else{
                    $this->response([
                          'status' => FALSE,
                          "message" => "product does not exist.",
                      ], REST_Controller::HTTP_BAD_REQUEST);
                    
                  }
      
    }
    public function fetch_main_service_get() {
            
      $con['conditions'] = array(
        'is_delete' => 'N',
    );

  $userCount = $this->Crud_model->getRows('main_service',$con,'result');



  if($userCount){
      // Set the response and exit
        $this->response([
              'status' => TRUE,
              "message" => "Main Category load successfully.",
              "data" => $userCount
          ], REST_Controller::HTTP_OK);
      // Check if the user data is inserted
   
  }
  
  else{
    $this->response([
          'status' => FALSE,
          "message" => "Main Category does not exist.",
      ], REST_Controller::HTTP_BAD_REQUEST);
    
  }
      
    }
public function search_post(){
  $value = $this->security->xss_clean($this->post("search_key"));
  $limit = $this->security->xss_clean($this->post("limit"));
  $start = $this->security->xss_clean($this->post("start"));
  $job_id = $this->security->xss_clean($this->post("job_id"));

  // print_r($value);
if(empty($value)){
  if(!empty($limit)  && is_numeric($start)){
      if(!empty($job_id)){
          $option1 = array(
            'select' => 'jobs.*',
            'table' => 'jobs',
            'limit'=> array($limit=>$start),
            'where' =>array('is_active' => 'Y','is_deleted' => 'N','job_id'=>$job_id,
          ),
          );
      }else{
        $option1 = array(
          'select' => 'jobs.*',
          'table' => 'jobs',
          'limit'=> array($limit=>$start),
          'where' =>array('is_active' => 'Y','is_deleted' => 'N'),
        );
      }
    }
  else{
    $option1 = array(
      'select' => 'jobs.*',
      'table' => 'jobs',
      'where' =>array('is_active' => 'Y','is_deleted' => 'N'),
    );
  }
}else{
  if(!empty($limit)  && is_numeric($start)){
      if(!empty($job_id)){
          $option1 = array(
            'select' => 'jobs.*',
            'table' => 'jobs',
            'limit'=> array($limit=>$start),
            'like' => array('job_name' => $value),
            'or_like' => array('price' => $value,'short_description'=> $value),
            'where' =>array('is_active' => 'Y','is_deleted' => 'N','job_id'=>$job_id,
          ),
          );
     }else{
        $option1 = array(
          'select' => 'jobs.*',
          'table' => 'jobs',
          'limit'=> array($limit=>$start),
          'like' => array('job_name' => $value),
          'or_like' => array('price' => $value,'short_description'=> $value),
          'where' =>array('is_active' => 'Y','is_deleted' => 'N',
          ),
        );
      }
 
  }
  else{
    $option1 = array(
      'select' => 'jobs.*',
      'table' => 'jobs',
      'like' => array('job_name' => $value),
      'or_like' => array('price' => $value,'short_description'=> $value),
      'where' =>array('is_active' => 'Y','is_deleted' => 'N'),
    );
  }
}
  $this->response([
            'status' => FALSE,
            "message" => "Error data not."],
            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

 $product_data=$this->Crud_model->commonGet($option1);
 
        if($product_data){
             foreach ($product_data as $key => $value) {
              # code...
                 $con1['conditions'] = array(
                 'job_id' => $value->job_id,

                 );
                if($job_image= $this->Crud_model->getRows('jobs',$con1,'result')){
                    
                      $job_image=array();
                      
                      foreach($job_image as $job_image_row => $job_image_val){
                        
                           $job_image[$job_image_row] = $job_image_val->job_name;
                          
                      }
                  
                    $product_data[$key]->img=$job_image;
                }
                else{
                   $product_data[$key]->img=array("default.jpg");
                    //  $product_data[$key]->img= NULL;
                    //  $product_data[$key]= NULL;
                }
                
                // $product_data[$key]->url= rawurlencode($value->product_name);
                // $product_data[$key]->manufacturer_url= rawurlencode($value->manufacturer);
                
                
            } 
            $data=$product_data;
                      
          }
          else{
            $data=NULL;
          }
          
          if($data){
            $this->response([
            "status" => TRUE,
            "message" => "successfully search.",
            "data"=>$data
            ], REST_Controller::HTTP_OK);
          }
          else{
            $this->response([
            'status' => FALSE,
            "message" => "Error in search."],
            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          } 

      
}


public function search_price_post($limit='',$start='')
{
  # code...
  $limit = $this->security->xss_clean($this->post("limit"));
  $start = $this->security->xss_clean($this->post("start"));
      
      if(!empty($start) && !empty($limit)){
        $option1 = array(
          'select' => 'jobs.*',
          'table' => 'jobs',
          // 'limit'=> array($limit=>$start),
          'where' => array('jobs.is_active' => 'Y','jobs.is_deleted' => 'N','jobs.discount >=' => $start,'jobs.discount <=' => $limit),
          );   
          }
          else{ 
            $option1 = array();
            // 'product.schedule' => 'OTC',
            }
      
             $this->response([
                       'status' => FALSE,
                       "message" => "Error data not."],
                       REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

     $product_data=$this->Crud_model->commonGet($option1);
     
            if($product_data){
                 foreach ($product_data as $key => $value) {
                  # code...
                     $con1['conditions'] = array(
                     'job_id' => $value->job_id,

                     );
                    if($job_image= $this->Crud_model->getRows('jobs',$con1,'result')){
                        
                          $job_image=array();
                          
                          foreach($job_image as $job_image_row => $job_image_val){
                            
                               $job_image[$job_image_row] = $job_image_val->job_name;
                              
                          }
                      
                        $product_data[$key]->img=$job_image;
                    }
                    else{
                       $product_data[$key]->img=array("default.jpg");
                        //  $product_data[$key]->img= NULL;
                    }
                    
                    // $product_data[$key]->url= rawurlencode($value->product_name);
                    // $product_data[$key]->manufacturer_url= rawurlencode($value->manufacturer);
                    
                    
                } 
                
                $data=$product_data;
                          
              }
              else{
                $data=NULL;
              }
              
              if($data){
                $this->response([
                "status" => TRUE,
                "message" => "successfully search.",
                "data"=>$data
                ], REST_Controller::HTTP_OK);
              }
              else{
                $this->response([
                'status' => FALSE,
                "message" => "No Product Found."],
                REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              } 
    
          
}
   
}