<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'm_product');
	}
	/**
	 * get all product in json format
	 * use in create sales and purchase order
	 * manage by js
	 */
	public function get_all_json() {
		$data = $this->m_product->get_all();
		echo json_encode($data);
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/api/Product.php */