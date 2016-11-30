<?php include_once 'model/model.profile.php'; ?>

<fieldset>
    <legend> Profile <?=$companyname?></legend>
    <form method="post" accept="#" novalidate="novalidate" id="vForm">
        <div class="form-group row">
            <label for="namaArea" class="col-sm-2 col-form-label"> Nama Area</label>
            <div class="col-sm-4">
                <input type="text" name="namaArea" class="input-sm form-control" value="<?=$nama_area?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="SKArea" class="col-sm-2 col-form-label"> SK Area</label>
            <div class="col-sm-4">
                <input type="text" name="SKArea" class="input-sm form-control" value="<?=$sk_area?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="namaPerusahaan" class="col-sm-2 col-form-label"> Nama Perusahaan</label>
            <div class="col-sm-4">
                <input type="text" name="namaPerusahaan" class="input-sm form-control" value="<?=$companyname?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="Alamat" class="col-sm-2 col-form-label"> Alamat</label>
            <div class="col-sm-4">
                <textarea name="alamat" class="input-sm form-control"><?=$alamat?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="kota" class="col-sm-2 col-form-label"> Kota</label>
            <div class="col-sm-4">
                <input type="text" name="kota" class="input-sm form-control" value="<?=$kota?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="Provinsi" class="col-sm-2 col-form-label"> Provinsi</label>
            <div class="col-sm-4">
                <input type="text" name="provinsi" class="input-sm form-control" value="<?=$provinsi?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="notlp" class="col-sm-2 col-form-label"> No. Telepon</label>
            <div class="col-sm-4">
                <input type="text" name="notlp" class="input-sm form-control" value="<?=$notlp?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nofax" class="col-sm-2 col-form-label"> No. Fax</label>
            <div class="col-sm-4">
                <input type="text" name="nofax" class="input-sm form-control" value="<?=$nofax?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label"> Email</label>
            <div class="col-sm-4">
                <input type="text" name="email" class="input-sm form-control" value="<?=$email?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="kodePos" class="col-sm-2 col-form-label"> Kode Pos</label>
            <div class="col-sm-4">
                <input type="text" name="kodePos" class="input-sm form-control" value="<?=$kodepos?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <input type="submit" name="update_profile" id="update-profile" class="btn btn-sm" value="Edit Profile">                
                <input type="button" class="btn btn-sm btn-danger" value="Batal" onclick="location.href='<?=$page_before?>'">                
            </div>
        </div>      
    </form>
</fieldset>