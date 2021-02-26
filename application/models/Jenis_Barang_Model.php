<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_Barang_Model extends CI_Model
{
    public function get_data($id = null)
    {
        // menampilkan semua data jenis barang
        $this->db->from('tb_jenis_barang');

        // jika id user tidak kosong alias ada,
        if ($id != null) {

            // menampilkan sesuai id_jenis_brg
            $this->db->where('id_jenis_brg', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // method add, menerima lempar data dari controller jenis_barang
    public function add($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan jenis_barang_name adalah 'name' pada inputan di form
        $params = [
            'nama_jenis_brg'         => $post['nama_jenis_barang'],
        ];

        // memasukkan data ke tb_jenis_barang dengan mengirimkan data di dalam $params
        $this->db->insert('tb_jenis_barang', $params);
    }

    // method edit, menerima lempar data dari controller jenis_barang
    public function edit($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan 'nama_jenis_barang adalah 'name' pada inputan di form
        $params = [
            'nama_jenis_brg'         => $post['nama_jenis_barang'],
            'updated'      => date('Y-m-d H:i:s')
        ];

        // id_jenis_barang adalah kolom di database, $post['id_jenis_barang'] berdasarkan dari name pada inputan type hidden
        $this->db->where('id_jenis_brg', $post['id_jenis_barang']);
        // tb_jenis_barang adalah tabel yang akan di update data nya
        $this->db->update('tb_jenis_barang', $params);
    }

    // method delete menerima paramater $id
    public function hapus($id)
    {
        // id_jenis_barang adalah kolom di database, $id didapat dari parameter id diatas
        $this->db->where('id_jenis_brg', $id);
        // tb_user adalah tabel yang akan di hapus data nya
        $this->db->delete('tb_jenis_barang');
    }
}
