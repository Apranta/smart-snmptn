<?php defined('BASEPATH') || exit('No direct script allowed');

class Peringkat_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'peringkat';
		$this->data['primary_key'] = 'id';
	}
}

