<?php defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getRow($table, $dt = null, $count = false, $col = false)
	{
		if ($col):
			$this->db->select("$table.$col");
		else:
			$this->db->select("$table.*");
		endif;

		$this->db->from($table);

		if ($dt):
			$this->db->where($dt);
		endif;

		$query = $this->db->get();

		if (!$count):
			if ($query->result()) {
				if (isset($dt['id']) && !empty($dt['id'])) {
					return $query->row();
				}
				else {
					return $query->result();
				}
			} else {
				return false;
			}
		else:
			if ($query->result()) {
				return $query->num_rows();
			} else {
				return 0;
			}
		endif;
	}

	public function delete_rows($table, $dt = null)
	{
		$this->db->where($dt);
		$this->db->delete("$table");
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function updateData($table, $data, $dt)
	{
		$this->db->where($dt);
		$this->db->update($table, $data);
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
				return $query->result();
			}

		}

		return array();
	}
}
