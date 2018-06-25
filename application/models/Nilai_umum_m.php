<?php defined('BASEPATH') || exit('No direct script allowed');

class Nilai_umum_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'nilai_umum';
		$this->data['primary_key'] = 'id';
	}
}

