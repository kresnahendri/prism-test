<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model', 'm_product');
		// $this->load->model('Customer_model', 'm_customer');
		$this->load->model('Sale_model', 'm_sale');
		$this->load->model('Purchase_model', 'm_purchase');
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login','refresh');
		}
	}


	/**
	 * Report list
	 */
	public function index() {
		$data['title'] = 'Report';
		$data['sub_title'] = 'Purchase, Sales & Cashflow';

		// get cashflow data
		$data['total_income'] = $this->m_sale->get_total_income();
		$data['total_cost'] = $this->m_purchase->get_total_cost();
		$data['total_credit'] = $this->m_sale->get_total_credit();
		$data['total_debt'] = $this->m_purchase->get_total_debt();
		
		$this->render('admin/reports/index', $data);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/admin/Report.php */