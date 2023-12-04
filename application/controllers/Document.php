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
        $join = 'document.client_id = client.id';
        $tblJoin = 'document';
        $data['doc'] = $this->Doc_model->getDataJoin($tblJoin,$join,'client')->result();
        $data['docid'] = $this->Doc_model->getData('document')->result();
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
        $data['client'] = $this->db->get('client')->result_array();
        $this->load->view('document/templates/index', $data);
    }
    public function editdc($id)
    {
        $data['title'] = '';
        $data['page'] = 'document/edit';
        $data['document'] = $this->db->get_where('document', ['id' => $id])->row_array();
        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $data['client'] = $this->Doc_model->getData('client')->result();
        $this->load->view('document/templates/index', $data);
    }

    public function print()
    {
        $data['title'] = '';
        $data['page'] = 'document/print';
        $this->load->view('document/templates/index', $data);
    }
    public function getclient()
    {
        $data1 = $this->input->post('selectedValue');
        $email = $this->Doc_model->getEmail($data1);
        echo json_encode(array("email" => $email));
    }
}
