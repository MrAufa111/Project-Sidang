<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_billing extends CI_model
{
    public function getBilling()
    {
        $this->db->select('billing.*, client.*, wali.* , status_invoice.name_in, status_aktif.name_ak, status_penagihan.name_pen, currency.*, periode.name_periode');
        $this->db->from('billing');
        $this->db->join('client', 'client.id = billing.client_id');
        $this->db->join('wali', 'wali.client_id = billing.client_id');
        $this->db->join('status_invoice', 'status_invoice.id = billing.status_invoice');
        $this->db->join('status_aktif', 'status_aktif.id = billing.status_aktif');
        $this->db->join('status_penagihan', 'status_penagihan.id = billing.status_penagihan');
        $this->db->join('periode', 'periode.id = billing.periode_penagihan');
        $this->db->join('currency', 'currency.id_bill = billing.id');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getBillingId($id)
    {
        $this->db->select('billing.*, client.*, wali.* , status_invoice.name_in, status_aktif.name_ak, status_penagihan.name_pen, currency.*, periode.name_periode');
        $this->db->from('billing');
        $this->db->join('client', 'client.id = billing.client_id');
        $this->db->join('wali', 'wali.client_id = billing.client_id');
        $this->db->join('status_invoice', 'status_invoice.id = billing.status_invoice');
        $this->db->join('status_aktif', 'status_aktif.id = billing.status_aktif');
        $this->db->join('status_penagihan', 'status_penagihan.id = billing.status_penagihan');
        $this->db->join('periode', 'periode.id = billing.periode_penagihan');
        $this->db->join('currency', 'currency.id_bill = billing.id');
        $this->db->where('billing.id', $id);
        $query = $this->db->get()->row_array();
        // print_r($query);
        // exit;
        return $query;
    }
    public function update($data1, $data2, $id)
    {
        $this->db->trans_start();

        $this->db->where('id', $id);
        $this->db->update('billing', $data1);

        $this->db->where('id_bill', $id);
        $this->db->update('currency', $data2);

        $this->db->trans_complete();

        return ($this->db->trans_status() && $this->db->affected_rows() > 0);
    }
    public function deletebarang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }
    public function countuntung()
    {
        $bulanSaatIni = date('m'); // Mendapatkan bulan saat ini
        $tahunSaatIni = date('Y'); // Mendapatkan tahun saat ini
        $status = 1;
        $this->db->select('SUM(REPLACE(total_tagihan, ".", "")) AS total_tagihan, billing.status_invoice');
        $this->db->from('currency');
        $this->db->join('billing', 'billing.id = currency.id_bill');
        $this->db->where('YEAR(currency.created_at)', $tahunSaatIni);
        $this->db->where('MONTH(currency.created_at)', $bulanSaatIni);
        $this->db->where('billing.status_invoice', $status);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function countpengeluaran()
    {
        $bulanSaatIni = date('m'); // Mendapatkan bulan saat ini
        $tahunSaatIni = date('Y'); // Mendapatkan tahun saat ini

        $this->db->select('pengeluaran.tanggal, SUM(REPLACE(pengeluaran.total_pengeluaran, ".", "")) AS harga');
        $this->db->from('pengeluaran');
        $this->db->join('pengeluaran_barang', 'pengeluaran_barang.id_pengeluaran = pengeluaran.id');
        $this->db->where('YEAR(tanggal)', $tahunSaatIni);
        $this->db->where('MONTH(tanggal)', $bulanSaatIni);
        $query = $this->db->get()->result_array();
        // var_dump($query);
        // die;
        return $query;
    }


    public function tambah_data_billing($data1)
    {
        // var_dump($data1);
        // exit;
        $this->db->insert('billing', $data1);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function tambah_data_currency($data2)
    {
        $this->db->insert('currency', $data2);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function countcus()
    {
        $this->db->select('COUNT(*) as total_count');
        $this->db->from('client');
        $this->db->where('status_member', '3');
        $query = $this->db->get();
        $result = $query->row();
        return $totalCount = $result->total_count;
    }
    public function getEmail($data1)
    {
        $result = $this->db
            ->select('email')
            ->get_where('wali', ['client_id' => $data1])
            ->row_array();

        return $result['email'];
    }
    public function getCus()
    {
        $bulanSaatIni = date('m');
        $tahunSaatIni = date('Y');
        $this->db->select('billing.* , client.name_client , status_invoice.name_in, currency.total_tagihan');
        $this->db->from('billing');
        $this->db->join('client', 'client.id = billing.client_id');
        $this->db->join('status_invoice', 'status_invoice.id = billing.status_invoice');
        $this->db->join('currency', 'currency.id_bill = billing.id');
        $this->db->where('YEAR(billing.created_at)', $tahunSaatIni);
        $this->db->where('MONTH(billing.created_at)', $bulanSaatIni);
        $this->db->where('billing.status_invoice', '1');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }
    public function getKategoriPengeluaran()
    {
        return $this->db->get('kategori_pengeluaran')->result_array();
    }
    public function insertPengeluaran($data1)
    {
        $this->db->insert('pengeluaran', $data1);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function insertBarangPengeluaran($data2)
    {
        $this->db->insert('pengeluaran_barang', $data2);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getPengeluaran()
    {
        $this->db->select('pengeluaran.*,  kategori_pengeluaran.name_kategori');
        $this->db->from('pengeluaran');
        // $this->db->join('pengeluaran_barang', 'pengeluaran_barang.id_pengeluaran = pengeluaran.id');
        $this->db->join('kategori_pengeluaran', 'kategori_pengeluaran.id = pengeluaran.kategori_pengeluaran');
        return $this->db->get()->result_array();
    }
    public function getPengeluaranById($id)
    {
        $this->db->select('pengeluaran.*,  kategori_pengeluaran.name_kategori');
        $this->db->from('pengeluaran');
        // $this->db->join('pengeluaran_barang', 'pengeluaran_barang.id_pengeluaran = pengeluaran.id');
        $this->db->join('kategori_pengeluaran', 'kategori_pengeluaran.id = pengeluaran.kategori_pengeluaran');
        $this->db->where('pengeluaran.id', $id);
        return $this->db->get()->row_array();
    }
    public function barang()
    {
        return $this->db->get('pengeluaran_barang')->result_array();
    }
    public function deletebarangg($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengeluaran_barang');
    }
    public function updatepengeluaran($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pengeluaran', $data);
    }
}
