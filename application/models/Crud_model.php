<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function editdocu($where,$data,$table)
    {
        $this->db->update($table, $data ,$where);
    }
    public function hapusdc($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('document');
    }
    
}