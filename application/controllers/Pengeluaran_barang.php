<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_barang extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        //load data di modal barang, supplier dan Penerimaan
        $this->load->model(['Barang_Model', 'Unit_Model', 'Pengeluaran_Model']);
    }

    public function barang_keluar_data()
    {
        $data['row'] = $this->Pengeluaran_Model->ambil_pengeluaran_brg()->result();

        $this->template->load('template', 'transaksi/barang_keluar/barang_keluar_data', $data);
    }

    public function barang_keluar_tambah()
    {
        // mengambil data yang sudah di joinkan di method get_data
        $barang = $this->Barang_Model->get_data()->result();

        // mengambil data supplier 
        $unit = $this->Unit_Model->get_data()->result();

        // melakukan pengisian data, dan nanti akan dilempar untuk dipakai di views
        $data = [
            'barang'      => $barang,
            'unit'  => $unit
        ];
        $this->template->load('template', 'transaksi/barang_keluar/barang_keluar_form', $data);
    }

    public function process()
    {
        if (isset($_POST['barang_keluar'])) {

            // mengambil semua inputan yang ada di form
            $post = $this->input->post(null, TRUE);

            $this->Pengeluaran_Model->tambah_barang_keluar($post);

            // memaanggil inputan yang ada di model, dan fungsi update_barang_keluar 
            $this->Barang_Model->update_barang_keluar($post);

            // pengecekan jika data berhasil di hapus, artinya bernilai 1
            if ($this->db->affected_rows() > 0) {

                // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
                $this->session->set_flashdata('success', 'Data Stock berhasil di Simpan');
            }
            // pindah halaman
            redirect('pengeluaran_barang/barang_keluar');
        }
    }


    public function barang_keluar_hapus()
    {
        // 4 diambil karena urutan id stok itu ke 4, di mulai dari controller/method/method/parameter/parameter
        $id_pengeluaran_brg = $this->uri->segment(4);
        $id_barang  = $this->uri->segment(5);

        // mengambil data stok berdasarkan id dan mengambil data qty
        $jumlah = $this->Pengeluaran_Model->get_data($id_pengeluaran_brg)->row()->jumlah;

        // melempar data qty id item
        $data = [
            'jumlah' => $jumlah,
            'id_barang' => $id_barang
        ];

        // memanggil update stok out di item model
        $this->Barang_Model->update_barang_masuk($data);

        // memanggil method delete pada stock model berdasarkan id stock
        $this->Pengeluaran_Model->delete($id_pengeluaran_brg);

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {

            // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
            $this->session->set_flashdata('success', 'Data Stock berhasil di Simpan');
        }
        // pindah halaman
        redirect('pengeluaran_barang/barang_keluar');
    }
}
