<?php defined('BASEPATH') || exit('No direct script allowed');

class Program_studi_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'program_studi';
		$this->data['primary_key'] = 'id';
	}

	public function getStudi()
	{
		$sql = 'SELECT *,program_studi.id AS id_studi FROM program_studi JOIN universitas ON universitas.id=program_studi.id_universitas ORDER BY grade ASC';
		$query = $this->db->query($sql);
		return $query->result();
	}
}

