<?php 
 function utiliti($nilai,$jenis='')
    {
        if($jenis=='IPA' || $jenis=='IPS') {
            if($nilai>=8) {
                return 5;
            }
            else if($nilai>=6) {
                return 4;
            }
            else if($nilai>=4) {
                return 3;
            }
            else if($nilai>=2) {
                return 2;
            }
            else {
                return 1;
            }
        }
        if($nilai>=4) {
            return 5;
        }
        else if($nilai>=3) {
            return 4;
        }
        else if($nilai>=2) {
            return 3;
        }
        else if($nilai>=1) {
            return 2;
        }
        else {
            return 1;
        }
    }
 ?>

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
                                                <td>
                                                    <?php 
                                                    foreach ($mata_pelajaran as $key) {
                                                        if($key->nama==$row) {
                                                            $n = utiliti($value,$key->jurusan);
                                                            $total_value = $total_value+$n;
                                                            echo $n;
                                                        }
                                                    }
                                                     ?>
                                                </td> 
                                                
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
                                                <?php $total_value = $total_value+$value; ?>
                                                <td><?= $row ?></td>
                                                <td><?= $value ?></td>
                                                <td><?= $value*10 ?></td> 
                                                
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                            <tr>
                                                <td colspan="4">
                                                    Kuisioner
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                                                            
                                                <td colspan="2">Kuisioner</td>
                                                <td>
                                                <?php $i=1; $total=0.0; foreach($kuisioner as $row):
                                                    $pilgan = json_decode($row->jawaban);
                                                    for ($i=0; $i < count($pilgan) ; $i++) { 
                                                        if($pilgan[0] == $row->dijawab) {
                                                            $total = $total + 1;
                                                        }
                                                        else if($pilgan[1] == $row->dijawab) {
                                                            $total = $total + 0.5;
                                                        }
                                                        else if($pilgan[2] == $row->dijawab) {
                                                            $total = $total + 0.25;
                                                        }
                                                    }
                                                 $i++; endforeach;
                                                 $total = floor($total)*0.1;
                                                 $total_value = $total_value+$total;
                                                 echo $total;
                                                 ?>                                                    
                                                 </td>
                                                <td><?= ceil($total*3) ?></td>                                                 
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    Psikotes
                                                </td>
                                            </tr>                                            
                                            <tr>                                                                                                
                                                <td colspan="2">Psikotes</td>
                                                <td><?= $siswa->psikotes*0.125 ?></td>
                                                <?php 
                                                    $p = floor(($siswa->psikotes*0.125)*2); 
                                                    $total_value = $total_value+$p;
                                                ?>
                                                <td><?= $p ?></td> 
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    Total Value
                                                </td>
                                                <td><?= $total_value ?></td>
                                            </tr>
                                        </tbody>
                                    </table> <hr>
                                    <!-- /.table-responsive -->
                                    <?php $terpilih = []; foreach ($pilihan_jurusan as $row) {
                                        if($row->grade < $total_value) {
                                            $terpilih[$row->nama_prodi.'-'.$row->nama_uni] = $row->grade;
                                        }
                                    } 
                                    if(empty($terpilih) || $terpilih==NULL) {
                                        echo '<center style="color: red;">Maaf siswa tidak layak</center><br>';
                                        echo '<center style="color: blue;">siswa disarankan memilih jurusan dibawah ini.</center><br>';
                                        $i = 1;
                                        foreach ($program_studi as $row) {
                                            if($row->grade < $total_value) {
                                                $terpilih[$row->nama_prodi.'-'.$row->nama_uni] = $row->grade;
                                                $i++;
                                                if($i==3) {
                                                    break;
                                                }
                                            }
                                        }
                                    } else {
                                        echo '<center style="color: green;">Selamat siswa layak memilih jurusan yang dipilihnya.</center><br>'; ?>                                                                                
                                    <?php  } ?>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pilihan">
                                            <thead>
                                                <tr>
                                                    <th>No</th>                                              
                                                    <th>Program Studi</th>
                                                    <th>Grade</th>
                                                    
                                                    <!-- <th></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($terpilih as $key => $value): ?>
                                                <tr>
                                                    <td style="width: 20px !important;" ><?= $i ?></td>
                                                    
                                                    <td style="width: 550px;"><?= $key ?></td>
                                                    <td><?= $value ?></td>
                                                    
                                                </tr>
                                                <?php $i++; endforeach; ?>
                                            </tbody>
                                        </table> 
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