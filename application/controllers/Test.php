<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    public function index() {
        // โหลดฐานข้อมูล
        $this->load->database();

        // ตรวจสอบการเชื่อมต่อฐานข้อมูล
        if ($this->db->conn_id) {
            echo "Database connection successful!";
        } else {
            echo "Database connection failed!";
        }
    }
}
