<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_level extends CI_model
{
    public function getLevel()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function updaterole($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }
    public function getRole($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }
    public function getMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function update_access($role_id, $menu_id, $action, $value)
    {
        $data = array(
            $action  => $value
        );


        $this->db->where('role_id', $role_id);
        $this->db->where('menu_id', $menu_id);
        $this->db->update('user_access_menu', $data);
    }
}
