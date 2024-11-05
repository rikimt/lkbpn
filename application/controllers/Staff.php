<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Staff_model');
        cek_login();


    }

    public function index()
    {

    }
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
