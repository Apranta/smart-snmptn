<?php defined('BASEPATH') || exit('No direct script allowed');

class Universitas_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'universitas';
		$this->data['primary_key'] = 'id';
	}
}

