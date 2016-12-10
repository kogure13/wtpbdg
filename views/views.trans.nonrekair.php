<?php include_once "model/model.trans.nonrekair.php"; ?>

<div class="content">
    <div class="main-header">
        <h2>Transaksi Rekening Non-Air</h2>
        <em></em>
    </div>
    <div class="main-content">
        <form method="post" accept="#" novalidate="novalidate" id="vForm">
            <div class="form-group row">
                <label for="namaLoket" class="col-sm-2 col-form-label">Loket Pembayaran</label>
                <div class="col-sm-4">
                    <input type="text" class="input-sm form-control" disabled="disabled" value="<?= $dtaLoket->getLoket() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tglBayar" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                <div class="col-sm-4">
                    <input type="text" name="bulan" class="input-sm form-control nowDate" placeholder="Tanggal Pembayaran" disabled="disabled">
                </div>
            </div>
            <div class="form-group row">
                <label for="infoTarif" class="col-sm-2 col-form-label"> Info Tarif</label>
                <div class="col-sm-4">
                    <select name="infoTarif" class="input-sm form-control" id="idInfoTarif">
                        <option value=""> -Info Tarif-</option>
                        <?= getInfoTarif() ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat/ID Pelanggan</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_pel" id="id_pel">
                    <input type="text" name="alamat" class="input-sm form-control" id="alamat">
                </div>
            </div>
            <div class="form-group row">
                <label for="rekening" class="col-sm-2 col-form-label">Rekening</label>
                <div class="col-sm-4">
                    <select name="rekening" class="input-sm form-control" id="idRekening">
                        <option value="">-Jenis Rekening-</option>   
                        <option value="Biaya SR"> Biaya SR</option>
                        <option value="WM Hilang"> WM Hilang</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="caraBayar" class="col-sm-2 col-form-label"> Cara Bayar</label>
                <div class="col-sm-4">
                    <label class="radio-inline">
                        <input type="radio" name="caraBayar" value="Cash" id="cash"> Cash
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="caraBayar" value="Anggunan" id="anggunan"> Anggunan
                    </label>                    

                    <div class="bayarCash form-group" style="margin-top: 5px;">
                        <input type="text" class="input-sm form-control"  readonly="readonly" id="nominalBayarCash">
                    </div>
                    <div class="bayarAnggunan form-group" style="margin-top: 5px;">
                        <select name="jangkaBayar" class="input-sm form-control inputBayarAnggunan" id="jangkaBayar">
                            <option value="0"> Tenor/Jangka Waktu</option>
                            <option value="6"> 6x</option>
                            <option value="8"> 8x</option>
                            <option value="12"> 12x</option>
                            <option value="15"> 15x</option>
                            <option value="24"> 24x</option>
                        </select>
                    </div>
                    <div class="bayarAnggunan form-group">
                        <input type="text" class="input-sm form-control inputBayarAnggunan" readonly="readonly" id="nominalBayarAnggunan">
                    </div>
                </div>
            </div>                
            <div class="form-group row">
                <div class="col-sm-4">
                    <input type="submit" name="simpan_transaksi" class="btn btn-sm btn-success" value="Simpan">                
                    <input type="button" class="btn btn-sm btn-danger" value="Batal Transaksi" onclick="location.href = '<?= $page_before ?>'">                
                </div>
            </div>      
        </form>
    </div>
</div>
