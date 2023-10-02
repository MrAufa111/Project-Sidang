<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_model
{
    function register()
    {
        $data = [
            'username' => $this->input->post('username', true),
            'fullname' => $this->input->post('fullname', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
    }
}
