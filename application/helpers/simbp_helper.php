<?php 
	
		function _sendEmail($token, $type)
		{
			$ci = get_instance();
			// $config = [
			// 	'protocol'  => 'smtp',
			// 	'smtp_host' => 'ssl://smtp.googlemail.com',
			// 	'smtp_user' => 'aliyyailmi20@gmail.com',
			// 	'smpt_pass' => 'ilmi2007',
			// 	'smtp_port' => 465,
			// 	'mailtype' => 'html',
			// 	'charset'   => 'utf-8',
			// 	'newline'   => "\r\n"
			// ];

			$ci->load->library('email');
			$config = array();
	        $config['protocol'] = 'smtp';
	        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
	        $config['smtp_user'] = 'fachrurrozy780@gmail.com';
	        $config['smtp_pass'] = 'fallick207';
	        $config['smtp_port'] = 465;
	        $config['mailtype'] = 'html';
	        $config['charset'] = 'utf-8';

	        $ci->email->set_newline("\r\n");
	        $ci->email->initialize($config);
			//$ci->email->initialize($config);  //tambahkan baris ini
			$ci->email->from('fachrurrozy780@gmail.com', 'SIMBP - Blossom (Sistem Penjualan & Prediksi Parfum)');
			$ci->email->to($ci->input->post('email'));

			if ($type == 'newTransaction') {
				$ci->email->to('fachrurrozy65@gmail.com');
				$ci->email->subject('Transaksi Baru');
				$ci->email->message('Telah terjadi transaksi hari ini dengan keterangan : <br>
									 Outlet                : '.$token['alamat_outlet'].'<br>
									 Nama Bibit            : '.$token['nama_bibit'].'<br>
									 Jumlah Pembelian (mL) : '.$token['jumlah'].'<br>
									 Total Transaksi       : '.$token['total_harga'].'<br>
									 Pegawai               : '.$token['nama_pegawai'].'<br>
									 Untuk informasi lebih lengkap silakan klik link berikut untuk login ke sistem : <a href="' . base_url() . '">Login</a>
									');
			}
			if ($ci->email->send()){
				return true;
			}else{
				echo $ci->email->print_debugger();
				die;
			}
			//$ci->input->post('email',true)
		}

?>