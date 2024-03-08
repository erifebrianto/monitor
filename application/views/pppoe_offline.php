
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">PPPOE Offline</h1>

    <div class="row">

        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan PPPoE Offline</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nomer</th>
                                    <th>Nama Pelanggan</th>
                                    <th>User PPPOE</th>
                                    <th>Paket</th>
                                    <th>Terakhir Offline</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($offline_pppoe as $index => $pppoe): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $pppoe['comment']; ?></td>
                                        <td><?php echo $pppoe['name']; ?></td>
                                        <td><?php echo $pppoe['profile']; ?></td>
                                        <td><?php echo $pppoe['last-logged-out']; ?></td>
                                        
                                        <td>Offline</td>
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
