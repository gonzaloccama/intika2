<?php defined('BASEPATH') or exit('No direct script access allowed');

class Other_items_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function listTable($table)
	{
		$this->db->select("$table");
		$this->db->from($table);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function getRow($table, $dt = null, $count = false, $columns = null)
	{
		$this->db->select("$table.$columns");
		$this->db->from($table);

		if ($dt):
			$this->db->where($dt);
		endif;

		$query = $this->db->get();

		if (!$count):
			if ($query->result()) {
				if (isset($dt['id']) && !empty($dt['id'])) {
					return $query->row();
				} else {
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
}
