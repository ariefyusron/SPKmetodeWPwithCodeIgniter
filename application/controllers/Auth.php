<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!empty($this->session->userdata('user'))) {
			redirect('app');
		}
	}

	public function index($view = 'login')
	{
		$data['page'] = $view;
		$data['title'] = 'App Spk | '.ucfirst($view);
		$data['notif'] = $this->session->flashdata('notif');

		$this->load->view('auth/view_content',$data);
	}

	public function buatakun()
	{
		$data = $this->input->post(array('email','username','password','passwordlagi'));
		$this->model_auth->buat_akun($data);		
	}
	
	public function ceklogin()
	{
		$data = $this->input->post(array('email','username','password','passwordlagi'));
		$this->model_auth->login($data);
	}
}