<?php 

/**
* 
*/
class Pengaduan_m extends CI_Model
{
	
	function do_login($username, $pass){
		return $this->db->query("call login_masyarakat('$username','$pass')");
		// return $this->db->query("SELECT * FROM tb_masyarakat WHERE masyarakat_username = '$username' AND masyarakat_password = '$pass'");
	}

	function do_loginadmin($username_p,$pass_p){
		// return $this->db->query("call login_admin('$username_p','$pass_p')");
		return $this->db->query("SELECT * FROM tb_petugas WHERE petugas_username = '$username_p' AND petugas_password = '$pass_p'");
	}

	function masyarakat(){
		// if(isset($_SESSION['nik'])){
		// $id = $_SESSION["nik"];
		// }
		// return $this->db->query("SELECT * FROM tb_masyarakat where masyarakat_nik = '$id' ")->result();
	}


	function histori(){
		// return $this->db->query("SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.masyarakat_nik=tb_masyarakat.masyarakat_nik ORDER BY  tb_pengaduan.tgl_pengaduan DESC limit 3")->result();

		return $this->db->query("SELECT tb_pengaduan.id_pengaduan, tb_pengaduan.tgl_pengaduan, tb_pengaduan.pengaduan_judul, tb_pengaduan.foto_pengaduan, tb_pengaduan.status_pengaduan, tb_masyarakat.masyarakat_nama, tb_masyarakat.masyarakat_tlpn,tb_pengaduan.masyarakat_nik, tb_pengaduan.isi_laporan_pengaduan,tb_tanggapan.tgl_tanggapan, tb_tanggapan.tanggapan_isi, tb_petugas.nama_petugas FROM tb_pengaduan  join tb_masyarakat  ON tb_pengaduan.masyarakat_nik = tb_masyarakat.masyarakat_nik join tb_tanggapan  ON tb_pengaduan.id_pengaduan = tb_tanggapan.id_pengaduan join tb_petugas  ON tb_tanggapan.id_petugas = tb_petugas.id_petugas WHERE tb_pengaduan.status_pengaduan = 'selesai' ORDER BY tb_pengaduan.tgl_pengaduan DESC limit 3")->result();
	}

	// function histori(){
	// 	return $this->db->query("SELECT tb_pengaduan.pengaduan_judul, tb_pengaduan.")
	// }

	
	function daftar_petugas(){
		return $this->db->query("SELECT * FROM tb_petugas ORDER BY id_petugas")->result();
	}

	function data_masyarakat(){
		return $this->db->query("SELECT * FROM tb_masyarakat")->result();
	}

	function tambah_laporan($data){
		$this->db->insert('tb_pengaduan', $data);
	}
	function getdatapengaduan($status){
		return $this->db->query("SELECT tp.id_pengaduan, tp.tgl_pengaduan, tp.pengaduan_judul, tp.isi_laporan_pengaduan, tp.foto_pengaduan, tp.status_pengaduan, tp.masyarakat_nik, tm.masyarakat_nama, tm.masyarakat_tlpn FROM tb_pengaduan tp join tb_masyarakat tm on tp.masyarakat_nik = tm.masyarakat_nik WHERE tp.status_pengaduan = '$status' ORDER BY tp.tgl_pengaduan DESC")->result();
	}

	function getdatapengaduan_s($status){
		return $this->db->query("SELECT tb_pengaduan.id_pengaduan, tb_pengaduan.tgl_pengaduan, tb_pengaduan.pengaduan_judul, tb_pengaduan.foto_pengaduan, tb_pengaduan.status_pengaduan, tb_masyarakat.masyarakat_nama, tb_masyarakat.masyarakat_tlpn,tb_pengaduan.masyarakat_nik, tb_pengaduan.isi_laporan_pengaduan,tb_tanggapan.tgl_tanggapan, tb_tanggapan.tanggapan_isi, tb_petugas.nama_petugas FROM tb_pengaduan  join tb_masyarakat  ON tb_pengaduan.masyarakat_nik = tb_masyarakat.masyarakat_nik join tb_tanggapan  ON tb_pengaduan.id_pengaduan = tb_tanggapan.id_pengaduan join tb_petugas  ON tb_tanggapan.id_petugas = tb_petugas.id_petugas WHERE tb_pengaduan.status_pengaduan = '$status' ORDER BY tb_tanggapan.tgl_tanggapan DESC")->result();
	}

	function date_page_laporan($tgl_awal, $tgl_akhir){
		return $this->db->query("SELECT  tb_pengaduan.tgl_pengaduan, tb_pengaduan.isi_laporan_pengaduan, tb_pengaduan.foto_pengaduan, tb_masyarakat.masyarakat_nama, tb_tanggapan.tgl_tanggapan, tb_tanggapan.tanggapan_isi, tb_petugas.nama_petugas FROM tb_pengaduan join tb_masyarakat on tb_pengaduan.masyarakat_nik = tb_masyarakat.masyarakat_nik join tb_tanggapan on tb_pengaduan.id_pengaduan = tb_tanggapan.id_pengaduan  join tb_petugas on tb_tanggapan.id_petugas = tb_petugas.id_petugas WHERE tb_pengaduan.tgl_pengaduan BETWEEN '$tgl_awal' AND '$tgl_akhir'")->result();

		// return $this->db->query("SELECT * FROM tb_pengaduan, tb_tanggapan, tb_masyarakat, tb_petugas where tgl_pengaduan BETWEEN '$tgl_awal' and '$tgl_akhir' ")->result();
	}

	function select_pengaduan($id){
		return $this->db->query("SELECT * FROM tb_pengaduan where id_pengaduan = '$id'")->result();
	}

	function delete_pengaduan($id){
		$this->db->where('id_pengaduan', $id);
		$this->db->delete('tb_pengaduan');
	}

	function delete_petugas($id){
		$this->db->where('id_petugas', $id);
		$this->db->delete('tb_petugas');
	}

	function delete_masyarakat($id){
		$this->db->where('masyarakat_nik', $id);
		$this->db->delete('tb_masyarakat');
	}


}
?>