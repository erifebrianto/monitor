<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Router extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('Router_model');
        $this->load->library('session');
    // Check if user is not logged in, then redirect to login page
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        }

    public function index() {
        // Load konfigurasi Mikrotik dari file
        $this->load->config('mikrotik', TRUE);
        $data['title'] = "Router Setting";
        $data['config'] = $this->config->config;

        // Tampilkan view untuk mengedit konfigurasi
        $this->load->view('template/header.php', $data);
        $this->load->view('v_mikrotik', $data);
        $this->load->view('template/footer.php');
    }

    public function edit_config() {
        // Load konfigurasi Mikrotik dari file
        $this->load->config('mikrotik', TRUE);
        $data['title'] = "Edit Router";
        $data['config'] = $this->config->config;

        // Tampilkan view untuk mengedit konfigurasi
        $this->load->view('template/header.php', $data);
        $this->load->view('edit_mikrotik_config', $data);
        $this->load->view('template/footer.php');
    }

    public function save_config() {
        // Ambil data yang dikirimkan dari formulir
        $hostname = $this->input->post('hostname');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $port = $this->input->post('port');

        // Simpan konfigurasi Mikrotik ke file
        $result = $this->Router_model->saveConfig($hostname, $username, $password, $port);

        // Tampilkan pesan hasil penyimpanan
        if ($result) {
            redirect('router');
        } else {
            echo "Gagal menyimpan konfigurasi Mikrotik.";
        }
    }
}
?>
