<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_provider extends CI_Controller {

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
		if (!$this->session->userdata('active_service_provider')) {
			# code...
			redirect('Home/login');
		}
	}
	
	public function index()
	{
		 $this->load->view('service_provider/dashboard/index');
	}
	public function log_out()
	{
		$this->session->unset_userdata('active_service_provider');
		redirect('home/login');
	}

	public function Service_Provider()
	{
		$this->load->view('service_provider/my_account/Service_Provider');
	}
	public function add_product()
	{
		
		$this->load->view('service_provider/jobs/add_product');
		
	}
	public function all_products()
	{
		
		$this->load->view('service_provider/jobs/all_products');
		
	}
	public function product_specification()
	{
		
		$this->load->view('service_provider/jobs/product_stock_service_provider');
		
	}
	public function edit_products($job_id='')
	{
        $this->load->view('service_provider/jobs/product_file',['job_id'=>$job_id]);
	}
}

?>