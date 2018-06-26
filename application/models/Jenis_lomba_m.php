<?php defined('BASEPATH') || exit('No direct script allowed');

class Jenis_lomba_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'jenis_lomba';
		$this->data['primary_key'] = 'id';
	}

	public function getListLomba($tables, $jcond, $where)
	{
		$this->db->select('*');	
		$this->db->join($tables, $jcond);
		$this->db->where($where);
		return $this->db->get($this->data['table_name'])->result();
	}
}

