<!-- queue_info_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue Information</title>
    <!-- Load DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Load DataTables Print Button CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
</head>
<body>
    <h1>Queue Information</h1>
    <table id="queueTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Target</th>
                <th>Rate</th>
                <th>Packet Rate</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($queue_info as $queue): ?>
                <tr>
                    <td><?php echo str_replace(['<', '>'], '', $queue['name']); ?></td>
            <td><?php echo str_replace(['<', '>'], '', $queue['target']); ?></td>
                    <td><?php echo $queue['rate']; ?></td>
                    <td><?php echo $queue['packet-rate']; ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Load DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Load DataTables Print Button JS -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#queueTable').DataTable({
                "paging": false, // Menonaktifkan paginasi
                "info": false, // Menyembunyikan informasi jumlah data
                "lengthMenu": [ [10, 50, 100, 1000, -1], [10, 50, 100, 1000, "All"] ], // Opsi jumlah baris per halaman
                "pageLength": 1000, // Jumlah baris default yang ditampilkan
                "buttons": [ // Konfigurasi tombol
                    'print' // Menambahkan tombol print
                ]
            });

            // Tambahkan tombol cetak ke toolbar DataTable
            table.buttons().container().appendTo( '#queueTable_wrapper .col-md-6:eq(0)' );
        });
    </script>
</body>
</html>
