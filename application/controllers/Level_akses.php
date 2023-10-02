    <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Level_akses extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_level', 'model');
            check_login();
        }

        public function roleakses($role_id)
        {
            $data['page'] = 'setting/level/level-akses';
            $data['title'] = 'Role Akses Edit';
            $data['role'] = $this->model->getRole($role_id);
            $this->db->where('id !=', 1);
            $data['menu'] = $this->model->getMenu();
            $this->load->view('setting/templates/index', $data);
        }
        public function ubahakses()
        {
            $menu_id = $this->input->post('menuId');
            $role_id = $this->input->post('roleId');

            $data['role_id'] = $role_id;
            $data['menu_id'] = $menu_id;

            $result = $this->db->get_where('user_access_menu', $data);
            if ($result->num_rows() < 1) {
                $this->db->insert('user_access_menu', $data);
            } else {
                $this->db->delete('user_access_menu', $data);
            }
            $this->session->set_flashdata('notif', 'Succes MengUpdate Akses!');
        }
    }
