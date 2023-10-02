<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Setup_billing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_billing', 'Model');
        check_login();
    }
    public function index()
    {
        $data['title'] = 'Set Up Billing';
        $data['page'] = 'billing/setup';
        $data['billing'] = $this->Model->getBilling();
        // var_dump($data['billing']);
        // exit;
        $this->load->view('billing/templates/index', $data);
    }
    public function tambah()
    {

        $data['title'] = 'Buat Invoice';
        $data['page'] = 'billing/tambah';
        $data['statusa'] = $this->db->get('status_aktif')->result_array();
        $data['statusp'] = $this->db->get('status_penagihan')->result_array();
        $data['periode'] = $this->db->get('periode')->result_array();
        $this->load->view('billing/templates/index', $data);
    }
    public function edit($id)
    {
        $uri = $this->uri->segment(3);
        $data['title'] = 'Edit Billing';
        $data['page'] = 'billing/edit';
        $data['statusa'] = $this->db->get('status_aktif')->result_array();
        $data['statusp'] = $this->db->get('status_penagihan')->result_array();
        $data['periode'] = $this->db->get('periode')->result_array();
        $data['bill2'] = $this->db->get_where('barang', ['id_bill' => $uri])->result_array();
        $data['bill'] = $this->Model->getBillingId($id);
        $this->load->view('billing/templates/index', $data);
    }
    public function update()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $is_active = $input['sinvoice'];
        $status = ($is_active == 1) ? 1 : 0;
        if ($this->input->post()) {
            $data1['client_id'] = $input['id'];
            $data1['tanngal_awal'] = $input['tanggalawal'];
            $data1['tanggal_akhir'] = $input['tanggalakhir'];
            $data1['status_aktif'] = $input['statusaktif'];
            $data1['status_penagihan'] = $input['statuspen'];
            $data1['periode_penagihan'] = $input['periode'];
            $data1['status_invoice'] = $status;

            $data2['nominal_tagihan'] = $input['nominaltagihan'];
            $data2['potongan'] = $input['potongan'];
            $data2['total_tagihan'] = $input['totaltagihan'];


            $this->Model->update($data1, $data2, $id);

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('error', 'Error updating data.');
            } else {
                $this->session->set_flashdata('notif', 'Data has been updated successfully.');
            }

            redirect('setup_billing');
        } else {
            $this->session->set_flashdata('error', 'Error updating data.');
            redirect('setup_billing');
        }
    }
    public function deletebarang($id)
    {
        $this->Model->deletebarang($id);
        $this->session->set_flashdata('notif', 'Data has been updated successfully.');
        redirect('setup_billing/edit/' . $id);
    }
    public function addbarang()
    {
        $data['id_bill'] = $this->input->post('id');
        $data['name_barang'] = $this->input->post('barang');
        $data['harga'] = $this->input->post('harga');
        $this->db->insert('barang', $data);
    }
}
