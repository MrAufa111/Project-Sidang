<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_leads extends CI_Model
{

    public function getjenispt()
    {
        return $this->db->get('jenispt')->result_array();
    }
    public function getAllSurat()
    {
        return $this->db->get('statussurat')->result_array();
    }
    public function getpelatihan()
    {
        return $this->db->get('pelatihan')->result_array();
    }
    public function getstatus()
    {
        return $this->db->get('status_member')->result_array();
    }
    public function getmigrasi()
    {
        return $this->db->get('migrasi')->result_array();
    }
    public function getinstalasi()
    {
        return $this->db->get('instalasi')->result_array();
    }
    public function getinvoice()
    {
        return $this->db->get('invoice')->result_array();
    }
    public function getSla()
    {
        return $this->db->get('sla')->result_array();
    }
    public function getSph()
    {
        return $this->db->get('sph')->result_array();
    }

    function tables()
    {
        $this->db->select('client.*, wali.*, jenispt.name_pt, migrasi.name_mig, pelatihan.name_pelat, invoice.name_inv, instalasi.name_inst, status_member.name_mem, statussurat.name_sur, sph.name_sp, sla.name_sl');
        $this->db->from('client');
        $this->db->join('wali', 'wali.client_id = client.id');
        $this->db->join('jenispt', 'jenispt.id = client.JenisPT');
        $this->db->join('pelatihan', 'pelatihan.id = client.pelatihan');
        $this->db->join('migrasi', 'migrasi.id = client.migrasi_data');
        $this->db->join('invoice', 'invoice.id = client.invoice');
        $this->db->join('statussurat', 'statussurat.id = client.spk');
        $this->db->join('sph', 'sph.id = client.sph');
        $this->db->join('sla', 'sla.id = client.sla');
        $this->db->join('instalasi', 'instalasi.id = client.instalasi');
        $this->db->join('status_member', 'status_member.id = client.status_member');
        $client = $this->db->get()->result_array();
        // var_dump($client);
        // die;
        return $client;
    }

    function create($data1)
    {
        $this->db->insert('client', $data1);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function create2($data2)
    {
        $this->db->insert('wali', $data2);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deletet($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('client');
        
    }

    function deletett($id)
    {
        $this->db->where('client_id', $id);
        $this->db->delete('wali');
    }
}
