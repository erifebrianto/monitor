<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikrotikppp extends CI_Controller {

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

    if (!$this->routerosapi->connect($hostname, $username, $password, $port)) {
        echo '<script> alert("koneksi mikrotik gagal")</script>';
    } else {
        // Get active PPP connections
        $ppp_active = $this->routerosapi->comm('/ppp/active/print');

        // Get PPP secrets
        $ppp_secrets = $this->routerosapi->comm('/ppp/secret/print');

        // Get offline PPPs
        $offline_ppps = array();
        $secret_disabled = false; // Variable to track if there is any disabled secret
        foreach ($ppp_secrets as $secret) {
            if ($secret['disabled'] == 'true') { // Check if secret is disabled
                $secret_disabled = true; // Mark that there is a disabled secret
            } else {
                $found = false;
                foreach ($ppp_active as $active) {
                    if ($secret['name'] == $active['name']) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $offline_ppp_info = $this->routerosapi->comm('/ppp/secret/print', array(
                        "?name" => $secret['name']
                    ));
                    $offline_ppp = $offline_ppp_info[0];
                    $offline_ppp['last-logged-out'] = isset($offline_ppp['last-logged-out']) ? $offline_ppp['last-logged-out'] : '';
                    $offline_ppps[] = $offline_ppp;
                }
            }
        }

        // Sort offline PPPs by 'last-logged-out' in descending order
        usort($offline_ppps, function($a, $b) {
            return strtotime($b['last-logged-out']) - strtotime($a['last-logged-out']);
        });

        $data['ppp_active'] = $ppp_active;
        $data['ppp_secrets'] = $ppp_secrets;
        $data['offline_ppps'] = $offline_ppps;
        $data['secret_disabled'] = $secret_disabled; // Pass the variable to the view

        $this->load->view('ppp_active', $data); // You need to create ppp_active.php view
        $this->load->view('ppp_secrets', $data);
        $this->load->view('offline_ppps', $data); // You need to create offline_ppps.php view

        $this->routerosapi->disconnect();
    }
}

}
