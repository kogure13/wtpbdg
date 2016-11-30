<?php include "model.abodemen.php"; ?>

<div class="">
    <fieldset>
        <legend> Setting Abodemen</legend>

        <form method="post" accept="#" novalidate="novalidate" id="vForm">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group input-group">
                        <label> Nama Kelas</label>
                        <input type="text" name="namakelas" class="input-sm form-control" value="<?= $value_namakelas ?>">
                    </div>
                    <div class="form-group">
                        <label> Golongan / Kelas</label>
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" name="golongan" class="input-sm form-control" value="<?= $value_golongan ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="kelas" class="input-sm form-control" value="<?= $value_kelas ?>">
                            </div>                    
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <label> Biaya SR</label>
                        <input type="text" name="biayasr" class="input-sm form-control" value="<?= $value_biayasr ?>">
                    </div>            
                    <div class="form-group input-group">
                        <label> Meter Hilang</label>
                        <input type="text" name="mtrhilang" class="input-sm form-control" value="<?= $value_mtrhilang ?>">
                    </div>            
                    <div class="form-group input-group">
                        <label> Meter Rusak</label>
                        <input type="text" name="mtrrusak" class="input-sm form-control" value="<?= $value_mtrrusak ?>">
                    </div>            
                    <div class="form-group input-group">
                        <label> Jumlah Abodemen</label>
                        <input type="text" name="abodemen" class="input-sm form-control" value="<?= $value_abodemen ?>">
                    </div>            
                </div>
                <div class="col-sm-5">
                    <table class="table table-bordered table-condensed table-condensed">
                        <tr>
                            <td colspan="4" align="center"> Pemakaian</td>                            
                        </tr>
                        <tr>
                            <td> Pakai 1</td>
                            <td> Pakai 2</td>
                            <td> Pakai 3</td>
                            <td> Pakai 4</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="pakai1" value="<?=$value_pakai1?>" size="5"></td>
                            <td><input type="text" name="pakai2" value="<?=$value_pakai2?>" size="5"></td>
                            <td><input type="text" name="pakai3" value="<?=$value_pakai3?>" size="5"></td>
                            <td><input type="text" name="pakai4" value="<?=$value_pakai4?>" size="5"></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"> Kubik</td>                            
                        </tr>
                        <tr>
                            <td> Kubik 1</td><td> Kubik 2</td><td> Kubik 3</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="kubik1" value="<?=$value_kubik1?>" size="5"></td>
                            <td><input type="text" name="kubik2" value="<?=$value_kubik2?>" size="5"></td>
                            <td><input type="text" name="kubik3" value="<?=$value_kubik3?>" size="5"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"> Besar Denda & Jatuh Tempo</td>                            
                        </tr>
                        <tr>
                            <td colspan="2"> Besar Denda</td>
                            <td colspan="2"> Tanggal Jatuh Tempo</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="besar_denda" value="<?=$value_besar_denda?>" size="5"></td>
                            <td colspan="2"><input type="text" name="jth_tempo" value="<?=$value_jth_tempo?>" size="5"></td>
                        </tr>
                    </table>                    
                </div>
            </div>

            <div class="form-group">
                <?= $userUI->getUiBtn($name, $value_submit, $value_cancel, $page_before) ?>
            </div>
        </form>
    </fieldset>		
</div>
