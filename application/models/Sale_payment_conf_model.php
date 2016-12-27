<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_payment_conf_model extends CI_Model {

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_payment_input_form_val = [
		[
			'field' => 'order_no',
			'label' => 'Order Number',
			'rules' => 'trim|required|min_length[9]|max_length[9]',
		],
		[
			'field' => 'merchant_bank',
			'label' => 'Merchant Bank',
			'rules' => 'required',
		],
		[
			'field' => 'customer_bank',
			'label' => 'Customer Bank',
			'rules' => 'required',
		],
		[
			'field' => 'customer_bank_account',
			'label' => 'Customer Bank Account',
			'rules' => 'required',
		],
		[
			'field' => 'total_amount',
			'label' => 'Total Amount',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'payment_date',
			'label' => 'Payment Date',
			'rules' => 'required',
		]
	];

	/**
	 * setting input value from form to db
	 * @param $sale_id, $input
	 * @return array
	 */
	private function set_input($sale_id, $input) {
		$data = [
			'merchant_bank' => $this->input->post('merchant_bank'),
			'customer_bank' => $this->input->post('customer_bank'),
			'customer_bank_account' => $this->input->post('customer_bank_account'),
			'total_amount' => $this->input->post('total_amount'),
			'payment_date' => $this->input->post('payment_date'),
			'sale_id' => $sale_id,
		];

		return $data;
	}

	/**
	 * get where payment confirmation
	 * @return boolean
	 */
	public function get_where($where) {
		$this->db->where($where);
		$query = $this->db->get('sale_payment_conf');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * insert payment_confimation
	 * @param $input
	 * @return bool
	 */
	public function insert($sale_id, $input) {
		$data = $this->set_input($sale_id, $input);
		return $this->db->insert('sale_payment_conf', $data);
	}

}

/* End of file Payment_model.php */
/* Location: ./application/models/Payment_model.php */