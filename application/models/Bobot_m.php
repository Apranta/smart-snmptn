<?php defined('BASEPATH') || exit('No direct script allowed');

class Bobot_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'bobot';
		$this->data['primary_key'] = 'id_bobot';
	}

	public function getMapel($jurusan)
	{
		$sql = 'SELECT * FROM `bobot` JOIN mata_pelajaran ON mata_pelajaran.id=bobot.id_mapel JOIN kelas ON kelas.id=bobot.id_kelas WHERE mata_pelajaran.jurusan= ? ORDER BY nama_kelas, nama';
		$query = $this->db->query($sql, array($jurusan));		
		return $query->result();
	}

	public function cekJawab($jurusan,$nisn)
	{
		$sql = 'SELECT * FROM `bobot` JOIN mata_pelajaran ON mata_pelajaran.id=bobot.id_mapel JOIN nilai_jurusan ON nilai_jurusan.id_bobot=bobot.id_bobot WHERE mata_pelajaran.jurusan= ? AND nilai_jurusan.nisn=?';
		$query = $this->db->query($sql, array($jurusan,$nisn));		
		return $query->result();
	}

	public function getNilai($nisn, $cond='')
	{
		if (isset($cond) && !empty($cond)) {
			$sql = 'SELECT * FROM `bobot` JOIN mata_pelajaran ON mata_pelajaran.id=bobot.id_mapel JOIN nilai_jurusan ON nilai_jurusan.id_bobot=bobot.id_bobot JOIN kelas ON kelas.id=bobot.id_kelas WHERE nisn=? ? ORDER BY nama, nama_kelas';
			$query = $this->db->query($sql, array($nisn,$cond));
		} else {
			$sql = 'SELECT * FROM `bobot` JOIN mata_pelajaran ON mata_pelajaran.id=bobot.id_mapel JOIN nilai_jurusan ON nilai_jurusan.id_bobot=bobot.id_bobot JOIN kelas ON kelas.id=bobot.id_kelas WHERE nisn=? ORDER BY nama, nama_kelas';
			$query = $this->db->query($sql, array($nisn));
		}
		
				
		return $query->result();
	}

	
}

