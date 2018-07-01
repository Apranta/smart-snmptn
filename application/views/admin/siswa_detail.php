<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $title ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <?= $this->session->flashdata('msg') ?>
                                    
                                    <b>Data Profil Siswa</b>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-profil">
                                        
                                        <tbody>
                                            <tr>                        
                                                <td style="width: 200px !important;">Username</td>
                                                <td><?= $siswa->username ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>NISN</td>
                                                <td><?= $siswa->nisn ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Nama</td>
                                                <td><?= $siswa->nama ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Jenis Kelamin</td>
                                                <td><?= $siswa->jenis_kelamin ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Tanggal Lahir</td>
                                                <td><?= $siswa->tanggal_lahir ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Tempat Lahir</td>
                                                <td><?= $siswa->tempat_lahir ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Telepon</td>
                                                <td><?= $siswa->telepon ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Jurusan</td>
                                                <td><?= $siswa->jurusan ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Psikotes</td>
                                                <td><?= $siswa->psikotes ?></td>
                                            </tr>
                                            <tr>                        
                                                <td>Alamat</td>
                                                <td><?= $siswa->alamat ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <b>Data Nilai Siswa</b>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-nilai">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                              
                                                <th>Mata Pelajaran</th>
                                                <th>Kelas</th>
                                                <th>Nilai</th>
                                                
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($nilai_jurusan as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->nama_kelas ?></td>
                                                <td><?= $row->nilai ?></td>      
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <b>Data Prestasi Siswa</b>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-prestasi">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                              
                                                <th>Jenis Lomba</th>
                                                <th>Cabang Lomba</th>
                                                <th>Sebagai</th>
                                                <th>Tingkat</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($prestasi as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                
                                                <td><?= $row->jenis_lomba ?></td>
                                                <td><?= $row->nama_lomba ?></td>
                                                <td><?= $row->nama_peringkat ?></td> 
                                                <td><?= $row->nama_jenjang ?></td> 
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <b>Data Kuisioner Siswa</b>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-kuisioner">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                              
                                                <th>Pertanyaan</th>
                                                <th>Jawaban</th>
                                                
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($kuisioner as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                
                                                <td style="width: 550px;"><?= $row->pertanyaan ?></td>
                                                <td><?= $row->dijawab ?></td>
                                                
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <b>Data Hitung SMART Siswa</b>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-smart">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                              
                                                <th>Jenis Nilai</th>
                                                <th>E(NxB)xP</th>
                                                <th>Nilai Value</th>                                                
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4">
                                                    Nilai Mata Pelajaran
                                                </td>
                                                
                                            </tr>
                                            <?php $i=1; foreach($smart_nilai as $row => $value): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                
                                                <td><?= $row ?></td>
                                                <td><?= round($value,2,PHP_ROUND_HALF_UP) ?></td>
                                                <td><?= 99 ?></td> 
                                                
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                            <tr>
                                                <td colspan="4">
                                                    Prestasi
                                                </td>
                                            </tr>
                                            <?php $i=1; foreach($smart_prestasi as $row => $value): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                
                                                <td><?= $row ?></td>
                                                <td><?= $value ?></td>
                                                <td><?= 99 ?></td> 
                                                
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        

            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-nilai').DataTable({
                        responsive: true
                    });
                    $('#dataTables-prestasi').DataTable({
                        responsive: true
                    });
                    $('#dataTables-profil').DataTable({
                        responsive: true
                    });
                    $('#dataTables-kuisioner').DataTable({
                        responsive: true
                    });
                });
            </script>