<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model', 'm_category');
		$this->load->model('Product_model', 'm_product');
		$this->load->model('Supplier_model', 'm_supplier');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth/login','refresh');
		}
	}

	/**
	 * product list
	 */
	public function index() {
		$data['title'] = 'Product';
		$data['sub_title'] = 'List';
		$data['products'] = $this->m_product->get_all(); // get all products
		$this->render('admin/products/index', $data);
	}

	/**
	 * product detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Product';
		$data['sub_title'] = 'Detail';
		$data['product'] = $this->m_product->get_where('product.id = '.$id); // get product by id
		$this->render('admin/products/detail', $data);
	}

	/**
	 * create new product
	 */
	public function create() {
		$data['title'] = 'Product';
		$data['sub_title'] = 'Create';

		// get options for select form
		$data['category_options'] = $this->m_category->get_category_for_select_form();
		$data['supplier_options'] = $this->m_supplier->get_supplier_for_select_form();

		$this->form_validation->set_rules($this->m_product->conf_product_input_form_val); // set form_validation rules

		if ($this->form_validation->run()) { // if pass
			$img = $this->m_product->upload_img(); // upload produtct img

			$this->m_product->insert($this->input->post(), $img['file_name']);
			$this->session->set_flashdata('success', 'Create Success');
			redirect('admin/product','refresh');
		} else { // if not pass
			$this->render('admin/products/create', $data);
		}
		// var_dump($this->input->post('img'));
	}

	/**
	 * update product by id
	 * @param $id
	 */
	public function update($id) {
		$data['title'] = 'Product';
		$data['sub_title'] = 'Edit';
		// get product by id
		$data['product'] = $this->m_product->get_where('product.id = '.$id);
		// get options for select form
		$data['category_options'] = $this->m_category->get_category_for_select_form();
		$data['supplier_options'] = $this->m_supplier->get_supplier_for_select_form();
		// set form_validation rules
		$this->form_validation->set_rules($this->m_product->conf_product_input_form_val);

		if ($this->form_validation->run()) { // if pass
			if ($this->m_product->upload_img()) {
				$img = $this->m_product->upload_img(); // upload produtct img
			} else {
				$img['file_name'] = $data['product']->img; // upload produtct img
			}

			$this->m_product->update($id, $this->input->post(), $img['file_name']);
			$this->session->set_flashdata('success', 'Update Success');
			redirect('admin/product/'.$id, 'refresh');
		} else { // if not pass
			$this->render('admin/products/update', $data);
		}
	}

	/**
	 * delete product by id
	 * @param $id
	 */
	public function delete($id) {
		$this->m_product->delete($id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admin/product','refresh');
	}
	
}

/* End of file Product.php */
/* Location: ./application/controllers/admin/Product.php */