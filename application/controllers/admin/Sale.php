<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model', 'm_product');
		$this->load->model('Customer_model', 'm_customer');
		$this->load->model('Sale_model', 'm_sale');
		$this->load->model('Sale_payment_conf_model', 'm_sale_payment_conf');
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !$this->ion_auth->is_sale())) {
			redirect('auth/login','refresh');
		}
	}


	/**
	 * order list
	 */
	public function index() {
		$data['title'] = 'Sales Order';
		$data['sub_title'] = 'List';
		$data['sales'] = $this->m_sale->get_all();
		$this->render('admin/sales/index', $data);
	}


	/**
	 * sale detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Sales Order';
		$data['sub_title'] = 'Detail';
		
		$data['sale'] = $this->m_sale->get_where('sale.id = '.$id); // get sale by id
		$data['payment_confs'] = $this->m_sale_payment_conf->get_where('sale_id = '.$id);
		$this->render('admin/sales/detail', $data);
	}


	/**
	 * create new sales order
	 */
	public function create() {
		$data['title'] = 'Sales Order';
		$data['sub_title'] = 'Create';
		$data['order_no'] = $this->m_sale->getnerate_order_number();;

		// get options for select form
		$data['customer_options'] = $this->m_customer->get_customer_for_select_form();
		$counter = $this->input->post('counter');

		// set form_validation rules
		$this->form_validation->set_rules($this->m_sale->conf_sale_input_form_val);
		for ($i=0; $i < $counter; $i++) { // product rules
			if ($this->input->post('product_id'.$i)) {
				$product_stock = $this->m_product->get_where('product.id = '.$this->input->post('product_id'.$i))->stock; //count product stock
				$this->form_validation->set_rules('product_id'.$i, 'Product '.$i, 'required');
				$this->form_validation->set_rules('product_qty'.$i, 'Qty '.$i, 'required|numeric|greater_than[0]|less_than['.$product_stock.']');
				$this->form_validation->set_rules('product_price'.$i, 'Price '.$i, 'required|numeric|greater_than[0]');
			}
		}
		$this->m_sale->date_status_val(); // date status validation
		
		// validate
		if ($this->form_validation->run()) { // if pass
			if ($counter == 1) { // product is empty
				$this->session->set_flashdata('err', 'Please add and select item that you want to sell!');
				$this->render('admin/sales/create', $data);
			} else { // product is not empty
				$this->m_sale->insert($this->input->post());

				$sale_id = $this->db->insert_id();
				$this->m_sale->insert_detail($counter, $sale_id);
				if ($this->m_sale->is_completed($sale_id)) {
					$this->m_sale->update_product_stock($sale_id, -1);
				}

				// handling email
				$sale = $this->m_sale->get_where('sale.id = '.$sale_id);
				$this->m_sale->handling_email($sale->first_row()->email, $sale);

				$this->session->set_flashdata('success', 'Create Success');
				redirect('admin/sale','refresh');
			}
		} else { // if not pass
			$this->render('admin/sales/create', $data);
		}
	}

	/**
	 * update sale order status
	 * @param $id
	 */
	public function update_status($id) {
		if ($this->input->post()) {
			$this->m_sale->date_status_val(); // date status validation
			if ($this->form_validation->run()) {
				$this->m_sale->update($id, $this->input->post());

				// handling email
				$sale = $this->m_sale->get_where('sale.id = '.$id);
				$this->m_sale->handling_email($sale->first_row()->email, $sale);

				$this->session->set_flashdata('success', 'Update Success');
			} else {
				$this->session->set_flashdata('err', validation_errors());
			}
			redirect('admin/sale/'.$id,'refresh');
		} else {
			redirect('admin/sale','refresh');
		}
	}

	/**
	 * update sale order data
	 * @param $id
	 */
	public function update($id) {
		$this->render('admin/purchases/update');
	}

	/**
	 * delete sale
	 * @param $id
	 */
	public function delete($id) {
		if (!$this->ion_auth->is_admin()) { // if not admin
			$this->session->set_flashdata('err', 'You have no access');
			redirect('admin/sale','refresh');
		}

		if ($this->m_sale->is_completed($id)) {
			$this->m_sale->update_product_stock($id, 1);
		}
		$this->m_sale->delete($id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admin/sale','refresh');
	}

}

/* End of file Sale.php */
/* Location: ./application/controllers/admin/Sale.php */