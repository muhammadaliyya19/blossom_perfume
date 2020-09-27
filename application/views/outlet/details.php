        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- PRESENTATION -->
          <div class="row mt-3">
            <div class="col text-left">
              <h1 class="h3 text-gray-800">
                <?=$title;?>
                <span class="float-right">
                  <div class="row">
                    <div class="col">
                      <ul class="nav" role="tablist">
                        <li role="presentation">
                            <a href="#bibit" class="mr-3 btn btn-primary" role="tab" data-toggle="tab"> Bibit </a>
                        </li>
                        <li class="active" role="presentation">
                            <a href="#petugas" class="mr-3 btn btn-primary" role="tab" data-toggle="tab"> Petugas </a>
                        </li>
                        <li role="presentation">
                            <a href="#pendapatan" class="btn btn-primary mr-3 pendapatan_outlet" role="tab" data-toggle="tab" data-outlet="<?=$detail_outlet['id_outlet']; ?>"> Pendapatan </a>
                        </li>
                      </ul>
                    </div>
                  </div>    
                </span>
              </h1>  
            </div>
          </div>
          <!-- BATAS PRESENTATION -->

          <!-- TAB CONTENT -->
          <div class="tab-content">
            <!-- BIBIT -->
            <div class="tab-pane active" id="bibit">
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
            <!-- PETUGAS -->
            <div class="tab-pane" id="petugas">
              <div class="row mb-3 mt-2">
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
            </div>
            <div class="tab-pane" id="pendapatan">
              <!-- SEMENTARA -->
              <div class="row">
                <span class="float h-2 ml-3">
                  <div class="row">
                    <div class="col">
                      <ul class="nav" role="tablist">
                        <li class="active" role="presentation">
                            <a href="#harian" class="mr-3 btn btn-primary harian" role="tab" data-toggle="tab" data-outlet="<?=$detail_outlet['id_outlet']; ?>"> Harian </a>
                        </li>
                        <li role="presentation">
                            <a href="#bulanan" class="mr-3 btn btn-primary bulanan" role="tab" data-toggle="tab" data-outlet="<?=$detail_outlet['id_outlet']; ?>"> Bulanan </a>
                        </li>
                        <li role="presentation">
                            <a href="#tahunan" class="btn btn-primary mr-3 tahunan" role="tab" data-toggle="tab" data-outlet="<?=$detail_outlet['id_outlet']; ?>"> Tahunan </a>
                        </li>
                      </ul>
                    </div>
                  </div>    
                </span>
              </div>
              <div class="row mt-3">
                <div class="col"> 
                  <div class="tab-content">
                    <div class="tab-pane active" id="harian">
                      <!-- Tabel pendapatan harian - seluruh outlet - seluruh transaksi -->
                      <div class="row">
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="card-header">
                                Grafik Pendapatan Harian Bulan <?= date('M'); ?> Tahun <?= date('Y');?>
                              </div>
                              <div class="card-body">
                                <!-- <img src="https://chartio.com/assets/9bfb20/tutorials/charts/stacked-bar-charts/073137bf11f1c2226f68c3188128e28d66115622dcdecc9bc208a6d4117f53e8/stacked-bar-example-1.png"> -->
                                <div id="chart_daily"></div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col">
                          <h5>Tabel Pendapatan Bulan <?= date('M'); ?> Tahun <?= date('Y');?></h5>
                          <table class="table table-hover" id="dataTable">
                              <thead>
                                  <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah Transaksi</th>
                                    <th scope="col">Akumulasi Harga Beli Bibit</th>
                                    <th scope="col">Akumulasi Harga Jual Bibit</th>
                                    <th scope="col">Pendapatan</th>
                                    <!-- <th scope="col">Action</th> -->
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 1;?>
                                      <?php 
                                        foreach ($transaksiHarian as $th) : 
                                        $date = date_create($th['pertanggal']);
                                      ?>
                                        <tr>
                                          <th scope="row"><?=$i; ?></th>
                                          <td><?php echo date_format($date,"D / d-m-Y"); ?></td>
                                          <td><?php echo $th['Jumlah_transaksi']; ?></td>
                                          <td><?php echo $th['ahj']; ?></td>
                                          <td><?php echo $th['ahb']; ?></td>
                                          <td><?php echo ($th['pendapatan']); ?></td>
                                        </tr>
                                    <?php $i++; ?>
                                  <?php endforeach; ?>
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="bulanan">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header">
                              Grafik Pendapatan Bulanan Tahun <?= date('Y'); ?>
                            </div>
                            <div class="card-body">
                              <!-- <img src="https://chartio.com/assets/9bfb20/tutorials/charts/stacked-bar-charts/073137bf11f1c2226f68c3188128e28d66115622dcdecc9bc208a6d4117f53e8/stacked-bar-example-1.png"> -->
                              <div id="chart_monthly"></div>
                            </div>
                          </div>
                        </div>            
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                          <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Tahun/Bulan</th>
                                  <th scope="col">Jumlah Transaksi</th>
                                  <th scope="col">Akumulasi Harga Beli Bibit</th>
                                  <th scope="col">Akumulasi Harga Jual Bibit</th>
                                  <th scope="col">Pendapatan</th>
                                  <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                    <?php foreach ($transaksiBulanan as $tb) : ?>
                                      <tr>
                                        <th scope="row"><?=$i; ?></th>
                                        <td><?php echo $tb['pertanggal']; ?></td>
                                        <td><?php echo $tb['Jumlah_transaksi']; ?></td>
                                        <td><?php echo $tb['ahj']; ?></td>
                                        <td><?php echo $tb['ahb']; ?></td>
                                        <td><?php echo ($tb['pendapatan']); ?></td>
                                      </tr>
                                  <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tahunan">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header">
                              Grafik Pendapatan Tahunan
                            </div>
                            <div class="card-body">
                              <!-- <img src="https://chartio.com/assets/9bfb20/tutorials/charts/stacked-bar-charts/073137bf11f1c2226f68c3188128e28d66115622dcdecc9bc208a6d4117f53e8/stacked-bar-example-1.png"> -->
                              <div id="chart_yearly"></div>
                            </div>
                          </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col">
                          <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Tahun</th>
                                  <th scope="col">Jumlah Transaksi</th>
                                  <th scope="col">Akumulasi Harga Beli Bibit</th>
                                  <th scope="col">Akumulasi Harga Jual Bibit</th>
                                  <th scope="col">Pendapatan</th>
                                  <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                    <?php foreach ($transaksiTahunan as $tt) : ?>
                                      <tr>
                                        <th scope="row"><?=$i; ?></th>
                                        <td><?php echo $tt['pertanggal']; ?></td>
                                        <td><?php echo $tt['Jumlah_transaksi']; ?></td>
                                        <td><?php echo $tt['ahj']; ?></td>
                                        <td><?php echo $tt['ahb']; ?></td>
                                        <td><?php echo ($tt['pendapatan']); ?></td>
                                      </tr>
                                  <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- SEMENTARA -->
            </div>        
          </div>                  
      </div>
    </div>
      <!-- End of Main Content -->