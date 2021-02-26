<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_Model extends CI_Model
{

    // start datatables
    // var $column_order = array(null, 'kode_barang', 'tb_barang.nama_barang', 'jenis_barang_name', 'satuan_barang_name', 'stok'); //set column field database for datatable orderable
    // var $column_search = array('kode_barang', 'tb_barang.nama_barang'); //set column field database for datatable searchable
    // var $order = array('id_barang' => 'asc'); // default order

    // private function _get_datatables_query()
    // {
    //     $this->db->select('tb_barang.* , tb_jenis_barang.nama_jenis_brg as jenis_barang_name, tb_satuan_barang.nama_satuan_brg as satuan_barang_name');
    //     // menampilkan semua data jenis barang
    //     $this->db->from('tb_barang');

    //     $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_brg = tb_barang.id_jenis_brg');

    //     $this->db->join('tb_satuan_barang', 'tb_satuan_barang.id_satuan_brg = tb_barang.id_satuan_brg');
    //     $i = 0;
    //     foreach ($this->column_search as $item) { // loop column
    //         if (@$_POST['search']['value']) { // if datatable send POST for search
    //             if ($i === 0) { // first loop
    //                 $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
    //                 $this->db->like($item, $_POST['search']['value']);
    //             } else {
    //                 $this->db->or_like($item, $_POST['search']['value']);
    //             }
    //             if (count($this->column_search) - 1 == $i) //last loop
    //                 $this->db->group_end(); //close bracket
    //         }
    //         $i++;
    //     }

    //     if (isset($_POST['order'])) { // here order processing
    //         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //     } else if (isset($this->order)) {
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }
    // function get_datatables()
    // {
    //     $this->_get_datatables_query();
    //     if (@$_POST['length'] != -1)
    //         $this->db->limit(@$_POST['length'], @$_POST['start']);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // function count_filtered()
    // {
    //     $this->_get_datatables_query();
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }
    // function count_all()
    // {
    //     $this->db->from('tb_barang');
    //     return $this->db->count_all_results();
    // }
    // end datatables

    public function get_data($id = null)
    {
        $this->db->select('tb_barang.* , tb_barang.nama_barang as nama_barang, tb_barang.stok as stok, tb_jenis_barang.nama_jenis_brg as jenis_barang_name, tb_satuan_barang.nama_satuan_brg as satuan_barang_name');
        // menampilkan semua data jenis barang
        $this->db->from('tb_barang');

        $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_brg = tb_barang.id_jenis_brg');

        $this->db->join('tb_satuan_barang', 'tb_satuan_barang.id_satuan_brg = tb_barang.id_satuan_brg');


        // jika id user tidak kosong alias ada,
        if ($id != null) {

            // menampilkan sesuai id_barang
            $this->db->where('id_barang', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // method add, menerima lempar data dari controller barang
    public function add($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan barang_name adalah 'name' pada inputan di form
        $params = [
            'kode_barang'         => $post['kode_barang'],
            'nama_barang'         => $post['nama_barang'],
            'id_jenis_brg'        => $post['jenis_barang'],
            'id_satuan_brg'       => $post['satuan_barang']
        ];

        // memasukkan data ke tb_barang dengan mengirimkan data di dalam $params
        $this->db->insert('tb_barang', $params);
    }

    // method edit, menerima lempar data dari controller barang
    public function edit($post)
    {
        // $param berisi array inputan form
        // 'name' adalah kolom/field, sedangkan 'nama_barang adalah 'name' pada inputan di form
        $params = [
            'kode_barang'         => $post['kode_barang'],
            'nama_barang'         => $post['nama_barang'],
            'id_jenis_brg'        => $post['jenis_barang'],
            'id_satuan_brg'       => $post['satuan_barang'],
            'updated'      => date('Y-m-d H:i:s')
        ];

        // id_barang adalah kolom di database, $post['id_barang'] berdasarkan dari name pada inputan type hidden
        $this->db->where('id_barang', $post['id_barang']);
        // tb_barang adalah tabel yang akan di update data nya
        $this->db->update('tb_barang', $params);
    }

    function check_kode_barang($code, $id = null)
    {
        $this->db->from('tb_barang');

        $this->db->where('kode_barang', $code);

        if ($id != null) {
            $this->db->where('id_barang !=', $id);
        }

        $query = $this->db->get();

        return $query;
    }
    // }

    // method delete menerima paramater $id
    public function hapus($id)
    {
        // id_barang adalah kolom di database, $id didapat dari parameter id diatas
        $this->db->where('id_barang', $id);
        // tb_user adalah tabel yang akan di hapus data nya
        $this->db->delete('tb_barang');
    }

    function update_barang_masuk($data)
    {
        // ambil data jumlah dan id item nya
        $jumlah = $data['jumlah'];
        $id = $data['id_barang'];

        // melakukan update data di kolom stok. jadi, stok awal + jumlah berdasarkan id barang yang dipilih
        $sql = "UPDATE tb_barang SET stok = stok + '$jumlah' WHERE id_barang = '$id'";

        // jalankan query nya
        $this->db->query($sql);
    }

    function update_barang_keluar($data)
    {
        // ambil data jumlah dan id item nya
        $jumlah = $data['jumlah'];
        $id = $data['id_barang'];

        // melakukan update data di kolom stok. jadi, stok awal + jumlah berdasarkan id barang yang dipilih
        $sql = "UPDATE tb_barang SET stok = stok - '$jumlah' WHERE id_barang = '$id'";

        // jalankan query nya
        $this->db->query($sql);
    }
}
