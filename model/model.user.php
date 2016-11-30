<script type="text/javascript">
    $(function () {
        $("#vForm").validate({
            rules: {
                nama_lengkap: "required",
                password: "required",
                jobtitle: "required",
                phone: "required",
                email: "required",
                accessrole: "required"
            },
            messages: {
                username: " *) harus diisi",
                password: " *) harus diisi",
                email: " *) harus diisi",
                phone: " *) harus diisi",
                jobtitle: " *) harus diisi",
                accessrole: " *) harus diisi"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

<?php
$userUI = new User;
$dtaCRUD = new CRUD;

$arrayData = $userUI->viewUser();
$tableName = "wtp_user";
$act = "crud.user";
$page_before = "?page=views.user";

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
        $id_user = $_GET['id'];
        $value_submit = "Update"; $name = "update";
        $value_nama = $userUI->readUser("nama_lengkap", $id_user);
        $value_password = $userUI->readUser("password", $id_user);        
        $value_password = base64_decode($userUI->readUser("password", $id_user));
        $value_email = $userUI->readUser("email", $id_user);
        $value_phone = $userUI->readUser("phone", $id_user);
        $value_role = $userUI->readUser("accessrole", $id_user);
        $value_jobtitle = $userUI->readUser("jobtitle", $id_user);
    }
} else {
    $value_submit = "Simpan"; $name = "save";
    $value_nama = ""; $value_password = "";
    $value_email = ""; $value_phone = "";
    $value_role = ""; $value_jobtitle = "";
}
$value_cancel = "Batal";
$akses = $_SESSION['accessrole'];

if (isset($_POST['save']) || isset($_POST['update'])) {

    $no = 0;
    $hash_password = $userUI->hashPassword($_POST['password']);
    $data = array(
        'id' => $no,
        'nama_lengkap' => $_POST['nama_lengkap'],
        'jobtitle' => $_POST['jobtitle'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'password' => $hash_password,
        'accessrole' => $_POST['role']
    );

    if (isset($_POST['save'])) {
        $validasi = $dtaCRUD->addData($data, $tableName);

        if ($validasi) {
            $userUI->saveSuccess($page_before);
        } else {
            $userUI->saveFailure();
        }
    } elseif (isset($_POST['update'])) {
        $dataUpdate = "nama_lengkap = '" . $data['nama_lengkap'] . "', "
                . "password = '" . $data['password'] . "', "
                . "email = '" . $data['email'] . "', "
                . "phone = '" . $data['phone'] . "', "
                . "jobtitle = '" . $data['jobtitle'] . "', "
                . "accessrole = '" . $data['accessrole'] . "'";
        
        $validasi = $dtaCRUD->updateData($dataUpdate, $tableName, $_GET['id']);
        if ($validasi) {
            $userUI->updateSuccess($page_before);
        } else {
            $userUI->updateFailure();
        }
    }
}