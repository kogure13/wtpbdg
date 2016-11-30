<?php include "model.trans.nonrekair.php"; ?>

<div class="">
    <fieldset>
        <legend> Input Tagihan Rekening Non-Air</legend>
        
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
                            <div class="form-group">
                                <select name="rekening" class="input-sm form-control" id="rekening">
                                    <option value="" selected="selected">-Jenis Rekening-</option>   
                                    <option value="Biaya SR"> Biaya SR </option>
                                    <option value="WM Hilang"> WM Hilang </option>
                                </select>
                            </div>                                                
                    </div>
                    <div class="form-group input-group">
                        <label> Jumlah Tagihan</label>
                        <input type="text" name="jum_tagihan" class="input-sm form-control" id="jum_tagihan">
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
