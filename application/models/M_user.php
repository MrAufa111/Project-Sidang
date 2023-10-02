<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_model
{
    public function getUser()
    {
        $this->db->select('user.*, user_role.role, Active.name');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role_id', 'left');
        $this->db->join('Active', 'Active.id = user.is_active', 'left');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
