<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menudash extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }
    public function index()
    {
        $data['menu'] = $this->db->get('dash_menu')->result_array();
        $data['title'] = 'Menu Dash';
        $data['page'] = "setting/menu/menudash";
        $this->load->view('setting/templates/index', $data);
    }
}
