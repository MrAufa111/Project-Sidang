<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'model');
        check_login();
    }
    public function index()
    {
        $data['user'] = $this->model->getUser();
        // var_dump($data['user']);
        // exit;
        $data['title'] = 'User';
        $data['page'] = 'setting/user/index';
        $this->load->view('setting/templates/index', $data);
    }
}
