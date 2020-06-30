        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">BIBIT</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_bibit; ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-tree fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">OUTLET</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_outlet; ?></div>
                    </div>
                    <div class="col">
                      <!-- <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div> -->
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-store-alt fa-fw fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TRANSAKSI</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_transaksi; ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-exchange-alt fa-fw fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PEGAWAI</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pegawai; ?></div>
                  </div>
                  <div class="col-auto">

                   <i class="fas far fa-user-tie fa-2x text-gray-300"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>         
      </div>

      <div class="row">
            <img style="width: auto; height: auto;" src="<?php echo base_url('assets/img/') . 'Logo.png'; ?>" alt="">
          </div>

        

         <!--  <div class="row">
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                  </div>
                  <div class="card-body">
                      <?php $i = 0; ?>
                      <?php foreach ($project as $p): ?>
                        <h4 class="small"><strong><?=$p['projName'];?></strong><span> | Due Date : <?=$p['projEndDate'];?></span><span class="float-right"><?=$p['projProgress'].'%';?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?=$p['projProgress'].'%';?>" aria-valuenow="<?=$p['projProgress'].'%';?>" aria-valuemin="0" aria-valuemax="100">                              
                            </div>
                        </div>
                      <?php $i++; if($i == 5){break;}endforeach; ?>
                  </div>
               </div>
              </div>
              <div class="col-lg-6">
                <div class="card shadow">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                  </div>
                  <div class="card-body">
                      <?php $i = 0; ?>
                      <?php foreach ($project as $p): if($i++ < 5){continue;}?>
                        <h4 class="small"><strong><?=$p['projName'];?></strong><span> | Due Date : <?=$p['projEndDate'];?></span><span class="float-right"><?=$p['projProgress'].'%';?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?=$p['projProgress'].'%';?>" aria-valuenow="<?=$p['projProgress'].'%';?>" aria-valuemin="0" aria-valuemax="100">                              
                            </div>
                        </div>
                      <?php if($i == 10){break;}endforeach; ?>
                  </div>                  
                </div>
              </div>
          </div>
          <div  class="row mb-4">
            <div class="col">
                <div class="card shadow">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gantt Chart Project</h6>
                  </div>
                  <div class="card-body">
                    
                      <div id="chart_project"></div>
                  </div>                  
                </div>
              </div>
          </div>

          <div  class="row mb-4">
            <div class="col">
                <div class="card shadow">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gantt Chart Task</h6>
                  </div>
                  <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    <div id="chart_task"></div>
                  </div>                  
                </div>
              </div>
          </div> -->
        
      </div>
    </div>
      <!-- End of Main Content -->