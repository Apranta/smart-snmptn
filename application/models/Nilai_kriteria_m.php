<?php defined('BASEPATH') || exit('No direct script allowed');

class Nilai_kriteria_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'nilai_kriteria';
		$this->data['primary_key'] = 'id';
	}

	public function getBobot($cond='')
	{
		$paramater = $this->get(['kriteria' => $cond['id_kriteria']]);
		$nilai = $cond['nilai'];
		foreach ($paramater as $par) {
			if ($nilai >= $par->nilai_awal && $nilai <= $par->nilai_akhir) {
				# code...
				return $par->bobot;
			}
		}
		return 0;
	}
}

