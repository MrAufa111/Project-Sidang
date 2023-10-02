<?php
function side()
{
    $ci = get_instance();
    $dash = $ci->db->get('dash_menu')->result_array();
    $role_id = $ci->session->userdata('role_id');
    $ci->db->select('user_menu.id, menu, icon, url, Active');
    $ci->db->from('user_menu');
    $ci->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
    $ci->db->where('user_menu.kategori', $dash);
    $ci->db->where('user_access_menu.role_id', $role_id);
    $ci->db->order_by('user_access_menu.menu_id', 'ASC');
}
