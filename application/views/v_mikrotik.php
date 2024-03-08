<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Secret PPPOE</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Secret PPPOE</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Hostname</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Port</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $config['hostname_mikrotik']; ?></td>
                                    <td><?php echo $config['username_mikrotik']; ?></td>
                                    <td><?php echo $config['password_mikrotik']; ?></td>
                                    <td><?php echo $config['port_mikrotik']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('router/edit_config'); ?>" class="btn btn-primary">Edit</a>                                
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>