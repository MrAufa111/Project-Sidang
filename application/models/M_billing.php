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
}
