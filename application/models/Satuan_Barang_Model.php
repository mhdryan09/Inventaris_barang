<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_Barang_Model extends CI_Model
{
    public function get_data($id = null)
    {
        // menampilkan semua data jenis barang
        $this->db->from('tb_satuan_barang');

        // jika id user tidak kosong alias ada,
        if ($id != null) {

            // menampilkan sesuai id_jenis_brg
            $this->db->where('id_satuan_brg', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // method add, menerima lempar data dari controller satuan_barang
    public function add($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan satuan_barang_name adalah 'name' pada inputan di form
        $params = [
            'nama_satuan_brg'         => $post['nama_satuan_barang'],
        ];

        // memasukkan data ke tb_satuan_barang dengan mengirimkan data di dalam $params
        $this->db->insert('tb_satuan_barang', $params);
    }

    // method edit, menerima lempar data dari controller satuan_barang
    public function edit($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan 'nama_satuan_barang adalah 'name' pada inputan di form
        $params = [
            'nama_satuan_brg'   => $post['nama_satuan_barang'],
            'updated'           => date('Y-m-d H:i:s')
        ];

        // id_satuan_barang adalah kolom di database, $post['id_satuan_barang'] berdasarkan dari name pada inputan type hidden
        $this->db->where('id_satuan_brg', $post['id_satuan_barang']);
        // tb_satuan_barang adalah tabel yang akan di update data nya
        $this->db->update('tb_satuan_barang', $params);
    }

    // method delete menerima paramater $id
    public function hapus($id)
    {
        // id_satuan_barang adalah kolom di database, $id didapat dari parameter id diatas
        $this->db->where('id_satuan_brg', $id);
        // tb_user adalah tabel yang akan di hapus data nya
        $this->db->delete('tb_satuan_barang');
    }
}
