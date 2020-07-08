<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Outlet extends CI_Controller
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
			$data['title'] = 'Outlet';
			$data['user'] = $_SESSION['user'];
			$data['outlet'] = $this->Outlet_model->getAllOutlet();			
			if ($_SESSION['user']['jabatan'] != "Admin") {
      			// print_r($data['bibit']);
      			// die;
				$data['outlet'] = $this->Outlet_model->getAllOutlet();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('outlet/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('outlet/index', $data);
				$this->load->view('templates/footer');
			}
		}

		public function tambah()
		{
			$this->form_validation->set_rules('alamat', 'Alamat Outlet', 'required');
			if ($this->form_validation->run() == FALSE) {				
				redirect('outlet');
			}else{
				$this->Outlet_model->tambahDataOutlet();				
				$this->Outlet_model->tambahAllBibit();				
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Outlet telah ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('outlet');
			}
		}

		public function hapus($id)
		{
			if ($this->Outlet_model->hapusDataOutlet($id) > 0) {
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Data outlet telah dihapus ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('outlet');
			}
		}

		public function getDetails()
		{
			echo json_encode($this->Outlet_model->getOutletById($_POST['id']));
		}

		public function update()
		{
			$this->form_validation->set_rules('alamat', 'Alamat outlet', 'required');
			if ($this->form_validation->run() == FALSE) {
				redirect('outlet');
			}else{
				echo $this->Outlet_model->updateDataOutlet();
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Outlet telah diupdate ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('outlet');
			}
		}

		public function updatebo($id_outlet, $id_bibit)
		{
			$data['user'] = $_SESSION['user'];
			$this->form_validation->set_rules('stok', 'Stok Bibit', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data['this_b_o'] = $this->Outlet_model->getBO($id_outlet, $id_bibit);
				$data['this_outlet'] = $this->Outlet_model->getOutletById($id_outlet);
				$data['this_bibit'] = $this->Bibit_model->getBibitById($id_bibit);
				$data['title'] = 'Update Stok ' . $data['this_bibit']['nama_bibit'] . ' di Outlet ' . $data['this_outlet']['alamat_outlet'];
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('outlet/update_b_o', $data);
				$this->load->view('templates/footer');
			}else{
				$id_outlet = $this->input->post('outlet', true);
				$id_bibit = $this->input->post('bibit', true);
				$this->Outlet_model->updateBO($id_outlet, $id_bibit);
				$this->Bibit_model->UpdateStokBibit($id_bibit);
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Outlet telah diupdate ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
				redirect('outlet');
			}
		}
	}
?>

