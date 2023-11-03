<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_client');
        check_login();
    }
    public function index()
    {
        $data['title'] = 'Client';
        $data['page'] = 'client/index';
        $data['tables'] = $this->M_client->tables();
        $this->load->view('client/templates/index', $data);
    }
}
