<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

	public function getRoutes($table, $dt = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($dt):
			$this->db->where($dt);
		endif;

		$query = $this->db->get();

		if ($query->result()) {
			if (isset($dt['id']) && !empty($dt['id'])) {
				return $query->row();
			} else {
				return $query->result();
			}
		} else {
			return false;
		}
	}
}

