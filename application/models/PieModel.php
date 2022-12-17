<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class PieModel extends CI_Model
{
    public function getJum()
    {
        // $query = $this->db->select('nis')->from('tbl_murid')->group_by('id_kelas')->get()->result();
        $query = $this->db->query('SELECT COUNT(nis) as nis FROM tbl_murid GROUP BY id_kelas');
        return $query;
    }
    public function getPieKelas()
    {
        $data = $this->db->select('*')->from('tbl_kelas')->get()->result();
        return $data;
    }

    public function getPieJurusan()
    {
        $data = $this->db->select('*')->from('tbl_jurusan')->get()->result();
        return $data;
    }

    public function getJumJurusan()
    {
        $query = $this->db->query('SELECT COUNT(nis) as nis FROM tbl_murid GROUP BY id_jurusan');
        return $query;
    }
}
