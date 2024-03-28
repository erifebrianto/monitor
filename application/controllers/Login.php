<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model'); // Load model untuk pengolahan data user
        $this->load->library('form_validation'); // Load library form validation
    }

    public function index() {
        $this->load->view('login_view'); // Tampilkan halaman login
    }

    public function process() {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login page with validation errors
            $this->load->view('login_view');
        } else {
            // Retrieve data from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Try to authenticate user with 'admin' role
            $admin_user = $this->user_model->get_user_by_role($username, $password, 'admin');

            // If admin user is found, create session and redirect to the dashboard page
            if ($admin_user) {
                $userdata = array(
                    'username' => $admin_user->username,
                    'role' => $admin_user->role,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($userdata);
                redirect('dashboard');
            }

            // If admin user is not found, try to authenticate user with 'client' role
            $client_user = $this->user_model->get_user_by_role($username, $password, 'client');

            // If client user is found, create session and redirect to the dashboard page
            if ($client_user) {
                $userdata = array(
                    'username' => $client_user->username,
                    'role' => $client_user->role,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($userdata);
                redirect('dashboard');
            }

            // If neither admin nor client user is found, reload the login page with an error message
            $data['error'] = 'Invalid username or password';
            $this->load->view('login_view', $data);
        }
    }

    public function logout() {
        // Destroy session and redirect to the login page
        $this->session->sess_destroy();
        redirect('login');
    }
}
