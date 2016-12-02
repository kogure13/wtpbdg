<?php

class User {

    function loginUser($username, $password) {
        $query = mysql_query("select * from wtp_user 
                where email = '$username' and 
                password = '$password'");
        $dta_user = mysql_fetch_array($query);
        $count_row = mysql_num_rows($query);
        if ($count_row == 1) {
            $_SESSION['user_login'] = TRUE;
            $_SESSION['id'] = $dta_user['id'];
            $_SESSION['accessrole'] = $dta_user['accessrole'];
            $_SESSION['nama_lengkap'] = $dta_user['nama_lengkap'];
            $_SESSION['jobtitle'] = $dta_user['jobtitle'];

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function viewUser() {
        $query = mysql_query("select * from wtp_user");

        return $query;
    }

    function readUser($field, $id_user) {
        $query = mysql_query("select * from wtp_user where id = '$id_user'");
        $data = mysql_fetch_array($query);
        if ($field == "nama_lengkap")
            return $data['nama_lengkap'];
        if ($field == "jobtitle")
            return $data['jobtitle'];
        if ($field == "phone")
            return $data['phone'];
        if ($field == "email")
            return $data['email'];
        if ($field == "password")
            return $data['password'];
        if ($field == "accessrole")
            return $data['accessrole'];
    }

    function hashPassword($password) {
//        $pengacak = "12345ABCDE+-990pl@@/[]";
//        $hash = md5($pengacak. md5($password). $pengacak);
        $hash = base64_encode($password);

        return $hash;
    }

    /* ============================================================================== */

    function getTooltips($pos, $title) {
        echo 'data-toggle="tooltip" data-placement="' . $pos . '" title="' . $title . '"';
    }

    function getUiBtn($name, $value_submit, $value_cancel, $page_before) {
        echo '
        <div class="form-group">
            <input type="submit" name="' . $name . '" value="' . $value_submit . '" class="btn btn-sm btn-success" />       
            <input type="button" value="' . $value_cancel . '" class="btn btn-sm btn-danger" onclick="document.location.href=\'' . $page_before . '\'" />
        </div>
        ';
    }

    function actBtn($id, $act, $akses) {
        if ($akses == 1) {
            echo '
                <a href="?page=crud&act=' . $act . '&req=edit&id=' . $id . '" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="?page=crud&act=' . $act . '&req=delete&id=' . $id . '" class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm(\'Are you sure delete this data ?\')"> <i class="glyphicon glyphicon-trash"></i></a>
            ';
        }
    }

    function authorFooter() {
        echo 'Please Contact your Administrator';
        return;
    }

    function login_failure() {
        echo "
            <script language=\"javascript\">
            alert(\"Maaf, Username Atau Password Anda salah!!\");            
            </script>
        ";
    }

    function login_success() {
        echo "
            <script language=\"javascript\">
            alert(\"Login, Sukses\");
            document.location=\"index.php\";
            </script>
        ";
    }

    function logout() {
        session_destroy();
        echo "<meta http-equiv='refresh' content='1;url=index.php' />";
    }

    function saveSuccess($page_before) {
        echo '
            <script> 
            alert("Data Berhasil disimpan"); 
            document.location.href = "' . $page_before . '";
            </script>
        ';
    }

    function saveFailure() {
        echo '
            <script> 
            alert("Data Gagal disimpan");
            </script>
	';
    }

    function updateSuccess($page_before) {
        echo '
            <script> 
            alert("Data Berhasil dirubah"); 
            document.location.href = "' . $page_before . '";
            </script>
        ';
    }

    function updateFailure() {
        echo '
            <script> 
            alert("Data Gagal dirubah"); 				
            </script>
        ';
    }

    function deleteSuccess($page_before) {
        echo '
            <script> 
            alert("Data Berhasil dihapus");
            document.location.href = "' . $page_before . '";
            </script>
        ';
    }

    function deleteFailure($page_before) {
        echo '
            <script> 
            alert("Data Gagal dihapus");
            document.location.href = "' . $page_before . '";
            </script>
        ';
    }

    function existData() {
        echo '
            <script> 
            alert("Data Sudah Tersedia");            
            </script>
        ';
    }

    function noData($page_before) {
        echo '
            <script> 
            alert("Data Tidak Tersedia");            
            document.location.href = "' . $page_before . '";
            </script>
        ';
    }

}

class Main {

    function getPage() {
        if (!isset($_GET['page'])) {
            include_once 'views/home.php';
        } else {
            $page = htmlentities($_GET['page']);
            $pageRoot = "views/" . $page . ".php";

            if (file_exists($pageRoot)) {
                include_once $pageRoot;
            } elseif ($page == "crud") {
                $halaman = $_GET['act'];
                if (file_exists("model/" . $halaman . ".php")) {
                    include_once "model/" . $halaman . ".php";
                }
            } elseif ($page == "logout") {
                $user = new User();
                $user->logout();
            } else {
                include_once 'views/home.php';
            }
        }
    }

    function renderHeader() {
        include 'model/render.header.php';
        return;
    }

    function renderScript() {
        include 'model/render.script.php';
        return;
    }

    function getMenu() {
        include 'model/menu.php';
        return;
    }

    function mainFooter() {
        echo '&copy; copyright WTPBDG - Bandung' . date('Y');
        return;
    }

    function getLoket() {
        $query = mysql_query("SELECT * FROM wtp_area");
        $result = mysql_fetch_array($query);
        $dtaLoket = $result['skarea'];

        return $dtaLoket;
    }

}

class Profile {

    function viewProfile() {
        $query = mysql_query("SELECT * FROM wtpbdg.wtp_area");

        return $query;
    }

    function readProfile($field, $id_profile) {
        $query = mysql_query("SELECT * FROM wtpbdg.wtp_area WHERE id = '$id_profile'");
        $data = mysql_fetch_array($query);

        if ($field == "id")
            return $data['id'];
        else if ($field == "areaname")
            return $data['areaname'];
        else if ($field == "skarea")
            return $data['skarea'];
        else if ($field == "companyname")
            return $data['companyname'];
        else if ($field == "address")
            return $data['address'];
        else if ($field == "city")
            return $data['city'];
        else if ($field == "state")
            return $data['state'];
        else if ($field == "notlp")
            return $data['notlp'];
        else if ($field == "nofax")
            return $data['nofax'];
        else if ($field == "email")
            return $data['email'];
        else if ($field == "zipcode")
            return $data['zipcode'];
    }

}

class Pelanggan {

    function getID_Pel($blok) {
        $query = mysql_query("SELECT COUNT(wtp_pelanggan.blok) as blok, wtp_blok.idblok, 
            wtp_blok.kelompok
            FROM wtp_blok
            INNER JOIN wtp_pelanggan ON wtp_pelanggan.blok = wtp_blok.idblok
            WHERE wtp_pelanggan.blok = '$blok'");
        $dta_blok = mysql_fetch_array($query);

        $query_kelompok = mysql_query("SELECT kelompok FROM wtp_blok WHERE idblok = '$blok'");
        $dta_kelompok = mysql_fetch_array($query_kelompok);
        $id_blok = $dta_blok['blok'] + 1;
        $id_blok = $id_blok . "-" . $dta_kelompok['kelompok'];

        return $id_blok;
    }

    function viewPelanggan($status) {

        $query = mysql_query("SELECT
            wtp_pelanggan.id,
            wtp_pelanggan.id_Pel,
            wtp_pelanggan.nama_pemilik, wtp_pelanggan.status,
            wtp_area.skarea,
            wtp_blok.namablok,
            wtp_pelanggan.kav
            FROM
            wtp_pelanggan
            INNER JOIN wtp_area ON wtp_pelanggan.area = wtp_area.id
            INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.idblok            
            WHERE status = '$status'");

        return $query;
    }

    function readPelanggan($field, $id_pelanggan) {
        $query = mysql_query("SELECT wtp_pelanggan.id,
            wtp_pelanggan.id_Pel,wtp_pelanggan.nama_pemilik, wtp_pelanggan.area, 
            wtp_pelanggan.blok, wtp_pelanggan.kav, wtp_pelanggan.tipe, wtp_pelanggan.telp, 
            wtp_pelanggan.penghuni, wtp_pelanggan.tglpasang, wtp_pelanggan.noseriwm, 
            wtp_pelanggan.`status`, wtp_pelanggan.catatan, wtp_area.skarea, 
            wtp_area.id, wtp_blok.namablok, wtp_blok.idblok 
            FROM
            wtp_pelanggan 
            INNER JOIN wtp_area ON wtp_pelanggan.area = wtp_area.id
            INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.idblok 
            WHERE wtp_pelanggan.id = '$id_pelanggan'");

        $data = mysql_fetch_array($query);
        if ($field == "id_Pel")
            return $data['id_Pel'];
        else if ($field == "nama_pemilik")
            return $data['nama_pemilik'];
        else if ($field == "skarea")
            return $data['skarea'];
        else if ($field == "telp")
            return $data['telp'];
        else if ($field == "namablok")
            return $data['namablok'];
        else if ($field == "idblok")
            return $data['idblok'];
        else if ($field == "kav")
            return $data['kav'];
        else if ($field == "tipe")
            return $data['tipe'];
        else if ($field == "penghuni")
            return $data['penghuni'];
        else if ($field == "tglpasang")
            return $data['tglpasang'];
        else if ($field == "nowm")
            return $data['noseriwm'];
        else if ($field == "status")
            return $data['status'];
        else if ($field == "catatan")
            return $data['catatan'];
        else if ($field == "kelasGol")
            return $data['id_kelasGol'];
    }

    function blok($blok) {
        $query = mysql_query("SELECT * FROM wtp_blok");
        while ($row = mysql_fetch_assoc($query)) {
            ?>
            <option value="<?= $row['idblok'] ?>" <?= $row['idblok'] == $blok ? "selected=\"selected\"" : "" ?>> 
                <?= $row['namablok'] ?>
            </option>
            <?php
        }
    }

    function kelasGol($kelasGol) {
        $query = mysql_query("SELECT * FROM wtp_tarif");
        while ($row = mysql_fetch_array($query)) {
            ?>
            <option value="<?= $row['id'] ?>" <?= $row['id'] == $kelasGol ? "selected=\"selected\"" : "" ?>> 
                <?= $row['namakelas'] ?> - <?= $row['kelas'] ?> / <?= $row['golongan'] ?>
            </option>
            <?php
        }
    }

}

class Transaksi {

    function getInputWM($idPel, $tglInput) {
        $query = mysql_query("SELECT * FROM wtpbdg.wtp_input_wm "
                . "WHERE id_pelanggan = '$idPel' AND tgl_input = '$tglInput'");
        $count = mysql_num_rows($query);

        return $count;
    }

    function readInputWM($idPel, $tglInput) {
        // ambil 2 data bulan sekarang dan bulan kemarin dari pelanggan
        list($thn, $bln, $tgl) = explode("-", $tglInput);        
        //list($thn, $bln, $tgl) = explode("/", $tglBayar);        
        $nowMonth = $bln;
        $minusMonth = strtotime('-1 month', strtotime($nowMonth));

        //$prevMonth = date("m", $minusMonth);
        $prevMonth = $nowMonth - 1;
        $query = "SELECT * FROM wtpbdg.wtp_input_wm "
                . "WHERE id_pelanggan='$idPel' AND "
                . "(bln_input BETWEEN '" . $prevMonth . "' AND '" . $nowMonth . "') AND "
                . "thn_input = '".$thn."' "
                . "ORDER BY bln_input";
        $result = mysql_query($query) or die(mysql_error());

        return $result;
    }
    
    function getTagihanAir() {
        $query = "";
        $result = mysql_query($query);
        
        return $result;
    }

}

class Rekap {

    function getDataBulan() {
        $query = mysql_query("SELECT * FROM wtp_bulan");

        return $query;
    }

    function viewsTarif() {
        $query = mysql_query("SELECT * FROM wtp_tarif");

        return $query;
    }

    function readTarif($field, $id_tarif) {
        $query = mysql_query("SELECT * FROM wtp_tarif WHERE id = '$id_tarif'");

        $data = mysql_fetch_array($query);
        if ($field == "id")
            return $data['id'];
        else if ($field == "namakelas")
            return $data['namakelas'];
        else if ($field == "golongan")
            return $data['golongan'];
        else if ($field == "kelas")
            return $data['kelas'];
        else if ($field == "biayasr")
            return $data['biayasr'];
        else if ($field == "mtrhilang")
            return $data['mtrhilang'];
        else if ($field == "mtrrusak")
            return $data['mtrrusak'];
        else if ($field == "abodemen")
            return $data['abodemen'];
        else if ($field == "pakai1")
            return $data['pakai1'];
        else if ($field == "pakai2")
            return $data['pakai2'];
        else if ($field == "pakai3")
            return $data['pakai3'];
        else if ($field == "pakai4")
            return $data['pakai4'];
        else if ($field == "kubik1")
            return $data['kubik1'];
        else if ($field == "kubik2")
            return $data['kubik2'];
        else if ($field == "kubik3")
            return $data['kubik3'];
        else if ($field == "besar_denda")
            return $data['besar_denda'];
        else if ($field == "jth_tempo")
            return $data['tanggal_jatuh_tempo'];
    }

    function rekapInputWM($bulan, $tahun) {

        $query = mysql_query("SELECT
            wtp_pelanggan.id_Pel,
            wtp_pelanggan.nama_pemilik,
            wtp_pelanggan.kav,
            wtp_blok.namablok,
            wtp_input_wm.meter_sekarang,
            wtp_input_wm.bln_input, wtp_input_wm.thn_input,
            wtp_input_wm.jam_input,
            wtp_user.nama_lengkap
            FROM
            wtp_pelanggan
            INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.idblok
            INNER JOIN wtp_input_wm ON wtp_input_wm.id_pelanggan = wtp_pelanggan.id
            INNER JOIN wtp_user ON wtp_input_wm.id_operator = wtp_user.id
            WHERE bln_input = '$bulan' AND thn_input = '$tahun'
            ");

        return $query;
    }
    
    function rekapLpH($field, $tgl_bayar, $bln_bayar, $thn_bayar) {
//        $nowDate = date('d');
//        $nowMonth = date('m');
//        $nowYear = date('Y');
        if($tgl_bayar == 0  && $bln_bayar == 0){
            $where = "WHERE thn_bayar = ".$thn_bayar." AND status_bayar = 1";
        }else if($tgl_bayar == 0){
            $where = "WHERE bln_bayar = ".$bln_bayar." "
                . "AND thn_bayar = ".$thn_bayar." AND status_bayar = 1";
        }else{
            $where = "WHERE tgl_bayar = ".$tgl_bayar." AND bln_bayar = ".$bln_bayar." "
                . "AND thn_bayar = ".$thn_bayar." AND status_bayar = 1";
        }
        
        $query = "SELECT sum(jml_bayar) AS jml_bayar FROM wtp_tagihan_air $where";
        $result = mysql_query($query);
        $data = mysql_fetch_array($result);
//        echo $data; exit;
        if($field == "jml_bayar")
            echo number_format($data['jml_bayar']);
//        return $data['jml_bayar'];
    }        

}

class CRUD {

    function addData($data, $tableName) {
        $i = 0;
        foreach ($data as $value) {
            $printVal[$i] = "'" . $value . "'";
            $i++;
        }
        $dataArray = implode(',', $printVal);

        $save = mysql_query("insert into $tableName values($dataArray)");
        return $save;
    }

    function updateData($data, $tableName, $id) {
        $update = mysql_query("update $tableName set $data where id = '$id'");

        return $update;
    }

    function deleteData($tableName, $id) {
        $delete = mysql_query("delete from $tableName where id = '$id'");

        return $delete;
    }

}
