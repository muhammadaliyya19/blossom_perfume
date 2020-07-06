<?php 
	class User_model extends CI_Model
	{
		
		public function getAllUser()
		{
			return $query = $this->db->get('user')->result_array();
		}

		public function tambahDataPegawai()
		{
			date_default_timezone_set("Asia/Jakarta");
			$now = new DateTime();
			$data = array(
			"username" 		=> $this->input->post('username', true),
			"password" 		=> $this->input->post('password', true),
			"nama" 			=> $this->input->post('nama', true),
			"jabatan"		=> $this->input->post('jabatan', true),
			"id_outlet" 	=> $this->input->post('id_outlet', true),
			"no_hp" 		=> $this->input->post('no_hp', true),
			"alamat" 		=> $this->input->post('alamat', true),
			"date_created" 	=> $now->format('Y-m-d H:i:s')
			);
			$this->db->insert('user', $data);
			return 1;
		}

		public function hapusDataPegawai($id)
		{
			//$this->db->where('nis', $id);
			$this->db->delete('user', ['id' => $id]);
			return 1;
		}

		public function getPegawaiById($id)
		{
			return $this->db->get_where('user' , ['id' => $id])->row_array();
		}

		public function getPegawaiByOutlet($id)
		{
			return $this->db->get_where('user' , ['id_outlet' => $id])->result_array();
		}

		public function updateDataPegawai()
		{
			date_default_timezone_set("Asia/Jakarta");
			$now = new DateTime();
			$data = array(
			"username" 		=> $this->input->post('username', true),
			"password" 		=> $this->input->post('password', true),
			"nama" 			=> $this->input->post('nama', true),
			"jabatan"		=> $this->input->post('jabatan', true),
			"id_outlet" 	=> $this->input->post('id_outlet', true),
			"no_hp" 		=> $this->input->post('no_hp', true),
			"alamat" 		=> $this->input->post('alamat', true),
			"date_created" 	=> $now->format('Y-m-d H:i:s')
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user', $data);
		}
	}
?>