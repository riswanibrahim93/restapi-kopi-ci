<?php

use GuzzleHttp\Client;

class Produk_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new  Client([
            'base_uri' => 'http://localhost/kopi_kita/restserver/api/',
            'auth' => ['admin','1234']

        ]);
    }
    public function getAllProduk()
    {
        $response = $this->_client->request('GET', 'produk',[
            'query' => [
                'key' => 'geligeli'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'];
    }

    public function tambahDataProduk()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            "berat" => $this->input->post('berat', true),
            "harga" => $this->input->post('harga', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "key" => 'geligeli'
        ];
        $response = $this->_client->request('POST', 'produk',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function hapusDataProduk($kode)
    {
        $response = $this->_client->request('DELETE', 'produk',[
            'form_params' => [
                'key' => 'geligeli',
                'kode' => $kode
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function getProdukById($kode)
    {
        $response = $this->_client->request('GET', 'produk',[
            'query' => [
                'key' => 'geligeli',
                'kode' => $kode
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'][0];
    }

    public function ubahDataProduk()
    {
         $data = [
           "kode" => $this->input->post('kode', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            "berat" => $this->input->post('berat', true),
            "harga" => $this->input->post('harga', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "key" => 'geligeli'
        ];
        $response = $this->_client->request('PUT', 'produk',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function cariDataProduk()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode', $keyword);
        $this->db->or_like('nama_produk', $keyword);
        $this->db->or_like('berat', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get('produk')->result_array();
    }
}
