<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Sale_model', 'm_sale');
		$this->load->model('Email_model', 'm_email');
		$this->load->model('Sale_payment_conf_model', 'm_sale_payment_conf');
		$this->load->library('cart');
	}

	/**
	 * payment confirmation from customer
	 */
	public function confirmation() {
		$this->form_validation->set_rules($this->m_sale_payment_conf->conf_payment_input_form_val);

		if ($this->form_validation->run()) {
			$sale = $this->m_sale->get_where('order_no = "'.$this->input->post('order_no').'"');
			if ($sale) {
				$sale_id = $sale->first_row()->sale_id;
				$this->m_sale_payment_conf->insert($sale_id, $this->input->post());
				$this->session->unset_userdata('err');
				$this->m_email->customer_payment_confirmation($sale->first_row()->email, $sale);
				$this->render_shop('shop/payments/thank');
			} else {
				$this->session->set_flashdata('err', 'Order Number not found');
				$this->render_shop('shop/payments/confirmation');
			}
		} else {
			$this->session->set_flashdata('err', validation_errors());
			$this->render_shop('shop/payments/confirmation');
		}
	}

}

/* End of file Payment_confirmation.php */
/* Location: ./application/controllers/shop/Payment.php */