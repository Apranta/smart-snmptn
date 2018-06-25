<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Manager
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <?= $this->session->flashdata('msg') ?>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah</button><hr>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
                                                <th>Jawaban</th>                                 
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($kuisioner as $row): ?>
                                            <tr>
                                            	<?php explode(',', $row->jawaban); var_dump($r) ?>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->pertanyaan ?></td>
                                                <td>
                                                	<select name="jawaban">
                                                		<?php for ($i=0; $i < count($row->jawaban); $i++) { ?> 
                                                			<option value="<?= $row->jawaban[$i] ?>">
                                                				<?= $row->jawaban[$i] ?>
                                                			</option>
                                                		<?php } ?>
                                                	</select>
                                                </td> 
                                                <td align="center">
                                                <a href="<?= base_url( 'admin/data_kuisioner/delete/'.$row->id )?>" class="btn btn-xs" >Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                    
                                    <?= form_open( 'admin/tambah_siswa' ) ?>
                                        <input type="text" name="nisn">
                                        <input type="text" name="nama">
                                        <input type="radio" name="jenis_kelamin" value="L">Laki-Laki
                                        <input type="radio" name="jenis_kelamin" value="P">Perempuan
                                        <input type="date" name="tanggal_lahir">
                                        <input type="submit" name="submit" value="simpan">
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