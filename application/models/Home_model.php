<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getKandidatHAsil(){

		$query = "SELECT s.*, k.nilai_akhir FROM pegawai as s JOIN kandidat as k ON k.nik = s.nik";
		return $this->db->query($query)->result();
	}


}