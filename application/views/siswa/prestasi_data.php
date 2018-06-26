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
                                    <div>
                                        
                                            <a href="<?= base_url('siswa/input_prestasi/akademik') ?>" class="btn btn-success">
                                                +Tambah Prestasi Akademik
                                            </a>
                                        
                                        
                                            <a href="<?= base_url('siswa/input_prestasi/nonakademik') ?>" class="btn btn-primary">
                                                +Tambah Prestasi Non Akademik
                                            </a>
                                        
                                    </div>
                                    <br>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                              
                                                <th>Jenis Lomba</th>
                                                <th>Cabang Lomba</th>
                                                <th>Sebagai</th>
                                                <th>Tingkat</th>
                                                                                        
                                  
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
                    
                    
                });
            </script>