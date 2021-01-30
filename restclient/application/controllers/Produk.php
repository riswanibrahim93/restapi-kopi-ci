<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Produk Kopi';
        $data['produk'] = $this->Produk_model->getAllProduk();
        if ($this->input->post('keyword')) {
            $data['produk'] = $this->Produk_model->cariDataProduk();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Produk';

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');

        $this->form_validation->set_rules('berat', 'Berat', 'required');

        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->tambahDataProduk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('produk');
        }
    }

    public function hapus($kode)
    {
        $this->Produk_model->hapusDataProduk($kode);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('produk');
    }

    public function detail($kode)
    {
        $data['judul'] = 'Detail Data Produk Kopi';
        $data['produk'] = $this->Produk_model->getProdukById($kode);
        $this->load->view('templates/header', $data);
        $this->load->view('produk/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($kode)
    {
        $data['judul'] = 'Form Ubah Data Produk Kopi';
        $data['produk'] = $this->Produk_model->getProdukById($kode);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');

        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->ubahDataProduk();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('produk');
        }
    }
}
