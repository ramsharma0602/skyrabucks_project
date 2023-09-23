<?php

require APPPATH . 'libraries/REST_Controller.php';

class Cart extends REST_Controller {

    public function __construct() {

       parent::__construct();

       $this->load->database();
       $this->load->library('cart');

    }

    public function fetch_Cart_get() {
    
   
  //$category_id = $this->security->xss_clean($this->get("id"));
   
// checking form submission have any error or not

    if($this->cart->contents()){
        $grand_total=0;
        // $total_shipping =0;

     foreach ($this->cart->contents() as $key => $value) {
        # code...
        // print_r($value);
        $grand_total += $value['subtotal'] ;
           $conet['conditions'] = array(
                  'job_id' =>$value['id']
                  );
            $flag=FALSE;
            $product_p = $this->Crud_model->getRows('jobs',$conet,'row');
            if($product_p){
              if($product_p->price == $value['price'] && !empty($value['image']) )
               {
                // print_r($value['job_image']);
              $arrayName[] = array('id' =>$value['id'] ,'price'=>$value['price'],'discount'=>$value['price'] ,'name' => $value['name'],'job_image'=>$value['image'] ,'rowid'=>$value['rowid'] ,'price'=>$value['discount'] ,'qty'=>$value['qty'] , 'subtotal'=>$value['subtotal'] ,'shipping_charges' =>$product_p->shipping_charges );

             }
               else{
                   $flag=TRUE;
                   $arrayName[] = array('id' =>$value['id'] ,'price'=>$product_p->price ,'name' => $value['name'],'job_image'=>"" ,'rowid'=>$value['rowid'],'discount'=>$product_p->discount,'subtotal'=>$value['subtotal'],'shipping_charges' =>$product_p->shipping_charges);
               }
              
            }
                // print_r(serialize($this->cart->contents()));
                if($flag){
                    $this->cart->update($arrayName);
                    if($this->session->userdata('active_customer')){
                      $id =$this->session->userdata('active_customer')->customer_id;
                        $customer['conditions'] = array(
                          'customer_id' => $id,
                          );

                          $data =array(
                            "cart_details" => serialize($this->cart->contents())
                          );
                          
                      $this->Crud_model->update('customer',$data,$customer); 
                    }
                }
     
      }


      // if($this->session->has_userdata('active_customer')){
      //   $arrayName[] = array("grand_total" => $grand_total,"total_shipping" => $total_shipping );
      // }else{
      //   $arrayName[] = array("grand_total" => $grand_total,"total_shipping" => $total_shipping );
      // }      
    }
     if($this->cart->contents()){
      
          // Set the response and exit
            $this->response([
                  'status' => TRUE,
                  "message" => "cart load successfully.",
                  "data" => $arrayName,
              ], REST_Controller::HTTP_OK);
          // Check if the user data is inserted
    }

      else{
        $this->response([
              'status' => FALSE,
              "message" => "cart does not exist.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
       
    }


public function qty_plus_post() {
  $job_id = $this->security->xss_clean($this->post("job_id"));
  // $size_array =$this->security->xss_clean($this->post("size_id"));    
  $qty =$this->security->xss_clean($this->post("qty"));
  $minmum_quantity=PHP_INT_MAX;

  if(!empty($job_id) && !empty($size_array) && !empty($qty) ){
    foreach($size_array as $index => $value){
      $con['conditions'] = array(
        // 'size_id' => $value['size_id'],
    );
     
      
      $con_quantity['conditions'] = array(
        // 'size_id' => $value['size_id'],
        'job_id' => $job_id,
    );
      $quantity_row =$this->Crud_model->getRows('jobs',$con_quantity,'row');
      $minmum_quantity =min($minmum_quantity,$quantity_row->quantity);
    }
    //now to check if demanded quantity is available or not 
    if($qty<=$minmum_quantity){
      $this->response([
        'status' => TRUE,
        "message" => "Quantity Available.",
    ], REST_Controller::HTTP_OK);

      }
        else{
          //quantity not available
          $this->response([
            'status' => FALSE,
            "message" => "Quantity not available"],
            REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

  }else{
    $this->response([
      'status' => FALSE,
      "message" => "Please select sizes"],
      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

  }

}

   public function qty_minus_post() {
    
  $rowid = $this->security->xss_clean($this->post("rowid"));

   
    if(!empty($rowid)){

      

     $cart_dat= $this->cart->get_item($rowid);

        $con['conditions'] = array(
                  'job_id' => $cart_dat['id'],
              );

          $product_data = $this->Crud_model->getRows($con);


          if ($product_data->product_quantity >= $cart_dat['qty']) {
            # code...
          $data = array(
          'rowid' => $rowid,
          
          );

        if ($this->cart->update($data)) {
          # code...

                $this->response([
                  'status' => TRUE,
                  "message" => "Quantity Plus successfully."
              ], REST_Controller::HTTP_OK);

                  //  $this->Crud_model->update(array("cart_details" => serialize($this->cart->contents())),$this->session->userdata('active_customer'));

        }
         else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Quantity not update."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
      else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Job quantity ended."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Invalid information."], REST_Controller::HTTP_BAD_REQUEST);
        } 
    }

public function remove_product_from_cart_post($rowid="")
{
  
  $rowid = $this->security->xss_clean($this->post("rowid"));
  # code...
    if (!empty($rowid)) {
            # code...
            if($this->cart->remove($rowid)){
                // Set the response and exit
                $this->response([
                'status' => TRUE,
                "message" => "Job remove successfully."
                ], REST_Controller::HTTP_OK);
              // Check if the user data is inserted
            
            if( $this->session->userdata("active_customer")){
              //if user is active 
              if ($this->cart->contents()){
                $data =array(
                  "cart_details" => serialize($this->cart->contents())
                );

                $id =$this->session->userdata('active_customer')->customer_id;
                
                $customer['conditions'] = array(
                    'customer_id' => $id,
                    );
                
                    $this->Crud_model->update('customer',$data,$customer);
                 
                //  $this->Crud_model->update(array("cart_details" => serialize($this->cart->contents())),$this->session->userdata('active_customer'));
              }
              else{
                $data = array(
                  "cart_details" => NULL
                );
                $id =$this->session->userdata('active_customer')->customer_id;
                          $customer['conditions'] = array(
                            'customer_id' => $id,
                          );
                $this->Crud_model->update('customer',$data,$customer);
                // $this->Crud_model->update(array("cart_details" => NULL),$this->session->userdata('active_customer'));
             }
            }
      }
      
      else{
        $this->response([
              'status' => FALSE,
              "message" => "Job not remove.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
    }
     else{
        $this->response([
              'status' => FALSE,
              "message" => "rowid not found job.",
          ], REST_Controller::HTTP_BAD_REQUEST);
        
      }
}


 public function add_product_cart_post() {
        $job_id = $this->security->xss_clean($this->post("id"));
        $qty =$this->security->xss_clean($this->post("qty"));

        if(!empty($job_id) && is_numeric($job_id) ){    
              $con['conditions'] = array(
                  'job_id' => $job_id
              );
                
            $job_row = $this->Crud_model->getRows('jobs',$con,'row');
                $flag=FALSE;
                $rowid=null;
                  if ($dataTmp = $this->cart->contents()) {
                    # code...
                     foreach ($dataTmp as $item) {
                            if ($item['id'] == $job_row->job_id) {
                              $flag=TRUE;
                              $rowid = $item['rowid'];
                            }

                        }
                  }
                if ($flag && $rowid) {
                  //product is inside the cart
                  $update_data = array(
                    'rowid' => $rowid,
                    'qty' =>$qty
                    
                  );

                  //update cart
                if($this->cart->update($update_data)){
                      $this->response([
                        'status' => TRUE,
                        "message" => "Product Successfully updated into cart"
                        ], REST_Controller::HTTP_OK);   

                      //updating customer if customer exists
                      if($this->session->userdata('active_customer')){
                        $id =$this->session->userdata('active_customer')->customer_id;
                          $customer['conditions'] = array(
                            'customer_id' => $id,
                            );

                        $data =array(
                          "cart_details" => serialize($this->cart->contents())
                        );
                        // print_r($data);
                        // print_r(unserialize($data));
                        // exit();
                        $this->Crud_model->update('customer',$data,$customer); 
                      }
                  
                    }

                }
                else{
                    // print_r($job_row);
                     if($job_row){
                   
                    $data = array(
                      'id'      => $job_row->job_id,
                      'qty'     => $qty,
                      'price'   => $job_row->price,
                      'name'    => $job_row->job_name,
                      'image'  => $job_row->job_image,
                      'discount'=> $job_row->discount,
                      'shipping_charges'=> $job_row->shipping_charges
              );

                  $this->cart->job_name_rules = '[:print:]';
                    if($this->cart->insert($data)){
                    // Set the response and exit
                      $this->response([
                      'status' => TRUE,
                      "message" => "Job Successfully added into cart",
                      "data" => $this->cart->contents()
                      ], REST_Controller::HTTP_OK);
                       
                     
                      if($this->session->userdata('active_customer')){
                        $id =$this->session->userdata('active_customer')->customer_id;
                        $customer['conditions'] = array(
                          'customer_id' => $id,
                      );

                        $data =array(
                          "cart_details" => serialize($this->cart->contents())
                        );
                        // print_r($data);

                        $this->Crud_model->update('customer',$data,$customer); 
                      }
                    }
                    else{
                    // Set the response and exit
                      $this->response([
                      'status' => FALSE,
                      "message" => "Job cart Insert error"],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }
                    

                  // Check if the user data is inserted
      
              }
              else{
                 $this->response([
                      'status' => FALSE,
                      "message" => "Invalid records.",
                  ], REST_Controller::HTTP_BAD_REQUEST);
              }

                }

        }
        else{
          $this->response([
              'status' => FALSE,
              'message' =>  "Invalid information."], REST_Controller::HTTP_BAD_REQUEST);
        }

      }


}


?>