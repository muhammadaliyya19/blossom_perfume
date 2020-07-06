    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
          <i class="fa fa-area-chart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Penjualan & Prediksi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
        <div class="sidebar-heading">
          STORE
        </div>
          <!-- Nav Item - Store -->        
          <!-- <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>">
              <i class="fas fa-tachometer-alt fa-fw text-gray-300"></i><span>Dashboard</span>
            </a>
          </li> -->
          <?php if($_SESSION['user']['jabatan'] == "Admin"): ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-tachometer-alt fa-fw text-gray-300"></i>
              <span>Dashboard</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white collapse-inner rounded">
                <h6 class="collapse-header">Outlet:</h6>
                <?php foreach ($outlet as $o):?>
                  <a class="collapse-item" href="<?=base_url('admin/outlet/'. $o['id_outlet']); ?>">Cabang <?=$o['alamat_outlet']; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link pb-0" href="<?= base_url(); ?>">
                <i class="fas fa-tachometer-alt fa-fw text-gray-300"></i><span>Dashboard</span>
              </a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('transaksi'); ?>">
              <i class="fas fa-exchange-alt fa-fw text-gray-300"></i><span>Transaksi</span>
            </a>
          </li>                
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('bibit'); ?>">
              <i class="fas fa-tree fa-fw text-gray-300"></i><span>Bibit</span>
            </a>
          </li>
          <?php if($_SESSION['user']['jabatan'] == "Admin"): ?>
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('outlet'); ?>">
              <i class="fas fa-store-alt fa-fw text-gray-300"></i><span>Outlet</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('pegawai'); ?>">
              <i class="fas fa-user-alt fa-fw text-gray-300"></i><span>Pegawai</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('pendapatan'); ?>">
              <i class="fas fa-coins fa-fw text-gray-300"></i><span>Pendapatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('prediksi'); ?>">
              <i class="fa fa-line-chart fa-fw text-gray-300"></i><span>Prediksi</span>
            </a>
          </li>
        <?php endif; ?>
        <hr class="sidebar-divider mt-3">
        <div class="sidebar-heading">
          AUTH
        </div>        
          <!-- NAV ITEM FOR Auth -->
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('auth/logout')?>">
              <i class="fas fa-fw fa-sign-out-alt text-gray-300"></i>          
              <span>Logout</span>
            </a>
          </li>
          
     
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
