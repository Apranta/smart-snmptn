<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['username']      = $this->session->userdata('username');
        $this->data['role']  = $this->session->userdata('role');
        if (!isset($this->data['username'], $this->data['role']))
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
        if ($this->data['role'] != 1)
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }

    }
 
    public function index()
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_admin($value='')
    {
        $this->load->model( 'admin_m' );
        $this->load->model( 'user_m' );

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->admin_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_admin','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['user'] = [
                'username'  => $this->POST('username'),
                'password'  => $this->POST('password')
            ];
            $this->data['admin'] = [
                'username'  => $this->POST('username'),
                'nama'      => $this->POST('nama'),
                'jabatan'   => $this->POST('jabatan'),
                'alamat'    => $this->POST('alamat')
            ];
            $this->user_m->insert($this->data['user']);
            $this->admin_m->insert($this->data['admin']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_admin','refresh');    
            exit;
        }
        
        $this->data[ 'admin' ]        = $this->admin_m->get();
        $this->data[ 'title' ]        = 'Data Admin';
        $this->data[ 'content' ]      = 'admin/admin_data';
        $this->template( $this->data );
    }

    public function edit_admin($value='')
    {
        $this->load->model( 'admin_m' );
        $this->load->model( 'user_m' );

        $username =  $this->uri->segment(3);
        if (!isset($username)) {
            redirect('admin/data_admin','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['user'] = [                
                'password'  => $this->POST('password')
            ];
            $this->data['admin'] = [                
                'nama'      => $this->POST('nama'),
                'jabatan'   => $this->POST('jabatan'),
                'alamat'    => $this->POST('alamat')
            ];
            $this->user_m->update($username,$this->data['user']);
            $this->admin_m->update($username,$this->data['admin']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_admin','refresh');    
            exit;
        }

        $this->data[ 'admin' ]        = $this->admin_m->getAdmin($username);
        $this->data[ 'title' ]        = 'Edit Admin';
        $this->data[ 'content' ]      = 'admin/admin_edit';
        $this->template( $this->data );
    }

    public function data_siswa($value='')
    {
        $this->load->model( 'siswa_m' );
        $this->data[ 'siswa' ]        = $this->siswa_m->get();
        $this->data[ 'title' ]        = 'Data Siswa';
        $this->data[ 'content' ]      = 'admin/siswa_data';
        $this->template($this->data, 'admin');
    }


    public function tambah_siswa($value='')
    {
        if ($this->POST( 'submit' ))
        {
            $this->load->model( 'siswa_m' );
            $this->data[ 'siswa' ] = [
                'nisn'              => $this->POST( 'nisn' ),
                'nama'              => $this->POST( 'nama' ),
                'jenis_kelamin'     => $this->POST( 'jenis_kelamin' ),
                'tanggal_lahir'     => $this->POST( 'tanggal_lahir' )
            ];
            $cek = $this->siswa_m->get_row(['nisn' => $this->data['siswa']['nisn'] ]);
            if ($cek) {
                $this->flashmsg( 'tambah siswa gagal, data tidak valid atau siswa sudah terdaftar.', 'error' );
                redirect( base_url( 'admin/data_siswa' ) );
                exit;
            } else {
                $this->siswa_m->insert( $this->data['siswa'] );
                $this->flashmsg( 'tambah siswa sukses' );
                redirect( base_url( 'admin/data_siswa' ) );
                exit;

            }
        }
        
        redirect( base_url( 'admin/data_siswa' ) );
        
    }

    public function detail_siswa($value='')
    {
        //disini menampilkan hasil perhitungan siswa dengan metode smart
        /*
            data prestasi
            data minat bakat
            data psikotes
            data siswa
            data hasil perhitungan
            data nilai jurusan dan umum
        */
        $nisn = $this->uri->segment(3);
        if (!isset($nisn)) {
            redirect('admin/data_siswa','refresh');
            exit;
        }
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_universitas($value='')
    {
        $this->load->model( 'universitas_m' );

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->universitas_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_universitas','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['universitas']  = [
                'nama_uni'     => $this->POST('nama'),
                'link'         => $this->POST('link')
            ];
            $this->universitas_m->insert($this->data['universitas']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_universitas','refresh');
            exit;
        }
        $this->data[ 'universitas' ]= $this->universitas_m->get();
        $this->data['title']        = 'Data Universitas';
        $this->data['content']      = 'admin/universitas_data';
        $this->template($this->data);
    }

    public function edit_universitas($value='')
    {
        $this->load->model('universitas_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_universitas','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['universitas'] = [
                'nama_uni'     => $this->POST('nama'),
                'link'         => $this->POST('link')
            ];
            $this->universitas_m->update($id, $this->data['universitas']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/edit_universitas','refresh');    
            exit;
        }
        
        $this->data[ 'universitas' ]= $this->universitas_m->get_row([ 'id' => $id ]);
        $this->data['title']        = 'Edit Data Universitas';
        $this->data['content']      = 'admin/universitas_edit';
        $this->template($this->data);
    }

    public function data_program_studi($value='')
    {
        $this->load->model('universitas_m');
        $this->load->model('program_studi_m');
        $del = $this->uri->segment(3);
        if (isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->program_studi_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_program_studi','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['program_studi'] = [
                'id_universitas'    => $this->POST('id_universitas'),
                'nama_prodi'        => $this->POST('nama_prodi'),
                'grade'             => $this->POST('grade'),
                'jurusan'           => $this->POST('jurusan')
            ];
            $this->program_studi_m->insert($this->data['program_studi']);
            $this->flashmsg('Berhasil tambah data');
            redirect('admin/data_program_studi','refresh');
            exit;
        }

        $this->data['program_studi']= $this->program_studi_m->getDataJoin([ 'universitas' ], [ 'program_studi.id_universitas=universitas.id' ]);
        $this->data['universitas']  = $this->universitas_m->get();
        $this->data['title']        = 'Daftar Program Studi';
        $this->data['content']      = 'admin/program_studi_daftar';
        $this->template($this->data);
    }

    public function edit_program_studi($value='')
    {
        $this->load->model('program_studi_m');
        $this->load->model('universitas_m');
        $id = $this->uri->segment(3);
        if(!isset($id)) {
            redirect('admin/program_studi','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['program_studi'] = [
                'id_universitas'    => $this->POST('id_universitas'),
                'nama_prodi'        => $this->POST('nama_prodi'),
                'grade'             => $this->POST('grade'),
                'jurusan'           => $this->POST('jurusan')
            ];
            $this->program_studi_m->update($id, $this->data['program_studi']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_program_studi','refresh');
            exit;
        }

        $this->data['program_studi']= $this->program_studi_m->get_row([ 'id' => $id ]);
        $this->data['universitas']  = $this->universitas_m->get();
        $this->data['title']        = 'Edit Program Studi';
        $this->data['content']      = 'admin/program_studi_edit';
        $this->template($this->data);
    }

    public function data_mata_pelajaran($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_kuisioner($value='')
    {
        $this->load->model( 'kuisioner_m' );
        $this->data['kuisioner']    = $this->kuisioner_m->get();
        //$this->dump($this->data['kuisioner'][0]->jawaban); exit;
        $this->data['title']        = 'Data Kuisioner';
        $this->data['content']      = 'admin/kuisioner_data';
        $this->template($this->data);
    }

    public function tambah_kuisioner($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_kelas($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function tambah_kelas($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function tambah_peringkat($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_peringkat($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_jenjang_prestasi($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_jenis_lomba($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function data_mata_lomba($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function tambah_jenjang_prestasi($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function tambah_jenis_lomba($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function tambah_mata_lomba($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }
}
