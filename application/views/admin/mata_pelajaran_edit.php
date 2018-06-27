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
                               
                                    <?= form_open( 'admin/edit_mata_pelajaran/'.$mapel->id, [ 'class' => 'form-inline'] ) ?>
                                        <div class="form-group">
                                            <input type="text" value="<?= $mapel->nama ?>" name="nama" placeholder="nama" class="form-control" required>   
                                        </div>
                                        <div class="form-group">
                                            <select name="jurusan" class="form-control" required>
                                                <?php if ($mapel->jurusan == 'IPA') { ?>
                                                <option value="1" selected>IPA 
                                                <option value="2">IPS
                                                <?php } ?>

                                                <?php if ($mapel->jurusan == 'IPS') { ?>
                                                <option value="1">IPA 
                                                <option value="2" selected>IPS
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" value="<?= $mapel->persentase ?>" name="persentase" min="0" max="100" placeholder="%" class="form-control" required>   
                                        </div>
                                        
                                        
                                        <input type="submit" name="edit" value="simpan" class="btn btn-primary">
                                    <?= form_close() ?>
                                    
                                    
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
        