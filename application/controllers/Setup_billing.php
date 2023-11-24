<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Setup_billing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_billing', 'Model');
        $this->load->library('PHPMailer_lib');
        check_login();
    }
    public function index()
    {
        $data['title'] = 'Set Up Billing';
        $data['page'] = 'billing/setup';
        $data['billing'] = $this->Model->getBilling();
        // var_dump($data['billing']);
        // exit;
        $this->load->view('billing/templates/index', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Buat Invoice';
        $data['page'] = 'billing/tambah';
        $data['client'] = $this->db->get('client')->result_array();
        $data['statusa'] = $this->db->get('status_aktif')->result_array();
        $data['statusp'] = $this->db->get('status_penagihan')->result_array();
        $data['periode'] = $this->db->get('periode')->result_array();
        $this->load->view('billing/templates/index', $data);
    }
    public function insertData()
    {
        $input = $this->input->post(NULL, TRUE);
        if ($this->input->post()) {
            $data1 = array(
                'client_id' => $input['namakampus'],
                'status_aktif' => $input['statusaktif'],
                'status_penagihan' => $input['statuspen'],
                'tanngal_awal' => $input['tanggalawal'],
                'tanggal_akhir' => $input['tanggalakhir'],
                'periode_penagihan' => $input['periode'],
                'status_invoice' => 0
            );

            $id = $this->Model->tambah_data_billing($data1);

            if ($id) {
                $data2 = array(
                    'id_bill' => $id,
                    'nominal_tagihan' => $input['nominaltagihan'],
                    'potongan' => $input['potongan'],
                    'total_tagihan' => $input['totaltagihan'],
                );

                $cur = $this->Model->tambah_data_currency($data2);

                if ($cur) {
                    $input_data = $this->input->post('data');

                    if ($input_data) {
                        $data = json_decode($input_data, true);

                        if ($data !== null) {
                            foreach ($data as $item) {
                                $insert_data = array(
                                    'id_bill' => $id,
                                    'name_barang' => $item['name_barang'],
                                    'harga' => $item['harga']
                                );
                                $this->db->insert('barang', $insert_data);
                                $this->session->set_flashdata('notif', 'Invoice Berhasil Di Buat!!');
                                redirect('Setup_billing');
                            }
                        } else {
                            $this->session->set_flashdata('error', 'Invalid JSON data.');
                            redirect('Setup_billing/tambah');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', 'Failed to save data to currency table.');
                    redirect('Setup_billing/tambah');
                }
            } else {
                $this->session->set_flashdata('error', 'Failed to save data to billing table.');
                redirect('Setup_billing/tambah');
            }
        }
    }


    public function edit($id)
    {
        $uri = $this->uri->segment(3);
        $data['title'] = 'Edit Billing';
        $data['page'] = 'billing/edit';
        $data['client'] = $this->db->get('client')->result_array();
        $data['statusa'] = $this->db->get('status_aktif')->result_array();
        $data['statusp'] = $this->db->get('status_penagihan')->result_array();
        $data['periode'] = $this->db->get('periode')->result_array();
        $data['bill2'] = $this->db->get_where('barang', ['id_bill' => $uri])->result_array();
        $data['bill'] = $this->Model->getBillingId($id);
        $this->load->view('billing/templates/index', $data);
    }
    public function update()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $is_active = $input['sinvoice'];
        $status = ($is_active == 1) ? 1 : 0;
        if ($this->input->post()) {
            $data1['client_id'] = $input['namakampus'];
            $data1['tanngal_awal'] = $input['tanggalawal'];
            $data1['tanggal_akhir'] = $input['tanggalakhir'];
            $data1['status_aktif'] = $input['statusaktif'];
            $data1['status_penagihan'] = $input['statuspen'];
            $data1['periode_penagihan'] = $input['periode'];
            $data1['status_invoice'] = $status;

            $data2['nominal_tagihan'] = $input['nominaltagihan'];
            $data2['potongan'] = $input['potongan'];
            $data2['total_tagihan'] = $input['totaltagihan'];

            // var_dump($data1, $data2);
            // die;
            $this->Model->update($data1, $data2, $id);

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('error', 'Error updating data.');
            } else {
                $this->session->set_flashdata('notif', 'Data has been updated successfully.');
            }

            redirect('setup_billing');
        } else {
            $this->session->set_flashdata('error', 'Error updating data.');
            redirect('setup_billing');
        }
    }
    public function deletebarang($id)
    {
        $this->Model->deletebarang($id);
        $this->session->set_flashdata('notif', 'Data has been updated successfully.');
        redirect('setup_billing/edit/' . $id);
    }
    public function addbarang()
    {
        $data['id_bill'] = $this->input->post('id');
        $data['name_barang'] = $this->input->post('barang');
        $data['harga'] = $this->input->post('harga');
        $this->db->insert('barang', $data);
    }
    public function getclient()
    {
        $data1 = $this->input->post('selectedValue');
        $email = $this->Model->getEmail($data1);
        echo json_encode(array("email" => $email));
    }
    public function kirimemail()
    {
        $email = $this->input->post('email');
        $username = $this->input->post('username');

        $mail = $this->phpmailer_lib->load();
        $mail->ClearAddresses();
        $mail->ClearAttachments();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mraufa06@gmail.com';
        $mail->Password = 'upaopftjiyeueyiq';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('mraufa06@gmail.com', 'Mail');
        $mail->addReplyTo('mraufa06@gmail.com', 'Mail');
        $mail->addAddress('mochammadrifqiaufa02@gmail.com');


        // $email_data = [
        //     // 'content' => $email_content,
        //     'receiver_name' => $username, // Nama penerima sudah disertakan dalam data
        // ];
        // $email_template = $this->load->view('admin/member/email', $email_data, true);

        $mail->isHTML(true);
        $mail->Subject = 'Aktifasi Email';
        $mail->Body = 'coobaa';

        var_dump($mail->send());
        exit;
        if ($mail->send()) {
            $this->session->set_flashdata('notif', 'Member Berhasil Di Update dan Email Terkirim');
        } else {
            print_r($mail->ErrorInfo);
            exit;
            $this->session->set_flashdata('notif', 'Member Berhasil Di Update, tetapi Email Gagal Terkirim' . $mail->ErrorInfo);
        }
    }
    public function gmail()
    {
        $this->load->view('billing/templates/billing_templates');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('billing');

        $this->db->where('id_bill', $id);
        $this->db->delete('currency');

        $this->db->where('id_bill', $id);
        $this->db->delete('barang');

        $this->session->set_flashdata('notif', 'Invoice Berhasil Di Hapus');
        redirect('Setup_billing');
    }
    public function Spreadsheet_export()
    {
        header('Content-Type: application/vnd.ms.excel');
        header('Content-Disposition: attachment;filename="Billing.xlsx"');

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama Kampus');
        $activeWorksheet->setCellValue('C1', 'Email Kampus');
        $activeWorksheet->setCellValue('D1', 'Status Aktif');
        $activeWorksheet->setCellValue('E1', 'Nominal Tagihan');
        $activeWorksheet->setCellValue('F1', 'Potongan');
        $activeWorksheet->setCellValue('G1', 'Total Tagihan');
        $activeWorksheet->setCellValue('H1', 'Tanggal Awal');
        $activeWorksheet->setCellValue('I1', 'Tanggal Akhir');
        $activeWorksheet->setCellValue('J1', 'Periode Penagihan');
        $activeWorksheet->setCellValue('K1', 'Status Penagihan');
        $activeWorksheet->setCellValue('L1', 'Status');

        $trans = $this->Model->getBilling();
        $o = 1;
        $i = 2;

        foreach ($trans as $t) {
            $activeWorksheet->setCellValue('A' . $i, $o++);
            $activeWorksheet->setCellValue('B' . $i, $t['name_client']);
            $activeWorksheet->setCellValue('C' . $i, $t['email']);
            $activeWorksheet->setCellValue('D' . $i, $t['name_ak']);
            $activeWorksheet->setCellValue('E' . $i, $t['nominal_tagihan']);
            $activeWorksheet->setCellValue('F' . $i, $t['potongan']);
            $activeWorksheet->setCellValue('G' . $i, $t['total_tagihan']);
            $activeWorksheet->setCellValue('H' . $i, $t['tanngal_awal']);
            $activeWorksheet->setCellValue('I' . $i, $t['tanggal_akhir']);
            $activeWorksheet->setCellValue('J' . $i, $t['name_periode']);
            $activeWorksheet->setCellValue('K' . $i, $t['name_pen']);
            $activeWorksheet->setCellValue('L' . $i, $t['name_in']);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }
}
