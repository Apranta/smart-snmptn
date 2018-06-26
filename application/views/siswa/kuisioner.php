<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Kuisioner</h3>
                            <?= form_open( 'siswa/kuisioner' ) ?>
                            <div class="row">
                                1. Apakah jurusan kuliah yang anda pilih sesuai dengan kemauan anda sendiri?<br>
                                <label class="radio-inline">
                                    <input type="radio" name="nomor1">Ya, saya sendiri
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nomor1">Tidak, ikut orang tua
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nomor1">Tidak, ikut teman
                                </label>
                            </div>
                            <div class="row">
                                2. Seberapa besar minat anda terhadap jurusan yang anda pilih?<br>
                                <label class="radio-inline">
                                    <input type="radio" name="nomor1">Sangat Besar
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nomor1">Cukup Besar
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nomor1">Biasa Saja
                                </label>
                            </div>
                            <br>
                            <div class="row">
                                <input type="checkbox" name="accept" required> Saya menyatakan telah mengisi kuisioner dengan keadaan yang sebenarnya.
                            </div>

                            <input type="submit" name="submit" value="simpan" class="btn btn-primary">
                            <?= form_close() ?>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <?= form_open('admin/data-admin'); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <h4 class="text-center">Data Login</h4>
            <hr>
            <div class="form-group label-floating">
                <label class="control-label">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Password</label>
                <input type="password" name="pw" class="form-control">
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Ulangi Password</label>
                <input type="password" name="repw" class="form-control">
            </div>
            <hr>
            <h4 class="text-center">Data Pribadi</h4>
            <hr>
            <div class="form-group label-floating">
                <label class="control-label">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Divisi</label>
                <select name="jabatan" class="form-control">
                    <option value="">== Silahkan PIlih ==</option>
                    <?php foreach ($this->Jabatan_m->get() as $key): ?>
                        <option value="<?= $key->id ?>"><?= $key->nama ?></option>
                    <?php endforeach ?>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-info" name="insert" value="Tambah Data">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>

  </div>
</div>
            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
                function _delete(id) {
                    // alert('aa');
                    $.ajax({
                            url: "<?= base_url('admin/data-admin') ?>",
                            type: 'POST',
                            data: {
                                id: id,
                                delete: true
                            },
                            success: function() {
                                window.location = "<?= base_url('admin/data-admin') ?>";
                            }
                        });
                }
            </script>