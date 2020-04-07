<div class="card card-outline card-primary">
    <div class="card-header"
        <?php foreach ($data['matapelajaran'] as $d) : ?>
        <h3 class="card-title"><?=$d['pelajaran']?></h3>
        <?php endforeach;?>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="col-md-12">
            <?php $no=0; foreach ($data['soal'] as $d) : $no++;?>
            <div class="card">
                <form action="<?=BASEURL?>admin/arsip_upload_pict" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <h5 class="clearfix soal-pertanyaan"><span class="soal-nomor"><?=$no?></span><?=$d['pertanyaan']?>?</h5>
                    <?php if($d['gambar']===NULL):?>
                    <div class="form-group col-md-3">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" name="elenka_idPaketSoal" value="<?=$d['idPaketSoal']?>">
                                <input type="hidden" name="elenka_idSoal" value="<?=$d['id']?>">
                                <input type="file" name="elenka_uploadgambar<?=$d['id']?>" class="custom-file-input" id="elenka_uploadGambarSoal<?=$d['id']?>" onChange="uploadGambarSoal(<?=$d['id']?>)" accept="image/*">
                                <label class="custom-file-label" for="exampleInputFile<?=$d['id']?>">Upload Gambar</label>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-md-12 clearfix">
                        <img src="<?=BASEURL?>img/soal_gambar/<?=$d['gambar']?>" alt="gambar-<?=$d['gambar']?>" class="img-thumbnail" style="max-height:250px">
                    </div>
                    <?php endif;?>
                    <div class="soal-jawaban">
                        <span class="clearfix <?=$d['kunciJawaban']==='a' ? 'text-bold text-success' : ''; ?>">a. <?=$d['a']?></span>
                        <span class="clearfix <?=$d['kunciJawaban']==='b' ? 'text-bold text-success' : ''; ?>">b. <?=$d['b']?></span>
                        <span class="clearfix <?=$d['kunciJawaban']==='c' ? 'text-bold text-success' : ''; ?>">c. <?=$d['c']?></span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary d-none" id="elenka_btn_gambar_soal<?=$d['id']?>">Simpan</button>
                </div>
                </form>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>