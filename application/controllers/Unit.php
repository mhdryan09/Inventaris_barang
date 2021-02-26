<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        // load halaman model unit
        $this->load->model('Unit_Model');
    }

    public function index()
    {
        // memanggil fungsi get_data pada halaman unit_Model dan
        // mengirimkan data array 
        $data['unit'] = $this->Unit_Model->get_data();

        //  load halaman template dan unit/unit_data yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'unit/unit_data', $data);
    }

    // method tambah data
    public function add()
    {
        // disini kita perlu melempar data yang isi nya null, karena dia tambah. jika dia edit, maka dia akan menimpa data baru

        // inisialisasi class yang berisi data null tiap tiap isi nya
        $unit = new stdClass();

        // sesuaikan dengan kolom/field yang ada di database
        $unit->id_unit = null;
        $unit->nama_unit = null;
        $unit->nama_penanggung_jawab = null;

        // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
        $data = array(
            'page' => 'add',
            'row'  => $unit
        );

        //  load halaman template dan unit/unit_form yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'unit/unit_form', $data);
    }

    // method process
    public function process()
    {
        // $post menampung semua inputan
        $post = $this->input->post(null, TRUE);

        // jika tombol dengan name 'add' ditekan, maka lakukan proses lanjut ke 'method add' pada model unit dengan memberikan parameter $post yang berisi inputan
        if (isset($_POST['add'])) {

            // Menerima lempar data dari $post diatas dan memanggil method add
            $this->Unit_Model->add($post);
        }
        // jika tombol edit yang di tekan maka panggil 'method edit'
        else if (isset($_POST['edit'])) {
            // Menerima lempar data dari $post diatas dan memanggil method edit
            $this->Unit_Model->edit($post);
        }

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil di Simpan');
        }
        echo "<script>window.location='" . site_url('unit') . "' </script>";
    }

    // method edit akan menerima parameter $id dari URL yang dikirimkan
    public function edit($id)
    {
        // mamnggil fungsi get yang berisi pengambilan data dari database dengan where id_unit
        // $id didapat dari parameter method edit diatas
        $query = $this->Unit_Model->get_data($id);

        if ($query->num_rows() > 0) {

            // mencetak query nya satu baris dengan fungsi row
            $unit = $query->row();

            // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
            $data = array(
                'page' => 'edit',
                'row'  => $unit
            );

            //  load halaman template dan unit/unit_form yang ada di views
            //  mengirimkan paramater $data
            $this->template->load('template', 'unit/unit_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('unit') . "' </script>";
        }
    }

    // method hapus data mengirimkan sebuah parameter $id
    public function delete($id)
    {

        // mengirimkan $id ke model lalu di proses di method hapus
        $this->Unit_Model->hapus($id);

        $error = $this->db->error();

        if ($error['code'] != 0) {
            echo "<script> alert('Data tidak dapat dihapus (sudah berelasi)'); </script>";
        } else {
            $this->session->set_flashdata('danger', 'Data Berhasil di Hapus');
        }
        echo "<script>window.location='" . site_url('unit') . "' </script>";
    }
}
