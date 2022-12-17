<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url("auth"));
        }
        $this->load->library('form_validation');
        // $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('MuridModel');
        $this->load->model('JurusanModel');
        $this->load->model('KelasModel');
        $this->load->model('RuanganModel');
        $this->load->model('PembayaranModel');
        $this->load->model('PieModel');
        $this->load->helper("id_helper");
    }

    public function index()
    {
        $data['murid'] = $this->MuridModel->getJumlahMurid();
        $data['jurusan'] = $this->JurusanModel->getJumlahJurusan();
        $data['lunas'] = $this->MuridModel->getJumlahLunas();
        $data['nunggak'] = $this->MuridModel->getJumlahNunggak();
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/template/footer');
    }

    public function inputMurid()
    {
        $data['ruangan'] = $this->RuanganModel->getRuangan();
        $data['kelas'] = $this->KelasModel->getKelas();
        $data['record'] = $this->JurusanModel->getJkr();
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/inputMurid', $data);
        $this->load->view('admin/template/footer');
    }

    public function insertMurid()
    {
        $data['ruangan'] = $this->RuanganModel->getRuangan();
        $data['kelas'] = $this->KelasModel->getKelas();
        $data['record'] = $this->JurusanModel->getJkr();

        $this->form_validation->set_rules('noinduk', 'Nomor Induk Siswa', 'required|numeric', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Induk siswa Harus Diisi </div>', 'numeric' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Induk Siswa Harus Berupa Angka</div>'));
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required|alpha_numeric_spaces', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Nama siswa Harus Diisi</div>', 'alpha_numeric_spaces' => '<div class="invalid-feedback" style="margin-top:-10px;">Nama Siswa Harus Berupa Character</div>'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Alamat Harus Diisi</div>'));
        $this->form_validation->set_rules('agama', 'Agama', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Agama Harus Diisi</div>'));
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Jenis Kelamin Harus Diisi</div>'));
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Jurusan Harus Diisi</div>'));
        $this->form_validation->set_rules('kls', 'Kelas', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Kelas Harus Diisi</div>'));
        $this->form_validation->set_rules('rng', 'Ruangan', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Ruangan Harus Diisi</div>'));
        $this->form_validation->set_rules('tlfortu', 'Nomor Telepon Orang Tua', 'required|numeric', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Induk siswa Harus Diisi</div>', 'numeric' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Telepon Harus Berupa Angka</div>'));

        if ($this->form_validation->run() == TRUE) {
            $noinduk = $this->input->post('noinduk');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $agama = $this->input->post('agama');
            $jenkel = $this->input->post('jenkel');
            $jurusan = $this->input->post('jurusan');
            $kelas = $this->input->post('kls');
            $ruangan = $this->input->post('rng');
            $telefonortu = $this->input->post('tlfortu');


            $data = array(
                'nis' => $noinduk,
                'nama' => $nama,
                'agama' => $agama,
                'kelamin' => $jenkel,
                'alamat' => $alamat,
                'telp_orangtua' => $telefonortu,
                'id_jurusan' => $jurusan,
                'ruangan' => $ruangan,
                'status' => "belum lunas",
                'id_kelas' => $kelas
            );

            $this->MuridModel->insertMurid($data);
            redirect(base_url('Admin/inputMurid'));
        } else {
            $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('admin/template/header', $session);
            $this->load->view('admin/inputMurid', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function insertPembayaran()
    {

        $tanggal = $this->input->post('tanggal');
        $noinduk = $this->input->post('noinduk');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $kelas = $this->input->post('kelas');
        $semester = $this->input->post('semester');
        $jumlah = $this->input->post('jumlah');
        $tahunAjaran = $this->input->post('tahunAjaran');

        $data = array(
            'tanggal' => $tanggal,
            'nis' => $noinduk,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'semester' => $semester,
            'kelas' => $kelas,
            'jumlah' => $jumlah,
            'tahunAjaran' => $tahunAjaran
        );

        $this->PembayaranModel->insertPembayaran($data);
        $this->updateStatus($noinduk);
        redirect(base_url('Admin/inputPembayaran'));
    }

    public function editMurid($nis)
    {
        $data['ruangan'] = $this->RuanganModel->getRuangan();
        $data['kelas'] = $this->KelasModel->getKelas();
        $data['record'] = $this->JurusanModel->getJkr();

        $where = array('nis' => $nis);
        $data['murid'] = $this->MuridModel->editMurid($where, 'tbl_murid');
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/editMurid', $data);
        $this->load->view('admin/template/footer');
    }

    public function updateMurid()
    {
        $data['ruangan'] = $this->RuanganModel->getRuangan();
        $data['kelas'] = $this->KelasModel->getKelas();
        $data['record'] = $this->JurusanModel->getJkr();



        $this->form_validation->set_rules('noinduk', 'Nomor Induk Siswa', 'required|numeric', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Induk siswa Harus Diisi </div>', 'numeric' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Induk Siswa Harus Berupa Angka</div>'));
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required|alpha_numeric_spaces', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Nama siswa Harus Diisi</div>', 'alpha_numeric_spaces' => '<div class="invalid-feedback" style="margin-top:-10px;">Nama Siswa Harus Berupa Character</div>'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Alamat Harus Diisi</div>'));
        $this->form_validation->set_rules('agama', 'Agama', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Agama Harus Diisi</div>'));
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Jenis Kelamin Harus Diisi</div>'));
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Jurusan Harus Diisi</div>'));
        $this->form_validation->set_rules('kls', 'Kelas', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Kelas Harus Diisi</div>'));
        $this->form_validation->set_rules('rng', 'Ruangan', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Ruangan Harus Diisi</div>'));
        $this->form_validation->set_rules('tlfortu', 'Nomor Telepon Orang Tua', 'required|numeric', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Induk siswa Harus Diisi</div>', 'numeric' => '<div class="invalid-feedback" style="margin-top:-10px;">Nomor Telepon Harus Berupa Angka</div>'));

        if ($this->form_validation->run() == TRUE) {
            $noinduk = $this->input->post('noinduk');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $agama = $this->input->post('agama');
            $jenkel = $this->input->post('jenkel');
            $jurusan = $this->input->post('jurusan');
            $kelas = $this->input->post('kls');
            $ruangan = $this->input->post('rng');
            $telefonortu = $this->input->post('tlfortu');
            $tahunAjaran = $this->input->post('tahunAjaran');


            $data = array(
                'nis' => $noinduk,
                'nama' => $nama,
                'agama' => $agama,
                'kelamin' => $jenkel,
                'alamat' => $alamat,
                'telp_orangtua' => $telefonortu,
                'id_jurusan' => $jurusan,
                'ruangan' => $ruangan,
                'status' => "belum lunas",
                'id_kelas' => $kelas,
                'tahunAjaran' => $tahunAjaran
            );

            //var_dump($data);
            $this->db->set($data);
            $this->db->where('nis', $noinduk);
            $this->db->update('tbl_murid');
            // $this->MuridModel->updateMurid($where,$data, 'tbl_murid');
            redirect(base_url('Admin/lihatMurid'));
        } else {
            $noinduk = $this->input->post('noinduk');
            $data['murid'] = $this->MuridModel->detailMurid2($noinduk);
            $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('admin/template/header', $session);
            $this->load->view('admin/editMurid', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function deleteMurid($nis)
    {
        $this->MuridModel->deleteMurid($nis);
        redirect('admin/lihatMurid');
    }


    public function inputKelas()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/inputKelas');
        $this->load->view('admin/template/footer');
    }

    public function insertKelas()
    {
        $idkl = $this->input->post('idkl');
        $namaKelas = $this->input->post('namakelas');
        $data = array(
            'id_kelas' => $idkl,
            'nama_kelas' => $namaKelas
        );
        //  var_dump($data);
        $this->KelasModel->insertKelas($data);
        redirect(base_url('Admin/inputKelas'));
    }

    public function inputRuangan()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['kelas'] = $this->KelasModel->getKelas();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/inputRuangan', $data);
        $this->load->view('admin/template/footer');
    }

    public function insertRuangan()
    {
        $idRuangan = $this->input->post('idRuangan');
        $namaRuangan = $this->input->post('namaRuangan');
        $data = array(
            'id_ruangan' => $idRuangan,
            'nama_ruangan' => $namaRuangan
        );
        //  var_dump($data);
        $this->RuanganModel->insertRuangan($data);
        redirect(base_url('admin/inputRuangan'));
    }

    public function updateStatus($nis)
    {
        $murid = $this->MuridModel->updateStatus($nis);
        foreach ($murid->result_array() as $m) {
            if ($m['status'] == 'belum lunas') {
                $this->db->set('status', 'lunas');
                $this->db->where('nis', $nis);
                $this->db->update('tbl_murid');
            } elseif ($m['status'] == 'Tunggakan 1') {
                $this->db->set('status', 'belum lunas');
                $this->db->where('nis', $nis);
                $this->db->update('tbl_murid');
            } elseif ($m['status'] == 'Tunggakan 2') {
                $this->db->set('status', 'Tunggakan 1');
                $this->db->where('nis', $nis);
                $this->db->update('tbl_murid');
            }
        }

        function sendsms($to, $msg)
        {
            $url = "https://websms.co.id/api/smsgateway?token=39cfce1c5f367f06ef5068cd6b682b1a&to=$to&msg=$msg";
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

        $murid = $this->MuridModel->getNoOrtu($nis);
        foreach ($murid->result_array() as $m) {
            $to = $m['telp_orangtua'];
            $nama = urlencode($m['nama']);
            $pesan = "Hallo!%20Atas%20nama%20" . $nama . "%20sudah%20melunasi%20pembayaran%20semester%20ini!%20terima%20kasih";
            // str_replace(" ", "%20", $pesan);
            //var_dump($to);
            sendsms($to, $pesan);
        }

        // $data['murid'] = $this->MuridModel->getMurid2();
        // $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        // $this->load->view('admin/template/header', $session);
        // $this->load->view('admin/inputPembayaran', $data);
        // $this->load->view('admin/template/footer');
    }


    public function inputJurusan()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/inputJurusan');
        $this->load->view('admin/template/footer');
    }

    public function insertJurusan()
    {
        $this->form_validation->set_rules('idjr', 'ID Jurusan', 'required');
        $this->form_validation->set_rules('namaJurusan', 'Nama Jurusan', 'required', array('required' => '<div class="invalid-feedback" style="margin-top:-10px;">Nama Jurusan Harus Diisi</div>'));

        if ($this->form_validation->run() == TRUE) {
            $idjr = $this->input->post('idjr');
            $namaJurusan = $this->input->post('namaJurusan');
            $data = array(
                'id_jurusan' => $idjr,
                'nama_jurusan' => $namaJurusan,
            );
            //  var_dump($data);
            $this->JurusanModel->insertJurusan($data);
            redirect(base_url('Admin/inputJurusan'));
        } else {
            $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('admin/template/header', $session);
            $this->load->view('admin/inputJurusan');
            $this->load->view('admin/template/footer');
        }
    }

    public function inputPembayaran()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->MuridModel->getMurid2();

        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/inputPembayaran', $data);
        $this->load->view('admin/template/footer');
    }

    public function editPembayaran($nis)
    {
        $data['ruangan'] = $this->RuanganModel->getRuangan();
        $data['kelas'] = $this->KelasModel->getKelas();
        $data['record'] = $this->JurusanModel->getJkr();

        $data['murid'] = $this->PembayaranModel->getMuridDetail($nis);
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/editPembayaran', $data);
        $this->load->view('admin/template/footer');
    }

    public function inputTunggakan2()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['murid'] = $this->MuridModel->getTunggakan2();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/tunggakan2', $data);
        $this->load->view('admin/template/footer');
    }
    
    public function inputLunas()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['murid'] = $this->MuridModel->getLunas();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/lunas', $data);
        $this->load->view('admin/template/footer');
    }

    public function inputTunggakan1()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['murid'] = $this->MuridModel->getTunggakan1();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/tunggakan1', $data);
        $this->load->view('admin/template/footer');
    }

    public function lihatMurid()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['tbl_murid'] = $this->MuridModel->detailMurid();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/lihatMurid', $data);
        $this->load->view('admin/template/footer');
    }
    public function klsJrsn()
    {
        $data['graph'] = $this->PieModel->getPieKelas();
        $data['jum'] = $this->PieModel->getJum();
        $data['jurusan'] = $this->PieModel->getPieJurusan();
        $data['jumjurusan'] = $this->PieModel->getJumJurusan();
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/datakelas', $data);
        $this->load->view('admin/template/footer');
    }

    public function backup()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/backup');
        $this->load->view('admin/template/footer');
    }

    public function prosesbackup()
    {
        $this->load->helper('backup1_helper');
    }

    public function broadcast()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/broadcast');
        $this->load->view('admin/template/footer');
    }

    public function restore()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/restore');
        $this->load->view('admin/template/footer');
    }

    public function prosesrestore()
    {
        $this->load->helper('Restore_helper');
        redirect(base_url('admin/restore'));
    }

    public function lpPembayaran()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $tahunAjaran = $this->input->post('tahunAjaran');
        $data['murid'] = $this->PembayaranModel->getPembayaran();
        $data['tahun'] = $this->PembayaranModel->getTahunAjaran();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/lpPembayaran', $data);
        $this->load->view('admin/template/footer');
    }

    public function printLaporan()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $tahunAjaran = $this->input->post('tahunAjaran');
        $data['murid'] = $this->PembayaranModel->getLaporanPembayaran($tahunAjaran);
        $this->load->view('admin/printLaporan', $data);
        $this->load->view('admin/template/footer');
    }

    public function printMurid()
    {
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $data['tbl_murid'] = $this->MuridModel->detailMurid();
        $this->load->view('admin/printMurid', $data);
        $this->load->view('admin/template/footer');
    }

    public function resetStatus()
    {
        $this->tunggakan();
        $this->belum();
        $this->lunas();

        redirect(base_url('admin/index'));
    }

    public function tunggakan()
    {

        $this->db->set('status', 'Tunggakan 2');
        $this->db->where('status', 'Tunggakan 1');
        $this->db->update('tbl_murid');
    }

    public function belum()
    {

        $this->db->set('status', 'Tunggakan 1');
        $this->db->where('status', 'belum lunas');
        $this->db->update('tbl_murid');
    }

    public function lunas()
    {
        $this->db->set('status', 'belum lunas');
        $this->db->where('status', 'lunas');
        $this->db->update('tbl_murid');
    }

    public function editLaporan($id)
    {
        $data['murid'] = $this->PembayaranModel->getLaporan($id);
        $session['role'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/template/header', $session);
        $this->load->view('admin/editLaporan', $data);
        $this->load->view('admin/template/footer');
    }

    public function updateLaporan()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $noinduk = $this->input->post('noinduk');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $jurusan = $this->input->post('jurusan');
        $semester = $this->input->post('semester');
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'tanggal' => $tanggal,
            'nis' => $noinduk,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'semester' => $semester,
            'kelas' => $kelas,
            'jumlah' => $jumlah
        );

        $where = array(
            'nis' => $noinduk
        );

        $this->PembayaranModel->updateLaporan($where, $data, 'tbl_pembayaran');
        redirect(base_url('Admin/lpPembayaran'));
    }

    public function deletePembayaran($id)
    {
        $nis = $this->PembayaranModel->getNis($id);


        $this->tunggakanid($nis);
        $this->belumid($nis);
        $this->lunasid($nis);

        $this->PembayaranModel->deleteLp($id);
        redirect('admin/lpPembayaran');
    }

    public function tunggakanid($nis)
    {

        $this->db->set('status', 'Tunggakan 2');
        $this->db->where('status', 'Tunggakan 1');
        $this->db->where('nis', $nis);
        $this->db->update('tbl_murid');
    }

    public function belumid($nis)
    {

        $this->db->set('status', 'Tunggakan 1');
        $this->db->where('status', 'belum lunas');
        $this->db->where('nis', $nis);
        $this->db->update('tbl_murid');
    }

    public function lunasid($nis)
    {
        $this->db->set('status', 'belum lunas');
        $this->db->where('status', 'lunas');
        $this->db->where('nis', $nis);
        $this->db->update('tbl_murid');
    }
}
