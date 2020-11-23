<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {


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

	public function getKandidatHAsil(){

		$query = "SELECT s.*, k.nilai_akhir FROM pegawai as s JOIN kandidat as k ON k.nik = s.nik";
		return $this->db->query($query)->result();
	}


}