<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_admin', 'model');
        $this->load->model('M_level', 'modell');
    }
    public function index()
    {
        $data['page'] = 'setting/index';
        $data['title'] = 'Dashboard';

        $this->load->view('setting/templates/index', $data);
    }
}
