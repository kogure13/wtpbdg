<?php
$month_start = strtotime('first day of this month', time());
$month_end = strtotime('last day of this month', time());

$endDate = date('d', $month_end);
//echo date('d M Y', $month_start).'<br/>';
//echo date('d M Y', $month_end).'<br/>';
$rekap = new Rekap;
?>

<script type="text/javascript">
    $(function(){
       $("#vForm").validate({
          rules: {
              periode: "required"
          },
          messages: {
              periode: " *) Harus dipilih"
          },
          submitHandler: function(form) {
              form.submit();
          }
       });
    });
</script>

<form class="form-group form-inline" method="post" enctype="multipart/form-data" novalidate="novalidate" id="vForm" accept="#" >
    <div class="form-group">
        <input type="text" name="periode" id="txtDate" class="" placeholder="Periode...">
    </div>
    <div class="form-group">
        <input type="submit" name="submit_harian" value="Cari.." class="">        
    </div>    
</form>

<table class="rekap-table rekap-table-bordered">
    <thead>
        <tr>
            <th rowspan="2" align="center" width="9%">Tanggal</th>
            <th colspan="3" align="center">Rekening Air</th>
            <th rowspan="2" align="center" width="10%">Jml Rek. Air</th>
            <th colspan="2" align="center">Rekening Non-Air</th>
            <th rowspan="2" align="center" width="10%">Jml Non-Air</th>
            <th rowspan="2" align="center" width="12%">Total Penerimaan</th>
        </tr>
        <tr>
            <th>Harga Air</th>
            <th>Abodemen</th>
            <th>Pembulatan</th>
            <th>SR Baru</th>
            <th>WM Hilang</th>                
        </tr>
    </thead>
    <tbody>
        <?php        
        if(isset($_POST['submit_harian'])){
            list($bln_bayar, $thn_bayar) = explode("/", $_POST['periode']);
//            $selisih = date('m') - $bln_bayar;            
//            $selisih = strtotime('- '.$selisih.' month', strtotime($bln_bayar));
            $dateFirst = $bln_bayar."/1/".$thn_bayar;
            
            $endDate = date('t', strtotime($dateFirst));
            $date = date('M', strtotime($dateFirst));
//            exit;
//            $endDate = date('d', $date);
            $format = $date." ".date('Y');
        }else{
            $bln_bayar = date('m');
            $thn_bayar = date('Y');
            $format = date('M Y');
        }
        
        $jml_Rek_Row = $jml_Rek_Col = 0;  
        $a = $b = $c = $d = array();
                        
        for($i=0; $i<$endDate; $i++){
            ?>
            <tr>
                <td align="center">
                    <?=($i+1)." ".$format?>
                </td>
                <td align="right"> <?=$a[$i] = $rekap->rekapLpH("jml_bayar", $i+1, $bln_bayar, $thn_bayar)?></td>
                <td align="right"> </td>
                <td align="right"> </td>
                <td align="right"><?=$d[$i] = $a[$i] ?> </td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right">
                    <b>haha</b>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th align="center">JUMLAH</th>
            <th align="right"><b><?=$rekap->rekapLpH("jml_bayar", 0, $bln_bayar, $thn_bayar)?></b></th>
            <th align="right"></th>
            <th align="right"></th>
            <th align="right"></th>
            <th align="right"></th>
            <th align="right"></th>
            <th align="right"></th>
            <th align="right">
                <b></b>
            </th>
        </tr>
    </tfoot>
</table>
