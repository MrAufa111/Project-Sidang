<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_client extends CI_Model
{
    // public function tables()
    // {
    //     $this->db->select('client.*, wali.pic, wali.whatsapp, wali.email, jenispt.name_pt, status_member.name_mem, sph.name_sp  ');
    //     $this->db->from('client');
    //     $this->db->join('wali', 'wali.client_id = client.id', 'inner');
    //     $this->db->join('jenispt', 'jenispt.id = client.JenisPT');
    //     // $this->db->join('pelatihan', 'pelatihan.id = client.pelatihan');
    //     // $this->db->join('migrasi', 'migrasi.id = client.migrasi_data');
    //     // $this->db->join('invoice', 'invoice.id = client.invoice');
    //     // $this->db->join('status_surat', 'status_surat.id = client.spk');
    //     $this->db->join('sph', 'sph.id = client.sph');
    //     // $this->db->join('sla', 'sla.id = client.sla');
    //     // $this->db->join('instalasi', 'instalasi.id = client.instalasi');
    //     $this->db->join('status_member', 'status_member.id = client.status_member');
    //     $client = $this->db->get()->result_array();


    //     return $client;
    // }
    public function tables()
    {
        $this->db->select('client.*, wali.pic, wali.whatsapp, wali.email, jenispt.name_pt, migrasi.name_mig, pelatihan.name_pelat, invoice.name_inv, instalasi.name_inst, status_member.name_mem, status_surat.name_sur, sph.name_sp, sla.name_sl');
        $this->db->from('client');
        $this->db->join('wali', 'wali.client_id = client.id', 'inner');
        $this->db->join('jenispt', 'jenispt.id = client.JenisPT');
        $this->db->join('pelatihan', 'pelatihan.id = client.pelatihan');
        $this->db->join('migrasi', 'migrasi.id = client.migrasi_data');
        $this->db->join('invoice', 'invoice.id = client.invoice');
        $this->db->join('status_surat', 'status_surat.id = client.spk');
        $this->db->join('sph', 'sph.id = client.sph');
        $this->db->join('sla', 'sla.id = client.sla');
        $this->db->join('instalasi', 'instalasi.id = client.instalasi');
        $this->db->join('status_member', 'status_member.id = client.status_member');
        $client = $this->db->get()->result_array();


        return $client;
    }
}
