<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class User extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Bibit_model');		
			$this->load->model('Outlet_model');
			$this->load->model('Prediksi_model');
			$this->load->model('Transaksi_model');
			$this->load->model('User_model');
			$this->load->library('form_validation');
		}

		public function index()
		{
			$data['title'] = 'Dashboard';
			$data['bibit'] = $this->Bibit_model->getAllBibit();
			$data['pegawai'] = $this->User_model->getAllUser();
			$data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
			$data['outlet'] = $this->Outlet_model->getOutletById($_SESSION['user']['id_outlet']);
			$data['user'] = $_SESSION['user'];
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/index', $data);
			$this->load->view('templates/footer');
		}
	}
?>
