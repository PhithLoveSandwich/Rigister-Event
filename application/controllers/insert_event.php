<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller { // สืบทอดมาจาก CI_Controller

    public function __construct() {
        parent::__construct();
        $this->load->model('Event_model'); // โหลดโมเดลที่ใช้ดึงข้อมูลกิจกรรม
        $this->load->library('session'); // โหลดไลบรารี session
    }

    public function index() {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // หากไม่ได้ล็อกอิน จะถูกเปลี่ยนเส้นทางไปที่หน้าล็อกอิน
        }

        // ดึงข้อมูลกิจกรรมจากโมเดล
        $data['events'] = $this->Event_model->get_active_events();

        // แสดงหน้ากิจกรรม
        $this->load->view('event_list', $data);
    }

    public function insert_event() {
        $data = array(
            'name' => $this->input->post('name'),
            'status' => 'active',
            'description' => $this->input->post('description'),
            'date' => $this->input->post('date'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date')
        );
    
        if ($this->Event_model->insert_event($data)) {
            redirect('event/index'); // เปลี่ยนเส้นทางไปหน้ารายการกิจกรรมหลังการแทรกสำเร็จ
        } else {
            echo "Insert failed!";
        }
    }
     
}
