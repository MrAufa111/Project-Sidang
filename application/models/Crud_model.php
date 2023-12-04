<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('document', $data);
    }
    public function deletedataa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}