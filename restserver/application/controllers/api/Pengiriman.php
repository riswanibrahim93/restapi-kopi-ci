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
class Pengiriman extends REST_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengiriman_model', 'pengiriman');
		$this->methods['index_get']['limit'] = 100; // 2 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100; // 2 requests per hour per user/key
	}

	public function index_get()
	{
		$id_pengiriman = $this->get('id_pengiriman');

		if($id_pengiriman === null)
		{
			$pengiriman = $this->pengiriman->getPengiriman(); 
		}
		else
		{
			$pengiriman = $this->pengiriman->getPengiriman($id_pengiriman);
		} 

		if($pengiriman)
		{
			$this->response([
	                    'status' => True,
	                    'data' => $pengiriman
	                ], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
	                    'status' => False,
	                    'message' => 'Pengiriman tidak ditemukan'
	                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function index_delete()
	{
		$id_pengiriman = $this->delete('id_pengiriman');

		if($id_pengiriman === null)
		{
			$this->response([
	                    'status' => False,
	                    'message' => 'Id Pengiriman belum diinputkan'
	                ], REST_Controller::HTTP_NOT_FOUND);
		}

		if($this->pengiriman->deletePengiriman($id_pengiriman) > 0)
		{
			$this->response([
	                    'status' => True,
	                    'id_pengiriman' => $id_pengiriman,
	                    'message' => 'Id Pengiriman Berhasil dihapus'
	                ], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
	                    'status' => False,
	                    'message' => 'Id Pengiriman tidak ditemukan'
	                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_post()
	{
		$data = [
			'id_pengiriman' => $this->post('id_pengiriman'),
			'daerah' => $this->post('daerah'),
			'harga' => $this->post('harga')
		];

		if($this->pengiriman->createPengiriman($data) > 0)
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
		$id_pengiriman = $this->put('id_pengiriman');

		$data = [
			'id_pengiriman' => $this->put('id_pengiriman'),
			'daerah' => $this->put('daerah'),
			'harga' => $this->put('harga')
		];

		if($this->pengiriman->updatePengiriman($data, $id_pengiriman) > 0)
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