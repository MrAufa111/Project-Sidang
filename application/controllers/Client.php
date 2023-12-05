<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_client');
        check_login();
    }
    public function index()
    {
        $data['title'] = 'Client';
        $data['page'] = 'client/index';
        $data['tables'] = $this->M_client->tables();
        $this->load->view('client/templates/index', $data);
    }

    public function editt($id = NULL)
    {

        $this->db->select('client.*, wali.pic, wali.whatsapp, wali.email, jenispt.name_pt, migrasi.name_mig, pelatihan.name_pelat, invoice.name_inv, instalasi.name_inst, status_member.name_mem, status_surat.name_sur, sph.name_sp, sla.name_sl');
        $this->db->from('client');
        $this->db->join('wali', 'wali.client_id = client.id');
        $this->db->join('jenispt', 'jenispt.id = client.JenisPT');
        $this->db->join('pelatihan', 'pelatihan.id = client.pelatihan');
        $this->db->join('migrasi', 'migrasi.id = client.migrasi_data');
        $this->db->join('invoice', 'invoice.id = client.invoice');
        $this->db->join('status_surat', 'status_surat.id = client.spk');
        $this->db->join('sph', 'sph.id = client.sph');
        $this->db->join('sla', 'sla.id = client.sla');
        $this->db->join('instalasi', 'instalasi.id = client.instalasi');
        $this->db->join('status_member', 'status_member.id = client.status_member');
        $this->db->where('client.id', $id);
        $data_client = $this->db->get()->row_array();
      

        if (!$data_client) {
            show_404();
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->where('id', $id);
            $dataToUpdate = [
                'name_client' => $this->input->post('namakampus', TRUE),
                'provinsi' => $this->input->post('provinsi', TRUE),
                'kota' => $this->input->post('kota', TRUE),
                'JenisPT' => $this->input->post('jenispt', TRUE),
                'status_member' => $this->input->post('status', TRUE),
                'sph' => $this->input->post('sph', TRUE),
                'spk' => $this->input->post('spk', TRUE),
                'sla' => $this->input->post('sla', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'instalasi' => $this->input->post('instalasi', TRUE),
                'migrasi_data' => $this->input->post('migrasi', TRUE),
                'pelatihan' => $this->input->post('pelatihan', TRUE),
                'invoice' => $this->input->post('invoice', TRUE),
            ];
            $this->db->update('client', $dataToUpdate);
            // var_dump($dataToUpdate);
            // exit;

            $this->db->where('client_id', $id);
            $dataToUpdateWali = [
                'pic' => $this->input->post('pic', TRUE),
                'whatsapp' => $this->input->post('whatsapp', TRUE),
                'email' => $this->input->post('email', TRUE),
            ];
            $this->db->update('wali', $dataToUpdateWali);
            $this->session->set_flashdata('notif', 'Success');
            redirect('client/index');
        } else {
            $data['data_client'] = $data_client;
            $data['page'] = 'client/editC';
            $data['jenis'] = $this->M_client->getjenispt();
            $data['status'] = $this->M_client->getstatus();
            $data['instal'] = $this->M_client->getinstalasi();
            $data['migrasi'] = $this->M_client->getmigrasi();
            $data['pelatih'] = $this->M_client->getpelatihan();
            $data['invo'] = $this->M_client->getinvoice();
            $data['stat'] = $this->M_client->getAllSurat();
            $data['sph'] = $this->M_client->getSph();
            $data['sla'] = $this->M_client->getSla();
            $this->load->view('client/templates/index', $data);
        }
    }
}
