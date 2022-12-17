<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RuanganModel extends CI_Model
{
    public function getRuangan()
    {
        $this->db->select('*');
        $this->db->from('tbl_ruangan');
        $query = $this->db->get();
        return $query;
    }

    public function insertRuangan($data)
    {
        $this->db->insert('tbl_ruangan', $data);
    }

    public function detailRuangan($idRuangan)
    {
        $this->db->select('*');
        $this->db->from('tbl_ruangan');
        $this->db->where('id_ruangan', $idRuangan);
        $query = $this->db->get();
        return $query;
    }
}
