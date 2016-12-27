<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model {

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_product_input_form_val = [
		[
			'field' => 'name',
			'label' => 'Product Name',
			'rules' => 'trim|required|min_length[5]',
		],
		[
			'field' => 'sku',
			'label' => 'SKU Number',
			'rules' => 'required|min_length[6]',
		],
		[
			'field' => 'brand',
			'label' => 'Brand',
			'rules' => 'required',
		],
		[
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required',
		],
		[
			'field' => 'retail_price',
			'label' => 'Retail Price',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'wholesale_price',
			'label' => 'Wholesale Price',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'buy_price',
			'label' => 'Buy Price',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'stock',
			'label' => 'Stock',
			'rules' => 'required|numeric',
		],
		// [
		// 	'field' => 'active',
		// 	'label' => 'Active/Inactive',
		// 	'rules' => 'required|numeric',
		// ],
		[
			'field' => 'category_id',
			'label' => 'Category',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'supplier_id',
			'label' => 'Supplier',
			'rules' => 'required|numeric',
		],
	];

	/**
	 * rules to get product genneraly
	 * @return void
	 */
	private function get_general() {
		$this->db->select('product.*, 
											 category.name AS category_name,
											 supplier.name AS supplier_name,
											 category.id AS category_id,
											 supplier.id AS supplier_id');
		$this->db->join('supplier', 'supplier.id = product.supplier_id', 'left');
		$this->db->join('category', 'category.id = product.category_id', 'left');
	}

	/**
	 * @param $input
	 * @return data
	 */
	private function set_input($input) {
		$data = [
			'sku' => $this->input->post('sku'),
			'name' => $this->input->post('name'),
			'brand' => $this->input->post('brand'),
			'description' => $this->input->post('description'),
			'retail_price' => $this->input->post('retail_price'),
			'wholesale_price' => $this->input->post('wholesale_price'),
			'buy_price' => $this->input->post('buy_price'),
			'stock' => $this->input->post('stock'),
			'active' => $this->input->post('active'),
			'category_id' => $this->input->post('category_id'),
			'supplier_id' => $this->input->post('supplier_id'),
		];

		if ($data['active'] == NULL) {
			$data['active'] = 0;
		}

		return $data;
	}

	/**
	 * get all products
	 */
	public function get_all() {
		$this->get_general();
		$query = $this->db->get('product');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * get product(s) with where condition
	 * @param $where, $limit = NULL
	 * @return bool
	 */
	public function get_where($where, $limit = NULL) {
		$this->get_general();
		$this->db->where($where);
		
		if ($limit) {
			$query = $this->db->get('product', $limit);
		} else {
			$query = $this->db->get('product');
		}

		if ($query->num_rows() > 1) {
			return $query->result();
		} else {
			return $query->row();
		}
		return false;
	}

	/**
	 * insert product
	 * @param $input, $img = NULL
	 * @return bool
	 */
	public function insert($input, $img = NULL) {
		$data = $this->set_input($input);
		$data['img'] = $img;
		return $this->db->insert('product', $data);
	}

	/**
	 * update product
	 * @param $id, $input, $img = NULL
	 * @return bool
	 */
	public function update($id, $input, $img = NULL) {
		$data = $this->set_input($input);
		$data['img'] = $img;
		$this->db->where('id', $id);
		return $this->db->update('product', $data);
	}

	/**
	 * update stock value
	 * @param $id, $stock_param, $add_or_substract
	 * @return bool
	 */
	public function update_stock($id, $stock_param, $add_or_substract) {
		$this->db->where('id', $id);
		$query = $this->db->get('product');
		$product = $query->row();

		if ($add_or_substract == 1) {
			$new_stock = $product->stock + $stock_param;
		} else if($add_or_substract == -1) {
			$new_stock = $product->stock - $stock_param;
		}

		$data = [
			'stock' => $new_stock
		];

		$this->db->where('id', $id);
		return $this->db->update('product', $data);
	}

	/**
	 * delete product
	 * @param $id
	 * @return bool
	 */
	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('product');
	}

	/**
	 * upload product image
	 * @return boo or data
	 */
	public function upload_img() {
		$config['file_name'] 			= $this->input->post('name');
		$config['overwrite']			= TRUE;
		$config['upload_path']    = './uploads/products/img/';
    $config['allowed_types'] 	= 'gif|jpg|jpeg|png';
    $config['max_size']  			= '100';
    $config['max_width']  		= '1024';
    $config['max_height']  		= '768';
    $this->load->library('upload', $config);
    
    if (!$this->upload->do_upload('img')){
    	$this->session->set_flashdata('err', $this->upload->display_errors());
    	return false;
    } else {
    	return $this->upload->data();
    }
	}

}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */