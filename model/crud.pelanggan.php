<?php include "model.pelanggan.php"; ?>

<div class="">
    <fieldset>
        <legend> Registrasi Pelanggan</legend>

        <form method="post" accept="#" novalidate="novalidate" id="vForm">
            <div class="row">
                <div class="col-sm-4">                    
                    <div class="form-group input-group">
                        <label> Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="input-sm form-control" value="<?= $value_nama ?>">
                    </div>
                    <div class="form-group input-group">
                        <label> No. Telp/Hp</label>
                        <input type="text" name="notelp" class="input-sm form-control" value="<?= $value_telp ?>">
                    </div>
                    <div class="form-group input-group">
                        <label> Alamat</label>
                        <div class="form-inline">				
                            <div class="form-group">
                                <input type="hidden" name="area" value="1" />                                
                            </div>
                            <div class="form-group">
                                <select name="blok" class="input-sm form-control">
                                    <option value="">-Blok-</option>
                                    <?= $dataPelanggan->blok($value_blok) ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="kav" class="input-sm form-control" placeholder="Kavling" value="<?= $value_kav ?>">
                            </div>											
                        </div>                        
                    </div>
                    <div class="form-group input-group">
                        <label> Tipe Rumah</label>
                        <input type="text" name="tipe" class="input-sm form-control" value="<?= $value_tipe ?>">
                    </div>
                    <div class="form-group input-group">
                        <label> Kelas / Golongan</label>
                        <select name="golKelas" class="input-sm form-control">
                            <option value="">-Kelas/Golongan-</option>
                            <?= $dataPelanggan->kelasGol($value_kelasGol) ?>
                        </select>                                                
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group input-group">
                        <label> Jumlah Penghuni</label>
                        <input type="text" name="penghuni" class="input-sm form-control" value="<?= $value_penghuni ?>">
                    </div>
                    <div class="form-group input-group">
                        <label> Tanggal Pemasang WM</label>
                        <input type="text" name="tglpasang" class="input-sm form-control date" value="<?= $value_tglpasang ?>">
                    </div>
                    <div class="form-group input-group">
                        <label> No. Seri WM</label>
                        <input type="text" name="nowm" class="input-sm form-control" value="<?= $value_nowm ?>">
                    </div>
                    <div class="form-group input-group">
                        <label> Status Pelanggan</label>
                        <select name="status" class="input-sm form-control">
                            <option value="1" <?= $value_status == 1 ? "selected=\"selected\"" : "" ?>> Aktif </option>
                            <option value="0" <?= $value_status == 0 ? "selected=\"selected\"" : "" ?>> Tidak Aktif </option>
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <label> Catatan</label>
                        <textarea name="catatan" class="form-control" rows="4" cols="35"><?= $value_catatan ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?= $userUI->getUiBtn($name, $value_submit, $value_cancel, $page_before) ?>
            </div>
        </form>
    </fieldset>		
</div>
