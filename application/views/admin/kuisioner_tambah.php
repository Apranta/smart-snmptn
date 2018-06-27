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
                                <?= form_open('admin/tambah_kuisioner/') ?>
                                
                                <div class="form-group">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <textarea name="pertanyaan" class="form-control" required></textarea>
                                </div>

                                <div id="jawaban-container">
                                    <label for="jawaban">Jawaban <button type="button" id="tambah-pertanyaan-button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control" name="jawaban[]" type="text" placeholder="Jawaban 1" required>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>

                                <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
                                <?= form_close() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $( document ).ready(function() {

                var idx = 1;
                
                    $( '#tambah-pertanyaan-button' ).on('click', function() {
                        if (idx < 4) {
                        $( '#jawaban-container' ).append('<div class="row">' +
                            '<div class="col-md-4">' +
                                '<div class="form-group">' +
                                    '<input class="form-control" name="jawaban[]" type="text" placeholder="Jawaban ' + ++idx + '" required>' +
                                '</div>' +
                            '</div>' +
                        '</div>');
                        }
                    });

                

            });
        </script>