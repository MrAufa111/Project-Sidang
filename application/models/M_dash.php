<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dash extends CI_model
{
    public function getDashboard()
    {
        return $this->db->get('dash_menu')->result_array();
    }
}
