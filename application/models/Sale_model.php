<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model', 'm_product');
		$this->load->model('Email_model', 'm_email');
	}

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_sale_input_form_val = [
		[
			'field' => 'order_no',
			'label' => 'Order Number',
			'rules' => 'trim|required|min_length[9]|max_length[9]',
		],
		[
			'field' => 'customer_id',
			'label' => 'Customer',
			'rules' => 'required',
		]
	];

	/**
	 * rules for form validation (status date)
	 * @return method
	 */
	public function date_status_val() {
		if ($this->input->post('accepted') != NULL) {
			$this->form_validation->set_rules('accepted_date', 'Accepted Date', 'required');
		}

		if ($this->input->post('shipped') != NULL) {
			$this->form_validation->set_rules('shipped_date', 'shipped Date', 'required');
		}

		if ($this->input->post('paid') != NULL) {
			$this->form_validation->set_rules('paid_date', 'Paid Date', 'required');
		}

		if ($this->input->post('recived') != NULL) {
			$this->form_validation->set_rules('recived_date', 'Recived Date', 'required');
		}
	}

	/**
	 * setting input value from form to db
	 * @param $input
	 * @return array
	 */
	private function set_input($input) {
		$data = [
			'order_no' => $this->input->post('order_no'),
			'notes' => $this->input->post('notes'),
			'payment_method' => $this->input->post('payment_method'),
			'customer_id' => $this->input->post('customer_id'),
		];

		if ($this->input->post('accepted') != NULL) {
			$data['accepted'] = $this->input->post('accepted');
			$data['accepted_date'] = $this->input->post('accepted_date');
		} else {
			$data['accepted'] = 0;
			$data['accepted_date'] = NULL;
		}

		if ($this->input->post('shipped') != NULL) {
			$data['shipped'] = $this->input->post('shipped');
			$data['shipped_date'] = $this->input->post('shipped_date');
		} else {
			$data['shipped'] = 0;
			$data['shipped_date'] = NULL;
		}

		if ($this->input->post('paid') != NULL) {
			$data['paid'] = $this->input->post('paid');
			$data['paid_date'] = $this->input->post('paid_date');
		} else {
			$data['paid'] = 0;
			$data['paid_date'] = NULL;
		}

		if ($this->input->post('recived') != NULL) {
			$data['recived'] = $this->input->post('recived');
			$data['recived_date'] = $this->input->post('recived_date');
		} else {
			$data['recived'] = 0;
			$data['recived_date'] = NULL;
		}

		return $data;
	}

	/**
	 * generate order number for new sale order
	 * @return string
	 */
	public function getnerate_order_number() {
		$id = (string) $this->db->select('id')->order_by('id','desc')->limit(1)->get('sale')->row('id') + 1;
		$num_of_zero = 6 - strlen($id);
		$order_number = 'SO-';
		for ($i=0; $i < $num_of_zero; $i++) { 
			$order_number .= '0';
		}
		$order_number .= $id;
		return $order_number;
	}

	/**
	 * check is sale completed?
	 * @param $id
	 * @return bool
	 */
	public function is_completed($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('sale');
		$sale = $query->row();
		if ($sale->accepted && $sale->shipped && $sale->paid && $sale->recived) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * get all sales
	 * @return boolean
	 */
	public function get_all() {
		$query = $this->db->get('sale');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * get sale(s) with where condition
	 * @param $where
	 * @return boolean
	 */
	public function get_where($where) {
		$this->db->select('*, 
											customer.name AS customer_name,	
											product.name AS product_name,');	
		$this->db->join('sale_detail', 'sale_detail.sale_id = sale.id', 'left');
		$this->db->join('customer', 'customer.id = sale.customer_id', 'left');
		$this->db->join('product', 'product.id = sale_detail.product_id', 'left');
		$this->db->where($where);
		$query = $this->db->get('sale');
		if ($query->num_rows() > 0) {
			return $query;
		}
		return false;
	}

	/**
	 * get sale(s) that have completed status
	 * @return int
	 */
	public function get_completed() {
		$this->db->where('accepted = 1 AND shipped = 1 AND paid = 1 AND recived = 1');
		$query = $this->db->get('sale');
		return $query->num_rows();
	}

	/**
	 * get sale(s) that have uncompleted status
	 * @return int
	 */
	public function get_uncompleted() {
		$this->db->where('accepted != 1 OR shipped != 1 OR paid != 1 OR recived != 1');
		$query = $this->db->get('sale');
		return $query->num_rows();
	}

	/**
	 * get total amout of sale by id
	 * @param $id
	 * @return int
	 */
	public function get_total_amount_by_sale_id($id) {
		$query = $this->db->query("SELECT SUM(product_price * product_qty) total_amount FROM sale_detail WHERE sale_id = ".$id);
		return $query->row()->total_amount;
	}

	/**
	 * get total amout of sales
	 * @return int
	 */
	public function get_total_income() {
		$this->db->select('SUM(product_price * product_qty) AS total_amount');
		$this->db->where('accepted = 1 AND shipped = 1 AND paid = 1 AND recived = 1');
		$this->db->join('sale_detail', 'sale_detail.sale_id = sale.id', 'left');
		$query = $this->db->get('sale');
		return $query->row()->total_amount;
	}

	/**
	 * get total credit of purchases
	 * @return int
	 */
	public function get_total_credit() {
		$this->db->select('SUM(product_price * product_qty) AS total_amount');
		$this->db->where('accepted != 1 OR shipped != 1 OR paid != 1 OR recived != 1');
		$this->db->join('sale_detail', 'sale_detail.sale_id = sale.id', 'left');
		$query = $this->db->get('sale');
		return $query->row()->total_amount;
	}
	
	/**
	 * insert data to db
	 * @param $input
	 * @return boolean
	 */
	public function insert($input) {
		$data = $this->set_input($input);
		$this->db->insert('sale', $data);
	}

	/**
	 * update sale
	 * @param $counter, $purchase_id
	 * @return void
	 */
	public function insert_detail($counter, $sale_id) {
		for ($i=1; $i < $counter; $i++) {
			if (!is_null($this->input->post('product_id'.$i))) {
				$data = [
					'product_qty' => $this->input->post('product_qty'.$i),
					'product_price' => $this->input->post('product_price'.$i),
					'product_id' => $this->input->post('product_id'.$i),
					'sale_id' => $sale_id, // temp
				];
				$this->db->insert('sale_detail', $data);
			}
		}
	}

	/**
	 * update data to db
	 * @param $input
	 * @return boolean
	 */
	public function update($id, $input) {
		$data = $this->set_input($input);
		$this->db->where('id', $id);
		$this->db->update('sale', $data);
		if ($this->is_completed($id)) {
			$this->update_product_stock($id, -1);
		}
	}

	/**
	 * update product stock by sale event
	 * @param $sale_id, $add_or_substract
	 * @return void
	 */
	public function update_product_stock($sale_id, $add_or_substract) {
		$this->db->where('sale_id', $sale_id);
		$query = $this->db->get('sale_detail');
		$sales = $query->result();

		foreach ($sales as $sale) {
			$this->m_product->update_stock($sale->product_id, $sale->product_qty, $add_or_substract);
		}
	}

	/**
	 * delete sale & sale detail by $id
	 * @param $id
	 * @return method
	 */
	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('sale');

		$this->db->where('sale_id', $id);
		$this->db->delete('sale_detail');
	}

	/**
	 * handling email when status was changed
	 * @param $to, $sale
	 */
	public function handling_email($to, $sale) {
		if ($this->input->post('accepted') != NULL && $this->input->post('paid') != NULL && $this->input->post('shipped') != NULL && $this->input->post('recived') != NULL) {
			$this->m_email->sale_admin_recived($to, $sale);
		} else if ($this->input->post('accepted') != NULL && $this->input->post('paid') != NULL && $this->input->post('shipped') != NULL) {
			$this->m_email->sale_admin_shipped($to, $sale);
		} else if ($this->input->post('accepted') != NULL && $this->input->post('paid') != NULL) {
			$this->m_email->sale_admin_paid($to, $sale);
			echo "string";
		}

	}

}

/* End of file Sale_model.php */
/* Location: ./application/models/Sale_model.php */