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
                                    Tambah data
                                    <?= form_open( 'admin/tambah_siswa', [ 'class' => 'form-inline'] ) ?>
                                        <div class="form-group">
                                            <input type="text" name="nisn" placeholder="nisn" class="form-control">    
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nama" placeholder="nama" class="form-control">    
                                        </div>
                                        <div class="form-group">
                                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="L">Laki-Laki</label>    
                                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="P">Perempuan</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="tanggal_lahir" placeholder="tanggal_lahir" class="form-control">    
                                        </div>    
                                        <input type="submit" name="submit" value="simpan" class="btn btn-primary">
                                    <?= form_close() ?> <br>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>                                        
                                                <th>Detail</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($siswa as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->nisn ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->jenis_kelamin ?></td>
                                                <td><?= $row->tanggal_lahir ?></td>                                                
                                                <td align="center">
                                                <a href="<?= base_url( 'admin/detail_siswa/'.$row->nisn )?>" class="btn btn-xs" >Detail Siswa</a>
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