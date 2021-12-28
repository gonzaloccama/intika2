<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // $this->load->library('pagination');

        // $this->load->helper('url');

        // $this->load->model('model');

        // $this->load->library('session');

		if (!$this->session->userdata('is_logged') || !($this->session->userdata('role_id') == 1)){
			redirect(base_url('/auth/login'));
		}
    }

    function index()
    {
    	$data['info'] = array(
    		'page_title' => 'Dashboard',
			'menu' => 1,
			'__content__' => 'admin/dashboard/manager',
			'script' => 'admin/dashboard/__script__',
		);

		$this->load->view('admin/__layout__', $data);
    }
}
