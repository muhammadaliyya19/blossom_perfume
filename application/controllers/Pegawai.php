<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Pegawai extends CI_Controller
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
			$data['title'] = 'Pegawai';
			$data['user'] = $_SESSION['user'];
			$data['pegawai'] = $this->User_model->getAllUser();			
			if ($_SESSION['user']['jabatan'] == "Admin") {
      			// print_r($data['bibit']);
      			// die;
				$data['outlet'] = $this->Outlet_model->getAllOutlet();			      			
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/index', $data);
				$this->load->view('templates/footer');
			}
		}

		public function tambah()
		{
			$data['title'] = 'Tambah Pegawai';
			$data['user'] = $_SESSION['user'];
			$data['outlet'] = $this->Outlet_model->getAllOutlet();			
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan Pegawai', 'required');
			$this->form_validation->set_rules('id_outlet', 'Outlet', 'required');
			$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat Pegawai', 'required');
			if ($this->form_validation->run() == FALSE) {	
				// echo "False cuk";
				// die;			
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/tambah', $data);
				$this->load->view('templates/footer');
			}else{
				// echo "True cuk";
				// die;
				$this->User_model->tambahDataPegawai();				
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Outlet telah ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('pegawai');
			}
		}

		public function hapus($id)
		{
			if ($this->User_model->hapusDataPegawai($id) > 0) {
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Data pegawai telah dihapus ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('pegawai');
			}else{
				redirect('pegawai');
			}
		}

		public function update($id)
		{
			$data['title'] = 'Update Pegawai';
			$data['user'] = $_SESSION['user'];
			$data['outlet'] = $this->Outlet_model->getAllOutlet();			
			$data['pegawai'] = $this->User_model->getPegawaiById($id);			
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan Pegawai', 'required');
			$this->form_validation->set_rules('id_outlet', 'Outlet', 'required');
			$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat Pegawai', 'required');
			if ($this->form_validation->run() == FALSE) {	
				// echo "False cuk";
				// die;			
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/edit', $data);
				$this->load->view('templates/footer');
			}else{
				// echo "True cuk";
				// die;
				$this->User_model->updateDataPegawai();				
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Outlet telah ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('pegawai');
			}
		}
	}
?>

