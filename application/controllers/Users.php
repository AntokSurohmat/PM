<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Users extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/*-- Check Session  --*/
		is_login();


		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('users_model');

	}

	public function index(){

		$data['title'] = "Profile Matching";
		$data['parent'] = "PM";
		$data['page'] = "Home";
		$this->template->load('users/layout/template','users/modul_home/users_home',$data);

	}

	public function profile(){

		$oneProfile = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$this->form_validation->set_rules('nama_administrator','Nama Administrator','required');
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','trim|min_length[5]',[
			'min_length' => 'Password to short, min 5 Character!'
		]);

		$data['profile'] = $this->users_model->getProfile($this->session->userdata('username'));

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "PM";
			$data['page'] = "Profile";
			$this->template->load('users/layout/template','users/modul_profile/users_profile',$data);

		}else{

			if(password_verify($this->input->post('password'),$oneProfile->password)) {

				$this->session->set_flashdata('message','Password yang anda masukkan sama dengan password yang anda gunakan saat ini!');
				$data['title'] = "Profile Matching";
				$data['parent'] = "PM";
				$data['page'] = "Profile";
				$this->template->load('users/layout/template','users/modul_profile/users_profile',$data);

			}else{

				$data = [

					'nama_administrator' => $this->db->escape_str(ucfirst($this->input->post('nama_administrator')),true),
					'username' => $this->db->escape_str(htmlspecialchars($this->input->post('username')),true),
					'aktif' => $this->db->escape_str($this->input->post('aktif'),true)
				];

				if(!empty($this->input->post('password'))) {

					$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

				}else{

                    // We don't save an empty password
					unset($data['password']);
				}

				$this->db->where('id_administrator', $this->input->post('zz'));
				$this->db->update('administrator',$data);
				$this->session->set_flashdata('success','Data Administrator "'.$this->input->post('nama_administrator').'" Berhasil Di Update');
				redirect('users/profile');

			}

		}

	}

	public function pegawai(){

		$data['pegawai'] = $this->users_model->getPegawai();

		$data['title'] = "Profile Matching";
		$data['parent'] = "Data";
		$data['page'] = "Calon Pegawai";
		$this->template->load('users/layout/template','users/modul_pegawai/users_pegawai',$data);

	}

	public function pegawaiDetail($nik){

		$data['onepegawai'] = $this->users_model->getOnePegawai($this->encrypt->decode($nik));

		$data['title'] = "Profile Matching";
		$data['parent'] = "Calon Pegawai";
		$data['page'] = "Calon Pegawai Detail";
		$this->template->load('users/layout/template','users/modul_pegawai/users_pegawaiDetail',$data);

	}

	public function aspek(){

		$data['aspek'] = $this->users_model->getAspek();

		$data['title'] = "Profile Matching";
		$data['parent'] = "Data";
		$data['page'] = "Aspek Penilaian";
		$this->template->load('users/layout/template','users/modul_aspek/users_aspek',$data);

	}

	public function faktor(){

		$data['faktor'] = $this->users_model->getFaktor();

		$data['title'] = "Profile Matching";
		$data['parent'] = "Data";
		$data['page'] = "Faktor Penilaian";
		$this->template->load('users/layout/template','users/modul_faktor/users_faktor',$data);

	}

	public function kandidat(){

		$data['aspek'] = $this->users_model->getAspek();
		$data['faktor'] = $this->users_model->getFaktor();
		$data['kandidat'] = $this->users_model->getKandidat();
		$data['detail'] = $this->users_model->getDetailKandidat();

		$data['title'] = "Profile Matching";
		$data['parent'] = "Kandidat";
		$data['page'] = "Kandidat Calon Pegawai";
		$this->template->load('users/layout/template','users/modul_kandidat/users_kandidat',$data);

	}


	public function hasil(){

		$data['allhasil'] = $this->users_model->getAllHasil();

		$data['allmasuk'] = $this->users_model->getAllDiTerima();

		$data['title'] = "Profile Matching";
		$data['parent'] = "PM";
		$data['page'] = "Hasil Perhitungan";
		$this->template->load('users/layout/template','users/modul_hasil/users_hasil',$data);

	}

}