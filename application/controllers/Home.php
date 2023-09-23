<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
		public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('active_customer')) {
			# code...
			// redirect(base_url('customer_login'));
			
		}
		$this->load->helper('url');
		$this->load->database();
		
	} 

	public function log_out()
	{
		$this->session->unset_userdata('active_customer');
		redirect('home/login1');
	}

	public function index()
	{	

		$shop_con['conditions'] = array(
			'is_active'=>'Y',
			'is_delete'=>'N',
		);

		$shop_product_load=$this->Crud_model->getRows('main_service',$shop_con,'result');
		$arr = array();

		foreach ($shop_product_load as $key => $value){
			$main_service_id = $value->main_service_id;
			$job_con['conditions'] = array(
				'main_service_id'=> $value->main_service_id,
			);
			$data=$this->Crud_model->getRows('jobs',$job_con,'result');
		    // $data["main_service_name"] = $value->main_service_name;
		    $arr[$value->main_service_name]=$data;


		}

		$jobs_condition['conditions'] = array(
			'is_active'=>'Y',
			'is_deleted'=>'N',
			'job_image!='=>'NULL',
		);
		$job_load_home = $this->Crud_model->getRows('jobs',$jobs_condition,'result');


		$seasonal_condition['conditions'] = array(
			'is_active'=>'Y',
			'is_deleted'=>'N',
			'is_seasonal'=>'Y',
			'job_image!='=>'NULL',
		);
		$seasonal_load_home = $this->Crud_model->getRows('jobs',$seasonal_condition,'result');

		$day_to_day_condition['conditions'] = array(
			'is_active'=>'Y',
			'is_deleted'=>'N',
			'is_day_to_day'=>'Y',
			'job_image!='=>'NULL',
		);
		$day_to_day_load_home = $this->Crud_model->getRows('jobs',$day_to_day_condition,'result');

		$on_demand_condition['conditions'] = array(
			'is_active'=>'Y',
			'is_deleted'=>'N',
			'no_of_tym_order>='=>'5',
			'job_image!='=>'NULL',
		);
		$on_demand_load_home = $this->Crud_model->getRows('jobs',$on_demand_condition,'result');
		
		// $cond['conditions'] = array(
		// 	'is_active' => 'Y',
		// 	'is_delete'=> 'N',
			
		// );
		// $headerload=$this->Crud_model->getRows('main_service',$cond,'result');
	
		
		$cond1['conditions'] = array(
			'brand_image !='=> NULL, 			
		);
		$cond2['conditions'] = array(
			'city !='=> NULL, 			
		);
		$cond3['conditions'] = array(
			'job_name !='=> NULL, 			
		);



		
		$option = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>5,
			'order'=>array('jobs.no_of_tym_order' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
	
			);
			$productload=$this->Crud_model->commonGet($option);
			if($productload){
				foreach ($productload as $key => $value) {
				 # code...
					$con1['conditions'] = array(
					'job_id' => $value->job_id,

					);
				   if($product_img= $this->Crud_model->getRows('jobs',$con1,'result')){
					   
						 $product_images=array();
						 
						 foreach($product_img as $product_images_row => $product_images_val){
						   
							  $product_images[$product_images_row] = $product_images_val->job_image;
							 
						 }
					 
					   $productload[$key]->img=$product_images;
				   }
				   else{
					  $productload[$key]->img=array("default.jpg");
				   }
			   } 
			   
			   $data=$productload;
						 
			 }
			 else{
			   $data=NULL;
			 }


		$option1 = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>16,
			'order'=>array('jobs.job_id' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
			);
			$productallload=$this->Crud_model->commonGet($option1);
			if($productallload){
				foreach ($productallload as $key => $value) {
				 # code...
					$con1['conditions'] = array(
					'job_id' => $value->job_id,

					);
				   if($product_img= $this->Crud_model->getRows('jobs',$con1,'result')){
					   
						 $product_images=array();
						 
						 foreach($product_img as $product_images_row => $product_images_val){
						   
							  $product_images[$product_images_row] = $product_images_val->job_image;
							 
						 }
					 
					   $productallload[$key]->img=$product_images;
				   }
				   else{
					  $productallload[$key]->img=array("default.jpg");
				   }  
			   } 
			   
			   $data=$productallload;
						 
			 }
			 else{
			   $data=NULL;
			 }
			
			 $cond['conditions'] = array();

		$banner=$this->Crud_model->getRows('banner',$cond,'result');
		// $brandload=$this->Crud_model->getRows('brand',$cond1,'result');
		 $cityload=$this->Crud_model->getRows('cities',$cond2,'result');
		$this->load->view('skyrabucks_frontend/index-5',['cityload'=>$cityload,'job_load_home'=>$job_load_home,'banner'=> $banner,'jobs'=>$productload,'arr'=>$arr,'productall'=>$productallload,'seasonal_load_home'=>$seasonal_load_home,'day_to_day_load_home'=>$day_to_day_load_home,'on_demand_load_home'=>$on_demand_load_home,'shop_product_load'=>$shop_product_load]);
	}
	

	public function login()
	{
		$this->load->view('home_layout/authentication/login');
	}
	
	public function about_us()
	{
		$this->load->view('skyrabucks_frontend/about_us');
	}
	public function sign_up()
	{
		$this->load->view('skyrabucks_frontend/sign_up');
	}
    // public function wishlist()
	// {
	// 	$cond4['conditions'] = array(
	// 		'city !='=> NULL, 			
	// 	);
	// 	$cityload=$this->Crud_model->getRows('cities',$cond4,'result');
	// 	$this->load->view('skyrabucks_frontend/wishlist',['cityload'=>$cityload]);
	// }
	public function contact_us()
	{
		$this->load->view('skyrabucks_frontend/contact_us');
	}
	public function order_success()
	{
		$cond4['conditions'] = array(
			'city !='=> NULL, 			
		);
		$cityload=$this->Crud_model->getRows('cities',$cond4,'result');
		$this->load->view('skyrabucks_frontend/order_success',['cityload'=>$cityload]);
		
	}
	public function order_tracking()
	{
		$cond4['conditions'] = array(
			'city !='=> NULL, 			
		);
		$cityload=$this->Crud_model->getRows('cities',$cond4,'result');
		$this->load->view('skyrabucks_frontend/order_tracking',['cityload'=>$cityload]);
	}
	public function faq()
	{
		$this->load->view('skyrabucks_frontend/faq');
	}
	public function forgot()
	{
		$this->load->view('skyrabucks_frontend/forgot');
	}
	
	public function cart()
	{
		$cond4['conditions'] = array(
			'city !='=> NULL, 			
		);
		$cityload=$this->Crud_model->getRows('cities',$cond4,'result');


		$this->load->view('skyrabucks_frontend/cart',['cityload'=>$cityload]);

		// $this->load->view('skyrabucks_frontend/cart');

	}
	public function checkout()
	{
		$cond9['conditions'] = array(
			'city !='=> NULL, 			
		);
		$cityload=$this->Crud_model->getRows('cities',$cond9,'result');

		if(!$this->session->userdata('active_customer'))
		{
			# code...
			redirect(base_url('Home/login1'));	
		}
		else{
			$this->load->view('skyrabucks_frontend/checkout',['cityload'=>$cityload]);	
		}
		
	
	}
	public function comming_soon()
	{
		$this->load->view('skyrabucks_frontend/comming_soon');
	}
	public function login1()
	{
		if($this->session->userdata('active_customer'))
		{
			redirect(base_url('Home/user_dashboard'));
		}
		else{
			$this->load->view('skyrabucks_frontend/login1');	
		}
		
	}

	public function search($job_id="",$job_name="")
	{
		$cond5['conditions'] = array(
			'city !='=> NULL, 			
		);
		$cityload=$this->Crud_model->getRows('cities',$cond5,'result');
		$this->load->view('skyrabucks_frontend/search',['cityload'=>$cityload]);
		//creating product file 
		$job_name = urldecode($job_name);
		$job_file_con['conditions'] = array(
			'job_id' => $job_id,
		);
		$job_id_con['conditions'] = array(
			'job_id' => $job_id,
		);

		$sub_service_fetch = $this->Crud_model->getRows('jobs',$job_id_con,'row');
		$sub_service = $sub_service_fetch->sub_service_id;
		$job_gallery = $this->Crud_model->getRows('jobs',$job_file_con,'result');
		$cond['conditions'] = array(
			'is_deleted' => 'Y',
			);
		
		$option = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>9,
			'order'=>array('jobs.number_of_view' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
			);

			$jobload=$this->Crud_model->commonGet($option);
		

		
		$condition1 = array(
		'select' => 'jobs.*',
		'table' => 'jobs',
		'like' => array('jobs.job_name' => $job_name),
		// 'or_like' => array('jobs.sort_description' => $job_name),
		'limit'=>9,
		'order'=>array('jobs.number_of_view' => 'asec'),
		'where'=>array('jobs.is_active' => 'Y','is_deleted'=>'N','sub_service_id'=>$sub_service),
		);
			$newsload=$this->Crud_model->commonGet($condition1);
			// if($relatedload){
			// 	foreach ($relatedload as $key => $value) {
			// 		# code...
			// 		$con1['conditions'] = array(
			// 		'job_id' => $value->job_id,

			// 		);
			// 		if($job_img= $this->Crud_model->getRows('jobs',$con1,'result')){
						
			// 				$job_images=array();
							
			// 				foreach($job_img as $job_images_row => $job_images_val){
							
			// 					$job_images[$job_images_row] = $job_images_val->job_image;
								
			// 				}
						
			// 			$relatedload[$key]->img=$job_images;
			// 		}
			// 		else{
			// 			$relatedload[$key]->img=array("default.jpg");
			// 		}
			// 	} 
			// 	$data=$relatedload;
							
			// 	}
			// 	else{
			// 	$data=NULL;
			// 	}
		
		$this->load->view('skyrabucks_frontend/search',['newsload'=>$newsload,'job_id'=>$job_id,'job_gallery'=>$job_gallery]);
	}
	public function otp($mobile_no='')
	{
		$this->load->view('skyrabucks_frontend/otp',['mobile_no'=>$mobile_no]);
	}
	// public function compare()
	// {
	// 	$this->load->view('skyrabucks_frontend/compare');
	// }
	public function user_dashboard()
	{
		// $id = $this->session->userdata('active_customer');
		// $customer_condition['conditions'] = array(
		// 	'is_active'=>'Y',
		// 	'is_deleted'=>'N',
		// 	'customer_id' => $id
		// );
		// $customer_load_home = $this->Crud_model->getRows('customer',$customer_condition,'row');

		if(!$this->session->userdata('active_customer'))
		{
			# code...
			redirect(base_url('Home/login1'));	
		}
		else{
			$cond6['conditions'] = array(
				'city !='=> NULL, 			
			);
			$cityload=$this->Crud_model->getRows('cities',$cond6,'result');
			$this->load->view('skyrabucks_frontend/user_dashboard',['cityload'=>$cityload]);
		}
	}
	public function blog_detail()
	{
		$cond6['conditions'] = array(
			'city !='=> NULL, 			
		);
		$cityload=$this->Crud_model->getRows('cities',$cond6,'result');
		$this->load->view('skyrabucks_frontend/blog_detail',['cityload'=>$cityload]);
	}
	public function blog_grid()
	{
		$this->load->view('skyrabucks_frontend/blog_grid');
	}
	public function product_4_image()
	{
		$this->load->view('skyrabucks_frontend/product_4_image');
	}
	public function shop_category_slider()
	{
		$shop_con['conditions'] = array(
			'is_active'=>'Y',
			'is_delete'=>'N',
		);
		$shop_product_load=$this->Crud_model->getRows('main_service',$shop_con,'result');
		$this->load->view('skyrabucks_frontend/shop-category-slider',['shop_product_load'=>$shop_product_load]);
	}
	public function service_provider_dashboard()
	{
		$this->load->view('skyrabucks_frontend/service_provider_dashboard');
	}
	public function service_provider_become()
	{
		$this->load->view('skyrabucks_frontend/service_provider_become');
	}
	public function service_provider_detail()
	{
		$this->load->view('skyrabucks_frontend/service_provider_detail');
	}
	public function service_provider_detail_2()
	{
		$this->load->view('skyrabucks_frontend/service_provider_detail_2');
	}
	public function service_provider_grid()
	{
		$this->load->view('skyrabucks_frontend/service_provider_grid');
	}
	public function service_provider_grid_2()
	{
		$this->load->view('skyrabucks_frontend/service_provider_grid_2');
	}
	public function product_list()
	{
		
		$shop_con1['conditions'] = array(
			'is_active'=>'N',
			'is_deleted'=>'N',
		);

		$shop_job_load=$this->Crud_model->getRows('jobs',$shop_con1,'result');
		$arr = array();

		if(!empty($shop_job_load)){
		foreach ($shop_job_load as $key => $value){
			$job_id = $value->job_id;
			$job_con['conditions'] = array(
				'job_id'=> $value->job_id,
			);
			$data=$this->Crud_model->getRows('jobs',$job_con,'result');
		    // $data["sub_service_name"] = $value->sub_service_name;
		    $arr[$value->job_name]=$data;


			}
		}	

		$jobs_condition['conditions'] = array(
			'is_active'=>'Y',
			'is_deleted'=>'N',
			'job_image!='=>'NULL',
		);
		$job_load_home = $this->Crud_model->getRows('jobs',$jobs_condition,'result');


		$seasonal_condition['conditions'] = array(
			'is_active'=>'Y',
			'is_deleted'=>'N',
			'is_seasonal'=>'Y',
			'job_image!='=>'NULL',
		);
		$seasonal_load_home = $this->Crud_model->getRows('jobs',$seasonal_condition,'result');

		$cond2['conditions'] = array(
			'city !='=> NULL, 			
		);
		
		$option = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>5,
			'order'=>array('jobs.no_of_tym_order' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
	
			);
			$productload=$this->Crud_model->commonGet($option);
			if($productload){
				foreach ($productload as $key => $value) {
				 # code...
					$con1['conditions'] = array(
					'job_id' => $value->job_id,

					);
				   if($product_img= $this->Crud_model->getRows('jobs',$con1,'result')){
					   
						 $product_images=array();
						 
						 foreach($product_img as $product_images_row => $product_images_val){
						   
							  $product_images[$product_images_row] = $product_images_val->job_image;
							 
						 }
					 
					   $productload[$key]->img=$product_images;
				   }
				   else{
					  $productload[$key]->img=array("default.jpg");
				   }
			   } 
			   
			   $data=$productload;
						 
			 }
			 else{
			   $data=NULL;
			 }


		$option1 = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>16,
			'order'=>array('jobs.job_id' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
			);
			$productallload=$this->Crud_model->commonGet($option1);
			if($productallload){
				foreach ($productallload as $key => $value) {
				 # code...
					$con1['conditions'] = array(
					'job_id' => $value->job_id,

					);
				   if($product_img= $this->Crud_model->getRows('jobs',$con1,'result')){
					   
						 $product_images=array();
						 
						 foreach($product_img as $product_images_row => $product_images_val){
						   
							  $product_images[$product_images_row] = $product_images_val->job_image;
							 
						 }
					 
					   $productallload[$key]->img=$product_images;
				   }
				   else{
					  $productallload[$key]->img=array("default.jpg");
				   }  
			   } 
			   
			   $data=$productallload;
						 
			 }
			 else{
			   $data=NULL;
			 }
			
			 $cond['conditions'] = array();

		$banner=$this->Crud_model->getRows('banner',$cond,'result');
		$cityload=$this->Crud_model->getRows('cities',$cond2,'result');
		$this->load->view('skyrabucks_frontend/product_list',['cityload'=>$cityload,'job_load_home'=>$job_load_home,'banner'=> $banner,'jobs'=>$productload,'arr'=>$arr,'productall'=>$productallload,'seasonal_load_home'=>$seasonal_load_home,'shop_job_load'=>$shop_job_load]);
	
	}
		
	public function product_detail($job_id="",$job_name="")
	{	
		$on_demand_condition['conditions'] = array(
			'is_active'=>'Y',
			'is_deleted'=>'N',
			'no_of_tym_order>='=>'5',
			'job_image!='=>'NULL',
		);
		$on_demand_load_home = $this->Crud_model->getRows('jobs',$on_demand_condition,'result');


		$cond8['conditions'] = array(
			'city !='=> NULL, 			
		);
		//creating product file 
		$job_name = urldecode($job_name);
		$job_file_con['conditions'] = array(
			'job_id' => $job_id,
		);
		$job_id_con['conditions'] = array(
			'job_id' => $job_id,
		);

		$sub_service_fetch = $this->Crud_model->getRows('jobs',$job_id_con,'row');
		$newload="";
		if($sub_service_fetch){
		$sub_service = $sub_service_fetch->sub_service_id;
		$job_gallery = $this->Crud_model->getRows('jobs',$job_file_con,'result');
		$cond['conditions'] = array(
			'is_deleted' => 'Y',
			);
		
		$option = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>9,
			'order'=>array('jobs.number_of_view' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
			);

			$jobload=$this->Crud_model->commonGet($option);
		

		
		$condition1 = array(
		'select' => 'jobs.*',
		'table' => 'jobs',
		'like' => array('jobs.job_name' => $job_name),
		// 'or_like' => array('jobs.short_description' => $job_name),
		'limit'=>9,
		'order'=>array('jobs.number_of_view' => 'asec'),
		'where'=>array('jobs.is_active' => 'Y','is_deleted'=>'N','sub_service_id'=>$sub_service, 'job_id!='=>$job_id),
		);
			$newload=$this->Crud_model->commonGet($condition1);
		}
			// if($relatedload){
			// 	foreach ($relatedload as $key => $value) {
			// 		# code...
			// 		$con1['conditions'] = array(
			// 		'job_id' => $value->job_id,

			// 		);
			// 		if($job_img= $this->Crud_model->getRows('jobs',$con1,'result')){
						
			// 				$job_images=array();
							
			// 				foreach($job_img as $job_images_row => $job_images_val){
							
			// 					$job_images[$job_images_row] = $job_images_val->job_image;
								
			// 				}
						
			// 			$relatedload[$key]->img=$job_images;
			// 		}
			// 		else{
			// 			$relatedload[$key]->img=array("default.jpg");
			// 		}
			// 	} 
			// 	$data=$relatedload;
							
			// 	}
			// 	else{
			// 	$data=NULL;
			// 	}
			$option = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>5,
			'order'=>array('jobs.no_of_tym_order' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
	
			);
			$productload=$this->Crud_model->commonGet($option);
			if($productload){
				foreach ($productload as $key => $value) {
				 # code...
					$con1['conditions'] = array(
					'job_id' => $value->job_id,

					);
				   if($job_image= $this->Crud_model->getRows('jobs',$con1,'result')){
					   
						 $job_image=array();
						 
						 foreach($job_image as $job_image_row => $job_image_val){
						   
							  $job_image[$job_image_row] = $job_image_val->job_image;
							 
						 }
					 
					   $productload[$key]->img=$job_image;
				   }
				   else{
					  $productload[$key]->img=array("default.jpg");
				   }
			   } 
			   
			   $data1=$productload;
						 
			 }
			 else{
			   $data1=NULL;
			 }


		$option1 = array(
			'select' => 'jobs.*',
			'table' => 'jobs',
			'limit'=>16,
			'order'=>array('jobs.job_id' => 'desc'),
			'where'=>array('is_deleted'=>'N'),
			);
			$productallload=$this->Crud_model->commonGet($option1);
			if($productallload){
				foreach ($productallload as $key => $value) {
				 # code...
					$con1['conditions'] = array(
					'job_id' => $value->job_id,

					);
				   if($job_image= $this->Crud_model->getRows('jobs',$con1,'result')){
					   
						 $job_image=array();
						 
						 foreach($job_image as $job_image_row => $job_images_val){
						   
							  $job_image[$job_image_row] = $job_images_val->job_image;
							 
						 }
					 
					   $productallload[$key]->img=$job_image;
				   }
				   else{
					  $productallload[$key]->img=array("default.jpg");
				   }  
			   } 
			   
			   $data1=$productallload;
						 
			 }
			 else{
			   $data1=NULL;
			 }
			$cityload=$this->Crud_model->getRows('cities',$cond8,'result');
		$this->load->view('skyrabucks_frontend/product_detail',['cityload'=>$cityload,'newload'=>$newload,'job_id'=>$job_id,'job_gallery'=>$job_gallery,'on_demand_load_home'=>$on_demand_load_home]);
	}
	

	public function product_right_thumbnail()
	{
		$this->load->view('skyrabucks_frontend/product_right_thumbnail');
	}
	public function product_bottom_thumbnail()
	{
		$this->load->view('skyrabucks_frontend/product_bottom_thumbnail');
	}
	public function product_bundle()
	{
		$this->load->view('skyrabucks_frontend/product_bundle');
	}
	public function product_left()
	{
		$this->load->view('skyrabucks_frontend/product_left');	
	}
	public function privacy_policy()
	{
		$this->load->view('skyrabucks_frontend/privacy_policy');	
	}
	public function term_condition()
	{
		$this->load->view('skyrabucks_frontend/term_condition');	
	}
	public function index_5($value='',$main_service_id='')
	{	
		
		$con_general['conditions']=array(
			'general_settings_id'=>41,
		);
		$theme_row=$this->Crud_model->getRows('general_settings',$con_general,'result');
		$theme=$theme_row->value;
		// print_r($theme);
		$this->load->view('skyrabucks_frontend/index-5',['search_key'=>rawurldecode($value),'main_service_id'=>$main_service_id,'theme1'=>$theme]);
	}
	public function newpassword($mobile_no='')
	{
		$this->load->view('skyrabucks_frontend/newpassword',['mobile_no'=>$mobile_no]);	
	}
	// public function log_out()
	// {
	// 	$this->session->unset_userdata('active_customer');
	// 	redirect('home/login1');
	// }
}