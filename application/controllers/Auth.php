<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{	

	public function index()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['jabatan'] == "Admin") {
				redirect('admin');
			}else{
				redirect('user');
			}
		}
		// Pengecekan apakah inputan user tidak kosong
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}else{
			$this->_login();
		}
	}	

	private function _login()
	{
		// Menerima username dan pwd dari halaman login
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// Mengecek apakah username ada di database
		$user = $this->db->get_where('user',['username' => $username])->row_array();
		//user exist?
		if ($user) {
			// Pengecekan password yang dimasukkan pengguna
				if ($password == $user['password']) {
					// Deklarasi array data untuk session user yg login
					$data = [
						'username' => $user['username'],
						'nama' => $user['nama'],
						'jabatan' => $user['jabatan'],
						'id_outlet' => $user['id_outlet'],
						'id' => $user['id']
					];
					// Deklarasi session 'user'
					$_SESSION['user'] = $data;
					// Mengarahkan user ke dashboard admin atau ke dashboard user
					if ($user['jabatan'] == "Admin") {
						redirect('admin');
					}else{
						redirect('user');
					}
				}else{
					//Jika password salah
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
		}else{
			// Jika username tidak terdaftar
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		session_unset(); 

		// destroy the session 
		session_destroy(); 
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logout!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = 'Access Blocked ! ';
		if (isset($_SESSION['user'])) {
			$data['user'] = $this->db->get_where('user',['email' => $_SESSION['user']['email']])->row_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('auth/blocked', $data);
		$this->load->view('templates/footer');
	}

}
?>