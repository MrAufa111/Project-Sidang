<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menu');
        check_login();
    }
    //function submenu
    public function index($kategori)
    {
        $data['menu'] = $this->M_menu->getmenustatus($kategori);
        $data['kategori'] = $this->db->get('dash_menu')->result_array();
        $data['title'] = 'Menu Edit';
        $data['page'] = 'setting/menu/index';
        $this->load->view('setting/templates/index', $data);
    }

    public function save()
    {

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Menu Is required'
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('Error', 'Menu field is required.');
            redirect('menudash');
        } else {
            $this->M_menu->inputmenu();
            $this->session->set_flashdata('notif', 'Menu Is Created!!!');
            redirect('menudash');
        }
    }
    public function editMenu()
    {
        $id = $this->input->post('editId');
        $editMenuName = $this->input->post('editMenuName');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');
        $status = ($is_active == 'Publish') ? 1 : 0;

        if (!empty($id) && !empty($editMenuName)) {
            $data = array(
                'menu' => $editMenuName,
                'url' => $url,
                'icon' => $icon,
                'Active' => $status
            );

            $this->M_menu->updateMenu($id, $data);
            $this->session->set_flashdata('notif', 'Menu updated successfully.');
            redirect('menudash');
        } else {
            $this->session->set_flashdata('error', 'Menu field is required.');
            redirect('menudash');
        }
    }

    public function deletemenu($id)
    {
        $this->M_menu->deletemenu($id);
        $this->session->set_flashdata('notif', 'Menu Has deleted');
        redirect('menudash');
    }
}
