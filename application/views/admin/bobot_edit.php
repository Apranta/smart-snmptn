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
                               
                                    <?= form_open( 'admin/edit_bobot/'.$bobot->id_bobot, [ 'class' => 'form-inline'] ) ?>                                        
                                        <div class="form-group">                                            
                                            <?php  
                                                $w = [];
                                                foreach ( $kelas as $row ) $w[$row->id] = $row->nama_kelas;
                                                echo form_dropdown( 'id_kelas', $w, $bobot->id_kelas, [ 'class' => 'form-control', 'required' => 'required' ] );
                                            ?>
                                        </div>

                                        <div class="form-group">                                            
                                            <?php  
                                                $w = [];
                                                foreach ( $mapel as $row ) $w[$row->id] = $row->nama;
                                                echo form_dropdown( 'id_mapel', $w, $bobot->id_mapel, [ 'class' => 'form-control', 'required' => 'required' ] );
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" value="<?= $bobot->bobot ?>" name="bobot" placeholder="bobot" class="form-control" step="0.1" min="0" max="10" required>   
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
        