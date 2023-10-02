<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_model
{
    public function getUserId($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
    public function getUserNyoba()
    {
        $this->db->select('user.*, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $query = $this->db->get();

        return $query->result_array();
    }
    public function UpdateMenu($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
