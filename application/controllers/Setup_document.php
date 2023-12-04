<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_document extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('Crud_model');
    }
    public function tambah()
    {
        $data = [
            'client_id' => $this->input->post('client_id'),
            'jenis_document' => $this->input->post('jenis_document'),
            'file' => $this->input->post('file'),
            'content' => $this->input->post('content'),
            'tanggal_pembuatan' => $this->input->post('tanggal_pembuatan'),
            'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),

        ];
        // var_dump($data);
        // die;
        $this->db->insert('document', $data);
        $this->session->set_flashdata('ingfo', 'New data success added');
        redirect('Document/document');
    }
    public function tamdoc()
    {
        $data['title'] = '';
        $data['page'] = 'document/tamdata';
        $this->load->view('document/templates/index', $data);
        $this->session->set_flashdata('ingfo', 'New data success added');
        redirect('Document/document');
    }
    public function editdc($id)
    {
        $data['title'] = '';
        $data['page'] = 'document/edit';
        $data['document'] = $this->db->get_where('document', ['id' => $id])->row_array();
       
        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $data['email'] = $this->Doc_model->getEmailId();

        $this->load->view('document/templates/index', $data);
        redirect('Document/document');
    }
    public function update()
    {
        $input = $this->input->post(NULL, TRUE);
        if ($this->input->post()) {
            $id = $input['id'];
            $data['client_id'] = $input['client'];
            $data['jenis_document'] = $input['jenis_document'];
            $data['file'] = $input['file'];
            $data['content'] = $input['content'];
            $data['tanggal_pembuatan'] = $input['tanggal_pembuatan'];
            $data['tanggal_pengiriman'] = $input['tanggal_pengiriman'];

            $this->Crud_model->update($id, $data);

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('ingfo', 'Data has been updated successfully..');
                redirect('Document/document');
            } else {
                $this->session->set_flashdata('ingfo', 'Data has been updated successfully.');
                redirect('Document/document');
            }

        } else {
            $this->session->set_flashdata('error', 'Error updating data.');
            redirect('Setup_document/edit');
        }
    }
    public function deletedata($id)
    {
        $where = array(
            'id' => $id,
        );
        $this->Crud_model->deletedataa($where, 'document');
        $this->session->set_flashdata('ingfo', 'Berhasil Di Hapus');
        redirect('Document/document');
    }
}
