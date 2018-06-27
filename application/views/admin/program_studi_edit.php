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
                               
                                    <?= form_open( 'admin/edit_program_studi/'.$program_studi->id, [ 'class' => 'form-inline'] ) ?>
                                        <div class="form-group" required>
                                            <input type="text" value="<?= $program_studi->nama_prodi ?>" name="nama_prodi" placeholder="nama prodi" class="form-control">   
                                        </div>
                                        <div class="form-group">
                                            <select name="jurusan" class="form-control" required>
                                                <?php if ($program_studi->jurusan == 'IPA') { ?>
                                                <option value="1" selected>IPA 
                                                <option value="2">IPS
                                                <?php } ?>

                                                <?php if ($program_studi->jurusan == 'IPS') { ?>
                                                <option value="1">IPA 
                                                <option value="2" selected>IPS
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">                                            
                                            <?php  
                                                $w = [];
                                                foreach ( $universitas as $row ) $w[$row->id] = $row->nama_uni;
                                                echo form_dropdown( 'id_universitas', $w, $program_studi->id_universitas, [ 'class' => 'form-control', 'required' => 'required' ] );
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" value="<?= $program_studi->grade ?>" name="grade" placeholder="grade" class="form-control" step="0.1" min="0" max="10" required>   
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
        