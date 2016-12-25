<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_category_input_form_val = [
		[
			'field' => 'name',
			'label' => 'Supplier Name',
			'rules' => 'trim|required|min_length[3]',
		],
		[
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required|min_length[5]',
		]
	];

	/**
	 * get category for select form: id, name
	 * @return array
	 */
	public function get_category_for_select_form() {
		$categories = $this->get_all();
		$data[''] = '';
		foreach ($categories as $cat) {
			$data[$cat->id] = $cat->name;
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
			'description' => $this->input->post('description'),
		];

		return $data;
	}

	/**
	 * get all categories
	 * @return boolean
	 */
	public function get_all() {
		$query = $this->db->get('category');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * get category(s) with where condition
	 * @param $where
	 * @return boolean
	 */
	public function get_where($where) {
		$this->db->where($where);
		$query = $this->db->get('category');
		if ($query->num_rows() > 1) {
			return $query->result();
		} else {
			return $query->row();
		}
		return false;
	}

	/**
	 * insert category
	 * @param $input
	 * @return bool
	 */
	public function insert($input) {
		$data = $this->set_input($input);
		return $this->db->insert('category', $data);
	}

	/**
	 * update category
	 * @param $id, $input
	 * @return bool
	 */
	public function update($id, $input) {
		$data = $this->set_input($input);
		$this->db->where('id', $id);
		return $this->db->update('category', $data);
	}

	/**
	 * delete category
	 * @param $id
	 * @return bool
	 */
	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('category');
	}

}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */