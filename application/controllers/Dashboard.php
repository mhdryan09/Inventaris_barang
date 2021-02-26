<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		// check_not_login();

		$this->template->load('template', 'dashboard');
	}

	public function __construct()
	{

		parent::__construct();
		// // panggil fungsi cek not login
		check_not_login();

		// load halaman model barang
		$this->load->model(['Barang_Model', 'Penerimaan_Model', 'Pengeluaran_Model']);
	}

	public function grafik_barang()
	{
		$data = $this->Penerimaan_Model->ambil_penerimaan_brg()->result();

		$data2 = $this->Pengeluaran_Model->ambil_pengeluaran_brg()->result();

		if ($masuk = $data) {

			$this->template->load('template', 'dashboard', $masuk);
		} else if ($keluar = $data2) {
			$this->template->load('template', 'dashboard', $keluar);
		}
	}
}
