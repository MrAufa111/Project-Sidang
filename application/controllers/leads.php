<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leads extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_leads');
        check_login();
    }
    public function index()
    {
        $data['title'] = '';
        $data['page'] = 'Leads/dashboard';
        $this->load->view('Leads/templates/index', $data);
    }

    public function data()
    {
        $data['title'] = 'Data Leads';
        $data['page'] = 'Leads/index';
        // $data['client'] = $this->M_leads->getclient();
        $data['tables'] = $this->M_leads->tables();
        $this->load->view('Leads/templates/index', $data);
    }


    public function addl()
    {
        $data['title'] = 'Add | Data Leads';
        $data['page'] = 'Leads/addData';
        $data['jenis'] = $this->M_leads->getjenispt();
        $data['status'] = $this->M_leads->getstatus();
        $data['instal'] = $this->M_leads->getinstalasi();
        $data['migrasi'] = $this->M_leads->getmigrasi();
        $data['pelatih'] = $this->M_leads->getpelatihan();
        $data['invo'] = $this->M_leads->getinvoice();
        $data['stat'] = $this->M_leads->getAllSurat();
        $data['sph'] = $this->M_leads->getSph();
        $data['sla'] = $this->M_leads->getSla();
        $this->load->view('Leads/templates/index', $data);
    }


    public function insert()
    {
        $data1 = [
            'name' => $this->input->post('namakampus'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'JenisPT' => $this->input->post('jenispt'),
            'status_member' => $this->input->post('status'),
            'sph' => $this->input->post('sph'),
            'spk' => $this->input->post('spk'),
            'sla' => $this->input->post('sla'),
            'instalasi' => $this->input->post('instalasi'),
            'migrasi_data' => $this->input->post('migrasi'),
            'pelatihan' => $this->input->post('pelatihan'),
            'invoice' => $this->input->post('invoice'),
        ];
        $bsb = $this->M_leads->create($data1);
        if ($bsb) {
            $data2 = [
                'client_id' => $bsb,
                'pic' => $this->input->post('pic'),
                'whatsapp' => $this->input->post('whatsapp'),
                'email' => $this->input->post('email'),
            ];
            // var_dump($data2);
            // exit;
            $insert = $this->M_leads->create2($data2);
            $this->session->set_flashdata('notif', 'Success');
        }
        redirect('leads/data');
    }

    public function delete($id)
    {
        $this->M_leads->deletett($id);
        $this->M_leads->deletet($id);
        $this->session->set_flashdata('notif', 'Success');
        redirect('leads/data');
    }

    public function edit($id = NULL)
    {

        $this->db->select('client.*, wali.*, jenispt.name_pt, migrasi.name_mig, pelatihan.name_pelat, invoice.name_inv, instalasi.name_inst, status_member.name_mem, statussurat.name_sur, sph.name_sp, sla.name_sl');
        $this->db->from('client');
        $this->db->join('wali', 'wali.client_id = client.id');
        $this->db->join('jenispt', 'jenispt.id = client.JenisPT');
        $this->db->join('pelatihan', 'pelatihan.id = client.pelatihan');
        $this->db->join('migrasi', 'migrasi.id = client.migrasi_data');
        $this->db->join('invoice', 'invoice.id = client.invoice');
        $this->db->join('statussurat', 'statussurat.id = client.spk');
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
                'name' => $this->input->post('namakampus', TRUE),
                'provinsi' => $this->input->post('provinsi', TRUE),
                'kota' => $this->input->post('kota', TRUE),
                'JenisPT' => $this->input->post('jenispt', TRUE),
                'status_member' => $this->input->post('status', TRUE),
                'sph' => $this->input->post('sph', TRUE),
                'spk' => $this->input->post('spk', TRUE),
                'sla' => $this->input->post('sla', TRUE),
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
            redirect('leads/data');
        } else {
            $data['data_client'] = $data_client;
            $data['page'] = 'Leads/editData';
            $data['jenis'] = $this->M_leads->getjenispt();
            $data['status'] = $this->M_leads->getstatus();
            $data['instal'] = $this->M_leads->getinstalasi();
            $data['migrasi'] = $this->M_leads->getmigrasi();
            $data['pelatih'] = $this->M_leads->getpelatihan();
            $data['invo'] = $this->M_leads->getinvoice();
            $data['stat'] = $this->M_leads->getAllSurat();
            $data['sph'] = $this->M_leads->getSph();
            $data['sla'] = $this->M_leads->getSla();
            $this->load->view('Leads/templates/index', $data);
        }
    }
}
