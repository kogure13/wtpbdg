<?php require 'model/model.pelanggan.php'; ?>

<div class="content">
    <div class="main-header">
        <h2>Data Pelanggan</h2>
        <em></em>
    </div>
    <div class="main-content">                    
        <div class="form-group form-inline">            
            <div class="form-group" <?= $display ?>>
                <a href="?page=crud&act=<?= $act ?>" class="btn btn-sm btn-primary" id="tambah-pelanggan">Tambah Pelanggan</a>    
            </div>
            <div class="form-group">                
                <form method="post" class="form-inline" enctype="multipart/form-data" novalidate="novalidate" id="vForm" accept="#" >
                    <div class="form-group input-group">
                        <select name="status" class="input-sm form-control" onchange="this.form.submit()">                            
                            <option value="3" <?= $status == 3 ? 'selected="selected"' : '' ?>> Status Pelanggang</option>
                            <option value="1" <?= $status == 1 ? 'selected="selected"' : '' ?>> Aktif</option>
                            <option value="2" <?= $status == 2 ? 'selected="selected"' : '' ?>> Pemutusan</option>
                            <option value="0" <?= $status == 0 ? 'selected="selected"' : '' ?>> Non-Aktif</option>                        
                        </select>
                    </div>                    
                </form>
            </div>                    
        </div>    
        <table id="tblPelanggan" style="display:none"></table>
    </div>
</div>
