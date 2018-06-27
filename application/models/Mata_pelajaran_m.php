<?php defined('BASEPATH') || exit('No direct script allowed');

class Mata_pelajaran_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'mata_pelajaran';
		$this->data['primary_key'] = 'id';
	}
}

