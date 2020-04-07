<div class="card col-md-5">
    <div class="card-body">
        Upload file data siswa
        <span class="text-red" >*incoming</span>
        <p class="text-red">*Hapus dan edit belum bisa</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead class="thead-light">
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th class="text-center">***</th>
            </thead>
            <tbody>
                <?php $no=0; foreach ($data as $d) :?>
                <?php if($d['idBagian']==$_SESSION['elenka_adminbagian']): $no++;?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$d['nis']?></td>
                    <td><?=$d['nama']?></td>
                    <td><?=$d['kelas']?>-<?=$d['bagian']?></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-custom-delete text-red">hapus</a>
                        |
                        <a href="#" class="btn btn-custom-delete text-lightblue">Edit</a>
                    </td>
                </tr>
                <?php elseif ($_SESSION['elenka_adminbagian']==3): $no++;?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$d['nis']?></td>
                        <td><?=$d['nama']?></td>
                        <td><?=$d['kelas']?> - <?=$d['bagian']?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-custom-delete text-red">hapus</a>
                            |
                            <a href="#" class="btn btn-custom-delete text-lightblue">Edit</a>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>