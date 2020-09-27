<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-6">
			<h1 class="h3 text-gray-800"><?=$title;?></h1>  
        </div>		
        <div class="col-6">
            <a href="#" class="btn btn-primary ml-2 float-right" data-toggle="modal" data-target="#modal-outlet" id="tambahOutlet">+ Outlet</a>
        </div>
    </div>        			
    <!-- Flash Message -->
    <?php echo $this->session->flashdata('message'); ?>
    <!-- BATAS FORM TAMBAH Outlet -->
    <div class="row mt-3">	
    	<div class="col-lg-12">
	        <table class="table table-hover" id="dataTable">
			  <thead>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Kode Outlet</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
					<?php $i = 1;?>
					    <?php foreach ($outlet as $o) : ?>
						    <tr>
						      <th scope="row"><?=$i; ?></th>
						      <td><?php echo $o['kode_outlet']; ?></td>
						      <td><?php echo $o['alamat_outlet']; ?></td>
						      <td>
				  				<a href="<?= base_url('admin/outlet/'.$o['id_outlet']); ?>" class="badge badge-primary float">Details</a>
				  				<a href="#" class="badge badge-success float upd_outlet ml-2" data-id="<?php echo $o['id_outlet']; ?>" data-toggle="modal" data-target="#modal-outlet">Edit</a>
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

<div class="modal fade" id="modal-outlet">
    <div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="outletModalLabel">Tambah Outlet</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
		    <div class="modal-body modal-bar">
						<form action="<?= base_url('outlet/tambah'); ?>" method="post">
							<div class="form-group">	
								<div class="row mb-2">
									<div class="col-2">
										<label for="outlet">Kode outlet</label>
									</div>
									<div class="col-10">
										<input type="text" class="form-control" id="kode" placeholder="Kode outlet . . ." name="kode">
										<small class="form-text text-danger"><?php echo form_error('kode'); ?></small>
									</div>
								</div>
								<div class="row">
									<div class="col-2">
										<label for="outlet">Alamat outlet</label>
									</div>
									<div class="col-10">
										<input type="hidden" class="form-control" id="id" name="id">
										<input type="text" class="form-control" id="alamat" placeholder="Alamat outlet . . ." name="alamat">
										<small class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
									</div>
								</div>
							</div>
							
							<span class="btn btn-secondary float-right batal ml-2" data-dismiss="modal">Batal</span>
							<button type="submit" class="btn btn-primary float-right">Tambah</button>
						</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->
