<?php

class Pengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengiriman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Pengiriman';
        $data['pengiriman'] = $this->Pengiriman_model->getAllPengiriman();
        if ($this->input->post('keyword')) {
            $data['pengiriman'] = $this->Pengiriman_model->cariDataPengiriman();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pengiriman/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Pengiriman';

        $this->form_validation->set_rules('id_pengiriman', 'Id Pengiriman', 'required');

        $this->form_validation->set_rules('daerah', 'Daerah', 'required');

        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pengiriman/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Pengiriman_model->tambahDataPengiriman();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pengiriman');
        }
    }

    public function hapus($id_pengiriman)
    {
        $this->Pengiriman_model->hapusDataPengiriman($id_pengiriman);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pengiriman');
    }

    public function detail($id_pengiriman)
    {
        $data['judul'] = 'Detail Data Pengiriman';
        $data['pengiriman'] = $this->Pengiriman_model->getPengirimanById($id_pengiriman);
        $this->load->view('templates/header', $data);
        $this->load->view('pengiriman/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id_pengiriman)
    {
        $data['judul'] = 'Form Ubah Data Pengiriman';
        $data['pengiriman'] = $this->Pengiriman_model->getPengirimanById($id_pengiriman);

        $this->form_validation->set_rules('daerah', 'Daerah', 'required');

        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pengiriman/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pengiriman_model->ubahDataPengiriman();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pengiriman');
        }
    }
}
