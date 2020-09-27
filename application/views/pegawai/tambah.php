 <div class="container-fluid">
	<div class="row mt-3 mb-4">
		<div class="col-lg">
		<h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>   
    	<?php echo $this->session->flashdata('message'); ?>	
			<div class="card">
				<div class="card-body">
				<!-- <?php if (validation_errors()):  ?>
				<div class="alert alert-danger" role="alert">
					<?php echo validation_errors(); ?>
				</div>
				<?php endif; ?> -->
					<form action="<?= base_url('pegawai/tambah'); ?>" method="post">
						 <div class="form-group">
						   <label for="email">Username</label>
						   <input type="text" class="form-control" id="username" placeholder="" name="username">
						   <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
						 </div>					 
						 <div class="form-group">
						   <label for="password">Password</label>
						   <input type="password" class="form-control" id="password" placeholder="" name="password">
						   <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
						 </div>
						 <div class="form-group">
						    <label for="nama">Kode Petugas</label>
						    <input type="text" class="form-control" id="nama" placeholder="" name="kode_petugas">    
						    <small class="form-text text-danger"><?php echo form_error('kode_petugas'); ?></small>
						 </div>
						 <div class="form-group">
						    <label for="nama">NIK</label>
						    <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik">    
						    <small class="form-text text-danger"><?php echo form_error('nik'); ?></small>
						 </div>
						 <div class="form-group">
						    <label for="nama">Nama Petugas</label>
						    <input type="text" class="form-control" id="nama" placeholder="" name="nama">    
						    <small class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						 </div>
						 <div class="form-group">
						    <label for="nama">Tempat/Tanggal Lahir</label>
						    <input type="text" class="form-control" id="ttl" placeholder="tempat / dd-mm-yyyy" name="ttl">    
						    <small class="form-text text-danger"><?php echo form_error('ttl'); ?></small>
						 </div>
						 <div class="form-group">
						    <label for="nama">Kelamin</label>
						    <input type="text" class="form-control" id="kelamin" placeholder="L / P" name="kelamin">    
						    <small class="form-text text-danger"><?php echo form_error('kelamin'); ?></small>
						 </div>
						 <div class="form-group">
						    <label for="nama">Agama</label>
						    <input type="text" class="form-control" id="gama" placeholder="" name="agama">    
						    <small class="form-text text-danger"><?php echo form_error('agama'); ?></small>
						 </div>
						 <div class="form-group">
						 	<label for="role">Jabatan</label>
						    <select class="form-control" id="jabatan" name="jabatan">
						      	<option value="Pegawai">Pegawai</option>
						      	<option value="Admin">Admin</option>
						    </select>
						 </div>
						 <div class="form-group">
						 	<label for="role">Outlet</label>
						    <select class="form-control" id="outlet" name="id_outlet">
						      	<?php foreach ($outlet as $o):?>
						      	<option value="<?=$o["id_outlet"]?>"><?=$o["alamat_outlet"];?></option>
						      <?php endforeach; ?>
						    </select>
						 </div>
						 <div class="form-group">
						    <label for="telepon">No. Hp</label>
						    <input type="number" class="form-control" id="no_hp" placeholder="" name="no_hp" min="0" max="999999999999">
						    <small class="form-text text-danger"><?php echo form_error('no_hp'); ?></small>
						 </div>
						 <div class="form-group">
						    <label for="telepon">Alamat</label>
						    <input type="text" class="form-control" id="alamat" placeholder="" name="alamat">
						    <small class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
						 </div>
						 <a href="<?php echo base_url(); ?>pegawai" class="btn btn-primary">Kembali</a>
						 <button type="submit" class="btn btn-primary float-right">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>