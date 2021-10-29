<?php

class AddAjax extends CI_Controller
{

    function index()
    {
        $this->load->view('admin/anggota/add');
    }

    public function loginajax()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('no_employee', 'No Employee', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $array = array(
                'success' => '<div class="alert alert-sucess">Berhasil Menambahkan Anggota</div>'
            );
        } else {
            $array = array(
                'error' => true,
                'no_error' => form_error('no_employee'),
                'name_error' => form_error('name'),
                'email_error' => form_error('email'),
                'password_error' => form_error('password'),
            );
        }

        echo json_encode($array);
    }
}
