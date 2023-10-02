<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_submenu extends CI_model
{
    public function get_submenu_by_menu_id($menu_id)
    {
        $query = $this->db->get_where('user_sub_menu', ['menu_id' => $menu_id]);
        return $query->result_array();
    }

    public function get_menu_category_by_menu_id($menu_id)
    {
        $this->db->select('user_sub_menu.*, user_menu.menu, active.name');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_sub_menu.menu_id = user_menu.id');
        $this->db->join('active AS active', 'user_sub_menu.is_active = active.id');
        $this->db->where('user_menu.id', $menu_id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getsubmenuid($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function getSubmenu()
    {
        $this->db->select('user_sub_menu.*, user_menu.id');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_sub_menu.menu_id = user_menu.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSubMenuById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user_sub_menu');

        return $query->row_array();
    }

    public function updatesubMenu($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }

    public function deletemenu($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
    public function inputsubmenu()
    {
        $data = [
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true),
        ];
        $this->db->insert('user_sub_menu', $data);
    }
}
