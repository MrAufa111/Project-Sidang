<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Doc_model');
        check_login();
    }
    public function index()
    {
        $data['title'] = '';
        $data['page'] = 'document/index';
        $this->load->view('document/templates/index', $data);
    }
    public function dashboard()
    {
        $data['title'] = '';
        $data['page'] = 'document/dashboard';
        $this->load->view('document/templates/index', $data);
    }

    public function document()
    {
        $data['title'] = '';
        $data['page'] = 'document/document';
        $data['Document'] = $this->Doc_model->getDoc();
        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $this->load->view('document/templates/index', $data);
    }
    public function tamdata()
    {
        $data['title'] = '';
        $data['page'] = 'document/tamdata';
        $data['Document'] = $this->Doc_model->getDoc();
        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $this->load->view('document/templates/index', $data);
    }
    public function editdoc($id)
    {
        $data['title'] = '';
        $data['page'] = 'document/edit';
        $data['document'] = $this->db->get_where('document', ['id' => $id])->row_array();
        // var_dump($data['document']);
        // exit;
        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $this->load->view('document/templates/index', $data);
    }

    public function print()
    {
        $data['title'] = '';
        $data['page'] = 'document/print';
        $this->load->view('document/templates/index', $data);
    }
}
