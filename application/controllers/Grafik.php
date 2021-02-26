<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        // load halaman model barang
        $this->load->model(['Barang_Model', 'Penerimaan_Model', 'Pengeluaran_Model']);
    }

    // public function grafik_barang_masuk_data()
    // {
    //     $data['row'] = $this->Penerimaan_Model->ambil_penerimaan_brg()->result();

    //     $this->template->load('template', 'dashboard', $data);
    //     // $this->load->view('dashboard', $data);
    // }

    // public function grafik_barang_keluar_data()
    // {
    //     $data['row'] = $this->Pengeluaran_Model->ambil_pengeluaran_brg()->result();

    //     $this->template->load('template', 'dashboard', $data);
    // }

    // public function grafik_barang()
    // {
    //     // if ($data['row'] = $this->Penerimaan_Model->ambil_penerimaan_brg()->result()) {

    //     //     $this->template->load('template', 'dashboard', $data);
    //     // } else {
    //     $data2['row'] = $this->Pengeluaran_Model->ambil_pengeluaran_brg()->result();

    //     $this->template->load('template', 'dashboard', $data2);
    //     // }
    // }
}
