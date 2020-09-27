$(function() {
    $('.batal').on('click', function() {
		$('form button[type=submit]').html('Tambah');
		$('.card-body form').attr('action','https://localhost/blossom_parfume/outlet/tambah');
		$('#id').val('');
		$('#alamat').val('');
		$('#kode').val('');
	});

	$('.batal_bb').on('click', function() {
		$('form button[type=submit]').html('Tambah');
		$('.card-body form').attr('action','https://localhost/blossom_parfume/bibit/tambah');
		$('.card-header').html('Form Tambah Bibit');		
		$('#id_bibit').val('');
		$('#nama_bibit').val('');
		$('#kode_bibit').val('');
		$('#stok_bibit').val('');
		$('#harga_jual').val('');
		$('#harga_beli').val('');
	});

	$('#tambah_transaksi').on('click', function() {
		$('#id_outlet').val('');
		$('#id_bibit').val('');
		$('#kode_bibit').val('');
		$('#harga_satuan').val('');
		$('#harga_beli').val('');
		$('#harga_total').val('');
		$('#jumlah').val('');
	});
	
	$('#tambahOutlet').on('click', function() {
		$('form button[type=submit]').html('Tambah');
		$('.card-body form').attr('action','https://localhost/blossom_parfume/outlet/tambah');
		$('#outletModalLabel').html('Tambah Outlet');
		$('#id').val('');
		$('#alamat').val('');
		$('#kode').val('');
	});	

	$('.upd_outlet').on('click', function() {
		const id = $(this).data('id');
		$('#outletModalLabel').html('Edit Outlet');
		$('form button[type=submit]').html('Edit');		
		$('.modal-body form').attr('action','http://localhost/blossom_parfume/outlet/update');
		$.ajax({
			url: 'http://localhost/blossom_parfume/outlet/getDetails',
			data: { id: id },
			method: 'post',
			dataType: 'json',
			success:function(data) {
				console.log(data);
				$('#id').val(data.id_outlet);
				$('#kode').val(data.kode_outlet);
				$('#alamat').val(data.alamat_outlet);
			}
		});
	});	

	$('.up_bibit').on('click', function() {
		const id = $(this).data('id');
		$('form button[type=submit]').html('Edit');		
		$('.card-header').html('Form Edit Bibit');		
		$('.card-body form').attr('action','http://localhost/blossom_parfume/bibit/update');
		$.ajax({
			url: 'http://localhost/blossom_parfume/bibit/getDetails',
			data: { id: id },
			method: 'post',
			dataType: 'json',
			success:function(data) {
				$('#id_bibit').val(data.id_bibit);
				$('#kode_bibit').val(data.kode_bibit);
				$('#nama_bibit').val(data.nama_bibit);
				$('#stok_bibit').val(data.Stok_bibit);
				$('#harga_jual').val(data.harga_jual);
				$('#harga_beli').val(data.harga_beli);
			}
		});
	});	

	$('.jual_bibit').on('change', function() {
		$("#jumlah").val("");
		$("#harga_total").val("");
		var opt 	 = document.getElementById("id_bibit");
		var id_bibit = opt.options[opt.selectedIndex].value;
		// var jumlah   = jumlah.value; 
		$.ajax({
			url: 'http://localhost/blossom_parfume/bibit/getDetails',
			data: { id: id_bibit },
			method: 'post',
			dataType: 'json',
			success:function(data) {
				$('#harga_satuan').val(data.harga_jual);
				$('#kode_bibit').val(data.kode_bibit);
				// $('#harga_total').val(data.harga_jual * jumlah);
			}
		});
	});	

	$('#jumlah').on('keyup', function() {
		var jumlah	 = document.getElementById("jumlah");
		var opt 	 = document.getElementById("id_bibit");
		var id_bibit = opt.options[opt.selectedIndex].value;
		var jumlah   = jumlah.value; 
		$.ajax({
			url: 'http://localhost/blossom_parfume/bibit/getDetails',
			data: { id: id_bibit },
			method: 'post',
			dataType: 'json',
			success:function(data) {
				$('#harga_total').val(data.harga_jual * jumlah);
			}
		});
	});	

	$('#doPrediksi').on('click', function() {
		// var holder_prediksi = document.getElementById("hasilprediksi"); 
		var opt_bib  = document.getElementById("id_bibit");
		var nama_bibit = opt_bib.options[opt_bib.selectedIndex].value;
		var opt_ou  = document.getElementById("id_outlet");
		var nama_outlet = opt_ou.options[opt_ou.selectedIndex].value;
		var hasil_prediksi;
		var alpha = 0.9;
		var jumlah_aktual;
		var jumlah_prediksi;
		var url_;
		if (nama_outlet == "A") {
			console.log("A");
			url_ = 'http://localhost/blossom_parfume/assets/O1_aktual_prediksi.json'
		}else if(nama_outlet == "B"){
			console.log("B");
			url_ = 'http://localhost/blossom_parfume/assets/O2_aktual_prediksi.json'
		}else if(nama_outlet == "C"){
			console.log("C");
			url_ = 'http://localhost/blossom_parfume/assets/O3_aktual_prediksi.json'
		}
		$(".nama_parfum").html(nama_bibit);
		// console.log('Bibit : ' + nama_bibit + ' Outlet : ' + nama_outlet);
		$.ajax({
			url: url_,
			data: { id: nama_bibit },
			method: 'post',
			dataType: 'json',
			success:function(data) {
				for (var i = 0; i < data.Aktual.length; i++) {
					if (data.Aktual[i].Nama == nama_bibit) {
						jumlah_aktual = data.Aktual[i].Mei;
					}
				}
				for (var i = 0; i < data.Prediksi.length; i++) {
					if (data.Prediksi[i].Nama == nama_bibit) {
						jumlah_prediksi = data.Prediksi[i].Mei;
					}
				}
				hasil_prediksi = (alpha * jumlah_aktual) + ((1 - alpha) * jumlah_prediksi);
				$("#hasilprediksi").val(hasil_prediksi);
			}
		});
	});	
});
	