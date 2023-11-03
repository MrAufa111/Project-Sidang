<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }
    public function index()
    {
        $data['page'] = 'billing/pengeluaran';
        $data['title'] = 'Setup Pemasukan';
        $this->load->view('billing/templates/index', $data);
    }
}
