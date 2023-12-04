<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doc_model extends CI_Model
{
    public function getData($table)
    {
        return $this->db->get($table);
    }
    public function getDoc()
    {
        $this->db->select('document.*,client.name_client');
        $this->db->from('document');
        $this->db->join('client', 'document.client_id = client.id');
        return $this->db->get();
    }
    public function getDataJoin($tblJoin,$join,$table)
    {
        return $this->db->select('*')
                    ->from($table)
                    ->join($tblJoin,$join)
                    ->get();
    }
    public function getJDoc()
    {
        return $this->db->get('jenis_document')->result_array();
    }
    public function getJfile()
    {
        return $this->db->get('jenis_file')->result_array();
    }
    public function getJoin()
    {
        $this->db->select('client.name_client, wali.email');
        $this->db->from('client');
        $this->db->join('wali', 'wali.client_id = client.id');
        return $this->db->get()->result_array();
    }
    public function getEmail($data1)
    {
        $result = $this->db
            ->select('email')
            ->get_where('wali', ['client_id' => $data1])
            ->row_array();

        return $result['email'];
    }
    public function getEmailId($data2)
    {
        $result = $this->db
            ->select('email')
            ->get_where('wali', ['client_id' => $data2])
            ->row_array();
    }
}