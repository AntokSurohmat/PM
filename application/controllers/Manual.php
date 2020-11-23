<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Manual extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/*-- Check Session  --*/
		is_login();


		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('kandidat_model');
		$this->load->model('data_model');
		// $this->load->model('manual_model');

		// $skala = array(1 => 'Sangat Kurang', 2 => 'Kurang', 3 => 'Cukup', 4 => 'Baik', 5 => 'Sangat Baik') ;
		// $pembobotan = array(0 => 5, 1 => 4.5, -1 => 4, 2 => 3.5, -2 => 3, 3 => 2.5, -3 => 2, 4 => 1.5, -4 => 1);
	}

	public function manual(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['aspek'] = $this->data_model->getAspek();
		$data['faktor'] = $this->data_model->getFaktor();
		$data['kandidat'] = $this->kandidat_model->getKandidat();

		$data['pembobotan'] = array(0 => 5, 1 => 4.5, -1 => 4, 2 => 3.5, -2 => 3, 3 => 2.5, -3 => 2, 4 => 1.5, -4 => 1);

		$data['administrator'] = $this->data_model->getAdministrator();
		$data['title'] = "Profile Matching";
		$data['parent'] = "Manual";
		$data['page'] = "Manual Pehitungan";
		$this->template->load('layout/template','modul_manual/manual',$data);

	}

	public function updateNilai($id_kandidat){

		$this->db->where('id_kandidat', $id_kandidat);
		$this->db->update('kandidat',['nilai_akhir' => $this->input->post('nilai_akhir')]);
		$this->session->set_flashdata('success','Nilai Akhir Berhasil Di Update');
		redirect('home/hasil');

	}
}