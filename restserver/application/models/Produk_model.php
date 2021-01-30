<?php 

class Produk_model extends CI_Model 
{
	public function getProduk($kode = null)
	{
		if($kode === null)
		{
			$query = $this->db->get('produk')->result_array();
		}
		else
		{
			$query = $this->db->get_where('produk', ['kode' => $kode])->result_array();
		}
		return $query;
	}

	public function deleteProduk($kode)
	{
		$this->db->delete('produk', ['kode' => $kode]);
		return $this->db->affected_rows();
	}

	public function createProduk($data)
	{
		$this->db->insert('produk', $data);
		return $this->db->affected_rows(); 
	}

	public function updateProduk($data, $kode)
	{
		$this->db->update('produk',$data, ['kode' => $kode]);
		return $this->db->affected_rows();
	}
}
