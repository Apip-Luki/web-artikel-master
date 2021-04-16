<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	function index()
	{
		$data['histori']=$this->Pengaduan_m->histori();
		$data['tele']=$this->Pengaduan_m->masyarakat();
		$this->load->view('index', $data);

	}

	function register(){
		$this->load->view('register');
	}

	function insert_laproan(){
		$nm_file = $this->input->post('nm_foto');
		$config['upload_path']= './assets/upload/';
		$config['allowed_types']='jpg|jpeg|png';
		$config['file_name']=$nm_file;
		$config['overwrite']= TRUE;
		 $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('foto')){
			$foto = $this->upload->data();
			$data = array(
				'masyarakat_nik' => $this->session->userdata('nik'),
				'tgl_pengaduan' => $this->input->post('tgl'),
				'pengaduan_judul' => $this->input->post('judul'),
				'foto_pengaduan' => $foto['file_name'],
				'isi_laporan_pengaduan' => $this->input->post('isi'),
				'status_pengaduan' => $this->input->post('proses')
				
			);

		}else{
			$data = array(
				'masyarakat_nik' => $this->session->userdata('nik'),
				'tgl_pengaduan' => $this->input->post('tgl'),
				'pengaduan_judul' => $this->input->post('judul'),
				'isi_laporan_pengaduan' => $this->input->post('isi'),
				'status_pengaduan' => $this->input->post('proses')
				
			);
			echo $this->upload->display_errors();
		}
		$this->Pengaduan_m->tambah_laporan($data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Laporan anda telah di kirim</div>');
 

		redirect('Welcome');

	}

	function insert_tlpn(){
		$tangapan = $this->input->post();
		// UPDATE `tb_masyarakat` SET `masyarakat_tlpn` = '3333333333333' WHERE `tb_masyarakat`.`masyarakat_nik` = '333333333333333';
	}

	
}
