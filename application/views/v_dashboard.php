  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <a href="<?php echo base_url();?>Service_pppoe/active_pppoe" class="text-decoration-none">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah PPP Aktif</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $activePPPCount; ?></div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>



            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <a href="<?php echo base_url();?>Service_pppoe/pppoe_secrets" class="text-decoration-none">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Secret</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pppSecretsCount; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
			    <div class="card border-left-success shadow h-100 py-2">
			        <div class="card-body">
                <a href="<?php echo base_url();?>Service_pppoe/pppoe_offline" class="text-decoration-none">
			            <div class="row no-gutters align-items-center">
			                <div class="col mr-2">
			                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pelanggan Offline</div>
			                    <div class="h5 mb-0 font-weight-bold text-gray-800">
			                        <?php 
			                        if (is_array($offlinePPPsCount)) {
			                            echo $offlinePPPsCount['offline'];
			                        } else {
			                            echo "Data tidak tersedia";
			                        }
			                        ?>
			                    </div>
			                </div>
			                <div class="col-auto">
			                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
			                </div>
			            </div>
                </a>
			        </div>
			    </div>
			</div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Ambil data pertumbuhan dari PHP
            var growthData = <?php echo $growthData; ?>;

            // Ambil tanggal-tanggal dari data pertumbuhan
            var dates = growthData.map(function(item) {
                return item.date;
            });

            // Ambil jumlah pelanggan aktif, offline, dan dinonaktifkan dari data pertumbuhan
            var activeCounts = growthData.map(function(item) {
                return item.active_count;
            });
            var offlineCounts = growthData.map(function(item) {
                return item.offline_count;
            });
            var disabledCounts = growthData.map(function(item) {
                return item.disabled_count;
            });

            // Gambar grafik menggunakan Chart.js
            var ctx = document.getElementById('growthChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Active',
                        data: activeCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Offline',
                        data: offlineCounts,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Disabled',
                        data: disabledCounts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>


            </div>
          </div>

        </div>