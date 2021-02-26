
<?php

class Fungsi
{
	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('User_Model');

		$id_user = $this->ci->session->userdata('userid');

		$user_data = $this->ci->User_Model->get_data($id_user)->row();

		return $user_data;
	}

	// mengambil jumlah data barang
	public function count_barang()
	{
		// mengambil data di Barang model
		$this->ci->load->model('Barang_Model');

		// mengembalikan nilai yang di ambil dari model, dan lihat ada berapa datanya menggunakan num_rows()
		return $this->ci->Barang_Model->get_data()->num_rows();
	}

	public function count_supplier()
	{
		$this->ci->load->model('Supplier_Model');
		return $this->ci->Supplier_Model->get_data()->num_rows();
	}


	public function count_unit()
	{
		$this->ci->load->model('Unit_Model');
		return $this->ci->Unit_Model->get_data()->num_rows();
	}


	public function count_user()
	{
		$this->ci->load->model('User_Model');
		return $this->ci->User_Model->get_data()->num_rows();
	}
}



?>