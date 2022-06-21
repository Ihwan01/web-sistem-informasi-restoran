<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function index()
    {
        $this->load->view('order');
    }

    public function bayar()
    {
        $data['metode_bayar'] = $this->input->post('pembayaran');
        $this->load->view('bayar', $data);
    }

    public function bayarsekarang()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert success">Pembelian berhasil!</div> ');
        redirect('home');
    }
}
