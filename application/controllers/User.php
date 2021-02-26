<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        //pemanggilan fungsi check admin berdasarkan level nya
        check_admin();

        $this->load->model('User_Model');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->User_Model->get_data();
        $this->template->load('template', 'user/user_data', $data);
    }

    // method tambah data
    public function add()
    {
        // membuat aturan dalam form validation
        // fullname adalah name yang kita berikan di inputan
        // Nama adalah 'alias' dan required adalah validasi nya artinya harus di isi
        $this->form_validation->set_rules('fullname', 'nama_lengkap', 'required');
        $this->form_validation->set_rules('username', 'nama', 'required|min_length[5]|is_unique[tb_user.username]');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]');

        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'required|matches[pass]',
            array('matches' => '%s tidak sesuai dengan password')
        );

        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan di isi');
        $this->form_validation->set_message('min_length', '{field} Minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {

            $this->template->load('template', 'user/user_form_add');
        } else {

            $post = $this->input->post(null, TRUE);

            // Menerima lempar data dari $post diatas dan memanggil method add
            $this->User_Model->add($post);

            // pengecekan jika data berhasil di hapus, artinya bernilai 1
            if ($this->db->affected_rows() > 0) {

                // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
                $this->session->set_flashdata('success', 'Data berhasil di Simpan');
            }
            // pindah halaman
            redirect('User');
        }
    }
    // method edit akan menerima parameter id yang dikirimkan melalui button update di halaman user)_data
    public function edit($id)
    {

        // membuat aturan dalam form validation
        // fullname adalah name yang kita berikan di inputan
        // Nama adalah 'alias' dan required adalah validasi nya artinya harus di isi
        $this->form_validation->set_rules('fullname', 'nama_lengkap', 'required');

        // callback_username_check adalah sebuah form validasi untuk mengecek username yang sudah dipakai apa belum
        $this->form_validation->set_rules('username', 'nama', 'required|min_length[5]|callback_username_check');

        //jika terdapat ada pengubahan password, maka jalankan hal ini
        if ($this->input->post('pass')) {
            $this->form_validation->set_rules('pass', 'Password', 'min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'matches[pass]',
                array('matches' => '%s tidak sesuai dengan password')
            );
        }

        //jika terdapat ada pengubahan password, maka akan mengecek konfirmasi password nya
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'matches[pass]',
                array('matches' => '%s tidak sesuai dengan password')
            );
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        // cara membuat custom pesan di validasi nya
        // %s atau alias, dapat juga diganti dengan {field}
        $this->form_validation->set_message('required', '%s masih kosong, silahkan di isi');
        $this->form_validation->set_message('min_length', '{field} Minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti yang lain');

        // membuat semua elemen error, menjadi help-block,
        // isi nya adalah tag pembuka '<span>', dan diakhiri tag penutup '</span'>
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        // melakukan proses validasi
        // jika validasi yang dijalankan bernilai false, maka arahkan ke user_form_add
        if ($this->form_validation->run() == FALSE) {

            // mamnggil fungsi get yang berisi pengambilan data dari database dengan where id_user
            // $id didapat dari parameter method edit diatas
            $query = $this->User_Model->get_data($id);

            // lakukan pengecekan jumlah baris yang terubah
            if ($query->num_rows() > 0) {

                // mencetak query nya satu baris dengan fungsi row
                $data['row'] = $query->row();
                // load halaman template dan User/user_form_edit yang ada di views dan mengirimkan nilai dari $data 
                $this->template->load('template', 'user/user_form_edit', $data);
            } else {
                echo "<script> alert('Data tidak ditemukan');";
                echo "window.location='" . site_url('User') . "' </script>";
            }
        } else {
            // $post menampung semua inputan
            $post = $this->input->post(null, TRUE);

            // Menerima lempar data dari $post diatas dan memanggil method add
            $this->User_Model->edit($post);

            // pengecekan jika data berhasil di hapus, artinya bernilai 1
            if ($this->db->affected_rows() > 0) {

                // jalankan flasdata message, sucess adalah warna dari alert, dan disebelah adalah value atau isi pesan nya
                $this->session->set_flashdata('success', 'Data berhasil di Simpan');
            }
            // pindah halaman
            redirect('User');
        }
    }

    // function callback yang ada di form validation khusus bagian username
    function username_check()
    {
        // $post menampung semua inputan
        $post = $this->input->post(null, TRUE);

        // melakukan query, berdasarkan username dan id user. id_user adalah nama kolom di database sedangkan user_id adalah nama name di inputan nya
        $query = $this->db->query("SELECT * FROM tb_user WHERE username = '$post[username]' AND id_user != '$post[user_id]'");
        // artinya, menampilkan data user, yang username nya itu sesuai dengan yang ada di inputan user tp id nya yang sedang tidak di edit

        // pengecekan jika ada data nya yang masuk, jika ada maka beri pesan peringatan 
        if ($query->num_rows() > 0) {
            // username_check ini sesuaikan dengan nama fungsi callback nya, yaitu username_check
            $this->form_validation->set_message('username_check', '{field} username ini sudah dipakai, silahkan diganti yang lain');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // method hapus data
    public function delete()
    {
        // $id berisi inputan dengan id user tertentu
        // user_id di dapat dari name pada inputan form
        $id = $this->input->post('user_id');
        // mengirimkan $id ke model lalu di proses di method hapus
        $this->User_Model->hapus($id);

        // pengecekan jika data berhasil di hapus, artinya bernilai 1
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data Berhasil di Hapus');
        }
        echo "<script>window.location='" . site_url('User') . "' </script>";
    }
}
