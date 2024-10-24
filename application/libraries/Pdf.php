<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');

class Pdf extends TCPDF
{
    public function __construct()
    {
        parent::__construct();

        // Set font default ke Times New Roman
        $this->SetFont('times', '', 12); // Ukuran default font
    }

    // Override header method
    public function Header()
    {
        // // Set font untuk header
        // $this->SetFont('times', 'B', 14); // Menggunakan font bold untuk header
        // // Menambahkan teks header
        // $this->Cell(0, 10, 'LAPORAN KINERJA NON ASN', 0, 1, 'C');

        // // Menambahkan teks untuk nama sekolah
        // $this->SetFont('times', '', 12); // Set font menjadi normal
        // $this->Cell(0, 10, 'SMK BINA PUTERA NUSANTARA', 0, 1, 'C');

        // // Mengambil nama bulan dari data yang dikirim ke view
        // $bulan = isset($this->bulan) ? $this->bulan : 'Bulan Tidak Diketahui'; // Ambil bulan dari data
        // $this->Cell(0, 10, 'BULAN ' . strtoupper($bulan), 0, 1, 'C'); // Gunakan nama bulan

        // // Menggambar garis di bawah header
        // $this->Line(10, $this->GetY() + 2, 200, $this->GetY() + 2); // Garis di bawah teks bulan

        // // Set posisi Y untuk teks isi
        // $this->SetY($this->GetY() + 5); // Menyisakan 5 mm di bawah garis
    }

    // Override footer method
    public function Footer()
    {
        // Do nothing to remove footer
    }
}
