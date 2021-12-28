<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ask_about_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function listTable($table)
	{
		$this->db->select("$table.id, $table.names, $table.email, 
        $table.celular, routes.name, $table.send_email");
		$this->db->from($table);

		$this->db->join("routes", "routes.id = $table.routes_id", "left");

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}
}

