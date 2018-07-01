<?php defined('BASEPATH') || exit('No direct script allowed');

class Prestasi_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'prestasi';
		$this->data['primary_key'] = 'id';
	}

	public function getPrestasi($nisn)
	{
		$sql = 'SELECT *, peringkat.bobot AS bobot_peringkat, jenis_lomba.persentase AS persentase_peringkat, jenjang_prestasi.bobot AS bobot_jenjang, jenjang_prestasi.persentase AS persentase_jenjang FROM `prestasi` JOIN mata_lomba ON mata_lomba.id_lomba=prestasi.mata_lomba JOIN jenis_lomba ON jenis_lomba.id=mata_lomba.id_jenis JOIN peringkat ON peringkat.id=prestasi.id_peringkat JOIN jenjang_prestasi ON jenjang_prestasi.id=prestasi.id_jenjang WHERE prestasi.nisn=? ORDER BY jenis';
		$query = $this->db->query($sql, array($nisn));		
		return $query->result();
	}
}

