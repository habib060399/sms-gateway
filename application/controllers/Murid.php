<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('BroadcastModel');
    }
    public function inputMurid()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/inputMurid');
        $this->load->view('admin/template/footer');
    }

    public function broadcastBelumLunas()
    {
        function sendsms($to, $msg)
        {
            $url = "https://websms.co.id/api/smsgateway?token=39cfce1c5f367f06ef5068cd6b682b1a&to=$to&msg=$msg";
            // $url = "https://websms.co.id/api/smsgateway-vip?token=39cfce1c5f367f06ef5068cd6b682b1a&to=$to&msg=$msg";
            $header = array(
                'Accept: application/json',
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);

            return ($result);
        }

        $data = $this->BroadcastModel->getNoOrtu();
        foreach ($data->result_array() as $m) {
            $to = $m['telp_orangtua'];
            $nama = $m['nama'];
            $pesan = urlencode("Hallo! Atas nama " . $nama . " belum melunasi pembayaran semester ini!Pembayaran Sebesar Rp.200.000 mohon untuk segera dibayarkan");
            // str_replace(" ", "%20", $pesan);
            // var_dump($to);
            sendsms($to, $pesan);
        }
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/broadcast');
        $this->load->view('admin/template/footer');
    }
}
