<script type="text/javascript">
    $(function () {
        $("#vForm").validate({
            rules: {
                alamat: "required",
                bulan: "required",
                meter_akhir: "required",
                infoTarif: "required"
            },
            messages: {
                alamat: " *) harus diisi",
                bulan: " *) harus diisi",
                meter_akhir: " *) harus diisi",
                infoTarif: " *) harus diisi"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $("#alamat").autocomplete({
            source: "model/model.auto.trans.rekair.php",
            minLength: 1,
            select: function (event, ui) {
                event.preventDefault();
                $("#alamat").val(ui.item.label);
                this.value = ui.item.label;
                $("#pelanggan").val(ui.item.value);
                $("#id_pel").val(ui.item.id_pel);
            }
        });

        $("#bulan").on('change', function () {
            var id_pel = $("#id_pel").val();
            if (id_pel == 0) {
                alert("Alamat Pelanggan Kosong");
                $("#alamat").focus();
            } else {
                var bulan = $("#bulan").val();
                var tahun = $("#tahun").val();
            }
        });
    });

    $(document).ready(function (e) {
        var newfilter = "<?php
            if (isset($_POST['proses_admin'])) {
                echo $filter = $_POST['proses_admin'];
            } else {
                echo $filter = "";
            }
        ?>";
//        var main = "model/data.trans.rekair.php";
//        $("#transRekAir").load(main);
        
        $("#dataTransAir").flexigrid({            
            
            url: 'model/data.trans.rekair.php',
            dataType: 'json',
            colModel: [
                {display: 'ID Pelanggan', name: 'id_Pel', width: 100, sortable: true, align: 'center'},
                {display: 'Nama Pelanggan', name: 'nama_pemilik', width: 200, sortable: true, align: 'left'},
                {display: 'Alamat', name: 'alamat', width: 130, sortable: true, align: 'left'},
                {display: 'Meter Awal', name: 'meter_awal', width: 90, sortable: true, align: 'center'},
                {display: 'Meter Akhir', name: 'meter_akhir', width: 90, sortable: true, align: 'center'},
                {display: 'Total Pemakaian', name: 'total', width: 110, sortable: true, align: 'right'},
                {display: 'Periode', name: 'periode', width: 150, sortable: true, align: 'center'},
                {display: 'Aksi', name: 'act_link', width: 100, sortable: true, align: 'center'}
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
            width: 1000,
            height: 400
        });
    });
</script>

<?php
$userUI = new User;
$dtaCRUD = new CRUD;
$dataPelanggan = new Pelanggan;
$dtaLoket = new Main;
$dtaTransaksi = new Transaksi;
$dtaTarif = new Rekap;

$tableName = "wtp_tagihan";
$act = "crud.trans.rekair";
$page_before = "?page=views.trans.rekair";
$value_cancel = "Batal";
$akses = $_SESSION['accessrole'];

if (isset($_POST['cari_transaksi'])) {

    $value_style = "display: none;";
    $value_print = "";
    $id_pelanggan = $_POST['id_pel'];
    $id_tarif = $_POST['infoTarif'];

    $value_nama = $dataPelanggan->readPelanggan("nama_pemilik", $id_pelanggan);
    $value_idPel = $dataPelanggan->readPelanggan("id_Pel", $id_pelanggan);
    $value_skare = $dataPelanggan->readPelanggan("skarea", $id_pelanggan);
    $value_namablok = $dataPelanggan->readPelanggan("namablok", $id_pelanggan);
    $value_kav = $dataPelanggan->readPelanggan("kav", $id_pelanggan);

    $arrayData = $dtaTransaksi->readInputWM($id_pelanggan, $_POST['bulan']);

    $abodemen = $dtaTarif->readTarif("abodemen", $id_tarif);
    $kelas = $dtaTarif->readTarif("kelas", $id_tarif);
    $gol = $dtaTarif->readTarif("golongan", $id_tarif);
    $tgl_jthTempo = $dtaTarif->readTarif("jth_tempo", $id_tarif);

    $count = mysql_num_rows($arrayData);

    if ($count > 1) {
        //Hitung Denda
        $tgl_pembayaran = date("d", strtotime($_POST['bulan']));
        if ($tgl_pembayaran > $tgl_jthTempo) {
            $denda = $dtaTarif->readTarif("besar_denda", $id_tarif);
        } else {
            $denda = 0;
        }
        //End Hitung Denda

        $x = 0;

        while ($data = mysql_fetch_array($arrayData)) {
            $val[$x] = $data['meter_sekarang'];
            $x++;
        }
        if ($x == 0) {
            $meter_awal = 0;
            $meter_akhir = 0;
        } elseif ($x < 2) {
            $meter_awal = 0;
            $meter_akhir = $val[0];
        } else {
            $meter_awal = $val[0];
            $meter_akhir = $val[1];
        }

        $jum_pemakaian = $meter_akhir - $meter_awal;
        // Hitungan kubikasi
        $kubik1 = $dtaTarif->readTarif("kubik1", $id_tarif);
        $kubik2 = $dtaTarif->readTarif("kubik2", $id_tarif);
        $kubik3 = $dtaTarif->readTarif("kubik3", $id_tarif);

        $pakai1 = $dtaTarif->readTarif("pakai1", $id_tarif);
        $pakai2 = $dtaTarif->readTarif("pakai2", $id_tarif);
        $pakai3 = $dtaTarif->readTarif("pakai3", $id_tarif);
        $pakai4 = $dtaTarif->readTarif("pakai4", $id_tarif);

        if ($jum_pemakaian <= $kubik1) {            
            $m3Tarif1 = $jum_pemakaian;
            $m3Tarif2 = 0;
            $m3Tarif3 = 0;
            $m3Tarif4 = 0;
        } elseif ($jum_pemakaian <= $kubik2) {            
            $m3Tarif1 = $kubik1;
            $m3Tarif2 = $jum_pemakaian - $kubik1;
            $m3Tarif3 = 0;
            $m3Tarif4 = 0;
        } elseif ($jum_pemakaian <= $kubik3) {            
            $m3Tarif1 = $kubik1;
            $m3Tarif2 = $kubik1;
            $m3Tarif3 = $jum_pemakaian-$m3Tarif1-$m3Tarif2;
            $m3Tarif4 = 0;
        } else {            
            $m3Tarif1 = $kubik1;
            $m3Tarif2 = $kubik1;
            $m3Tarif3 = $kubik1;
            $m3Tarif4 = $jum_pemakaian - $m3Tarif3 - $m3Tarif2 - $m3Tarif1;
        }

        $subTotal1 = round($pakai1 * $m3Tarif1);
        $subTotal2 = round($pakai2 * $m3Tarif2);
        $subTotal3 = round($pakai3 * $m3Tarif3);
        $subTotal4 = round($pakai4 * $m3Tarif4);

        $subTotal = round($subTotal1 + $subTotal2 + $subTotal3 + $subTotal4);
        $total_bayar = round($subTotal + $abodemen + $denda);
        
        if(($total_bayar % 100) == 0){
            $pembulatan_angka = 0;
        }else{
            $pembulatan_angka = pembulatan_angka($total_bayar, 2, 100);
        }                
        // End hitung kubikasi
    } else {
        $userUI->noData($page_before);
    }
}else{
    $value_style = "";
    $value_print = "display: none;";
}
