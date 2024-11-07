<?php
class Admin_model extends CI_Model
{

    public function tambah_user_level($data)
    {
        $this->db->insert('user_level', $data);
    }

    public function tambah_akses($data)
    {
        $this->db->insert('user_access_menu', $data);
    }
    public function tambah_user_menu($data)
    {
        $this->db->insert('user_menu', $data);
    }

    public function tambah_user_sub_menu($data)
    {
        $this->db->insert('user_sub_menu', $data);
    }



    public function edit_user_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);

    }
    public function edit_user_sub_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);

    }

    public function edit_user_level($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_level', $data);

    }

    public function off_user_sub_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);

    }


    public function delete_user_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

    }
    public function delete_user_sub_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

    }

    public function delete_user_level($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_level');

    }

    public function delete_akses($data)
    {
        $this->db->delete('user_access_menu', $data);
    }





}