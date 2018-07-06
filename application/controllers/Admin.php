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
        $this->load->model( 'user_m' );

        $del = $this->uri->segment(3);
        if(isset($del) && $del=='delete')
        {
            $nisn = $this->uri->segment(4);
            $this->siswa_m->delete($nisn);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_siswa','refresh');
            exit;
        }

        $this->data[ 'siswa' ]        = $this->siswa_m->get();
        $this->data[ 'user' ]         = $this->user_m->get([ 'role' => 2]);
        $this->data[ 'title' ]        = 'Data Siswa';
        $this->data[ 'content' ]      = 'admin/siswa_data';
        $this->template($this->data, 'admin');
    }

    public function edit_siswa($value='')
    {
        $this->load->model('siswa_m');

        $nisn =  $this->uri->segment(3);
        if (!isset($nisn)) {
            redirect('admin/data_siswa','refresh');
            exit;
        }

        if ($this->POST('edit')) {            
            $this->data[ 'siswa' ] = [
                'nisn'              => $this->POST( 'nisn' ),
                'nama'              => $this->POST( 'nama' ),
                'jenis_kelamin'     => $this->POST( 'jenis_kelamin' ),
                'tanggal_lahir'     => $this->POST( 'tanggal_lahir' ),
                'alamat'            => $this->POST('alamat'),
                'jurusan'           => $this->POST('jurusan'),
                'psikotes'          => $this->POST('psikotes')
            ];
            $this->siswa_m->update($nisn,$this->data['siswa']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/edit_siswa/'.$this->data['siswa']['nisn'],'refresh');    
            exit;
        }

        $this->data[ 'siswa' ]        = $this->siswa_m->get_row([ 'nisn' => $nisn ]);
        $this->data[ 'title' ]        = 'Edit Data Siswa';
        $this->data[ 'content' ]      = 'admin/siswa_edit';
        $this->template( $this->data );
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
                'tanggal_lahir'     => $this->POST( 'tanggal_lahir' ),
                'username'          => $this->POST( 'username' )
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

    public function smart_nilai($nilai)
    {        
        $nama ='instance';        
        $NxB  = 0;
        $persentase = 0;
        $data = [];
        $key=array_keys($nilai);
        $lastkey=end($key);
        $i=0;
        foreach ($nilai as $key) {            
            if($key->nama == $nama) {
                $NxB = $NxB + ($key->nilai*$key->bobot);
                $persentase = $key->persentase;
                if($i==$lastkey) {
                    $data[$nama] = $NxB*$persentase;
                }                
            } else if($nama!='instance') {
                $data[$nama] = $NxB*$persentase;
                $nama = $key->nama;
                $NxB  = $key->nilai*$key->bobot;
                $persentase = $key->persentase;
                $namabefore = $key->nama;
            } else if($nama='instance') {
                $nama = $key->nama;
                $NxB  = $key->nilai*$key->bobot;
                $persentase = $key->persentase;
            }
            $i++;            
        }
        return $data;
    }

    public function smart_prestasi($nilai)
    {        
        $data=[];
        foreach ($nilai as $key) {            
            $data[$key->nama_peringkat.' '.$key->jenis_lomba.' '.$key->nama_lomba] = ($key->bobot_peringkat * 100) * $key->persentase_peringkat;
            $data['tingkat '.$key->nama_jenjang]   = ($key->bobot_jenjang * 100) * $key->persentase_jenjang;
        }
        return $data;
    }    

    public function detail_siswa($value='')
    {
        //$this->load->library("Smart/smart");

        //disini menampilkan hasil perhitungan siswa dengan metode smart
        /*
            =data prestasi
            data minat bakat
            =data psikotes
            =data siswa
            data hasil perhitungan
            =data nilai jurusan dan umum
        */
        $this->load->model('bobot_m');
        $this->load->model('prestasi_m');
        $this->load->model('siswa_m');
        $this->load->model('hasil_kuisioner_m');
        $this->load->model('mata_pelajaran_m');

        $nisn = $this->uri->segment(3);
        if (!isset($nisn)) {
            redirect('admin/data_siswa','refresh');
            exit;
        }




        $this->data['siswa']            = $this->siswa_m->get_row([ 'nisn' => $nisn ]);
        $this->data['nilai_jurusan']    = $this->bobot_m->getNilai($nisn);
        $this->data['prestasi']         = $this->prestasi_m->getPrestasi($nisn);
        $this->data['smart_nilai']      = $this->smart_nilai($this->data['nilai_jurusan']);
        $this->data['smart_prestasi']   = $this->smart_prestasi($this->data['prestasi']);                
        $this->data['kuisioner']        = $this->hasil_kuisioner_m->getKuisioner($nisn);
        $this->data['mata_pelajaran']   = $this->mata_pelajaran_m->get();
        $this->data['total_value']      = 0;
        $this->data['title']            = 'Detail Siswa '.$this->data['siswa']->nisn;
        $this->data['content']          = 'admin/siswa_detail';
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
        $this->load->model('mata_pelajaran_m');

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->mata_pelajaran_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_mata_pelajaran','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['mapel']  = [
                'nama'          => $this->POST('nama'),
                'persentase'    => ($this->POST('persentase')/100.0),
                'jurusan'       => $this->POST('jurusan')
            ];
            $this->mata_pelajaran_m->insert($this->data['mapel']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_mata_pelajaran','refresh');
            exit;
        }
        $this->data['mapel' ]       = $this->mata_pelajaran_m->get();
        $this->data['title']        = 'Daftar Mata Pelajaran';
        $this->data['content']      = 'admin/mata_pelajaran_data';
        $this->template($this->data);
    }

    public function edit_mata_pelajaran($value='')
    {
        $this->load->model('mata_pelajaran_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_mata_pelajaran','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['mapel']  = [
                'nama'          => $this->POST('nama'),
                'persentase'    => ($this->POST('persentase')/100.0),
                'jurusan'       => $this->POST('jurusan')
            ];
            $this->mata_pelajaran_m->update($id,$this->data['mapel']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_mata_pelajaran','refresh');
            exit;
        }
        
        $this->data['mapel' ]       = $this->mata_pelajaran_m->get_row([ 'id' => $id ]);
        $this->data['title']        = 'Edit Mata Pelajaran';
        $this->data['content']      = 'admin/mata_pelajaran_edit';
        $this->template($this->data);
    }

    public function data_kuisioner($value='')
    {
        $this->load->model( 'kuisioner_m' );
        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->kuisioner_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_kuisioner','refresh');
            exit;
        }

        $this->data['kuisioner']    = $this->kuisioner_m->get();        
        $this->data['title']        = 'Data Kuisioner';
        $this->data['content']      = 'admin/kuisioner_data';
        $this->template($this->data);
    }

    public function tambah_kuisioner($value='')
    {
        if ($this->POST('submit')) {
            $this->load->model('kuisioner_m');
            $this->data['kuisioner'] = [
                'pertanyaan'    => $this->POST('pertanyaan'),
                'jawaban'       => json_encode($this->POST('jawaban'))
            ];
            $this->kuisioner_m->insert($this->data['kuisioner']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_kuisioner','refresh');
            exit;
        }
        $this->data['title']        = 'Tambah Kuisioner';
        $this->data['content']      = 'admin/kuisioner_tambah';
        $this->template($this->data);
    }

    public function data_kelas($value='')
    {
        $this->load->model('kelas_m');

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->kelas_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_kelas','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['data']  = [
                'nama_kelas'          => $this->POST('nama'),
            ];
            $this->kelas_m->insert($this->data['data']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_kelas','refresh');
            exit;
        }

        $this->data['kelas' ]       = $this->kelas_m->get();
        $this->data['title']        = 'Daftar Kelas';
        $this->data['content']      = 'admin/kelas_data';
        $this->template($this->data);
    }

    public function edit_kelas($value='')
    {
        $this->load->model('kelas_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_kelas','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['data']  = [
                'nama_kelas'          => $this->POST('nama'),
            ];
            $this->kelas_m->update($id,$this->data['data']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_kelas','refresh');
            exit;
        }
        
        $this->data['kelas' ]       = $this->kelas_m->get_row([ 'id' => $id ]);
        $this->data['title']        = 'Edit Mata Pelajaran';
        $this->data['content']      = 'admin/kelas_edit';
        $this->template($this->data);
    }

    public function data_peringkat($value='')
    {
        $this->load->model('peringkat_m');

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->peringkat_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_peringkat','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['data']  = [
                'nama_peringkat'   => $this->POST('nama_peringkat'),
                'bobot'            => $this->POST('bobot')
            ];
            $this->peringkat_m->insert($this->data['data']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_peringkat','refresh');
            exit;
        }

        $this->data['peringkat' ]   = $this->peringkat_m->get();
        $this->data['title']        = 'Daftar Peringkat Prestasi';
        $this->data['content']      = 'admin/peringkat_data';
        $this->template($this->data);
    }

    public function edit_peringkat($value='')
    {
        $this->load->model('peringkat_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_peringkat','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['data']  = [
                'nama_peringkat'   => $this->POST('nama_peringkat'),
                'bobot'            => $this->POST('bobot')
            ];
            $this->peringkat_m->update($id,$this->data['data']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_peringkat','refresh');
            exit;
        }
        
        $this->data['peringkat']    = $this->peringkat_m->get_row([ 'id' => $id ]);
        $this->data['title']        = 'Edit Mata Pelajaran';
        $this->data['content']      = 'admin/peringkat_edit';
        $this->template($this->data);
    }

    public function data_jenjang_prestasi($value='')
    {
        $this->load->model('jenjang_prestasi_m');

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->jenjang_prestasi_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_jenjang_prestasi','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['data']  = [
                'nama_jenjang'     => $this->POST('nama_jenjang'),
                'bobot'            => $this->POST('bobot'),
                'persentase'       => ($this->POST('persentase')/100.0)
            ];
            $this->jenjang_prestasi_m->insert($this->data['data']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_jenjang_prestasi','refresh');
            exit;
        }

        $this->data['jenjang']     = $this->jenjang_prestasi_m->get();
        $this->data['title']        = 'Daftar Jenjang Prestasi';
        $this->data['content']      = 'admin/jenjang_prestasi_data';
        $this->template($this->data);
    }

    public function edit_jenjang_prestasi($value='')
    {
        $this->load->model('jenjang_prestasi_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_jenjang_prestasi','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['data']  = [
                'nama_jenjang'     => $this->POST('nama_jenjang'),
                'bobot'            => $this->POST('bobot'),
                'persentase'       => ($this->POST('persentase')/100.0)
            ];
            $this->jenjang_prestasi_m->update($id,$this->data['data']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_jenjang_prestasi','refresh');
            exit;
        }
        
        $this->data['jenjang']     = $this->jenjang_prestasi_m->get_row([ 'id' => $id ]);
        $this->data['title']        = 'Edit Mata Pelajaran';
        $this->data['content']      = 'admin/jenjang_prestasi_edit';
        $this->template($this->data);
    }

    public function data_jenis_lomba($value='')
    {
        $this->load->model('jenis_lomba_m');

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->jenis_lomba_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_jenis_lomba','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['data']  = [
                'jenis'            => $this->POST('jenis'),
                'jenis_lomba'      => $this->POST('jenis_lomba'),
                'persentase'       => ($this->POST('persentase')/100.0)
            ];
            $this->jenis_lomba_m->insert($this->data['data']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_jenis_lomba','refresh');
            exit;
        }

        $this->data['jenis']      = $this->jenis_lomba_m->get();
        $this->data['title']        = 'Daftar Jenis Lomba';
        $this->data['content']      = 'admin/jenis_lomba_data';
        $this->template($this->data);
    }

    public function edit_jenis_lomba($value='')
    {
        $this->load->model('jenis_lomba_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_jenis_lomba','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['data']  = [
                'jenis'            => $this->POST('jenis'),
                'jenis_lomba'      => $this->POST('jenis_lomba'),
                'persentase'       => ($this->POST('persentase')/100.0)
            ];
            $this->jenis_lomba_m->update($id,$this->data['data']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_jenis_lomba','refresh');
            exit;
        }
        
        $this->data['jenis']        = $this->jenis_lomba_m->get_row([ 'id' => $id ]);
        $this->data['title']        = 'Edit Jenis Lomba';
        $this->data['content']      = 'admin/jenis_lomba_edit';
        $this->template($this->data);
    }
    public function data_mata_lomba($value='')
    {
        $this->load->model('mata_lomba_m');
        $this->load->model('jenis_lomba_m');

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->mata_lomba_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_mata_lomba','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['data']  = [
                'nama_lomba'       => $this->POST('nama_lomba'),
                'id_jenis'         => $this->POST('id_jenis'),
                'bobot'            => $this->POST('bobot')                
            ];
            $this->mata_lomba_m->insert($this->data['data']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_mata_lomba','refresh');
            exit;
        }

        $this->data['lomba']        = $this->mata_lomba_m->getDataJoin(['jenis_lomba'],['jenis_lomba.id=mata_lomba.id_jenis']);  
        $this->data['jenis']        = $this->jenis_lomba_m->get();
        $this->data['title']        = 'Daftar Cabang Lomba';
        $this->data['content']      = 'admin/mata_lomba_data';
        $this->template($this->data);
    }

    public function edit_mata_lomba($value='')
    {
        $this->load->model('mata_lomba_m');
        $this->load->model('jenis_lomba_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_mata_lomba','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['data']  = [
                'nama_lomba'       => $this->POST('nama_lomba'),
                'id_jenis'         => $this->POST('id_jenis'),
                'bobot'            => $this->POST('bobot')                
            ];
            $this->mata_lomba_m->update($id,$this->data['data']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_mata_lomba','refresh');
            exit;
        }
        
        $this->data['lomba']        = $this->mata_lomba_m->get_row([ 'id_lomba' => $id ]);
        $this->data['jenis']        = $this->jenis_lomba_m->get();        
        $this->data['title']        = 'Edit Cabang Lomba';
        $this->data['content']      = 'admin/mata_lomba_edit';
        $this->template($this->data);
    }

    public function data_bobot($value='')
    {
        $this->load->model('bobot_m');
        $this->load->model('mata_pelajaran_m');
        $this->load->model('kelas_m');

        $del = $this->uri->segment(3);
        if(isset($del) && $del == 'delete') {
            $id = $this->uri->segment(4);
            $this->bobot_m->delete($id);
            $this->flashmsg('Berhasil hapus data.');
            redirect('admin/data_bobot','refresh');
            exit;
        }

        if ($this->POST('submit')) {
            $this->data['data']  = [
                'id_mapel'         => $this->POST('id_mapel'),
                'id_kelas'         => $this->POST('id_kelas'),
                'bobot'            => $this->POST('bobot')                
            ];
            $this->bobot_m->insert($this->data['data']);
            $this->flashmsg('Berhasil tambah data.');
            redirect('admin/data_bobot','refresh');
            exit;
        }

        $this->data['bobot']        = $this->bobot_m->getDataJoin(['mata_pelajaran','kelas'],['mata_pelajaran.id=bobot.id_mapel','kelas.id=bobot.id_kelas']);  
        $this->data['kelas']        = $this->kelas_m->get();
        $this->data['mapel']        = $this->mata_pelajaran_m->get();
        $this->data['title']        = 'Daftar Bobot';
        $this->data['content']      = 'admin/bobot_data';
        $this->template($this->data);
    }

    public function edit_bobot($value='')
    {
        $this->load->model('bobot_m');
        $this->load->model('mata_pelajaran_m');
        $this->load->model('kelas_m');

        $id =  $this->uri->segment(3);
        if (!isset($id)) {
            redirect('admin/data_bobot','refresh');
            exit;
        }

        if ($this->POST('edit')) {
            $this->data['data']  = [
                'id_mapel'         => $this->POST('id_mapel'),
                'id_kelas'         => $this->POST('id_kelas'),
                'bobot'            => $this->POST('bobot')                
            ];
            $this->bobot_m->update($id,$this->data['data']);
            $this->flashmsg('Berhasil edit data.');
            redirect('admin/data_bobot','refresh');
            exit;
        }
        
        $this->data['bobot']        = $this->bobot_m->get_row([ 'id_bobot' => $id ]);
        $this->data['kelas']        = $this->kelas_m->get();
        $this->data['mapel']        = $this->mata_pelajaran_m->get();     
        $this->data['title']        = 'Edit Bobot';
        $this->data['content']      = 'admin/bobot_edit';
        $this->template($this->data);
    }
}
