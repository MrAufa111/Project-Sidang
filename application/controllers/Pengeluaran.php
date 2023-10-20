<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'billing/pemasukan';
        $data['title'] = 'Setup Pemasukan';
        $this->load->view('billing/templates/index', $data);
    }
}
