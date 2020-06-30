<?php 
	class Outlet_model extends CI_Model
	{
		
		public function getAllOutlet()
		{
			return $query = $this->db->get('outlet')->result_array();
		}

		public function tambahDataOutlet()
		{
			$data = array(
				"alamat_outlet"	=> $this->input->post('alamat', true)
			);
			$this->db->insert('outlet', $data);
		}

		public function tambahAllBibit()
		{
			date_default_timezone_set("Asia/Jakarta");
			$now 			= new DateTime();
			$query 			= 'SELECT * FROM outlet ORDER BY id_outlet DESC LIMIT 1';
      		$latestOutlet 	= $this->db->query($query)->row_array();
			$allBibit 	 	= $this->db->get('bibit')->result_array();
			foreach ($allBibit as $ab) {
				$data = array(
				"id_bibit" 		=> $ab['id_bibit'],
				"id_outlet" 	=> $latestOutlet['id_outlet'],
				"stok" 			=> 0,
				"last_update"	=> $now->format('Y-m-d H:i:s')
				);
				$this->db->insert('bibit_outlet', $data);
			}
		}

		public function hapusDataOutlet($id)
		{
			$this->db->delete('outlet', ['id_outlet' => $id]);
			return 1;
		}

		public function getOutletById($id)
		{
			return $this->db->get_where('outlet' , ['id_outlet' => $id])->row_array();
		}

		public function getOutletBibit($id)
		{
			return $this->db->get_where('bibit_outlet' , ['id_outlet' => $id])->result_array();
		}

		public function getBO($id_outlet, $id_bibit)
		{
			return $this->db->get_where('bibit_outlet' , ['id_outlet' => $id_outlet , 'id_bibit' => $id_bibit])->row_array();
		}

		public function updateBO($id_outlet, $id_bibit)
		{
			$data = array(
				"stok"	=> $this->input->post('stok', true)
			);
			$this->db->where(['id_outlet' => $id_outlet , 'id_bibit' => $id_bibit]);
			$this->db->update('bibit_outlet', $data);
			return 1;
		}

		public function kurangiStokBibit($id_outlet, $id_bibit)
		{
			$this_bo 	= $this->db->get_where('bibit_outlet' , ['id_bibit' => $id_bibit, 'id_outlet => $id_outlet'])->row_array();
			$pembelian 	= $this->input->post('jumlah', true);
			$new_stok   = $this_bo['stok'] - $pembelian;
			$data 		= array(
							"stok"	=> $new_stok
						  );
			$this->db->where(['id_outlet' => $id_outlet , 'id_bibit' => $id_bibit]);
			$this->db->update('bibit_outlet', $data);
			return 1;
		}

		public function updateDataOutlet()
		{
			$data = array(
				"alamat_outlet"	=> $this->input->post('alamat', true)
			);
			$this->db->where('id_outlet', $this->input->post('id', true));
			$this->db->update('outlet', $data);
		}
	}
?>