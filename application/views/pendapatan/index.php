<div class="container-fluid">
  <div class="row mt-3">
    <div class="col text-left">
      <h1 class="h3 text-gray-800">
        <?=$title;?>
        <span class="float-right">
          <div class="row">
            <div class="col">
              <ul class="nav" role="tablist">
                <li class="active" role="presentation">
                    <a href="#harian" class="mr-3 btn btn-primary" aria-controller="Daftartugas" role="tab" data-toggle="tab"> Harian </a>
                </li>
                <li role="presentation">
                    <a href="#bulanan" data-pid="" data-role="" data-empid="" class="mr-3 btn btn-primary ganttPrj" aria-controller="Gchart" role="tab" data-toggle="tab"> Bulanan </a>
                </li>
                <li role="presentation">
                    <a href="#tahunan" class="btn btn-primary mr-3" aria-controller="docProj" role="tab" data-toggle="tab"> Tahunan </a>
                </li>
              </ul>
            </div>
          </div>    
        </span>
      </h1>  
    </div>
  </div>    
  <div class="row mt-3">   
  <div class="col"> 
    <div class="tab-content">
      <div class="tab-pane active" id="harian">
        <!-- Tabel pendapatan harian - seluruh outlet - seluruh transaksi -->
        <h5>Grafik Pendapatan Harian Bulan <?= date('M'); ?> Tahun <?= date('Y');?></h5>
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  Line Chart
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
          <h5>Grafik Pendapatan Bulanan Tahun <?= date('Y'); ?></h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  Line Chart
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
          <h5>Grafik Pendapatan Tahunan</h5>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  Line Chart
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
</div>
</div>
<!-- End of Main Content -->
