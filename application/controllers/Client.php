<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['page'] = 'client/index';
        $data['title'] = 'Client';
        $this->load->view('client/templates/index', $data);
    }
}
