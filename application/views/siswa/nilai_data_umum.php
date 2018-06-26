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
                                <?= form_open('siswa/data_nilai', [ 'class' => 'form-inline']) ?>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5 style="color: green;">Matematika</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 style="color: green; text-align: center;">Bahasa Indonesia</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 style="color: green;">Bahasa Inggris</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="kelasx1">Kelas X/1 &nbsp&nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasx1Matematika" class="form-control">
                                    </div> &nbsp    
                                    
                                    <div class="form-group">
                                        <label for="kelasx1">Kelas X/1 &nbsp&nbsp </label>
                                        <input style="width: 80px;" type="number" name="kelasx1Indonesia" class="form-control">
                                    </div> &nbsp
                                    <div class="form-group">
                                        <label for="kelasx1">Kelas X/1 &nbsp&nbsp </label>
                                        <input style="width: 80px;" type="number" name="kelasx1Inggris" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="kelasx2">Kelas X/2 &nbsp&nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasx2Matematika" class="form-control">
                                    </div> &nbsp    
                                    
                                    <div class="form-group">
                                        <label for="kelasx2">Kelas X/2 &nbsp&nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasx2Indonesia" class="form-control">
                                    </div> &nbsp
                                    <div class="form-group">
                                        <label for="kelasx2">Kelas X/2 &nbsp&nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasx2Inggris" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="kelasxi1">Kelas XI/1&nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasxi1Matematika" class="form-control">
                                    </div> &nbsp
                                    <div class="form-group">
                                        <label for="kelasxi1">Kelas XI/1 &nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasxi1Indonesia" class="form-control">
                                    </div> &nbsp

                                    <div class="form-group">
                                        <label for="kelasxi1">Kelas XI/1 &nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasxi1Inggris" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="kelasxi2">Kelas XI/2&nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasxi2Matematika" class="form-control">
                                    </div> &nbsp
                                    <div class="form-group">
                                        <label for="kelasxi2">Kelas XI/2 &nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasxi2Indonesia" class="form-control">
                                    </div> &nbsp

                                    <div class="form-group">
                                        <label for="kelasxi2">Kelas XI/2 &nbsp</label>
                                        <input style="width: 80px;" type="number" name="kelasxi2Inggris" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="kelasxii1">Kelas XII/1</label>
                                        <input style="width: 80px;" type="number" name="kelasxii1Matematika" class="form-control">
                                    </div> &nbsp
                                    <div class="form-group">
                                        <label for="kelasxii1">Kelas XII/1</label>
                                        <input style="width: 80px;" type="number" name="kelasxii1Indonesia" class="form-control">
                                    </div> &nbsp

                                    <div class="form-group">
                                        <label for="kelasxii1">Kelas XII/1</label>
                                        <input style="width: 80px;" type="number" name="kelasxii1Inggris" class="form-control">
                                    </div>
                                </div>
                                
                                
                                <br><br>
                                <input type="checkbox" class="form-control" value="ok" name="setuju" required>Saya menyatakan data ini telah benar. <br>
                                <input type="submit" name="umum" value="Simpan" class="col-md-offset-3 btn btn-primary">
                                <?= form_close() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>