<div class="container-fluid">
	<div class="row mt-3">
		<div class="col">
			<h1 class="h3 text-gray-800"><?=$title;?></h1>  
        </div>		
    </div>    
    <!-- <?php if ($user['jabatan']=="Admin"):?> -->
    <!-- <div class="row">
    	<div class="col">
    		<a href="<?php echo base_url() ?>client/tambah" class="btn btn-primary mt-3">Tambah Client</a>
    	</div>
    </div>
    <?php endif; ?> -->
    			<div class="card">
    				<div class="card-header">
						Form Tambah Outlet
					</div>
    				<div class="card-body">
						<form action="<?= base_url('outlet/tambah'); ?>" method="post">
							<div class="form-group">	
								<div class="row">
									<div class="col-2">
										<label for="picName">Alamat outlet</label>
									</div>
									<div class="col-10">
										<input type="hidden" class="form-control" id="id" name="id">
										<input type="text" class="form-control" id="alamat" placeholder="Alamat outlet baru" name="alamat">
										<small class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
									</div>
								</div>
							</div>
							
							<span class="btn btn-secondary float-right batal ml-2">Batal</span>
							<button type="submit" class="btn btn-primary float-right">Tambah</button>
						</form>
					</div>
				</div>
    <!-- BATAS FORM TAMBAH Outlet -->
    <div class="row mt-3">	
    	<div class="col-lg-12">
	        <table class="table table-hover" id="dataTable">
			  <thead>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
					<?php $i = 1;?>
					    <?php foreach ($outlet as $o) : ?>
						    <tr>
						      <th scope="row"><?=$i; ?></th>
						      <td><?php echo $o['alamat_outlet']; ?></td>
						      <td>
				  				<a href="<?= base_url('admin/outlet/'.$o['id_outlet']); ?>" class="badge badge-primary float">Details</a>
				  				<a href="#" class="badge badge-success float upd_outlet ml-2" data-id="<?php echo $o['id_outlet']; ?>">Update</a>
						      	<a href="<?php echo base_url(); ?>outlet/hapus/<?php echo $o['id_outlet']; ?>" class="badge badge-danger float ml-2" onclick="return confirm('Hapus data?')">Delete</a>
						      </td>
						    </tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
    	</div>	
	</div>
</div>
</div>
<!-- End of Main Content -->
