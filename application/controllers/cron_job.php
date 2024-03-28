<?php
// Set base URL sesuai dengan URL aplikasi Anda
define('BASE_URL', 'http://localhost/monitor/');

// Panggil URL untuk menjalankan fungsi pppoe_offline
$url = BASE_URL . 'service_pppoe/pppoe_offline';

// Panggil URL menggunakan cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Cetak respon (opsional)
echo $response;
?>

