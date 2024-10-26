<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->library('session');
        $this->load->helper('url'); // เพิ่มบรรทัดนี้
    }

    public function index() {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        // ดึงข้อมูลกิจกรรมจากโมเดล
        $data['events'] = $this->Event_model->get_active_events_with_registration_count();
    
        // แสดงหน้ากิจกรรม
        $this->load->view('event_list', $data); // ตรวจสอบให้แน่ใจว่าใช้ชื่อไฟล์ view ถูกต้อง
    }
    
    public function add_event() {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); 
        }
        $this->load->view('add_event'); // ตรวจสอบว่า add_event.php มีอยู่จริง
    }
    
    public function register_event($event_id) {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // เปลี่ยนเส้นทางไปที่หน้าล็อกอินหากยังไม่ล็อกอิน
            return;
        }
    
        // รับ user_id จาก session
        $user_id = $this->session->userdata('user_id'); // สมมุติว่าคุณเก็บ user_id ใน session
    
        // บันทึกการลงทะเบียนกิจกรรม
        if ($this->Event_model->register_user_for_event($user_id, $event_id)) {
            // ส่งข้อความสำเร็จไปยัง session
            $this->session->set_flashdata('message', 'ลงทะเบียนเข้ากิจกรรมเรียบร้อยแล้ว!');
        } else {
            // ส่งข้อความล้มเหลวไปยัง session
            $this->session->set_flashdata('message', 'การลงทะเบียนล้มเหลว!');
        }
        
        redirect('event/index'); // เปลี่ยนเส้นทางกลับไปที่หน้ากิจกรรมหลังจากลงทะเบียน
    }
}
