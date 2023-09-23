<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf as Dompdf;
class Super_admin extends CI_Controller {

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
		if (!$this->session->userdata('active_super_admin')) {
			# code...
			redirect('Home/login');
		}
	}
	

	public function index()
	{
		$this->load->view('super_admin/dashboard/index');
	}
	public function log_out()
	{
		$this->session->unset_userdata('active_super_admin');
		redirect('home/login');
	}
	public function Category()
	{
		$this->load->view('super_admin/Services/main-category');
	}
	
	public function sub_category()
	{
		$this->load->view('super_admin/Services/sub_category');
	}
	public function add_product()
	{
		$this->load->view('super_admin/jobs/add_product');
	}
	public function all_products()
	{
		$this->load->view('super_admin/jobs/all_products');	
	}
	public function product_specification($job_id='')
	{
		$this->load->view('super_admin/jobs/product_specification',['job_id'=>$job_id]);	
	}
	public function edit_products($job_id='')
	{
        $this->load->view('super_admin/jobs/edit_products',['job_id'=>$job_id]);
	}
	public function Super_Admin()
	{
		$this->load->view('super_admin/my_account/Super_Admin');
	}
	
	public function Banner()
	{
		$this->load->view('super_admin/settings/Banner');
	}
	
	public function system_setting()
	{
		$this->load->view('super_admin/general_setting/system_setting');
	}

	public function social_media()
	{
		$this->load->view('super_admin/general_setting/social_media');
	}
	public function seo_setting()
	{
		$this->load->view('super_admin/general_setting/seo_setting');
	}
	public function About_us()
	{
		$this->load->view('super_admin/Help&Information/About_us');
	}
	public function privacy_policy()
	{
		$this->load->view('super_admin/general_setting/privacy_policy');
	}
	public function cookies()
	{
		$this->load->view('super_admin/general_setting/cookies');
	}
	public function copyright_policy()
	{
		$this->load->view('super_admin/general_setting/copyright_policy');
	}
	public function hyperlink_policy()
	{
		$this->load->view('super_admin/general_setting/hyperlink_policy');
	}
	public function terms_conditions()
	{
		$this->load->view('super_admin/general_setting/terms_conditions');
	}
	
	public function payment_gateway ()
	{
		$this->load->view('super_admin/payment_setting/payment_gateway');
	}
	public function service_provider()
	{
		$this->load->view('super_admin/user/service_provider');
	}
	public function support_team()
	{
		$this->load->view('super_admin/user/support_team');
	}
	public function admin()
	{
		$this->load->view('super_admin/user/admin');
	}
	public function sub_admin()
	{
		$this->load->view('super_admin/user/sub_admin');
	}
	public function theme()
	{
		$this->load->view('super_admin/Theme/theme');
	}

	public function delivery_partner()
	{
		$this->load->view('super_admin/user/delivery_partner');
	}
	public function customer()
	{
		$this->load->view('super_admin/user/customer');
	}
	public function Cities()
	{
		$this->load->view('super_admin/location/Cities');
	}
	public function states()
	{
		$this->load->view('super_admin/location/states');
	}
	public function state_location($admin_id='')
	{
		$this->load->view('super_admin/user/super_and_state',["admin_id" =>$admin_id]);
	}
	public function city_location($sub_admin_id='')
	{
		$this->load->view('super_admin/user/cities_location',["sub_admin_id" =>$sub_admin_id]);
	}
	public function cities_and_support_team($support_team_id='')
	{
		$this->load->view('super_admin/user/support_team_city',["support_team_id" =>$support_team_id]);
	}
	public function cities_and_service_provider($service_provider_id='')
	{
		$this->load->view('super_admin/user/service_provider_city',["service_provider_id" =>$service_provider_id]);
	}
	public function cities_and_delivery_partner($delivery_partner_id='')
	{
		$this->load->view('super_admin/user/delivery_partner_city',["delivery_partner_id" =>$delivery_partner_id]);
	}
	public function sell()
	{
		$this->load->view('super_admin/order/sell');

	}

	// public function order_invoice($order_detail_id='')
	
	// {

    //     $con['conditions'] = array(
    //               'order_detail_id' => $order_detail_id,
    //    );
         
    //     $Order_details = $this->Crud_model->getRows('order_details',$con);
    //     $Seller_details = $this->Crud_model->getRows('order_details',$con1=array());
    
    //     $userCount = $this->Crud_model->fetch_order_product($con);
	// 	// $userCount = $this->Crud_model->getRows('order_details',$con);


	// 	$userCount1=json_decode($userCount->job_detail);
   
	// 	$this->load->view('super_admin/order/order_invoice');
	// }
//for pdf download
	// public function order_invoice_sample($order_detail_id="")
	// {
	// 	$cond['conditions'] = array(
	// 		'order_code!=' =>'NULL'	,
	// 		'order_detail_id=' =>$order_detail_id,
	// 	);
	// 	$order_invoice = $this->Crud_model->getRows('order_details', $cond, 'result');
	// 	$html = $this->load->view('super_admin/order/order_invoice_sample', [ 'order_invoice' => $order_invoice], true);

	// 	$dompdf = new DOMPDF();
	// 	$dompdf->load_html($html);
	// 	$dompdf->setPaper('A4', 'landscape');
	// 	$dompdf->render();
	// 	$pdf = $dompdf->output();
	// 	$invnoabc = 'invoice.pdf';
	// 	ob_end_clean();
	// 	$dompdf->stream($invnoabc);
	// 	exit;
	// }

	//view for invoice
	public function order_invoice_sample($order_detail_id="")
	{
		$cond['conditions'] = array(
			'order_code!=' =>'NULL'	,
			'order_detail_id=' =>$order_detail_id
		);
		$order_invoice = $this->Crud_model->getRows('order_details', $cond, 'result');
		$this->load->view('super_admin/order/order_invoice_sample', [ 'order_invoice' => $order_invoice]);
	}

	 
}

?>