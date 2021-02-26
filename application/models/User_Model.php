<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id = null)
    {
        // menampilkan semua data user
        $this->db->select('*');
        $this->db->from('tb_user');

        // jika id user tidak kosong alias ada,
        if ($id != null) {

            // menampilkan sesuai id_user
            $this->db->where('id_user', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = array(
            'name'     => $post['fullname'],
            'username' => $post['username'],
            'password' => sha1($post['pass']),
            'address'  => $post['address'] != "" ? $post['address'] : null,
            'level'    => $post['level']
        );

        $this->db->insert('tb_user', $params);
    }

    // method edit menerima parameter $post
    public function edit($post)
    {
        // name adalah kolom/field di dalam tabel, fullname adalah name yang ada di inputan form
        $params['name']         = $post['fullname'];
        $params['username']     = $post['username'];
        // jika password nya tidak kosong, alias ada, maka password nya akan diganti
        if (!empty($post['password'])) {
            $params['password']     = sha1($post['pass']);
        }
        // khusus untuk alamat, jika dia kosong maka di tampilkan null di dalam database nya
        $params['address']      = $post['address'] != "" ? $post['address'] : null;
        $params['level']        = $post['level'];

        // id_user adalah kolom di database, user_id adalah name di inputan nya
        $this->db->where('id_user', $post['user_id']);
        // mengubah data di tb_user dengan mengirimkan data di dalam $params
        $this->db->update('tb_user', $params);
    }

    // method delete menerima paramater $id
    public function hapus($id)
    {
        // id_user adalah kolom di database, $id didapat dari parameter id diatas
        $this->db->where('id_user', $id);
        // tb_user adalah tabel yang akan di hapus data nya
        $this->db->delete('tb_user');
    }
}
