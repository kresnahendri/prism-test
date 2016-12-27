<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model', 'm_product');
		$this->load->model('Supplier_model', 'm_supplier');
		$this->load->model('Purchase_model', 'm_purchase');
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !$this->ion_auth->is_purchase())) {
			redirect('auth/login','refresh');
		}
	}

	/**
	 * purchase list
	 */
	public function index() {
		$data['title'] = 'Purchase';
		$data['sub_title'] = 'List';
		$data['purchases'] = $this->m_purchase->get_all();
		$this->render('admin/purchases/index', $data);
	}

	/**
	 * purchase detail by id
	 * @param $id
	 */
	public function detail($id) {
		$data['title'] = 'Purchase Order';
		$data['sub_title'] = 'Detail';
		
		$data['purchase'] = $this->m_purchase->get_where('purchase.id = '.$id); // get sale by id
		$this->render('admin/purchases/detail', $data);
	}

	/**
	 * create new purchases order
	 */
	public function create() {
		$data['title'] = 'Purchase';
		$data['sub_title'] = 'Create';
		$data['order_no'] = $this->m_purchase->getnerate_order_number();

		// get options for select form
		$data['supplier_options'] = $this->m_supplier->get_supplier_for_select_form();
		$counter = $this->input->post('counter');

		// set form_validation rules
		$this->form_validation->set_rules($this->m_purchase->conf_purchase_input_form_val);
		for ($i=0; $i < $counter; $i++) { // products rules
			if ($this->input->post('product_id'.$i)) {
				$this->form_validation->set_rules('product_id'.$i, 'Product '.$i, 'required');
				$this->form_validation->set_rules('product_qty'.$i, 'Qty '.$i, 'required|numeric|greater_than[0]');
				$this->form_validation->set_rules('product_price'.$i, 'Price '.$i, 'required|numeric|greater_than[0]');
			}
		}
		$this->m_purchase->date_status_val(); // date status rules

		if ($this->form_validation->run()) { // if pass
			if ($counter == 1) { // product is empty
				$this->session->set_flashdata('err', 'Please add and select item that you want to sell!');
				$this->render('admin/purchases/create', $data);
			} else { // product is not empty
				$this->m_purchase->insert($this->input->post());
				$purchase_id = $this->db->insert_id();
				$this->m_purchase->insert_detail($counter, $purchase_id);
				if ($this->m_purchase->is_completed($purchase_id)) {
					$this->m_purchase->update_product_stock($purchase_id, 1);
				}
				$this->session->set_flashdata('success', 'Create Success');
				redirect('admin/purchase','refresh');
			}
		} else { // if not pass
			$this->render('admin/purchases/create', $data);
		}
	}

	/**
	 * update purchase order status
	 * @param $id
	 */
	public function update_status($id) {
		if ($this->input->post()) {
			$this->m_purchase->date_status_val(); // date status validation
			if ($this->form_validation->run()) {
				$this->m_purchase->update($id, $this->input->post());
			} else {
				$this->session->set_flashdata('err', validation_errors());
			}
			redirect('admin/purchase/'.$id,'refresh');
		} else {
			$this->session->set_flashdata('success', 'Update Success');
			redirect('admin/purchase','refresh');
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
	 * delete purchase
	 * @param $id
	 */
	public function delete($id) {
		if (!$this->ion_auth->is_admin()) {
			$this->session->set_flashdata('err', 'You have no access');
			redirect('admin/purchase','refresh');
		}

		if ($this->m_purchase->is_completed($id)) {
			$this->m_purchase->update_product_stock($id, -1);
		}
		$this->m_purchase->delete($id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admin/purchase','refresh');
	}

}

/* End of file Purchase.php */
/* Location: ./application/controllers/admin/Purchase.php */