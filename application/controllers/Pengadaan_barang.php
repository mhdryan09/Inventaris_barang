<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengadaan_barang extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        //load data di modal Barang, Unit dan Pengadaan
        $this->load->model(['Barang_Model', 'Unit_Model', 'Pengadaan_Model']);
    }

    public function barang_pengadaan_data()
    {
        $data['row'] = $this->Pengadaan_Model->ambil_pengadaan_brg()->result();

        $this->template->load('template', 'transaksi/barang_pengadaan/barang_pengadaan_data', $data);
    }

    public function barang_pengadaan_tambah()
    {
        // mengambil data yang sudah di joinkan di method get_data
        $barang = $this->Barang_Model->get_data()->result();

        // mengambil data unit
        $unit = $this->Unit_Model->get_data()->result();

        // melakukan pengisian data, dan nanti akan dilempar untuk dipakai di views
        $data = [
            'barang' => $barang,
            'unit'  => $unit
        ];
        $this->template->load('template', 'transaksi/barang_pengadaan/barang_pengadaan_form', $data);
    }

    public function process()
    {
        if (isset($_POST['barang_ada'])) {

            // mengambil semua inputan yang ada di form
            $post = $this->input->post(null, TRUE);

            $this->Pengadaan_Model->tambah_barang_pengadaan($post);

            // pengecekan jika data berhasil di hapus, artinya bernilai 1
            if ($this->db->affected_rows() > 0) {

                // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
                $this->session->set_flashdata('success', 'Data Stock berhasil di Simpan');
            }
            // pindah halaman
            redirect('pengadaan_barang/barang_pengadaan');
        }
    }

    public function barang_pengadaan_hapus()
    {
        // 4 diambil karena urutan id stok itu ke 4, di mulai dari controller/method/method/parameter/parameter
        $id_pengadaan_brg = $this->uri->segment(4);
        $id_barang  = $this->uri->segment(5);

        // memanggil method delete pada stock model berdasarkan id stock
        $this->Pengadaan_Model->delete($id_pengadaan_brg);

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {

            // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
            $this->session->set_flashdata('success', 'Data Stock berhasil di Simpan');
        }
        // pindah halaman
        redirect('pengadaan_barang/barang_pengadaan');
    }
}
