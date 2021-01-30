<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * 
 */
class Produk extends REST_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model', 'produk');
		$this->methods['index_get']['limit'] = 100; // 2 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100; // 2 requests per hour per user/key
	}

	public function index_get()
	{
		$kode = $this->get('kode');

		if($kode === null)
		{
			$produk = $this->produk->getProduk(); 
		}
		else
		{
			$produk = $this->produk->getProduk($kode);
		} 

		if($produk)
		{
			$this->response([
	                    'status' => True,
	                    'data' => $produk
	                ], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
	                    'status' => False,
	                    'message' => 'Produk tidak ditemukan'
	                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function index_delete()
	{
		$kode = $this->delete('kode');

		if($kode === null)
		{
			$this->response([
	                    'status' => False,
	                    'message' => 'Kode belum diinputkan'
	                ], REST_Controller::HTTP_NOT_FOUND);
		}

		if($this->produk->deleteProduk($kode) > 0)
		{
			$this->response([
	                    'status' => True,
	                    'kode' => $kode,
	                    'message' => 'Produk Berhasil dihapus'
	                ], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
	                    'status' => False,
	                    'message' => 'Produk tidak ditemukan'
	                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_post()
	{
		$data = [
			'kode' => $this->post('kode'),
			'nama_produk' => $this->post('nama_produk'),
			'berat' => $this->post('berat'),
			'harga' => $this->post('harga'),
			'deskripsi' => $this->post('deskripsi')
		];

		if($this->produk->createProduk($data) > 0)
		{
			$this->response([
	                    'status' => True,
	                    'message' => 'Data Berhasil dimasukkan'
	                ], REST_Controller::HTTP_CREATED);
		}
		else
		{
			$this->response([
	                    'status' => True,
	                    'message' => 'Data Gagal dimasukkan'
	                ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$kode = $this->put('kode');

		$data = [
			'kode' => $this->put('kode'),
			'nama_produk' => $this->put('nama_produk'),
			'berat' => $this->put('berat'),
			'harga' => $this->put('harga'),
			'deskripsi' => $this->put('deskripsi')
		];

		if($this->produk->updateProduk($data, $kode) > 0)
		{
			$this->response([
	                    'status' => True,
	                    'message' => 'Data Berhasil diupdate'
	                ], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
	                    'status' => True,
	                    'message' => 'Data Gagal diupdate'
	                ], REST_Controller::HTTP_OK);
		}
	}
}


?>