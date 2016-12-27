<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Supplier_model', 'm_supplier');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth/login','refresh');
		}
	}

	/**
	 * supplier list
	 */
	public function index() {
		$data['title'] = 'Supplier';
		$data['sub_title'] = 'List';
		$data['suppliers'] = $this->m_supplier->get_all();
		$this->render('admin/suppliers/index', $data);
	}

	/**
	 * supplier detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Supplier';
		$data['sub_title'] = 'Detail';
		
		$data['supplier'] = $this->m_supplier->get_where('supplier.id = '.$id); // get supplier by id
		
		$this->render('admin/suppliers/detail', $data);
	}

	/**
	 * create new supplier
	 */
	public function create() {
		$data['title'] = 'Supplier';
		$data['sub_title'] = 'Create';
		// validation form rule
		$this->form_validation->set_rules($this->m_supplier->conf_supplier_input_form_val);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[supplier.email]');

		// validate
		if ($this->form_validation->run()) { // if pass
			$this->m_supplier->insert($this->input->post());
			$this->session->set_flashdata('success', 'Create Success');
			redirect('admin/supplier','refresh');
		} else { // if not pass
			$this->render('admin/suppliers/create', $data);
		}
	}

	/**
	 * update supplier by id
	 * @param $id
	 */
	public function update($id) {
		$data['title'] = 'Supplier';
		$data['sub_title'] = 'Edit';
		// get supplier by id
		$data['supplier'] = $this->m_supplier->get_where('supplier.id = '.$id);
		// validation form rule
		$this->form_validation->set_rules($this->m_supplier->conf_supplier_input_form_val);

		// validate
		if ($this->form_validation->run()) { // if pass
			$this->m_supplier->update($id, $this->input->post());
			$this->session->set_flashdata('success', 'Update Success');
			redirect('admin/supplier','refresh');
		} else { // if not pass
			$this->render('admin/suppliers/update', $data);
		}
	}

	/**
	 * delete supplier by id
	 * @param $id
	 */
	public function delete($id) {
		$this->m_supplier->delete($id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admin/supplier','refresh');
	}

}

/* End of file Supplier.php */
/* Location: ./application/controllers/admin/Supplier.php */