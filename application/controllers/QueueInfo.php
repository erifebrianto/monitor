<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QueueInfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load routerosapi library
        $this->load->library('routerosapi');
    }

    public function index() {
        // Load configuration from config file
        $hostname = $this->config->item('hostname_mikrotik');
        $username = $this->config->item('username_mikrotik');
        $password = $this->config->item('password_mikrotik');
        $port = $this->config->item('port_mikrotik');

        // Connect to Mikrotik Router
        if (!$this->routerosapi->connect($hostname, $username, $password, $port)) {
            echo '<script>alert("Koneksi ke Mikrotik gagal");</script>';
        } else {
            // Get queue information
            $queue_info = $this->routerosapi->comm('/queue/simple/print');

            // Pass queue_info data to view
            $data['queue_info'] = $queue_info;

            // Load view for queue info
            $this->load->view('queue_info_view', $data);

            // Disconnect from Mikrotik Router
            $this->routerosapi->disconnect();
        }
    }

}
