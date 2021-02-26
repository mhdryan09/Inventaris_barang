<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function login()
	{
		check_already_login();

		$this->load->view('login');
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('User_Model');
			$query = $this->User_Model->login($post);
			// cek kondisi
			if ($query->num_rows() > 0) {
				$row = $query->row();

				// sesuaikan dengan kolom di database
				$params = array(
					'userid' => $row->id_user,
					'level'  => $row->level
				);
				// berikan session
				$this->session->set_userdata($params);
				// pesan berhasil
				echo "<script>
					window.location='" . site_url('dashboard') . "';
				</script>";
			} else {
				echo "<script>
					alert('Maaf, Username / Password salah');
					window.location='" . site_url('auth/login') . "';
				</script>";
			}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('Auth/login');
	}
}
