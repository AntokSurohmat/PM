<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Auth extends CI_Controller {

	public function __construct(){

		parent::__construct();

		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('auth_model');

	}

	public function index(){

		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "E-Surat";
			$data['page'] = "Login";
			$this->load->view('modul_auth/login',$data);

		}else{

			$username = strip_tags($this->input->post('username'));
			$password = strip_tags($this->input->post('password'));

			$admin = $this->db->get_where('administrator', ['username' => $this->db->escape_str($username)])->row();

			if($admin){
				//jika usernya aktif
				if($admin->aktif == Y){

					//cek password
					if(password_verify($this->db->escape_str($password), $admin->password)){
						$data = [
							'username' => $admin->username,
						];
						$this->session->set_userdata($data);
						redirect('home');
					}else{
						$this->session->set_flashdata('message','Wrong password!');
						redirect('auth');

					}
				}else{

					$this->session->set_flashdata('message','This Username is not been activated!');
					redirect('auth');
				}
			}else{

				$this->session->set_flashdata('message','Username is not registered!');
				redirect('auth');

			}

		}

	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message','You have been logged out!');
		redirect('auth');	
	}

}