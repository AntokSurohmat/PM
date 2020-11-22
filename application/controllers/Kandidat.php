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

		// $skala = array(1 => 'Sangat Kurang', 2 => 'Kurang', 3 => 'Cukup', 4 => 'Baik', 5 => 'Sangat Baik') ;
		// $pembobotan = array(0 => 5, 1 => 4.5, -1 => 4, 2 => 3.5, -2 => 3, 3 => 2.5, -3 => 2, 4 => 1.5, -4 => 1);
	}

	public function kandidat(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['aspek'] = $this->data_model->getAspek();
		$data['faktor'] = $this->data_model->getFaktor();
		$data['kandidat'] = $this->kandidat_model->getKandidat();
		$data['detail'] = $this->kandidat_model->getDetailKandidat();

		$data['administrator'] = $this->data_model->getAdministrator();
		$data['title'] = "Profile Matching";
		$data['parent'] = "Kandidat";
		$data['page'] = "Kandidat Calon Pegawai";
		$this->template->load('layout/template','modul_kandidat/kandidat',$data);

	}


	public function kandidatAdd(){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['pegawai'] = $this->data_model->getPegawai();
		$data['faktor'] = $this->data_model->getFaktor();
		$data['skala'] = array(1 => 'Sangat Kurang', 2 => 'Kurang', 3 => 'Cukup', 4 => 'Baik', 5 => 'Sangat Baik') ;

		$faktor = $this->data_model->getFaktor();

		$this->form_validation->set_rules('nik','Nama Pegawai','required');

		// foreach ($this->input->post('faktor') as $post => $hit) {

		// $this->form_validation->set_rules($post,$hit,'required');

		// }


		// foreach ($faktor as $row ) {

		// 	$this->form_validation->set_rules('faktor['.$row->kode_faktor.']',$row->kode_faktor  .'/'.$row->nama_faktor,'required');

		// }

		// foreach ($this->input->post('faktor[]') as $poss) {

		// 	foreach ($faktor as $row ) {

		// 		$this->form_validation->set_rules('faktor['.$row->kode_faktor.']',$row->kode_faktor  .'/'.$row->nama_faktor,'required');

		// 	}
		// }
		$data['pegawai'] = $this->data_model->getPegawai();


		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Kandidat";
			$data['page'] = "Add Kandidat Calon Pegawai";
			$this->template->load('layout/template','modul_kandidat/kandidatAdd',$data);

		}else{

			$this->db->insert('kandidat',['nik' => $this->input->post('nik')]);

			$id_kandidat = $this->db->insert_id();

			foreach ($this->input->post('faktor') as $key => $value) {
				$data = [

					'id_kandidat' => $id_kandidat,
					'kode_faktor' => $key,
					'nilai_faktor' => $value

				];

				$this->db->insert('detail_kandidat', $data);

			}

			$this->session->set_flashdata('success','Kandidat Calon "'.$this->input->post('nik').'" Berhasil Di Tambahkan');
			redirect('kandidat/kandidat');

		}
	}

	public function kandidatEdit($id_kandidat){

		$data['user'] = $this->db->get_where('administrator',['username' => $this->session->userdata('username')])->row();

		$data['onekandidat'] = $this->kandidat_model->getOneKandidat($this->encrypt->decode($id_kandidat));
		$data['pegawai'] = $this->data_model->getPegawai();
		$data['faktor'] = $this->data_model->getFaktor();
		$data['skala'] = array(1 => 'Sangat Kurang', 2 => 'Kurang', 3 => 'Cukup', 4 => 'Baik', 5 => 'Sangat Baik') ;

		$this->form_validation->set_rules('nik','Nama Pegawai','required');

		if($this->form_validation->run() == false){

			$data['title'] = "Profile Matching";
			$data['parent'] = "Kandidat";
			$data['page'] = "Add Kandidat Calon Pegawai";
			$this->template->load('layout/template','modul_kandidat/kandidatEdit',$data);

		}else{

			$this->db->where('id_kandidat', $this->input->post('zz'));
			$this->db->update('kandidat',['nik' => $this->input->post('nik')]);


			foreach ($this->input->post('faktor') as $key => $value) {


				$this->db->where('kode_faktor', $key);
				$this->db->where('id_kandidat', $this->input->post('zz'));
				$this->db->update('detail_kandidat',['nilai_faktor' => $value]);

			}

			$this->session->set_flashdata('success','Kandidat Calon "'.$this->input->post('nik').'" Berhasil Di Update');
			redirect('kandidat/kandidat');

		}

	}


	public function kandidatDelete($id_kandidat){

		$this->db->delete('kandidat',['id_kandidat' => $this->encrypt->decode($id_kandidat)]);
		$this->db->delete('detail_kandidat',['id_kandidat' => $this->encrypt->decode($id_kandidat)]);
		$this->session->set_flashdata('success','Data Administrator Yang Anda Pilih Berhasil Di Hapus');
		redirect('kandidat/kandidat');

	}
}