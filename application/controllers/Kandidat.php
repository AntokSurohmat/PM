<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Kandidat extends CI_Controller {

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

	}

	public function kandidat(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['aspek'] = $this->data_model->getAspek();
		$data['faktor'] = $this->data_model->getFactor();
		$data['kandidat'] = $this->kandidat_model->getKandidat();
		$data['detail'] = $this->kandidat_model->getDetailKandidat();

		$data['administrator'] = $this->data_model->getAdministrator();
		$data['title'] = "Profile Matching";
		$data['parent'] = "Kandidat";
		$data['page'] = "Kandidat Calon Pegawai";
		$this->template->load('layout/template','modul_kandidat/kandidat',$data);

	}
}