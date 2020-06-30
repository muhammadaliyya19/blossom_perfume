<div class="container-fluid">
	<div class="row mt-3">
		<div class="col">
			<h1 class="h3 text-gray-800"><?=$title;?></h1>  			
        </div>		
    </div>    
    <!-- FORM TAMBAH BIBIT -->
    <div class="row mt-3">	
	    <div class="col">	
	        <table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Id.</th>
			      <th scope="col">Outlet</th>
			      <th scope="col">Stok (mL)</th>
			      <th scope="col">Harga Jual</th>
			      <th scope="col">Harga Beli</th>
			      <th scope="col">Terjual (mL)</th>
			      <th scope="col">Last Updated</th>
	    		  <?php if ($user['jabatan']=="Admin"):?>
			      	<th scope="col">Action</th>
			      <?php endif; ?>
			    </tr>
			  </thead>
			  <tfoot>
			    <tr>
			      <th scope="col">Id.</th>
			      <th scope="col">Outlet</th>
			      <th scope="col">Stok (mL)</th>
			      <th scope="col">Harga Jual</th>
			      <th scope="col">Harga Beli</th>
			      <th scope="col">Terjual (mL)</th>
			      <th scope="col">Last Updated</th>
	    		  <?php if ($user['jabatan']=="Admin"):?>
			      	<th scope="col">Action</th>
			      <?php endif; ?>
			    </tr>
			  </tfoot>
			  <tbody>
					    <?php foreach ($bibit_outlet as $b) : ?>
						    <tr>
						      <th scope="row"><?=$b['id']; ?></th>
						      <?php foreach ($outlet as $o): if($b['id_outlet'] == $o['id_outlet']):?>
						      	<td><?php echo $o['alamat_outlet']; ?></td>
						      <?php endif; endforeach; ?>
						      <td><?php echo $b['stok']; ?></td>
						      <td><?php echo $this_bibit['harga_jual']; ?></td>
						      <td><?php echo $this_bibit['harga_beli']; ?></td>
						      <td><?php echo "xxx"; ?></td>
						      <td><?php echo $b['last_update']; ?></td>
						      	<td>
					  				<a href="<?= base_url('outlet/updatebo/'.$b['id_outlet'] . '/'. $b['id_bibit']); ?>" class="badge badge-success float up_bibit ml-2" data-id="<?php echo $b['id_bibit']; ?>">Update Stok</a>
								</td>
						    </tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->
