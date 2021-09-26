<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/login/login');
    }

    public function login()
    {
        $this->load->view('admin/login/login');
    }

    public function authentifikasi()
    {
        $username = $this->input->post('username', true);
        $password = sha1($this->input->post('password', true));

        $array_input = [
            'username_pustakawan' => $username,
            'passw_pustakawan' => $password
        ];

        $sql = $this->ModelAdmin->cekLoginAdmin($array_input);
        $cek_user = $sql->row_array();

        if (!$cek_user) {
            $this->session->set_flashdata('error', "Maaf Username dan Password Salah !!!");
            redirect('Admin');
        } else {
            $data = [
                'idpustakawan' => $cek_user['id_pustakawan'],
                'enid' => sha1($cek_user['id_pustakawan']),
                'username' => $cek_user['nama_pustakawan']
            ];
            $this->session->set_userdata($data);
            redirect('admin/dashboard');
        }
    }

    public function dashboard()
    {
        $user_access = $this->session->userdata();

        if ($user_access != null) {
            if ($user_access['username'] == null) {
                redirect('Admin');
            }
        } else {
            redirect('Admin');
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/login/dashboard');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->load->library('session');
        $res = $this->session->sess_destroy();

        $this->load->view('admin/login/login');
    }
}
