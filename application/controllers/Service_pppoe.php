<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_pppoe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('Mikrotikppp_model');
    }

    public function active_pppoe() {
        // Mengambil data PPP aktif dari model
        $data['title'] = "PPPOE Aktif";
        $data['active_pppoe'] = $this->Mikrotikppp_model->getActivePPP();

        // Menampilkan view yang sesuai
        $this->load->view('template/header.php', $data);
        $this->load->view('active_pppoe', $data);
        $this->load->view('template/footer.php');
    }

    public function pppoe_secrets() {
        // Mengambil data secret PPPoE dari model
        $data['title'] = "PPPOE Secret";
        $data['pppoe_secrets'] = $this->Mikrotikppp_model->getPPPoESecrets();

        // Menampilkan view yang sesuai
        $this->load->view('template/header.php', $data);
        $this->load->view('pppoe_secrets', $data);
        $this->load->view('template/footer.php');
    }

   public function pppoe_offline() {
    // Mengambil data pelanggan PPPoE yang offline dari model
    $data['title'] = "PPPOE Offline";
    $data['offline_pppoe'] = $this->Mikrotikppp_model->getOfflinePPP();

    // Kirim pemberitahuan ke bot Telegram jika ada pelanggan yang offline
    if (!empty($data['offline_pppoe'])) {
        // Ganti `YOUR_BOT_TOKEN` dan `YOUR_CHAT_ID` dengan token bot dan ID obrolan Telegram Anda
        $bot_token = '5898186820:AAFte4xnmpB2xnzsaUX_GTVY1g3MkhYkVgM';
        $chat_id = '-818500402';
        
        $message = "Ada pelanggan PPPoE yang offline:\n";
        foreach ($data['offline_pppoe'] as $pppoe) {
            $message .= "- Nama: {$pppoe['name']}, Alamat IP: {$pppoe['address']}\n";
        }
        
        $url = "https://api.telegram.org/bot{$bot_token}/sendMessage?chat_id={$chat_id}&text={$message}";
        file_get_contents($url);
    }

    // Menampilkan view yang sesuai
    $this->load->view('template/header.php', $data);
    $this->load->view('pppoe_offline', $data);
    $this->load->view('template/footer.php');
}


}
?>
