<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JurusanModel extends CI_Model
{
    public function getJurusan()
    {
        $this->db->select('*');
        $this->db->from('tbl_Jurusan');
        $query = $this->db->get();
        return $query;
    }

    public function insertJurusan($data)
    {
        $this->db->insert('tbl_jurusan', $data);
    }

    public function detailPembayaran($idJurusan)
    {
        $this->db->select('*');
        $this->db->from('tbl_jurusan');
        $this->db->where('id_jurusan', $idJurusan);
        $query = $this->db->get();
        return $query;
    }

    public function getJkr()
    {
        $this->db->select('*');
        $this->db->from('tbl_jurusan');
        $query = $this->db->get();
        return $query;
    }
    public function getJumlahJurusan()
    {
        $query = $this->db->query("SELECT COUNT(id_jurusan) as jurusan FROM tbl_jurusan");
        return $query;
    }
}
