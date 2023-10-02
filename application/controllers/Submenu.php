<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_submenu');
        check_login();
    }
    public function index($menu_id)
    {
        $data = [
            'title' => 'Sub Menu Edit',
            'page' => 'setting/menu/submenu',
            'menu' => $this->db->get('user_menu')->result_array(),
            'subMenu' => $this->M_submenu->get_menu_category_by_menu_id($menu_id),
            'menuCategory' => $this->M_submenu->get_menu_category_by_menu_id($menu_id),
        ];
        $this->load->view('setting/templates/index', $data);
    }
    public function save()
    {
        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Title Is required'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Sub Menu Is Not Created!!!');
            redirect('submenu');
        } else {
            $this->M_submenu->inputsubmenu();
            $this->session->set_flashdata('notif', 'Sub Menu Is Created!!!');
            redirect('menudash');
        }
    }
    public function updateSubmenu()
    {
        $id = $this->input->post('editId');
        $title = $this->input->post('title');
        $menu_id = $this->input->post('menu_id');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');

        $data = array(
            'title' => $title,
            'menu_id' => $menu_id,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active
        );

        $submenu = $this->M_submenu->getSubMenuById($id);

        if (!empty($submenu)) {
            $this->M_submenu->updatesubMenu($id, $data);
            $this->session->set_flashdata('notif', 'Sub Menu Has Updated');
            redirect('menudash');
        } else {
            $this->session->set_flashdata('error', 'Submenu not found.');
            redirect('menudash');
        }
    }

    public function deletemenu($id)
    {
        $this->M_submenu->deletemenu($id);
        $this->session->set_flashdata('notif', 'Sub Menu Has deleted');
        redirect('menudash');
    }
}
