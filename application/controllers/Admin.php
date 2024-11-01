<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin_index.php');
	}

	public function karyawan()
	{
		$this->load->view('admin_karyawan.php');
	}

	public function jadwal()
	{
		$this->load->view('admin_jadwal.php');
	}

	public function waktu()
	{
		$this->load->view('admin_waktu.php');
	}

	public function waktu_add()
	{
		$this->load->view('admin_waktu_add.php');
	}

}
