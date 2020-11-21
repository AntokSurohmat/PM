<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {


	public function getAdministrator(){

		$query = "SELECT * FROM administrator ORDER BY id_administrator ASC";
		return $this->db->query($query)->result();
	}

	public function getOneAdministrator($id_administrator){

		$query = "SELECT * FROM administrator WHERE id_administrator LIKE '$id_administrator' ";
		return $this->db->query($query)->row();

	}

	public function getPegawai(){

		$query = "SELECT * FROM pegawai ORDER BY nik ASC";
		return $this->db->query($query)->result();
	}

	public function getOnePegawai($nik){

		$query = "SELECT * FROM pegawai WHERE nik LIKE '$nik' ";
		return $this->db->query($query)->row();

	}

	public function getAspek(){

		$query = "SELECT * FROM aspek ORDER BY kode_aspek ASC";
		return $this->db->query($query)->result();
	}

	public function getOneAspek($kode_aspek){

		$query = "SELECT * FROM aspek WHERE kode_aspek LIKE '$kode_aspek' ";
		return $this->db->query($query)->row();

	}

	public function getFactor(){

		$query = "SELECT * FROM faktor ORDER BY kode_faktor ASC";
		return $this->db->query($query)->result();
	}

	public function getOneFactor($kode_faktor){

		$query = "SELECT * FROM faktor WHERE kode_faktor LIKE '$kode_faktor' ";
		return $this->db->query($query)->row();

	}

}