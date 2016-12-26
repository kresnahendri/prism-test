<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model', 'm_category');
		$this->load->model('Product_model', 'm_product');
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
		$data['product'] = $this->m_product->get_where('product.id = '.$id); // get product by id
		$this->render_shop('shop/products/detail', $data);
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/shop/Product.php */