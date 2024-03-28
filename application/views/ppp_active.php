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
<!-- Memuat pustaka jQuery dan DataTables -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Skrip untuk inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
            "order": [] // Untuk menghapus pengurutan default pada kolom apa pun
        });
    });
</script>
