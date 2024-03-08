<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Router_model extends CI_Model {
    
    public function saveConfig($hostname, $username, $password, $port) {
    // Load helper untuk menulis file konfigurasi
    $this->load->helper('file');

    // Format konfigurasi
    $config_data = "<?php\n";
    $config_data .= "defined('BASEPATH') OR exit('No direct script access allowed');\n";
    $config_data .= "\$config['hostname_mikrotik'] = '".$hostname."';\n";
    $config_data .= "\$config['username_mikrotik'] = '".$username."';\n";
    $config_data .= "\$config['password_mikrotik'] = '".$password."';\n";
    $config_data .= "\$config['port_mikrotik'] = '".$port."';\n";
    $config_data .= "?>";

    // Path ke file konfigurasi
    $config_path = APPPATH.'config/mikrotik.php';

    // Tulis data konfigurasi ke file
    if (write_file($config_path, $config_data)) {
        return true;
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Gagal menyimpan konfigurasi Mikrotik. Periksa izin file dan path.";
        return false;
    }
}

}
?>
