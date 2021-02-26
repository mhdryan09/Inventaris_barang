<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengadaan_Model extends CI_Model
{

    public function ambil_pengadaan_brg()
    {
        $this->db->select('tb_pengadaan_brg.id_pengadaan_brg, tb_barang.kode_barang, tb_barang.nama_barang as barang, jumlah, tanggal, keterangan, tb_unit.nama_unit as unit, tb_barang.id_barang');

        // di tampil kan dari tabel stock
        $this->db->from('tb_pengadaan_brg');

        $this->db->join('tb_barang', 'tb_pengadaan_brg.id_barang = tb_barang.id_barang');

        // melakukan join tabel supplier dan stok, dengan kata kunci id supplier (kolom yang menghubungkan)
        // left artinya left join
        $this->db->join('tb_unit', 'tb_pengadaan_brg.id_unit = tb_unit.id_unit');

        // melakukan pengurutan data berdasarkan id stock terkecil
        $this->db->order_by('id_pengadaan_brg', 'asc');

        // menjalankan proses ambil data dengan fungsi get
        $query = $this->db->get();

        // mengembalikan nilai nya
        return $query;
    }

    public function tambah_barang_pengadaan($post)
    {

        $params = [
            'tanggal'        => $post['tanggal'],
            'id_barang'      => $post['id_barang'],
            'jumlah'         => $post['jumlah'],
            'id_unit'        => $post['unit_kerja'],
            'keterangan'     => $post['keterangan'],
            // mengambil id user dengan session berdasarkan user yang login
            'id_user'        => $this->session->userdata('userid')
        ];

        // memasukkan data ke stock dengan mengirimkan data di dalam $params
        $this->db->insert('tb_pengadaan_brg', $params);
    }

    public function delete($id)
    {
        // mengambil data berdasarkan id pengadaan_brg
        $this->db->where('id_pengadaan_brg', $id);

        // menghapus data nya dari tabel tb_pengadaan_brg
        $this->db->delete('tb_pengadaan_brg');
    }

    public function cetak_tanggal($tgl1, $tgl2)
    {
        $sql = "SELECT pg.tanggal, b.kode_barang as kode_barang, b.nama_barang as barang, b.stok as stok, pg.jumlah as jumlah, pg.keterangan,  u.nama_unit as unit, pg.tanggal
        FROM tb_pengadaan_brg pg
        INNER JOIN tb_barang b ON b.id_barang = pg.id_barang
        INNER JOIN tb_unit u ON u.id_unit = pg.id_unit
        WHERE pg.tanggal BETWEEN '$tgl1' AND '$tgl2'
        GROUP BY pg.id_pengadaan_brg;";

        // menjalankan proses ambil data dengan fungsi get
        $query = $this->db->query($sql);

        // mengembalikan nilai nya
        return $query;
    }
}
