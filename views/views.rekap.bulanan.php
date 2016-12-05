<?php
$year_start = strtotime('first day of January', time());
$year_end = strtotime('last day of December', time());
 $endMonth = date('m', $year_end);
//echo date('d M Y', $month_start).'<br/>';
//echo date('d M Y', $month_end).'<br/>';
 $rekap = new Rekap;
?>

<form class="form-group form-inline" method="post" enctype="multipart/form-data" novalidate="novalidate" id="vForm" accept="#" >
    <div class="form-group">
        <input type="text" name="periode_bulanan" id="txtYear" class="" placeholder="Periode...">
    </div>
    <div class="form-group">
        <input type="submit" name="submit_bulanan" value="Cari.." class="">        
    </div>    
</form>

<table class="rekap-table rekap-table-bordered">
    <thead>
        <tr>
            <th rowspan="2" align="center" width="9%">Bulan</th>
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
        if(isset($_POST['submit_bulanan'])){
            $thn_bayar = $_POST['periode_bulanan'];
        }else{
            $thn_bayar = date('Y');
        }
        
        for($i=0; $i<$endMonth; $i++){
            ?>
            <tr>
                <td align="">
                    <?=namaBulan($i+1)." ".$thn_bayar?>
                </td>
                <td align="right"><?=$rekap->rekapLpH("jml_bayar", 0, $i+1, $thn_bayar)?></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right">
                    <b></b>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th align="center">JUMLAH</th>
            <th align="right"><?=$rekap->rekapLpH("jml_bayar", 0, 0, $thn_bayar)?></th>
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
