<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function insert_user($username, $password, $identification_number, $faculty, $major, $user_type) {
        // สร้างข้อมูลผู้ใช้
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT), // แฮชรหัสผ่านเพื่อความปลอดภัย
            'identification_number' => $identification_number,
            'faculty' => $faculty,
            'major' => $major,
            'user_type' => $user_type
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
