<?php defined('BASEPATH') || exit('No direct script allowed');

class Hasil_kuisioner_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'hasil_kuisioner';
		$this->data['primary_key'] = 'id';
	}

	public function getKuisioner($nisn)
	{
		$sql = 'SELECT *,hasil_kuisioner.jawaban AS dijawab FROM `hasil_kuisioner` JOIN kuisioner ON kuisioner.id=hasil_kuisioner.id_kuisioner WHERE nisn=?';
		$query = $this->db->query($sql, array($nisn));		
		return $query->result();
	}
}

