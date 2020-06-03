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
        if(!is_null($d['ipa']))
            $ipa=1;
        if(!is_null($d['ips']))
            $ips=1;
    }
?>
<div class="card overflow-auto ">
    <div class="card-body">
        <div class="menu text-right">
            <button class="btn btn-custom-delete text-blue">
                <i class="fas fa-sync-alt"></i>
            </button>
            <button class="btn btn-custom-delete text-red">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
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
                <?php $no=0; foreach ($data as $d) : ?>
                <?php if($d['idBagian']==$_SESSION['elenka_adminbagian']): $no++;?>
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
                        <?php if(isset($ipa)): ?>
                            <td><?=$d['ipa']?></td>
                        <?php endif; ?>
                        <?php if(isset($ips)): ?>
                            <td><?=$d['ips']?></td>
                        <?php endif; ?>
                    </tr>
                <?php elseif ($_SESSION['elenka_adminbagian']==3): $no++;?>
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
                        <?php if(isset($ipa)): ?>
                            <td><?=$d['ipa']?></td>
                        <?php endif; ?>
                        <?php if(isset($ips)): ?>
                            <td><?=$d['ips']?></td>
                        <?php endif; ?>
                    </tr>
                <?php endif;?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>