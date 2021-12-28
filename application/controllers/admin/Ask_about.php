<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ask_about extends CI_Controller
{
	private $_data = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form'));
		$this->load->library(array('form_validation', 'pagination_mido'));

		$this->load->model('admin/global_model', 'global');
		$this->load->model('admin/ask_about_model', 'ask_about');

		$this->_data = array(
			'page_title' => 'Solicitudes',
			'menu' => 6,
			'script' => 'admin/ask_about/__script__',
		);

		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect(base_url('/auth/login'));
		}
	}

//	public function index()
//	{
//		$data['info'] = array_merge(
//			array(
//				'sub_menu' => 0,
//				'__content__' => 'admin/ask_about/manager',
//			),
//			$this->_data
//		);
//
//		$data['ask_abouts'] = $this->global->getRow('ask_about');
//		$data['routes'] = $this->global->getRow('routes');
//		$data['num_asks'] = $this->global->getRow('ask_about', null, true);
//
//		$this->load->view('admin/__layout__', $data);
//	}

	public function index()
	{
		$key = array(
			'keyword' => false,
			'field_1' => 'names',
			'sort' => 'date_added',
			'sort_up' => 'DESC'
		);

		if (isset($_POST['search']) && !empty($_POST['search'])):
			$key['keyword'] = $_POST['search'];
		endif;


		$data['routes'] = $this->global->getRow('routes');
		$data['num_asks'] = $this->global->getRow('ask_about', null, true);

		$dt = null;

		$limit = 5;

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/ask_about/index');
		$config['total_rows'] = $this->global->get_data($limit, $offset, $key, $dt, 1, 'ask_about');
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
				'sub_menu' => 0,
				'__content__' => 'admin/ask_about/manager',
			),
			$this->_data
		);

		$data['ask_abouts'] = $this->global->get_data($limit, $offset, $key, $dt, 0, 'ask_about');
		$data['destinations'] = $this->global->getRow('destination');

		$this->load->view('admin/__layout__', $data);

	}

	public function export_excel()
	{
		$data['asks'] = $this->ask_about->listTable('ask_about');

		$timestamp = $this->random_date(false);
		$filename = 'Export_solicitud_' . $timestamp . '.xls';

		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");

		$this->load->view('admin/ask_about/excel_export', $data);
	}

	public function delete($id)
	{
		$table = $this->uri->segment(2);

		$dt = array('id' => $id);

		$this->rowdelete($table, $dt);

		echo json_encode(array(
			'url' => base_url('admin/ask_about'),
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
