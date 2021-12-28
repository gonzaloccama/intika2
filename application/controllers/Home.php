<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation', 'email'));
		$this->load->model('admin/global_model', 'global');
	}

	public function index()
	{
		$data['info'] = array(
			'page_title' => 'Inicio',
			'content' => 'customers/home/index',
			'__script__' => 'customers/home/script',
		);

		$dt = array('status' => 1);

		$data['routes'] = $this->global->getRow('routes', $dt);
		$data['sliders'] = $this->global->getRow('slider', $dt);
		$data['ddis'] = $this->global->getRow('ddi');
		$data['settings'] = $this->global->getRow('settings', array('id' => 1));

//		$data['destinations'] = $this->global->getRow('destination');
//		$data['services'] = $this->global->getRow('services');

		$this->load->view('customers/__layout__.php', $data);
	}

	public function ask_information()
	{
		$this->form_validation->set_rules('route', 'route', 'trim');
		$this->form_validation->set_rules('names', '<b>nombres y apellidos</b>', 'required');
		$this->form_validation->set_rules('email', '<b>correo clectrónico</b>', 'required|valid_email');
		$this->form_validation->set_rules('country_code', 'country_code', 'trim');
		$this->form_validation->set_rules('celular', '<b>celular</b>', 'required|numeric|exact_length[9]');
		$this->form_validation->set_rules('message', 'message', 'trim');

		if ($this->form_validation->run() === FALSE):
			$errors = array(
				'route' => form_error('route'),
				'names' => form_error('names'),
				'email' => form_error('email'),
				'country_code' => form_error('country_code'),
				'celular' => form_error('celular'),
				'message' => form_error('message'),
			);

			echo json_encode($errors);
			$this->output->set_status_header(400);

		else:
			$data['routes_id'] = $this->input->post('route');
			$data['names'] = $this->input->post('names');
			$data['email'] = $this->input->post('email');
			$data['country_code'] = $this->input->post('country_code');
			$data['celular'] = $this->input->post('celular');
			$data['message'] = $this->input->post('message');
			$data['date_added'] = date_();

			$res = $this->global->insert('ask_about', $data);

			$send = $this->send_email($res, $data['email']);

			echo json_encode(array('id' => $res, 'send' => $send));

		endif;
	}

	public function resend_email()
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');

//		echo json_encode(array('id' => $id, 'email' => $email));

		$send = $this->send_email($id, $email);

		echo json_encode(array(
			'id' => $id,
			'send' => $send,
			'url' => base_url('admin/ask_about'),
		));
	}

	private function send_email($id = 0, $email)
	{

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.onelcn.com',
			'smtp_port' => 26,
			'smtp_user' => 'admin@onelcn.com',
			'smtp_pass' => 'Ccama8903ys',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'validation' => TRUE
		);

//		$config = array(
//			'protocol' => 'smtp',
//			'smtp_host' => 'mail.intikatravel.com.pe',
//			'smtp_port' => 587,
//			'smtp_user' => 'admin@intikatravel.com.pe',
//			'smtp_pass' => '1nt1k@tr@v3l',
//			'mailtype' => 'html',
//			'charset' => 'utf-8',
//			'validation' => TRUE,
//		);

		$this->email->initialize($config);

		$message = "
			
					<h2>Gracias por registrarte nos comunicaremos cons usted.</h2>
					
					<p>Email: " . $email . "</p>
					
					<p>Haga clic en el enlace de abajo para visitar nuestra.</p>
					<h4><a href='" . base_url() . "'>Intika</a></h4>
				
						";


		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user']);
		$this->email->to("$email");
		$this->email->subject('Novedades Intika');
		$this->email->message($message);

		if ($this->email->send()):

			$updateData['send_email'] = 1;

			$update = $this->global->updateData('ask_about', $updateData, array('id' => $id));

			return 'enviado';
		else:
			return $this->email->print_debugger();
		endif;
	}
}
