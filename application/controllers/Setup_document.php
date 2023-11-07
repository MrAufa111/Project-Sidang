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
            'name' => $this->input->post('name'),
            'jenis_document' => $this->input->post('jenis_document'),
            'file' => $this->input->post('file'),
            'content' => $this->input->post('content'),
            'tanggal_pembuatan' => $this->input->post('tanggal_pembuatan'),
            'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),

        ];
        $this->db->insert('document', $data);
        $this->session->set_flashdata('ingfo', '<div class="alert alert-success" role="alert">
            New sub menu added</div>');
        redirect('Dash/document');
    }
    public function tamdoc()
    {
        $data['title'] = '';
        $data['page'] = 'document/tamdata';
        $this->load->view('document/templates/index', $data);
        $this->session->set_flashdata('ingfo', '<div class="alert alert-success" role="alert">Add success! </div>');
        redirect('Dash/document');
    }
    public function editdoc($id)
    {
        $data['title'] = '';
        $data['page'] = 'user/edit';
        $data['document'] = $this->db->get_where('document', ['id' => $id])->row_array();

        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $this->load->view('user/templates/index', $data);
    }
    public function hapusdoc($id)
    {
        $this->Crud_model->hapusdc($id);
        $this->session->set_flashdata('ingfo', '<div class="alert alert-success" role="alert">Delete success! </div>');
        redirect('Dash/document');
    }
}
