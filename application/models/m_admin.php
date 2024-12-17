<?php 

class M_admin extends CI_Model{
	function tampil_data($nama_tabel){
		return $this->db->get($nama_tabel);
	}

	function input_data($nama_tabel){
		if($nama_tabel == 'penyewa'){
			$data = array(
				'nama' => $this->input->post('nama'),
				'no_telp' => $this->input->post('no_telp')
			);	
		}

		if($nama_tabel == 'waktu'){
			$jam = $this->input->post('jam1'). ' - '.$this->input->post('jam2');
			$data = array(
				'hari' => $this->input->post('hari'),
				'jam' => $jam
			);	
		}

		if($nama_tabel == 'jadwal_satuan'){
			$data = array(
				'nama_penyewa' => $this->input->post('penyewa'),
				'waktu_sewa' => $this->input->post('waktu')
			);	

			$nama_tabel = 'jadwal';
		}

        $this->db->insert($nama_tabel, $data);
	}

	function edit($id){
		 $this->db->select('*');
		 $this->db->from('penyewa');
		 $this->db->where('id', $id);
	
		 return $this->db->get()->row();
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function input_data_jadwal($nama_tabel, $nama_penyewa, $waktu_sewa){
		$data = array(
			'nama_karyawan' => $nama_penyewa,
			'waktu_kerja' => $waktu_sewa
		);	

        $this->db->insert($nama_tabel, $data);
	}

	function jadwal_edit($id){
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->where('id', $id);
   
		return $this->db->get()->row();
   }

	function edit_waktu($id){
		$this->db->select('*');
		$this->db->from('waktu');
		$this->db->where('id', $id);

		return $this->db->get()->row();
	}

}