<?php
class Staff_model extends CI_Model
{
    public function get_all_kinerja()
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_tugas_tambahan ON kinerja.id_tugas_tambahan=user_tugas_tambahan.id
        WHERE kinerja.kode_guru != 'RMT126'
        ORDER BY user.nama ASC, kinerja.tanggal DESC ");
        return $sql->result_array();

    }

    public function get_all_kinerja_by_guru_bulan($kd_guru, $bulan, $tahun)
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_tugas_tambahan ON kinerja.id_tugas_tambahan=user_tugas_tambahan.id WHERE kinerja.kode_guru='$kd_guru' AND MONTH(kinerja.tanggal) = $bulan AND YEAR(kinerja.tanggal) = $tahun ORDER BY tanggal DESC");
        return $sql->result_array();

    }
    public function get_all_kinerja_by_guru_tanggal($kd_guru, $tanggal_mulai, $tanggal_selesai)
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_tugas_tambahan ON kinerja.id_tugas_tambahan=user_tugas_tambahan.id WHERE kinerja.kode_guru='$kd_guru' AND kinerja.tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ORDER BY kinerja.tanggal DESC");
        return $sql->result_array();

    }
    public function get_all_kinerja_by_guru_id($id)
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_tugas_tambahan ON kinerja.id_tugas_tambahan=user_tugas_tambahan.id WHERE kinerja.id='$id'");
        return $sql->result_array();

    }
    public function get_guru_by_kinerja()
    {
        $sql = $this->db->query("SELECT user.nama, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru WHERE kinerja.kode_guru != 'RMT126' GROUP BY kinerja.kode_guru ");
        return $sql->result_array();

    }
    public function get_guru_by_kode($kode)
    {
        $sql = $this->db->query("SELECT user.nama FROM user WHERE kode_guru='$kode'");
        return $sql->row_array();

    }


}