<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Kuisioner</h3> <hr>
                            <?= form_open( 'siswa/kuisioner' ) ?>
                            <?php $i=1; foreach($kuisioner as $row): ?>
                            <div class="row">
                                <?= $i.'. '.$row->pertanyaan ?><br>
                                <?php 
                                    $jawab = json_decode($row->jawaban);
                                    
                                    foreach ($jawab as $key) { ?>
                                        <label class="radio-inline">
                                            <?php if(!empty($hasil)) { if ($row->id == $hasil[$i-1]->id_kuisioner && $key == $hasil[$i-1]->jawaban) { ?>
                                                <input type="radio" name="soal[<?= $row->id ?>]" value="<?= $key ?>" required checked disabled><?= $key ?>
                                            <?php } } else { ?>
                                            <input type="radio" name="soal[<?= $row->id ?>]" value="<?= $key ?>" required <?php if(!empty($hasil)) echo "disabled"; ?>><?= $key ?>
                                            <?php } ?>
                                        </label>
                                <?php } ?>
                                
                                
                            </div>
                            <?php $i++; endforeach; ?>
                            <br>
                            <div class="row">
                                <input type="checkbox" name="accept" required <?php if(!empty($hasil)) echo "checked disabled"; ?>> Saya menyatakan telah mengisi kuisioner dengan keadaan yang sebenarnya.
                            </div>

                            <input type="submit" name="submit" value="simpan" class="btn btn-primary" <?php if(!empty($hasil)) echo "disabled"; ?> >
                            <?= form_close() ?>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        
