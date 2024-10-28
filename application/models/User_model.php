<?php
class User_model extends CI_Model
{
    public function get_user()
    {
        $sql = $this->db->get('user');
        return $sql->result_array();

    }
    public function get_all_level()
    {
        $sql = $this->db->get('user_level');
        return $sql->result_array();

    }
    public function get_all_menu()
    {
        $sql = $this->db->get('user_menu');
        return $sql->result_array();

    }
    public function get_all_menu_akses()
    {
        $sql = $this->db->query("SELECT * FROM user_menu");
        return $sql->result_array();

    }
    public function get_all_sub_menu_aktif()
    {
        $sql = $this->db->query("SELECT user_sub_menu.id, user_sub_menu.id_menu,user_sub_menu.judul,user_sub_menu.url,user_sub_menu.icon,user_sub_menu.no_urut,user_sub_menu.is_active,user_menu.nama_menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.id_menu=user_menu.id WHERE is_active=1 ORDER BY user_menu.id");
        return $sql->result_array();

    }
    public function get_urut_sub_menu()
    {
        $sql = $this->db->query("SELECT no_urut FROM user_sub_menu ORDER BY no_urut DESC LIMIT 1");
        return $sql->row_array();

    }
    public function get_all_sub_menu_tidak_aktif()
    {
        $sql = $this->db->query("SELECT user_sub_menu.id, user_sub_menu.id_menu,user_sub_menu.judul,user_sub_menu.url,user_sub_menu.icon,user_sub_menu.no_urut,user_sub_menu.is_active,user_menu.nama_menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.id_menu=user_menu.id WHERE is_active=0 ORDER BY user_menu.id");
        return $sql->result_array();

    }
    public function get_user_by_id($id)
    {
        $sql = $this->db->where('user', $id);
        return $sql->result_array();

    }
    public function get_level_by_id($id_level)
    {
        $sql = $this->db->get_where('user_level', ['id' => $id_level]);
        return $sql->row_array();

    }
    public function get_user_login($username)
    {
        $sql = $this->db->query("SELECT user.id AS guru_id, user.*, user_level.level, user_tugas_tambahan.nama_tugas 
                             FROM user 
                             JOIN user_level ON user.id_level = user_level.id 
                             JOIN user_tugas_tambahan ON user.id_tugas_tambahan = user_tugas_tambahan.id WHERE username='$username' limit 1 ");
        return $sql;

    }

    public function get_user_profil($id)
    {
        $sql = $this->db->query("SELECT user.id AS guru_id, user.*, user_level.level, user_tugas_tambahan.nama_tugas 
                             FROM user 
                             JOIN user_level ON user.id_level = user_level.id 
                             JOIN user_tugas_tambahan ON user.id_tugas_tambahan = user_tugas_tambahan.id  WHERE user.id='$id' limit 1 ");
        return $sql;

    }
    public function get_akses($data)
    {
        $sql = $this->db->get_where('user_access_menu', $data);
        return $sql;

    }


    public function tambah_user($data)
    {
        $this->db->insert('user', $data);
    }
    public function tambah_guru($data)
    {
        $this->db->insert('user', $data);
    }
    public function tambah_user_level($data)
    {
        $this->db->insert('user_level', $data);
    }
    public function tambah_kegiatan($data)
    {
        $this->db->insert('kinerja_kegiatan', $data);
    }
    public function tambah_kinerja($data)
    {
        $this->db->insert('kinerja', $data);
    }
    public function tambah_user_menu($data)
    {
        $this->db->insert('user_menu', $data);
    }
    public function tambah_user_sub_menu($data)
    {
        $this->db->insert('user_sub_menu', $data);
    }
    public function tambah_akses($data)
    {
        $this->db->insert('user_access_menu', $data);
    }


    public function edit_guru($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }
    public function edit_user_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);

    }
    public function edit_user_level($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_level', $data);

    }
    public function edit_kinerja($id, $data)
    {
        $this->db->where('id', $id); // Pastikan ID disini bukan array
        return $this->db->update('kinerja', $data); // Pastikan data berupa array valid
    }
    public function edit_kegiatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('kinerja_kegiatan', $data);

    }
    public function edit_user_sub_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);

    }
    public function edit_profil($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }
    public function edit_password($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }

    public function off_user_sub_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);

    }
    public function off_guru($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }


    public function delete_user_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

    }
    public function delete_guru($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

    }
    public function delete_user_level($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_level');

    }
    public function delete_kegiatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kinerja_kegiatan');

    }
    public function delete_kinerja($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kinerja');

    }
    public function delete_user_sub_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

    }
    public function delete_akses($data)
    {
        $this->db->delete('user_access_menu', $data);
    }


    public function user_menu($id)
    {
        return $this->db->query("SELECT user_menu.id, nama_menu FROM user_menu JOIN user_access_menu ON user_menu.id=user_access_menu.id_menu WHERE user_access_menu.id_level = '$id' AND user_menu.nama_menu != 'Home' ORDER BY user_access_menu.id_menu DESC");
    }
    public function user_sub_menu($id)
    {
        return $this->db->query("SELECT * FROM user_sub_menu JOIN user_menu ON user_sub_menu.id_menu=user_menu.id WHERE user_sub_menu.id_menu = '$id'");
    }

    public function cek_akses_menu($data)
    {
        return $this->db->get_where('user_access_menu', $data)->row_array();
    }


    public function get_all_guru_aktif()
    {
        $sql = $this->db->query("SELECT user.id AS guru_id, user.*, user_level.level, user_tugas_tambahan.nama_tugas 
                             FROM user 
                             JOIN user_level ON user.id_level = user_level.id 
                             JOIN user_tugas_tambahan ON user.id_tugas_tambahan = user_tugas_tambahan.id 
                             WHERE user.status_aktif = 1 ORDER BY nama");
        return $sql->result_array();

    }

    public function get_all_guru_tidak_aktif()
    {
        $sql = $this->db->query("SELECT user.id AS guru_id, user.*, user_level.level, user_tugas_tambahan.nama_tugas 
                             FROM user 
                             JOIN user_level ON user.id_level = user_level.id 
                             JOIN user_tugas_tambahan ON user.id_tugas_tambahan = user_tugas_tambahan.id 
                             WHERE user.status_aktif = 0 ORDER BY nama");
        return $sql->result_array();

    }

    public function get_all_kegiatan()
    {
        $sql = $this->db->query('SELECT * FROM kinerja_kegiatan ORDER BY nama_kegiatan ASC');
        return $sql->result_array();

    }
    public function get_all_jabatan()
    {
        $sql = $this->db->query("SELECT * FROM user_level ORDER BY CASE WHEN level = 'Guru' THEN 0 ELSE 1 END, level ASC;");
        return $sql->result_array();

    }
    public function get_all_tugas_tambahan()
    {
        $sql = $this->db->query('SELECT * FROM user_tugas_tambahan ORDER BY nama_tugas ASC');
        return $sql->result_array();

    }
    public function get_all_kinerja_by_guru($kd_guru, $limit, $offset, $search_query = null, $search_type = null)
    {
        $this->db->from('kinerja');
        $this->db->where('kode_guru', $kd_guru);

        if ($search_query) {
            if ($search_type == 'uraian') {
                $this->db->like('uraian', $search_query);
            } elseif ($search_type == 'tanggal') {
                $this->db->where('DAY(tanggal)', $search_query);
            } elseif ($search_type == 'bulan') {
                $this->db->where('MONTH(tanggal)', $search_query);
            } elseif ($search_type == 'tahun') {
                $this->db->where('YEAR(tanggal)', $search_query);
            }
        }

        $this->db->limit($limit, $offset);
        $this->db->order_by('tanggal', 'DESC');

        return $this->db->get()->result_array();
    }
    public function get_all_kinerja_by_guru_bulan($kd_guru, $bulan, $tahun)
    {
        $sql = $this->db->query("SELECT * FROM kinerja WHERE kode_guru='$kd_guru' AND MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal DESC");
        return $sql->result_array();

    }
    public function get_all_kinerja_by_guru_tanggal($kd_guru, $tanggal_mulai, $tanggal_selesai)
    {
        $sql = $this->db->query("SELECT * FROM kinerja WHERE kode_guru='$kd_guru' AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ORDER BY tanggal DESC");
        return $sql->result_array();

    }

    public function get_by_id($id)
    {
        return $this->db->get_where('kinerja', ['id' => $id])->row_array(); // Mengambil data berdasarkan id
    }

    public function is_tanggal_exist($tanggal)
    {
        $this->db->where('tanggal', $tanggal);
        $query = $this->db->get('kinerja'); // Ganti 'data' dengan nama tabel Anda

        if ($query->num_rows() > 0) {
            return TRUE; // Tanggal sudah ada
        }
        return FALSE; // Tanggal belum ada
    }
    public function check_tanggal_guru($tanggal, $kd_guru)
    {
        $this->db->from('kinerja');
        $this->db->where('tanggal', $tanggal);
        $this->db->where('kode_guru', $kd_guru);
        $query = $this->db->get();

        // Jika ada data yang ditemukan, kembalikan true
        return $query->num_rows() > 0;
    }

    public function count_all_kinerja_by_guru($kd_guru, $search_query = null, $search_type = null)
    {
        $this->db->from('kinerja');
        $this->db->where('kode_guru', $kd_guru);

        if ($search_query) {
            if ($search_type == 'uraian') {
                $this->db->like('uraian', $search_query);
            } elseif ($search_type == 'tanggal') {
                $this->db->where('tanggal', $search_query);
            } elseif ($search_type == 'bulan') {
                $this->db->where('MONTH(tanggal)', $search_query);
            } elseif ($search_type == 'tahun') {
                $this->db->where('YEAR(tanggal)', $search_query);
            }
        }

        return $this->db->count_all_results();
    }
}