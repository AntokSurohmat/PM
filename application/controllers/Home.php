<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/*-- Check Session  --*/
		is_login();


		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('home_model');

	}

	public function index(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['title'] = "Profile Matching";
		$data['parent'] = "PM";
		$data['page'] = "Beranda";
		$this->template->load('layout/template','modul_beranda/index',$data);

	}

	public function hasil(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['kandidathasil'] = $this->home_model->getKandidatHasil();

		$data['title'] = "Profile Matching";
		$data['parent'] = "PM";
		$data['page'] = "Hasil Perhitungan";
		$this->template->load('layout/template','modul_hasil/hasil',$data);

	}

	
}