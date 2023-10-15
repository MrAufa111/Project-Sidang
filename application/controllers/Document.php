<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Controller
{
    public function index()
    {
        $data['title'] = '';
        $data['abc'] = 'document/index';
        $this->load->view('document/templates/index', $data);
    }

    public function document()
    {
        $data['title'] = '';
        $data['abc'] = 'document/document';
        $data['Document'] = $this->Doc_model->getDoc();
        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $this->load->view('document/templates/index', $data);
    }
    public function print()
    {
        $data['title'] = '';
        $data['abc'] = 'document/print';
        $this->load->view('document/templates/index', $data);
    }
}
