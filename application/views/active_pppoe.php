<!-- application/views/active_pppoe.php -->

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">PPPOE Aktif</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan Aktif</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nomer</th>
                                    <th>Nama</th>
                                    <th>Alamat IP</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($active_pppoe as $pppoe): ?>
                                    <tr>
                                        <td><?php echo $number++; ?></td>
                                        <td><?php echo $pppoe['name']; ?></td>
                                        <td><?php echo $pppoe['address']; ?></td>
                                        <td><?php echo is_numeric($pppoe['uptime']) ? formatUptime($pppoe['uptime']) : $pppoe['uptime']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function formatUptime($uptime) {
    if (!is_numeric($uptime)) {
        return $uptime;
    }

    $seconds = $uptime % 60;
    $uptime = floor($uptime / 60);
    $minutes = $uptime % 60;
    $uptime = floor($uptime / 60);
    $hours = $uptime % 24;
    $days = floor($uptime / 24);
    
    return $days . " hari " . $hours . " jam " . $minutes . " menit " . $seconds . " detik";
}
?>
