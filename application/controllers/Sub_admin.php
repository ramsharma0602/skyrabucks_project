<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_admin extends CI_Controller {

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
		if (!$this->session->userdata('active_sub_admin')) {
			# code...
			redirect('Home/login');
		}
	}

	public function index()
	{
		
		$this->load->view('sub_admin/dashboard/index');
	}
    public function log_out()
	{
		$this->session->unset_userdata('active_sub_admin');
		redirect('home/login');
	}	
	public function Sub_Admin()
	{
		$this->load->view('sub_admin/my_account/sub_admin');
	}
    public function Category()
	{
		$this->load->view('sub_admin/Services/main-category');
	}
	
	public function sub_category()
	{
		$this->load->view('sub_admin/Services/sub_category');
	}
	public function add_product()
	{
		$this->load->view('sub_admin/jobs/add_product');
	}
	public function all_products()
	{
		$this->load->view('sub_admin/jobs/all_products');	
	}
	public function product_specification($job_id)
	{
		$this->load->view('sub_admin/jobs/product_specification',['job_id'=>$job_id]);	
	}
	public function edit_products($job_id='')
	{
        $this->load->view('sub_admin/jobs/edit_products',['job_id'=>$job_id]);
	}
	
	public function Banner()
	{
		$this->load->view('sub_admin/settings/Banner');
	}
	
	public function system_setting()
	{
		$this->load->view('sub_admin/general_setting/system_setting');
	}

	public function social_media()
	{
		$this->load->view('sub_admin/general_setting/social_media');
	}
	public function seo_setting()
	{
		$this->load->view('sub_admin/general_setting/seo_setting');
	}
	public function About_us()
	{
		$this->load->view('sub_admin/Help&Information/About_us');
	}
	public function privacy_policy()
	{
		$this->load->view('sub_admin/general_setting/privacy_policy');
	}
	public function cookies()
	{
		$this->load->view('sub_admin/general_setting/cookies');
	}
	public function copyright_policy()
	{
		$this->load->view('sub_admin/general_setting/copyright_policy');
	}
	public function hyperlink_policy()
	{
		$this->load->view('sub_admin/general_setting/hyperlink_policy');
	}
	public function terms_conditions()
	{
		$this->load->view('sub_admin/general_setting/terms_conditions');
	}
	
	public function payment_gateway ()
	{
		$this->load->view('sub_admin/payment_setting/payment_gateway');
	}
	public function service_provider()
	{
		$this->load->view('sub_admin/user/service_provider');
	}
	public function support_team()
	{
		$this->load->view('sub_admin/user/support_team');
	}
	
	
    public function delivery_partner()
	{
		$this->load->view('sub_admin/user/delivery_partner');
	}
    public function customer()
    {
        $this->load->view('sub_admin/user/customer');
    }
    public function cities_and_support_team($support_team_id='')
	{
		$this->load->view('sub_admin/user/support_team_city',["support_team_id" =>$support_team_id]);
	}
	public function cities_and_service_provider($service_provider_id='')
	{
		$this->load->view('sub_admin/user/service_provider_city',["service_provider_id" =>$service_provider_id]);
	}
	public function cities_and_delivery_partner($delivery_partner_id='')
	{
		$this->load->view('sub_admin/user/delivery_partner_city',["delivery_partner_id" =>$delivery_partner_id]);
	}
	public function sell()
    {
      $this->load->view('sub_admin/order/sell');
  
    }  

}

?>