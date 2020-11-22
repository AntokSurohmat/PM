<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function is_login(){
	$ci = get_instance();
	if (!$ci->session->userdata('username')){
		redirect('auth');

	}
}

function kode_otomatisAspek() {

	$query = "SELECT kode_aspek FROM aspek ORDER BY kode_aspek DESC LIMIT 1";
	$ci = get_instance();
	if($ci->db->query($query)->num_rows() <= 0) {

		$newcode = 'A001';

	}else{

		$data = $ci->db->query($query)->row();
		$kode = $data->kode_aspek;
		$urut = substr($kode, 1, 4) + 1;
		$newcode = 'A' .str_pad($urut, 3, '0', STR_PAD_LEFT);

		return $newcode;

	}
}

function kode_otomatisFaktor() {

	$query = "SELECT kode_faktor FROM faktor ORDER BY kode_faktor DESC LIMIT 1";
	$ci = get_instance();
	if($ci->db->query($query)->num_rows() <= 0) {

		$newcode = 'F01';

	}else{

		$data = $ci->db->query($query)->row();
		$kode = $data->kode_faktor;
		$urut = substr($kode, 1, 2) + 1;
		$newcode = 'F' .str_pad($urut, 2, '0', STR_PAD_LEFT);

		return $newcode;

	}
}

$skala = array(1 => 'Sangat Kurang', 2 => 'Kurang', 3 => 'Cukup', 4 => 'Baik', 5 => 'Sangat Baik') ;
$pembobotan = array(0 => 5, 1 => 4.5, -1 => 4, 2 => 3.5, -2 => 3, 3 => 2.5, -3 => 2, 4 => 1.5, -4 => 1);

function get_jumlah_faktor($aspek) {
	$ci = get_instance();
	$query = "SELECT * FROM faktor WHERE kode_aspek = '$aspek'";
	return $ci->db->query($query)->num_rows();

}

function get_nilai_faktor($kode_faktor, $id_kandidat) {
	$ci = get_instance();
	$query ="SELECT nilai_faktor from detail_kandidat 
	WHERE id_kandidat = '$id_kandidat' and kode_faktor = '$kode_faktor'";
	return $ci->db->query($query)->row()->nilai_faktor;
}
