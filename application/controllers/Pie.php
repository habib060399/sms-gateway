<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pie extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('PieModel');
    }
    public function getPie1()
    {

        $data = $this->PieModel->getPieKelas();

        $this->load->view('admin/template/header');
        $this->load->view('admin/datakelas', $data);
        $this->load->view('admin/template/footer');
    }
}
