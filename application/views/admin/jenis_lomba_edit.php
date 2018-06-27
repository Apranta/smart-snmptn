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
                                    
                                    <?= form_open( 'admin/edit_jenis_lomba/'.$jenis->id, [ 'class' => 'form-inline'] ) ?>
                                        <div class="form-group">
                                            <input type="text" value="<?= $jenis->jenis_lomba ?>" name="jenis_lomba" placeholder="nama" class="form-control" required>   
                                        </div>

                                        <div class="form-group">
                                            <label class="radio-inline"><input type="radio" name="jenis" value="1" <?php if($jenis->jenis == 'AKADEMIK') echo 'checked'; ?>>Akademik</label>    
                                            <label class="radio-inline"><input type="radio" name="jenis" value="2" <?php if($jenis->jenis == 'NONAKADEMIK') echo 'checked'; ?>>Non Akademik</label>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="number" value="<?= $jenis->persentase ?>" name="persentase" min="0" max="100" placeholder="%" class="form-control" required>   
                                        </div>
                                        
                                        <input type="submit" name="edit" value="simpan" class="btn btn-primary">
                                    <?= form_close() ?> <hr>
                                    
                                    
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