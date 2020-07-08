<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Pendapatan extends CI_Controller
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
			$data['title'] = 'Pendapatan';
			$data['user'] = $this->session->userdata('user');
			$thisMonth = date('m');
			$thisYear = date('Y');
			if ($_SESSION['user']['jabatan'] == "Admin") {
      			$transaksiHarian = $this->Transaksi_model->getTransaksiHarian($thisMonth, $thisYear);
      			$transaksiBulanan = $this->Transaksi_model->getTransaksiBulanan($thisYear);
      			$transaksiTahunan = $this->Transaksi_model->getTransaksiTahunan();
      			$data['transaksiHarian'] = $transaksiHarian;
				$data['transaksiBulanan'] = $transaksiBulanan;
				$data['transaksiTahunan'] = $transaksiTahunan;
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pendapatan/index', $data);
				$this->load->view('templates/footer');
			}
		}		

		public function getPendapatanHarian()
		{
      		//===============================================================================8 Jul
      		$thisMonth = date('m');
			$thisYear = date('Y');
      		$transaksiHarian = $this->Transaksi_model->getTransaksiHarian($thisMonth, $thisYear);
			echo json_encode($transaksiHarian);
		}

		public function getPendapatanBulanan()
		{
			$thisYear = date('Y');      		
      		$transaksiBulanan2 = $this->Transaksi_model->getTransaksiBulanan($thisYear);
			echo json_encode($transaksiBulanan2);
		}

		public function getPendapatanTahunan()
		{
			$transaksiTahunan = $this->Transaksi_model->getTransaksiTahunan();
			echo json_encode($transaksiTahunan);
		}
	}
?>

