<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		var_dump($this->session->userdata('user'));
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
		$data['total_bibit'] = count($this->Bibit_model->getAllBibit());
		$data['total_outlet'] = count($this->Outlet_model->getAllOutlet());
		$data['total_pegawai'] = count($this->User_model->getAllUser());
		$data['total_transaksi'] = count($this->Transaksi_model->getAllTransaksi());
		$data['bibit'] = $this->Bibit_model->getAllBibit();
		$data['outlet'] = $this->Outlet_model->getAllOutlet();
		$data['pegawai'] = $this->User_model->getAllUser();
		$data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
		$data['user'] = $this->session->userdata('user');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function Outlet($id)
	{
		$data['outlet'] = $this->Outlet_model->getAllOutlet();
		$data['detail_outlet'] = $this->Outlet_model->getOutletById($id);
		$data['bibit_outlet'] = $this->Outlet_model->getOutletBibit($id);
		$data['title'] = "Dashboard Outlet " . $data['detail_outlet']['alamat_outlet'];
		$data['bibit'] = $this->Bibit_model->getAllBibit();
		$data['pegawai'] = $this->User_model->getPegawaiByOutlet($id);
		$data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
		$data['user'] = $_SESSION['user'];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('outlet/details', $data);
		$this->load->view('templates/footer');
	}
}
?>
