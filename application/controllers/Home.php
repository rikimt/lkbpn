<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        cek_login();


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
        $cek_kinerja_hari_ini = $this->User_model->cek_kinerja($tanggal,$kode_guru);

        

        if($cek_kinerja_hari_ini == FALSE){

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <strong>Data kinerja hari ini belum diisi, harap segera isi..</strong>
           </div>');
        }


        $this->load->view('template/header', $data);
        $this->load->view('home');
        $this->load->view('template/footer');
    }
}
