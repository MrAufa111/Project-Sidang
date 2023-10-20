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
        $data['page'] = 'billing/index';
        $data['title'] = 'Dashboard';
        $data['get'] = $this->model->countuntung();
        // var_dump($data['get']);
        // exit;
        $data['billing'] = $this->model->getBilling();
        $this->load->view('billing/templates/index', $data);
    }
    public function keuntungan()
    {
        $data = $this->model->countuntung();
        echo json_encode($data);
    }
}
