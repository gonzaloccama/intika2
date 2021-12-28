<?php defined('BASEPATH') or exit('No direct script access allowed');

class Page_404 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['info'] = array(
			'page_title' => '404',
			'content' => 'page_404/error_404',
			'__script__' => 'page_404/script',
		);
		$this->load->view('customers/__layout__.php', $data);
	}
}
