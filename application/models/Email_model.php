<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library('email');
	}

	public function send_email($to, $subject, $msg) {
		$this->email->from('cs@prismshop.co', 'PRISM-SHOP');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($msg);
		$this->email->send();
	}

	public function customer_order($to, $sale) {
		$subject = 'Customer Order-'.$sale->first_row()->order_no;
		$data['sale'] = $sale;
		$msg = $this->load->view('email/customer_order',$data, TRUE);
		$this->send_email($to, $subject, $msg);
	}

	public function customer_payment_confirmation() {
		
	}

	public function sale_admin_shipped($to, $sale) {
		$subject = 'Customer Order-'.$sale->first_row()->order_no;
		$data['sale'] = $sale;
		$msg = $this->load->view('email/admin_sale_shipped',$data, TRUE);
		$this->send_email($to, $subject, $msg);
	}	

	public function sale_admin_paid($to, $sale) {
		$subject = 'Customer Order-'.$sale->first_row()->order_no;
		$data['sale'] = $sale;
		$msg = $this->load->view('email/admin_sale_paid',$data, TRUE);
		$this->send_email($to, $subject, $msg);
	}

	public function sale_admin_recived($to, $sale) {
		$subject = 'Customer Order-'.$sale->first_row()->order_no;
		$data['sale'] = $sale;
		$msg = $this->load->view('email/admin_sale_recived',$data, TRUE);
		$this->send_email($to, $subject, $msg);
	}

	public function purchase_admin_shipped() {
		
	}	

	public function purchase_admin_paid() {
		
	}

	public function purchase_admin_recived() {
		
	}	

}

/* End of file Email_model.php */
/* Location: ./application/models/Email_model.php */