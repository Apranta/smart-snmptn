<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->data['username']   = '111';
        $this->data['nama']   = 'syad';
        $this->data['nisn'] = 111;
        $this->data['role'] = 2;
        $array = array(
            'role' => 2
        );
        
        $this->session->set_userdata( $array );
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
        $this->data[ 'siswa' ]      = $this->siswa_m->get_row([ 'nisn' => $this->data[ 'username' ] ]);
    	$this->data[ 'title' ]      = 'Data Siswa';
        $this->data[ 'content' ]    = 'siswa/profile';
        $this->template($this->data);
    }

    public function update_profile($value='')
    {
    	if ($this->POST('submit')) {
            $this->load->model('siswa_m');
            $this->data[ 'siswa' ] = [
                'nama'  => $this->POST('nama'),
                'tempat_lahir'  => $this->POST('tempat_lahir'),
                'tanggal_lahir' => $this->POST('tanggal_lahir'),
                'alamat'        => $this->POST('alamat'),
                'jurusan'       => $this->POST('jurusan'),
                'psikotes'      => $this->POST('psikotes')
            ];
            $this->siswa_m->update($this->data['username'] ,$this->data['siswa']);
            $this->flashmsg('data berhasil disimpan');
            redirect(base_url('siswa/profile'));
            exit;
        }
        redirect(base_url('siswa/profile'));
    }

    public function data_prestasi($value='')
    {
        $this->load->model('prestasi_m');
        $this->load->model('peringkat_m');
        $this->load->model('mata_lomba_m');
        $this->load->model('jenis_lomba_m');
        $this->data['prestasi']     = $this->prestasi_m->get_row([ 'nisn' => $this->data['nisn'] ]);
        $this->data['peringkat']    = $this->peringkat_m->get_row([ 'id' => $this->data['prestasi']->id_peringkat ]);
        $this->data['mata_lomba']   = $this->mata_lomba_m->get_row([ 'id' => $this->data['prestasi']->mata_lomba ]);
        $this->data['jenis_lomba']  = $this->jenis_lomba_m->get_row([ 'id' => $this->data['mata_lomba']->id_jenis ]);
    	$this->data['title']        = 'Data Prestasi Siswa';
        $this->data['content']      = 'siswa/prestasi_data';
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
        $this->load->model('nilai_jurusan_m');
        $this->data['siswa']        = $this->nilai_jurusan_m->get_row([ 'nisn' => $this->data['siswa'] ]);
    	$this->data['title']        = 'Data Nilai Siswa';
        $this->data['content']      = 'siswa/nilai_data';
        $this->template($this->data);
    }

    public function nilai_jurusan($value='')
    {
        $this->load->model('nilai_jurusan_m');
        $this->data['siswa']        = $this->nilai_jurusan_m->get();
        $this->data['title']        = 'Data Nilai Jurusan Siswa';
        $this->data['content']      = 'siswa/nilai_data_jurusan';
        $this->template($this->data);
    }

    public function nilai_umum($value='')
    {
        $this->load->model('nilai_jurusan_m');
        $this->data['siswa']        = $this->nilai_jurusan_m->get();
        $this->data['title']        = 'Data Nilai Umum Siswa';
        $this->data['content']      = 'siswa/nilai_data_umum';
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
        $this->load->model('universitas_m');
        $this->data['universitas']  = $this->universitas_m->get();
        $this->data['title']        = 'Daftar PTN';
        $this->data['content']      = 'siswa/universitas_data';
        $this->template($this->data);
    }

    public function data_program_studi($value='')
    {
        $this->load->model('universitas_m');
        $this->load->model('program_studi_m');
        $this->data['universitas']  = $this->universitas_m->get();
        $this->data['program_studi']= $this->program_studi_m->getDataJoin([ 'universitas' ], [ 'program_studi.id_universitas=universitas.id' ]);
        $id_univ = $this->uri->segment(3);
        if (isset($id_univ)) {
            redirect('admin/data_universitas','refresh');
            exit;
        }
        $this->data['title']        = 'Daftar Program Sudi';
        $this->data['content']      = 'siswa/program_studi_daftar';
        $this->template($this->data);
    }

    public function kuisioner($value='')
    {
        $this->data['title']        = 'Kuisioner';
        $this->data['content']      = 'siswa/kuisioner';
        $this->template($this->data);
    }
}