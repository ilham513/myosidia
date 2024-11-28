<?php

class Akun_model extends CI_Model{

	public function cek_akun($username, $password)
	{
		//query ambil data login
		$query = $this->db->query("SELECT * FROM akun WHERE username='$username' AND password='$password'");
        // var_dump($_POST);die();
		$result = $query->result_array();
		
		//membuat session login
		if (count($result) > 0) {
			//set session
			$this->session->set_userdata('login', true);
			
	
			echo 'Login berhasil';
			
			redirect('admin', 'refresh');
		} else {
			echo '<script>alert("username atau password salah. Mohon tulis kembali!")</script>';
			redirect('login', 'refresh');
		}		
	}

	public function mengecek_session()
	{
		if($this->session->userdata('login')){
			
		}else{
			echo '<script>alert("Silahkan login terlebih dahulu!")</script>';
			redirect('login', 'refresh');
		}
				
	}


	public function menghapus_session()
	{
		//hapus session
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('role');
		
		//hapus semua session
		// sess_destroy();
		
		//redirect
		echo '<script>alert("berhasil logout")</script>';
		redirect('login', 'refresh');				
	}

}