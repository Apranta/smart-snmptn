<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                	<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Pegawai
                                </div>
                                <div class="panel-body">
                        			<div class="row">
                                        <div class="col-md-3">
                                            <img src="<?= base_url('assets/img/pegawai/' . $data->username .'.jpg') ?>" width="250px" class="img img-thumbnail" onerror = 'this.src="http://placehold.it/250"'>
                                            <hr>
                                            <h4 class="text-center"><?= $data->nama ?></h4>
                                        </div>
                                        <div class="col-md-9">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Tempat , Tanggal Lahir</th>
                                                        <th><?= $data->tempat_lahir . ' , ' . $data->tanggal_lahir ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Telepon</th>
                                                        <th><?= $data->telepon ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Pendidikan</th>
                                                        <th><?= $data->pendidikan ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <th><?= $data->alamat ?></th>
                                                    </tr>
                                                    <tr><th colspan="2">Seleksi</th></tr>
                                                    <tr>
                                                        <th>Administrasi</th>
                                                        <th><?= ($data->berkas == 1 )? 'Lulus' : 'Tidak Lulus' ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Tes Tertulis</th>
                                                        <th><?= ($data->tes == 1 ) ? 'Lulus' : 'Tidak Lulus' ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Wawancara</th>
                                                        <th><?= ($data->wawancara == 1 ) ? 'Lulus' : 'Tidak Lulus' ?></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>  
                                    <hr>
                                    <h3 class="text-center">Data Berkas Administrasi</h3>
                                    <table class="table table-striped">
                                        <tbody>
                                            <?php foreach ($berkas as $key): ?>
                                            <tr>
                                                <td><?= $key->nama ?></td>
                                                <td><a href="<?= base_url('assets/berkas/' . $key->id .'.jpg') ?>" download class="btn btn-primary"><i class="fa fa-download"></i> Download</a></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h3 class="text-center">Nilai Tes Tertulis</h3>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>TIU</th>
                                                <th>TKD</th>
                                                <th>TWK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th><?= (isset($nilai->tiu)) ? $nilai->tiu : 0 ?></th>
                                                <th><?= (isset($nilai->tkd)) ? $nilai->tkd : 0 ?></th>
                                                <th><?= (isset($nilai->twk)) ? $nilai->twk : 0 ?></th>
                                            </tr>
                                        </tbody>
                                    </table>                
                    			</div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>