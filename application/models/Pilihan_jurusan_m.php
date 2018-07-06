<?php defined('BASEPATH') || exit('No direct script allowed');

class Pilihan_jurusan_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'pilihan_jurusan';
		$this->data['primary_key'] = 'id_pilihan';
	}

	public function getPilihan($nisn)
	{		
		$this->db->join('program_studi','program_studi.id=pilihan_jurusan.id_program_studi');
		$this->db->join('universitas','universitas.id=program_studi.id_universitas');
		$this->db->where('nisn='.$nisn);
		$this->db->order_by('pilihan_ke','ASC');
		return $this->db->get($this->data['table_name'])->result();
	}
}

