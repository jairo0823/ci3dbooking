<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HotelBooking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all bookings
    public function get_all_bookings() {
        return $this->db->get('bookings')->result();
    }

    // Fetch bookings with username from users table by joining on email
    public function get_bookings_with_usernames() {
        $this->db->select('bookings.*, users.username');
        $this->db->from('bookings');
        $this->db->join('users', 'bookings.email = users.email', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    // Fetch a single booking by id
    public function get_booking($id) {
        return $this->db->get_where('bookings', ['id' => $id])->row();
    }

    // Insert a new booking
    public function insert_booking($data) {
        $this->db->insert('bookings', $data);
    }

    // Update an existing booking
    public function update_booking($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('bookings', $data);
    }

    // Delete a booking
    public function delete_booking($id) {
        $this->db->where('id', $id);
        $this->db->delete('bookings');
    }
}
