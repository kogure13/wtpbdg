<?php
$month_start = strtotime('first day of this month', time());
$month_end = strtotime('last day of this month', time());

$endDate = date('d', $month_end);
//echo date('d M Y', $month_start).'<br/>';
//echo date('d M Y', $month_end).'<br/>';
$rekap = new Rekap;

?>

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
        $jmlBayar = 0;
        for($i=1; $i<=$endDate; $i++){
            ?>
            <tr <?=($i==date('d') ? 'style="background-color: #98abf1; color: #fff"':'')?>>
                <td align="center">
                    <?=$i." ".date('M Y')?>
                </td>
                <td align="right"></td>
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
            <th align="right"></th>
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
