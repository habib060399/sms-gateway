<?php
defined('BASEPATH') or exit('No direct script access allowed');
//include "application/controllers/Fungsi.php";

class AdminModel extends CI_Model
{
    public function inputMurid($data)
    {
        $this->db->insert('tbl_murid', $data);
    }
}
