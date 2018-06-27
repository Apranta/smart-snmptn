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
                               
                                    <?= form_open( 'admin/edit_jenjang_prestasi/'.$jenjang->id, [ 'class' => 'form-inline'] ) ?>
                                        <div class="form-group">
                                            <input type="text" value="<?= $jenjang->nama_jenjang ?>" name="nama_jenjang" placeholder="nama" class="form-control" required>   
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="number" value="<?= $jenjang->bobot ?>" name="bobot" step="0.1" min="0" max="100" placeholder="bobot" class="form-control" required>   
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="number" value="<?= $jenjang->persentase ?>" name="persentase" min="0" max="100" placeholder="persentase" class="form-control" required>   
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
        