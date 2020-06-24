<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

    public function pemakaian()
    {
        $this->load->model('data');
        if ($this->input->post()) {
            $total = ipost('total');
            $jml = ipost('jml');
            // pemakaian
            $data['pemakaian'] = [
                'id_log' => ipost('id_log'),
                'jumlah' => ipost('jml'),
                'keterangan' => ipost('ket'),
                'tanggal' => insert_tgl(ipost('tgl'))
            ];
            // update logistik
            $data['log'] = [
                'jumlah' => $total - $jml,
            ];
            $this->data->pakai($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah.</div>');
            redirect('dashboard/logistik');
        } else {
            $login['d'] = $this->data->getpakai();
            $login['user'] = $this->session->userdata('user');
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/sidebar', $login);
            $this->load->view('dashboard/pemakaian');
            $this->load->view('dashboard/footer');
        }
    }

    public function test($id)
    {
        $data['id'] = $id;
        $data['pasien'] = $this->db->get_where('v_pasien', array('id' => $id))->row_array();
        $this->load->view('dashboard/pdf', $data);
    }

    public function index()
    {
        $login['user'] = $this->session->userdata('user');
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/sidebar', $login);
        $this->load->view('dashboard/footer');
    }

    public function logistik()
    {
        $this->load->model('data');
        $edit = $this->input->post('edit');
        $update = ipost('id');
        $gunakan = ipost('gunakan');
        $insert = $this->input->post();
        $delete = $this->input->get('hapus');
        $filter = $this->input->get('filter');
        if ($edit || $gunakan) {
            // edit data
            $result = $this->data->getLogById($gunakan ? $gunakan : $edit);
            echo $result;
        } elseif ($update) {
            // update data
            $this->data->updateLog($this->input->post());
        } elseif ($delete) {
            // hapus
            $this->data->deleteLog($delete);
            // echo $delete;
        } elseif ($filter) {
            $this->data->log_filter($filter);
        } elseif (!$insert) {
            // index view
            $data['menu'] = $this->data->getLog();
            $login['user'] = $this->session->userdata('user');
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/sidebar', $login);
            $this->load->view('dashboard/logistik', $data);
            $this->load->view('dashboard/footer');
        } else {
            // tambah data
            $this->data->insertLog($this->input->post());
        }
    }
    public function pasien($s = "", $id = "")
    {

        if ($s == "cetak" && $id != null) {
            $this->_pdf("pasien_report", $id);
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'nama',
                'Nama',
                'required|trim',
                array('required' => 'Nama harus di isi.')
            );
            $this->form_validation->set_rules(
                'alamat',
                'Alamat',
                'required|trim',
                array('required' => 'Alamat harus di isi.')
            );
            $this->form_validation->set_rules(
                'kab',
                'Kabupaten/kota',
                'required|trim',
                array('required' => 'Kabupaten/kota harus di isi.')
            );
            $this->form_validation->set_rules(
                'kec',
                'Kecamatan',
                'required|trim',
                array('required' => 'Kecamatan harus di isi.')
            );
            $this->form_validation->set_rules(
                'kel',
                'Kelurahan',
                'required|trim',
                array('required' => 'Kelurahan harus di isi.')
            );
            $this->form_validation->set_rules(
                'cek',
                'Cek',
                'required|trim',
                array('required' => 'Wajib dicentang')
            );
            $data['poli'] = $this->db->get('poliklinik')->result_array();
            $login['user'] = $this->session->userdata('user');
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/sidebar', $login);
            if ($this->form_validation->run() == false) {
                $data['reset'] = false;
                $this->load->view('dashboard/pasien_reg', $data);
            } else {
                $this->_insert();
                $data['reset'] = true;
                $this->load->view('dashboard/pasien_reg', $data);
            }
            $this->load->view('dashboard/footer');
        }
    }

    public function lab()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'pasien',
            'Pasien',
            'required',
            array('required' => 'Pilih salah satu {field}.')
        );
        $this->form_validation->set_rules(
            'cek',
            'Pemeriksaan',
            'callback_username_check'
        );
        $this->load->model('data');
        $id = $this->input->post('id');
        $form['cek'] = $this->input->post('cek');
        $form['pasien'] = $this->input->post('pasien');
        $login['user'] = $this->session->userdata('user');
        $data['pasien'] =  $this->db->get('pasien')->result_array();
        $data['menu'] =  $this->db->get('menu')->result_array();
        $data['sub'] =  $this->db->get('submenu')->result_array();
        if ($id != null) {
            $data = $this->data->getPasienById($id);
            echo $data;
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/sidebar', $login);
            if ($this->form_validation->run() == false) {
                $this->load->view('dashboard/pasien_list', $data);
            } else {
                $this->data->insert_pemeriksaan($form, $data['pasien']);
                $this->load->view('dashboard/pasien_list', $data);
            }
            $this->load->view('dashboard/footer');
        }
    }

    public function username_check()
    {
        $choice = $this->input->post("cek");
        if (is_null($choice)) {
            $choice = array();
        }
        $schoolGroups = implode(',', $choice);

        if ($schoolGroups != '') {
            return true;
        } else {
            $this->form_validation->set_message('username_check', 'Pilih salah satu {field}');
            return false;
        }
    }

    private function _insert()
    {
        $nama = htmlspecialchars($this->input->post('nama'));
        $jk = htmlspecialchars($this->input->post('jk'));
        $tgl = htmlspecialchars($this->input->post('tgl'));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $kab = htmlspecialchars($this->input->post('kab'));
        $kec = htmlspecialchars($this->input->post('kec'));
        $kel = htmlspecialchars($this->input->post('kel'));
        $tlep = htmlspecialchars($this->input->post('tlep'));
        $email = htmlspecialchars($this->input->post('email'));
        $poli = htmlspecialchars($this->input->post('poli'));
        $data = [
            'id_poli' => $poli,
            'nama' => ipost('nama'),
            'jk' => $jk,
            'lahir' => insert_tgl($tgl),
            'alamat' => $alamat,
            'kab' => $kab,
            'kec' => $kec,
            'kel' => $kel,
            'tlep' => $tlep,
            'email' => $email
        ];
        $this->db->insert('pasien', $data);
        $id = $this->db->insert_id();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><p>Pasien <b>' . $nama . '</b> berhasil didaftarkan!<span class="float-sm-right"><a class="text-white btn btn-primary" target="_blank" href="' . base_url('dashboard/pasien/cetak/' . $id) . '">Cetak</a></span></p></div>');
    }

    private function _pdf($filename, $id)
    {
        $data['id'] = $id;
        $data['pasien'] = $this->db->get_where('v_pasien', array('id' => $id))->row_array();
        if ($data['pasien'] != null) {
            $html = $this->load->view('dashboard/pdf', $data, true);
            $options = new Dompdf\Options();
            $options->setIsRemoteEnabled(true);
            $dompdf = new Dompdf\Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array('Attachment' => 0));
        } else {
            redirect('dashboard');
        }
    }
}
