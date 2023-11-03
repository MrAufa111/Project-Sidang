<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Controller
{
    public function __construct()
    {
        check_login();
    }
    public function index()
    {
        $data['title'] = '';
        $data['page'] = 'document/index';
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
    public function print()
    {
        $data['title'] = '';
        $data['page'] = 'document/print';
        $this->load->view('document/templates/index', $data);
    }
}
