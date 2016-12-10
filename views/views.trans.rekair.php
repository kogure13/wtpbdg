<?php include_once "model/model.trans.rekair.php"; ?>

<div class="content">
    <div class="main-header">
        <h2>Transaksi Tagihan Rekening Air</h2>
        <em></em>
    </div>
    <div class="main-content">
        <?php if ($_SESSION['jobtitle'] == "Kasir") { ?>
            <form method="post" accept="#" novalidate="novalidate" id="vForm">
                <div <?= isset($_POST['cari_transaksi']) ? 'style="display: none;"' : "" ?> >
                    <div class="form-group row">
                        <label for="namaLoket" class="col-sm-2 col-form-label">Loket Pembayaran</label>
                        <div class="col-sm-4">
                            <input type="text" class="input-sm form-control" readonly="readonly" value="<?= $dtaLoket->getLoket() ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglBayar" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                        <div class="col-sm-4">
                            <input type="hidden" name="bulan" value="<?= date("Y-m-d") ?>" >
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
                        <label for="idPelanggan" class="col-sm-2 col-form-label">ID. Pelanggan</label>
                        <div class="col-sm-4">
                            <input type="hidden" name="id_pel" id="id_pel">
                            <input type="text" name="alamat" class="input-sm form-control" placeholder="ID Pelanggan" id="alamat">
                        </div>        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <?php if (isset($_POST['cari_transaksi'])) { ?>
                            <input type="submit" name="simpan_transaksi" class="btn btn-sm" value="Simpan">                
                        <?php } else { ?>
                            <input type="submit" name="cari_transaksi" class="btn btn-sm" value="Cari">                
                        <?php } ?>
                        <input type="button" class="btn btn-sm btn-danger" value="Batal Transaksi" onclick="location.href = '<?= $page_before ?>'">                
                        <a href="?page=cetak_invoice_rekAir&hash_code=<?=$hash_code?>" target="_blank" class="btn btn-sm btn-default" <?= $userUI->getTooltips("bottom", "Cetak Transaksi") ?> style="<?= $value_print ?>" >
                            <i class="glyphicon glyphicon-print"></i>
                        </a>
                    </div>
                </div>              
            </form>

            <hr class="thin bg-grayLighter" />
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail Transaksi - Pembayaran Tanggal <?= isset($_POST['cari_transaksi']) ? $_POST['bulan'] : date("d-m-Y") ?>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_POST['cari_transaksi'])) {
                        include_once 'views.detail.trans.rekair.php';
                    }
                    ?>
                    <p>
                        &nbsp; Catatan :
                    </p>
                </div>
            </div>
        <?php } else { ?>
            <div class="form-group">
                <form method="post" accept="#" novalidate="novalidate" id="vForm" class="form-inline">
                    <div class="form-group input-group">                                
                        <input type="hidden" name="id_pel" id="id_pel">
                        <input type="text" name="alamat" class="input-sm form-control" placeholder="Data Pelanggan" id="alamat">                
                    </div>           
                    <div class="form-group">
                        <input type="submit" name="proses_admin" class="btn btn-sm btn-primary" value="Proses">
                    </div>
                </form>
            </div>
            <table id="dataTransAir" style="display:none"></table>
        <?php } ?>    
    </div>
</div>
