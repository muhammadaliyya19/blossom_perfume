$(function() {
    $('.batal').on('click', function() {
		$('form button[type=submit]').html('Tambah');
		$('.card-body form').attr('action','https://localhost/blossom_parfume/outlet/tambah');
		$('#id').val('');
		$('#alamat').val('');
	});

	$('.batal_bb').on('click', function() {
		$('form button[type=submit]').html('Tambah');
		$('.card-body form').attr('action','https://localhost/blossom_parfume/bibit/tambah');
		$('.card-header').html('Form Tambah Bibit');		
		$('#id_bibit').val('');
		$('#nama_bibit').val('');
		$('#stok_bibit').val('');
		$('#harga_jual').val('');
		$('#harga_beli').val('');
	});
	
	$('.upd_outlet').on('click', function() {
		const id = $(this).data('id');
		$('form button[type=submit]').html('Update');		
		$('.card-body form').attr('action','http://localhost/blossom_parfume/outlet/update');
		$.ajax({
			url: 'http://localhost/blossom_parfume/outlet/getDetails',
			data: { id: id },
			method: 'post',
			dataType: 'json',
			success:function(data) {
				$('#id').val(data.id_outlet);
				$('#alamat').val(data.alamat_outlet);
			}
		});
	});	

	$('.up_bibit').on('click', function() {
		const id = $(this).data('id');
		$('form button[type=submit]').html('Update');		
		$('.card-header').html('Form Update Bibit');		
		$('.card-body form').attr('action','http://localhost/blossom_parfume/bibit/update');
		$.ajax({
			url: 'http://localhost/blossom_parfume/bibit/getDetails',
			data: { id: id },
			method: 'post',
			dataType: 'json',
			success:function(data) {
				$('#id_bibit').val(data.id_bibit);
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
});
	