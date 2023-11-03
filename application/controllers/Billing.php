<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Billing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_billing', 'model');
    }
    public function index()
    {
        $data['page'] = 'billing/index';
        $data['title'] = 'Dashboard';
        $data['get'] = $this->model->countuntung();
        // var_dump($data['get']);
        // exit;
        $data['pen'] = $this->model->countpengeluaran();
        $data['custommer'] = $this->model->getCus();
        // $data1['pemasukan'] = $this->model->countuntung(); // Mengambil pemasukan
        // $data1['pengeluaran'] = $this->model->countpengeluaran(); // Mengambil pengeluaran
        // $data1['keuntungan'] = $data1['pemasukan'] - $data1['pengeluaran']; // Menghitung keuntungan
        // var_dump($data1);
        // die;
        $data['cus'] = $this->model->countcus();
        $data['billing'] = $this->model->getBilling();
        $this->load->view('billing/templates/index', $data);
    }
    public function keuntungan()
    {
        $data['pemasukan'] = $this->model->countuntung();
        $data['pengeluaran'] = $this->model->countpengeluaran();

        echo json_encode($data);
    }
}
