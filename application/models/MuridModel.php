<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MuridModel extends CI_Model
{
    public function getMurid()
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $query = $this->db->get();
        return $query;
    }

    public function getMurid2()
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->join('tbl_kelas', 'tbl_murid.id_kelas = tbl_kelas.id_kelas');
        $this->db->join('tbl_jurusan', 'tbl_murid.id_jurusan = tbl_jurusan.id_jurusan');
        $this->db->join('tbl_ruangan', 'tbl_murid.ruangan = tbl_ruangan.id_ruangan');
        $this->db->where('status', 'belum lunas');
        $this->db->or_where('status', 'Tunggakan 1');
        $this->db->or_where('status', 'Tunggakan 2');
        $query = $this->db->get();
        return $query;
    }

    public function getTunggakan1()
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->join('tbl_kelas', 'tbl_murid.id_kelas = tbl_kelas.id_kelas');
        $this->db->join('tbl_jurusan', 'tbl_murid.id_jurusan = tbl_jurusan.id_jurusan');
        $this->db->join('tbl_ruangan', 'tbl_murid.ruangan = tbl_ruangan.id_ruangan');
        $this->db->where('tbl_murid.status', 'Tunggakan 1');
        $query = $this->db->get();
        return $query;
    }

    public function getLunas()
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->join('tbl_kelas', 'tbl_murid.id_kelas = tbl_kelas.id_kelas');
        $this->db->join('tbl_jurusan', 'tbl_murid.id_jurusan = tbl_jurusan.id_jurusan');
        $this->db->join('tbl_ruangan', 'tbl_murid.ruangan = tbl_ruangan.id_ruangan');
        $this->db->where('tbl_murid.status', 'Lunas');
        $query = $this->db->get();
        return $query;
    }
    
    public function getTunggakan2()
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->join('tbl_kelas', 'tbl_murid.id_kelas = tbl_kelas.id_kelas');
        $this->db->join('tbl_jurusan', 'tbl_murid.id_jurusan = tbl_jurusan.id_jurusan');
        $this->db->join('tbl_ruangan', 'tbl_murid.ruangan = tbl_ruangan.id_ruangan');
        $this->db->where('tbl_murid.status', 'Tunggakan 2');
        $query = $this->db->get();
        return $query;
    }

    public function updateStatus($nis)
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query;
    }

    public function insertMurid($data)
    {
        $this->db->insert('tbl_murid', $data);
    }

    public function editMurid($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateMurid($where, $data, $table)
    {
        $update = $this->db->get_where($table, $where);
        $this->db->update($update, $data);
    }

    public function deleteMurid($nis)
    {
        $this->db->where('nis', $nis);
        $this->db->delete('tbl_murid');
        return true;
    }

    public function detailMurid()
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->join('tbl_kelas', 'tbl_murid.id_kelas = tbl_kelas.id_kelas');
        $this->db->join('tbl_jurusan', 'tbl_murid.id_jurusan = tbl_jurusan.id_jurusan');
        $this->db->join('tbl_ruangan', 'tbl_murid.ruangan = tbl_ruangan.id_ruangan');
        $query = $this->db->get();
        return $query;
    }

    public function detailMurid2($nis)
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query;
    }

    public function getJumlahMurid()
    {
        $query = $this->db->query("SELECT COUNT(nis) as nis FROM tbl_murid");
        return $query;
    }

    public function getJumlahLunas()
    {
        $query = $this->db->query("SELECT COUNT(nis) as nis FROM tbl_murid WHERE status = 'lunas'");
        return $query;
    }

    public function getJumlahNunggak()
    {
        $query = $this->db->query("SELECT COUNT(nis) as nis FROM tbl_murid WHERE status = 'belum lunas' or status = 'tunggakan 1' or status = 'tunggakan 2'");
        return $query;
    }

    public function getNoOrtu($nis)
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query;
    }

    function resetStatus()
    {
        $this->db->select('status');
        $this->db->from('tbl_murid');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
