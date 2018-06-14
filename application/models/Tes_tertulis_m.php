<?php defined('BASEPATH') || exit('No direct script allowed');

class Tes_tertulis_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'tes_tertulis';
		$this->data['primary_key'] = 'id';
	}
}

