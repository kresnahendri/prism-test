<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Customer_model', 'm_customer');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth/login','refresh');
		}
	}

	/**
	 * customer list
	 */
	public function index() {
		$data['title'] = 'Customer';
		$data['sub_title'] = 'List';
		$data['customers'] = $this->m_customer->get_all();
		$this->render('admin/customers/index', $data);
	}

	/**
	 * customer detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Customer';
		$data['sub_title'] = 'Detail';
		
		$data['customer'] = $this->m_customer->get_where('customer.id = '.$id); // get customer by id
		
		$this->render('admin/customers/detail', $data);
	}

	/**
	 * create new customer
	 */
	public function create() {
		$data['title'] = 'Customer';
		$data['sub_title'] = 'Create';
		// validation form rule
		$this->form_validation->set_rules($this->m_customer->conf_customer_input_form_val);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customer.email]');
		// validate
		if ($this->form_validation->run()) { // if pass
			$this->m_customer->insert($this->input->post());
			$this->session->set_flashdata('success', 'Create Success');
			redirect('admin/customer','refresh');
		} else { // if not pass
			$this->render('admin/customers/create', $data);
		}
	}

	/**
	 * update customer by id
	 * @param $id
	 */
	public function update($id) {
		$data['title'] = 'Customer';
		$data['sub_title'] = 'Edit';
		// get customer by id
		$data['customer'] = $this->m_customer->get_where('customer.id = '.$id);
		// validation form rule
		$this->form_validation->set_rules($this->m_customer->conf_customer_input_form_val);

		// validate
		if ($this->form_validation->run()) { // if pass
			$this->m_customer->update($id, $this->input->post());
			$this->session->set_flashdata('success', 'Update Success');
			redirect('admin/customer','refresh');
		} else { // if not pass
			$this->render('admin/customers/update', $data);
		}
	}

	/**
	 * delete customer by id
	 * @param $id
	 */
	public function delete($id) {
		$this->m_customer->delete($id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admin/customer','refresh');
	}

}

/* End of file Customer.php */
/* Location: ./application/models/Customer.php */