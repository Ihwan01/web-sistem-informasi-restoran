<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_menu extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/tambah_menu');
    }

    function proses()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $kategori = $this->input->post('kategori');

        if ($this->upload->do_upload('gambar')) {
            $data = [
                'nama' => $nama,
                'harga' => $harga,
                'type' => $kategori,
                'gambar' => $this->upload->data('file_name')
            ];
            if ($this->db->insert('food', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil menambahkan menu
              </div>');
                redirect('admin/tambah_menu');
            }
        } else {
            echo $this->upload->display_errors();
        }
    }
}
