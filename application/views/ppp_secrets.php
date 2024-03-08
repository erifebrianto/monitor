<!-- ppp_secrets.php -->

<div class="container">
    <h2>Daftar PPP Secrets</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Password</th>
                <th scope="col">Service</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($ppp_secrets as $secret): ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $secret['name']; ?></td>
                    <td><?php echo $secret['password']; ?></td>
                    <td><?php echo $secret['service']; ?></td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
