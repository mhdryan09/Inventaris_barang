<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_Model extends CI_Model
{
    public function get_data($id = null)
    {
        // menampilkan semua data supplier
        $this->db->from('tb_supplier');

        // jika id user tidak kosong alias ada,
        if ($id != null) {

            // menampilkan sesuai id_supplier
            $this->db->where('id_supplier', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // method add, menerima lempar data dari controller supplier
    public function add($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan supplier_name adalah 'name' pada inputan di form
        $params = [
            'name'         => $post['supplier_name'],
            'phone'        => $post['phone'],
            'address'      => $post['addr'],
            // jika deskripsi nya kosong, hasilnya null, sedangkan jika ada isi nya, maka tampilkan 
            // ? artinya else if dan : artinya else
            'description'  => empty($post['desc']) ? null : $post['desc'],
        ];

        // memasukkan data ke tb_supplier dengan mengirimkan data di dalam $params
        $this->db->insert('tb_supplier', $params);
    }

    // method edit, menerima lempar data dari controller supplier
    public function edit($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan supplier_name adalah 'name' pada inputan di form
        $params = [
            'name'         => $post['supplier_name'],
            'phone'        => $post['phone'],
            'address'      => $post['addr'],
            // jika deskripsi nya kosong, hasilnya null, sedangkan jika ada isi nya, maka tampilkan 
            // ? artinya else if dan : artinya else
            'description'  => empty($post['desc']) ? null : $post['desc'],
            'updated'      => date('Y-m-d H:i:s')
        ];

        // id_supplier adalah kolom di database, $post['id_supplier'] berdasarkan dari name pada inputan type hidden
        $this->db->where('id_supplier', $post['id_supplier']);
        // tb_supplier adalah tabel yang akan di update data nya
        $this->db->update('tb_supplier', $params);
    }

    // method delete menerima paramater $id
    public function hapus($id)
    {
        // id_supplier adalah kolom di database, $id didapat dari parameter id diatas
        $this->db->where('id_supplier', $id);
        // tb_user adalah tabel yang akan di hapus data nya
        $this->db->delete('tb_supplier');
    }
}
