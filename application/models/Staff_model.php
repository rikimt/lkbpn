<?php
class Staff_model extends CI_Model
{
    public function get_all_kinerja()
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_jabatan.jabatan, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_jabatan ON kinerja.id_jabatan=user_jabatan.id
        JOIN user_tugas_tambahan ON kinerja.id_tugas_tambahan=user_tugas_tambahan.id
        WHERE kinerja.kode_guru != 'RMT126'
        ORDER BY user.nama ASC, kinerja.tanggal DESC ");
        return $sql->result_array();

    }

    public function get_all_kinerja_by_guru_bulan($kd_guru, $bulan, $tahun)
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_jabatan.jabatan, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_jabatan ON kinerja.id_jabatan=user_jabatan.id
        JOIN user_tugas_tambahan ON kinerja.id_tugas_tambahan=user_tugas_tambahan.id WHERE kinerja.kode_guru='$kd_guru' AND MONTH(kinerja.tanggal) = $bulan AND YEAR(kinerja.tanggal) = $tahun ORDER BY tanggal DESC");
        return $sql->result_array();

    }
    public function get_all_kinerja_by_guru_tanggal($kd_guru, $tanggal_mulai, $tanggal_selesai)
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_jabatan.jabatan, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_jabatan ON kinerja.id_jabatan=user_jabatan.id
        JOIN user_tugas_tambahan ON kinerja.id_tugas_tambahan=user_tugas_tambahan.id WHERE kinerja.kode_guru='$kd_guru' AND kinerja.tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ORDER BY kinerja.tanggal DESC");
        return $sql->result_array();

    }
    public function get_all_kinerja_by_guru_id($id)
    {
        $sql = $this->db->query("SELECT user.nama, user_level.level, user_jabatan.jabatan, user_tugas_tambahan.nama_tugas, kinerja.uraian, kinerja.tanggal, kinerja.bukti, kinerja.id, kinerja.kode_guru FROM kinerja 
        JOIN user ON kinerja.kode_guru=user.kode_guru  
        JOIN user_level ON kinerja.id_jabatan=user_level.id
        JOIN user_jabatan ON kinerja.id_jabatan=user_jabatan.id
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

    public function get_all_guru_aktif()
    {
        $sql = $this->db->query("SELECT user.id AS guru_id, user.*, user_level.level, user_jabatan.jabatan, user_tugas_tambahan.nama_tugas 
                             FROM user 
                             JOIN user_level ON user.id_level = user_level.id 
                             JOIN user_jabatan ON user.id_jabatan = user_jabatan.id 
                             JOIN user_tugas_tambahan ON user.id_tugas_tambahan = user_tugas_tambahan.id 
                             WHERE user.status_aktif = 1 ORDER BY nama");
        return $sql->result_array();

    }

    public function get_all_guru_tidak_aktif()
    {
        $sql = $this->db->query("SELECT user.id AS guru_id, user.*, user_level.level, user_jabatan.jabatan, user_tugas_tambahan.nama_tugas 
                             FROM user 
                             JOIN user_level ON user.id_level = user_level.id 
                             JOIN user_jabatan ON user.id_jabatan = user_jabatan.id 
                             JOIN user_tugas_tambahan ON user.id_tugas_tambahan = user_tugas_tambahan.id 
                             WHERE user.status_aktif = 0 ORDER BY nama");
        return $sql->result_array();

    }


    public function tambah_guru($data)
    {
        $this->db->insert('user', $data);
    }

    public function tambah_user_jabatan($data)
    {
        $this->db->insert('user_jabatan', $data);
    }
    public function tambah_kegiatan($data)
    {
        $this->db->insert('kinerja_kegiatan', $data);
    }
    public function tambah_tugas($data)
    {
        $this->db->insert('user_tugas_tambahan', $data);
    }


    public function edit_guru($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }


    public function edit_user_jabatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_jabatan', $data);

    }

    public function edit_kegiatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('kinerja_kegiatan', $data);

    }
    public function edit_tugas($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_tugas_tambahan', $data);

    }

    public function off_guru($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }




    public function delete_guru($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

    }

    public function delete_user_jabatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_jabatan');

    }
    public function delete_kegiatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kinerja_kegiatan');

    }
    public function delete_tugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_tugas_tambahan');

    }





}