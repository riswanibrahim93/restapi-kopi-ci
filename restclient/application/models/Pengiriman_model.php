<?php

use GuzzleHttp\Client;

class Pengiriman_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new  Client([
            'base_uri' => 'http://localhost/kopi_kita/restserver/api/',
            'auth' => ['admin','1234']

        ]);
    }
    public function getAllPengiriman()
    {
        $response = $this->_client->request('GET', 'pengiriman',[
            'query' => [
                'key' => 'geligeli'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'];
    }

    public function tambahDataPengiriman()
    {
        $data = [
            "id_pengiriman" => $this->input->post('id_pengiriman', true),
            "daerah" => $this->input->post('daerah', true),
            "harga" => $this->input->post('harga', true),
            "key" => 'geligeli'
        ];
        $response = $this->_client->request('POST', 'pengiriman',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function hapusDataPengiriman($id_pengiriman)
    {
        $response = $this->_client->request('DELETE', 'pengiriman',[
            'form_params' => [
                'key' => 'geligeli',
                'id_pengiriman' => $id_pengiriman
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function getPengirimanById($id_pengiriman)
    {
        $response = $this->_client->request('GET', 'pengiriman',[
            'query' => [
                'key' => 'geligeli',
                'id_pengiriman' => $id_pengiriman
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'][0];

    }

    public function ubahDataPengiriman()
    {
         $data = [
            "id_pengiriman" => $this->input->post('id_pengiriman', true),
            "daerah" => $this->input->post('daerah', true),
            "harga" => $this->input->post('harga', true),
            "key" => 'geligeli'
        ];
        $response = $this->_client->request('PUT', 'pengiriman',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function cariDataPengiriman()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_pengiriman', $keyword);
        $this->db->or_like('daerah', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get('pengiriman')->result_array();
    }
}
