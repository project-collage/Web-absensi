<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    parent::__construct();

    date_default_timezone_get('Asia/Jakarta');
    error_reporting(E_ALL);
    ini_set('displays_errors', 1);
}

/***
 * API Login
 */

 function loginUser() {
     $username = $this->input->post('username');
     $password = $this->input->post('password');

     $this->db->where('username', $username);
     $this->db->where('pasword', password_verify($password, PASSWORD_DEFAULT));

     $q = $this->db->get('users');
     if ($q->num_rows() > 0) {
        $data['message'] = 'success';
        $data['status'] = 200;
        $data['user'] = $q -> row();
     } else {
        $data['message'] = 'username atau password salah';
        $data['message'] = 404;
     }
     echo json_decode($data);
 }