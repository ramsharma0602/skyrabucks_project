<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_partner extends CI_Controller {

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
		if (!$this->session->userdata('active_delivery_partner')) {
			# code...
			redirect('Home/login');
		}
	}

	public function index()
	{
		
		$this->load->view('delivery_partner/dashboard/index');
	}
	public function log_out()
	{
		$this->session->unset_userdata('active_delivery_partner');
		redirect('home/login');
	}
	public function Delivery_partner()
	{
		$this->load->view('delivery_partner/my_account/Delivery_partner');
	}
	public function sell()
	{
		$this->load->view('delivery_partner/order/sell');

	}
}

	
 


?>