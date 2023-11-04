<?php
defined('BASEPATH') or exit('No direct script access allowed');

class setupPengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_billing', 'model');
    }
    public function index()
    {
        $data['title'] = 'Setup Pengeluaran';
        $data['page'] = 'billing/setupPengeluaran';
        $data['kategori'] = $this->model->getKategoriPengeluaran();
        $this->load->view('billing/templates/index', $data);
    }
    public function kategori()
    {
        $data['title'] = 'Kategori';
        $data['page'] = 'billing/kategoriBarang';
        $data['kategori'] = $this->model->getKategoriPengeluaran();
        $this->load->view('billing/templates/index', $data);
    }
    public function tambahkategori()
    {
        $data['title'] = 'Tambah Kategori';
        $data['page'] = 'billing/tambahKategori';
        $this->load->view('billing/templates/index', $data);
    }
    public function add()
    {
        $input = $this->input->post(NULL, TRUE);

        $data['name_kategori'] = $input['kategori'];
        $this->db->insert('kategori_pengeluaran', $data);
        $this->session->set_flashdata('notif', 'Berhasil Menambahkan Kategori');
        redirect('setupPengeluaran');
    }
}
