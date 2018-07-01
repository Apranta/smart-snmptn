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
                                <?= form_open('siswa/input_prestasi') ?>
                                 
                                <div class="form-group">
                                    <label for="jenis_lomba">Jenis Lomba</label>
                                    <select name="jenis_lomba" class="form-control" required>
                                        <option>-Pilih jenis lomba-</option>
                                        <?php $i=1; foreach($jenis_lomba as $row): ?>
                                            <option value="<?= $row->id ?>"><?= $row->jenis_lomba ?></option>
                                        <?php $i++; endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_lomba">Cabang Lomba</label>
                                    <select name="nama_lomba" class="form-control">
                                        <option>-Pilih Cabang Lomba-</option>
                                        <?php $i=1; foreach($jenis_lomba as $row): ?>
                                            <option value="<?= $row->id_lomba ?>"><?= $row->nama_lomba ?></option>
                                        <?php $i++; endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="peringkat">Sebagai</label>
                                    <select name="peringkat" class="form-control">
                                        <option>-Pilih Sebagai-</option>
                                        <?php $i=1; foreach($peringkat as $row): ?>
                                            <option value="<?= $row->id ?>"><?= $row->nama_peringkat ?></option>
                                        <?php $i++; endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tingkat">Tingkat</label>
                                    <select name="tingkat" class="form-control">
                                        <option>-Pilih Tingkat-</option>
                                        <?php $i=1; foreach($jenjang_prestasi as $row): ?>
                                            <option value="<?= $row->id ?>"><?= $row->nama_jenjang ?></option>
                                        <?php $i++; endforeach; ?>
                                    </select>
                                </div>

                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                                <?= form_close() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
