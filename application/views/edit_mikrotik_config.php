<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Secret PPPOE</h6>
                </div>
                <div class="card-body">
            <h2>Edit Konfigurasi Mikrotik</h2>
            <form method="post" action="<?php echo site_url('router/save_config'); ?>">
                <div class="form-group">
                    <label for="hostname">Hostname:</label>
                    <input type="text" class="form-control" id="hostname" name="hostname" value="<?php echo $config['hostname_mikrotik']; ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $config['username_mikrotik']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $config['password_mikrotik']; ?>">
                </div>
                <div class="form-group">
                    <label for="port">Port:</label>
                    <input type="text" class="form-control" id="port" name="port" value="<?php echo $config['port_mikrotik']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>