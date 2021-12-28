<?php defined('BASEPATH') or exit('No direct script access allowed');

class Routes_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function listTable($table)
	{

	}

	public function get_data($limit = 0, $offset = 0, $key = null, $dt = null, $count = 0, $table = null)
	{
		$this->db->select("$table.*");
		$this->db->from("$table");

		if ($key['keyword'] != '') {
			$keyword = $key['keyword'];
			$field = $key['field_1'];

			if ($keyword) {
				$this->db->like("$table.$field", $keyword);
			}
		}

		if ($dt) {
			$this->db->where($dt);
		}

		if ($count) {

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				return $query->num_rows();
			} else {
				return 0;
			}
		} else {
			$this->db->limit($limit, $offset);

			if (isset($key['sort']) && !empty($key['sort'])):

				$sort = $key['sort'];
				$sort_up = $key['sort_up'];

				$this->db->order_by("$table.$sort $sort_up");
			endif;

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result_array();
			}

		}

		return array();
	}


}

