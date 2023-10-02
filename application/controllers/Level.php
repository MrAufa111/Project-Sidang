<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_level', 'model');
        check_login();
    }
    public function index()
    {
        $data['page'] = 'setting/level/index';
        $data['title'] = 'Level User';
        $data['level'] = $this->model->getLevel();

        $this->load->view('setting/templates/index', $data);
    }
    public function addrole()
    {
        $input = $this->input->post(NULL, TRUE);
        $this->form_validation->set_rules('role', 'Role', 'Required|is_unique[user_role.role]', ['required' => 'Nama Role Wajib Di Isi!!', 'is_unique' => 'Nama Role Sudah Ada!!!']);
        if ($this->form_validation->run()) {
            $data['role'] = $input['role'];

            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('notif', 'Role Add successfully.');
            redirect('level');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('level');
        }
    }
    public function updaterole()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $this->form_validation->set_rules('role', 'Role', 'Required', ['required' => 'Nama Role Wajib Di Isi!!']);
        if ($this->form_validation->run()) {
            $data['role'] = $input['role'];

            $this->model->updaterole($id, $data);
            $this->session->set_flashdata('notif', 'Role Add successfully.');
            redirect('level');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('level');
        }
    }
    public function deleterole($id)
    {
        $this->model->delete($id);
        $this->session->set_flashdata('notif', 'Role Deleted');
        redirect('level');
    }
}
