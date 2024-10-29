<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Login_model');
        $this->load->model('User_model');

    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('home');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Isi username anda',

        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Isi password anda',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }

    }

    private function _login()
    {


        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->User_model->get_user_login($username)->row_array();

        if ($user) {
            if ($user['status_aktif'] == 1) {
                if ($password == $user['password']) {
                    $data = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'kode_guru' => $user['kode_guru'],
                        'nama' => $user['nama'],
                        'id_level' => $user['id_level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Username atau Password salah
                    </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Akun belum aktif
                </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun tidak terdaftar
            </div>');
            redirect('login');
        }
    }
    public function daftar()
    {
        if ($this->session->userdata('username')) {
            redirect('home');
        }

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Isi nama lengkap anda'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Isi email anda',
            'valid_email' => 'Isi email dengan benar',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Isi username anda',
            'is_unique' => 'Username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Isi password anda',
            'matches' => 'Password dan konfirmasi tidak sama',
            'min_length' => 'Password minimal 3 digit'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]', [
            'required' => 'Isi konfirmasi password anda',
            'matches' => 'Password dan konfirmasi tidak sama',
            'min_length' => 'Password minimal 3 digit'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/daftar');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama_lengkap')),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => htmlspecialchars(md5($this->input->post('password1'))),
                'id_level' => '2',
                'foto' => 'default.png',
                'status_aktif' => 1,
                'tanggal_dibuat' => time()
            ];
            $this->User_model->tambah_user($data);

            // $this->_sendEmail();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil daftar akun, silahkan login
          </div>');

            redirect('login');
        }


    }

    public function send_email()
    {

       

        $this->email->initialize($config); // Inisialisasi konfigurasi email

        // Set detail email
        $this->email->set_newline("\r\n");
        $this->email->from('riki@smkbpn.sch.id', 'SMK Bina Putera Nusantara'); // Ganti dengan email dan nama pengirim
        $this->email->to('rikimhammad@gmail.com'); // Ganti dengan email penerima
        $this->email->subject('Test Email via SendGrid');
        $this->email->message('<h1>Hello!</h1><p>This is a test email sent using SendGrid with CodeIgniter 3.</p>');

        // Kirim email
        if ($this->email->send()) {
            echo 'Email berhasil dikirim!';
        } else {
            show_error($this->email->print_debugger()); // Tampilkan error jika gagal
        }
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil logout
          </div>');
        redirect('login');
    }
}
