<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_document extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud_model');
    }
    public function tamdoc()
    {
        $data['title'] = '';
        $data['page'] = 'user/tamdata';
        $this->load->view('user/templates/index', $data);
    }
    public function editdoc($id)
    {
        $data = array(
            'client_id' => $this->input->post('client_id'),
            'name' => $this->input->post('name'),
            'jenis_document' => $this->input->post('jenis_document'),
            'content' => $this->input->post('content'),
            'file' => $this->input->post('file'),
            'tanggal_pembuatan' => $this->input->post('tanggal_pembuatan'),
            'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),
        );
        $where = array(
            'id' => $id,
        );
        $this->Crud_model->editdocu($where, $data, 'document');
        $this->session->set_flashdata('ingfo', '<div class="alert alert-success" role="alert">Update success! </div>');
        redirect('Dash/document');
    }
    public function hapusdoc($id)
    {
        $this->Crud_model->hapusdc($id);
        $this->session->set_flashdata('ingfo', '<div class="alert alert-success" role="alert">Delete success! </div>');
        redirect('Dash/document');
    }
}
