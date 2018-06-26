<?php defined('BASEPATH') || exit('No direct script allowed');

class Mata_lomba_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'Mata_lomba';
		$this->data['primary_key'] = 'id';
	}
}

