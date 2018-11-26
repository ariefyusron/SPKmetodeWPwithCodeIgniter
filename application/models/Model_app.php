<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_app extends CI_Model {

	public function email($a)
	{
		$username = $this->db->query("SELECT * FROM akun WHERE username='$a';");
		if ($username->num_rows()>0) {
			$email = $username->row_array();
			return $email['email'];
		} else {
			return $a;
		}
	}

	public function id_kriteria($a)
	{
		$query = $this->db->query("SELECT * FROM kriteria WHERE email='$a' AND waktu=(SELECT max(waktu) FROM kriteria WHERE email='$a');");
		if ($query->num_rows()>0) {
			$id = $query->row_array();
			$id = substr($id['id'], 1);
			$id++;
			return 'C'.$id;
		} else {
			return 'C1';
		}
	}

	public function tambah_kriteria($a,$b,$c)
	{
		$query = $this->db->simple_query("INSERT INTO kriteria VALUES ('$a','$b','{$c['nama']}','{$c['jenis']}',{$c['bobot']},now());");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Kriteria Berhasil Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Kriteria Gagal Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function edit_kriteria($a,$b,$c)
	{
		$query = $this->db->simple_query("UPDATE kriteria SET nama='{$c['nama']}',jenis='{$c['jenis']}',bobot={$c['bobot']} WHERE id='$a' AND email='$b';");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Kriteria Berhasil Diubah.</h4>
										Berhasil.
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Kriteria Gagal Diubah.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function hapus_kriteria($a,$b)
	{
		$query = $this->db->simple_query("DELETE FROM kriteria WHERE email='$a' AND id='$b';");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Alternatif Berhasil Dihapus.</h4>
										Berhasil
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Alternatif Gagal Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function data_kriteria($a)
	{
		$query = $this->db->query("SELECT * FROM kriteria WHERE email='$a' ORDER BY waktu;");
		return $query->result_array();
	}

	public function tambah_sub_kriteria($a,$b)
	{
		$query = $this->db->simple_query("INSERT INTO sub_kriteria VALUES ('','$a','{$b['id']}','{$b['deskripsi']}','{$b['keterangan']}',{$b['nilai']});");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Sub Kriteria Berhasil Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Sub Kriteria Gagal Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function edit_sub_kriteria($a,$b)
	{
		$query = $this->db->simple_query("UPDATE sub_kriteria SET deskripsi='{$b['deskripsi']}',keterangan='{$b['keterangan']}',nilai={$b['nilai']} WHERE id=$a;");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Sub Kriteria Berhasil Diubah.</h4>
										Berhasil.
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Sub Kriteria Gagal Diubah.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function data_sub_kriteria($a,$b)
	{
		$query = $this->db->query("SELECT * FROM sub_kriteria WHERE kriteria='$a' AND email='$b' ORDER BY nilai DESC;");
		return $query->result_array();
	}

	public function hapus_sub_kriteria($a)
	{
		$query = $this->db->simple_query("DELETE FROM sub_kriteria WHERE id=$a;");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Sub kriteria Berhasil Dihapus.</h4>
										Berhasil
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Alternatif Gagal Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function id_alternatif($a)
	{
		$query = $this->db->query("SELECT * FROM alternatif WHERE email='$a' AND waktu=(SELECT max(waktu) FROM alternatif WHERE email='$a');");
		if ($query->num_rows()>0) {
			$id = $query->row_array();
			$id = substr($id['id'], 1);
			$id++;
			return 'A'.$id;
		} else {
			return 'A1';
		}
	}

	public function tambah_alternatif($a,$b,$c)
	{
		$query = $this->db->simple_query("INSERT INTO alternatif VALUES ('$a','$b','$c',now());");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Alternatif Berhasil Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Alternatif Gagal Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function edit_alternatif($a,$b,$c)
	{
		$query = $this->db->simple_query("UPDATE alternatif SET lokasi='$c' WHERE id='$a' AND email='$b';");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Alternatif Berhasil Diubah.</h4>
										Berhasil.
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Alternatif Gagal Diubah.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function hapus_alternatif($a,$b)
	{
		$query = $this->db->simple_query("DELETE FROM alternatif WHERE email='$a' AND id='$b';");
		if ($query) {
			$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Alternatif Berhasil Dihapus.</h4>
										Berhasil
									</div>');
        	redirect('app');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Alternatif Gagal Ditambahkan.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app');
		}
	}

	public function data_alternatif($a)
	{
		$query = $this->db->query("SELECT * FROM alternatif WHERE email='$a' ORDER BY waktu;");
		return $query->result_array();
	}

	//--------- Keputusan -----------
	public function tambah_pencocokan($a,$b,$c,$d)
	{
		$query = $this->db->simple_query("INSERT INTO pencocokan_kriteria VALUES ('$a','$b','$c',$d);");
		return $query;	
	}

	public function edit_pencocokan($a,$b,$c,$d)
	{
		$query = $this->db->simple_query("UPDATE pencocokan_kriteria SET id_nilai=$d WHERE email='$a' AND a='$b' AND c='$c';");
		return $query;	
	}

	public function cek_data_pencocokan_kriteria($a)
	{
		$query = $this->db->query("SELECT * FROM pencocokan_kriteria WHERE email='$a';");
		return $query->row_array();
	}

	public function data_pencocokan_kriteria($a,$b,$c)
	{
		$query = $this->db->query("SELECT * FROM pencocokan_kriteria JOIN sub_kriteria WHERE pencocokan_kriteria.id_nilai=sub_kriteria.id AND pencocokan_kriteria.email='$a' AND sub_kriteria.email='$a' AND a='$b' AND c='$c';");
		return $query->row_array();
	}

	public function convert_nilai_w($a)
	{
		$query = $this->db->query("SELECT id, bobot/total AS nilai, jenis FROM kriteria JOIN (SELECT sum(bobot) AS total FROM kriteria WHERE email='$a') AS b WHERE email='$a';");
		return $query->result_array();
	}
	
	public function pangkat($a,$b)
	{
		$query = $this->db->query("SELECT id, bobot/total AS nilai, jenis FROM kriteria JOIN (SELECT sum(bobot) AS total FROM kriteria WHERE email='$a') AS b WHERE email='$a' AND id='$b';");
		return $query->row_array();
	}

	public function hasil($a,$b)
	{
		$query = $this->db->query("SELECT * FROM alternatif WHERE email='$a' AND id='$b';");
		return $query->row_array();		
	}

	public function untuk_tombol($a,$b)
	{
		$query = $this->db->query("SELECT * FROM pencocokan_kriteria WHERE email='$a' AND a='$b';");
		return $query->num_rows();
	}

	public function untuk_option($a,$b,$c)
	{
		$query = $this->db->query("SELECT * FROM pencocokan_kriteria WHERE email='$a' AND a='$b' AND c='$c';");
		return $query->row_array();
	}

	public function untuk_cek($a,$b,$c)
	{
		$query = $this->db->query("SELECT * FROM pencocokan_kriteria WHERE email='$a' AND a='$b' AND c='$c';");
		return $query->num_rows();
	}

	//-------pengaturan----------
	public function ganti_password($a,$b)
	{
		$cek = $this->db->query("SELECT * FROM akun WHERE email='$a';")->row_array();
		$cek_passlama = password_verify($b['passlama'],$cek['password']);
		if ($cek_passlama) {
			if ($b['passbaru']==$b['passvbaru']) {
				$passbaru = password_hash($b['passbaru'],PASSWORD_DEFAULT);
				$query = $this->db->simple_query("UPDATE akun SET password='$passbaru' WHERE email='$a';");
				if ($query) {
					echo '<script>
						alert("Berhasil Ganti Password. Silahkan Login Kembali.");
						document.location.href="'.base_url('logout').'";
					</script>';
				} else {
					$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Error!.</h4>
										Silahkan coba lagi.
									</div>');
        			redirect('app/pengaturan');
				}
			} else {
				$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Password Baru Tidak Sama!.</h4>
										Silahkan coba lagi.
									</div>');
        		redirect('app/pengaturan');
			}
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Password Salah!.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app/pengaturan');
		}
	}

	public function hapus_akun($a,$b)
	{
		$cek = $this->db->query("SELECT * FROM akun WHERE email='$a';")->row_array();
		$cek_pass = password_verify($b,$cek['password']);
		if ($cek_pass) {
			$query = $this->db->simple_query("DELETE FROM akun WHERE email='$a';");
			if ($query) {
				$this->db->simple_query("DELETE FROM alternatif WHERE email='$a';");
				echo '<script>
					alert("Terima Kasih Telah Menggunakan Layanan Kami.");
					document.location.href="'.base_url('logout').'";
				</script>';
			} else {
				$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-ban"></i> Error!.</h4>
									Silahkan coba lagi.
								</div>');
    			redirect('app/pengaturan');
			}
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> Password Salah!.</h4>
										Silahkan coba lagi.
									</div>');
        	redirect('app/pengaturan');
		}
	}

}