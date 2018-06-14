<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dashboard Calon Pegawai</h3>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-10">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2"><?= $user->nama ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td><?= $user->tempat_lahir ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td><?= $user->tanggal_lahir ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?= $user->alamat ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan</td>
                                            <td><?= $user->pendidikan ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="<?= base_url('pegawai/detail_hasil') ?>" class="btn btn-info">Lihat Nilai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>