<?php defined('BASEPATH') || exit('No direct script allowed');

class Admin_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'admin';
		$this->data['primary_key'] = 'username';
	}

	public function getAdmin($username) 
	{
	   $this->db->select('*')
        ->from($this->data['table_name'])
        ->where($this->data['table_name'].'.username',$username)
        ->join('user','user.username = admin.username');
	   $query = $this->db->get();
	   return $query->row();
	}
}

