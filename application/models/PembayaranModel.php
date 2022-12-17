<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranModel extends CI_Model
{
    public function getPembayaran()
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $query = $this->db->get();
        return $query;
    }
    
    public function getLaporanPembayaran($tahunAjaran)
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->like('tahunAjaran', $tahunAjaran);
        $query = $this->db->get();
        return $query;
    }

    public function insertPembayaran($data)
    {
        $this->db->insert('tbl_pembayaran', $data);
    }

    public function detailPembayaran($nis)
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query;
    }

    public function getMuridDetail($nis)
    {
        $this->db->select('*');
        $this->db->from('tbl_murid');
        $this->db->join('tbl_jurusan', 'tbl_murid.id_jurusan = tbl_jurusan.id_jurusan');
        $this->db->join('tbl_kelas', 'tbl_murid.id_kelas = tbl_kelas.id_kelas');
        $this->db->join('tbl_ruangan', 'tbl_murid.ruangan = tbl_ruangan.id_ruangan');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query;
    }

    public function getLaporan($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }
    
    public function getTahunAjaran()
    {
        $this->db->distinct('tahunAjaran');
        $this->db->from('tbl_pembayaran');
        $query = $this->db->get();
        return $query;
    }

    public function updateLaporan($where, $data, $tabel)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function deleteLp($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_pembayaran');
        return true;
    }

    public function getNis($id)
    {
        $this->db->select('nis');
        $this->db->where('id', $id);
        $nis = $this->db->get('tbl_pembayaran');
        if ($nis->num_rows() > 0) {
            return $nis->row()->nis;
        }
        return false;
    }
    
}

