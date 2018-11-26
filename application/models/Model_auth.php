<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {

	public function buat_akun($a)
	{
		$cek_email = $this->db->query("SELECT * FROM akun WHERE email='{$a['email']}';")->num_rows();
		$cek_username = $this->db->query("SELECT * FROM akun WHERE username='{$a['username']}';")->num_rows();

		if ($cek_email>0 and $cek_username>0) {
			$this->session->set_flashdata('notif','<p class="text-danger">Email dan Username Sudah Terdaftar!</p>');
			redirect('daftar');
		} elseif ($cek_email>0) {
			$this->session->set_flashdata('notif','<p class="text-danger">Email Sudah Terdaftar!</p>');
			redirect('daftar');
		} elseif ($cek_username>0) {
			$this->session->set_flashdata('notif','<p class="text-danger">Username Sudah Terdaftar!</p>');
			redirect('daftar');
		} elseif ($a['password']!=$a['passwordlagi']) {
			$this->session->set_flashdata('notif','<p class="text-danger">Password Tidak Sama!</p>');
			redirect('daftar');
		} else {
			$pass = password_hash($a['password'],PASSWORD_DEFAULT);
			$query = $this->db->simple_query("INSERT INTO akun VALUES ('{$a['email']}','{$a['username']}','$pass');");
			if ($query) {
				$this->session->set_flashdata('notif','<p class="text-success">Berhasil mendaftar. Silahkan login.</p>');
				redirect('daftar');
			} else {
				$this->session->set_flashdata('notif','<p class="text-danger">Error! Silahkan coba lagi.</p>');
				redirect('daftar');
			}
		}
	}

	public function login($a)
	{
		$cek_email = $this->db->query("SELECT * FROM akun WHERE email='{$a['email']}';");
		$cek_username = $this->db->query("SELECT * FROM akun WHERE username='{$a['email']}';");

		if ($cek_email->num_rows()>0) {
			$pass = $cek_email->row_array();
			$cek_pass = password_verify($a['password'],$pass['password']);
			if ($cek_pass) {
				$this->session->set_userdata('user',$a['email']);
				redirect();
			} else {
				$this->session->set_flashdata('notif','<p class="text-danger">Password Salah!</p>');
				redirect();
			}
		} elseif ($cek_username->num_rows()>0) {
			$pass = $cek_username->row_array();
			$cek_pass = password_verify($a['password'],$pass['password']);
			if ($cek_pass) {
				$this->session->set_userdata('user',$a['email']);
				redirect();
			} else {
				$this->session->set_flashdata('notif','<p class="text-danger">Password Salah!</p>');
				redirect();
			}
		} else {
			$this->session->set_flashdata('notif','<p class="text-danger">Username atau Email Tidak Terdaftar!</p>');
			redirect();
		}
	}
	
}