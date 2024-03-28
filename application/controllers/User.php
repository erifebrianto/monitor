<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model'); // Load model untuk pengolahan data user
        $this->load->library('form_validation'); // Load library form validation
    }

    public function index() {
        $data['title'] = "User List";
        $data['users'] = $this->user_model->get_all_users();

        $this->load->view('template/header.php', $data);
        $this->load->view('admin/admin_view', $data); // Memuat view user dengan container fluid
        $this->load->view('template/footer.php');
    }

    public function add() {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the add user page with validation errors
            $data['title'] = "Add User";


            $this->load->view('template/header.php', $data);
            $this->load->view('admin/add_user_view');
             $this->load->view('template/footer.php');
        } else {
            // Retrieve data from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = $this->input->post('role');

            // Prepare data to be inserted into the database
            $data = array(
                'username' => $username,
                'password' => md5($password), // Encrypt password using MD5
                'role' => $role
            );

            // Add user to the database
            $this->user_model->add_user($data);

            // Redirect to the user list page
            redirect('user');
        }
    }

    public function edit($user_id) {
        // Get the user data based on user ID
        $data['user'] = $this->user_model->get_user_by_id($user_id);

        // Load the view to edit user data
        $data['title'] = "Edit User";


            $this->load->view('template/header.php', $data);
            $this->load->view('admin/edit_user_view', $data);
             $this->load->view('template/footer.php');
        
    }

    public function update($user_id) {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the edit user page with validation errors
            $data['user'] = $this->user_model->get_user_by_id($user_id);
            $this->load->view('edit_user_view', $data);
        } else {
            // Retrieve data from the form
            $username = $this->input->post('username');
            $role = $this->input->post('role');
            $password = $this->input->post('password');

            // Prepare data to be updated into the database
            $data = array(
                'username' => $username,
                'role' => $role
            );

            // Check if password field is not empty, then encrypt the password
            if (!empty($password)) {
                $data['password'] = md5($password);
            }

            // Update user in the database
            $this->user_model->update_user($user_id, $data);

            // Redirect to user list page or any other page as needed
            redirect('user');
        }
    }

    public function delete($user_id) {
        // Delete user data from the database
        $this->user_model->delete_user($user_id);

        // Redirect to the user list page
        redirect('user');
    }

}
?>
