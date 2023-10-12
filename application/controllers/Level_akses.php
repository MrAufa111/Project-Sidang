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
        // public function ubahakses()
        // {
        //     $role_id = $this->input->post('roleId');
        //     $menu_id = $this->input->post('menuId');
        //     $access = $this->input->post('access');

        //     foreach ($access as $menu_id => $actions) {
        //         // Melakukan loop melalui tindakan yang dipilih
        //         $data = array(
        //             'menu_id' => $menu_id,
        //             'role_id' => $role_id,
        //             'show_acc' => isset($actions['show']) ? 1 : 0,
        //             'input_acc' => isset($actions['input']) ? 1 : 0,
        //             'update_acc' => isset($actions['update']) ? 1 : 0,
        //             'delete_acc' => isset($actions['delete']) ? 1 : 0
        //         );

        //         // Masukkan data izin akses ke dalam database
        //         $this->model->insert_access($data);

        //         // Redirect kembali ke halaman level setelah memproses izin akses
        //         redirect('level');
        //     }
        // }
        public function ubahakses()
        {
            $menu_id = $this->input->post('menuId');
            $role_id = $this->input->post('roleId');
            $input = $this->input->post('input');
            $delete = $this->input->post('delete');
            $update = $this->input->post('update');

            $data['role_id'] = $role_id;
            $data['menu_id'] = $menu_id;
            $data2['input_acc'] = $input;
            $data2['delete_acc'] = $delete;
            $data2['update_acc'] = $update;

            $result = $this->db->get_where('user_access_menu', $data);
            $coba = $this->db->get('user_access_menu')->result_array();
            if ($coba != $menu_id | $coba != $role_id) {

                $this->db->insert('user_access_menu', $data);
            } elseif (empty($result == $menu_id | $result == $role_id)) {
                $this->db->where('menu_id', $menu_id);
                $this->db->where('role_id', $role_id);
                $this->db->update("user_access_menu", $data2);
            } else {
                $this->db->delete('user_access_menu', $data);
            }
            $this->session->set_flashdata('notif', 'Succes MengUpdate Akses!');
        }
        // public function edit()
        // {
        //     if ($this->cek_akses_user['edit'] = "1") {
        //         redirect('level');
        //     }
        // }

        // public function ubahakses()
        // {
        //     $role_id = $this->input->post('roleId');
        //     $menu_id = $this->input->post('menuId');
        //     $access = $this->input->post('access');
        //     foreach ($access as $menu_id => $actions) {
        //         foreach ($actions as $action => $value) {
        //             if ($value == 1) {
        //                 $this->model->insert_access($menu_id, $role_id, $action);
        //                 redirect('level');
        //             }
        //         }
        //     }
        //     // $data['role_id'] = $role_id;
        //     // $data['menu_id'] = $show;
        //     // $data['input_acc'] = $input;
        //     // $data['update_acc'] = $update;
        //     // $data['delete_acc'] = $delete;
        //     // var_dump($access);
        //     // die;

        //     // $result = $this->db->get_where('user_access_menu', $data);
        //     // if ($result->num_rows() < 1) {
        //     //     $this->db->insert('user_access_menu', $data);
        //     // } else {
        //     //     $this->db->delete('user_access_menu', $data);
        //     // }
        //     // $this->session->set_flashdata('notif', 'Succes MengUpdate Akses!');
        // }
    }
