<!-- offline_ppps.php -->

<div class="container">
    <h2>Daftar PPP Tidak Aktif</h2>
    <?php 
        // Sort offline PPPs by 'last-logged-out' in descending order
        usort($offline_ppps, function($a, $b) {
            return strtotime($b['last-logged-out']) - strtotime($a['last-logged-out']);
        });
        
        $jumlah_aktif = count($ppp_active);
        $jumlah_secret = count($ppp_secrets);
        $jumlah_offline = count($offline_ppps);
    ?>

    <p>Jumlah PPP Aktif: <?php echo $jumlah_aktif; ?></p>
    <p>Jumlah Secret: <?php echo $jumlah_secret; ?></p>
    <p>Jumlah Secret Offline: <?php echo $jumlah_offline; ?></p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Last Logged Out</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($offline_ppps)): ?>
                <?php $no = 1; ?>
                <?php foreach($offline_ppps as $ppp): ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $ppp['name']; ?></td>
                        <td><?php echo $ppp['last-logged-out']; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Semua PPP aktif.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if ($secret_disabled): ?>
        <p>Ada secret yang dinonaktifkan:</p>
        <ul>
            <?php foreach ($ppp_secrets as $secret): ?>
                <?php if ($secret['disabled'] == 'true'): ?>
                    <li><?php echo $secret['name']; ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
