<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queue extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('Simple_queue_model');
    }

    public function index() {
        // Mengambil data simple queue dari model
        $data['title'] = "Simple Queue";
        $data['simple_queue'] = $this->Simple_queue_model->getSimpleQueue();

        // Menampilkan view yang sesuai
        $this->load->view('template/header.php', $data);
        $this->load->view('simple_queue.php', $data);
        $this->load->view('template/footer.php');
    }

    // Tambahkan fungsi lain sesuai kebutuhan, misalnya untuk menambah, mengedit, atau menghapus data simple queue

}
?>
