<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('akun_model');
		$this->load->model('crud_model');
	}

	public function index()
	{
		$data['jumlah_karyawan'] = $this->crud_model->menghitung_jumlah_row('karyawan');
		$data['jumlah_jadwal'] = $this->crud_model->menghitung_jumlah_row('jadwal');

		$this->load->view('admin_index.php', $data);
	}

	public function karyawan()
	{
		$data['array_karyawan'] = $this->crud_model->mengambil_data('karyawan');

		$this->load->view('admin_karyawan.php',$data);
	}

	public function jadwal()
	{
		$data['array_jadwal'] = $this->crud_model->mengambil_data('jadwal');

		$this->load->view('admin_jadwal.php', $data);
	}

	public function waktu()
	{
		$data['array_waktu'] = $this->crud_model->mengambil_data('waktu');

		$this->load->view('admin_waktu.php',$data);
	}

	public function waktu_add()
	{
		$this->load->view('admin_waktu_add.php');
	}

	public function jadwal_add()
	{
		$this->load->view('admin_jadwal_add.php');
	}

	public function reset_jadwal()
	{
		$this->db->truncate('Jadwal');

		//redirect
		redirect('/admin/jadwal', 'refresh');		
	}

	public function karyawan_add()
	{
		$this->load->view('admin_karyawan_add.php');
	}

	public function waktu_add_go()
	{
		// var_dump($_POST);die();
		//variabel data
		$jam = $this->input->post('waktu_mulai'). " - ".$this->input->post('waktu_selesai');
		$data = array(
			'hari' => $this->input->post('hari'),
			'jam' => $jam	
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('waktu', $data);
		
		//redirect
		redirect('/admin/waktu', 'refresh');

	}

	public function karyawan_add_go()
	{
		//variabel data

		$data = array(
			'nama_karyawan' => $this->input->post('nama_karyawan'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nomor_telpon' => $this->input->post('nomor_telpon')
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('karyawan', $data);

		$obj_karyawan = $this->crud_model->get_last_row('karyawan');

		$data = array(
			'id_user' => $this->input->post('id_user'),
			'password_user' => $this->input->post('password_user'),
			'id_karyawan' => $obj_karyawan->id_karyawan
		);

		// var_dump($data);die();
		
		//tampilkan view
		$this->crud_model->masukan_data('user', $data);

		//redirect
		redirect('/admin/karyawan', 'refresh');

	}

	public function waktu_delete($id)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('waktu','id',$id);

		//redirect
		redirect('/admin/waktu', 'refresh');
	}

	public function karyawan_delete($id_karyawan)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('karyawan','id_karyawan',$id_karyawan);

		//redirect
		redirect('/admin/karyawan', 'refresh');
	}

	public function waktu_edit($id)
	{
		//load model crud
		$data['array_waktu'] = $this->crud_model->mengambil_data_id('waktu','id',$id);
		$data['obj_waktu'] = $data['array_waktu'][0];
		
		// var_dump($data);die();

		$this->load->view('admin_waktu_edit', $data);
	}	

	public function karyawan_edit($id_karyawan)
	{
		//load model crud
		$data['array_karyawan'] = $this->crud_model->mengambil_data_id('karyawan','id_karyawan',$id_karyawan);
		$data['obj_karyawan'] = $data['array_karyawan'][0];
		
		// var_dump($data);die();

		$this->load->view('admin_karyawan_edit', $data);
	}	

	public function waktu_edit_go()
	{
		// var_dump($_POST);

		//variabel data edit
		$data = array(
			'hari' => $this->input->post('hari'),
			'jam' => $this->input->post('jam')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('waktu', $data,'id',$this->input->post('id'));
		
		//redirect
		redirect('admin/waktu', 'refresh');
	}	

	public function karyawan_edit_go()
	{
		// var_dump($_POST);

		//variabel data edit
		$data = array(
			'nama_karyawan' => $this->input->post('nama_karyawan'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nomor_telpon' => $this->input->post('nomor_telpon')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('karyawan', $data,'id_karyawan',$this->input->post('id_karyawan'));
		
		//redirect
		redirect('admin/karyawan', 'refresh');
	}	

	function jadwal_otomatis(){
		set_time_limit(120);
		$this->load->model('m_admin');
		$data['penyewa'] = $this->m_admin->tampil_data('karyawan')->result();
		$data['waktu'] = $this->m_admin->tampil_data('waktu')->result();

		// var_dump($data);die();
		$this->load->view('v_admin_jadwal_otomatis',$data);		
	}


}
