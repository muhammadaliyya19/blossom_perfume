        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title; ?></h1>
          <h1 class="h5 mb-4 text-gray-800">Alamat : <?=$detail_outlet['alamat_outlet']; ?></h1>

          <div class="row mb-3">
            <!-- <img style="width: auto; height: auto;" src="<?php echo base_url('assets/img/') . 'Logo.png'; ?>" alt=""> -->
            <div class="col-lg-12">
              <div class="card"  style="height: 400px;">
                <div class="card-header">
                  Data Petugas
                </div>
                <div class="card-body" style="overflow: scroll;">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Bergabung Sejak</th>
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
                              <td><?php echo $p['date_created']; ?></td>
                            </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="card">
                <div class="card-header">
                  Data Bibit
                </div>
                <div class="card-body">
                  <table class="table table-hover" id="dataTable">
                    <thead>
                      <tr>
                        <th scope="col">Id.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok (mL)</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;?>
                          <?php foreach ($bibit_outlet as $bo) : ?>
                            <?php foreach ($bibit as $b) : ?>
                            <?php if($b['id_bibit'] == $bo['id_bibit']): ?>
                            <tr>
                              <th scope="row"><?=$b['id_bibit']; ?></th>
                              <td><?php echo $b['nama_bibit']; ?></td>
                              <td><?php echo $bo['stok']; ?></td>
                              <td><?php echo $b['harga_jual']; ?></td>
                              <td><?php echo $b['harga_beli']; ?></td>
                              <td><?php echo $b['date_update_bibit']; ?></td>
                              <td>
                                <a href="<?= base_url('outlet/updatebo/'.$bo['id_outlet'] . '/'. $b['id_bibit']); ?>" class="badge badge-success float up_bibit ml-2" data-id="<?php echo $b['id_bibit']; ?>">Update Stok</a>
                            </td>
                            </tr>
                          <?php endif; ?>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
      <!-- End of Main Content -->