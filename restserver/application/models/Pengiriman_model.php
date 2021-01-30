<?php 

class Pengiriman_model extends CI_Model 
{
	public function getPengiriman($id_pengiriman = null)
	{
		if($id_pengiriman === null)
		{
			$query = $this->db->get('pengiriman')->result_array();
		}
		else
		{
			$query = $this->db->get_where('pengiriman', ['id_pengiriman' => $id_pengiriman])->result_array();
		}
		return $query;
	}

	public function deletePengiriman($id_pengiriman)
	{
		$this->db->delete('pengiriman', ['id_pengiriman' => $id_pengiriman]);
		return $this->db->affected_rows();
	}

	public function createPengiriman($data)
	{
		$this->db->insert('pengiriman', $data);
		return $this->db->affected_rows(); 
	}

	public function updatePengiriman($data, $id_pengiriman)
	{
		$this->db->update('pengiriman',$data, ['id_pengiriman' => $id_pengiriman]);
		return $this->db->affected_rows();
	}
}
