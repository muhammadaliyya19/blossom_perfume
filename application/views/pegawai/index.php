<div class="container-fluid">
  <div class="row mt-3">
    <div class="col text-left">
      <h1 class="h3 text-gray-800"><?=$title;?></h1>  
    </div>
    <div class="col text-right">
      <a href="<?php echo base_url(); ?>pegawai/tambah" class="btn btn-primary">Tambah Pegawai</a>
    </div>    
  </div>    
    <!-- <?php if ($user['jabatan']=="Admin"):?> -->
    <!-- <div class="row">
      <div class="col">
        <a href="<?php echo base_url() ?>client/tambah" class="btn btn-primary mt-3">Tambah Client</a>
      </div>
    </div>
    <?php endif; ?> -->
    <div class="row mt-3">    
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">No HP</th>
          <th scope="col">Alamat</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Outlet</th>
          <th scope="col">Alamat</th>
          <th scope="col">Bergabung Sejak</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;?>
            <?php foreach ($pegawai as $p) : ?>
              <tr>
                <th scope="row"><?=$i; ?></th>
                <td><?php echo $p['nama']; ?></td>
                <td><?php echo $p['no_hp']; ?></td>
                <td><?php echo $p['alamat']; ?></td>
                <td><?php echo $p['username']; ?></td>
                <td><?php echo $p['password']; ?></td>
                <td><?php echo $p['jabatan']; ?></td>
                <?php if($p['jabatan'] != 'Admin'): ?>
                  <?php foreach ($outlet as $o): if($p['id_outlet'] == $o['id_outlet']): ?>
                    <td><?php echo $o['alamat_outlet']; ?></td>
                  <?php endif; endforeach; ?>
                <?php else: ?>
                    <td>-</td>
                <?php endif; ?>
                <td><?php echo $p['alamat']; ?></td>
                <td><?php echo $p['date_created']; ?></td>
                <td>
                <a href="<?php echo base_url(); ?>pegawai/update/<?php echo $p['id']; ?>" class="badge badge-success float" data-id="<?php echo $p['id']; ?>">Update</a>
                  <a href="<?php echo base_url(); ?>pegawai/hapus/<?php echo $p['id']; ?>" class="badge badge-danger float ml-2" onclick="return confirm('Hapus data?')">Delete</a>
                </td>
              </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<!-- End of Main Content -->
