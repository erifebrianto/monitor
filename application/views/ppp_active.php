<!-- ppp_active.php -->

<div class="container">
    <h2>Daftar PPP Aktif</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Service</th>
                <th scope="col">Alamat IP</th>
                <th scope="col">Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($ppp_active as $active): ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $active['name']; ?></td>
                    <td><?php echo $active['service']; ?></td>
                    <td><?php echo $active['address']; ?></td>
                    <td><?php echo $active['uptime']; ?></td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
