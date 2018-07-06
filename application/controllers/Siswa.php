<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->data['username']   = $this->session->userdata('username');
        $this->data['role']       = $this->session->userdata('role');
        if (!isset($this->data['username'], $this->data['role']))
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
        if ($this->data['role'] != 2)
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
    }

    public function index($value='')
    {
        $this->load->model('hasil_kuisioner_m');
        $this->load->model('siswa_m');
        $this->load->model('nilai_jurusan_m');

        $this->data['siswa']        = $this->siswa_m->get_row([ 'username' => $this->data['username'] ]);
        $this->data['nilai']        = $this->nilai_jurusan_m->get([ 'nisn' => $this->data['siswa']->nisn ]);
        $this->data['kuisioner']    = $this->hasil_kuisioner_m->get([ 'nisn' => $this->data['siswa']->nisn ]);
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
    	if ($this->POST('submit')) {
            $this->load->model('siswa_m');
            $nisn = $this->siswa_m->get_row([ 'username' => $this->data['username'] ])->nisn;            
            $this->data[ 'siswa' ] = [
                'nama'          => $this->POST('nama'),
                'jenis_kelamin' => $this->POST( 'jenis_kelamin' ),
                'tempat_lahir'  => $this->POST('tempat_lahir'),
                'tanggal_lahir' => $this->POST('tanggal_lahir'),
                'alamat'        => $this->POST('alamat'),
                'jurusan'       => $this->POST('jurusan'),
                'psikotes'      => $this->POST('psikotes')
            ];
            $this->siswa_m->update($nisn ,$this->data['siswa']);
            $this->flashmsg('data berhasil disimpan');
            redirect('siswa/profile');
            exit;
        }
        redirect('siswa/profile');
    }

    public function data_prestasi($value='')
    {
        $this->load->model('prestasi_m');
        
        $this->data['prestasi']     = $this->prestasi_m->getDataJoin(['mata_lomba','jenis_lomba','peringkat','jenjang_prestasi'],
            ['mata_lomba.id_lomba=prestasi.mata_lomba','jenis_lomba.id=mata_lomba.id_jenis','peringkat.id=prestasi.id_peringkat', 'jenjang_prestasi.id=prestasi.id_jenjang']);
        
    	$this->data['title']        = 'Data Prestasi Siswa';
        $this->data['content']      = 'siswa/prestasi_data';
        $this->template($this->data);
    }

    public function input_prestasi($value='')
    {
        $this->load->model('peringkat_m');
        $this->load->model('jenjang_prestasi_m');
        $this->load->model('jenis_lomba_m');

        if($this->POST('submit')) {
            $this->load->model('siswa_m');
            $this->load->model('prestasi_m');

            $this->data['lomba'] = [
                'mata_lomba'    => $this->POST('nama_lomba'),
                'id_peringkat'  => $this->POST('peringkat'),
                'id_jenjang'    => $this->POST('tingkat'),
                'nisn'          => $this->siswa_m->get_row([ 'username' => $this->data['username'] ])->nisn
            ];
            $this->prestasi_m->insert($this->data['lomba']);
            $this->flashmsg('Tambah Data Lomba Sukses');
            redirect('siswa/data_prestasi','refresh');
            exit;
        }

        $jenis = $this->uri->segment(3);
        if(!isset($jenis)) {
            redirect('siswa/data_prestasi','refresh');
            exit;
        }

        if($jenis=='akademik') {
            $this->data['jenis_lomba']  = $this->jenis_lomba_m->getListLomba('mata_lomba', 'mata_lomba.id_jenis=jenis_lomba.id', 'jenis=1');
            $this->data['title']        = 'Input Prestasi Akademik Siswa';
            $this->data['content']      = 'siswa/prestasi_akademik_input';
        }

        if($jenis=='nonakademik') {
            $this->data['jenis_lomba']  = $this->jenis_lomba_m->getListLomba('mata_lomba', 'mata_lomba.id_jenis=jenis_lomba.id', 'jenis=2');
            $this->data['title']        = 'Input Prestasi Non Akademik Siswa';
            $this->data['content']      = 'siswa/prestasi_nonakademik_input';
        }

        $this->data['peringkat']        = $this->peringkat_m->get();
        $this->data['jenjang_prestasi'] = $this->jenjang_prestasi_m->get();
    	
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
        $this->load->model('bobot_m');
        $this->load->model('siswa_m');
        $this->load->model('mata_pelajaran_m');

        $this->data['siswa'] = $this->siswa_m->get_row([ 'username' => $this->data['username'] ]);
        $jurusan = $this->data['siswa']->jurusan;
        $nisn    = $this->data['siswa']->nisn;
        $this->data['kelas']        = $this->bobot_m->getMapel($jurusan);        
        $this->data['cek']          = $this->bobot_m->cekJawab($jurusan,$nisn);
        $this->data['mapel']        = $this->mata_pelajaran_m->get([ 'jurusan' => $jurusan ]);
        $this->data['title']        = 'Data Nilai Jurusan Siswa';
        $this->data['content']      = 'siswa/nilai_data_jurusan';
        $this->template($this->data);
    }

    public function nilai_umum($value='')
    {
        $this->load->model('nilai_jurusan_m');        
        $this->load->model('bobot_m');
        $this->load->model('siswa_m');
        $this->load->model('mata_pelajaran_m');

        $this->data['siswa'] = $this->siswa_m->get_row([ 'username' => $this->data['username'] ]);
        $jurusan = 3;
        $nisn    = $this->data['siswa']->nisn;
        $this->data['kelas']        = $this->bobot_m->getMapel($jurusan);        
        $this->data['cek']          = $this->bobot_m->cekJawab($jurusan,$nisn);
        $this->data['mapel']        = $this->mata_pelajaran_m->get([ 'jurusan' => $jurusan ]);
        $this->data['title']        = 'Data Nilai Umum Siswa';
        $this->data['content']      = 'siswa/nilai_data_umum';
        $this->template($this->data);
    }

    public function input_nilai($value='')
    {        
        if ($this->POST('submit')) {
            $this->load->model('siswa_m');
            $this->load->model('bobot_m');
            $this->load->model('nilai_jurusan_m');

            $nisn     = $this->siswa_m->get_row([ 'username' => $this->data['username'] ])->nisn;
            $kelas    = $this->POST('kelas');            
            foreach ($kelas as $key => $value) {
                $this->data['data'] = [
                    'id_bobot'      => $key,
                    'nilai'         => $value,
                    'nisn'          => $nisn
                ];
                $this->nilai_jurusan_m->insert($this->data['data']);
            }
            $this->flashmsg('Berhasil simpan data.');
            if ($this->POST('jurusan')) {
                redirect('siswa/nilai_jurusan','refresh');        
            } else {
                redirect('siswa/nilai_umum','refresh');    
            }
            
            exit;            
        }
        redirect('siswa','refresh');
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
        $this->load->model('kuisioner_m');        
        $this->load->model('siswa_m');
        $this->load->model('hasil_kuisioner_m');

        if($this->POST('submit')) {
            

            $soal = array();
            $soal = $this->POST('soal');
            $nisn = $this->siswa_m->get_row([ 'username' => $this->data['username'] ])->nisn;
            foreach ($soal as $key => $value) {
                $this->data['hasil'] = [
                    'id_kuisioner'  => $key,
                    'nisn'          => $nisn,
                    'jawaban'       => $value
                ];
                $this->hasil_kuisioner_m->insert($this->data['hasil']);
            }

            $this->flashmsg('Kuisioner berhasil disimpan.');
            redirect('siswa/kuisioner','refresh');
            exit;
        }
        $nisn = $this->siswa_m->get_row([ 'username' => $this->data['username'] ])->nisn;
        $this->data['hasil']        = $this->hasil_kuisioner_m->get([ 'nisn' => $nisn ]);        
        $this->data['kuisioner']    = $this->kuisioner_m->get();
        $this->data['title']        = 'Kuisioner';
        $this->data['content']      = 'siswa/kuisioner';
        $this->template($this->data);
    }
}