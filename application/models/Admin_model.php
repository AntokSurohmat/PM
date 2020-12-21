<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


	public function getCountCalonPegawai(){

		$query = "SELECT COUNT(nik) as pegawai FROM pegawai";
		return $this->db->query($query)->row()->pegawai;

	}

	public function getCountAspekPenilaian(){

		$query = "SELECT COUNT(kode_aspek) as aspek FROM aspek";
		return $this->db->query($query)->row()->aspek;

	}

	public function getCountFaktorPenilaian(){

		$query = "SELECT COUNT(kode_faktor) as faktor FROM faktor";
		return $this->db->query($query)->row()->faktor;

	}

	public function getCountKandidat(){

		$query = "SELECT COUNT(id_kandidat) as kandidat FROM kandidat";
		return $this->db->query($query)->row()->kandidat;

	}


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

	public function getFaktor(){

		$query = "SELECT * FROM faktor ORDER BY kode_faktor ASC";
		return $this->db->query($query)->result();
	}

	public function getOneFaktor($kode_faktor){

		$query = "SELECT * FROM faktor WHERE kode_faktor LIKE '$kode_faktor' ";
		return $this->db->query($query)->row();

	}

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

	public function getKandidatHAsil(){

		$query = "SELECT s.*, k.nilai_akhir FROM pegawai as s JOIN kandidat as k ON k.nik = s.nik";
		return $this->db->query($query)->result();
	}


}