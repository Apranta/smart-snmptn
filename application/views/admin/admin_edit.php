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
                                <?= form_open('admin/edit_admin/' . $admin->username) ?>
                                
                                <div class="form-group ">
                                    <label class="control-label">Username</label>
                                    <input type="text" value="<?= $admin->username ?>" name="username" class="form-control" required>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Password</label>
                                    <input type="text" value="<?= $admin->password ?>" name="password" class="form-control" required>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Nama</label>
                                    <input type="text" value="<?= $admin->nama ?>" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Jabatan</label>
                                    <input type="text" value="<?= $admin->jabatan ?>" name="jabatan" class="form-control" required>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Alamat</label>
                                    <textarea name="alamat" value="<?= $admin->alamat ?>" class="form-control" required><?= $admin->alamat ?></textarea>
                                </div>

                                <input type="submit" name="edit" value="Simpan" class="btn btn-primary">
                                <?= form_close() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
