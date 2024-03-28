<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user_by_role($username, $password, $role) {
        // Encrypt password using MD5
        $encrypted_password = md5($password);

        // Query to retrieve user data based on username, password (already encrypted), and role
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $encrypted_password, 'role' => $role));
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

      public function add_user($data) {
        // Insert data pengguna ke dalam tabel 'users'
        $this->db->insert('users', $data);
    }

    public function get_user_by_id($user_id) {
        // Ambil data pengguna berdasarkan ID
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row();
    }

    public function get_user_by_username($username) {
        // Ambil data pengguna berdasarkan username
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row();
    }

    public function get_all_users() {
        // Ambil semua data pengguna
        $query = $this->db->get('users');
        return $query->result();
    }

    public function update_user($user_id, $data) {
        // Perbarui data pengguna berdasarkan ID
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function delete_user($user_id) {
        // Hapus data pengguna berdasarkan ID
        $this->db->where('id', $user_id);
        $this->db->delete('users');
    }

}

