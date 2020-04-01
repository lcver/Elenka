<?php
    foreach ($data as $d) {
        if(!is_null($d['ppkn']))
            $ppkn=1;
        if(!is_null($d['bindo']))
            $bindo=1;
        if(!is_null($d['matematika']))
            $matematika=1;
        if(!is_null($d['sbdp']))
            $sbdp=1;
        if(!is_null($d['pjok']))
            $pjok=1;
    }
?>
<div class="card overflow-auto ">
    <div class="card-body">
        <table class="table table-striped">
            <thead class=" thead-light">
                <tr>
                    <th style="width:15px;" >No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <?php if(isset($ppkn)): ?>
                        <th>PPKN</th>
                    <?php endif; ?>
                    <?php if(isset($bindo)): ?>
                        <th>B.Indonesia</th>
                    <?php endif; ?>
                    <?php if(isset($matematika)): ?>
                        <th>Matematika</th>
                    <?php endif; ?>
                    <?php if(isset($sbdp)): ?>
                        <th>SBDP</th>
                    <?php endif; ?>
                    <?php if(isset($pjok)): ?>
                        <th>PJOK</th>
                    <?php endif; ?>
                <tr>
            </thead>
            <tbody>
            <?php //var_dump($data) ?>
                <?php $no=0; foreach ($data as $d) : $no++; ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$d['nama']?></td>
                        
                        <td><?=$d['kelas'].' - '.$d['bagian']?></td>
                        <?php if(isset($ppkn)): ?>
                            <td><?=$d['ppkn']?></td>
                        <?php endif; ?>
                        <?php if(isset($bindo)): ?>
                            <td><?=$d['bindo']?></td>
                        <?php endif; ?>
                        <?php if(isset($matematika)): ?>
                            <td><?=$d['matematika']?></td>
                        <?php endif; ?>
                        <?php if(isset($sbdp)): ?>
                            <td><?=$d['sbdp']?></td>
                        <?php endif; ?>
                        <?php if(isset($pjok)): ?>
                            <td><?=$d['pjok']?></td>
                        <?php endif; ?>
                        
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>