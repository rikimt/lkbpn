<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use Mpdf\Mpdf;

class Mpdf_gen {
    public function __construct() {
        // Jika Anda menggunakan Composer
        require_once APPPATH . '../vendor/autoload.php'; // Path ke autoload Composer

        // Buat instance mPDF
        $this->mpdf = new Mpdf();
    }
}
