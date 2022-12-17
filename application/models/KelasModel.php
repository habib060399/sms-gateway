<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasModel extends CI_Model
{
    public function getKelas()
    {
        $this->db->select('*');
        $this->db->from('tbl_kelas');
        $query = $this->db->get();
        return $query;
    }

    public function insertKelas($data)
    {
        $this->db->insert('tbl_kelas', $data);
    }

    public function detailKelas($idKelas)
    {
        $this->db->select('*');
        $this->db->from('tbl_kelas');
        $this->db->where('id_kelas', $idKelas);
        $query = $this->db->get();
        return $query;
    }
}
