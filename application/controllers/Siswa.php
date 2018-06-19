<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->data['username']   = 'syad';
        $this->data['role'] = 2;
        // $this->data['username']   = $this->session->userdata('username');
        // $this->data['role']       = $this->session->userdata('role');
        // if (!isset($this->data['username'], $this->data['role']))
        // {
        //     $this->session->sess_destroy();
        //     redirect('login');
        //     exit;
        // }
        // if ($this->data['role'] != 2)
        // {
        //     $this->session->sess_destroy();
        //     redirect('login');
        //     exit;
        // }
    }

    public function index($value='')
    {
    	$this->data['title']        = 'Dashboard Siswa';
        $this->data['content']      = 'siswa/dashboard';
        $this->template($this->data);
    }

    public function profile($value='')
    {
        $this->load->model( 'siswa_m' );
        $this->data[ 'siswa' ]      = $this->siswa_m->get_row([ 'username' => $this->data[ 'username' ] ]);
    	$this->data[ 'title' ]      = 'Data Siswa';
        $this->data[ 'content' ]    = 'siswa/profile';
        $this->template($this->data);
    }

    public function update_profile($value='')
    {
    	$this->data['title']        = 'Dashboard Siswa';
        $this->data['content']      = 'siswa/dashboard';
        $this->template($this->data);
    }

    public function data_prestasi($value='')
    {
    	$this->data['title']        = 'Dashboard Siswa';
        $this->data['content']      = 'siswa/dashboard';
        $this->template($this->data);
    }

    public function input_prestasi($value='')
    {
    	$this->data['title']        = 'Dashboard Siswa';
        $this->data['content']      = 'siswa/dashboard';
        $this->template($this->data);
    }

    public function data_nilai($value='')
    {
    	$this->data['title']        = 'Data Nilai Siswa';
        $this->data['content']      = 'siswa/dashboard';
        $this->template($this->data);
    }

    public function input_nilai($value='')
    {
    	$this->data['title']        = 'Dashboard Siswa';
        $this->data['content']      = 'siswa/dashboard';
        $this->template($this->data);
    }

    public function data_universitas($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_program_studi($value='')
    {
        $id_univ = $this->uri->segment(3);
        if (!isset($id_univ)) {
            redirect('admin/data_universitas','refresh');
            exit;
        }
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }
}