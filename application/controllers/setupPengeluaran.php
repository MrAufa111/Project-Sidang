<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    public function insert()
    {
        $input = $this->input->post(NULL, TRUE);
        if ($this->input->post()) {
            $data1 = array(
                'kategori_pengeluaran' => $input['kategori'],
                'tanggal' => $input['tanggal'],
                'penanggung_jawab' => $input['penanggung'],
                'name_toko' => $input['toko'],
                'total_pengeluaran' => $input['total_tagihan'],
            );

            $id = $this->model->insertPengeluaran($data1);

            if ($id) {
                $input_data = $this->input->post('data');
                if ($input_data) {
                    $data_barang = array(); // Buat array untuk data barang

                    if ($input_data !== null) {
                        foreach ($input_data as $item) {
                            // Kumpulkan data barang dalam array
                            $data_barang[] = array(
                                'id_pengeluaran' => $id,
                                'barang' => $item['name_barang'],
                                'qyt' => $item['qyt'],
                                'harga_satuan' => $item['hargaSatuan'],
                                'total_barang' => $item['harga'],
                            );
                        }


                        $this->db->insert_batch('pengeluaran_barang', $data_barang);
                        $this->session->set_flashdata('notif', 'Pengeluaran Berhasil Di Input');
                    } else {
                        $this->session->set_flashdata('error', 'Invalid JSON data.');
                        redirect('SetupPengeluaran');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Failed to save data to billing table.');
                redirect('SetupPengeluaran');
            }
        }
    }

    public function add()
    {
        $input = $this->input->post(NULL, TRUE);

        $data['name_kategori'] = $input['kategori'];
        $this->db->insert('kategori_pengeluaran', $data);
        $this->session->set_flashdata('notif', 'Berhasil Menambahkan Kategori');
        redirect('setupPengeluaran');
    }
    public function data()
    {
        $data['title'] = 'Pengeluaran Data';
        $data['page'] = 'billing/pengeluaranData';
        // $data['ww'] = $this->model->getPengeluaranE();
        $data['pengeluaran'] = $this->model->getPengeluaran();
        $this->load->view('billing/templates/index', $data);
    }
    public function pageEdit($id)
    {
        $data['title'] = 'Edit Pengeluaran';
        $data['page'] = 'billing/editPengeluaran';
        $data['pengeluaran'] = $this->model->getPengeluaranById($id);
        $data['kategori'] = $this->model->getKategoriPengeluaran();
        $data['barang'] = $this->model->barang();
        $this->load->view('billing/templates/index', $data);
    }
    public function addbarang()
    {
        $data['id_pengeluaran'] = $this->input->post('id');
        $data['barang'] = $this->input->post('barang');
        $data['qyt'] = $this->input->post('kuantitas');
        $data['harga_satuan'] = $this->input->post('harga');
        $data['total_barang'] = $this->input->post('total_tagihan');
        $this->db->insert('pengeluaran_barang', $data);
    }
    public function deletebarang($id)
    {
        $this->model->deletebarangg($id);
    }
    public function editPengeluaran()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $data['kategori_pengeluaran'] = $input['kategori'];
        $data['tanggal'] = $input['tanggal'];
        $data['penanggung_jawab'] = $input['penanggung'];
        $data['name_toko'] = $input['toko'];
        $data['total_pengeluaran'] = $input['total'];

        $this->model->updatepengeluaran($id, $data);
        $this->session->set_flashdata('notif', 'Berhasil Mengubah Data Pengeluaran');
        redirect('setupPengeluaran/data');
    }

    public function deletePengeluaran($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengeluaran');

        $this->db->where('id_pengeluaran', $id);
        $this->db->delete('pengeluaran_barang');
        $this->session->set_flashdata('notif', 'Berhasil Menghapus Pengeluaran');
        redirect('setupPengeluaran/data');
    }
    public function Export()
    {
        header('Content-Type: application/vnd.ms.excel');
        header('Content-Disposition: attachment;filename="Pengeluaran.xlsx"');

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama kategori');
        $activeWorksheet->setCellValue('C1', 'Tanggal');
        $activeWorksheet->setCellValue('D1', 'Nama Toko');
        $activeWorksheet->setCellValue('E1', 'Penanggung Jawab');
        $activeWorksheet->setCellValue('F1', 'Barang');
        $activeWorksheet->setCellValue('G1', 'qyt');
        $activeWorksheet->setCellValue('H1', 'Harga Satuan Barang');
        $activeWorksheet->setCellValue('I1', 'Total');

        $trans = $this->model->getPengeluaranE();
        $o = 1;
        $i = 2;

        foreach ($trans as $t) {
            $activeWorksheet->setCellValue('A' . $i, $o++);
            $activeWorksheet->setCellValue('B' . $i, $t['name_kategori']);
            $activeWorksheet->setCellValue('C' . $i, $t['tanggal']);
            $activeWorksheet->setCellValue('D' . $i, $t['name_toko']);
            $activeWorksheet->setCellValue('E' . $i, $t['penanggung_jawab']);
            $activeWorksheet->setCellValue('F' . $i, $t['barang']);
            $activeWorksheet->setCellValue('G' . $i, $t['qyt']);
            $activeWorksheet->setCellValue('H' . $i, $t['harga_satuan']);
            $activeWorksheet->setCellValue('I' . $i, $t['total_barang']);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }
}
