<?php defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
	private $_data = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form'));
		$this->load->library(array('form_validation', 'pagination_mido'));

		$this->load->model('admin/global_model', 'global');

		$this->_data = array(
			'page_title' => 'Sliders',
			'menu' => 4,
			'script' => 'admin/slider/__script__',
		);

		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect(base_url('/auth/login'));
		}
	}

//	public function index()
//	{
//		$data['info'] = array_merge(
//			array(
//				'sub_menu' => 1,
//				'__content__' => 'admin/slider/manager',
//			),
//			$this->_data
//		);
//
//		$data['sliders'] = $this->global->getRow('slider');
//		$data['num_sliders'] = $this->global->getRow('slider', null, true);
//
//		$this->load->view('admin/__layout__', $data);
//	}

	public function index()
	{

		$key = array(
			'keyword' => false,
			'field_1' => 'title',
			'sort' => 'date_added',
			'sort_up' => 'DESC',
		);

		if (isset($_POST['search']) && !empty($_POST['search'])):
			$key['keyword'] = $_POST['search'];
		endif;

		$dt = null;

		$limit = 5;

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/slider/index');
		$config['total_rows'] = $this->global->get_data($limit, $offset, $key, $dt, 1, 'slider');
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
				'__content__' => 'admin/slider/manager',
			),
			$this->_data
		);

		$data['sliders'] = $this->global->get_data($limit, $offset, $key, $dt, 0, 'slider');
		$data['num_sliders'] = $this->global->getRow('slider', null, true);


		$this->load->view('admin/__layout__', $data);

	}

	public function add()
	{
		$this->form_validation->set_rules('title', 'título', 'required|max_length[36]|min_length[5]');
		$this->form_validation->set_rules('description', 'description', 'required|max_length[72]|min_length[16]');
		$this->form_validation->set_rules('status', 'status', 'trim');

		if ($this->form_validation->run() == FALSE) :

			$data['info'] = array_merge(
				array(
					'sub_menu' => 2,
					'__content__' => 'admin/slider/add',
				),
				$this->_data
			);

			$this->load->view('admin/__layout__', $data);
		else :
			$saveData['title'] = set_value('title');
			$saveData['description_short'] = html_entity_decode(set_value('description'));
			$saveData['date_added'] = $this->date_();
			$saveData['status'] = set_value('status');

			$insert = $this->global->insert('slider', $saveData);

			$upload = $this->upload_file($insert);

			if ($upload['values']):
				$update['attachment'] = $upload['data'];
				$dt = array(
					'id' => $insert,
				);
				$this->global->updateData('slider', $update, $dt);
			endif;

			redirect(base_url() . 'admin/slider/edit/' . $insert, 'location');
		endif;
	}

	public function edit($id = 0)
	{
		if ($id):

			$this->form_validation->set_rules('title', 'título', 'required|max_length[36]|min_length[5]');
			$this->form_validation->set_rules('description', 'description', 'required|max_length[72]|min_length[16]');
			$this->form_validation->set_rules('status', 'status', 'trim');

			if ($this->form_validation->run() == FALSE) :

				$data['info'] = array_merge(
					array(
						'sub_menu' => 0,
						'__content__' => 'admin/slider/edit',
					),
					$this->_data
				);

				$dt = array('id' => $id);

				$data['slider'] = $this->global->getRow('slider', $dt);

				$this->load->view('admin/__layout__', $data);
			else :
				$updateData['title'] = set_value('title');
				$updateData['description_short'] = html_entity_decode(set_value('description'));
				$updateData['status'] = set_value('status');

				$row = array('id' => $id);

				if (isset($_FILES['attachment']['name']) && !empty($_FILES['attachment']['name'])):
					$upload = $this->upload_file($id);

					$attachment_old = $this->global->getRow('slider', $row);
					unlink($attachment_old->attachment);

					if ($upload['values']):
						$updateData['attachment'] = $upload['data'];
					endif;
				endif;

				$update = $this->global->updateData('slider', $updateData, $row);

				redirect(base_url() . 'admin/slider', 'location');

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
			'url' => base_url('admin/slider'),
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

		$config['upload_path'] = 'assets/admin/images/slider/' . $id;


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

	private function random_date()
	{
		date_default_timezone_set('America/Lima');

		$t = microtime(true);
		$micro = sprintf("%06d", ($t - floor($t)) * 1000000);
		$d = new DateTime(date('Y-m-d H:i:s.' . $micro, $t));

		return $d->format("Ymd-His-u");
	}

	private function date_()
	{
		date_default_timezone_set('America/Lima');
		return date('Y-m-d H:i:s');
	}
}
