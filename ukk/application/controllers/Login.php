<?php 

class Login extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		
	}
	function login_first()
	{

		$this->load->view('login');

	}
	function login_proses(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$result = $this->Pengaduan_m->do_login($username, md5($pass));

		// print_r($result->result());
		// return 0;

		// print_r($result->num_rows());
		// return 0;
		if($result->num_rows() > 0){
			$data = $result->row();
			$sessionData =[
				'username'=>$data->masyarakat_username,
				'nama'=>$data->masyarakat_nama,
				'nik' =>$data->masyarakat_nik
				// 'id_masyarakat' =>$data->id_masyarakat
			];

			$this->session->set_userdata($sessionData);

			// klo login berhasil mau di arahkan kmn?
			redirect('Welcome');
		}else{
			redirect('Login/login_first');
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect("Welcome");
	}

	function register()
	{

		$this->load->view('register');

	}
	public function register_process()
	{
		$valid= $this->form_validation;
		$valid->set_rules('nik', 'NIK', 'required|trim|is_unique[tb_masyarakat.masyarakat_nik]', ['required' => '%s tidak boleh kosong' ,'is_unique' => '%s sudah terdaftar']);
		$valid->set_rules('nama', 'Nama','required', ['required' => '%s tidak boleh kosong'] );
		$valid->set_rules('username', 'Username','required', ['required' => '%s tidak boleh kosong'] );
		$valid->set_rules('password', 'Password','required', ['required' => '%s tidak boleh kosong'] );

		if (!$valid->run()) {
			$this->load->view('/register');
		}else{


			$nik = $this->input->post("nik");
			$nama = $this->input->post("nama");
			$username = $this->input->post("username");
			$password = $this->input->post("password");

			$query = $this->db->query("CALL register_masyarakat('$nik', '$nama', '$username', md5('$password'))");
			if($query){
				redirect("/Login/login_first");
			}else{
				redirect("/Login/register");
			}
		}

	}

	function login_admin_p(){
		// $username_p = $this->input->post('petugas_username');
		$username_p = $this->input->post('username');
		$pass_p = $this->input->post('pass');
		// $pass_p = $this->input->post('petugas_password');
		$result = $this->Pengaduan_m->do_loginadmin($username_p, md5($pass_p));

		// print_r($result->result());
		// return 0;

		// print_r($result->num_rows());
		// return 0;
		if($result->num_rows() > 0){
			$data = $result->row();
			$sessionData =[
				'username'=>$data->petugas_username,
				'nama_petugas'=>$data->nama_petugas,
				'level' =>$data->level,
				'id_petugas' =>$data->id_petugas
			];

			$this->session->set_userdata($sessionData);

			// klo login berhasil mau di arahkan kmn?
			redirect('Admin/page_menunggu');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Username atau Password anda salah</div>');
			redirect('/admin');
		}
	}
	function logout_admin(){
		$this->session->sess_destroy();
		redirect("admin");
	}

}



?>