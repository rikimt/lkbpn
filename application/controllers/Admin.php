<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php'; // Pastikan autoload Composer di-includekan
use Intervention\Image\ImageManager; // Tambahkan ini di bagian atas file controller

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Staff_model');
        $this->load->model('Admin_model');

        $this->load->library('upload');

        cek_login();


    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Admin';
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('home');
        $this->load->view('template/footer');
    }



    public function manage_menu()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Manage Menu';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datamenu'] = $this->User_model->get_all_menu();


        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'trim|required', [
            'required' => 'Harap isi nama menu'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/manage_menu', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_menu'])) {
                $this->tambah_menu();
            }

            if (isset($_POST['edit_menu'])) {
                $this->edit_menu();
            }
            if (isset($_POST['delete_menu'])) {
                $this->delete_menu();
            }
        }
    }

    public function tambah_menu()
    {


        $nama_menu = htmlspecialchars($this->input->post('nama_menu'));
        $icon = htmlspecialchars($this->input->post('icon'));
        $data = [
            'nama_menu' => $nama_menu,
            'menu_icon' => $icon
        ];
        $this->Admin_model->tambah_user_menu($data);
        $this->session->set_flashdata('message_menu', '<div class="alert alert-success" role="alert">
        Data menu ditambahkan
      </div>');
        redirect('admin/manage_menu');
    }
    public function edit_menu()
    {


        $nama_menu = htmlspecialchars($this->input->post('nama_menu'));
        $icon = htmlspecialchars($this->input->post('icon'));
        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'nama_menu' => $nama_menu,
            'menu_icon' => $icon
        ];
        $this->Admin_model->edit_user_menu($data, $id);
        $this->session->set_flashdata('message_menu', '<div class="alert alert-success" role="alert">
        Data menu telah diubah
      </div>');
        redirect('admin/manage_menu');
    }
    public function delete_menu()
    {
        $nama_menu = htmlspecialchars($this->input->post('nama_menu'));

        $id = htmlspecialchars($this->input->post('id'));

        $this->Admin_model->delete_user_menu($id);
        $this->session->set_flashdata('message_menu', '<div class="alert alert-success" role="alert">Data ' .
            $nama_menu .
            ' telah dihapus</div>');
        redirect('admin/manage_menu');
    }

    public function manage_sub_menu()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Manage Menu';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['data_sub_menu_aktif'] = $this->User_model->get_all_sub_menu_aktif();
        $data['data_sub_menu_tidak_aktif'] = $this->User_model->get_all_sub_menu_tidak_aktif();
        $data['datamenu'] = $this->User_model->get_all_menu();
        $data['no_urut'] = $this->User_model->get_urut_sub_menu();


        $this->form_validation->set_rules('id_menu', 'Data', 'trim|required', [
            'required' => 'Harap isi data dengan benar'
        ]);
        $this->form_validation->set_rules('judul', 'Data', 'trim|required', [
            'required' => 'Harap isi data dengan benar'
        ]);
        $this->form_validation->set_rules('url', 'Data', 'trim|required', [
            'required' => 'Harap isi data dengan benar'
        ]);
        $this->form_validation->set_rules('icon', 'Data', 'trim|required', [
            'required' => 'Harap isi data dengan benar'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/manage_sub_menu', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_menu'])) {
                $this->tambah_sub_menu();
            }

            if (isset($_POST['edit_menu'])) {
                $this->edit_sub_menu();
            }
            if (isset($_POST['delete_menu'])) {
                $this->delete_sub_menu();
            }
            if (isset($_POST['off_menu'])) {
                $this->off_sub_menu();
            }
            if (isset($_POST['on_menu'])) {
                $this->on_sub_menu();
            }
        }
    }

    public function tambah_sub_menu()
    {



        $data = [
            'id_menu' => htmlspecialchars($this->input->post('id_menu')),
            'judul' => htmlspecialchars($this->input->post('judul')),
            'url' => htmlspecialchars($this->input->post('url')),
            'icon' => htmlspecialchars($this->input->post('icon')),
            'no_urut' => htmlspecialchars($this->input->post('no_urut')),
            'is_active' => htmlspecialchars($this->input->post('is_active'))
        ];
        $this->Admin_model->tambah_user_sub_menu($data);
        $this->session->set_flashdata('message_sub_menu', '<div class="alert alert-success" role="alert">
        Data sub menu ditambahkan
      </div>');
        redirect('admin/manage_sub_menu');
    }
    public function edit_sub_menu()
    {


        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'id_menu' => htmlspecialchars($this->input->post('id_menu')),
            'judul' => htmlspecialchars($this->input->post('judul')),
            'url' => htmlspecialchars($this->input->post('url')),
            'icon' => htmlspecialchars($this->input->post('icon')),
            'no_urut' => htmlspecialchars($this->input->post('no_urut')),
            'is_active' => htmlspecialchars($this->input->post('is_active'))
        ];
        $this->Admin_model->edit_user_sub_menu($data, $id);
        $this->session->set_flashdata('message_menu', '<div class="alert alert-success" role="alert">
        Data sub menu telah diubah
      </div>');
        redirect('admin/manage_sub_menu');
    }
    public function delete_sub_menu()
    {
        $judul = htmlspecialchars($this->input->post('judul'));

        $id = htmlspecialchars($this->input->post('id'));

        $this->Admin_model->delete_user_sub_menu($id);
        $this->session->set_flashdata('message_menu', '<div class="alert alert-success" role="alert">Data sub menu' .
            $judul .
            ' telah dihapus</div>');
        redirect('admin/manage_sub_menu');
    }

    public function off_sub_menu()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'is_active' => htmlspecialchars($this->input->post('is_active'))
        ];
        $this->Admin_model->off_user_sub_menu($data, $id);
        $this->session->set_flashdata('message_menu', '<div class="alert alert-success" role="alert">
        Data sub menu telah dinonaktifkan
      </div>');
        redirect('admin/manage_sub_menu');
    }
    public function on_sub_menu()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'is_active' => htmlspecialchars($this->input->post('is_active'))
        ];
        $this->Admin_model->off_user_sub_menu($data, $id);
        $this->session->set_flashdata('message_menu', '<div class="alert alert-success" role="alert">
        Data sub menu telah diaktifkan
      </div>');
        redirect('admin/manage_sub_menu');
    }



    // ---------------------------------------------------------------------------------
    // -------------------Manage Level--------------------------------------------------
    // ---------------------------------------------------------------------------------

    public function level()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Level';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datalevel'] = $this->User_model->get_all_level();


        $this->form_validation->set_rules('nama_level', 'Nama Level', 'trim|required', [
            'required' => 'Harap isi nama level'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/level', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_level'])) {
                $this->tambah_level();
            }

            if (isset($_POST['edit_level'])) {
                $this->edit_level();
            }
            if (isset($_POST['delete_level'])) {
                $this->delete_level();
            }
        }
    }

    public function tambah_level()
    {


        $nama_level = htmlspecialchars($this->input->post('nama_level'));
        $data = [
            'level' => $nama_level
        ];
        $this->Admin_model->tambah_user_level($data);
        $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">
        Data level ditambahkan
      </div>');
        redirect('admin/level');
    }
    public function edit_level()
    {


        $nama_level = htmlspecialchars($this->input->post('nama_level'));
        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'level' => $nama_level
        ];
        $this->Admin_model->edit_user_level($data, $id);
        $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">
        Data level telah diubah
      </div>');
        redirect('admin/level');
    }
    public function delete_level()
    {
        $nama_level = htmlspecialchars($this->input->post('nama_level'));

        $id = htmlspecialchars($this->input->post('id'));

        $this->Admin_model->delete_user_level($id);
        $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">Data ' .
            $nama_level .
            ' telah dihapus</div>');
        redirect('admin/level');
    }

    public function akses_level($id_level)
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Manage Akses';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datamenu'] = $this->User_model->get_all_menu_akses();
        $data['nama_level'] = $this->User_model->get_level_by_id($id_level);


        $this->load->view('template/header', $data);
        $this->load->view('admin/akses_level', $data);
        $this->load->view('template/footer');

    }

    public function ubah_akses()
    {
        $id_menu = $this->input->post('menuId');
        $id_level = $this->input->post('levelId');
        $data = [
            'id_level' => $id_level,
            'id_menu' => $id_menu
        ];

        $queryAkses = $this->User_model->get_akses($data);
        if ($queryAkses->num_rows() < 1) {
            $this->Admin_model->tambah_akses($data);
        } else {
            $this->Admin_model->delete_akses($data);
        }

        $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">Data akses talah diubah</div>');
    }




}
