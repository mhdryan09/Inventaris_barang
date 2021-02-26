<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_Model extends CI_Model
{
    // mehtod ambil data berdasarkan id stock
    public function get_data($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_pengeluaran_brg');

        // jika id nya ada, maka tampilkan berdasarkan id
        if ($id != null) {
            $this->db->where('id_pengeluaran_brg', $id);
        }

        // menjalankan proses ambil data dengan fungsi get
        $query = $this->db->get();

        // mengembalikan nilai nya
        return $query;
    }


    public function ambil_pengeluaran_brg()
    {
        // menampilkan  isi dari kolom id stock, barcode, name item, qty, date, detail, name supplier dan id item
        $this->db->select('tb_pengeluaran_brg.id_pengeluaran_brg, tb_barang.kode_barang, tb_barang.nama_barang as barang, tb_pengeluaran_brg.jumlah as jumlah, jumlah, tanggal, stok, deskripsi, tb_unit.nama_unit as unit, tb_barang.id_barang');

        // di tampil kan dari tabel stock
        $this->db->from('tb_pengeluaran_brg');

        $this->db->join('tb_barang', 'tb_pengeluaran_brg.id_barang = tb_barang.id_barang');

        // melakukan join tabel supplier dan stok, dengan kata kunci id supplier (kolom yang menghubungkan)
        // left artinya left join
        $this->db->join('tb_unit', 'tb_pengeluaran_brg.id_unit = tb_unit.id_unit');

        // melakukan pengurutan data berdasarkan id stock terkecil
        $this->db->order_by('id_pengeluaran_brg', 'asc');

        // menjalankan proses ambil data dengan fungsi get
        $query = $this->db->get();

        // mengembalikan nilai nya
        return $query;
    }

    public function tambah_barang_keluar($post)
    {

        $params = [
            'tanggal'        => $post['tanggal'],
            'id_barang'      => $post['id_barang'],
            'jumlah'         => $post['jumlah'],
            'id_unit'        => $post['unit_kerja'],
            'deskripsi'      => $post['deskripsi'],
            // mengambil id user dengan session berdasarkan user yang login
            'id_user'        => $this->session->userdata('userid')
        ];

        // memasukkan data ke stock dengan mengirimkan data di dalam $params
        $this->db->insert('tb_pengeluaran_brg', $params);
    }

    public function delete($id)
    {
        // mengambil data berdasarkan id pengeluaran_brg
        $this->db->where('id_pengeluaran_brg', $id);

        // menghapus data nya dari tabel tb_pengeluaran_brg
        $this->db->delete('tb_pengeluaran_brg');
    }

    public function cetak_tanggal($tgl1, $tgl2)
    {
        $sql = "SELECT pn.tanggal, b.kode_barang as kode_barang, b.nama_barang as barang, b.stok as stok, pn.jumlah as jumlah, pn.deskripsi,  u.nama_unit as unit, pn.tanggal
        FROM tb_pengeluaran_brg pn
        INNER JOIN tb_barang b ON b.id_barang = pn.id_barang
        INNER JOIN tb_unit u ON u.id_unit = pn.id_unit
        WHERE pn.tanggal BETWEEN '$tgl1' AND '$tgl2'
        GROUP BY pn.id_pengeluaran_brg;";

        // menjalankan proses ambil data dengan fungsi get
        $query = $this->db->query($sql);

        // mengembalikan nilai nya
        return $query;
    }
}
