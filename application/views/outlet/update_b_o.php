  <div class="container-fluid">
	<div class="row mt-3 mb-3">
		<div class="col-lg">
		<h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>   
		<div class="card">
			<div class="card">
    				<div class="card-header">
						Form Update Bibit
					</div>
    				<div class="card-body">
						<form action="<?= base_url('outlet/updatebo/'. $this_b_o['id_outlet'] . '/' . $this_b_o['id_bibit']); ?>" method="post">
							<input type="hidden" class="form-control" id="id_bibit" placeholder="" name="id_bibit">
							<div class="form-group">	
								<div class="row">
									<div class="col-2">
										<label for="picName">Stok Bibit</label>
									</div>
									<div class="col-10">
										<input type="hidden" class="form-control" id="bibit" placeholder="" name="bibit" value="<?=$this_b_o['id_bibit']; ?>">
										<input type="hidden" class="form-control" id="outlet" placeholder="" name="outlet" value="<?=$this_b_o['id_outlet']; ?>">
										<input type="text" class="form-control" id="stok" placeholder="" name="stok" value="<?=$this_b_o['stok']; ?>">
										<small class="form-text text-danger"><?php echo form_error('nama_bibit'); ?></small>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary float-right">Update</button>
						</form>
					</div>
				</div>
		</div>

		</div>
	</div>
</div>
</div>