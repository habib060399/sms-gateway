<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BroadcastModel extends CI_Model
{
    public function getNoOrtu()
    {
        $this->db->select('nama, telp_orangtua');
        $this->db->from('tbl_murid');
        $this->db->where('status', 'belum lunas');
        $this->db->or_where('status', 'Tunggakan 1');
        $this->db->or_where('status', 'Tunggakan 2');
        $query = $this->db->get();
        return $query;
    }
}
