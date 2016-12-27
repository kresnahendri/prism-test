<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_review_model extends CI_Model {

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_review_input_form_val = [
		[
			'field' => 'author',
			'label' => 'Author',
			'rules' => 'trim|required|min_length[3]',
		],
		[
			'field' => 'email',
			'label' => 'Author Email',
			'rules' => 'required|valid_email',
		],
		[
			'field' => 'content',
			'label' => 'Reviews',
			'rules' => 'required',
		],
	];

	/**
	 * setting input value from form to db
	 * @param $input
	 * @return array
	 */
	private function set_input($input) {
		$data = [
			'author' => $this->input->post('author'),
			'email' => $this->input->post('email'),
			'content' => $this->input->post('content'),
			'product_id' => $this->input->post('product_id'),
		];

		if ($this->input->post('active') == NULL) {
			$data['active'] = 0;
		} else {
			$data['active'] = $this->input->post('active');
		}

		return $data;
	}

	/**
	 * get all reviews
	 * @return boolean
	 */
	public function get_all() {
		$query = $this->db->get('product_review');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * get review(s) with where condition
	 * @param $where
	 * @return boolean
	 */
	public function get_where($where, $limit = NULL) {
		$this->db->where($where);
		$query = $this->db->get('product_review');
		
		if ($query->num_rows() > 0) {
			if ($limit == 1) {
				return $query->row();
			}
			return $query->result();
		}
		return false;
	}

	/**
	 * insert review
	 * @param $input
	 * @return boolean
	 */
	public function insert($input) {
		$data = $this->set_input($input);
		return $this->db->insert('product_review', $data);
	}

	/**
	 * update review
	 * @param $id, $input
	 * @return boolean
	 */
	public function update($id, $input) {
		$data = $this->set_input($input);
		$this->db->where('id', $id);
		return $this->db->update('product_review', $data);
	}

	/**
	 * delete review
	 * @param $id
	 */
	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('product_review');
	}

}

/* End of file Review_model.php */
/* Location: ./application/models/Review_model.php */