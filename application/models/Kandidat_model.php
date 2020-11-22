<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat_model extends CI_Model {

	public function getKandidat(){

		$query = "SELECT a.*, b.nama_pegawai FROM kandidat as a JOIN pegawai as b ON a.nik = b.nik ORDER BY a.id_kandidat ASC";
		return $this->db->query($query)->result();
	}

	public function getOneKandidat($id_kandidat){

		$query = "SELECT a.*, b.nama_pegawai FROM kandidat as a JOIN pegawai as b ON a.nik = b.nik WHERE a.id_kandidat = '$id_kandidat'";
		return $this->db->query($query)->row();
	}

	public function getDetailkandidat(){
		$query = "SELECT * FROM detail_kandidat ORDER BY kode_faktor ASC";
		return $this->db->query($query)->result();
	}

	public function getOneDetailkandidat($id_kandidat){
		$query = "SELECT * FROM detail_kandidat WHERE id_kandidat = '$id_kandidat'";
		return $this->db->query($query)->row();
	}
	
}