<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();

		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('home_model');

	}

	public function index(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['title'] = "Profile Matching";
		$data['parent'] = "E-Surat";
		$data['page'] = "Beranda";
		$this->template->load('layout/template','modul_beranda/index',$data);

	}

	public function dataAdministrator(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['administrator'] = $this->home_model->getAdministrator();
		$data['title'] = "Profile Matching";
		$data['parent'] = "Data";
		$data['page'] = "Administrator";
		$this->template->load('layout/template','modul_administrator/administrator',$data);
	}

	public function dataAdministratorAdd(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$this->form_validation->set_rules('nama_administrator','Nama Administrator','required');
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[administrator.nama_administrator]', [
			'is_unique' => 'This Username Alredy Taken!'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[5]',[
			'min_length' => 'Password to short, min 5 Character!'
		]);

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Administrator";
			$data['page'] = "Add Administrator";
			$this->template->load('layout/template','modul_administrator/administratorAdd',$data);

		}else{

			$data = [

				'nama_administrator' => $this->db->escape_str(ucfirst($this->input->post('nama_administrator')),true),
				'username' => $this->db->escape_str(htmlspecialchars($this->input->post('username')),true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'aktif' => $this->db->escape_str($this->input->post('aktif'),true)
			];

			$this->db->insert('administrator',$data);
			$this->session->set_flashdata('success','Data Administrator "'.$this->input->post('nama_administrator').'" Berhasil Di Tambahkan');
			redirect('home/dataAdministrator');

		}
	}

	public function dataAdministratorEdit($id_administrator = null){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$oneadministrator = $this->db->get_where('administrator',['id_administrator' => $this->encrypt->decode($id_administrator)])->row();

		/*-- Encrypt URL NIM --*/
		if (count($this->uri->segment_array()) > 3) {
			$this->session->set_flashdata('message','URL yang anda masukkan salah');
			redirect('home/dataAdministrator');
		}
		if (!isset($id_administrator)) {
			$this->session->set_flashdata('message','Data yang Anda Inginkan Tidak Mempunyai NIK');
			redirect('home/dataAdministrator');
		}
		if (is_numeric($id_administrator)) {
			$this->session->set_flashdata('message','Url Hanya Bisa Diakses Setelah Terenkripsi');
			redirect('home/dataAdministrator');
		} 

//id_administrator masih salah
		if(!$oneadministrator->id_administrator == $this->encrypt->decode($id_administrator)){
			$this->session->set_flashdata('message','NIK Yang Diminta Tidak Sama');
			redirect('home/dataAdministrator');
		}



		$data['oneadministrator'] = $this->home_model->getOneAdministrator($this->encrypt->decode($id_administrator));

		$this->form_validation->set_rules('nama_administrator','Nama Administrator','required');
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','trim|min_length[5]',[
			'min_length' => 'Password to short, min 5 Character!'
		]);


		$data['oldpassword'] = $oneadministrator->password;

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Administrator";
			$data['page'] = "Edit Administrator";
			$this->template->load('layout/template','modul_administrator/administratorEdit',$data);

		}else{

			if(password_verify($this->input->post('password'),$oneadministrator->password)) {

				$this->session->set_flashdata('message','Password yang anda masukkan sama dengan password yang anda gunakan saat ini!');
				$data['title'] = "Profile Matching";
				$data['parent'] = "Administrator";
				$data['page'] = "Edit Administrator";
				$this->template->load('layout/template','modul_administrator/administratorEdit',$data);

			}else{

				$data = [

					'nama_administrator' => $this->db->escape_str(ucfirst($this->input->post('nama_administrator')),true),
					'username' => $this->db->escape_str(htmlspecialchars($this->input->post('username')),true),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'aktif' => $this->db->escape_str($this->input->post('aktif'),true)
				];

				$this->db->where('id_administrator', $this->input->post('zz'));
				$this->db->update('administrator',$data);
				$this->session->set_flashdata('success','Data Administrator "'.$this->input->post('nama_administrator').'" Berhasil Di Update');
				redirect('home/dataAdministrator');

			}

		}

	}

	public function dataAdministratorDelete($id_administrator){

		$this->db->delete('administrator',['id_administrator' => $this->encrypt->decode($id_administrator)]);
		$this->session->set_flashdata('success','Data Administrator Yang Anda Pilih Berhasil Di Hapus');
		redirect('home/dataAdministrator');

	}


	public function dataPegawai(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['pegawai'] = $this->home_model->getPegawai();

		$data['title'] = "Profile Matching";
		$data['parent'] = "Data";
		$data['page'] = "Pegawai";
		$this->template->load('layout/template','modul_pegawai/pegawai',$data);

	}


	public function dataPegawaiAdd(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$this->form_validation->set_rules('nik_pegawai','NIK','required|trim|is_natural|is_unique[pegawai.nik]',[
			'is_natural' => 'NIK Hanya Berisi Angka!',
			'is_unique' => 'NIK Yang Anda Masukkan Telah Dipakai!'
		]);
		$this->form_validation->set_rules('nama_pegawai','Nama Pegawai','required|alpha',[
			'alpha' => 'Nama Pegawai Hanya Berisi Huruf Alfabet'
		]);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|alpha',[
			'alpha' => 'Tempat Lahir Hanya Berisi Huruf Alfabet'
		]);
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Pegawai";
			$data['page'] = "Add Pegawai";
			$this->template->load('layout/template','modul_pegawai/pegawaiAdd',$data);

		}else{

			$data = [

				'nik' => $this->db->escape_str($this->input->post('nik_pegawai'),true),
				'nama_pegawai' => $this->db->escape_str(ucfirst($this->input->post('nama_pegawai')),true),
				'tempat_lahir' => $this->db->escape_str(ucfirst($this->input->post('tempat_lahir')),true),
				'tanggal_lahir' => $this->db->escape_str($this->input->post('tanggal_lahir'),true),
				'jenis_kelamin' => $this->db->escape_str($this->input->post('jenis_kelamin'),true),
				'pendidikan' => $this->db->escape_str(strtoupper($this->input->post('pendidikan')),true),
				'alamat' => $this->db->escape_str($this->input->post('alamat'),true)

			];

			$this->db->insert('pegawai',$data);
			$this->session->set_flashdata('success','Data Pegawai "'.$this->input->post('nama_pegawai').'" Berhasil Di Tambahkan');
			redirect('home/dataPegawai');


		}
	}

	public function dataPegawaiEdit($nik = null){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		/*-- Encrypt URL NIM --*/
		if (count($this->uri->segment_array()) > 3) {
			$this->session->set_flashdata('message','URL yang anda masukkan salah');
			redirect('home/dataPegawai');
		}
		if (!isset($nik)) {
			$this->session->set_flashdata('message','Data yang Anda Inginkan Tidak Mempunyai NIK');
			redirect('home/dataPegawai');
		}
		if (is_numeric($nik)) {
			$this->session->set_flashdata('message','Url Hanya Bisa Diakses Setelah Terenkripsi');
			redirect('home/dataPegawai');
		} 

//id_administrator masih salah
		// if(!$oneadministrator->id_administrator == $this->encrypt->decode($id_administrator)){
		// 	$this->session->set_flashdata('message','NIK Yang Diminta Tidak Sama');
		// 	redirect('home/dataAdministrator');
		// }

		$data['onepegawai'] = $this->home_model->getOnePegawai($this->encrypt->decode($nik));

		$this->form_validation->set_rules('nik_pegawai','NIK','required|trim|is_natural',[
			'is_natural' => 'NIK Hanya Berisi Angka!'
		]);
		$this->form_validation->set_rules('nama_pegawai','Nama Pegawai','required|alpha',[
			'alpha' => 'Nama Pegawai Hanya Berisi Huruf Alfabet'
		]);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|alpha',[
			'alpha' => 'Tempat Lahir Hanya Berisi Huruf Alfabet'
		]);
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Pegawai";
			$data['page'] = "Edit Pegawai";
			$this->template->load('layout/template','modul_pegawai/pegawaiEdit',$data);

		}else{

			$data = [

				'nik' => $this->db->escape_str($this->input->post('nik_pegawai'),true),
				'nama_pegawai' => $this->db->escape_str(ucfirst($this->input->post('nama_pegawai')),true),
				'tempat_lahir' => $this->db->escape_str(ucfirst($this->input->post('tempat_lahir')),true),
				'tanggal_lahir' => $this->db->escape_str($this->input->post('tanggal_lahir'),true),
				'jenis_kelamin' => $this->db->escape_str($this->input->post('jenis_kelamin'),true),
				'pendidikan' => $this->db->escape_str(strtoupper($this->input->post('pendidikan')),true),
				'alamat' => $this->db->escape_str($this->input->post('alamat'),true)

			];

			$this->db->where('nik', $this->input->post('zz'));
			$this->db->update('pegawai',$data);
			$this->session->set_flashdata('success','Data Pegawai "'.$this->input->post('nama_pegawai').'" Berhasil Di Update');
			redirect('home/dataPegawai');

		}

	}

	public function dataPegawaiDelete($nik){

		$this->db->delete('pegawai',['nik' => $this->encrypt->decode($nik)]);
		$this->session->set_flashdata('success','Data Pegawai Yang Anda Pilih Berhasil Di Hapus');
		redirect('home/dataPegawai');

	}

	public function aspek(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['aspek'] = $this->home_model->getAspek();

		$data['title'] = "Profile Matching";
		$data['parent'] = "Data";
		$data['page'] = "Aspek Penilaian";
		$this->template->load('layout/template','modul_aspek/aspek',$data);
	}

	public function aspekAdd(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$this->form_validation->set_rules('kode_aspek','Kode Aspek','required|trim|is_unique[aspek.kode_aspek]|max_length[4]',[
			'is_unique' => 'Kode Aspek Yang Anda Masukkan Sudah terpakai',
			'max_length' => 'Maksimal 4 Character'
		]);
		$this->form_validation->set_rules('nama_aspek','Nama Aspek','required|alpha',[
			'is_natural' => 'Nama Pegawai Hanya Berisi Huruf Alfabet',
		]);
		$this->form_validation->set_rules('bobot','Bobot','required|is_natural',[
			'is_natural' => 'Bobot Hanya Berisi Angka!'
		]);
		$this->form_validation->set_rules('bcf','Bobot Core Factor','required|trim|is_natural|less_than[100]',[
			'is_natural' => 'Bobot Core Factor Hanya Berisi Angka!',
			'less_than' => 'Maksimal Angka 100'
		]);
		$this->form_validation->set_rules('bsf','Bobot Secondary Factor','required|trim|is_natural|less_than[100]',[
			'is_natural' => 'Bobot Secondary Factor Hanya Berisi Angka!',
			'less_than' => 'Maksimal Angka 100'
		]);

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Data";
			$data['page'] = "Add Aspek Penilaian";
			$this->template->load('layout/template','modul_aspek/aspekAdd',$data);

		}else{

			$total = array($this->input->post('bcf'),$this->input->post('bsf'));
			if(array_sum($total) <> 100){
				$this->session->set_flashdata('message','Jumlah Bobot Core Factor dan Bobot Secondary Factor harus 100');
				$data['title'] = "Profile Matching";
				$data['parent'] = "Data";
				$data['page'] = "Add Aspek Penilaian";
				$this->template->load('layout/template','modul_aspek/aspekAdd',$data);

			}else{

				$data = [

					'kode_aspek' => $this->db->escape_str($this->input->post('kode_aspek'),true),
					'nama_aspek' =>$this->db->escape_str($this->input->post('nama_aspek'),true),
					'bobot' => $this->db->escape_str($this->input->post('bobot'), true),
					'bobot_cf' => $this->db->escape_str($this->input->post('bcf'),true),
					'bobot_sf' => $this->db->escape_str($this->input->post('bsf'),true)
				];

				$this->db->insert('aspek',$data);
				$this->session->set_flashdata('success','Aspek Penilaian "'.$this->input->post('nama_aspek').'" Berhasil Di Tambahkan');
				redirect('home/aspek');
			}

		}

	}

	public function aspekEdit($kode_aspek){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['oneaspek'] = $this->home_model->getOneAspek($this->encrypt->decode($kode_aspek));

		$this->form_validation->set_rules('kode_aspek','Kode Aspek','required|trim|max_length[4]',[
			'max_length' => 'Maksimal 4 Character'
		]);
		$this->form_validation->set_rules('nama_aspek','Nama Aspek','required|alpha',[
			'is_natural' => 'Nama Pegawai Hanya Berisi Huruf Alfabet',
		]);
		$this->form_validation->set_rules('bobot','Bobot','required|is_natural',[
			'is_natural' => 'Bobot Hanya Berisi Angka!'
		]);
		$this->form_validation->set_rules('bcf','Bobot Core Factor','required|trim|is_natural|less_than[100]',[
			'is_natural' => 'Bobot Core Factor Hanya Berisi Angka!',
			'less_than' => 'Maksimal Angka 100'
		]);
		$this->form_validation->set_rules('bsf','Bobot Secondary Factor','required|trim|is_natural|less_than[100]',[
			'is_natural' => 'Bobot Secondary Factor Hanya Berisi Angka!',
			'less_than' => 'Maksimal Angka 100'
		]);

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Data";
			$data['page'] = "Edit Aspek Penilaian";
			$this->template->load('layout/template','modul_aspek/aspekEdit',$data);

		}else{

			$total = array($this->input->post('bcf'),$this->input->post('bsf'));
			if(array_sum($total) <> 100){
				$this->session->set_flashdata('message','Jumlah Bobot Core Factor dan Bobot Secondary Factor harus 100');
				$data['title'] = "Profile Matching";
				$data['parent'] = "Data";
				$data['page'] = "Edit Aspek Penilaian";
				$this->template->load('layout/template','modul_aspek/aspekEdit',$data);

			}else{

				$data = [

					'kode_aspek' => $this->db->escape_str($this->input->post('kode_aspek'),true),
					'nama_aspek' =>$this->db->escape_str($this->input->post('nama_aspek'),true),
					'bobot' => $this->db->escape_str($this->input->post('bobot'), true),
					'bobot_cf' => $this->db->escape_str($this->input->post('bcf'),true),
					'bobot_sf' => $this->db->escape_str($this->input->post('bsf'),true)
				];

				$this->db->where('kode_aspek', $this->input->post('zz'));
				$this->db->update('aspek',$data);
				$this->session->set_flashdata('success','Data Pegawai "'.$this->input->post('nama_aspek').'" Berhasil Di Update');
				redirect('home/aspek');
			}
		}
	}

	public function aspekDelete($kode_aspek){

		$this->db->delete('aspek',['kode_aspek' => $this->encrypt->decode($kode_aspek)]);
		$this->session->set_flashdata('success','Data Pegawai Yang Anda Pilih Berhasil Di Hapus');
		redirect('home/aspek');

	}


	public function faktor(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['faktor'] = $this->home_model->getFactor();

		$data['title'] = "Profile Matching";
		$data['parent'] = "Data";
		$data['page'] = "Faktor";
		$this->template->load('layout/template','modul_faktor/faktor',$data);

	}


}