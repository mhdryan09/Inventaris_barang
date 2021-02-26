<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_barang extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        // load halaman model satuan_barang
        $this->load->model('Satuan_Barang_Model');
    }

    public function index()
    {
        // memanggil fungsi get_data pada halaman satuan_barang_Model dan
        // mengirimkan data array 
        $data['satuan_barang'] = $this->Satuan_Barang_Model->get_data();

        //  load halaman template dan satuan_barang/satuan_barang_data yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'Produk/satuan_barang/satuan_barang_data', $data);
    }

    // method tambah data
    public function add()
    {
        // disini kita perlu melempar data yang isi nya null, karena dia tambah. jika dia edit, maka dia akan menimpa data baru

        // inisialisasi class yang berisi data null tiap tiap isi nya
        $satuan_barang = new stdClass();

        // sesuaikan dengan kolom/field yang ada di database
        $satuan_barang->id_satuan_brg = null;
        $satuan_barang->nama_satuan_brg = null;

        // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
        $data = array(
            'page' => 'add',
            'row'  => $satuan_barang
        );

        //  load halaman template dan satuan_barang/satuan_barang_form yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'Produk/satuan_barang/satuan_barang_form', $data);
    }

    // method process
    public function process()
    {
        // $post menampung semua inputan
        $post = $this->input->post(null, TRUE);

        // jika tombol dengan name 'add' ditekan, maka lakukan proses lanjut ke 'method add' pada model satuan_barang dengan memberikan parameter $post yang berisi inputan
        if (isset($_POST['add'])) {

            // Menerima lempar data dari $post diatas dan memanggil method add
            $this->Satuan_Barang_Model->add($post);
        }
        // jika tombol edit yang di tekan maka panggil 'method edit'
        else if (isset($_POST['edit'])) {
            // Menerima lempar data dari $post diatas dan memanggil method edit
            $this->Satuan_Barang_Model->edit($post);
        }

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil di Simpan');
        }
        redirect('satuan_barang');
    }

    // method edit akan menerima parameter $id dari URL yang dikirimkan
    public function edit($id)
    {
        // mamnggil fungsi get yang berisi pengambilan data dari database dengan where id_satuan_barang
        // $id didapat dari parameter method edit diatas
        $query = $this->Satuan_Barang_Model->get_data($id);

        if ($query->num_rows() > 0) {

            // mencetak query nya satu baris dengan fungsi row
            $satuan_barang = $query->row();

            // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
            $data = array(
                'page' => 'edit',
                'row'  => $satuan_barang
            );

            //  load halaman template dan satuan_barang/satuan_barang_form yang ada di views
            //  mengirimkan paramater $data
            $this->template->load('template', 'Produk/satuan_barang/satuan_barang_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('satuan_barang') . "' </script>";
        }
    }

    // method hapus data mengirimkan sebuah parameter $id
    public function delete($id)
    {

        // mengirimkan $id ke model lalu di proses di method hapus
        $this->Satuan_Barang_Model->hapus($id);

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data Berhasil di Hapus');
        }
        redirect('satuan_barang');
    }
}
