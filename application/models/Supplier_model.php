<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_supplier_input_form_val = [
		[
			'field' => 'name',
			'label' => 'Supplier Name',
			'rules' => 'trim|required|min_length[3]',
		],
		[
			'field' => 'email',
			'label' => 'Supplier Email',
			'rules' => 'required|valid_email',
		],
		[
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required|min_length[5]',
		]
	];

	/**
	 * get supplier for select form
	 * @return array
	 */
	public function get_supplier_for_select_form() {
		$suppliers = $this->get_all();
		$data[''] = '';
		foreach ($suppliers as $supplier) {
			$data[$supplier->id] = $supplier->name;
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
			'description' => $this->input->post('description'),
		];

		return $data;
	}

	/**
	 * get all suppliers
	 * @return boolean
	 */
	public function get_all() {
		$query = $this->db->get('supplier');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * get supplier(s) with where condition
	 * @param $where
	 * @return boolean
	 */
	public function get_where($where) {
		$this->db->where($where);
		$query = $this->db->get('supplier');
		if ($query->num_rows() > 1) {
			return $query->result();
		} else {
			return $query->row();
		}
		return false;
	}

	/**
	 * insert data
	 * @param $input
	 * @return boolean
	 */
	public function insert($input) {
		$data = $this->set_input($input);
		return $this->db->insert('supplier', $data);
	}

	/**
	 * update data
	 * @param $id, $input
	 * @return boolean
	 */
	public function update($id, $input) {
		$data = $this->set_input($input);
		$this->db->where('id', $id);
		return $this->db->update('supplier', $data);
	}

	/**
	 * delete data
	 * @param $id
	 */
	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('supplier');
	}

}

/* End of file Supplier_model.php */
/* Location: ./application/models/Supplier_model.php */