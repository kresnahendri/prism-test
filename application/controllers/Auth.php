<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->helper('language');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}

	// redirect if needed, otherwise display the user list
	public function index() {
		redirect('auth/login','refresh');
	}

	// log the user in
	public function login() {
		$this->data['title'] = 'Login';
		if ($this->ion_auth->logged_in()) { // if logged in
				redirect('admin/report', 'refresh');
		}
		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true) {
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) { //if the login is successful
				$this->session->set_flashdata('success', $this->ion_auth->messages());
				redirect('admin/report', 'refresh');
			} else { // if the login was un-successful
				$this->session->set_flashdata('err', $this->ion_auth->errors());
				redirect('auth/login', 'refresh');
			}
		} else {
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			// $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$this->render_auth('auth/login', $this->data);
		}
	}

	// log the user out
	public function logout() {
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('success', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}

	// activate the user
	public function activate($id, $code=false) {
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

}
