<script type="text/javascript">
    $(function () {
        $("#vForm").validate({
            rules: {
                namaArea: "required",
                SKArea: "required",
                namaPerusahaan: "required",
                alamat: "required",
                kota: "required",
                provinsi: "required",
                notlp: "required",
                nofax: "required",
                email: "required",
                kodePos: "required"
            },
            messages: {
                namaArea: " *) Harud Diisi",
                SKArea: " *) Harud Diisi",
                namaPerusahaan: " *) Harud Diisi",
                alamat: " *) Harud Diisi",
                kota: " *) Harud Diisi",
                provinsi: " *) Harud Diisi",
                notlp: " *) Harud Diisi",
                nofax: " *) Harud Diisi",
                email: " *) Harud Diisi",
                kodePos: " *) Harud Diisi"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>

<?php
$userUI = new User;
$dtaprofile = new Profile;
$dtaCRUD = new CRUD;
$tableName = "wtp_area";

$id_profile = 1;
$page_before = "?page=views.profile";

$nama_area = $dtaprofile->readProfile("areaname", $id_profile);
$sk_area = $dtaprofile->readProfile("skarea", $id_profile);
$companyname = $dtaprofile->readProfile("companyname", $id_profile);
$alamat = $dtaprofile->readProfile("address", $id_profile);
$kota = $dtaprofile->readProfile("city", $id_profile);
$provinsi = $dtaprofile->readProfile("state", $id_profile);
$notlp = $dtaprofile->readProfile("notlp", $id_profile);
$nofax = $dtaprofile->readProfile("nofax", $id_profile);
$kodepos = $dtaprofile->readProfile("zipcode", $id_profile);
$email = $dtaprofile->readProfile("email", $id_profile);

if (isset($_POST['update_profile'])) {
    $data = array(
        'id' => $id_profile,
        'areaname' => $_POST['namaArea'],
        'skarea' => $_POST['SKArea'],
        'companyname' => $_POST['namaPerusahaan'],
        'address' => $_POST['alamat'],
        'city' => $_POST['kota'],
        'state' => $_POST['provinsi'],
        'notlp' => $_POST['notlp'],
        'nofax' => $_POST['nofax'],
        'email' => $_POST['email'],
        'zipcode' => $_POST['kodePos']
    );

    $dataUpdate = "areaname = '" . $data['areaname'] . "', skarea = '" . $data['skarea'] . "', "
            . "companyname = '" . $data['companyname'] . "', address = '" . $data['address'] . "', "
            . "city = '" . $data['city'] . "', state = '" . $data['state'] . "', notlp = '" . $data['notlp'] . "', "
            . "nofax = '" . $data['nofax'] . "', email = '" . $data['email'] . "', zipcode = '" . $data['zipcode'] . "'";

    $validasi = $dtaCRUD->updateData($dataUpdate, $tableName, $id_profile);
    if ($validasi) {
        $userUI->updateSuccess($page_before);
    } else {
        $userUI->updateFailure();
    }
}