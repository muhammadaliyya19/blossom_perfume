<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Transaksi extends CI_Controller
	{		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');			
			//session_start();
			$this->load->model('Bibit_model');			
			$this->load->model('Outlet_model');
			$this->load->model('Prediksi_model');
			$this->load->model('Transaksi_model');
			$this->load->model('User_model');
			$this->load->library('form_validation');			
		}

		public function index()
		{
			$data['user'] = $_SESSION['user'];
			if ($_SESSION['user']['jabatan'] == "Admin") {
				$data['title'] = 'Transaksi';
				$queryTransaksi = "
					SELECT transaksi.id_transaksi, bibit.nama_bibit, bibit.kode_bibit, transaksi.jumlah_pembelian, transaksi.kode_transaksi, transaksi.harga_satuan, transaksi.total_harga, transaksi.tanggal_transaksi, transaksi.outlet, user.nama FROM transaksi INNER JOIN bibit ON transaksi.id_bibit = bibit.id_bibit
						INNER JOIN user ON transaksi.pegawai = user.id;
                    ";
      			$transaksi = $this->db->query($queryTransaksi)->result_array();
				$data['bibit'] = $this->Bibit_model->getAllBibit();			
				$data['outlet'] = $this->Outlet_model->getAllOutlet();			
      			$data['pegawai'] = $this->User_model->getAllUser();
      			$data['transaksi'] = $transaksi;
      			// print_r($transaksi);
      			// die;
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('transaksi/index', $data);
				$this->load->view('templates/footer');
			}else{
				$data['outlet'] = $this->Outlet_model->getOutletById($_SESSION['user']['id_outlet']);	
      			$data['pegawai'] = $this->User_model->getPegawaiByOutlet($_SESSION['user']['id_outlet']);
				$data['title'] = 'Transaksi Outlet ' . $data['outlet']['alamat_outlet'];
      			// $transaksi = $this->db->query($queryTransaksi)->result_array();
				$data['bibit'] = $this->Bibit_model->getAllBibit();			
      			$data['transaksi'] = $this->Transaksi_model->getTransaksiOutletToday();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('transaksi/index', $data);
				$this->load->view('templates/footer');
			}
		}

		public function tambah()
		{
			$this->form_validation->set_rules('kode_transaksi', 'Kode Transaksi', 'required');
			$this->form_validation->set_rules('id_bibit', 'Bibit', 'required');
			$this->form_validation->set_rules('jumlah', 'Jumlah pembelian', 'required');
			$this->form_validation->set_rules('harga_satuan', 'Harga jual', 'required');
			$this->form_validation->set_rules('harga_total', 'Total harga', 'required');
			if ($this->form_validation->run() == FALSE) {	
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Error – Tolong isi form yang masih kosong ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('transaksi');
			}else{
				$id_outlet = '';
				if ($_SESSION['user']['jabatan'] == 'Admin') {
					$id_outlet = $this->input->post('id_outlet', true);
				}else{
					$id_outlet = $_SESSION['user']['id_outlet'];
				}
				$id_bibit = $this->input->post('id_bibit', true);
				$success = $this->Transaksi_model->tambahDataTransaksi();
				if ($success > 0) {
					$this->Outlet_model->kurangiStokBibit($id_outlet, $id_bibit);
					$this->Bibit_model->UpdateStokBibit($id_bibit);				
					$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Transaksi telah berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
					redirect('transaksi');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Transaksi gagal ditambahkan! Cek stok bibit! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
					redirect('transaksi');
				}
			}
		}

		public function hapus($id)
		{
			if ($this->Transaksi_model->hapusDataTransaksi($id) > 0) {
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Data berhasil di hapus ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('transaksi');
			}
		}
	}
?>

