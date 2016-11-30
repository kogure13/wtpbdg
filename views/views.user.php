<?php include_once "model/model.user.php"; ?>

<div class="panel panel-body">        
    <fieldset>
        <legend> Data User</legend>
        <div class="form-inline">
            <div class="form-group">
                <a href="?page=crud&act=<?=$act?>" class="btn btn-sm btn-primary" id="tambah-user">Tambah User</a>    
            </div>            
        </div>    
        <hr class="thin bg-grayLighter" />
        <table class="table table-condensed table-bordered table-striped tbl-scroll" id="table-pelanggan">
            <thead>
                <tr>
                    <th width="75px"> Opsi</th><th width="30px"> #</th>
                    <th width="100px"> ID. User</th><th> User Login</th>
                    <th> Title</th><th> Role User</th>
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
                                <?=$userUI->actBtn($data['id'], $act, $akses)?>
                            </td>
                            <td align="right"><?=$i?></td>
                            <td><?=$data['nama_lengkap']?></td>  
                            <td><?=$data['email']?></td>
                            <td><?=$data['jobtitle']?></td>
                            <td><?=$data['accessrole']== 1 ? "Administrator" : "Operator"?></td>                            
                        </tr>
                        <?php
                        $i++;
                    }
                } 
                ?>
            </tbody>
        </table>               
    </fieldset>
</div>
