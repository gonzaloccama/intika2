<?php defined('BASEPATH') or exit('No direct script access allowed');

class Routes extends CI_Controller
{
	private $_data = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form'));
		$this->load->library(array('form_validation', 'pagination_mido'));

		$this->load->model('admin/global_model', 'global');
		$this->load->model('admin/routes_model', 'routes');

		$this->_data = array(
			'page_title' => 'Rutas',
			'menu' => 5,
			'script' => 'admin/routes/__script__',
		);

		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect(base_url('/auth/login'));
		}
	}

	public function index()
	{

		$key = array(
			'keyword' => false,
			'field_1' => 'name',
			'sort' => 'date_added',
			'sort_up' => 'DESC',
		);

		if (isset($_POST['search']) && !empty($_POST['search'])):
			$key['keyword'] = $_POST['search'];
		endif;


		$data['num_routes'] = $this->global->getRow('routes', null, true);


		$dt = null;

		$limit = 5;

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/routes/index');
		$config['total_rows'] = $this->global->get_data($limit, $offset, $key, $dt, 1, 'routes');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;


		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';

		$config['next_link'] = '<i class="w-4 h-4" data-feather="chevron-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="w-4 h-4" data-feather="chevron-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['first_link'] = '<i class="w-4 h-4" data-feather="chevrons-left"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tagl_close'] = '</li>';

		$config['last_link'] = '<i class="w-4 h-4" data-feather="chevrons-right"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tagl_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination_mido->initialize($config);

		$data['total_rows'] = $config['total_rows'];

		$data['pagelinks'] = $this->pagination_mido->create_links();


		$data['info'] = array_merge(
			array(
				'sub_menu' => 1,
				'__content__' => 'admin/routes/manager',
			),
			$this->_data
		);

		$data['routes'] = $this->global->get_data($limit, $offset, $key, $dt, 0, 'routes');
		$data['destinations'] = $this->global->getRow('destination');

		$this->load->view('admin/__layout__', $data);

	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'nombre de la ruta', 'required|max_length[40]|min_length[5]');
		$this->form_validation->set_rules('description', 'descripción', 'required|max_length[144]|min_length[16]');
		$this->form_validation->set_rules('price', 'precio', 'required');
		$this->form_validation->set_rules('destination[]', 'intenerario', 'required');
		$this->form_validation->set_rules('services[]', 'servicios', 'required');
		$this->form_validation->set_rules('findings[]', 'recomendaciones', 'required');
		$this->form_validation->set_rules('opening', 'apertura', 'required');
		$this->form_validation->set_rules('ending', 'final', 'required');
		$this->form_validation->set_rules('status', 'status', 'trim');

		if ($this->form_validation->run() == FALSE) :

			$data['info'] = array_merge(
				array(
					'sub_menu' => 2,
					'__content__' => 'admin/routes/add',
				),
				$this->_data
			);
			$other_items = $this->global->getRow('other_items', array('id' => 1));

			$data['destinations'] = json_decode($other_items->destinations);
			$data['services'] = json_decode($other_items->services);
			$data['findings'] = json_decode($other_items->findings);

			$this->load->view('admin/__layout__', $data);
		else :
			$saveData['name'] = set_value('name');
			$saveData['description'] = html_entity_decode(set_value('description'));
			$saveData['price'] = set_value('price');
			$saveData['destination'] = json_encode(set_value('destination'));
			$saveData['findings'] = json_encode(set_value('findings'));
			$saveData['services'] = json_encode(set_value('services'));
			$saveData['opening'] = set_value('opening');
			$saveData['ending'] = set_value('ending');
			$saveData['date_added'] = date_();
			$saveData['status'] = set_value('status');

			$insert = $this->global->insert('routes', $saveData);

			$dt = array(
				'id' => $insert,
			);

			$attachment = $this->upload_file($insert);

			if ($attachment['values']):
				$update['attachment'] = $attachment['data'];
				$this->global->updateData('routes', $update, $dt);
			endif;

			redirect(base_url() . 'admin/routes/edit/' . $insert, 'location');
		endif;
	}


	public function edit($id = 0)
	{
		if ($id):
			$this->form_validation->set_rules('name', 'nombre de la ruta', 'required|max_length[35]|min_length[5]');
			$this->form_validation->set_rules('description', 'descripción', 'required|max_length[100]|min_length[16]');
			$this->form_validation->set_rules('price', 'precio', 'required');
			$this->form_validation->set_rules('destination[]', 'intenerario', 'required');
			$this->form_validation->set_rules('services[]', 'servicios', 'required');
			$this->form_validation->set_rules('findings[]', 'recomendaciones', 'required');
			$this->form_validation->set_rules('opening', 'apertura', 'required');
			$this->form_validation->set_rules('ending', 'final', 'required');
			$this->form_validation->set_rules('status', 'status', 'trim');

			if ($this->form_validation->run() == FALSE) :

				$data['info'] = array_merge(
					array(
						'sub_menu' => 0,
						'__content__' => 'admin/routes/edit',
					),
					$this->_data
				);

				$dt = array('id' => $id);
				$other_items = $this->global->getRow('other_items', array('id' => 1));

				$data['destinations'] = json_decode($other_items->destinations);
				$data['services'] = json_decode($other_items->services);
				$data['findings'] = json_decode($other_items->findings);

				$data['routes'] = $this->global->getRow('routes', $dt);

				$this->load->view('admin/__layout__', $data);
			else :
				$updateData['name'] = set_value('name');
				$updateData['description'] = html_entity_decode(set_value('description'));
				$updateData['price'] = set_value('price');
				$updateData['destination'] = json_encode(set_value('destination'));
				$updateData['services'] = json_encode(set_value('services'));
				$updateData['findings'] = json_encode(set_value('findings'));
				$updateData['opening'] = set_value('opening');
				$updateData['ending'] = set_value('ending');
				$updateData['last_modified'] = date_();
				$updateData['status'] = set_value('status');

				$row = array('id' => $id);

				if (isset($_FILES['attachment']['name']) && !empty($_FILES['attachment']['name'])):
					$upload = $this->upload_file($id, 'attachment');

					$attachment_old = $this->global->getRow('routes', $row);
					unlink($attachment_old->attachment);

					if ($upload['values']):
						$updateData['attachment'] = $upload['data'];
					endif;
				endif;

				$update = $this->global->updateData('routes', $updateData, $row);

				redirect(base_url() . 'admin/routes', 'location');
			endif;
		endif;
	}

	public function itinerary($id = 0)
	{
		if ($id):
			$this->form_validation->set_rules('itinerary[][]', 'itinerary', 'trim');

			if ($this->form_validation->run() == FALSE) :

				$data['info'] = array_merge(
					array(
						'sub_menu' => 0,
						'__content__' => 'admin/routes/itinerary',
					),
					$this->_data
				);

				$dt = array('id' => $id);

				$data['routes'] = $this->global->getRow('routes', $dt);

				$this->load->view('admin/__layout__', $data);

			else:
				$save['itinerary'] = json_encode(set_value('itinerary'));
				$save['last_modified'] = date_();
				$row = array('id' => $id);
				$update = $this->global->updateData('routes', $save, $row);
//				var_dump($save);
				redirect(base_url() . 'admin/routes', 'location');
			endif;
		endif;
	}

	public function delete($id)
	{
		$table = $this->uri->segment(2);

		$dt = array('id' => $id);

		$attachment = $this->global->getRow($table, $dt);

		if (isset($attachment->attachment) && !empty($attachment->attachment)):
			unlink($attachment->attachment);
		endif;

		$this->rowdelete($table, $dt);

		echo json_encode(array(
			'url' => base_url('admin/routes'),
			'table' => $table,
			'id' => $id,
			"statusCode" => 200,
		));
	}

	private function rowdelete($table = null, $td = null)
	{
		if ($td) {
			$this->global->delete_rows($table, $td);
		}
	}

	private function upload_file($id)
	{
		$ram = $this->random_date();
		$file_name = $_FILES['attachment']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$config['upload_path'] = 'assets/admin/images/routes/' . $id;

		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000';
		$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('attachment')) {
			return array('values' => false, 'data' => $this->upload->display_errors());

		} else {
			return array('values' => true, 'data' => $config['upload_path'] . '/' . $user_img_profile);
		}
	}

	public function getdata($offset = null)
	{

		$key = array(
			'keyword' => trim($this->input->post('search_text')),//
		);

		$dt = null;

		$limit = 3;


		$asks = $this->routes->get_data($limit, $offset, $key, $dt, 0, 'ask_about');
//		$data['destinations'] = $this->global->getRow('destination');


		echo json_encode($asks);

	}

	public function export_excel()
	{
		$data['routes'] = $this->global->getRow('routes');
		$data['services'] = $this->global->getRow('services');
		$data['destinations'] = $this->global->getRow('destination');

		$timestamp = $this->random_date(false);
		$filename = 'Export_rutas_' . $timestamp . '.xls';

		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");

		$this->load->view('admin/routes/excel_export', $data);
	}

	private function random_date($extend = true)
	{
		date_default_timezone_set('America/Lima');

		$t = microtime(true);
		$micro = sprintf("%06d", ($t - floor($t)) * 1000000);
		$d = new DateTime(date('Y-m-d H:i:s.' . $micro, $t));

		if ($extend):
			return $d->format("Ymd-His-u");
		else:
			return $d->format("Ymd");
		endif;
	}


}
