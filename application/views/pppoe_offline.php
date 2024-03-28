<meta http-equiv="refresh" content="60000">

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
                                    <th>Paket</th>
                                    <th>Terakhir Offline</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($offline_pppoe as $index => $pppoe): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $pppoe['name']; ?></td>
                                        <td><?php echo $pppoe['profile']; ?></td>
                                        <td>
                                             <?php
                                            // Tanggal awal dari variabel $pppoe['last-logged-out'] dalam format "Y-m-d H:i:s"
                                            $tanggal_awal = $pppoe['last-logged-out'];

                                            // Ubah format tanggal
                                            $tanggal_ubah = date("H:i:s d-m-Y", strtotime($tanggal_awal));

                                            // Tampilkan hasil
                                            echo $tanggal_ubah;
                                            ?>
                                        </td>
                                        
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
<script>
    // Fungsi untuk memuat ulang konten secara asinkron
    function refreshContent() {
        // Gunakan AJAX untuk memuat ulang konten tanpa perlu me-refresh halaman utuh
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Perbarui konten dengan respons dari server
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "url_ke_controller_pppoe_offline", true);
        xhttp.send();
    }

    // Atur interval untuk memanggil fungsi refreshContent() setiap 10 detik
    setInterval(refreshContent, 60000); // 10 detik
</script>
