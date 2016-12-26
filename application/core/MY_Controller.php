<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	// public function render($view, $data=NULL) {
	// 	$this->load->view('layouts/_head', $data);
	// 	$this->load->view('layouts/_nav');
	// 	$this->load->view($view);
	// 	$this->load->view('layouts/_foot');
	// }

	public function __construct()
	{
		parent::__construct();
		define('ORDER_ACCEPTED', 1);
		define('ORDER_SHIPPED', 2);
		define('ORDER_PAID', 3);
		define("ORDER_RECIVED", 4);
		define("PRODUCT_IMG_BASE_URL", site_url('uploads/products/img/'));
	}
	
	public function render($view, $data=NULL) {
		$this->load->view('admin/layout', ['view' => $view, 'data' => $data]);
	}

	public function render_auth($view, $data=NULL) {
		$this->load->view('auth/layout', ['view' => $view, 'data' => $data]);
	}

	public function render_shop($view, $data=NULL) {
		$this->load->view('shop/layout', ['view' => $view, 'data' => $data]);
	}

	

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */