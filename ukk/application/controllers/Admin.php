<?php 


	/**
	* 
	*/
	class Admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}



		function index(){
			$this->load->view('admin/login_admin');
		}

		function page_menunggu(){
			if($this->session->has_userdata('username')){
				$data['menunggu']=$this->Pengaduan_m->getdatapengaduan("0");
				$this->load->view('admin/page_menunggu', $data);
			}else{
				echo "login dulu gais";
			}
		}

		function page_proses(){
			if($this->session->has_userdata('username')){
				$data['proses']=$this->Pengaduan_m->getdatapengaduan("proses");
				$this->load->view('admin/page_proses', $data);
			}else{
				echo "login dulu gais";
			}
		}

		function page_selesai(){
			if($this->session->has_userdata('username')){
				$data['selesai']=$this->Pengaduan_m->getdatapengaduan_s("selesai");
				$this->load->view('admin/page_selesai', $data);
			}else{
				echo "login dulu gais";
			}
		}

		function registrasi_petugas(){
			$this->load->view('admin/registrasi_petugas');
		}

		function daftar_petugas(){
			if($this->session->has_userdata('username')){
				$data['daftar_petugas']=$this->Pengaduan_m->daftar_petugas();
				$this->load->view('admin/daftar_petugas', $data);
			}else{
				echo "login dulu gais";
			}
			
		}

		function data_masyarakat(){
			if($this->session->has_userdata('username')){
				$data['data_masyarakat']=$this->Pengaduan_m->data_masyarakat();
				$this->load->view('admin/data_masyarakat', $data);
			}else{
				echo "login dulu gais";
			}
			
		}

		function filter_laporan(){
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');

			$query = $this->Pengaduan_m->date_page_laporan($tgl_awal, $tgl_akhir);
			$data['filter'] = $query;
			// print_r($query);
			$this->load->view('Admin/page_laporan', $data);

			// $this->db->select(array("tgl_pengaduan","masyarakat_nama","isi_laporan_pengaduan","foto_pengaduan","tgl_tanggapan","tanggapan_isi","nama_petugas"));
			// $this->db->from("tb_pengaduan");
			// $this->db->join("tb_masyarakat","tb_pengaduan.masyarakat_nik = tb_masyarakat.masyarakat_nik");
			// $this->db->join("tb_tanggapan","tb_pengaduan.id_pengaduan = tb_tanggapan.id_pengaduan");
			// $this->db->join("tb_petugas","tb_tanggapan.id_petugas = tb_petugas.id_petugas");
			// $this->db->where("tgl_pengaduan >=", $tgl_awal);
			// $this->db->where("tgl_pengaduan <=", $tgl_akhir);
			// redirect("admin/page_laporan");


		}
		function page_laporan(){
			if($this->session->has_userdata('username')){
				$data["filter"] = null;
				$this->load->view('admin/page_laporan', $data);
			}else{
				echo "login dulu gais";
			}
			
		}

		function proses_register_petugas(){

			
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$tlp = $this->input->post('tlp');
			$level = $this->input->post('level');

			$query = $this->db->query("CALL register_petugas('$nama', '$username', md5('$password'), '$tlp', '$level')");
			if($query){
				$this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"> Registrsai Berhasil</div>');
				redirect('Admin/registrasi_petugas');
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Data Salah</div>');
				redirect('Admin/registrasi_petugas');
			}
			
		}

		function delet_pengaduan($id){
			$data = $this->Pengaduan_m->getdatapengaduan($id);
		// print_r($data);
			foreach ($data as $key => $value) {
				unlink('./assets/upload/'. $value->foto);
			}
			$this->Pengaduan_m->delete_pengaduan($id);
			redirect('admin/page_menunggu');
		}

		function delet_pengaduan_proses($id){
			$data = $this->Pengaduan_m->getdatapengaduan($id);
		// print_r($data);
			foreach ($data as $key => $value) {
				unlink('./assets/upload/'. $value->foto);
			}
			$this->Pengaduan_m->delete_pengaduan($id);
			redirect('admin/page_proses');
		}

		function delet_pengaduan_selesai($id){
			$data = $this->Pengaduan_m->getdatapengaduan_s($id);
		// print_r($data);
			foreach ($data as $key => $value) {
				unlink('./assets/upload/'. $value->foto);
			}
			$this->Pengaduan_m->delete_pengaduan($id);
			redirect('admin/page_selesai');
		}

		function delet_data_petugas($id){
			$data = $this->Pengaduan_m->daftar_petugas($id);
		// print_r($data);
			$this->Pengaduan_m->delete_petugas($id);
			redirect('admin/daftar_petugas');
		}

		function delet_data_masyarakat($id){
			$data = $this->Pengaduan_m->data_masyarakat($id);
		// print_r($data);
			$this->Pengaduan_m->delete_masyarakat($id);
			redirect('admin/data_masyarakat');
		}

		function update_verif($id){
			$this->db->set('status_pengaduan', 'proses');
			$this->db->where('id_pengaduan', $id);
			$this->db->update('tb_pengaduan');
			redirect('admin/page_proses');
		}

		function update_selesai(){
			$tanggapan = $this->input->post('tanggapan');
			$id = $this->input->post('id');

			$this->db->set('status_pengaduan', 'selesai');
			$this->db->where('id_pengaduan', $id);
			$this->db->update('tb_pengaduan');

			$this->db->set('id_pengaduan', $id);
			$this->db->set('tgl_tanggapan', date('Ymd'));
			$this->db->set('tanggapan_isi', $tanggapan);
			$this->db->set('id_petugas', $_SESSION['id_petugas']);
			$this->db->insert('tb_tanggapan');
			redirect('admin/page_selesai');
		}

		public function debug()
		{
			# code...
			echo $_SESSION["nik"];
		}

		function generate_laporan(){
			$this->load->library('Dompdf_gen');

			$this->load->view('admin/generate_laporan');
			$laporan = $this->output->get_output();

			$this->dompdf->load_html($laporan);
			$this->dompdf->set_paper('A4', 'lanscape');
			$this->dompdf->render();
			$this->dompdf->stream("laporan.pdf");
		}


	}

	?>