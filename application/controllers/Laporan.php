<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('custom');
        $login = $this->session->userdata('user');
        if (!$login) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda harus login!</div>');
            redirect(base_url());
        }
    }

    public function asal_pasien()
    {
        $this->load->model('data');
        $login['user'] = $this->session->userdata('user');
        $login['d'] = $this->db->get('p_vchart')->result_array();
        $this->load->model('data');
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/sidebar', $login);
        $this->load->view('laporan/asal-pasien');
        $this->load->view('dashboard/footer');
    }
}
