<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_team extends CI_Controller {

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
		if (!$this->session->userdata('active_support_team')) {
			# code...
			redirect('Home/login');
		}
	}

	public function index()
	{
		
		$this->load->view('support_team/dashboard/index');
	}
	
	public function log_out()
	{
		$this->session->unset_userdata('active_support_team');
		redirect('home/login');
	}

	public function support_team()
	{
		$this->load->view('support_team/my_account/support_team');
	}
	public function order_details()
	{
		
		$this->load->view('support_team/order_details/order_details');
	}
	public function Cities()
	{
		$this->load->view('support_team/location/Cities');
	}
	public function location($cs_id='')
	{
		// $this->load->view('support_team/user/location',["support_team_id" =>$support_team_id]);
		$this->load->view('support_team/dashboard/index',["cs_id" =>$cs_id]);

	}
	public function Service_provider()
	{
		$this->load->view('support_team/user/service_provider');
	}

}

?>