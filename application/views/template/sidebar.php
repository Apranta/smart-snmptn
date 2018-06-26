<!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                <?php if ($this->session->userdata('role') == 1): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('admin/') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/data_admin') ?>" class=""><i class="lnr lnr-user"></i> <span>Data Admin</span></a></li></li>
                        <li><a href="<?= base_url('admin/data_siswa') ?>" class=""><i class="fa fa-table"></i> <span>Data Siswa</span></a></li></li>
                        <li><a href="<?= base_url('admin/data_universitas') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar PTN</span></a></li></li>
                        <li><a href="<?= base_url('admin/data_program_studi') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Program Studi</span></a></li></li>
                        <!-- <li><a href="<?= base_url('admin/data_kuisioner') ?>" class=""><i class="fa fa-edit"></i> <span>Data Kuisioner</span></a></li></li> -->
                    </ul>
                <?php elseif ($this->session->userdata('role') == 2): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('siswa/') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('siswa/profile') ?>"><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li></li>
                        <li><a href="#"><i class="fa fa-file"></i> <span>Data Nilai</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url('siswa/nilai_jurusan') ?>" class=""><i class="fa fa-file"></i> <span>Nilai Jurusan</span></a>
                            <li><a href="<?= base_url('siswa/nilai_umum') ?>" class=""><i class="fa fa-file"></i> <span>Nilai Umum</span></a>
                        </ul>
                        </li></li>

                        


                        <li><a href="<?= base_url('siswa/data_prestasi') ?>" class=""><i class="fa fa-file"></i> <span>Data Prestasi</span></a></li></li>
                        <li><a href="<?= base_url('siswa/kuisioner') ?>" class=""><i class="fa fa-table"></i> <span>Kuisioner</span></a></li></li>
                        <li><a href="<?= base_url('siswa/data_universitas') ?>" class=""><i class="fa 
                        fa-edit"></i> <span>Daftar PTN</span></a></li></li>
                        <li><a href="<?= base_url('siswa/data_program_studi') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Program Studi</span></a></li></li>
                    </ul>
                <?php elseif ($this->session->userdata('role') == 3): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('pegawai/') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('pegawai/profile') ?>"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
                        <li><a href="<?= base_url('pegawai/berkas') ?>"><i class="lnr lnr-user"></i> <span>Data Berkas</span></a></li>
                    </ul>
                <?php endif; ?>               
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <div id="page-wrapper">