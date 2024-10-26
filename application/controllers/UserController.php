<?php
class User_model extends CI_Model {

    // ฟังก์ชันสำหรับเพิ่มผู้ใช้ใหม่
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    // ฟังก์ชันตรวจสอบอีเมลที่มีในระบบหรือไม่
    public function check_email_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

    // ฟังก์ชันดึงข้อมูลผู้ใช้ตามอีเมล
    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();  // ส่งคืนแถวข้อมูลผู้ใช้
    }
}
