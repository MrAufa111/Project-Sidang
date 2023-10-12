<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash extends CI_Controller
{
    public function index()
    {
        $data['title'] = '';
        $data['abc'] = 'user/index';
        $this->load->view('user/templates/index', $data);
    }

    public function document ()
    {
        $data['title'] = '';
        $data['abc'] = 'user/document';
        $data['Document'] = $this->Doc_model->getDoc();
        $data['jenis'] = $this->Doc_model->getJDoc();
        $data['file'] = $this->Doc_model->getJFile();
        $this->load->view('user/templates/index', $data);
    }
    public function print ()
    {
        $data['title'] = '';
        $data['abc'] = 'user/print';
        $this->load->view('user/templates/index', $data);
    }
}