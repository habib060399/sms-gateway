<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        } else {
            $this->loginAdmin();
        }
    }

    private function loginAdmin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($admin > 0) {
            if ($password == $admin['password']) {

                $data_session = array(
                    'username' => $username
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('admin'));
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Username/Password salah!</div>');
            redirect(base_url());
        }
    }

    public function logout_admin()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar</div>');
        redirect('auth');
    }
}
