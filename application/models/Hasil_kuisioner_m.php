<?php defined('BASEPATH') || exit('No direct script allowed');

class Hasil_kuisioner_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'hasil_kuisioner';
		$this->data['primary_key'] = 'id';
	}
}

