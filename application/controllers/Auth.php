<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function register() {
        // โหลด Helper ที่ใช้สำหรับทำงานกับ Form และ URL
        $this->load->helper(array('form', 'url'));
        
        // แสดงแบบฟอร์มการลงทะเบียน
        $this->load->view('register_form');
    }

    public function register_user() {
        // โหลดโมเดล
        $this->load->model('User_model');
        
        // รับข้อมูลจากฟอร์ม
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $identification_number = $this->input->post('identification_number');
        $faculty = $this->input->post('faculty');
        $major = $this->input->post('major');
        $user_type = $this->input->post('user_type');
    
        // ตรวจสอบความถูกต้องของข้อมูล (สามารถปรับแต่งตามความต้องการ)
        if (empty($username) || empty($password) || empty($identification_number) || 
            empty($faculty) || empty($major) || empty($user_type)) {
            echo "All fields are required!";
            return;
        }
    
        // บันทึกข้อมูลผู้ใช้
        if ($this->User_model->insert_user($username, $password, $identification_number, $faculty, $major, $user_type)) {
            echo "Registration successful!";
        } else {
            echo "Registration failed! Please check your inputs or try again.";
        }
    }
    

    public function login() {
        // โหลด Helper ที่ใช้สำหรับทำงานกับ Form และ URL
        $this->load->helper(array('form', 'url'));
    
        // แสดงแบบฟอร์มการเข้าสู่ระบบ
        $this->load->view('login_form');
    }
    
    public function login_user() {
        // โหลด Helper ที่ใช้สำหรับทำงานกับ URL
        $this->load->helper('url'); 
    
        // โหลดโมเดล
        $this->load->model('User_model');
    
        // รับข้อมูลจากฟอร์ม
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // ตรวจสอบผู้ใช้
        $user = $this->User_model->get_user($username);
    
        // ตรวจสอบรหัสผ่าน
        if ($user && password_verify($password, $user->password)) {
            // เริ่มต้น session และบันทึกข้อมูลผู้ใช้
            $this->session->set_userdata('user_id', $user->id); // สมมุติว่า id เป็นฟิลด์ในตารางผู้ใช้
            $this->session->set_userdata('username', $username); // บันทึกชื่อผู้ใช้
    
            redirect('event/index'); // เปลี่ยนเส้นทางไปยังหน้ารายการกิจกรรม
        } else {
            echo "Invalid username or password!";
        }
    }

    public function register_event($event_id) {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (!$this->session->userdata('username')) {
            redirect('auth/login'); // เปลี่ยนเส้นทางไปที่หน้าล็อกอินหากยังไม่ล็อกอิน
            return;
        }

        // โหลดโมเดลสำหรับจัดการการลงทะเบียน
        $this->load->model('Event_model');
        
        // รับ user_id จาก session
        $user_id = $this->session->userdata('user_id'); // สมมุติว่าคุณเก็บ user_id ใน session

        // บันทึกการลงทะเบียนกิจกรรม
        if ($this->Event_model->register_user_for_event($user_id, $event_id)) {
            echo "ลงทะเบียนเข้ากิจกรรมเรียบร้อยแล้ว!";
        } else {
            echo "การลงทะเบียนล้มเหลว!";
        }
    }
}
