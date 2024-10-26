<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_db extends CI_Controller {

    public function index() {
        $query = $this->db->query("SELECT * FROM events"); // ตรวจสอบการเข้าถึงฐานข้อมูล
        $events = $query->result();
        echo "<pre>";
        print_r($events); // แสดงผลข้อมูลกิจกรรม
        echo "</pre>";
    }
}
