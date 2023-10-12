<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doc_model extends CI_Model
{
    public function getDoc()
    {
        return $this->db->get('document')->result_array();
    }
    public function getJDoc()
    {
        return $this->db->get('jenis_document')->result_array();
    }
    public function getJfile()
    {
        return $this->db->get('jenis_file')->result_array();
    }
}