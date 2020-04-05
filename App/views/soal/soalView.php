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
                <div class="card-body">
                    <h5 class="clearfix soal-pertanyaan"><span class="soal-nomor"><?=$no?></span><?=$d['pertanyaan']?>?</h5>
                    <div class="soal-jawaban">
                        <span class="clearfix <?=$d['kunciJawaban']==='a' ? 'text-bold text-success' : ''; ?>">a. <?=$d['a']?></span>
                        <span class="clearfix <?=$d['kunciJawaban']==='b' ? 'text-bold text-success' : ''; ?>">b. <?=$d['b']?></span>
                        <span class="clearfix <?=$d['kunciJawaban']==='c' ? 'text-bold text-success' : ''; ?>">c. <?=$d['c']?></span>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->