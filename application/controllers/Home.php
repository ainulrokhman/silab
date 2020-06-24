<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function logout()
	{
		$this->session->unset_userdata('test');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logout berhasil.</div>');
		redirect(base_url());
	}

	private function _login()
	{
		$username = $this->input->post('user');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// verifikasi
		if (!$user) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak ditemukan.</div>');
			redirect(base_url());
		} else {
			if (password_verify($password, $user['password'])) {
				$data = [
					'nama' => $user['nama'],
					'role_id' => $user['role_id']
				];
				// var_dump($data);
				$this->session->set_userdata('user', $data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah.</div>');
				redirect(base_url());
			}
		}
	}
	public function index()
	{
		$login = $this->session->userdata('test');
		if (!$login) {
			$data['title'] = "Sistem Informasi Laboratorium";
			$this->form_validation->set_rules(
				'password',
				'Password',
				'required|trim',
				array('required' => 'Password harus di isi.')
			);
			$this->form_validation->set_rules(
				'user',
				'Username',
				'required|trim',
				array('required' => 'Username harus di isi.')
			);
			if ($this->form_validation->run() != false) {
				$this->_login();
			} else {
				$this->load->view('home/header', $data);
				$this->load->view('home/login');
				$this->load->view('home/footer');
			}
		} else {
			redirect('dashboard');
		}
	}
	public function registrasi()
	{
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|matches[password1]',
			array(
				'required' => 'Password harus di isi.',
				'matches' => 'Password harus sama'
			)
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim',
			array('required' => 'Password harus di isi.')
		);
		$this->form_validation->set_rules(
			'nama',
			'Nama',
			'required|trim',
			array('required' => 'Nama harus di isi.')
		);
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|trim|is_unique[user.username]|min_length[4]',
			array(
				'required' => 'Username harus di isi.',
				'is_unique' => 'Username sudah digunakan.',
				'min_length' => 'Username minimal 4 karakter.'
			)
		);

		if ($this->form_validation->run() != false) {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];
			$this->db->insert('user', $data);
			$nama = htmlspecialchars($this->input->post('nama'), true);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">' . $nama . ' berhasil didaftarkan!</div>');
			redirect(base_url());
		} else {
			$data['title'] = "Registrasi";
			$this->load->view('home/header', $data);
			$this->load->view('home/register');
			$this->load->view('home/footer');
		}
	}
}
