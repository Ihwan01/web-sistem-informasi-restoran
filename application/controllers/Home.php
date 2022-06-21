<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['food'] = $this->db->get_where('food', ['type' => '1'])->result_array();
        $data['drink'] = $this->db->get_where('food', ['type' => '2'])->result_array();
        $this->load->view('home', $data);
    }

    public function cart()
    {
        $this->load->view('cart');
    }
}
