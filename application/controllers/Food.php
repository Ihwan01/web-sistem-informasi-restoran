<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food extends CI_Controller
{

    public function order()
    {
        $id = $this->input->post('foodid');
        $food = $this->db->get_where('food', ['id' => $id])->row_array();
        $jumlah = $this->input->post('jumlah');
        $data = array(
            'id'      => $id,
            'qty' => $jumlah,
            'price' => $food['harga'],
            'name'    => $food['nama']
        );

        if ($this->cart->insert($data)) {
            redirect('home');
        }
    }
}
