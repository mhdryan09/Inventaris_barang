<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_barang extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        //load data di modal barang, supplier dan Penerimaan
        $this->load->model(['Barang_Model', 'Supplier_Model', 'Penerimaan_Model']);
    }

    public function barang_masuk_data()
    {
        $data['row'] = $this->Penerimaan_Model->ambil_penerimaan_brg()->result();
        //$data['row'] = $this->db->query("select tb_penerimaan_brg.id_penerimaan_brg, tb_barang.kode_barang, tb_barang.nama_barang as barang, tb_barang.stok as stok, tb_penerimaan_brg.jumlah as jumlah, jumlah, harga, tanggal, deskripsi, tb_supplier.name as supplier, tb_barang.id_barang from tb_penerimaan_brg")

        $this->template->load('template', 'transaksi/barang_masuk/barang_masuk_data', $data);
    }

    public function barang_masuk_tambah()
    {
        // mengambil data yang sudah di joinkan di method get_data
        $barang = $this->Barang_Model->get_data()->result();

        // mengambil data supplier 
        $supplier = $this->Supplier_Model->get_data()->result();

        // melakukan pengisian data, dan nanti akan dilempar untuk dipakai di views
        $data = [
            'barang'      => $barang,
            'supplier'  => $supplier
        ];
        $this->template->load('template', 'transaksi/barang_masuk/barang_masuk_form', $data);
    }

    public function process()
    {
        if (isset($_POST['tambah_barang'])) {

            // mengambil semua inputan yang ada di form
            $post = $this->input->post(null, TRUE);

            $this->Penerimaan_Model->tambah_barang_masuk($post);

            // memaanggil inputan yang ada di model, dan fungsi add_stock_in 
            $this->Barang_Model->update_barang_masuk($post);

            // pengecekan jika data berhasil di hapus, artinya bernilai 1
            if ($this->db->affected_rows() > 0) {

                // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
                $this->session->set_flashdata('success', 'Data Stock berhasil di Simpan');
            }
            // pindah halaman
            redirect('penerimaan_barang/barang_masuk');
        }
    }

    public function barang_masuk_hapus()
    {
        // 4 diambil karena urutan id stok itu ke 4, di mulai dari controller/method/method/parameter/parameter
        $id_penerimaan_brg = $this->uri->segment(4);
        $id_barang  = $this->uri->segment(5);

        // mengambil data stok berdasarkan id dan mengambil data qty
        $jumlah = $this->Penerimaan_Model->get_data($id_penerimaan_brg)->row()->jumlah;

        // melempar data qty id item
        $data = [
            'jumlah' => $jumlah,
            'id_barang' => $id_barang
        ];

        // memanggil update stok out di item model
        $this->Barang_Model->update_barang_keluar($data);

        // memanggil method delete pada stock model berdasarkan id stock
        $this->Penerimaan_Model->delete($id_penerimaan_brg);

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {

            // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
            $this->session->set_flashdata('success', 'Data Stock berhasil di Simpan');
        }
        // pindah halaman
        redirect('penerimaan_barang/barang_masuk');
    }
}
