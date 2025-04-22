<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HotelBooking extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('HotelBooking_model');
    // Load session library for user login check
    $this->load->library('session');
    $this->load->helper('url');
}

    // Show all hotel bookings (read)
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');  // Redirect to login if not logged in
        }  $data['bookings'] = $this->HotelBooking_model->get_all_bookings();
        $this->load->view('hotel_booking_list', $data);
    }

      

    // Show form to add a new booking (create)
public function create() {
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $data['bookings'] = $this->HotelBooking_model->get_bookings_with_usernames();
    $this->load->view('hotel_booking_create', $data);
}

    // Save new booking (store)
    public function store() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $booking_data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'check_in' => $this->input->post('check_in'),
            'check_out' => $this->input->post('check_out')
        ];

        $this->HotelBooking_model->insert_booking($booking_data);
        redirect('hotelbooking');  // Redirect to bookings list after storing
    }

    // Show form to edit booking (update)
    public function edit($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $data['booking'] = $this->HotelBooking_model->get_booking($id);
        $this->load->view('hotel_booking_edit', $data);
    }

    // Update booking details (update)
    public function update($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $booking_data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'check_in' => $this->input->post('check_in'),
            'check_out' => $this->input->post('check_out')
        ];

        $this->HotelBooking_model->update_booking($id, $booking_data);
        redirect('hotelbooking');  // Redirect to bookings list after updating
    }

    // Delete a booking (delete)
    public function delete($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $this->HotelBooking_model->delete_booking($id);
        redirect('hotelbooking');  // Redirect to bookings list after deletion
    }

    // Show record list page
    public function record_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $data['bookings'] = $this->HotelBooking_model->get_all_bookings();
        $this->load->view('Record_list', $data);
    }
}
