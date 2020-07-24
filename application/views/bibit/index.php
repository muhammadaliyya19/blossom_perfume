<div class="container-fluid">
	<div class="row mt-3">
		<div class="col">
			<h1 class="h3 text-gray-800"><?=$title;?></h1>  
        </div>		
    </div>    
    <!-- FORM TAMBAH BIBIT -->
    <?php if ($user['jabatan']=="Admin"):?>
    			<div class="card">
    				<div class="card-header">
						Form Tambah Bibit
					</div>
    				<div class="card-body">
						<form action="<?= base_url('bibit/tambah'); ?>" method="post">
							<input type="hidden" class="form-control" id="id_bibit" placeholder="" name="id_bibit">
							<div class="form-group">	
								<div class="row">
									<div class="col-2">
										<label for="picName">Nama Bibit</label>
									</div>
									<div class="col-10">
										<input type="text" class="form-control" id="nama_bibit" placeholder="" name="nama_bibit">
										<small class="form-text text-danger"><?php echo form_error('nama_bibit'); ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-2">
										<label for="picMail">Harga Jual (@ml)</label>
									</div>
									<div class="col-10">
										<input type="text" class="form-control" id="harga_jual" placeholder="" name="harga_jual">
										<small class="form-text text-danger"><?php echo form_error('harga_jual'); ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-2">
										<label for="picPosition">Harga Beli (@ml)</label>
									</div>
									<div class="col-10">
										<input type="text" class="form-control" id="harga_beli" placeholder="" name="harga_beli">
										<small class="form-text text-danger"><?php echo form_error('harga_beli'); ?></small>
									</div>
								</div>
							</div>
							<span class="btn btn-secondary float-right batal_bb ml-2">Batal</span>
							<button type="submit" class="btn btn-primary float-right">Tambah</button>
						</form>
					</div>
				</div>
	<?php endif; ?>    
    <!-- BATAS FORM TAMBAH BIBIT -->
    <div class="row mt-3">	
	    <div class="col">	
	        <table class="table table-hover" id="dataTable">
			  <thead>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Stok Total (mL)</th>
			      <th scope="col">Harga Jual</th>
			      <th scope="col">Harga Beli</th>
			      <th scope="col">Last Updated</th>
	    		  <?php if ($user['jabatan']=="Admin"):?>
			      	<th scope="col">Action</th>
			      <?php endif; ?>
			    </tr>
			  </thead>
			  <tfoot>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Stok Total (mL)</th>
			      <th scope="col">Harga Jual</th>
			      <th scope="col">Harga Beli</th>
			      <th scope="col">Last Updated</th>
	    		  <?php if ($user['jabatan']=="Admin"):?>
			      	<th scope="col">Action</th>
			      <?php endif; ?>
			    </tr>
			  </tfoot>
			  <tbody>
	    		  	<?php if ($user['jabatan']=="Admin"): $i = 1; ?>
					    <?php foreach ($bibit as $b) : ?>
						    <tr>
						      <th scope="row"><?=$i.'. '; $i++; ?></th>
						      <td><?php echo $b['nama_bibit']; ?></td>
						      <td><?php echo $b['Stok_bibit']; ?></td>
						      <td><?php echo $b['harga_jual']; ?></td>
						      <td><?php echo $b['harga_beli']; ?></td>
						      <td><?php echo $b['date_update_bibit']; ?></td>
	    		  			<?php if ($user['jabatan']=="Admin"):?>
						      	<td>
					  				<a href="<?= base_url('bibit/detail/'.$b['id_bibit']); ?>" class="badge badge-primary float" data-id="<?php echo $b['id_bibit']; ?>">Detail</a>
					  				<a href="#" class="badge badge-success float up_bibit ml-2" data-id="<?php echo $b['id_bibit']; ?>">Edit</a>
							      	<a href="<?php echo base_url(); ?>bibit/hapus/<?php echo $b['id_bibit']; ?>" class="badge badge-danger float ml-2" onclick="return confirm('Hapus data?')">Delete</a>
								</td>
			    	        <?php endif; ?>
						    </tr>
					<?php endforeach; ?>
					<?php else: ?>
						<?php foreach ($bibit_outlet as $bo) : ?>
							<?php foreach ($bibit as $b) : ?>
								<?php if($bo['id_outlet'] == $outlet['id_outlet'] && $bo['id_bibit'] == $b['id_bibit']): ?>
							    <tr>
							      <th scope="row"><?=$b['id_bibit']; ?></th>
							      <td><?php echo $b['nama_bibit']; ?></td>
							      <td><?php echo $bo['stok']; ?></td>
							      <td><?php echo $b['harga_jual']; ?></td>
							      <td><?php echo $b['harga_beli']; ?></td>
							      <td><?php echo $bo['last_update']; ?></td>		    		  			
							    </tr>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->
