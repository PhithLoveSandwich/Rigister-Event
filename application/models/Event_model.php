<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function get_active_events_with_registration_count() {
        // ดึงข้อมูลกิจกรรมพร้อมจำนวนผู้ลงทะเบียน
        $this->db->select('events.*, COUNT(event_registrations.id) as registration_count');
        $this->db->from('events');
        $this->db->join('event_registrations', 'events.id = event_registrations.event_id', 'left');
        $this->db->group_by('events.id');
        $query = $this->db->get();
        return $query->result(); // ส่งกลับเป็นอาเรย์ของอ็อบเจ็กต์
    }

    public function register_user_for_event($user_id, $event_id) {
        // บันทึกการลงทะเบียนกิจกรรม
        $data = array(
            'user_id' => $user_id,
            'event_id' => $event_id,
        );
        return $this->db->insert('event_registrations', $data);
    }
}
