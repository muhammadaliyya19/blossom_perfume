<div class="container-fluid">
	<div class="row mt-3">
		<div class="col">
			<h1 class="h3 text-gray-800"><?=$title;?></h1>  
        </div>		
    </div>
    <!-- <div class="row"> -->
    <?php echo $this->session->flashdata('message'); ?>
    <!-- </div>     -->
    <div class="row my-2">		
    	<div class="col-lg-4">
    		<h5 class="text-center">Form penjualan</h5>
    		<form action="<?= base_url('transaksi/tambah'); ?>" method="post">
 				<?php if($_SESSION['user']['jabatan'] == "Admin"): ?>
 				<div class="form-group">
	 				<label for="outlet">Outlet</label>
	 				<select class="form-control" id="id_outlet" name="id_outlet">
		 				<?php foreach ($outlet as $o) : ?>
 							<option value="<?= $o['id_outlet']; ?>"><?= $o['alamat_outlet']; ?></option>
		 				<?php endforeach; ?>
	 				</select>
 				</div>
 				<?php endif; ?>
 				<div class="form-group">
	 				<label for="bibit">Bibit</label>
	 				<select class="form-control jual_bibit" id="id_bibit" name="id_bibit">
		 				<?php foreach ($bibit as $b) : ?>
 							<option value="<?= $b['id_bibit']; ?>" data-id="<?= $b['id_bibit']; ?>"><?= $b['nama_bibit']; ?></option>
		 				<?php endforeach; ?>
	 				</select>
 				</div>
 				<div class="form-group">
 					<label for="nama">@Harga</label>
 					<input type="text" class="form-control" id="harga_satuan" placeholder="" name="harga_satuan">
 					<small class="form-text text-danger"><?php echo form_error('harga_satuan'); ?></small>
 				</div>
 				<div class="form-group">
 					<label for="nama">Jumlah (mL)</label>
 					<input type="text" class="form-control" id="jumlah" placeholder="" name="jumlah">
 					<small class="form-text text-danger"><?php echo form_error('jumlah'); ?></small>
 				</div>
 				<div class="form-group">
 					<label for="nama">Total Pembelian</label>
 					<input type="text" class="form-control" id="harga_total" placeholder="" name="harga_total">
 					<small class="form-text text-danger"><?php echo form_error('harga_total'); ?></small>
 				</div>
 				<button type="submit" class="btn btn-primary float-right">Tambah</button>
 			</form>
    	</div>
    	<div class="col-lg-8" style="height: 500px; overflow-y: scroll;">
	        <table class="table table-hover" id="dataTable">
			  <thead>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Bibit</th>
			      <th scope="col">Jumlah</th>
			      <th scope="col">@Harga</th>
			      <th scope="col">Total Harga</th>
			      <th scope="col">Tgl Transaksi</th>
			      <th scope="col">Outlet</th>
			      <th scope="col">Pegawai</th>
			      <?php if ($_SESSION['user']['jabatan'] == 'Admin'): ?>
			      	<th scope="col">Action</th>
			  	  <?php endif; ?>
			    </tr>
			  </thead>
			  <tfoot>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Bibit</th>
			      <th scope="col">Jumlah</th>
			      <th scope="col">@Harga</th>
			      <th scope="col">Total Harga</th>
			      <th scope="col">Tgl Transaksi</th>
			      <th scope="col">Outlet</th>
			      <th scope="col">Pegawai</th>
			      <?php if ($_SESSION['user']['jabatan'] == 'Admin'): ?>
			      	<th scope="col">Action</th>
			  	  <?php endif; ?>
			    </tr>
			  </tfoot>
			  <tbody>
					<?php $i = 1;?>
					    <?php foreach ($transaksi as $t) : ?>
						    <tr>
						      <th scope="row"><?=$i; ?></th>
						      <td><?php echo $t['nama_bibit']; ?></td>
						      <td><?php echo $t['jumlah_pembelian']; ?></td>
						      <td><?php echo $t['harga_satuan']; ?></td>
						      <td><?php echo ($t['harga_satuan'] * $t['jumlah_pembelian']); ?></td>
						      <td><?php echo $t['tanggal_transaksi']; ?></td>
						      <td><?php 
						      	if ($_SESSION['user']['jabatan'] == 'Admin') {
							      	foreach ($outlet as $o) {
							      		if ($t['outlet'] == $o['id_outlet']) {
							      			echo $o['alamat_outlet'];
							      		}
							      	}
						      	}else{
						      		echo $outlet['alamat_outlet'];
						      	}
						      ?></td>
						      <td><?php 
						      	foreach ($pegawai as $p) {
						      		if ($t['pegawai'] == $p['id'] && $p['jabatan'] != "Admin") {
						      			echo $p['nama'];
						      		}
						      	}
						      	if ($_SESSION['user']['jabatan'] == "Admin") {
						      		echo "Admin";
						      	}else{
						      		echo "Admin";
						      	}
						      ?></td>
			      			<?php if ($_SESSION['user']['jabatan'] == 'Admin'): ?>
						      <td>
				  				<a href="<?php echo base_url(); ?>transaksi/hapus/<?php echo $t['id_transaksi']; ?>" class="badge badge-danger float-left" onclick="return confirm('Hapus data?')">Delete</a>
						      </td>
						     <?php endif; ?>
						    </tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
    	</div>
	</div>
</div>
<!-- End of Main Content -->

</div>
