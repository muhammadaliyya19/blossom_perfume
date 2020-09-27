<?php 
	class Bibit_model extends CI_Model
	{
		
		public function getAllBibit()
		{
			return $query = $this->db->get('bibit')->result_array();
		}

		public function tambahDataBibit()
		{
			date_default_timezone_set("Asia/Jakarta");
			$now = new DateTime();
			$data = array(
			"kode_bibit" 		=> $this->input->post('kode_bibit', true),
			"nama_bibit" 		=> $this->input->post('nama_bibit', true),
			"Stok_bibit" 		=> 0,
			"harga_jual" 		=> $this->input->post('harga_jual', true),
			"harga_beli"		=> $this->input->post('harga_beli', true),
			"date_update_bibit"	=> $now->format('Y-m-d H:i:s')
			);
			$this->db->insert('bibit', $data);
		}

		public function tambahAllOutlet()
		{
			date_default_timezone_set("Asia/Jakarta");
			$now = new DateTime();
			$query 		 = 'SELECT * FROM bibit ORDER BY id_bibit DESC LIMIT 1';
      		$latestBibit = $this->db->query($query)->row_array();
			$allOutlet 	 = $this->db->get('outlet')->result_array();
			foreach ($allOutlet as $ao) {
				$data = array(
				"id_bibit" 		=> $latestBibit['id_bibit'],
				"id_outlet" 	=> $ao['id_outlet'],
				"stok" 			=> 0,
				"last_update"	=> $now->format('Y-m-d H:i:s')
				);
				$this->db->insert('bibit_outlet', $data);
			}
		}

		public function hapusDataBibit($id)
		{
			//$this->db->where('nis', $id);
			$this->db->delete('bibit', ['id_bibit' => $id]);
			return 1;
		}

		public function hapusDistribusiBibit($id)
		{
			$this->db->delete('bibit_outlet', ['id_bibit' => $id]);
			return 1;
		}

		public function getBibitById($id)
		{
			//$this->db->where('nis', $id);
			return $this->db->get_where('bibit' , ['id_bibit' => $id])->row_array();
		}

		public function getBibitOutlet($id)
		{
			return $this->db->get_where('bibit_outlet' , ['id_bibit' => $id])->result_array();
		}

		public function updateDataBibit()
		{
			date_default_timezone_set("Asia/Jakarta");
			$now = new DateTime();
			$data = array(
			"kode_bibit" 		=> $this->input->post('kode_bibit', true),
			"nama_bibit" 		=> $this->input->post('nama_bibit', true),
			"Stok_bibit" 		=> $this->input->post('stok_bibit', true),
			"harga_jual" 		=> $this->input->post('harga_jual', true),
			"harga_beli"		=> $this->input->post('harga_beli', true),
			"date_update_bibit"	=> $now->format('Y-m-d H:i:s')
			);
			$this->db->where('id_bibit', $this->input->post('id_bibit'));
			$this->db->update('bibit', $data);
		}

		public function updateStokBibit($id_bibit)
		{
			$bibit_all_outlet = $this->db->get_where('bibit_outlet' , ['id_bibit' => $id_bibit])->result_array();
			$new_stok   = 0;
			foreach ($bibit_all_outlet as $bao) {
				$new_stok += $bao['stok'];
			}
			date_default_timezone_set("Asia/Jakarta");
			$now = new DateTime();
			$data = array(
				"Stok_bibit" 		=> $new_stok,
				"date_update_bibit"	=> $now->format('Y-m-d H:i:s')
			);
			$this->db->where('id_bibit', $id_bibit);
			$this->db->update('bibit', $data);
		}
	}
?>