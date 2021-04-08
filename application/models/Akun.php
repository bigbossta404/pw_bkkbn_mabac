<?php

class Akun extends CI_Model
{
    function getakun($username)
    {
        $this->db->select('*');
        $this->db->from('admin_data');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->row_array();
    }
}
