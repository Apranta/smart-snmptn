<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $title ?></h3>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-10">
                                <?= form_open('siswa/input_nilai/', ['class' => 'form-inline']) ?>

                                <?php foreach($mapel as $row): ?>
                                    <div class="row">                                                                    
                                        <div class="col-md-4" style="text-align: left;">
                                            <h4 style="color: green;"><?= $row->nama ?></h4>
                                        </div>
                                    </div>
                                    <?php foreach ($kelas as $k) { 
                                        if ($k->id_mapel == $row->id) {                                            
                                        ?>
                                        <div class="row">                                                                    
                                            <div class="form-group">
                                                <label for="kelas"><?= $k->nama_kelas ?></label>
                                                <?php if(!empty($cek)) { 
                                                        foreach ($cek as $key) { 
                                                            if($key->id_bobot == $k->id_bobot) { ?>
                                                            <input type="number" class="form-control" name="kelas[<?= $k->id_bobot ?>]" min="0" max="100" required value="<?php echo $key->nilai; ?>" >                                                        
                                                        <?php } }
                                                    } else { ?>
                                                            <input type="number" class="form-control" name="kelas[<?= $k->id_bobot ?>]" min="0" max="100" required>
                                                    <?php } ?>
                                            </div>
                                        </div>

                                    <?php } } ?>
                                    <hr>
                                <?php endforeach; ?>
                                
                                
                                
                                <br><br>
                                <input type="checkbox" class="form-control" value="ok" name="jurusan" required <?php if(!empty($cek)) echo "checked disabled"; ?>>Saya menyatakan data ini telah benar. <br>
                                <input type="submit" <?php if(!empty($cek)) echo "disabled"; ?> name="submit" value="Simpan" class="col-md-offset-3 btn btn-primary">
                                <?= form_close() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>