<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');


    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $kode_guru = $this->session->userdata('kode_guru');
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['judul'] = 'Home';
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $tanggal = date('Y-m-d');

        

        

        $this->load->view('landing', $data);
    }
}
