<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_barang extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        // load halaman model jenis_barang
        $this->load->model('Jenis_Barang_Model');
    }

    public function index()
    {
        // memanggil fungsi get_data pada halaman jenis_barang_Model dan
        // mengirimkan data array 
        $data['jenis_barang'] = $this->Jenis_Barang_Model->get_data();

        //  load halaman template dan jenis_barang/jenis_barang_data yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'Produk/Jenis_barang/jenis_barang_data', $data);
    }

    // method tambah data
    public function add()
    {
        // disini kita perlu melempar data yang isi nya null, karena dia tambah. jika dia edit, maka dia akan menimpa data baru

        // inisialisasi class yang berisi data null tiap tiap isi nya
        $jenis_barang = new stdClass();

        // sesuaikan dengan kolom/field yang ada di database
        $jenis_barang->id_jenis_brg = null;
        $jenis_barang->nama_jenis_brg = null;

        // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
        $data = array(
            'page' => 'add',
            'row'  => $jenis_barang
        );

        //  load halaman template dan jenis_barang/jenis_barang_form yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'Produk/Jenis_barang/jenis_barang_form', $data);
    }

    // method process
    public function process()
    {
        // $post menampung semua inputan
        $post = $this->input->post(null, TRUE);

        // jika tombol dengan name 'add' ditekan, maka lakukan proses lanjut ke 'method add' pada model jenis_barang dengan memberikan parameter $post yang berisi inputan
        if (isset($_POST['add'])) {

            // Menerima lempar data dari $post diatas dan memanggil method add
            $this->Jenis_Barang_Model->add($post);
        }
        // jika tombol edit yang di tekan maka panggil 'method edit'
        else if (isset($_POST['edit'])) {
            // Menerima lempar data dari $post diatas dan memanggil method edit
            $this->Jenis_Barang_Model->edit($post);
        }

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil di Simpan');
        }
        redirect('jenis_barang');
    }

    // method edit akan menerima parameter $id dari URL yang dikirimkan
    public function edit($id)
    {
        // mamnggil fungsi get yang berisi pengambilan data dari database dengan where id_jenis_barang
        // $id didapat dari parameter method edit diatas
        $query = $this->Jenis_Barang_Model->get_data($id);

        if ($query->num_rows() > 0) {

            // mencetak query nya satu baris dengan fungsi row
            $jenis_barang = $query->row();

            // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
            $data = array(
                'page' => 'edit',
                'row'  => $jenis_barang
            );

            //  load halaman template dan jenis_barang/jenis_barang_form yang ada di views
            //  mengirimkan paramater $data
            $this->template->load('template', 'Produk/Jenis_barang/jenis_barang_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('jenis_barang') . "' </script>";
        }
    }

    // method hapus data mengirimkan sebuah parameter $id
    public function delete($id)
    {

        // mengirimkan $id ke model lalu di proses di method hapus
        $this->Jenis_Barang_Model->hapus($id);

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data Berhasil di Hapus');
        }
        redirect('jenis_barang');
    }
}
