<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		// // panggil fungsi cek not login
		check_not_login();

		// load halaman model supplier
		$this->load->model('Supplier_Model');
	}

	public function index()
	{
		// memanggil fungsi get_data pada halaman Supplier_Model dan
		// mengirimkan data array 
		$data['supplier'] = $this->Supplier_Model->get_data();

		//  load halaman template dan Supplier/supplier_data yang ada di views
		//  mengirimkan paramater $data
		$this->template->load('template', 'supplier/supplier_data', $data);
	}

	// method tambah data
	public function add()
	{
		// disini kita perlu melempar data yang isi nya null, karena dia tambah. jika dia edit, maka dia akan menimpa data baru

		// inisialisasi class yang berisi data null tiap tiap isi nya
		$supplier = new stdClass();

		// sesuaikan dengan kolom/field yang ada di database
		$supplier->id_supplier = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;

		// page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
		$data = array(
			'page' => 'add',
			'row'  => $supplier
		);

		//  load halaman template dan Supplier/supplier_form yang ada di views
		//  mengirimkan paramater $data
		$this->template->load('template', 'supplier/supplier_form', $data);
	}

	// method edit akan menerima parameter $id dari URL yang dikirimkan
	public function edit($id)
	{
		// mamnggil fungsi get yang berisi pengambilan data dari database dengan where id_supplier
		// $id didapat dari parameter method edit diatas
		$query = $this->Supplier_Model->get_data($id);

		if ($query->num_rows() > 0) {

			// mencetak query nya satu baris dengan fungsi row
			$supplier = $query->row();

			// page untuk parameter nya : bisa add atau edit, row berisi edit yang dilempar
			$data = array(
				'page' => 'edit',
				'row'  => $supplier
			);

			//  load halaman template dan Supplier/supplier_form yang ada di views
			//  mengirimkan paramater $data
			$this->template->load('template', 'supplier/supplier_form', $data);
		} else {
			echo "<script> alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('Supplier') . "' </script>";
		}
	}

	// method process
	public function process()
	{
		// $post menampung semua inputan
		$post = $this->input->post(null, TRUE);

		// jika tombol dengan name 'add' ditekan, maka lakukan proses lanjut ke 'method add' pada model supplier dengan memberikan parameter $post yang berisi inputan
		if (isset($_POST['add'])) {

			// Menerima lempar data dari $post diatas dan memanggil method add
			$this->Supplier_Model->add($post);
		}
		// jika tombol edit yang di tekan maka panggil 'method edit'
		else if (isset($_POST['edit'])) {
			// Menerima lempar data dari $post diatas dan memanggil method edit
			$this->Supplier_Model->edit($post);
		}

		// pengecekan jika data berhasil di hapus, artinya bernilai 1
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		}
		echo "<script>window.location='" . site_url('Supplier') . "' </script>";
	}

	// method hapus data mengirimkan sebuah parameter $id
	public function delete($id)
	{

		// mengirimkan $id ke model lalu di proses di method hapus
		$this->Supplier_Model->hapus($id);

		// memberikan pesan error jika data master di hapus
		$error = $this->db->error();

		// jika ada pesan error, tampilkan pesan ini
		if ($error['code'] != 0) {
			echo "<script> alert('Data tidak dapat dihapus (sudah berelasi)'); </script>";
		}
		// selain itu tampilkan data bisa dihapus
		else {
			echo "<script> alert('Data Berhasil di Hapus'); </script>";
		}
		echo "<script>window.location='" . site_url('Supplier') . "' </script>";
	}
}
