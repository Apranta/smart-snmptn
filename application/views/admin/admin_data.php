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
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah</button><hr>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>                                        
                                                <th>Action</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($admin as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->username ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->jabatan ?></td>                                                
                                                <td align="center">
                                                <a href="<?= base_url('admin/edit_admin/'. $row->username) ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="<?= base_url('admin/data_admin/delete/'.$row->username) ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
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
            <h4 class="modal-title">Tambah Data Admin</h4>
          </div>
          <div class="modal-body">
            
            <div class="form-group label-floating">
                <label class="control-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Password</label>
                <input type="text" name="password" class="form-control" required>
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required>
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Alamat</label>
                <textarea name="alamat" class="form-control">
                    
                </textarea>
            </div>
            
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-info" name="submit" value="Tambah Data">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        <?= form_close(); ?>
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