<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('akun');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1') {
            redirect('dashboard', 'refresh');
        } else {

            $this->form_validation->set_rules('username', 'Username', 'required|trim', [
                'required' => 'Username wajib diisi'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                'required' => 'Password wajib diisi'
            ]);
            if ($this->form_validation->run() == false) {
                $this->load->view('login_v');
            } else {
                $this->_login();
            }
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $user = $this->akun->getakun($username);
        if ($user) {
            if ($user['active'] == 1) {
                if ($password == $user['password']) {
                    $data = [
                        'id_user' => $user['id_pengguna'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'nama' => $user['nama'],
                    ];
                    $this->session->set_userdata('akses', '1');
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible" role="alert">
                   Password salah.
                    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                  </div>');

                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible" role="alert">
                Akun belum aktif.
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
              </div>');

                redirect('login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Username tidak terdaftar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> </div>');

            redirect('login');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
