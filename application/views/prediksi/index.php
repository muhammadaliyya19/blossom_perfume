        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="text-center">
            SISTEM PREDIKSI PENJUALAN BLOSSOM PARFUME
          </h1>
          <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="outlet">Outlet</label>
              <select class="form-control" id="id_outlet" name="id_outlet">
                  <option value="A">Outlet 1</option>
                  <option value="B">Outlet 2</option>
                  <option value="C">Outlet 3</option>
              </select>
            </div>
            <div class="form-group">
              <label for="nama">Bibit</label>
              <!-- <input type="text" class="form-control" id="jumlah" placeholder="" name="jumlah"> -->
              <!-- <small class="form-text text-danger"><?php echo form_error('jumlah'); ?></small> -->
              <select class="form-control" id="id_bibit" name="id_bibit">
                <?php foreach ($bibit as $b) : ?>
                  <option value="<?= $b['nama_bibit']; ?>" data-nama="<?= $b['nama_bibit']; ?>"><?= $b['nama_bibit']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>  
          <div class="col-4 mt-3">
            <div class="text-center mt-3">
              <a href="#" class="btn btn-primary" id="doPrediksi">Prediksi</a>
            </div>
          </div>  
          <div class="col-4">
            <div class="form-group">
              <label for="nama">Rekomendasi Pembelian <span class="nama_parfum"></span> Bulan <?=$nextmonth; ?></label>
              <input type="text" class="form-control" id="hasilprediksi" placeholder="" name="jumlah">
              <small class="form-text text-danger"><?php echo form_error('jumlah'); ?></small>
            </div>
          </div>  
          </div>
          <div class="row mb-3">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-8"><img style="width: 100%; height: auto;" src="<?php echo base_url('assets/img/') . 'Logo.png'; ?>" alt=""></div>
              <div class="col-2"></div>
            </div>
          </div>
      </div>
    </div>
      <!-- End of Main Content -->