<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model', 'm_category');
		$this->load->model('Product_model', 'm_product');
		$this->load->model('Product_review_model', 'm_product_review');
		$this->load->helper('text');
		$this->load->library('cart');
	}

	/**
	 * product list
	 */
	public function index() {
		$data['title'] = 'Product List';
		$data['categories'] = $this->m_category->get_all();
		$data['products'] = $this->m_product->get_where('product.active = 1'); // get all products
		$this->render_shop('shop/products/index', $data);
	}

	/**
	 * get product by category
	 * @param $category_id
	 */
	public function category($category_id) {
		$data['title'] = 'Product List';
		$data['categories'] = $this->m_category->get_all();
		$data['products'] = $this->m_product->get_where('product.active = 1 AND product.category_id = '.$category_id); // get all products
		$this->render_shop('shop/products/index', $data);
	}
	
	/**
	 * product detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Product Detail';
		$data['product'] = $this->m_product->get_where('product.id = '.$id.' AND product.active = 1'); // get product by id
		if (!$data['product']) {
			redirect('shop','refresh');
		}
		$data['reviews'] = $this->m_product_review->get_where('product_id = '.$id.' AND active = 1');
		$category_id = $data['product']->category_id;
		$data['related_products'] = $this->m_product->get_where('product.active = 1 AND product.id != '.$id.' AND product.category_id = '.$category_id, 3); // get related products
		$this->render_shop('shop/products/detail', $data);
	}

	/**
	 * add review for product, based on product id
	 * @param $id
	 */
	public function add_review($product_id) {
		$this->form_validation->set_rules($this->m_product_review->conf_review_input_form_val);

		if ($this->form_validation->run()) {
			$this->m_product_review->insert($this->input->post());
			$this->session->set_flashdata('success', 'Thanks for your review! Your review will be show after admin accepted this.');
		} else {
			$this->session->set_flashdata('err', validation_errors());
		}

		redirect('shop/product/detail/'.$product_id,'refresh');
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/shop/Product.php */