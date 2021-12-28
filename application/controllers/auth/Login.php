<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation', 'encryption', 'session'));

		$this->load->helper(array('auth_rules'));

		$this->load->model('auth/auth_model', 'auth');

		$this->load->model('admin/global_model', 'global');
	}

	public function index()
	{
		$data['info'] = array(
			'page_title' => 'Login',
			'content' => 'auth/login',
			'__script__' => 'auth/__script__',
		);

		$dt = array('id' => 1);
		$data['settings'] = $this->global->getRow('settings', $dt);

		$this->load->view('customers/__layout__', $data);
	}

	public function validate()
	{
		$this->form_validation->set_error_delimiters('', '');

		$rules = getLoginRules();

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() === FALSE) {
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {

			$saveData['email'] = set_value('email');
			$saveData['password'] = set_value('password');

			$res = $this->auth->authSession($saveData['email']);

			if (isset($res) && !empty($res)) {
				if (!($this->encryption->decrypt($res->password) == $saveData['password'])) {
					echo json_encode(array('msg' => 'El usuario o la contraseña es incorrecta'));
					$this->output->set_status_header(401);
					exit;
				}
			} else {
				echo json_encode(array('msg' => 'El usuario o la contraseña es incorrecta'));
				$this->output->set_status_header(401);
				exit;
			}

			$data = array(
				'id' => $res->id,
				'name' => $res->name,
//				'name' => $res->name . ' ' . $res->last_name_first . ' ' . $res->last_name_second,
				'email' => $res->email,
				'user_image' => $res->user_image,
				'role_id' => $res->role_id,
				'is_logged' => TRUE
			);

			$red_uri = 'admin/routes';

			$this->session->set_userdata($data);
			$this->session->set_flashdata('message', "Hola <b>{$this->session->userdata('name')},</b> bienvenido al sistema.");

			echo json_encode(array("url" => base_url() . $red_uri));
		}
	}

	public function logout()
	{
		$session_destroy = array(
			'id',
			'name',
//			'last_name_first',
//			'last_name_second',
			'email',
			'user_image',
			'role_id',
			'is_logged');

		$this->session->unset_userdata($session_destroy);
		$this->session->sess_destroy();

		redirect(base_url());
	}
}
