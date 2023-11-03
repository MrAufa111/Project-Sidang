<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth', 'model');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'login',
                'page' => 'auth/login'
            ];
            $this->load->view('auth/templates/index', $data);
        } else {
            $this->_login();
        }
    }
    // private function _login()
    // {
    //     // $captcha_response = trim($this->input->post('g-recaptcha-response'));
    //     // if ($captcha_response != '') {
    //     //     $keySecret = '6LfDqDwoAAAAABZJcq3nYG81m6e7tO2nnS5ErhF2';

    //     //     $check = array(
    //     //         'secret'        =>    $keySecret,
    //     //         'response'        =>    $this->input->post('g-recaptcha-response')
    //     //     );

    //     //     $startProcess = curl_init();

    //     //     curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

    //     //     curl_setopt($startProcess, CURLOPT_POST, true);

    //     //     curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

    //     //     curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

    //     //     curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

    //     //     $receiveData = curl_exec($startProcess);

    //     //     $finalResponse = json_decode($receiveData, true);
    //     // if ($finalResponse['success']) {

    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $user = $this->db->get_where('user', ['username' => $username])->row_array();

    //     if ($user) {
    //         //user
    //         if (password_verify($password, $user['password'])) {
    //             $data = [
    //                 'username' => $user['username'],
    //                 'role_id' => $user['role_id'],
    //             ];
    //             $this->session->set_userdata($data);
    //             if ($user['role_id'] == 1) {
    //                 redirect('dashboard');
    //             } else {
    //                 redirect('user');
    //             }
    //         } else {
    //             $this->session->set_flashdata('error', 'Wrong Password');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', 'Username Is Not Active');
    //         redirect('auth');
    //     }
    //     // }
    //     // } else {
    //     //     $this->session->set_flashdata('error', 'Silahkan Isi Captcha terlebih Dahulu!!');
    //     //     redirect('auth');
    //     // }
    // }
    private function _login()
    {
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($captcha_response != '') {
            $keySecret = '6LfDqDwoAAAAABZJcq3nYG81m6e7tO2nnS5ErhF2';

            $check = array(
                'secret'        =>    $keySecret,
                'response'        =>    $this->input->post('g-recaptcha-response')
            );

            $startProcess = curl_init();

            curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

            curl_setopt($startProcess, CURLOPT_POST, true);

            curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

            curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

            $receiveData = curl_exec($startProcess);

            $finalResponse = json_decode($receiveData, true);
            if ($finalResponse['success']) {

                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->db->get_where('user', ['username' => $username])->row_array();

                if ($user) {
                    //user
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'username' => $user['username'],
                            'role_id' => $user['role_id'],
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('dashboard');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Wrong Password');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Username Is Not Active');
                    redirect('auth');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Please fill in the Captcha first!!');
            redirect('auth');
        }
    }


    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username Is required!',
            'is_unique' => 'Username Is Already!'
        ]);
        $this->form_validation->set_rules('fullname', 'fullname', 'required|trim|is_unique[user.fullname]', [
            'required' => 'Email Is required!',
            'is_unique' => 'Email Is Already'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[pass_confirm]', [
            'required' => 'Password Is Required',
            'matches' => 'Password Dont Match',
            'min_length' => 'Password Too Short',
        ]);
        $this->form_validation->set_rules('pass_confirm', 'Password Confirm', 'required|trim|matches[password]', [
            'matches' => 'Password Dont Match!',
            'min_length' => 'Password Too Short!'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Registration Page',
                'page' => 'auth/register'
            ];
            $this->load->view('auth/templates/index', $data);
        } else {
            $this->model->register();
            $this->session->set_flashdata('notif', 'You Account Is Created!');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('notif', 'You Have been logout!');
        redirect('auth');
    }
}
