<?php include "model.user.php"; ?>

<fieldset>
    <legend> Registrasi User</legend>

    <form method="post" accept="#" novalidate="novalidate" id="vForm">                            
        <div class="form-group input-group">
            <label> Nama Lengksp</label>
            <input type="text" name="nama_lengkap" class="input-sm form-control" value="<?= $value_nama ?>">
        </div>
        <div class="form-group input-group">
            <label> Jabatan</label>
            <select name="jobtitle" class="input-sm form-control">
                <option value="Administrasi" <?= $value_jobtitle == "Administrasi" ? "selected=\"selected\"" : "" ?>> Administrasi</option>
                <option value="Kasir" <?= $value_jobtitle == "Kasir" ? "selected=\"selected\"" : "" ?>> Kasir</option>
                <option value="Operator Lapangan" <?= $value_jobtitle == "Operator Lapangan" ? "selected=\"selected\"" : "" ?>> Operator Lapangan</option>
            </select>
        </div>
        <div class="form-group input-group">
            <label> No. Telp/Hp</label>
            <input type="text" name="phone" class="input-sm form-control" value="<?= $value_phone ?>">
        </div>
        <div class="form-group input-group">
            <label> Email</label>                                        
            <input type="text" name="email" class="input-sm form-control" value="<?= $value_email ?>" />                                

        </div>            
        <div class="form-group input-group">
            <label> Password</label>
            <input type="text" name="password" class="input-sm form-control" value="<?= $value_password ?>">
        </div>           
        <div class="form-group input-group">
            <label> Role User</label>
            <select name="role" class="input-sm form-control">
                <option value="1" <?= $value_role == 1 ? "selected=\"selected\"" : "" ?>> Admin </option>
                <option value="2" <?= $value_role == 2 ? "selected=\"selected\"" : "" ?>> Operator </option>
                <option value="2" <?= $value_role == 3 ? "selected=\"selected\"" : "" ?>> Manajer </option>
            </select>
        </div>            

        <div class="form-group">
            <?= $userUI->getUiBtn($name, $value_submit, $value_cancel, $page_before) ?>
        </div>
    </form>
</fieldset>
