<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user'))) {
			redirect();
		}
	}

	public function index($view = 'data')
	{
		$email = $this->model_app->email($this->session->userdata('user'));

		$data['page'] = $view;
		$data['title'] = 'App Spk | '.ucfirst($view);
		$data['notif'] = $this->session->flashdata('notif');
		$data['kriteria'] = $this->model_app->data_kriteria($email);
		$data['alternatif'] = $this->model_app->data_alternatif($email);
		$data['convert'] = $this->model_app->convert_nilai_w($email);
		$data['cek_pencocokan'] = $this->model_app->cek_data_pencocokan_kriteria($email);

		$this->load->view('app/view_content',$data);
	}

	public function tambahkriteria()
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$data = $this->input->post(array('nama','jenis','bobot'));
		$id = $this->model_app->id_kriteria($email);

		$this->model_app->tambah_kriteria($id,$email,$data);
	}

	public function editkriteria($id)
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$data = $this->input->post(array('nama','jenis','bobot'));

		$this->model_app->edit_kriteria($id,$email,$data);
	}

	public function hapuskriteria($id)
	{
		$email = $this->model_app->email($this->session->userdata('user'));

		$this->model_app->hapus_kriteria($email,$id);
	}

	public function tambahsubkriteria()
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$data = $this->input->post(array('id','deskripsi','keterangan','nilai'));

		$this->model_app->tambah_sub_kriteria($email,$data);
	}

	public function editsubkriteria($id)
	{
		$data = $this->input->post(array('deskripsi','keterangan','nilai'));

		$this->model_app->edit_sub_kriteria($id,$data);
	}

	public function hapussubkriteria($id)
	{
		$this->model_app->hapus_sub_kriteria($id);
	}

	public function tambahalternatif()
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$data = $this->input->post('lokasi');
		$id = $this->model_app->id_alternatif($email);

		$this->model_app->tambah_alternatif($id,$email,$data);
	}

	public function editalternatif($id)
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$data = $this->input->post('lokasi');

		$this->model_app->edit_alternatif($id,$email,$data);
	}

	public function hapusalternatif($id)
	{
		$email = $this->model_app->email($this->session->userdata('user'));

		$this->model_app->hapus_alternatif($email,$id);
	}	

	public function pencocokankriteria()
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$a = $this->input->post('a');
		$c = $this->input->post('c');
		$nilai = $this->input->post('nilai');
		$i = 0;

		foreach ($nilai as $key) {
			$this->model_app->tambah_pencocokan($email,$a,$c[$i],$key);
			$i++;
		}

		redirect('app/keputusan');
	}

	public function editpencocokankriteria()
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$a = $this->input->post('a');
		$c = $this->input->post('c');
		$nilai = $this->input->post('nilai');
		$i = 0;

		foreach ($nilai as $key) {
			$cek = $this->model_app->untuk_cek($email,$a,$c[$i]);
			if ($cek==0) {
				$this->model_app->tambah_pencocokan($email,$a,$c[$i],$key);
			} else {
				$this->model_app->edit_pencocokan($email,$a,$c[$i],$key);	
			}
			$i++;
		}

		redirect('app/keputusan');
	}

	public function gantipassword()
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$data = $this->input->post(array('passlama','passbaru','passvbaru'));

		$this->model_app->ganti_password($email,$data);
	}

	public function hapusakun()
	{
		$email = $this->model_app->email($this->session->userdata('user'));
		$data = $this->input->post('password');

		$this->model_app->hapus_akun($email,$data);
	}

}