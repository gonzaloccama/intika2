<?php defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
	private $_data = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form'));
		$this->load->library(array('form_validation', 'pagination_mido'));

		$this->load->model('admin/global_model', 'global');

		$this->_data = array(
			'menu' => 8,
			'script' => 'admin/settings/__script__',
		);

		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)) {
			redirect(base_url('/auth/login'));
		}
	}

	public function index()
	{
		redirect(base_url() . 'admin/settings/user_manual', 'location');
	}

	public function general()
	{
		$this->form_validation->set_rules('name', '<b>nombre</b>', 'required');
		$this->form_validation->set_rules('name_up', '<b>nombre append</b>', 'required');
		$this->form_validation->set_rules('email[]', '<b>email</b>', 'trim');
		$this->form_validation->set_rules('phone[]', 'phone', 'trim');
		$this->form_validation->set_rules('address', '<b>address</b>', 'trim');
		$this->form_validation->set_rules('postal_code', 'postal_code', 'trim');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array_merge(
				array(
					'page_title' => 'Información General',
					'sub_menu' => 1,
					'setting_menu' => 1,
					'setting_title' => 'Información General',
					'settings_view' => 'admin/settings/general',
					'__content__' => 'admin/settings/manager',
				),
				$this->_data
			);

			$data['settings'] = $this->global->getRow('settings', array('id' => 1));

			$this->load->view('admin/__layout__', $data);
		else :
			$row = array('id' => 1);
			$temp = $this->global->getRow('settings', $row);

			$saveData['name'] = set_value('name');
			$saveData['name_up'] = set_value('name_up');
			$saveData['email'] = json_encode(set_value('email'));
			$saveData['phone'] = json_encode(set_value('phone'));
			$saveData['address'] = set_value('address');
			$saveData['postal_code'] = set_value('postal_code');

			if (!$temp):
				$saveData['date_added'] = date_();
				$insert = $this->global->insert('settings', $saveData);
			else:
				$saveData['last_modified'] = date_();
				$update = $this->global->updateData('settings', $saveData, $row);
			endif;

			if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])):
				if (isset($temp->logo) && !empty($temp->logo)):
					unlink($temp->logo);
				endif;
				$upload = $this->upload_file('logo', 'logo');
				if ($upload['values']):
					$updateData['logo'] = $upload['data'];
				endif;
				$update = $this->global->updateData('settings', $updateData, $row);
			endif;

			redirect(base_url() . 'admin/settings/general', 'location');
		endif;
	}

	public function social()
	{
		$this->form_validation->set_rules('social_media[]', '<b>Media Social</b>', 'trim');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array_merge(
				array(
					'page_title' => 'Media Social',
					'sub_menu' => 1,
					'setting_menu' => 2,
					'setting_title' => 'Media Social',
					'settings_view' => 'admin/settings/social',
					'__content__' => 'admin/settings/manager',
				),
				$this->_data
			);

			$dt = array('id' => 1);
			$data['settings'] = $this->global->getRow('settings', $dt);

			$this->load->view('admin/__layout__', $data);
		else :
			$row = array('id' => 1);
			$temp = $this->global->getRow('settings', $row);

			$saveData['social_media'] = json_encode(set_value('social_media'));

			if (!$temp):
				$saveData['date_added'] = date_();
				$insert = $this->global->insert('settings', $saveData);
			else:
				$saveData['last_modified'] = date_();
				$update = $this->global->updateData('settings', $saveData, $row);
			endif;

			redirect(base_url() . 'admin/settings/social', 'location');
		endif;
	}

	public function other()
	{
		$this->form_validation->set_rules('abstract', '<b>resumen</b>', 'required');
		$this->form_validation->set_rules('mission', '<b>misión</b>', 'required');
		$this->form_validation->set_rules('vision', '<b>visión</b>', 'required');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array_merge(
				array(
					'page_title' => 'Otras configuraciones',
					'sub_menu' => 1,
					'setting_menu' => 3,
					'setting_title' => 'Otras configuraciones',
					'settings_view' => 'admin/settings/other',
					'__content__' => 'admin/settings/manager',
				),
				$this->_data
			);

			$dt = array('id' => 1);
			$data['settings'] = $this->global->getRow('settings', $dt);

			$this->load->view('admin/__layout__', $data);
		else :
			$row = array('id' => 1);
			$temp = $this->global->getRow('settings', $row);

			$saveData['abstract'] = html_entity_decode(set_value('abstract'));
			$saveData['mission'] = html_entity_decode(set_value('mission'));
			$saveData['vision'] = html_entity_decode(set_value('vision'));

			if (!$temp):
				$saveData['date_added'] = date_();
				$insert = $this->global->insert('settings', $saveData);
			else:
				$saveData['last_modified'] = date_();
				$update = $this->global->updateData('settings', $saveData, $row);
			endif;

			redirect(base_url() . 'admin/settings/other', 'location');
		endif;
	}

	public function logo()
	{
		$this->form_validation->set_rules('logo_white', '<b>logo</b>', 'trim');

		if ($this->form_validation->run() == FALSE) :
			$data['info'] = array_merge(
				array(
					'page_title' => 'Logo blanco',
					'sub_menu' => 1,
					'setting_menu' => 4,
					'setting_title' => 'Logo blanco',
					'settings_view' => 'admin/settings/logo_white',
					'__content__' => 'admin/settings/manager',
				),
				$this->_data
			);

			$dt = array('id' => 1);
			$data['settings'] = $this->global->getRow('settings', $dt);

			$this->load->view('admin/__layout__', $data);
		else :
			$row = array('id' => 1);
			$temp = $this->global->getRow('settings', $row);

			if (!$temp):
				$saveData['date_added'] = date_();
				$insert = $this->global->insert('settings', $saveData);
			else:
				$saveData['last_modified'] = date_();
				$update = $this->global->updateData('settings', $saveData, $row);
			endif;

			if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])):
				if (isset($temp->logo_white) && !empty($temp->logo_white)):
					unlink($temp->logo_white);
				endif;
				$upload = $this->upload_file('logo', 'logo_white');
				if ($upload['values']):
					$updateData['logo_white'] = $upload['data'];
				endif;
				$update = $this->global->updateData('settings', $updateData, $row);
			endif;

			redirect(base_url() . 'admin/settings/logo', 'location');
		endif;
	}

	public function user_manual()
	{
		$data['info'] = array_merge(
			array(
				'page_title' => 'Manual de usuario',
				'sub_menu' => 2,
				'__content__' => 'admin/settings/user_manual',
			),
			$this->_data
		);

		$data['manual'] = 'assets/admin/documents/manual.pdf';

		$this->load->view('admin/__layout__', $data);
	}

	private function upload_file($file, $_name)
	{

		$file_name = $_FILES["$file"]['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $_name . '.' . $extension_img;

		$config['upload_path'] = 'assets/admin/images/settings/' . $_name;

		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000';
		$config['quality'] = '60%';
		$config['file_name'] = $user_img_profile;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("$file")) {
			return array('values' => false, 'data' => $this->upload->display_errors());
		} else {
			return array('values' => true, 'data' => $config['upload_path'] . '/' . $user_img_profile);
		}
	}
}
