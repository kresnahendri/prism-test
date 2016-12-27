<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_review_model', 'm_product_review');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth/login','refresh');
		}
	}

	/**
	 * category list
	 */
	public function index() {
		$data['title'] = 'Product Review';
		$data['sub_title'] = 'List';
		$data['product_reviews'] = $this->m_product_review->get_all(); // get all product review
		$this->render('admin/product_reviews/index', $data);
	}

	/**
	 * category detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Product Review';
		$data['sub_title'] = 'Detail';
		$data['product_review'] = $this->m_product_review->get_where('id = '.$id, 1); // get product review by id
		$this->render('admin/product_reviews/detail', $data);
	}

	/**
	 * update reviews by id
	 * @param $id
	 */
	public function update($id) {
		$this->form_validation->set_rules($this->m_product_review->conf_review_input_form_val);

		// validate
		if ($this->form_validation->run()) { // if pass
			$this->m_product_review->update($id, $this->input->post());
			$this->session->set_flashdata('success', 'Update Success');
			redirect('admin/review','refresh');
		} else { // if not pass
			$this->session->set_flashdata('err', validation_errors());
			redirect('admin/review/'.$id,'refresh');
		}
	}

	/**
	 * delete product review by id
	 * @param $id
	 */
	public function delete($id) {
		$this->m_product_review->delete($id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admin/review','refresh');
	}
}

/* End of file Review.php */
/* Location: ./application/controllers/admin/Review.php */