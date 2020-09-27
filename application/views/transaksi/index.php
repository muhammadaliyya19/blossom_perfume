<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-6">
			<h1 class="h3 text-gray-800"><?=$title;?></h1>  
        </div>		
        <div class="col-6">
            <a href="#" class="btn btn-primary ml-2 float-right" data-toggle="modal" data-target="#modal-trans" id="tambah_transaksi">+ Transaksi</a>
        </div>		
    </div>
    <!-- <div class="row"> -->
    <?php echo $this->session->flashdata('message'); ?>
    <!-- </div>     -->
    <div class="row my-3">		    	
    	<div class="col-lg-12" style="height: 500px; overflow-y: scroll;">
	        <table class="table table-hover" id="dataTable">
			  <thead>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Kode Transaksi</th>
			      <th scope="col">Bibit</th>
			      <th scope="col">Kode Bibit</th>
			      <th scope="col">Jumlah (ml)</th>
			      <th scope="col">@Harga</th>
			      <th scope="col">Total Harga</th>
			      <th scope="col">Tgl Transaksi</th>
			      <th scope="col">Outlet</th>
			      <th scope="col">Operator</th>
			      <?php if ($_SESSION['user']['jabatan'] == 'Admin'): ?>
			      	<th scope="col">Action</th>
			  	  <?php endif; ?>
			    </tr>
			  </thead>
			  <tfoot>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Kode Transaksi</th>
			      <th scope="col">Bibit</th>
			      <th scope="col">Kode Bibit</th>
			      <th scope="col">Jumlah (ml)</th>
			      <th scope="col">@Harga</th>
			      <th scope="col">Total Harga</th>
			      <th scope="col">Tgl Transaksi</th>
			      <th scope="col">Outlet</th>
			      <th scope="col">Operator</th>
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
						      <td><?php echo $t['kode_transaksi']; ?></td>
						      <td><?php echo $t['nama_bibit']; ?></td>
						      <td><?php echo $t['kode_bibit']; ?></td>
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
						      <td><?= $t['nama'];?></td>
			      			<?php if ($_SESSION['user']['jabatan'] == 'Admin'): ?>
						      <td>
				  				<a href="<?php echo base_url(); ?>transaksi/hapus/<?php echo $t['id_transaksi']; ?>" class="badge badge-danger float-left" onclick="return confirm('Apakah anda yakin?')">Delete</a>
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

<div class="modal fade" id="modal-trans">
    <div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="barangModalLabel">Tambah Transaksi</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
		    <div class="modal-body modal-bar">
				<div class="col-lg-12">
		    		<form action="<?= base_url('transaksi/tambah'); ?>" method="post">
		 				<div class="form-group">
		 					<label for="nama">Kode Transaksi</label>
		 					<input type="text" class="form-control" id="kode_transaksi" placeholder="" name="kode_transaksi" readonly="" value="<?="TRANS_".date("Ymd_his"); ?>">
		 					<small class="form-text text-danger"><?php echo form_error('harga_satuan'); ?></small>
		 				</div>
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
		 				<div class="row">
		 					<div class="col-lg-6">
		 						<div class="form-group">
					 				<label for="bibit">Bibit</label>
					 				<select class="form-control jual_bibit" id="id_bibit" name="id_bibit">
						 				<?php foreach ($bibit as $b) : ?>
				 							<option value="<?= $b['id_bibit']; ?>" data-id="<?= $b['id_bibit']; ?>"><?= $b['nama_bibit']; ?></option>
						 				<?php endforeach; ?>
					 				</select>
				 				</div>
		 					</div>
		 					<div class="col-lg-6">
		 						<div class="form-group">
					 				<label for="bibit">Kode Bibit</label>
					 				<input type="text" class="form-control" id="kode_bibit" placeholder="Kode bibit . . ." name="kode_bibit" readonly="">
		 					<small class="form-text text-danger"><?php echo form_error('harga_satuan'); ?></small>
				 				</div>
		 					</div>
		 				</div>		 				
		 				<div class="form-group">
		 					<label for="nama">@Harga</label>
		 					<input type="text" class="form-control" id="harga_satuan" placeholder="Rp..." name="harga_satuan" readonly="">
		 					<small class="form-text text-danger"><?php echo form_error('harga_satuan'); ?></small>
		 				</div>
		 				<div class="form-group">
		 					<label for="nama">Jumlah (mL)</label>
		 					<input type="number" class="form-control" id="jumlah" placeholder="" name="jumlah">
		 					<small class="form-text text-danger"><?php echo form_error('jumlah'); ?></small>
		 				</div>
		 				<div class="form-group">
		 					<label for="nama">Total Pembelian</label>
		 					<input type="text" class="form-control" id="harga_total" placeholder="Rp..." name="harga_total" readonly="">
		 					<small class="form-text text-danger"><?php echo form_error('harga_total'); ?></small>
		 				</div> 				
		 				<button type="submit" class="btn btn-primary float-right">Simpan</button>
		 				<a class="btn btn-secondary float-right mr-2" data-dismiss="modal" href="#">Cancel</a>
		 			</form>
		    	</div>
			</div>
		</div>
	</div>
</div>

</div>
