<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model', 'm_category');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth/login','refresh');
		}
	}

	/**
	 * category list
	 */
	public function index() {
		$data['title'] = 'Category';
		$data['sub_title'] = 'List';
		$data['categories'] = $this->m_category->get_all(); // get all categories
		$this->render('admin/categories/index', $data);
	}

	/**
	 * category detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Category';
		$data['sub_title'] = 'Detail';
		$data['category'] = $this->m_category->get_where('category.id = '.$id); // get category by id
		$this->render('admin/categories/detail', $data);
	}

	/**
	 * create new category
	 */
	public function create() {
		$data['title'] = 'category';
		$data['sub_title'] = 'Create';
		
		$this->form_validation->set_rules($this->m_category->conf_category_input_form_val); // validation form rule

		// validate
		if ($this->form_validation->run()) { // if pass
			$this->m_category->insert($this->input->post());
			$this->session->set_flashdata('success', 'Create Success');
			redirect('admin/category','refresh');
		} else { // if not pass
			$this->render('admin/categories/create', $data);
		}
	}

	/**
	 * update category by id
	 * @param $id
	 */
	public function update($id) {
		$data['title'] = 'category';
		$data['sub_title'] = 'Edit';
		// get category by id
		$data['category'] = $this->m_category->get_where('category.id = '.$id);
		// validation form rule
		$this->form_validation->set_rules($this->m_category->conf_category_input_form_val);

		// validate
		if ($this->form_validation->run()) { // if pass
			$this->m_category->update($id, $this->input->post());
			$this->session->set_flashdata('success', 'Update Success');
			redirect('admin/category','refresh');
		} else { // if not pass
			$this->render('admin/categories/update', $data);
		}
	}

	/**
	 * delete category by id
	 * @param $id
	 */
	public function delete($id) {
		$this->m_category->delete($id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admin/category','refresh');
	}
	
}

/* End of file Category.php */
/* Location: ./application/controllers/admin/Category.php */