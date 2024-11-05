<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php'; // Pastikan autoload Composer di-includekan
use Intervention\Image\ImageManager; // Tambahkan ini di bagian atas file controller

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Staff_model');
        $this->load->library('upload'); // Memuat library upload
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

    public function profil()
    {
        $username = $this->session->userdata('username');
        $id_guru = $this->session->userdata('id');
        $id = $this->session->userdata('id_level');

        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['judul'] = 'Profil';
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('user/profil');
        $this->load->view('template/footer');
    }
    public function edit_profil()
    {
        $id_guru = $this->session->userdata('id');
        $username = $this->session->userdata('username');
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->User_model->get_user_login($username)->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Harap isi nama lengkap'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('user/edit_profil', $data);
            $this->load->view('template/footer');
        } else {
            $this->update_profil();
        }


    }

    public function update_profil()
    {
        $id_guru = $this->input->post('id');
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
            'foto' => $new_file_name
        ];

        $this->User_model->edit_profil($data, $id_guru);

        $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('user/profil');
    }

    public function edit_password()
    {
        $username = $this->session->userdata('username');
        $id = $this->session->userdata('id_level');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->User_model->get_user_login($username)->row_array();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required', [
            'required' => 'Harap isi password lama'
        ]);
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[3]|matches[password_baru_konfirmasi]', [
            'required' => 'Harap isi password baru',
            'min_length' => 'Password minimal 3 karakter',
            'matches' => 'Konfirmasi password tidak sama'
        ]);
        $this->form_validation->set_rules('password_baru_konfirmasi', 'Konfirmasi Password Baru', 'trim|required|min_length[3]|matches[password_baru]', [
            'required' => 'Harap isi konfirmasi password baru',
            'min_length' => 'Password minimal 3 karakter',
            'matches' => 'Konfirmasi password tidak sama'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('user/edit_password', $data);
            $this->load->view('template/footer');
        } else {
            $password_lama = htmlspecialchars(md5($this->input->post('password_lama')));
            $password = htmlspecialchars(md5($this->input->post('password_baru')));
            $id = $data['user']['id'];
            $data_input = [
                'password' => $password
            ];

            if ($password_lama == $data['user']['password']) {
                if ($password == $data['user']['password']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru Yang Anda Masukkan Sama Dengan Password Lama Anda</div>');
                    redirect('user/edit_password');
                } else {

                    $this->User_model->edit_password($data_input, $id);
                    $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah
                  </div>');
                    redirect('user/profil');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Lama Salah</div>');
                redirect('user/edit_password');

            }


        }


    }


    public function kinerja()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = 'Kinerja';
        $id = $this->session->userdata('id_level');
        $kd_guru = $this->session->userdata('kode_guru');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datakegiatan'] = $this->User_model->get_all_kegiatan();
        $tanggal_input = hari_indo($this->input->post("tanggal_input"));
        $tanggal = $this->input->post("tanggal_input");

        // Mendapatkan input pencarian
        $search_query = $this->input->post('search_query');
        $search_type = $this->input->post('search_type');

        // Pagination setup
        $this->load->library('pagination');
        $config['base_url'] = site_url('user/kinerja');
        $config['total_rows'] = $this->User_model->count_all_kinerja_by_guru($kd_guru, $search_query);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);

        // Mendapatkan nomor halaman saat ini
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Mengambil data kinerja berdasarkan halaman dan pencarian
        $data['datakinerja'] = $this->User_model->get_all_kinerja_by_guru($kd_guru, $config['per_page'], $page, $search_query, $search_type);

        // Manual pagination
        $total_pages = ceil($config['total_rows'] / $config['per_page']);
        $data['pagination_links'] = $this->create_manual_pagination($total_pages, $page, $config['per_page']);

        // Validasi hanya jika tombol submit_kinerja di-trigger
        if (isset($_POST['submit_kinerja'])) {
            $this->form_validation->set_rules('tanggal_input', 'Tanggal', 'trim|required|callback_check_tanggal_unique_by_guru', [
                'required' => 'Harap isi tanggal'
            ]);
            // Validasi kegiatan pertama (kegiatan[0])
            $this->form_validation->set_rules('kegiatan[0]', 'Kegiatan Pertama', 'required', [
                'required' => 'Harap isi minimal satu kegiatan'
            ]);
        }

        // Memasukkan query pencarian ke data
        $data['search_query'] = $search_query;
        $data['search_type'] = $search_type;

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('user/kinerja', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['submit_kinerja'])) {
                $this->insert_kinerja();
            }

            if (isset($_POST['edit_level'])) {
                $this->edit_kinerja();
            }
            if (isset($_POST['delete_kinerja'])) {
                $this->delete_kinerja();
            }
        }
    }



    public function check_tanggal_unique_by_guru($tanggal)
    {
        $tanggal_input = hari_indo($this->input->post("tanggal_input"));
        $kd_guru = $this->session->userdata('kode_guru');

        // Panggil model untuk mengecek data
        $is_exist = $this->User_model->check_tanggal_guru($tanggal, $kd_guru);

        if ($is_exist) {
            // Pesan error jika tanggal sudah ada
            $this->form_validation->set_message('check_tanggal_unique_by_guru', 'Kegiatan pada hari ' . $tanggal_input . ' sudah ada');
            return false;
        }
        return true;
    }


    private function create_manual_pagination($total_pages, $current_page, $per_page)
    {
        $pagination = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';

        // Previous Link
        if ($current_page == 0) {
            $pagination .= '<li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i> Previous</span></li>';
        } else {
            $pagination .= '<li class="page-item"><a class="page-link" href="' . site_url('user/kinerja/' . ($current_page - $per_page)) . '"><i class="fas fa-chevron-left"></i> Previous</a></li>';
        }

        // Page Numbers
        for ($i = 0; $i < $total_pages; $i++) {
            if ($i * $per_page == $current_page) {
                $pagination .= '<li class="page-item active" aria-current="page"><span class="page-link">' . ($i + 1) . '</span></li>';
            } else {
                $pagination .= '<li class="page-item"><a class="page-link" href="' . site_url('user/kinerja/' . ($i * $per_page)) . '">' . ($i + 1) . '</a></li>';
            }
        }

        // Next Link
        if ($current_page >= ($total_pages - 1) * $per_page) {
            $pagination .= '<li class="page-item disabled"><span class="page-link">Next <i class="fas fa-chevron-right"></i></span></li>';
        } else {
            $pagination .= '<li class="page-item"><a class="page-link" href="' . site_url('user/kinerja/' . ($current_page + $per_page)) . '">Next <i class="fas fa-chevron-right"></i></a></li>';
        }

        $pagination .= '</ul></nav>';
        return $pagination;
    }
    public function check_tanggal($tanggal)
    {
        $tanggal_input = hari_indo($this->input->post("tanggal_input"));

        if ($this->User_model->is_tanggal_exist($tanggal)) {
            $this->form_validation->set_message('check_tanggal', 'Kegiatan pada hari ' . $tanggal_input . ' sudah ada');
            return FALSE;
        }
        return TRUE;
    }


    public function insert_kinerja()
    {
        $username = $this->session->userdata('username');
        $kd_guru = $this->session->userdata('kode_guru');
        $data_user = $this->User_model->get_user_login($username)->row_array();

        // Ambil data dari input form
        $tanggal = $this->input->post('tanggal_input');
        $kegiatan_dropdown = $this->input->post('kegiatan'); // Kegiatan dari select
        $kegiatan_lainnya = $this->input->post('kegiatan_lainnya'); // Kegiatan dari input lainnya (manual)

        // Gabungkan kegiatan dari dropdown dan manual (jika diisi)
        $kegiatan_combined = [];
        if (!empty($kegiatan_dropdown)) {
            foreach ($kegiatan_dropdown as $index => $kegiatan) {
                // Cek apakah kegiatan dari dropdown adalah "lainnya"
                if ($kegiatan === 'lainnya' && !empty($kegiatan_lainnya[$index])) {
                    // Jika dipilih "lainnya", tambahkan kegiatan dari input manual
                    $kegiatan_combined[] = $kegiatan_lainnya[$index];
                } else {
                    // Jika bukan "lainnya", tambahkan kegiatan dari dropdown
                    $kegiatan_combined[] = $kegiatan;
                }
            }
        }

        // Gabungkan semua kegiatan dengan tanda koma sebagai pemisah
        $uraian = implode(", ", $kegiatan_combined);

        // Menangani upload file
        if (empty($_FILES['bukti']['name'])) {
            $this->session->set_flashdata('error_upload', '<div class="alert alert-danger" role="alert">
            Harap unggah bukti kegiatan
        </div>');
            redirect('user/kinerja');
        }

        $new_file_name = '';
        if (!empty($_FILES['bukti']['name'])) {
            // Konfigurasi upload untuk gambar saja
            $config['upload_path'] = './assets/images/bukti_kegiatan/';
            $config['allowed_types'] = 'jpg|jpeg|png'; // Hanya izinkan gambar
            $config['max_size'] = 0; // 0 berarti tidak ada batasan

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('user/kinerja');
            } else {
                // Ambil nama file yang diunggah
                $uploaded_file_name = $this->upload->data('file_name');
                $file_extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
                $new_file_name = $kd_guru . "_" . date('Y-m-d', strtotime($tanggal)) . '_' . uniqid() . '.' . $file_extension;

                // Inisialisasi ImageManager
                $manager = new ImageManager(['driver' => 'gd']); // Menggunakan GD sebagai driver

                // Menggunakan Intervention Image untuk kompresi
                $img = $manager->make('./assets/images/bukti_kegiatan/' . $uploaded_file_name);

                // Kompresi hingga 500 KB
                $compression_quality = 75; // Awal kualitas kompresi
                do {
                    $img->save('./assets/images/bukti_kegiatan/' . $new_file_name, $compression_quality);
                    $file_size = filesize('./assets/images/bukti_kegiatan/' . $new_file_name);
                    $compression_quality -= 5; // Turunkan kualitas jika ukuran masih lebih dari 500 KB
                } while ($file_size > 1000 * 1024 && $compression_quality > 0); // Terus kompres hingga ukuran lebih kecil dari 500 KB atau kualitas mencapai 0

                // Hapus file asli
                unlink('./assets/images/bukti_kegiatan/' . $uploaded_file_name);
            }
        }

        // Persiapan data yang akan disimpan ke dalam database
        $data = [
            'kode_guru' => $kd_guru,
            'id_jabatan' => $data_user['id_level'], // Contoh ID jabatan
            'id_tugas_tambahan' => $data_user['id_tugas_tambahan'], // Contoh ID tugas tambahan
            'uraian' => $uraian, // Kegiatan yang sudah digabungkan
            'tanggal' => $tanggal,
            'bukti' => $new_file_name // Nama file bukti
        ];

        // Simpan data ke database
        $this->User_model->tambah_kinerja($data);

        // Set pesan sukses dan redirect kembali ke halaman kinerja
        $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">Data kinerja berhasil ditambahkan</div>');
        redirect('user/kinerja');
    }

    // Fungsi untuk mengompres gambar
    private function compress_image($source, $max_size)
    {
        // Mendapatkan ukuran gambar
        list($width, $height) = getimagesize($source);

        // Menghitung ratio untuk skala
        $ratio = $width / $height;

        // Mengatur dimensi gambar berdasarkan max_size
        if ($width > $height) {
            $new_width = $max_size;
            $new_height = $max_size / $ratio;
        } else {
            $new_height = $max_size;
            $new_width = $max_size * $ratio;
        }

        // Membuat gambar baru
        $image = imagecreatetruecolor($new_width, $new_height);

        // Memuat gambar sesuai format
        if (pathinfo($source, PATHINFO_EXTENSION) == 'jpg' || pathinfo($source, PATHINFO_EXTENSION) == 'jpeg') {
            $original_image = imagecreatefromjpeg($source);
        } elseif (pathinfo($source, PATHINFO_EXTENSION) == 'png') {
            $original_image = imagecreatefrompng($source);
        }

        // Mengubah ukuran dan mengompres gambar
        imagecopyresampled($image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        // Simpan gambar yang sudah terkompresi
        if (pathinfo($source, PATHINFO_EXTENSION) == 'jpg' || pathinfo($source, PATHINFO_EXTENSION) == 'jpeg') {
            imagejpeg($image, $source, 75); // Kualitas kompresi 75
        } elseif (pathinfo($source, PATHINFO_EXTENSION) == 'png') {
            imagepng($image, $source, 7); // Tingkat kompresi 0-9 (0 terbaik, 9 terburuk)
        }

        // Membersihkan memori
        imagedestroy($image);
        imagedestroy($original_image);
    }

    public function edit_kinerja()
    {
        $id_kinerja = $this->input->post('id'); // Pastikan ID dikirimkan dari form
        $kd_guru = $this->session->userdata('kode_guru');
        $data_user = $this->User_model->get_user_login($this->session->userdata('username'))->row_array();

        $tanggal = $this->input->post('tanggal_input');
        $kegiatan_dropdown = $this->input->post('kegiatan'); // Kegiatan dari select
        $kegiatan_lainnya = $this->input->post('kegiatan_lainnya'); // Kegiatan dari input lainnya (manual)

        // Gabungkan kegiatan dari dropdown dan manual (jika diisi)
        $kegiatan_combined = [];
        if (!empty($kegiatan_dropdown)) {
            foreach ($kegiatan_dropdown as $index => $kegiatan) {
                if ($kegiatan === 'lainnya' && !empty($kegiatan_lainnya[$index])) {
                    $kegiatan_combined[] = $kegiatan_lainnya[$index]; // Ambil input manual
                } else {
                    $kegiatan_combined[] = $kegiatan; // Ambil dari dropdown
                }
            }
        }

        $uraian = implode(", ", $kegiatan_combined); // Gabungkan menjadi string
        log_message('info', print_r($kegiatan_combined, true)); // Tambahkan log untuk debugging

        $uraian = implode(", ", $kegiatan_combined); // Gabungkan semua kegiatan ke string


        // Menangani upload file jika ada
        $new_file_name = null; // Inisialisasi nama file baru
        if (!empty($_FILES['bukti']['name'])) {
            // Konfigurasi upload
            $config['upload_path'] = './assets/images/bukti_kegiatan/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Hanya gambar
            $config['max_size'] = 0; // Tanpa batasan ukuran upload

            // Inisialisasi konfigurasi upload
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti')) {
                // Jika gagal upload, tampilkan error
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('user/kinerja');
            } else {
                // Ambil nama file yang diunggah
                $uploaded_file_name = $this->upload->data('file_name');
                $file_extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
                $new_file_name = $kd_guru . "_" . date('Y-m-d', strtotime($tanggal)) . '_' . uniqid() . '.' . $file_extension;

                // Inisialisasi ImageManager untuk kompresi
                $manager = new ImageManager(['driver' => 'gd']); // Menggunakan GD sebagai driver

                // Menggunakan Intervention Image untuk kompresi
                $img = $manager->make($config['upload_path'] . $uploaded_file_name);

                // Kompresi hingga 500 KB
                $compression_quality = 75; // Awal kualitas kompresi
                do {
                    $img->save($config['upload_path'] . $new_file_name, $compression_quality);
                    $file_size = filesize($config['upload_path'] . $new_file_name);
                    $compression_quality -= 5; // Turunkan kualitas jika ukuran masih lebih dari 500 KB
                } while ($file_size > 1000 * 1024 && $compression_quality > 0); // Terus kompres hingga ukuran lebih kecil dari 500 KB atau kualitas mencapai 0

                // Hapus file asli yang diunggah
                unlink($config['upload_path'] . $uploaded_file_name);

                // Hapus file lama jika ada
                $old_file = $this->User_model->get_by_id($id_kinerja)['bukti']; // Menggunakan $id_kinerja
                if (!empty($old_file) && file_exists($config['upload_path'] . $old_file)) {
                    unlink($config['upload_path'] . $old_file);
                }
            }
        } else {
            // Jika tidak ada file diunggah, gunakan file lama
            $new_file_name = $this->User_model->get_by_id($id_kinerja)['bukti'];
        }

        // Simpan perubahan ke database
        $data = [
            'tanggal' => $tanggal,
            'uraian' => $uraian,
            'bukti' => $new_file_name
        ];

        $this->User_model->edit_kinerja($id_kinerja, $data);

        // Redirect kembali setelah sukses
        $this->session->set_flashdata('success', 'Data kinerja berhasil diperbarui!');
        redirect('user/kinerja');
    }


    public function delete_kinerja()
    {
        $tanggal = htmlspecialchars($this->input->post('tanggal_input'));
        $id = htmlspecialchars($this->input->post('id'));

        // Ambil nama file dari database berdasarkan ID kinerja
        $kinerja = $this->User_model->get_by_id($id);
        $file_to_delete = $kinerja['bukti']; // Ambil nama file bukti dari entri

        // Hapus data dari database
        $this->User_model->delete_kinerja($id);

        // Hapus file dari server jika ada
        if (!empty($file_to_delete) && file_exists('./assets/images/bukti_kegiatan/' . $file_to_delete)) {
            unlink('./assets/images/bukti_kegiatan/' . $file_to_delete);
        }

        // Set pesan sukses dan redirect
        $this->session->set_flashdata('message_level', '<div class="alert alert-success" role="alert">Data pada hari ' .
            hari_indo($tanggal) .
            ' telah dihapus</div>');
        redirect('user/kinerja');
    }


    public function download_kinerja_pdf()
    {
        // Ambil data dari session dan model
        $username = $this->session->userdata('username');
        $data['judul'] = 'Kinerja';
        $id = $this->session->userdata('id_level');
        $kd_guru = $this->session->userdata('kode_guru');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datakinerja'] = $this->User_model->get_all_kinerja_by_guru($kd_guru);
        $data['datakegiatan'] = $this->User_model->get_all_kegiatan();
        $tanggal_sekarang = date("Y-m-d");
        $nama_user = $data['user']['nama'];

        // Ambil tanggal dari data kinerja untuk mendapatkan bulan
        if (!empty($data['datakinerja'])) {
            // Ambil tanggal dari kinerja yang pertama
            $firstKinerja = $data['datakinerja'][0]['tanggal'];

            // Menggunakan fungsi helper untuk mendapatkan nama bulan
            $bulan = nama_bulan_indo($firstKinerja); // Menggunakan fungsi helper
            $data['bulan'] = $bulan; // Simpan nama bulan dalam data
        } else {
            $data['bulan'] = 'Bulan Tidak Diketahui'; // Atur default jika tidak ada data
        }

        // Memuat library Pdf
        $this->load->library('Pdf');

        // Buat objek PDF
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set info dokumen
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Author Name');
        $pdf->SetTitle('Laporan Kinerja');
        $pdf->SetSubject('Laporan');
        $pdf->SetKeywords('TCPDF, PDF, laporan, kinerja');

        // Set margin, font, dan lain-lain
        $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT); // Margin kiri dan kanan
        $pdf->SetHeaderMargin(0); // Hilangkan margin header
        $pdf->SetFooterMargin(0); // Hilangkan margin footer
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Tambah halaman baru
        $pdf->AddPage(); // Tambahkan halaman

        // Render view ke variabel
        $html = $this->load->view('user/laporan_kinerja_pdf', $data, true);

        // Tambahkan HTML dari view ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Outputkan PDF (langsung download)
        $pdf->Output('laporan_kinerja-' . $nama_user . "-" . $tanggal_sekarang . ".pdf", 'D');
    }

    public function download_kinerja_pdf2()
    {
        // Ambil data dari session dan model
        $username = $this->session->userdata('username');
        $data['judul'] = 'Kinerja';
        $id = $this->session->userdata('id_level');
        $kd_guru = $this->session->userdata('kode_guru');
        $data['menu'] = $this->User_model->user_menu($id)->result_array();
        $data['user'] = $this->User_model->get_user_login($username)->row_array();
        $data['datakegiatan'] = $this->User_model->get_all_kegiatan();
        $tanggal_sekarang = date("Y-m-d");
        $nama_user = $data['user']['nama'];

        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");
        $tanggal_mulai = $this->input->post("tanggal_mulai");
        $tanggal_selesai = $this->input->post("tanggal_selesai");

        if (!empty($bulan)) {
            $data['datakinerja'] = $this->User_model->get_all_kinerja_by_guru_bulan($kd_guru, $bulan, $tahun);
        } else if (!empty($tanggal_mulai)) {
            $data['datakinerja'] = $this->User_model->get_all_kinerja_by_guru_tanggal($kd_guru, $tanggal_mulai, $tanggal_selesai);
        } else {
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
        $html = $this->load->view('user/laporan_kinerja_pdf', $data, true);

        // Load HTML ke mPDF
        $this->mpdf_gen->mpdf->WriteHTML($html);

        // Outputkan PDF (langsung download)
        $this->mpdf_gen->mpdf->Output('laporan_kinerja-' . $nama_user . "-" . $tanggal_sekarang . ".pdf", 'D');
    }

    public function testing()
    {
        // Ambil data dari session dan model
        $username = $this->session->userdata('username');
        $data['judul'] = 'Kinerja';
        $id = $this->session->userdata('id_level');
        $kd_guru = $this->input->post('kode_guru');
        $nama_user = $this->input->post('nama');
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
            $data['datakinerja'] = $this->User_model->get_all_kinerja_by_guru_bulan($kd_guru, $bulan, $tahun);
        } else if (!empty($tanggal_mulai)) {
            $data['datakinerja'] = $this->User_model->get_all_kinerja_by_guru_tanggal($kd_guru, $tanggal_mulai, $tanggal_selesai);
        } else {
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


        $this->load->view('staff/laporan_kinerja_pdf', $data);

    }


}
