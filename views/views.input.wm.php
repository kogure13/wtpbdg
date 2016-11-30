<?php include 'model/model.input.wm.php'; ?>

<fieldset style="<?= $inputDate ?>">
    <legend> Data Water Meter</legend>
    <?php if ($_SESSION['jobtitle'] == "Operator Lapangan") { ?>
        <form method="post" accept="#" novalidate="novalidate" id="vForm">
            <div class="form-group row">            
                <label for="namaOperator" class="col-sm-2 col-form-label"> Nama Operator</label>
                <div class="col-sm-4">               
                    <input type="hidden" name="id_operator" id="id_operator" value="<?= $_SESSION['id'] ?>">
                    <input type="text" name="operator" class="input-sm form-control" id="operator" disabled="disabled" value="<?= $_SESSION['nama_lengkap'] ?>">
                </div>                            
            </div>
            <div class="form-group row">            
                <label for="wktInput" class="col-sm-2 col-form-label"> Tanggal Input</label>
                <div class="col-sm-4"> 
                    <input type="hidden" name="jamInput" value="<?= date("H:i:s") ?>">
                    <input type="hidden" name="bulan" value="<?= date("Y-m-d") ?>" >
                    <input type="text" name="tglInput" class="input-sm form-control nowDate" disabled="disable">
                </div>                            
            </div>
            <div class="form-group row">            
                <label for="namaPelanggan" class="col-sm-2 col-form-label"> Nama Pelanggan</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_pel" id="id_pel">
                    <input type="text" name="alamat" class="input-sm form-control" id="alamat">
                </div>                            
            </div>
            <hr />
            <div class="form-group row">            
                <label for="meterSekarang" class="col-sm-2 col-form-label"> Meter Sekarang</label>
                <div class="col-sm-4">                
                    <input type="text" name="meterSekarang" class="input-sm form-control" id="meterSekarang">
                </div>                            
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <input type="submit" name="inputMeter" class="btn btn-sm" value="Simpan">                                
                </div>
            </div>      
        </form>
    <?php } elseif ($_SESSION['jobtitle'] == "Administrasi") { ?>
        <div class="form-group">                
            <form method="post" class="form-inline" enctype="multipart/form-data" novalidate="novalidate" id="vForm" accept="#" >
                <div class="form-group input-group">
                    <select name="bulan" class="input-sm form-control" id="bulan">
                        <option value=""> Bulan</option>                    
                        <?= getBulan() ?>
                    </select>
                </div>
                <div class="form-group input-group">
                    <select name="tahun" class="input-sm form-control" id="tahun">
                        <option value=""> Tahun</option>                    
                        <?= getTahun() ?>
                    </select>
                </div>     
                <div class="form-group input-group">
                    <input type="submit" name="filter" class="btn btn-sm btn-primary" value="Cari">
                </div>
            </form>
        </div>
    <!--
        <div id="dataWM">
            <div class="se-pre-con">
                Please wait... Loading data <br>
                <img src="ajax-loader.gif" border="0" />
            </div>
        </div>
    -->
    <table id="dataWM" style="display:none"></table>
    <?php } ?>    
</fieldset>