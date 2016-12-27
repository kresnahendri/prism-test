<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_customer_input_form_val = [
		[
			'field' => 'name',
			'label' => 'Customer Name',
			'rules' => 'trim|required|min_length[3]',
		],
		[
			'field' => 'email',
			'label' => 'Customer Email',
			'rules' => 'required|valid_email',
		],
		[
			'field' => 'phone',
			'label' => 'Phone',
			'rules' => 'required|min_length[8]|numeric',
		],
		[
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required',
		],
		[
			'field' => 'city',
			'label' => 'City',
			'rules' => 'required',
		],
		[
			'field' => 'province',
			'label' => 'Province',
			'rules' => 'required',
		],
		[
			'field' => 'country',
			'label' => 'Country',
			'rules' => 'required',
		],
		[
			'field' => 'zip',
			'label' => 'Zip',
			'rules' => 'required|min_length[4]|numeric',
		]
	];

	/**
	 * get customer for select form: id, name
	 * @return array
	 */
	public function get_customer_for_select_form() {
		$customers = $this->get_all();
		$data[''] = '';
		foreach ($customers as $customer) {
			$data[$customer->id] = $customer->name;
		}
		return $data;
	}

	/**
	 * setting input value from form to db
	 * @param $input
	 * @return array
	 */
	private function set_input($input) {
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'province' => $this->input->post('province'),
			'country' => $this->input->post('country'),
			'zip' => $this->input->post('zip'),
		];

		return $data;
	}

	/**
	 * get all customer
	 * @return boolean
	 */
	public function get_all() {
		$query = $this->db->get('customer');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * get customer(s) with where condition
	 * @param $where
	 * @return boolean
	 */
	public function get_where($where) {
		$this->db->where($where);
		$query = $this->db->get('customer');
		if ($query->num_rows() > 1) {
			return $query->result();
		} else {
			return $query->row();
		}
		return false;
	}

	/**
	 * insert customer
	 * @param $input
	 * @return boolean
	 */
	public function insert($input) {
		$data = $this->set_input($input);
		return $this->db->insert('customer', $data);
	}

	/**
	 * update customer
	 * @param $id, $input
	 * @return boolean
	 */
	public function update($id, $input) {
		$data = $this->set_input($input);
		$this->db->where('id', $id);
		return $this->db->update('customer', $data);
	}

	/**
	 * delete customer
	 * @param $id
	 */
	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('customer');
	}

}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */