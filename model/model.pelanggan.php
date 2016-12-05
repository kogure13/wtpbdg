<script type="text/javascript">
    $(function () {
        $("#vForm").validate({
            rules: {
                nama_pelanggan: "required",
                notelp: "required",
                blok: "required",
                kav: "required",
                tipe: "required",
                tglpasang: "required",
                nowm: "required",
                golKelas: "required"
            },
            messages: {
                nama_pelanggan: " *) harus diisi",
                notelp: " *) harus diisi",
                tipe: " *) harus diisi",
                tglpasang: " *) harus diisi",
                nowm: " *) harus diisi",
                golKelas: " *) harud diisi"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

    $(document).ready(function (e) {
        var accessrole = "<?php echo $_SESSION['accessrole'] ?>";
        var statusPelanggan = "<?php
        if (isset($_POST['status'])) {
            echo $status = $_POST['status'];
        } else {
            echo $status = 1;
        }
        ?>";

        //var main = "model/data.pelanggan.php?accessrole=" + accessrole + "&status=" + statusPelanggan;
        //$("#dtaPelanggan").load(main);

        $("#tblPelanggan").flexigrid({            
            
            url: 'model/data.pelanggan.php?accessrole='+ accessrole +'&status=' + statusPelanggan,
            dataType: 'json',
            colModel: [
                {display: 'ID Pelanggan', name: 'id_Pel', width: 100, sortable: true, align: 'left'},
                {display: 'Nama Pelanggan', name: 'nama_pemilik', width: 200, sortable: true, align: 'left'},
                {display: 'Alamat', name: 'alamat', width: 180, sortable: true, align: 'left'},
                {display: 'Status', name: 'status', width: 80, sortable: true, align: 'left'},
                {display: 'Aksi', name: 'act_link', width: 80, sortable: true, align: 'center'}
            ],
            searchitems: [
                {display: 'ID', name: 'id_Pel'},
                {display: 'Nama Pelanggan', name: 'nama_pemilik', isdefault: true}
            ],
            sortname: "id",
            sortorder: "asc",
            usepager: true,
            title: '',
            useRp: true,
            rp: 20,
            showTableToggleBtn: false,            
            width: 850,
            height: 435
        });
    });
</script>

<?php
$userUI = new User;
$dtaCRUD = new CRUD;
$dataPelanggan = new Pelanggan;

$tableName = "wtp_pelanggan";
$act = "crud.pelanggan";
$page_before = "?page=views.pelanggan";

if (isset($_GET['req'])) {
    if ($_GET['req'] == "delete") {
        $validasi = $dtaCRUD->deleteData($tableName, $_GET['id']);
        if ($validasi) {
            $userUI->deleteSuccess($page_before);
        } else {
            $userUI->deleteFailure($page_before);
        }

        exit();
    } elseif ($_GET['req'] == "edit") {
        $value_submit = "Update";
        $name = "update";
        $id_pelanggan = $_GET['id'];
        $value_nama = $dataPelanggan->readPelanggan("nama_pemilik", $id_pelanggan);
        $value_telp = $dataPelanggan->readPelanggan("telp", $id_pelanggan);
        $value_blok = $dataPelanggan->readPelanggan("idblok", $id_pelanggan);
        $value_kav = $dataPelanggan->readPelanggan("kav", $id_pelanggan);
        $value_tipe = $dataPelanggan->readPelanggan("tipe", $id_pelanggan);
        $value_penghuni = $dataPelanggan->readPelanggan("penghuni", $id_pelanggan);
        $value_tglpasang = $dataPelanggan->readPelanggan("tglpasang", $id_pelanggan);
        $value_nowm = $dataPelanggan->readPelanggan("nowm", $id_pelanggan);
        $value_status = $dataPelanggan->readPelanggan("status", $id_pelanggan);
        $value_catatan = $dataPelanggan->readPelanggan("catatan", $id_pelanggan);
        $value_kelasGol = $dataPelanggan->readPelanggan("golKelas", $id_pelanggan);
    }
} else {
    $value_submit = "Simpan";
    $name = "save";
    $value_nama = "";
    $value_telp = "";
    $value_blok = "";
    $value_kav = "";
    $value_tipe = "";
    $value_penghuni = "";
    $value_tglpasang = "";
    $value_nowm = "";
    $value_status = "";
    $value_catatan = "";
    $value_kelasGol = "";
}
$value_cancel = "Batal";
$akses = $_SESSION['accessrole'];
if ($akses == 1) {
    $display = "";
} else {
    $display = "style=\"display: none\"";
}

if (isset($_POST['save']) || isset($_POST['update'])) {
    $id_Pel = $dataPelanggan->getID_Pel($_POST['blok']);
    $no = 0;
    $data = array(
        'id' => $no,
        'id_Pel' => $id_Pel,
        'nama_pemilik' => $_POST['nama_pelanggan'],
        'area' => $_POST['area'],
        'blok' => $_POST['blok'],
        'kav' => $_POST['kav'],
        'tipe' => $_POST['tipe'],
        'golKelas' => $_POST['golKelas'],
        'notelp' => $_POST['notelp'],
        'penghuni' => $_POST['penghuni'],
        'tglpasang' => $_POST['tglpasang'],
        'nowm' => $_POST['nowm'],
        'status' => $_POST['status'],
        'catatan' => $_POST['catatan'],
    );

    if (isset($_POST['save'])) {
        $validasi = $dtaCRUD->addData($data, $tableName);

        if ($validasi) {
            $userUI->saveSuccess($page_before);
        } else {
            $userUI->saveFailure();
        }
    } elseif (isset($_POST['update'])) {
        $dataUpdate = "nama_pemilik = '" . $data['nama_pemilik'] . "', "
                . "area = '" . $data['area'] . "', "
                . "blok = '" . $data['blok'] . "', "
                . "kav = '" . $data['kav'] . "', "
                . "tipe = '" . $data['tipe'] . "', golKelas = '" . $data['golKelas'] . "'"
                . "telp = '" . $data['notelp'] . "', "
                . "penghuni = '" . $data['penghuni'] . "', "
                . "tglpasang = '" . $data['tglpasang'] . "', "
                . "noseriwm = '" . $data['nowm'] . "', "
                . "status = '" . $data['status'] . "', "
                . "catatan = '" . $data['catatan'] . "'";
        $validasi = $dtaCRUD->updateData($dataUpdate, $tableName, $_GET['id']);
        if ($validasi) {
            $userUI->updateSuccess($page_before);
        } else {
            $userUI->updateFailure();
        }
//        print_r($validasi);
    }
}

modalView("Detail Data Pelanggan");
