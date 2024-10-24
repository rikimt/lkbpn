<?php
class Login_model Extends CI_Model {
    public function login($username='',$password=''){
        $sql = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' limit 1 ");
        return $sql->result_array();
        
    }
}