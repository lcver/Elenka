<div class="pt-4">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 mt-2">
                                <?=Flasher::get();?>
                            </div>

                            <form action="<?=BASEURL?>Admin/arsip_upload" method="post" enctype="multipart/form-data">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Pilih Matapelajaran</label>
                                    <select name="elenka_mapel" class="form-control">
                                        <option value="_BLANK_">-- Pilih Matapelajaran --</option>
                                        <?php foreach ($data['mapel'] as $d) : ?>
                                            <option value="<?=$d['id']?>"><?=$d['pelajaran']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="elenka_uploadFileSoal">File Upload</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="formfile_elenka_uploadsoal" class="custom-file-input" id="elenka_uploadFileSoal">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-3">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card bg-transparent shadow-none">
                        <div class="card-header">
                            <h1 class=" card-title">Daftar soal - soal</h1>
                        </div>
                        <div class="card-body">
                            <!-- <div class="row"> -->
                                <?php if(isset($data['paketsoal'])):?>
                                <?php foreach ($data['paketsoal'] as $d) : ?>
                                <div class="col-md-12">
                                    <div class="info-box">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="elenka_soalaktif" class="custom-control-input" id="customCheckbox<?=$d['id']?>" checked>
                                        <label for="customCheckbox<?=$d['id']?>" class="custom-control-label"></label>
                                    </div>
                                        <div class="info-box-content">
                                            <a href="#" class="elenkaSoalView" data-target-id="<?=$d['id']?>">
                                                <span class="text-lg"><?=$d['pelajaran']?></span>
                                            </a>
                                        </div>
                                        <!-- /.info-box-content -->
                                        <div class="info-box-more">
                                            <a class="btn btn-custom-delete text-muted elenkaDeleteButton" data-target-id="<?=$d['id']?>">
                                                <!-- <i class="fas fa-minus-circle"></i> -->
                                                hapus
                                            </a>
                                            <!-- <button class="btn btn-danger elenkaDeleteButton" data-target-id="<?php//$d['id']?>">
                                            </button> -->
                                        </div>
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="text-lg">Belum ada paket soal terupload</span>
                                <?php endif; ?>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col -->
        <div class="col-md-12 mb-5">
            <div id="soalview"></div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.pt -->