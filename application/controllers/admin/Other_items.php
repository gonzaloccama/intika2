<?php defined('BASEPATH') or exit('No direct script access allowed');

class Other_items extends CI_Controller
{
	private $_data = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form'));
		$this->load->library(array('form_validation', 'pagination_mido'));

		$this->load->model('admin/global_model', 'global');
		$this->load->model('admin/other_items_model', 'other');

		$this->_data = array(
			'menu' => 7,
			'script' => 'admin/other_items/__script__',
		);

		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect(base_url('/auth/login'));
		}
	}

	public function index()
	{

	}

	public function destinations()
	{
		$this->form_validation->set_rules('destinations[]', 'Nombre del destino', 'trim|max_length[40]|min_length[3]');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array_merge(
				array(
					'page_title' => 'Destinos',
					'sub_menu' => 0,
					'other_menu' => 1,
					'other_title' => 'Destinos (Lugares Turisticos)',
					'other_name' => 'Destino',
					'column' => 'destinations',
					'__content__' => 'admin/other_items/manager',
				),
				$this->_data
			);

			$dt = array('id' => 1);

			$destinations = $this->other->getRow('other_items', $dt, false, 'destinations');
			$data['columns'] = null;

			if ($destinations):
				$data['columns'] = json_decode($destinations->destinations);
			endif;

			$this->load->view('admin/__layout__', $data);
		else :

			$updateData['destinations'] = json_encode(set_value('destinations'));

			$row = array('id' => 1);

			$destinations = $this->global->getRow('other_items', $row);

			if (!$destinations):
				$updateData['date_added'] = date_();
				$insert = $this->global->insert('other_items', $updateData);
			else:
				$updateData['last_modified'] = date_();
				$update = $this->global->updateData('other_items', $updateData, $row);
			endif;

			redirect(base_url() . 'admin/other_items/destinations', 'location');
		endif;
	}

	public function findings()
	{
		$this->form_validation->set_rules('findings[]', 'Nombre del recomendaciones', 'trim|max_length[40]|min_length[3]');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array_merge(
				array(
					'page_title' => 'Recomendaciones',
					'sub_menu' => 0,
					'other_menu' => 2,
					'other_title' => 'Recomendaciones de la Ruta',
					'other_name' => 'Recomendaciones',
					'column' => 'findings',
					'__content__' => 'admin/other_items/manager',
				),
				$this->_data
			);

			$dt = array('id' => 1);

			$findings = $this->other->getRow('other_items', $dt, false, 'findings');
			$data['columns'] = null;

			if ($findings):
				$data['columns'] = json_decode($findings->findings);
			endif;

			$this->load->view('admin/__layout__', $data);
		else :

			$updateData['findings'] = json_encode(set_value('findings'));

			$row = array('id' => 1);

			$findings = $this->global->getRow('other_items', $row);

			if (!$findings):
				$updateData['date_added'] = date_();
				$insert = $this->global->insert('other_items', $updateData);
			else:
				$updateData['last_modified'] = date_();
				$update = $this->global->updateData('other_items', $updateData, $row);
			endif;

			redirect(base_url() . 'admin/other_items/findings', 'location');
		endif;
	}

	public function services()
	{
		$this->form_validation->set_rules('services[]', 'Nombre del servicios', 'trim|max_length[40]|min_length[3]');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array_merge(
				array(
					'page_title' => 'Servicios',
					'sub_menu' => 0,
					'other_menu' => 3,
					'other_title' => 'Servicios de la Ruta Turistica',
					'other_name' => 'Servicios',
					'column' => 'services',
					'__content__' => 'admin/other_items/manager',
				),
				$this->_data
			);

			$dt = array('id' => 1);

			$services = $this->other->getRow('other_items', $dt, false, 'services');
			$data['columns'] = null;

			if ($services):
				$data['columns'] = json_decode($services->services);
			endif;

			$this->load->view('admin/__layout__', $data);
		else :

			$updateData['services'] = json_encode(set_value('services'));

			$row = array('id' => 1);

			$services = $this->global->getRow('other_items', $row);

			if (!$services):
				$updateData['date_added'] = date_();
				$insert = $this->global->insert('other_items', $updateData);
			else:
				$updateData['last_modified'] = date_();
				$update = $this->global->updateData('other_items', $updateData, $row);
			endif;

			redirect(base_url() . 'admin/other_items/services', 'location');
		endif;
	}
}
