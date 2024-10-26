<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function insert_user($username, $password) {
        // สร้างข้อมูลผู้ใช้
        $data = array(
            'username' => $username,
            'password' => $password
        );

        // บันทึกข้อมูลลงในตาราง users
        return $this->db->insert('users', $data);
    }

    public function get_user($username) {
        // ดึงข้อมูลผู้ใช้จากตาราง users ตาม username
        $this->db->where('username', $username);
        $query = $this->db->get('users');
    
        // คืนค่าผู้ใช้ (ถ้ามี) หรือคืนค่า null
        return $query->row();
    }
}
