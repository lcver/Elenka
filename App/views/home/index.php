<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <table class="table-bordered">
            <?php foreach ($data as $d) : ?>
                <tr>
                    <td class="p-2 pl-3 pr-3"><?=$d['pelajaran']?></td>
                    <td class="p-2 pl-3 pr-3"><?=$d['kelas']?>-<?=$d['bagian']?></td>
                    <td class="p-2 pl-3 pr-3">
                        <button class="btn btn-primary p-1" onclick="window.location.href='<?=BASEURL?>soal/<?=$d['id']?>'">mulai</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>