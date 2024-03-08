<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikrotikppp_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('routerosapi');
    }

    public function getActivePPPCount() {
        // Load configuration from config file
        $hostname = $this->config->item('hostname_mikrotik');
        $username = $this->config->item('username_mikrotik');
        $password = $this->config->item('password_mikrotik');
        $port = $this->config->item('port_mikrotik');

        if ($this->routerosapi->connect($hostname, $username, $password, $port)) {
            // Get active PPP connections
            $ppp_active = $this->routerosapi->comm('/ppp/active/print');
            $this->routerosapi->disconnect();
            return count($ppp_active);
        } else {
            return 0; // Return 0 if connection fails
        }
    }

    public function getPPPSecretsCount() {
        // Load configuration from config file
        $hostname = $this->config->item('hostname_mikrotik');
        $username = $this->config->item('username_mikrotik');
        $password = $this->config->item('password_mikrotik');
        $port = $this->config->item('port_mikrotik');

        if ($this->routerosapi->connect($hostname, $username, $password, $port)) {
            // Get PPP secrets
            $ppp_secrets = $this->routerosapi->comm('/ppp/secret/print');
            $this->routerosapi->disconnect();
            return count($ppp_secrets);
        } else {
            return 0; // Return 0 if connection fails
        }
    }

    public function getOfflinePPPsCount() {
        // Load configuration from config file
        $hostname = $this->config->item('hostname_mikrotik');
        $username = $this->config->item('username_mikrotik');
        $password = $this->config->item('password_mikrotik');
        $port = $this->config->item('port_mikrotik');

        if ($this->routerosapi->connect($hostname, $username, $password, $port)) {
            // Get active PPP connections
            $ppp_active = $this->routerosapi->comm('/ppp/active/print');

            // Get PPP secrets
            $ppp_secrets = $this->routerosapi->comm('/ppp/secret/print');

            // Initialize counters
            $offline_count = 0;
            $disabled_count = 0;

            // Loop through all PPP secrets
            foreach ($ppp_secrets as $secret) {
                // Check if the secret is disabled
                if ($secret['disabled'] == 'true') {
                    $disabled_count++; // Increment the counter for disabled secrets
                }
                // Check if the secret is not found in active PPP connections
                if (!in_array($secret['name'], array_column($ppp_active, 'name'))) {
                    $offline_count++; // Increment the counter for offline PPPs
                }
            }

            $this->routerosapi->disconnect();
            return array('offline' => $offline_count, 'disabled' => $disabled_count);
        } else {
            return array('offline' => 0, 'disabled' => 0); // Return 0 if connection fails
        }
    }

    public function getGrowthData() {
    $query = $this->db->get('growth_tracking');
    return $query->result_array();
}

    public function getActivePPP() {
        // Load configuration from config file
        $hostname = $this->config->item('hostname_mikrotik');
        $username = $this->config->item('username_mikrotik');
        $password = $this->config->item('password_mikrotik');
        $port = $this->config->item('port_mikrotik');

        if ($this->routerosapi->connect($hostname, $username, $password, $port)) {
            // Get active PPP connections
            $ppp_active = $this->routerosapi->comm('/ppp/active/print');
            $this->routerosapi->disconnect();
            return $ppp_active;
        } else {
            return array(); // Return empty array if connection fails
        }
    }

    public function getPPPoESecrets() {
        // Load configuration from config file
        $hostname = $this->config->item('hostname_mikrotik');
        $username = $this->config->item('username_mikrotik');
        $password = $this->config->item('password_mikrotik');
        $port = $this->config->item('port_mikrotik');

        if ($this->routerosapi->connect($hostname, $username, $password, $port)) {
            // Get PPPoE secrets
            $pppoe_secrets = $this->routerosapi->comm('/ppp/secret/print');

            $this->routerosapi->disconnect();
            return $pppoe_secrets;
        } else {
            return array(); // Return empty array if connection fails
        }
    }

  public function getOfflinePPP() {
    // Load configuration from config file
    $hostname = $this->config->item('hostname_mikrotik');
    $username = $this->config->item('username_mikrotik');
    $password = $this->config->item('password_mikrotik');
    $port = $this->config->item('port_mikrotik');

    if ($this->routerosapi->connect($hostname, $username, $password, $port)) {
        // Get active PPP connections
        $ppp_active = $this->routerosapi->comm('/ppp/active/print');

        // Get PPPoE secrets
        $pppoe_secrets = $this->routerosapi->comm('/ppp/secret/print');

        // Initialize array to store offline PPPoE connections
        $offline_pppoe = array();

        // Check for offline PPPoE connections
        foreach ($pppoe_secrets as $secret) {
            $found = false;
            foreach ($ppp_active as $active) {
                if ($secret['name'] == $active['name']) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                // Add address attribute to secret if available
                $secret['address'] = isset($secret['address']) ? $secret['address'] : '';
                $offline_pppoe[] = $secret;
            }
        }

        $this->routerosapi->disconnect();
        return $offline_pppoe;
    } else {
        return array(); // Return empty array if connection fails
    }
}



}
?>
