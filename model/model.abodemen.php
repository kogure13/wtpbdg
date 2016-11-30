<script type="text/javascript">
    $(function () {
        $("#vForm").validate({
            rules: {
                namakelas: "required",
                golongan: "required",
                kelas: "required"

            },
            messages: {
                namakelas: " *) harus diisi",
                golongan: " *) harus diisi",
                kelas: " *) harus diisi"

            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

    $(document).ready(function () {
        $("#activePeriode").click(function () {
            alert("status");
        });
    });
</script>

<?php
$userUI = new User;
$dtaAbodemen = new Rekap;
$dtaCRUD = new CRUD;

$arrayData = $dtaAbodemen->viewsTarif();
$tableName = "wtp_tarif";
$act = "crud.abodemen";
$page_before = "?page=views.abodemen";

if (isset($_GET['req'])) {
    if ($_GET['req'] == "delete") {
        $validasi = $dtaCRUD->deleteData($tableName, $_GET['id']);
        if ($validasi) {
            $userUI->deleteSuccess($page_before);
        } else {
            $userUI->deleteFailure($page_before);
        }

        exit(); //Hold Page
    } elseif ($_GET['req'] == "edit") {
        $id_tarif = $_GET['id'];
        $value_submit = "Update";
        $name = "update";
        $value_namakelas = $dtaAbodemen->readTarif("namakelas", $id_tarif);
        $value_golongan = $dtaAbodemen->readTarif("golongan", $id_tarif);
        $value_kelas = $dtaAbodemen->readTarif("kelas", $id_tarif);
        $value_biayasr = $dtaAbodemen->readTarif("biayasr", $id_tarif);
        $value_mtrhilang = $dtaAbodemen->readTarif("mtrhilang", $id_tarif);
        $value_mtrrusak = $dtaAbodemen->readTarif("mtrrusak", $id_tarif);
        $value_abodemen = $dtaAbodemen->readTarif("abodemen", $id_tarif);
        $value_pakai1 = $dtaAbodemen->readTarif("pakai1", $id_tarif);
        $value_pakai2 = $dtaAbodemen->readTarif("pakai2", $id_tarif);
        $value_pakai3 = $dtaAbodemen->readTarif("pakai3", $id_tarif);
        $value_pakai4 = $dtaAbodemen->readTarif("pakai4", $id_tarif);
        $value_kubik1 = $dtaAbodemen->readTarif("kubik1", $id_tarif);
        $value_kubik2 = $dtaAbodemen->readTarif("kubik2", $id_tarif);
        $value_kubik3 = $dtaAbodemen->readTarif("kubik3", $id_tarif);
        $value_besar_denda = $dtaAbodemen->readTarif("besar_denda", $id_tarif);
        $value_jth_tempo = $dtaAbodemen->readTarif("jth_tempo", $id_tarif);
    }
} else {
    $value_submit = "Simpan";
    $name = "save";
    $value_namakelas = "";
    $value_golongan = "";
    $value_kelas = "";
    $value_biayasr = "";
    $value_mtrhilang = "";
    $value_mtrrusak = "";
    $value_abodemen = "";
    $value_pakai1 = "";
    $value_pakai2 = "";
    $value_pakai3 = "";
    $value_pakai4 = "";
    $value_kubik1 = "";
    $value_kubik2 = "";
    $value_kubik3 = "";
    $value_besar_denda = ""; $value_jth_tempo = "";
}
$value_cancel = "Batal";
$akses = $_SESSION['accessrole'];

if (isset($_POST['save']) || isset($_POST['update'])) {

    $no = 0;
    $data = array(
        'id' => $no,
        'namakelas' => $_POST['namakelas'],
        'golongan' => $_POST['golongan'],        
        'kelas' => $_POST['kelas'],
        'biayasr' => $_POST['biayasr'],
        'mtrhilang' => $_POST['mtrhilang'],
        'mtrrusak' => $_POST['mtrrusak'],
        'abodemen' => $_POST['abodemen'],
        'pakai1' => $_POST['pakai1'],
        'pakai2' => $_POST['pakai2'],
        'pakai3' => $_POST['pakai3'],
        'pakai4' => $_POST['pakai4'],
        'kubik1' => $_POST['kubik1'],
        'kubik2' => $_POST['kubik2'],
        'kubik3' => $_POST['kubik3'],
        'besar_denda' => $_POST['besar_denda'],
        'jth_tempo' => $_POST['jth_tempo']        
    );

    if (isset($_POST['save'])) {
        $validasi = $dtaCRUD->addData($data, $tableName);

        if ($validasi) {
            $userUI->saveSuccess($page_before);
        } else {
            $userUI->saveFailure();
        }
    } elseif (isset($_POST['update'])) {
        $dataUpdate = "namakelas = '".$data['namakelas']."', golongan = '".$data['golongan']."',"
                . "kelas = '".$data['kelas']."', biayasr = '".$data['biayasr']."',"
                . "mtrhilang = '".$data['mtrhilang']."', mtrrusak = '".$data['mtrrusak']."',"
                . "abodemen = '".$data['abodemen']."', pakai1 = '".$data['pakai1']."',"
                . "pakai2 = '".$data['pakai2']."', pakai3 = '".$data['pakai3']."', pakai4 = '".$data['pakai4']."', "
                . "kubik1 = '".$data['kubik1']."', kubik2 = '".$data['kubik2']."',"
                . "kubik3 = '".$data['kubik3']."', besar_denda = '".$data['besar_denda']."', "
                . "tanggal_jatuh_tempo = '".$data['jth_tempo']."'";

        $validasi = $dtaCRUD->updateData($dataUpdate, $tableName, $_GET['id']);
        if ($validasi) {
            $userUI->updateSuccess($page_before);
        } else {
            $userUI->updateFailure();
        }
//        print_r($validasi);
    }
}

modalView("Info Tarif Pemakaian dan Denda");