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
                                    <?= form_open( 'admin/data_bobot', [ 'class' => 'form-inline'] ) ?>                                        
                                        <div class="form-group">
                                            <select name="id_kelas" class="form-control">
                                                <?php foreach($kelas as $r): ?>
                                                    <option value="<?= $r->id ?>"><?= $r->nama_kelas ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="id_mapel" class="form-control">
                                                <?php foreach($mapel as $r): ?>
                                                    <option value="<?= $r->id ?>"><?= $r->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="bobot" placeholder="bobot" class="form-control" step="0.1" min="0" max="10" required> 
                                        </div>
                                        
                                        
                                        <input type="submit" name="submit" value="simpan" class="btn btn-primary">
                                    <?= form_close(); ?> <hr>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                              
                                                <th>Kelas</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Bobot</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($bobot as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                
                                                <td><?= $row->nama_kelas ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->bobot ?></td>                                                
                                                                                                
                                                <td align="center">
                                                <a href="<?= base_url( 'admin/edit_bobot/'.$row->id_bobot )?>" class="btn btn-xs btn-primary glyphicon glyphicon-pencil" ></a>
                                                <a href="<?= base_url( 'admin/data_bobot/delete/'.$row->id_bobot )?>" class="btn btn-xs btn-danger glyphicon glyphicon-trash" ></a>
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