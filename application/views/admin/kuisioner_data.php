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
                                    <a class="btn btn-primary" href="<?= base_url('admin/tambah_kuisioner') ?>"><i class="fa fa-plus"></i> Tambah</a><hr>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
                                                <th>jawaban</th>
                                                                                        
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($kuisioner as $row): ?>
                                            
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td class="col-md-6"><?= $row->pertanyaan ?></td>
                                                <td>
                                                
                                                <?php
                                                    $jawab = json_decode($row->jawaban);
                                                    foreach ($jawab as $key) {
                                                        echo $key.'/ ';
                                                    }
                                                ?>
                                                </td>
                                                                                            
                                                <td align="center" class="col-md-1">
                                                <a href="<?= base_url('admin/data_kuisioner/delete/'.$row->id) ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button>
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
            </script>