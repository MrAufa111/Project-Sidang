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
        $data['client'] = $this->db->get('client')->result_array();
        $data['statusa'] = $this->db->get('status_aktif')->result_array();
        $data['statusp'] = $this->db->get('status_penagihan')->result_array();
        $data['periode'] = $this->db->get('periode')->result_array();
        $this->load->view('billing/templates/index', $data);
    }
    public function insertData()
    {
        $input = $this->input->post(NULL, TRUE);


        $data1 = array(
            $is_active = $input['sinvoice'],
            $status = ($is_active == 1) ? 1 : 0,
            'client_id' => $input['namakampus'],
            'status_aktif' => $input['statusaktif'],
            'status_penagihan' => $input['statuspen'],
            'tanggal_awal' => $input['tanggalawal'],
            'tanggal_akhir' => $input['tanggalakhir'],
            'periode_penagihan' => $input['periode'],
            'status_invoice' => $status
        );

        $id = $this->Model->tambah_data_billing($data1);

        if ($id) {
            $data2 = array(
                'id_bill' => $id,
                'nominal_tagihan' => $input['nominaltagihan'],
                'potongan' => $input['potongan'],
                'total_tagihan' => $input['totaltagihan'],
                'created_at' => time(),
            );

            $cur = $this->Model->tambah_data_currency($data2);

            if ($cur) {
                $this->session->set_flashdata('notif', 'Data has been saved successfully.');
                $input_data = $this->input->post('data');

                if ($input_data) {
                    $data = json_decode($input_data, true);

                    if ($data !== null) {
                        foreach ($data as $item) {
                            $insert_data = array(
                                'id_bill' => $id,
                                'name_barang' => $item['name_barang'],
                                'harga' => $item['harga']
                            );

                            $this->db->insert('barang', $insert_data);
                        }
                        $this->session->set_flashdata('notif', 'Data has been saved successfully.');
                        redirect('Setup_billing');
                    } else {
                        $this->session->set_flashdata('error', 'Invalid JSON data.');
                        redirect('Setup_billing');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Failed to save data to currency table.');
                redirect('Setup_billing');
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to save data to billing table.');
            redirect('Setup_billing');
        }
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
