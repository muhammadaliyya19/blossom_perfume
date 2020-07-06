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
        <h5>Grafik Pendapatan Harian</h5>
        <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  Nanti Grafik Lingkaran Per-Outlet
                </div>
                <div class="card-body">
                  <img src="https://4.bp.blogspot.com/-IErJ0t9JTL0/UvdYtyzTobI/AAAAAAAAABw/I9hSQBC3JyU/s1600/LING.png">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  Nanti Grafik Batang Per-Bibit
                </div>
                <div class="card-body">
                  <img src="https://chartio.com/assets/9bfb20/tutorials/charts/stacked-bar-charts/073137bf11f1c2226f68c3188128e28d66115622dcdecc9bc208a6d4117f53e8/stacked-bar-example-1.png">
                </div>
              </div>
            </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <h5>Seluruh Transaksi - Seluruh Outlet - Harian</h5>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Outlet</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Total Harga Beli Bibit</th>
                      <th scope="col">Total Harga Jual Bibit</th>
                      <th scope="col">Pendapatan</th>
                      <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                        <?php foreach ($transaksi as $p) : ?>
                          <tr>
                            <th scope="row"><?=$i; ?></th>
                            <td><?php echo $p['outlet']; ?></td>
                            <td><?php echo $p['tanggal_transaksi']; ?></td>
                            <td><?php echo $p['harga_satuan']; ?></td>
                            <td><?php echo $p['total_harga']; ?></td>
                            <td><?php echo ($p['total_harga'] - $p['harga_satuan']); ?></td>
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
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  Nanti Grafik Lingkaran Per-Outlet
                </div>
                <div class="card-body">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRbjOLj8e4p93Y3Vc9zFsbR0EsTq--Mm06Thw&usqp=CAU">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  Nanti Grafik Batang Per-Bibit
                </div>
                <div class="card-body">
                  <img src="https://www.perkinselearning.org/sites/elearning.perkinsdev1.org/files/styles/interior_page_image__519x374_/public/Leaves_0.jpg?itok=KoZTXYhD">
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
                      <th scope="col">Outlet</th>
                      <th scope="col">Bulan</th>
                      <th scope="col">Akumulasi Harga Beli Bibit</th>
                      <th scope="col">Akumulasi Harga Jual Bibit</th>
                      <th scope="col">Pendapatan</th>
                      <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                        <?php foreach ($transaksi as $p) : ?>
                          <tr>
                            <th scope="row"><?=$i; ?></th>
                            <td><?php echo $p['outlet']; ?></td>
                            <td><?php echo $p['tanggal_transaksi']; ?></td>
                            <td><?php echo $p['harga_satuan']; ?></td>
                            <td><?php echo $p['total_harga']; ?></td>
                            <td><?php echo ($p['total_harga'] - $p['harga_satuan']); ?></td>
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
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  Nanti Grafik Lingkaran Per-Outlet
                </div>
                <div class="card-body">
                  <img src="https://depictdatastudio.com/wp-content/uploads/2015/03/clustered-bar-chart-alternatives_before.jpg">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  Nanti Grafik Batang Per-Bibit
                </div>
                <div class="card-body">
                  <img src="https://www.fusioncharts.com/blog/wp-content/uploads/2013/06/column-intro.png"  style="height: 50%;">
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
                      <th scope="col">Outlet</th>
                      <th scope="col">Tahun</th>
                      <th scope="col">Akumulasi Harga Beli Bibit</th>
                      <th scope="col">Akumulasi Harga Jual Bibit</th>
                      <th scope="col">Pendapatan</th>
                      <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                        <?php foreach ($transaksi as $p) : ?>
                          <tr>
                            <th scope="row"><?=$i; ?></th>
                            <td><?php echo $p['outlet']; ?></td>
                            <td><?php echo $p['tanggal_transaksi']; ?></td>
                            <td><?php echo $p['harga_satuan']; ?></td>
                            <td><?php echo $p['total_harga']; ?></td>
                            <td><?php echo ($p['total_harga'] - $p['harga_satuan']); ?></td>
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
