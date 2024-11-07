<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php'; // Pastikan autoload Composer di-includekan
use Intervention\Image\ImageManager; // Tambahkan ini di bagian atas file controller


class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Staff_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('upload');
        cek_login();


    }

    public function index()
    {

    }

    public function guru()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Guru';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['data_jabatan'] = $this->User_model->get_all_jabatan();
        $data['data_tugas_tambahan'] = $this->User_model->get_all_tugas_tambahan();
        $data['data_guru_aktif'] = $this->Staff_model->get_all_guru_aktif();
        $data['data_guru_tidak_aktif'] = $this->Staff_model->get_all_guru_tidak_aktif();

        if ($id == 1) {
            $data['data_level'] = $this->User_model->get_all_level();

        } else {
            $data['data_level'] = $this->User_model->get_all_level_noadmin();

        }


        $this->form_validation->set_rules('kode_guru', 'Kode Guru', 'trim|required|is_unique[user.kode_guru]', [
            'required' => 'Harap isi kode guru',
            'is_unique' => 'Kode guru sudah terdaftar'

        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Harap isi nama guru'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|is_unique[user.email]', [
            'valid_email' => 'Isi email dengan benar',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
            'required' => 'Harap isi Username ',
            'is_unique' => 'Username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Pasword', 'trim|required', [
            'required' => 'Harap isi password'
        ]);
        $this->form_validation->set_rules('id_level', 'ID Level', 'trim|required', [
            'required' => 'Harap isi jabatan'
        ]);
        $this->form_validation->set_rules('id_tugas_tambahan', 'Tugas Tambahan', 'trim');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('staff/guru', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_guru'])) {
                $this->tambah_guru();
            }

            if (isset($_POST['edit_guru'])) {
                $this->edit_guru();
            }
            if (isset($_POST['delete_menu'])) {
                $this->delete_sub_menu();
            }
            if (isset($_POST['off_guru'])) {
                $this->off_guru();
            }
            if (isset($_POST['on_menu'])) {
                $this->on_sub_menu();
            }
        }

    }

    public function tambah_guru()
    {

        $kd_guru = $this->input->post('kode_guru');
        $tanggal = date('Y-m-d');

        // Inisialisasi nama file default jika tidak ada file yang diunggah
        $new_file_name = 'default.png';

        if (!empty($_FILES['foto']['name'])) {
            // Konfigurasi upload untuk gambar saja
            $config['upload_path'] = './assets/images/profil/';
            $config['allowed_types'] = 'jpg|jpeg|png'; // Hanya izinkan gambar
            $config['max_size'] = 0; // 0 berarti tidak ada batasan

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('staff/guru');
            } else {
                // Ambil nama file yang diunggah
                $uploaded_file_name = $this->upload->data('file_name');
                $file_extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
                $new_file_name = $kd_guru . "_" . date('Y-m-d', strtotime($tanggal)) . '_' . uniqid() . '.' . $file_extension;

                // Inisialisasi ImageManager
                $manager = new ImageManager(['driver' => 'gd']); // Menggunakan GD sebagai driver

                // Menggunakan Intervention Image untuk kompresi
                $img = $manager->make('./assets/images/profil/' . $uploaded_file_name);

                // Kompresi hingga 500 KB
                $compression_quality = 75; // Awal kualitas kompresi
                do {
                    $img->save('./assets/images/profil/' . $new_file_name, $compression_quality);
                    $file_size = filesize('./assets/images/profil/' . $new_file_name);
                    $compression_quality -= 5; // Turunkan kualitas jika ukuran masih lebih dari 500 KB
                } while ($file_size > 1000 * 1024 && $compression_quality > 0); // Terus kompres hingga ukuran lebih kecil dari 500 KB atau kualitas mencapai 0

                // Hapus file asli
                unlink('./assets/images/profil/' . $uploaded_file_name);
            }
        }


        $data = [
            'id' => '',
            'kode_guru' => htmlspecialchars($this->input->post('kode_guru')),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'email' => htmlspecialchars($this->input->post('email')),
            'no_hp' => htmlspecialchars($this->input->post('no_hp')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => htmlspecialchars(md5($this->input->post('password'))),
            'id_level' => htmlspecialchars($this->input->post('id_level')),
            'id_jabatan' => htmlspecialchars($this->input->post('id_jabatan')),
            'id_tugas_tambahan' => htmlspecialchars($this->input->post('id_tugas_tambahan')),
            'foto' => $new_file_name,
            'status_aktif' => htmlspecialchars($this->input->post('status_aktif')),
            'tanggal_dibuat' => $tanggal
        ];


        $this->Staff_model->tambah_guru($data);
        $this->session->set_flashdata('message_sub_menu', '<div class="alert alert-success" role="alert">
        Data guru ditambahkan
      </div>');
        redirect('staff/guru');
    }


    public function edit_guru()
    {
        $id_guru = $this->input->post('id_guru');
        $kd_guru = $this->input->post('kode_guru');
        $tanggal = date('Y-m-d');
        $new_file_name = $this->input->post('old_foto'); // Jika tidak ada file baru

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/images/profil/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 0;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $uploaded_file_name = $this->upload->data('file_name');
                $file_extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
                $new_file_name = $kd_guru . "_" . date('Y-m-d', strtotime($tanggal)) . '_' . uniqid() . '.' . $file_extension;

                // Compress image
                $manager = new ImageManager(['driver' => 'gd']);
                $img = $manager->make('./assets/images/profil/' . $uploaded_file_name);
                $compression_quality = 75;
                do {
                    $img->save('./assets/images/profil/' . $new_file_name, $compression_quality);
                    $file_size = filesize('./assets/images/profil/' . $new_file_name);
                    $compression_quality -= 5;
                } while ($file_size > 1000 * 1024 && $compression_quality > 0);

                unlink('./assets/images/profil/' . $uploaded_file_name);
            }
        }

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'email' => htmlspecialchars($this->input->post('email')),
            'no_hp' => htmlspecialchars($this->input->post('no_hp')),
            'password' => htmlspecialchars($this->input->post('old_password')),
            'id_level' => htmlspecialchars($this->input->post('id_level')),
            'id_jabatan' => htmlspecialchars($this->input->post('id_jabatan')),
            'id_tugas_tambahan' => htmlspecialchars($this->input->post('id_tugas_tambahan')),
            'foto' => $new_file_name,
            'tanggal_dibuat' => $tanggal
        ];

        if ($this->input->post('password')) {
            $data['password'] = md5($this->input->post('password'));
        }

        $this->Staff_model->edit_guru($id_guru, $data);
        $this->session->set_flashdata('message_sub_menu', '<div class="alert alert-success" role="alert">
            Data guru telah diperbarui
        </div>');
        redirect('staff/guru');
    }


    public function off_guru()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $tanggal = date('Y-m-d');
        $nama = $this->input->post('nama');
        $data = [
            'status_aktif' => htmlspecialchars($this->input->post('status_aktif')),
            'tanggal_dibuat' => $tanggal
        ];
        $this->Staff_model->off_guru($data, $id);
        $this->session->set_flashdata('message_sub_menu', '<div class="alert alert-success" role="alert">
        Data Guru ' . $nama . ' telah dinonaktifkan
      </div>');
        redirect('staff/guru');
    }
    public function on_guru()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $tanggal = date('Y-m-d');
        $nama = $this->input->post('nama');
        $data = [
            'status_aktif' => htmlspecialchars($this->input->post('status_aktif')),
            'tanggal_dibuat' => $tanggal
        ];
        $this->Staff_model->off_guru($data, $id);
        $this->session->set_flashdata('message_sub_menu', '<div class="alert alert-success" role="alert">
        Data Guru ' . $nama . ' telah diaktifkan
      </div>');
        redirect('staff/guru');
    }

    public function delete_guru()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $nama = $this->input->post('nama');
        $this->Staff_model->delete_guru($id);
        $this->session->set_flashdata('message_sub_menu', '<div class="alert alert-success" role="alert">Data guru' .
            $nama .
            ' telah dihapus</div>');
        redirect('staff/guru');
    }

    // ---------------------------------------------------------------------------------
    // -------------------Manage Jabatan--------------------------------------------------
    // ---------------------------------------------------------------------------------

    public function jabatan()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Jabatan';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datajabatan'] = $this->User_model->get_all_jabatan();


        $this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'trim|required', [
            'required' => 'Harap isi nama jabatan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('staff/jabatan', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_jabatan'])) {
                $this->tambah_jabatan();
            }

            if (isset($_POST['edit_jabatan'])) {
                $this->edit_jabatan();
            }
            if (isset($_POST['delete_jabatan'])) {
                $this->delete_jabatan();
            }
        }
    }

    public function tambah_jabatan()
    {


        $nama_jabatan = htmlspecialchars($this->input->post('nama_jabatan'));
        $data = [
            'jabatan' => $nama_jabatan
        ];
        $this->Staff_model->tambah_user_jabatan($data);
        $this->session->set_flashdata('message_jabatan', '<div class="alert alert-success" role="alert">
        Data jabatan ditambahkan
      </div>');
        redirect('staff/jabatan');
    }
    public function edit_jabatan()
    {


        $nama_jabatan = htmlspecialchars($this->input->post('nama_jabatan'));
        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'jabatan' => $nama_jabatan
        ];
        $this->Staff_model->edit_user_jabatan($data, $id);
        $this->session->set_flashdata('message_jabatan', '<div class="alert alert-success" role="alert">
        Data jabatan telah diubah
      </div>');
        redirect('staff/jabatan');
    }
    public function delete_jabatan()
    {
        $nama_jabatan = htmlspecialchars($this->input->post('nama_jabatan'));

        $id = htmlspecialchars($this->input->post('id'));

        $this->Staff_model->delete_user_jabatan($id);
        $this->session->set_flashdata('message_jabatan', '<div class="alert alert-success" role="alert">Data ' .
            $nama_jabatan .
            ' telah dihapus</div>');
        redirect('staff/jabatan');
    }



    // ---------------------------------------------------------------------------------
    // -------------------Kegiatan------------------------------------------------------
    // ---------------------------------------------------------------------------------

    // Kegiatan

    public function kegiatan()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Kegiatan';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datakegiatan'] = $this->User_model->get_all_kegiatan();


        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required', [
            'required' => 'Harap isi nama kegiatan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('staff/kegiatan', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_kegiatan'])) {
                $this->tambah_kegiatan();
            }

            if (isset($_POST['edit_kegiatan'])) {
                $this->edit_kegiatan();
            }
            if (isset($_POST['delete_kegiatan'])) {
                $this->delete_kegiatan();
            }
        }
    }

    public function tambah_kegiatan()
    {


        $nama_kegiatan = htmlspecialchars($this->input->post('nama_kegiatan'));

        $data = [
            'nama_kegiatan' => $nama_kegiatan
        ];
        $this->Staff_model->tambah_kegiatan($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data kegiatan ditambahkan
  </div>');
        redirect('staff/kegiatan');
    }
    public function edit_kegiatan()
    {


        $nama_kegiatan = htmlspecialchars($this->input->post('nama_kegiatan'));
        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'nama_kegiatan' => $nama_kegiatan
        ];
        $this->Staff_model->edit_kegiatan($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data kegiatan telah diubah
  </div>');
        redirect('staff/kegiatan');
    }
    public function delete_kegiatan()
    {
        $nama_kegiatan = htmlspecialchars($this->input->post('nama_kegiatan'));

        $id = htmlspecialchars($this->input->post('id'));

        $this->Staff_model->delete_kegiatan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' .
            $nama_kegiatan .
            ' telah dihapus</div>');
        redirect('staff/kegiatan');
    }

    // End Kegiatan


    // ---------------------------------------------------------------------------------
    // -------------------Tugas Tambahan------------------------------------------------
    // ---------------------------------------------------------------------------------


    // Tugas Tamabahan

    public function tugas_tambahan()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Tugas Tambahan';
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datatugas'] = $this->User_model->get_all_tugas_tambahan();


        $this->form_validation->set_rules('nama_tugas_tambahan', 'Nama Kegiatan', 'trim|required', [
            'required' => 'Harap isi nama tugas tambahan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('staff/tugas_tambahan', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_tugas_tambahan'])) {
                $this->tambah_tugas_tambahan();
            }

            if (isset($_POST['edit_tugas_tambahan'])) {
                $this->edit_tugas_tambahan();
            }
            if (isset($_POST['delete_tugas_tambahan'])) {
                $this->delete_tugas_tambahan();
            }
        }
    }

    public function tambah_tugas_tambahan()
    {


        $nama_tugas = htmlspecialchars($this->input->post('nama_tugas_tambahan'));

        $data = [
            'nama_tugas' => $nama_tugas
        ];
        $this->Staff_model->tambah_tugas($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Data tugas tambahan ditambahkan
       </div>');
        redirect('staff/tugas_tambahan');
    }
    public function edit_tugas_tambahan()
    {


        $nama_tugas = htmlspecialchars($this->input->post('nama_tugas_tambahan'));
        $id = htmlspecialchars($this->input->post('id'));
        $data = [
            'nama_tugas' => $nama_tugas
        ];
        $this->Staff_model->edit_tugas($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Data tugas tambahan telah diubah
       </div>');
        redirect('staff/tugas_tambahan');
    }
    public function delete_tugas_tambahan()
    {
        $nama_tugas = htmlspecialchars($this->input->post('nama_tugas_tambahan'));

        $id = htmlspecialchars($this->input->post('id'));

        $this->Staff_model->delete_tugas($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' .
            $nama_tugas .
            ' telah dihapus</div>');
        redirect('staff/tugas_tambahan');
    }

    // End Tugas tambahan

    // ---------------------------------------------------------------------------------
    // -------------------download PDF--------------------------------------------------
    // ---------------------------------------------------------------------------------

    public function laporan_kinerja()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Laporan Kinerja';
        $id = $this->session->userdata('id_level');
        $kd_guru = $this->session->userdata('kode_guru');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datakegiatan'] = $this->User_model->get_all_kegiatan();
        $data['datakinerja'] = $this->Staff_model->get_all_kinerja();
        $data['dataguru'] = $this->Staff_model->get_guru_by_kinerja();
        $tanggal_input = hari_indo($this->input->post("tanggal_input"));
        $tanggal = $this->input->post("tanggal_input");


        $this->load->view('template/header', $data);
        $this->load->view('staff/laporan_kinerja', $data);
        $this->load->view('template/footer');

    }
    public function download_kinerja_pdf_guru()
    {
        // Ambil data dari session dan model
        $username = $this->session->userdata('username');
        $data['judul'] = 'Kinerja';
        $id = $this->session->userdata('id_level');
        $kd_guru = $this->input->post('kode_guru');
        $data_nama_guru = $this->Staff_model->get_guru_by_kode($kd_guru);

        $nama_user = $data_nama_guru['nama'];

        $id_kinerja = $this->input->post('id_kinerja');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datakegiatan'] = $this->User_model->get_all_kegiatan();
        $tanggal_sekarang = date("Y-m-d");

        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");
        $tanggal_mulai = $this->input->post("tanggal_mulai");
        $tanggal_selesai = $this->input->post("tanggal_selesai");



        if (!empty($bulan)) {
            $test_if = "perbulan";
            $data['datakinerja'] = $this->Staff_model->get_all_kinerja_by_guru_bulan($kd_guru, $bulan, $tahun);
        } else if (!empty($tanggal_mulai)) {
            $test_if = "pertanggal";
            $data['datakinerja'] = $this->Staff_model->get_all_kinerja_by_guru_tanggal($kd_guru, $tanggal_mulai, $tanggal_selesai);
        } else {
            $test_if = "id";
            if (!empty($id_kinerja)) {
                $data['datakinerja'] = $this->Staff_model->get_all_kinerja_by_guru_id($id_kinerja);

            }
            $data['bulan'] = 'Bulan Tidak Diketahui';
        }




        // Ambil tanggal dari data kinerja untuk mendapatkan bulan
        if (!empty($data['datakinerja'])) {
            $firstKinerja = $data['datakinerja'][0]['tanggal'];
            $bulan = nama_bulan_indo($firstKinerja);
            $data['bulan'] = $bulan;
        } else {
            $data['bulan'] = 'Bulan Tidak Diketahui';
        }

        // Load mPDF library
        $this->load->library('Mpdf_gen');



        // Set font default menjadi Times New Roman dengan ukuran 12
        $this->mpdf_gen->mpdf->SetFont('times', '', 10);

        // Atur ukuran kertas menjadi A4 dan margin sesuai dengan kebutuhan
        $this->mpdf_gen->mpdf->AddPage(
            'P', // Orientasi potrait (P untuk portrait, L untuk landscape)
            '',
            '',
            '',
            '',
            40,  // Margin kiri 4 cm
            30,  // Margin kanan 3 cm
            40,  // Margin atas 4 cm
            30,  // Margin bawah 3 cm
            0,   // Margin header (0 untuk tidak ada header)
            0
        );  // Margin footer (0 untuk tidak ada footer)
        // Set delay untuk pengambilan gambar
        $mpdf = new \Mpdf\Mpdf(['image_dpi' => 300]);

        // Render view ke variabel HTML
        $html = $this->load->view('staff/laporan_kinerja_pdf', $data, true);

        // Load HTML ke mPDF
        $this->mpdf_gen->mpdf->WriteHTML($html);

        // Outputkan PDF (langsung download)
        $this->mpdf_gen->mpdf->Output('laporan_kinerja-' . $nama_user . "-" . $tanggal_sekarang . ".pdf", 'D');
    }
}
