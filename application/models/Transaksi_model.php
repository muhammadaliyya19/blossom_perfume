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
				$this_bibit = $this->db->get_where('bibit' , ['id_bibit' => $this->input->post('id_bibit', true)])->row_array();
				if ($_SESSION['user']['jabatan'] == "Admin") {
					$data = array(
					"id_bibit" 			=> $this->input->post('id_bibit', true),
					"kode_transaksi"	=> $this->input->post('kode_transaksi', true),
					"jumlah_pembelian" 	=> $this->input->post('jumlah', true),
					"harga_beli"	 	=> $this_bibit['harga_beli'],
					"harga_satuan" 		=> $this->input->post('harga_satuan', true),
					"total_harga"		=> $this->input->post('harga_total', true),
					"tanggal_transaksi"	=> $now->format('Y-m-d H:i:s'),
					"outlet"			=> $id_outlet,
					"pegawai"			=> $_SESSION['user']['id']
					);
				}else{
					$data = array(
					"id_bibit" 			=> $this->input->post('id_bibit', true),
					"kode_transaksi"	=> $this->input->post('kode_transaksi', true),
					"jumlah_pembelian" 	=> $this->input->post('jumlah', true),
					"harga_beli"	 	=> $this_bibit['harga_beli'],
					"harga_satuan" 		=> $this->input->post('harga_satuan', true),
					"total_harga"		=> $this->input->post('harga_total', true),
					"tanggal_transaksi"	=> $now->format('Y-m-d H:i:s'),
					"outlet"			=> $id_outlet,
					"pegawai"			=> $_SESSION['user']['id']
					);
				}
				$this->db->insert('transaksi', $data);
				$this_outlet = $this->db->get_where('outlet' , ['id_outlet' => $data['outlet']])->row_array();
				$this_pegawai = $this->db->get_where('user' , ['id' => $data['pegawai']])->row_array();
				$send_email = array(
					"nama_bibit" 		=> $this_bibit['nama_bibit'],
					"jumlah" 			=> $data['jumlah_pembelian'],
					"alamat_outlet" 	=> $this_outlet['alamat_outlet'],
					"total_harga" 		=> $data['total_harga'],
					"nama_pegawai"		=> $this_pegawai['nama']
				);
				_sendEmail($send_email, 'newTransaction');
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
					SELECT transaksi.id_transaksi, bibit.nama_bibit, bibit.kode_bibit, transaksi.jumlah_pembelian, transaksi.kode_transaksi, transaksi.harga_satuan, transaksi.total_harga, transaksi.tanggal_transaksi, transaksi.outlet, user.nama FROM transaksi INNER JOIN bibit ON transaksi.id_bibit = bibit.id_bibit
						INNER JOIN user ON transaksi.pegawai = user.id WHERE transaksi.tanggal_transaksi LIKE '$today%' AND transaksi.outlet LIKE '$outlet'
                    ";
      		$transaksi = $this->db->query($queryTransaksi)->result_array();
			return $transaksi;
		}

		public function getTransaksiById($id)
		{
			//$this->db->where('nis', $id);
			return $this->db->get_where('transaksi' , ['id_transaksi' => $id])->row_array();
		}

		public function getTransaksiHarian($bulan, $tahun, $outlet = null)
		{
			$queryPerhari = "";
			if ($outlet == null) {				
				$queryPerhari = "
								SELECT t.tanggal_transaksi as pertanggal, COUNT(*) as Jumlah_transaksi, SUM(t.total_harga) as ahj, SUM(t.harga_beli * t.jumlah_pembelian) as ahb, (SUM(t.total_harga)-SUM(t.harga_beli * t.jumlah_pembelian)) as pendapatan
							    FROM transaksi t 
							    WHERE MONTH(t.tanggal_transaksi) LIKE '%'+$bulan+'%' AND YEAR(t.tanggal_transaksi) LIKE '%'+$tahun+'%'
							    GROUP BY CONCAT(YEAR(t.tanggal_transaksi), '-', MONTH(t.tanggal_transaksi) , '-', DAY(t.tanggal_transaksi))
				";
			}else{
				$queryPerhari = "
								SELECT t.outlet, t.tanggal_transaksi as pertanggal, COUNT(*) as Jumlah_transaksi, SUM(t.total_harga) as ahj, SUM(t.harga_beli * t.jumlah_pembelian) as ahb, (SUM(t.total_harga)-SUM(t.harga_beli * t.jumlah_pembelian)) as pendapatan
							    FROM transaksi t 
							    WHERE MONTH(t.tanggal_transaksi) LIKE '%'+$bulan+'%' AND YEAR(t.tanggal_transaksi) LIKE '%'+$tahun+'%'
							    AND t.outlet LIKE $outlet
							    GROUP BY CONCAT(YEAR(t.tanggal_transaksi), '-', MONTH(t.tanggal_transaksi) , '-', DAY(t.tanggal_transaksi))
				";
      		}
	      	$transaksiHarian = $this->db->query($queryPerhari)->result_array();
      		return $transaksiHarian;
		}

		public function getTransaksiBulanan($tahun, $outlet = null)
		{
			$queryPerbulan = "";
			if ($outlet == null) {
				$queryPerbulan = "
								SELECT CONCAT(YEAR(t.tanggal_transaksi), '/', MONTH(t.tanggal_transaksi)) as pertanggal, COUNT(*) as Jumlah_transaksi, SUM(t.total_harga) as ahj, SUM(t.harga_beli * t.jumlah_pembelian) as ahb, (SUM(t.total_harga)-SUM(t.harga_beli * t.jumlah_pembelian)) as pendapatan
							    FROM transaksi t 
							    WHERE YEAR(t.tanggal_transaksi) LIKE '%'+$tahun+'%'
							    GROUP BY CONCAT(YEAR(t.tanggal_transaksi), '-', MONTH(t.tanggal_transaksi))
				";
			}else{
				$queryPerbulan = "
								SELECT t.outlet, CONCAT(YEAR(t.tanggal_transaksi), '/', MONTH(t.tanggal_transaksi)) as pertanggal, COUNT(*) as Jumlah_transaksi, SUM(t.total_harga) as ahj, SUM(t.harga_beli * t.jumlah_pembelian) as ahb, (SUM(t.total_harga)-SUM(t.harga_beli * t.jumlah_pembelian)) as pendapatan
							    FROM transaksi t 
							    WHERE YEAR(t.tanggal_transaksi) LIKE '%'+$tahun+'%' AND t.outlet LIKE $outlet
							    GROUP BY CONCAT(YEAR(t.tanggal_transaksi), '-', MONTH(t.tanggal_transaksi))
				";
			}
      		$transaksiBulanan = $this->db->query($queryPerbulan)->result_array();
      		return $transaksiBulanan;
		}

		public function getTransaksiTahunan($outlet = null)
		{
			$queryPertahun = "";
			if ($outlet == null) {
				$queryPertahun = "
							SELECT YEAR(t.tanggal_transaksi) as pertanggal, COUNT(*) as Jumlah_transaksi, SUM(t.total_harga) as ahj, SUM(t.harga_beli * t.jumlah_pembelian) as ahb, (SUM(t.total_harga)-SUM(t.harga_beli * t.jumlah_pembelian)) as pendapatan
						    FROM transaksi t 
						    GROUP BY YEAR(t.tanggal_transaksi)
				";
			}else{
				$queryPertahun = "
							SELECT t.outlet, YEAR(t.tanggal_transaksi) as pertanggal, COUNT(*) as Jumlah_transaksi, SUM(t.total_harga) as ahj, SUM(t.harga_beli * t.jumlah_pembelian) as ahb, (SUM(t.total_harga)-SUM(t.harga_beli * t.jumlah_pembelian)) as pendapatan
						    FROM transaksi t 
						    WHERE t.outlet LIKE $outlet
						    GROUP BY YEAR(t.tanggal_transaksi)
				";
			}
			$transaksiTahunan = $this->db->query($queryPertahun)->result_array();
      		return $transaksiTahunan;
		}

		public function getPenjualanAllBibit()
		{
			$penjualanBibit = [];
			$bibit = $this->db->get('bibit')->result_array();
			foreach ($bibit as $b) {
				$queryPenjualanBibit = "
								SELECT t.id_bibit, SUM(t.jumlah_pembelian) as terjual
							    FROM transaksi t WHERE t.id_bibit LIKE $b[id_bibit]
							    GROUP BY t.id_bibit
				";
				$bibit_terjual = $this->db->query($queryPenjualanBibit)->row_array();
				if ($bibit_terjual != null) {
					array_push($penjualanBibit, $bibit_terjual);
				}else{
					$data_empty = ['id_bibit'=>$b['id_bibit'], 'terjual'=>'0'];
					array_push($penjualanBibit, $data_empty);					
				}				
			}
      		return $penjualanBibit;
		}
	}
?>