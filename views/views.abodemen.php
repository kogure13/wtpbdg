<?php include_once "model/model.abodemen.php"; ?>

<div class="content">        
    <div class="main-header">
        <h2>Data Abodemen</h2>
    </div>
    <div class="main-content">
        <div class="form-inline">
            <div class="form-group">
                <a href="?page=crud&act=<?= $act ?>" class="btn btn-sm btn-primary" id="tambah-user">Tambah Data</a>    
            </div>            
        </div>    
        <hr class="thin bg-grayLighter" />
        <table id="featured-datatable" class="table table-sorting table-striped table-hover datatable dataTable no-footer" role="grid" aria-describedby="featured-datatable_info">
            <thead>
                <tr>
                    <th width="10%"> Opsi</th>
                    <th> Nama Kelas</th><th> Kelas/Golongan</th>
                    <th> Biaya SR</th><th> Meter Hilang</th>
                    <th> Meter Rusak</th><th> Abodemen</th>                                        
                </tr>
            </thead>
            <tbody id="dtaPel">
                <?php
                $i = 1;
                if (count($arrayData)) {
                    while ($data = mysql_fetch_array($arrayData)) {
                        ?>
                        <tr>
                            <td align="center">
                                <?= $userUI->actBtn($data['id'], $act, $akses) ?>
                                <a href="#" id="abodemen-info" class="view" data-id="<?= $data['id'] ?>">
                                    <i class="glyphicon glyphicon-info-sign"></i>                                
                                </a>                                
                            </td>                            
                            <td><?= $data['namakelas'] ?></td>
                            <td><?= $data['kelas'] ?> / <?= $data['golongan'] ?></td>                              
                            <td><?= number_format($data['biayasr']) ?></td>                            
                            <td><?= number_format($data['mtrhilang']) ?></td>
                            <td><?= number_format($data['mtrrusak']) ?></td>
                            <td><?= number_format($data['abodemen']) ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>               
    </div>    
</div>

