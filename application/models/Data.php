<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('custom');
    }
    function getpakai()
    {
        return $this->db->get('v_pakai')->result_array();
    }

    function pakai($id)
    {
        $this->db->where('id', $id['pemakaian']['id_log']);
        $this->db->update('logistik', $id['log']);
        $this->db->insert('log_pemakaian', $id['pemakaian']);
    }
    public function getPasienById($id)
    {
        $json = $this->db->get_where('pasien', array('id' => $id))->row_array();
        $json['lahir'] = date('d-m-Y', strtotime($json['lahir']));
        return json_encode($json);
    }

    public function getLogById($id)
    {
        $json = $this->db->get_where('logistik', array('id' => $id))->row_array();
        $json['tanggal'] = tampil_tgl($json['tanggal']);
        return json_encode($json);
    }

    public function updateLog($s)
    {
        $data = array(
            'tanggal' => htmlspecialchars(insert_tgl($s['tanggal'])),
            'nama' => htmlspecialchars($s['nama']),
            'merk' => htmlspecialchars($s['merk']),
            'no_lot' => htmlspecialchars($s['no_lot']),
            'jumlah' => htmlspecialchars($s['jumlah']),
            'satuan' => htmlspecialchars($s['satuan']),
            'harga' => htmlspecialchars($s['harga']),
            'type_id' => htmlspecialchars($s['type_id'])
        );
        $this->db->where('id', $s['id']);
        $this->db->update('logistik', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah.</div>');
        redirect('dashboard/logistik');
    }

    public function insertLog($s)
    {
        $data = array(
            'tanggal' => htmlspecialchars(insert_tgl($s['tanggal'])),
            'nama' => htmlspecialchars($s['nama']),
            'merk' => htmlspecialchars($s['merk']),
            'no_lot' => htmlspecialchars($s['no_lot']),
            'jumlah' => htmlspecialchars($s['jumlah']),
            'satuan' => htmlspecialchars($s['satuan']),
            'harga' => htmlspecialchars($s['harga']),
            'type_id' => htmlspecialchars($s['type_id'])
        );
        $this->db->insert('logistik', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>');
        redirect('dashboard/logistik');
    }

    public function getLog()
    {
        $json = $this->db->get('logistik')->result_array();
        return $json;
    }

    public function deleteLog($id)
    {
        $this->db->delete('logistik', array('id' => $id));
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
        redirect('dashboard/logistik');
    }

    public function insert_pemeriksaan($data, $pasien)
    {
        $nama = "";
        date_default_timezone_set('Asia/Jakarta');
        foreach ($data['cek'] as $key) {
            $insert = array(
                'no_reg' => str_pad($data['pasien'] . date('ymd'), 8, "0", STR_PAD_LEFT),
                'id_pasien' => $data['pasien'],
                'id_submenu' => $key,
                'tanggal' => date('Y-m-d'),
                'jam' => date("H.i A"),
                'status' => 0
            );
            $this->db->insert('p_lab', $insert);
        }
        foreach ($pasien as $key) {
            if ($key['id'] == $data['pasien']) {
                $nama = $key['nama'];
            }
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><p>Pasien <b>' . $nama . '</b> berhasil didaftarkan!<span class="float-sm-right"><a class="text-white btn btn-primary" target="_blank" href="#">Cetak</a></span></p></div>');
        redirect('dashboard/lab');
    }
}
