<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sale_model', 'm_sale');
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login','refresh');
		}
	}

	/**
	 * get sale summary (ammount / day)
	 * use in summary report
	 * manage by js
	 */
	public function get_summary_json() {
		$this->db->select("sale.id AS id, DATE_FORMAT(paid_date, '%Y-%m-%d') AS date, SUM(product_price * product_qty) AS total_amount");
		$this->db->join('sale_detail', 'sale.id = sale_detail.sale_id', 'left');
		$this->db->where('accepted = 1 AND paid = 1 AND shipped = 1 AND recived = 1');
		$this->db->group_by('date');
		$query = $this->db->get('sale');
		echo json_encode($query->result());
	}

	/**
	 * get sales status (completed / uncompleted)
	 * use in summary report
	 * manage by js
	 */
	public function get_status_json() {
		$completed = $this->m_sale->get_completed();
		$uncompleted = $this->m_sale->get_uncompleted();
		$data = [
			['label' => 'Completed', 'value' => $completed],
			['label' => 'Uncompleted', 'value' => $uncompleted],
		];
		echo json_encode($data);
	}

}

/* End of file Sale.php */
/* Location: ./application/controllers/api/Sale.php */