<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Mikrotikppp_model');
        // Load session library
        $this->load->library('session');
        
        // Check if user is not logged in, then redirect to login page
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
	}

	public function index() {
		$data['title'] = "Dashboard";

		// Load the Mikrotikppp model to access its functions
		$this->load->model('Mikrotikppp_model');

		// Get counts from Mikrotikppp_model
		$activePPPCount = $this->Mikrotikppp_model->getActivePPPCount();
		$pppSecretsCount = $this->Mikrotikppp_model->getPPPSecretsCount();
		$offlinePPPsCount = $this->Mikrotikppp_model->getOfflinePPPsCount();

		// Pass counts to the view
		$data['activePPPCount'] = $activePPPCount;
		$data['pppSecretsCount'] = $pppSecretsCount;
		$data['offlinePPPsCount'] = $offlinePPPsCount;
		

		$this->load->view('template/header.php', $data);
		$this->load->view('v_dashboard', $data);
		$this->load->view('template/footer.php');
	}

	public function get_growth_data() {
        $this->load->model('Mikrotikppp_model');
        $growth_data = $this->Mikrotikppp_model->getGrowthData();
        header('Content-Type: application/json');
        echo json_encode($growth_data);
    }
}
?>
