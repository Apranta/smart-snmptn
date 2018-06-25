<?php defined('BASEPATH') || exit('No direct script allowed');

class Program_studi_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'program_studi';
		$this->data['primary_key'] = 'id';
	}
}

