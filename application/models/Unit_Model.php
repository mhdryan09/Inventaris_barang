<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_Model extends CI_Model
{
    public function get_data($id = null)
    {
        // menampilkan semua data unit
        $this->db->from('tb_unit');

        // jika id user tidak kosong alias ada,
        if ($id != null) {

            // menampilkan sesuai id_unit
            $this->db->where('id_unit', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // method add, menerima lempar data dari controller unit
    public function add($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan unit_name adalah 'name' pada inputan di form
        $params = [
            'nama_unit'                 => $post['unit_name'],
            'nama_penanggung_jawab'     => $post['nama_penanggung_jawab'],
        ];

        // memasukkan data ke tb_unit dengan mengirimkan data di dalam $params
        $this->db->insert('tb_unit', $params);
    }

    // method edit, menerima lempar data dari controller unit
    public function edit($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan unit_name adalah 'name' pada inputan di form
        $params = [
            'nama_unit'                 => $post['unit_name'],
            'nama_penanggung_jawab'     => $post['nama_penanggung_jawab'],
            'updated'      => date('Y-m-d H:i:s')
        ];

        // id_unit adalah kolom di database, $id didapat dari name pada inputan type hidden
        $this->db->where('id_unit', $post['id_unit']);
        // tb_unit adalah tabel yang akan di update data nya
        $this->db->update('tb_unit', $params);
    }

    // method delete menerima paramater $id
    public function hapus($id)
    {
        // id_unit adalah kolom di database, $id didapat dari parameter id diatas
        $this->db->where('id_unit', $id);
        // tb_user adalah tabel yang akan di hapus data nya
        $this->db->delete('tb_unit');
    }
}
