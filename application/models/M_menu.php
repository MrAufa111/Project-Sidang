<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_model
{
    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu`. * ,`user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }
    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function inputmenu()
    {
        $is_active = $this->input->post('is_active');
        $status = ($is_active == 1) ? 1 : 0;
        $data = [
            'menu' => $this->input->post('menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'kategori' => $this->input->post('kategori'),
            'Active' => $status
        ];

        $this->db->insert('user_menu', $data);
    }

    public function updateMenu($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }

    public function deletemenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }
    public function getmenustatus($kategori)
    {
        $this->db->select('user_menu.*, active.name');
        $this->db->from('user_menu');
        $this->db->join('dash_menu', 'dash_menu.name = user_menu.kategori');
        $this->db->join('active', 'user_menu.Active  = active.id');
        $this->db->where('user_menu.kategori', $kategori);

        $query = $this->db->get()->result_array();
        
        return $query;
    }
    public function getMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }
    public function countAll()
    {
        return $this->db->count_all('user_menu');
    }
}
