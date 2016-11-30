<?php include_once "model/model.pelanggan.php"; ?>

<fieldset>
    <legend> Data Pelanggan</legend>
    <div class="form-group form-inline">            
        <div class="form-group" <?= $display ?>>
            <a href="?page=crud&act=<?= $act ?>" class="btn btn-sm btn-primary" id="tambah-pelanggan">Tambah Pelanggan</a>    
        </div>
        <div class="form-group">                
            <form method="post" class="form-inline" enctype="multipart/form-data" novalidate="novalidate" id="vForm" accept="#" >
                <div class="form-group input-group">
                    <select name="status" class="input-sm form-control" onchange="this.form.submit()">                            
                        <option value="1" <?=@$_POST['status'] == 1 ? 'selected=\"selected\"' : ''?>> Aktif</option>
                        <option value="2" <?=@$_POST['status'] == 2 ? 'selected=\"selected\"' : ''?>> Pemutusan</option>
                        <option value="0" <?=@$_POST['status'] == 0 ? 'selected=\"selected\"' : ''?>> Non-Aktif</option>                            
                    </select>
                </div>                    
            </form>
        </div>                    
    </div>    
    <table id="tblPelanggan" style="display:none"></table>
</fieldset>
