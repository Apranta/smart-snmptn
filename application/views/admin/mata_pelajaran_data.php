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
                                    Tambah data
                                    <?= form_open( 'admin/data_mata_pelajaran', [ 'class' => 'form-inline'] ) ?>
                                        <div class="form-group">
                                            <input type="text" name="nama" placeholder="nama" class="form-control" required>   
                                        </div>

                                        <div class="form-group">
                                            <select name="jurusan" class="form-control">
                                                <option value="1">IPA</option>
                                                <option value="2">IPS</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" name="persentase" min="0" max="100" placeholder="%" class="form-control" required>   
                                        </div>
                                        
                                        
                                        <input type="submit" name="submit" value="simpan" class="btn btn-primary">
                                    <?= form_close() ?> <hr>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                              
                                                <th>Nama</th>
                                                <th>Jurusan</th>
                                                <th>Persentase</th>                                                                                        
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($mapel as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->jurusan ?></td>
                                                <td><?php echo ($row->persentase*100).'%'; ?></td>                                                
                                                                                                
                                                <td align="center">
                                                <a href="<?= base_url( 'admin/edit_mata_pelajaran/'.$row->id )?>" class="btn btn-xs btn-primary glyphicon glyphicon-pencil" ></a>
                                                <a href="<?= base_url( 'admin/data_mata_pelajaran/delete/'.$row->id )?>" class="btn btn-xs btn-danger glyphicon glyphicon-trash" ></a>
                                                </td>
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
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
            </script>