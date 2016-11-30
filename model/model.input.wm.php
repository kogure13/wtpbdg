<script type="text/javascript">
    $(function () {
        $("#vForm").validate({
            rules: {
                alamat: "required",
                meterSekarang: "required",
                bulan: "required",
                tahun: "required"
            },
            messages: {
                alamat: " *) harus diisi",
                meterSekarang: " *) harus diisi",
                bulan: " *) harus diisi",
                tahun: " *) harus diisi"
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
    });

    $(document).ready(function () {
        var newfilter = "<?php 
            if (isset($_POST['filter'])) {
                echo $nowMonth = $_POST['bulan'];
                echo "/";
                echo $nowYear = $_POST['tahun'];
            } else {
                echo $nowMonth = date('m');
                echo "/";
                echo $nowYear = date('Y');                
            }
        ?>";
        var arr = newfilter.split("/");
                
        //var main = "model/data.input.wm.php?nowMonth="+arr[0]+"&nowYear="+arr[1];
        //$("#dataWM").load(main);
        $("#dataWM").flexigrid({            
            
            url: 'model/data.input.wm.php?filter='+newfilter,
            dataType: 'json',
            colModel: [
                {display: 'ID Pelanggan', name: 'id_Pel', width: 100, sortable: true, align: 'left'},
                {display: 'Nama Pelanggan', name: 'nama_pemilik', width: 200, sortable: true, align: 'left'},
                {display: 'Alamat', name: 'alamat', width: 130, sortable: true, align: 'left'},
                {display: 'Stand Meter', name: 'stand_meter', width: 90, sortable: true, align: 'right'},
                {display: 'Tanggal Input WM', name: 'tgl_input', width: 150, sortable: true, align: 'center'},
                {display: 'Jam Input WM', name: 'jam_input', width: 150, sortable: true, align: 'center'},
                {display: 'Petugas', name: 'petugas', width: 100, sortable: true, align: 'left'}
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
            rp: 10,
            showTableToggleBtn: false,
            width: 1000,
            height: 293
        });
    });
</script>

<?php
//$nowdate = date("d");
//if($nowdate >= 20 && $nowdate <=25){
//    $inputDate = "";
//}else{
//    $inputDate = "display: none;";
//}

$dtaCRUD = new CRUD;
$dtaTransaksi = new Transaksi;
$userUI = new User;
$tableName = "wtp_input_wm";
$page_before = "?page=views.input.wm";

if (isset($_POST['inputMeter'])) {

    $no = 0;
    list($thn_input, $bln_input ) = explode("-", $_POST['bulan']);
    
    $data = array(
        'id' => $no,
        'id_pelanggan' => $_POST['id_pel'],
        'bln_input' => $bln_input,
        'thn_input' => $thn_input,
        'meterSekarang' => $_POST['meterSekarang'],
        'id_operator' => $_POST['id_operator'],        
        'tgl_input' => $_POST['bulan'],
        'jam_input' => $_POST['jamInput']
    );        

    //cek data member
    $cekData = $dtaTransaksi->getInputWM($data['id_pelanggan'], $data['tgl_input']);
    if ($cekData) {
        $userUI->existData();
    } else {
        $validasi = $dtaCRUD->addData($data, $tableName);

        if ($validasi) {
            $userUI->saveSuccess($page_before);
            //insert to wtp_tagihan_air
            $cekTagihan = $dtaTransaksi->getTagihanAir($data['id_pelanggan'], $data['bnl_input'], $data['thn_input']);
            if(!$cekTagihan) {
                $arrayData = $dtaTransaksi->readInputWM($data['id_pelanggan'], $data['tgl_input']);
                $count = mysql_num_rows($arrayData);

                if ($count) {                    

                    $x = 0;

                    while ($row = mysql_fetch_array($arrayData)) {
                        $val[$x] = $row['meter_sekarang'];
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
                }
                
                $data2 = array(
                    'id' => $no,
                    'id_pelanggan' => $data['id_pelanggan'],
                    'info_tarif' => '',
                    'operator' => '',
                    'bln_input' => $data['bln_input'],
                    'thn_input' => $data['thn_input'],
                    'meter_awal' => $meter_awal,
                    'meter_akhir' => $meter_akhir,
                    'tgl_bayar' => '',
                    'bln_bayar' => '',
                    'thn_bayar' => '',
                    'jml_bayar' => '',
                    'denda' => '',
                    'status_bayar' => 0
                );
                $tableName = "wtp_tagihan_air";
                $dtaCRUD->addData($data2, $tableName);
            }
        } else {
            $userUI->saveFailure();
        }
    }
}