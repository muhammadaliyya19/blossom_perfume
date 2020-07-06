<?php 
	class Transaksi_model extends CI_Model
	{
		
		public function getAllTransaksi()
		{
			return $query = $this->db->get('transaksi')->result_array();
		}

		public function tambahDataTransaksi()
		{
			if ($_SESSION['user']['jabatan'] == "Admin") {
				$id_outlet = $this->input->post('id_outlet', true);	
			}else{
				$id_outlet = $_SESSION['user']['id_outlet'];
			}
			$dataBibit = $this->db->get_where('bibit_outlet' , ['id_bibit' => $this->input->post('id_bibit', true), 'id_outlet' => $id_outlet])->row_array();
			$jumlah_beli = $this->input->post('jumlah', true);
			if ($dataBibit['stok'] > $jumlah_beli) {
				date_default_timezone_set("Asia/Jakarta");
				$now = new DateTime();
				if ($_SESSION['user']['jabatan'] == "Admin") {
					$data = array(
					"id_bibit" 			=> $this->input->post('id_bibit', true),
					"jumlah_pembelian" 	=> $this->input->post('jumlah', true),
					"harga_satuan" 		=> $this->input->post('harga_satuan', true),
					"total_harga"		=> $this->input->post('harga_total', true),
					"tanggal_transaksi"	=> $now->format('Y-m-d H:i:s'),
					"outlet"			=> $id_outlet,
					"pegawai"			=> $_SESSION['user']['id']
					);
				}else{
					$data = array(
					"id_bibit" 			=> $this->input->post('id_bibit', true),
					"jumlah_pembelian" 	=> $this->input->post('jumlah', true),
					"harga_satuan" 		=> $this->input->post('harga_satuan', true),
					"total_harga"		=> $this->input->post('harga_total', true),
					"tanggal_transaksi"	=> $now->format('Y-m-d H:i:s'),
					"outlet"			=> $id_outlet,
					"pegawai"			=> $_SESSION['user']['id']
					);
				}
				$this->db->insert('transaksi', $data);
				return 1;
			}else{
				return 0;
			}
		}

		public function hapusDataTransaksi($id)
		{
			//$this->db->where('nis', $id);
			$this->db->delete('transaksi', ['id_transaksi' => $id]);
			return 1;
		}

		public function getTransaksiOutletToday()
		{
			date_default_timezone_set("Asia/Jakarta");
			$now = new DateTime();
			$today = $now->format('Y-m-d');	
			$outlet = $_SESSION['user']['id_outlet'];
			$queryTransaksi = "
					SELECT transaksi.id_transaksi, bibit.nama_bibit, transaksi.jumlah_pembelian, transaksi.harga_satuan, transaksi.total_harga, transaksi.tanggal_transaksi, transaksi.outlet, transaksi.pegawai FROM transaksi INNER JOIN bibit ON transaksi.id_bibit = bibit.id_bibit WHERE transaksi.tanggal_transaksi LIKE '$today%' AND transaksi.outlet LIKE '$outlet'
                    ";
      		$transaksi = $this->db->query($queryTransaksi)->result_array();
			return $transaksi;
		}

		public function getTransaksiById($id)
		{
			//$this->db->where('nis', $id);
			return $this->db->get_where('transaksi' , ['id_transaksi' => $id])->row_array();
		}
	}
?>