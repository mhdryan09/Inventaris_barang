<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        // load halaman model barang
        $this->load->model(['Barang_Model', 'Jenis_Barang_Model', 'Satuan_Barang_Model']);
    }

    // function get_ajax()
    // {
    //     $list = $this->Barang_Model->get_datatables();
    //     $data = array();
    //     $no = @$_POST['start'];
    //     foreach ($list as $item) {
    //         $no++;
    //         $row = array();
    //         $row[] = $no . ".";
    //         $row[] = $item->kode_barang . '<br><a href="' . site_url('barang/barcode_qrcode/' . $item->id_barang) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
    //         $row[] = $item->nama_barang;
    //         $row[] = $item->jenis_barang_name;
    //         $row[] = $item->satuan_barang_name;
    //         $row[] = indo_currency($item->harga);
    //         $row[] = $item->stok;
    //         // $row[] = $item->image != null ? '<img src="' . base_url('uploads/product/' . $item->image) . '" class="img" style="width:100px">' : null;
    //         // add html for action
    //         $row[] = '<a href="' . site_url('barang/edit/' . $item->id_barang) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
    //                <a href="' . site_url('barang/delete/' . $item->id_barang) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
    //         $data[] = $row;
    //     }
    //     $output = array(
    //         "draw" => @$_POST['draw'],
    //         "recordsTotal" => $this->Barang_Model->count_all(),
    //         "recordsFiltered" => $this->Barang_Model->count_filtered(),
    //         "data" => $data,
    //     );
    //     // output to json format
    //     echo json_encode($output);
    // }

    public function index()
    {
        // memanggil fungsi get_data pada halaman barang_Model dan
        // mengirimkan data array 
        $data['barang'] = $this->Barang_Model->get_data();

        //  load halaman template dan Produk/barang_data yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'Produk/Barang/barang_data', $data);
    }

    // method tambah data
    public function add()
    {
        // disini kita perlu melempar data yang isi nya null, karena dia tambah. jika dia edit, maka dia akan menimpa data baru

        // inisialisasi class yang berisi data null tiap tiap isi nya
        $barang = new stdClass();

        // sesuaikan dengan kolom/field yang ada di database
        $barang->id_barang = null;
        $barang->kode_barang = null;
        $barang->nama_barang = null;
        $barang->id_jenis_brg = null;
        $barang->id_satuan_brg = null;

        // ambil data category dari Jenis_Barang_Model
        $kuery_jenis_brg = $this->Jenis_Barang_Model->get_data();

        // ambil data category dari satuan_Barang_Model
        $kuery_satuan_brg = $this->Satuan_Barang_Model->get_data();

        // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
        $data = array(
            'page' => 'add',
            'row'  => $barang,
            'jenis_barang'  => $kuery_jenis_brg,
            'satuan_barang' => $kuery_satuan_brg
        );

        //  load halaman template dan Produk/barang_form yang ada di views
        //  mengirimkan paramater $data
        $this->template->load('template', 'Produk/Barang/barang_form', $data);
    }

    // method process
    public function process()
    {
        // $post menampung semua inputan
        $post = $this->input->post(null, TRUE);

        // jika tombol dengan name 'add' ditekan, maka lakukan proses lanjut ke 'method add' pada model barang dengan memberikan parameter $post yang berisi inputan
        if (isset($_POST['add'])) {

            if ($this->Barang_Model->check_kode_barang($post['kode_barang'])->num_rows() > 0) {

                $this->session->set_flashdata('error', "Barang $post[kode_barang] sudah dipakai barang lain");

                redirect('barang/add');
            } else {
                // Menerima lempar data dari $post diatas dan memanggil method add
                $this->Barang_Model->add($post);
            }
        }
        // jika tombol edit yang di tekan maka panggil 'method edit'
        else if (isset($_POST['edit'])) {

            if ($this->Barang_Model->check_kode_barang($post['kode_barang'], $post['id_barang'])->num_rows() > 0) {

                $this->session->set_flashdata('error', "Barang $post[kode_barang] sudah dipakai barang lain");

                redirect('barang/edit/' . $post['id_barang']);
            } else {
                // Menerima lempar data dari $post diatas dan memanggil method edit
                $this->Barang_Model->edit($post);
            }
        }

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil di Simpan');
        }
        redirect('barang');
    }

    // method edit akan menerima parameter $id dari URL yang dikirimkan
    public function edit($id)
    {
        // mamnggil fungsi get yang berisi pengambilan data dari database dengan where id_barang
        // $id didapat dari parameter method edit diatas
        $query = $this->Barang_Model->get_data($id);

        if ($query->num_rows() > 0) {

            // mencetak query nya satu baris dengan fungsi row
            $barang = $query->row();

            // ambil data category dari Jenis_Barang_Model
            $kuery_jenis_brg = $this->Jenis_Barang_Model->get_data();

            // ambil data category dari satuan_Barang_Model
            $kuery_satuan_brg = $this->Satuan_Barang_Model->get_data();

            // page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
            $data = array(
                'page' => 'edit',
                'row'  => $barang,
                'jenis_barang'  => $kuery_jenis_brg,
                'satuan_barang' => $kuery_satuan_brg
            );

            //  load halaman template dan Produk/barang_form yang ada di views
            //  mengirimkan paramater $data
            $this->template->load('template', 'Produk/Barang/barang_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('barang') . "' </script>";
        }
    }

    // method hapus data mengirimkan sebuah parameter $id
    public function delete($id)
    {

        // mengirimkan $id ke model lalu di proses di method hapus
        $this->Barang_Model->hapus($id);

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data Berhasil di Hapus');
        }
        redirect('barang');
    }

    // method menampilkan qrcode
    function barcode_qrcode($id)
    {
        // mengambil data di Model, berdasarkan id nya saja
        $data['row'] = $this->Barang_Model->get_data($id)->row();

        // menampilkan halaman barcode_qrcode
        $this->template->load('template', 'Produk/Barang/barcode_qrcode', $data);
    }
}
