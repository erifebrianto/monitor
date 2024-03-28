<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_queue_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('routerosapi');
    }

    // Fungsi untuk mengambil data simple queue dari MikroTik menggunakan API RouterOS
    public function getSimpleQueueFromAPI() {
        // Load konfigurasi dari file config
        $hostname = $this->config->item('mikrotik_hostname');
        $username = $this->config->item('mikrotik_username');
        $password = $this->config->item('mikrotik_password');
        $port = $this->config->item('mikrotik_api_port');

        if ($this->routerosapi->connect($hostname, $username, $password, $port)) {
            // Ambil data simple queue
            $simple_queue = $this->routerosapi->comm('/queue/simple/print');
            $this->routerosapi->disconnect();
            return $simple_queue;
        } else {
            return array(); // Return empty array if connection fails
        }
    }

    // Fungsi untuk memformat dan mengolah data simple queue
    public function getSimpleQueue() {
        // Ambil data simple queue dari API MikroTik
        $simple_queue_data = $this->getSimpleQueueFromAPI();

        // Siapkan array untuk menyimpan data simple queue yang diformat
        $formatted_simple_queue = array();

        // Proses data simple queue sesuai kebutuhan
        foreach ($simple_queue_data as $queue) {
            $formatted_simple_queue[] = array(
                'name' => $queue['name'],
                'target' => $queue['target'],
                'max_limit' => $queue['max-limit'],
                // Tambahkan atribut lain sesuai kebutuhan
            );
        }

        // Kembalikan data simple queue yang telah diformat
        return $formatted_simple_queue;
    }

    // Tambahkan fungsi lain sesuai kebutuhan, misalnya untuk menambah, mengedit, atau menghapus data simple queue

}
?>
