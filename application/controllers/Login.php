<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('akun_model');
	}

	public function index()
	{
		$this->load->view('login_index.php');
	}

	public function login_go()
	{
		//ambil id & password
		$username = $this->input->post('username');
		$password = md5($this->input->post('password')); //enkripsi md5
		
		//cek akun jika benar maka login
		$this->akun_model->cek_akun($username, $password);
	}

	public function logout()
	{
		//hapus session
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('role');
		
		//hapus semua session
		// sess_destroy();

		//redirect
		echo '<script>alert("berhasil logout")</script>';
		redirect('/', 'refresh');
	}
}
