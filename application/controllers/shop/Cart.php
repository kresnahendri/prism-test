<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model', 'm_category');
		$this->load->model('Customer_model', 'm_customer');
		$this->load->model('Product_model', 'm_product');
		$this->load->model('Sale_model', 'm_sale');
		$this->load->model('Email_model', 'm_email');
		$this->load->helper('text');
		$this->load->library('cart');
	}

	/**
	 * cart list
	 */
	public function index() {
		$data['title'] = 'Cart List';
		if ($this->cart->total_items() < 1) {
			$this->render_shop('shop/carts/empty');
		} else {
			$this->render_shop('shop/carts/index');
		}
	}

	/**
	 * add item to cart
	 */
	public function add() {
    $limit = $this->input->post('stock') + 1; // qty limit
		$this->form_validation->set_rules('qty', 'Quantity', 'required|greater_than[0]|less_than['.$limit.']'); // validation rules
		// initalizing data
		$data = [
      'id'      => $this->input->post('id'),
      'qty'     => $this->input->post('qty'),
      'price'   => $this->input->post('price'),
      'name'    => $this->input->post('name'),
      'img'			=> $this->input->post('img'),
      'stock'		=> $this->input->post('stock'),
		];

		if ($this->form_validation->run()) { // if pass
			$this->cart->insert($data); // add to cart
			$this->session->set_flashdata('success', 'Add to Cart is Sucessful');
			redirect('shop/cart','refresh');
		} else { // if not pass
			$this->session->set_flashdata('err', validation_errors());
			redirect('shop/product/detail/'.$data['id'],'refresh');
		}
		
	}

	/**
	 * update cart when qty of items was changed
	 */
	public function update() {
    $data = [];
    // get each data from cart
    for ($i=1; $i < $this->input->post('counter'); $i++) { 
	    $limit = $this->input->post($i.'[stock]') + 1;
			$this->form_validation->set_rules($i.'[qty]', 'Quantity '.$i, 'required|greater_than[0]|less_than['.$limit.']');
      array_push(
        $data, 
        [
          'rowid' => $this->input->post($i.'[rowid]'),
          'qty'   => $this->input->post($i.'[qty]'),
        ]
      );
    }
    // validate
    if ($this->form_validation->run()) { // if pass
	    $this->cart->update($data);
			$this->session->set_flashdata('success', 'Update Cart is Sucessful');
		} else { // if not pass
			$this->session->set_flashdata('err', validation_errors());
		}
		redirect('shop/cart','refresh');
  }

  /**
   * remove item by cart's row_id
   * @param $row_id
   */
  public function remove($row_id) {
  	$this->cart->remove($row_id);
  	redirect('shop/cart','refresh');
  }

  /**
   * emptying cart
   */
	public function destroy() {
		$this->cart->destroy();
		redirect('shop/cart','refresh');
	}

	/**
	 * checkout, insert data order, customer to db
	 */
	public function checkout() {
		if ($this->cart->total_items() < 1) {
			redirect('shop','refresh');
		}
		$this->form_validation->set_rules($this->m_customer->conf_customer_input_form_val); // customer rule
		$this->form_validation->set_rules('order_no', 'Order No', 'trim|required|min_length[9]|max_length[9]|is_unique[sale.order_no]');
		$counter = $this->input->post('counter');
		if ($this->form_validation->run()) { // if pass
			// customer handling
			$email = $this->input->post('email');
			if ($cust_db = $this->m_customer->get_where('email = "'.$email.'"')) { // update is existed
				$this->m_customer->update($cust_db->id, $this->input->post());
				$customer_id = $cust_db->id; // set customer id
			} else { // create if not exist
				$this->m_customer->insert($this->input->post());
				$customer_id = $this->db->insert_id(); // set customer id
			}

			// sale handling
			$sale_data = [
				'order_no' => $this->input->post('order_no'),
				'notes' => $this->input->post('notes'),
				'payment_method' => $this->input->post('payment_method'),
				'customer_id' => $customer_id,
			];
			$this->db->insert('sale', $sale_data);
			// insert sale datail
			$sale_id = $this->db->insert_id();
			$this->m_sale->insert_detail($counter, $sale_id);
			$this->cart->destroy(); // empty cart
			$sale = $this->m_sale->get_where('sale.id = '.$sale_id);
			$this->m_email->customer_order($email, $sale);
			$this->render_shop('shop/carts/thank');
		} else { // if not pass
			$this->session->set_flashdata('err', validation_errors());
			$this->render_shop('shop/carts/checkout');
		}
	}
}

/* End of file Cart.php */
/* Location: ./application/controllers/shop/Cart.php */