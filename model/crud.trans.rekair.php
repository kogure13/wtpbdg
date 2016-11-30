<?php include "model.trans.rekair.php"; ?>

<div class="">
    <fieldset>
        <legend> Input Tagihan Rekening Air</legend>
        
        <form method="post" accept="#" novalidate="novalidate" id="vForm">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group input-group">
                        <label> Alamat</label>
                        <input type="hidden" name="id_pel" id="id_pel">
                        <input type="text" name="alamat" class="input-sm form-control" id="alamat">
                    </div>
                    <div class="form-group input-group">
                        <label> Nama Pelanggan</label>
                        <input type="text" name="pelanggan" class="input-sm form-control" readonly="readonly" id="pelanggan">
                    </div>
                    <div class="form-group input-group">
                        <label> Rekening</label>
                        <div class="form-inline">                                           
                            <div class="form-group">
                                <select name="bulan" class="input-sm form-control" id="bulan">
                                    <option value="" selected="selected">-Bulan-</option>   
                                    <?=getBulan();?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tahun" class="input-sm form-control" placeholder="Kavling" value="<?=date("Y")?>" id="tahun">
                            </div>                                          
                        </div>                        
                    </div>
                    <div class="form-group input-group">
                        <label> Meter Awal</label>
                        <input type="text" name="meter_awal" class="input-sm form-control" readonly="readonly" id="meter_awal">
                    </div>
                    <div class="form-group input-group">
                        <label> Meter Akhir</label>
                        <input type="text" name="meter_akhir" class="input-sm form-control" id="meter-akhit">
                    </div>        
                    <div class="form-group input-group">
                        <label> Denda</label>
                        <input type="text" name="denda" class="input-sm form-control">
                    </div>
                </div>
                <div class="col-md-5">
                    Detail Transaksi <br />
                    Nama Operator : <input type="hidden" name="nama_operator" value=""> <br />
                    Tanggal Transaksi : <input type="hidden" name="tgl_tagihan" value=""> <br />
                </div>
            </div>
                                   
            <div class="form-group">
                <?=$userUI->getUiBtn($name, $value_submit, $value_cancel, $page_before)?>
            </div>
        </form>
    </fieldset>		
</div>
