<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dash', 'model');
        check_login();
    }
    public function index()
    {
        $data['page'] = 'dashboard/index';
        $data['dashboard'] = $this->model->getDashboard();
        $this->load->view('dashboard/templates/index', $data);
    }
}
