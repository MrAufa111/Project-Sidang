<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Billing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_billing', 'model');
    }
    public function index()
    {
        $data['page'] = 'Billing/index';
        $data['title'] = 'Dashboard';
        $data['billing'] = $this->model->getBilling();
        $this->load->view('billing/templates/index', $data);
    }
}
