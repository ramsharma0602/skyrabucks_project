<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if (!$this->session->userdata('active_admin')) {
			# code...
			redirect('Home/login');
		}
	}
	

	public function index()
	{
		$this->load->view('admin/dashboard/index');
	}
	public function log_out()
	{
		$this->session->unset_userdata('active_admin');
		redirect('Home/login');
	}
	public function Category()
	{
		$this->load->view('admin/Services/main-category');
	}
	
	public function sub_category()
	{
		$this->load->view('admin/Services/sub_category');
	}
	public function add_product()
	{
		$this->load->view('admin/jobs/add_product');
	}
	public function all_products()
	{
		$this->load->view('admin/jobs/all_products');	
	}
	public function product_specification($job_id)
	{
		$this->load->view('admin/jobs/product_specification',['job_id'=>$job_id]);	
	}
	public function edit_products($job_id='')
	{
        $this->load->view('admin/jobs/edit_products',['job_id'=>$job_id]);
	}
	public function Admin()
	{
		$this->load->view('admin/my_account/Admin');
	}
	
	public function Banner()
	{
		$this->load->view('admin/settings/Banner');
	}
	
	public function system_setting()
	{
		$this->load->view('admin/general_setting/system_setting');
	}

	public function social_media()
	{
		$this->load->view('admin/general_setting/social_media');
	}
	public function seo_setting()
	{
		$this->load->view('admin/general_setting/seo_setting');
	}
	public function About_us()
	{
		$this->load->view('admin/Help&Information/About_us');
	}
	public function privacy_policy()
	{
		$this->load->view('admin/general_setting/privacy_policy');
	}
	public function cookies()
	{
		$this->load->view('admin/general_setting/cookies');
	}
	public function copyright_policy()
	{
		$this->load->view('admin/general_setting/copyright_policy');
	}
	public function hyperlink_policy()
	{
		$this->load->view('admin/general_setting/hyperlink_policy');
	}
	public function terms_conditions()
	{
		$this->load->view('admin/general_setting/terms_conditions');
	}
	
	public function payment_gateway ()
	{
		$this->load->view('admin/payment_setting/payment_gateway');
	}
	public function service_provider()
	{
		$this->load->view('admin/user/service_provider');
	}
	public function support_team()
	{
		$this->load->view('admin/user/support_team');
	}
	public function sub_admin()
	{
		$this->load->view('admin/user/sub_admin');
	}
	public function delivery_partner()
	{
		$this->load->view('admin/user/delivery_partner');
	}
	public function customer()
	{
		$this->load->view('admin/user/customer');
	}
	// public function location()
	// {
	// 	$this->load->view('admin/location/location');
	// }
	public function Cities()
	{
		$this->load->view('admin/location/Cities');
	}
	public function states()
	{
		$this->load->view('admin/location/states');
	}
	public function location($sub_admin_id='')
	{
		$this->load->view('admin/user/location1',["sub_admin_id" =>$sub_admin_id]);
	}
	
	public function sell()
    {
      $this->load->view('admin/order/sell');
  
    }  


}

?>