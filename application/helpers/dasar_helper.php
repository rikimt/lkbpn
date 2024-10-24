<?php
function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $level = $ci->session->userdata('id_level');
        $menu = $ci->uri->segment(1);

        $query_menu = $ci->db->get_where('user_menu', ['nama_menu' => $menu])->row_array();
        $menu_id = $query_menu['id'];

        $user_access = $ci->db->get_where('user_access_menu', ['id_level' => $level, 'id_menu' => $menu_id]);

        if ($user_access->num_rows() < 1) {
            redirect('Login/blocked');
        }
    }
}

function cek_akses($id_level, $id_menu)
{
    $ci = get_instance();

    $queryAccessMenu = $ci->db->get_where('user_access_menu', ['id_level' => $id_level, 'id_menu' => $id_menu]);
    if ($queryAccessMenu->num_rows() > 0) {
        return "checked='checked'";
    }
}


if (!function_exists('hari_indo')) {
    function hari_indo($tanggal)
    {
        // Pastikan ekstensi intl tersedia untuk IntlDateFormatter
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);

        // Konversi tanggal ke timestamp
        $timestamp = strtotime($tanggal);

        // Format nama hari
        return $formatter->format($timestamp); // Output contoh: Selasa
    }
}

if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal)
    {
        // Menggunakan IntlDateFormatter untuk locale Indonesia
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'd MMMM yyyy');

        // Konversi tanggal ke timestamp
        $timestamp = strtotime($tanggal);

        // Format tanggal
        return $formatter->format($timestamp); // Output contoh: 15 Oktober 2024
    }
}

if (!function_exists('nama_bulan_indo')) {
    function nama_bulan_indo($tanggal)
    {
        // Menggunakan IntlDateFormatter untuk locale Indonesia
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');

        // Konversi tanggal ke timestamp
        $timestamp = strtotime($tanggal);

        // Format hanya nama bulan
        return $formatter->format($timestamp); // Output contoh: Oktober
    }
}

if (!function_exists('tahun_indo')) {
    function tahun_indo($tanggal)
    {
        // Menggunakan IntlDateFormatter untuk locale Indonesia
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'yyyy');

        // Konversi tanggal ke timestamp
        $timestamp = strtotime($tanggal);

        // Format hanya tahun
        return $formatter->format($timestamp); // Output contoh: 2024
    }
}