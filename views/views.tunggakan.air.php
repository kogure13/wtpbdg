<?php include 'model/model.tunggakan.air.php'; ?>

<fieldset>
    <legend> Daftar Tunggakan Rek. Air</legend>
    <form method="post">        
        <div class="form-group form-inline">
            <div class="form-group input-group">
                <select name="bulan" class="input-sm form-control">
                    <option value=""> Bulan</option>
                    <?=  getBulan()?>
                </select>
            </div>
            <div class="form-group input-group">
                <select name="tahun" class="input-sm form-control">
                    <option value=""> Tahun</option>
                    <?=  getTahun()?>
                </select>
            </div>
            <div class="form-group input-group">
                <input type="submit" name="proses_tunggakan" class="btn btn-sm btn-primary" value="Proses">
            </div>
        </div>
    </form>
    
    <table id="dataTunggakanAir" style="display:none"></table>    
</fieldset>
