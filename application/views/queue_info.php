<h2>Queue Information</h2>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Target</th>
        <th>Rate</th>
        <th>Packet Rate</th>
        <!-- Tambahkan kolom lain sesuai kebutuhan -->
    </tr>
    <?php foreach ($queue_info as $queue): ?>
        <tr>
            <td><?php echo str_replace(['<', '>'], '', $queue['name']); ?></td>
            <td><?php echo str_replace(['<', '>'], '', $queue['target']); ?></td>
            <td><?php echo $queue['rate']; ?></td>
            <td><?php echo $queue['packet-rate']; ?></td>
            <!-- Tambahkan baris ini untuk setiap kolom yang ingin ditampilkan -->
        </tr>
    <?php endforeach; ?>
</table>
