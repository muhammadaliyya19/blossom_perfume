<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Bibit extends CI_Controller
	{		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			//session_start();
			$this->load->model('Bibit_model');		
			$this->load->model('Outlet_model');
			$this->load->model('Prediksi_model');
			$this->load->model('Transaksi_model');
			$this->load->model('User_model');
		}

		public function index()
		{
			$data['user'] = $_SESSION['user'];
			$data['bibit'] = $this->Bibit_model->getAllBibit();			
			if ($_SESSION['user']['jabatan'] == "Admin") {
				$data['title'] = 'Data Semua Bibit';
				$data['outlet'] = $this->Outlet_model->getAllOutlet();
      			// print_r($data['bibit']);
      			// die;
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bibit/index', $data);
				$this->load->view('templates/footer');
			}else{
				$data['bibit_outlet'] = $this->Outlet_model->getOutletBibit($_SESSION['user']['id_outlet']);
				$data['outlet'] = $this->Outlet_model->getOutletById($_SESSION['user']['id_outlet']);
				$data['title'] = 'Data Bibit Outlet ' . $data['outlet']['alamat_outlet'];
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bibit/index', $data);
				$this->load->view('templates/footer');
			}
		}

		public function detail($id)
		{
			$data['user'] = $_SESSION['user'];
			$data['this_bibit'] = $this->Bibit_model->getBibitById($id);			
			if ($_SESSION['user']['jabatan'] == "Admin") {
				$data['title'] = 'Informasi Stok dan Distribusi Bibit ' . $data['this_bibit']['nama_bibit'];
				$data['outlet'] = $this->Outlet_model->getAllOutlet();
				$data['bibit_outlet'] = $this->Bibit_model->getBibitOutlet($data['this_bibit']['id_bibit']);
      			// print_r($data['bibit']);
      			// die;
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bibit/detail', $data);
				$this->load->view('templates/footer');
			}
		}

		public function tambah()
		{
			$this->form_validation->set_rules('nama_bibit', 'Nama Bibit', 'required');
			// $this->form_validation->set_rules('stok_bibit', 'Stok', 'required');
			$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
			$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
			if ($this->form_validation->run() == FALSE) {	
				redirect('bibit');
			}else{
				$this->Bibit_model->tambahDataBibit();				
				$this->Bibit_model->tambahAllOutlet();				
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Data bibit telah ditambahkan ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('bibit');
			}
		}

		public function hapus($id)
		{
			if ($this->Bibit_model->hapusDataBibit($id) > 0) {
				$this->Bibit_model->hapusDistribusiBibit($id);
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Data outlet telah dihapus ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('bibit');
			}
		}

		public function update()
		{
			$this->form_validation->set_rules('nama_bibit', 'Nama Bibit', 'required');
			$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
			$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
			if ($this->form_validation->run() == FALSE) {
				redirect('bibit');
			}else{
				$this->Bibit_model->updateDataBibit();
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Bibit telah diupdate ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('bibit');
			}
		}

		public function getDetails()
		{
			echo json_encode($this->Bibit_model->getBibitById($_POST['id']));
		}
	}
?>

