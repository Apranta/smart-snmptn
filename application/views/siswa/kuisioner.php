<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $this->session->flashdata('msg') ?>
                            <h4><?= $title ?></h4>                            
                        </div>
                        <div class="panel-body">                            
                            <div class="col-lg-10">                            
                            <?= form_open( 'siswa/kuisioner' ) ?>
                            <h4>Silahkan Pilih Jurusan Yang anda Minati</h4><hr>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Pilihan Pertama</label>  
                                    </div>
                                    <div class="col-md-6">
                                        <select name="prodi1" class="form-control">
                                            <option value="">== Pilihan Ke 1==</option>
                                            <?php foreach ($this->program_studi_m->get() as $prodi): ?>
                                                <option value="<?= $prodi->id ?>"><?= $prodi->nama_prodi . " - " . $this->universitas_m->get_row(['id' => $prodi->id_universitas])->nama_uni ?></option>
                                            <?php endforeach ?>
                                        </select>  
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Pilihan Kedua</label>  
                                    </div>
                                    <div class="col-md-6">
                                        <select name="prodi2" class="form-control">
                                            <option value="">== Pilihan Ke 2==</option>
                                            <?php foreach ($this->program_studi_m->get() as $prodi): ?>
                                                <option value="<?= $prodi->id ?>"><?= $prodi->nama_prodi . " - " . $this->universitas_m->get_row(['id' => $prodi->id_universitas])->nama_uni ?></option>
                                            <?php endforeach ?>
                                        </select>  
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Pilihan Ketiga</label>  
                                    </div>
                                    <div class="col-md-6">
                                        <select name="prodi3" class="form-control">
                                            <option value="">== Pilihan Ke 3==</option>
                                            <?php foreach ($this->program_studi_m->get() as $prodi): ?>
                                                <option value="<?= $prodi->id ?>"><?= $prodi->nama_prodi . " - " . $this->universitas_m->get_row(['id' => $prodi->id_universitas])->nama_uni ?></option>
                                            <?php endforeach ?>
                                        </select>  
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Pertanyaan Kuisioner</h4>
                            <?php $i=1; foreach($kuisioner as $row): ?>
                            <!-- <div class="row"> -->
                                <div class="form-group">
                                    <label><?= $i.'. '.$row->pertanyaan ?>
                                    </label>
                                    <br>
                                    <?php 
                                        $jawab = json_decode($row->jawaban);
                                        
                                        foreach ($jawab as $key) { ?>
                                            <label class="radio-inline">
                                                <?php if(!empty($hasil)) { if ($row->id == $hasil[$i-1]->id_kuisioner && $key == $hasil[$i-1]->jawaban) { ?>
                                                    <input type="radio" name="soal[<?= $row->id ?>]" value="<?= $key ?>" required checked disabled ><?= $key ?>
                                                <?php } } else { ?>
                                                <input type="radio"  name="soal[<?= $row->id ?>]" value="<?= $key ?>" required <?php if(!empty($hasil)) echo "disabled"; ?>><?= $key ?>
                                                <?php } ?>
                                            </label>
                                    <?php } ?>
                                </div>
                            <!-- </div> -->
                            <?php $i++; endforeach; ?>
                            <br>
                            <div class="row">
                                <input type="checkbox" name="accept" required <?php if(!empty($hasil)) echo "checked disabled"; ?>> Saya menyatakan telah mengisi kuisioner dengan keadaan yang sebenarnya.
                            </div>

                            <input type="submit" name="submit" value="simpan" class="btn btn-primary" <?php if(!empty($hasil)) echo "disabled"; ?> >
                            <?= form_close() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
