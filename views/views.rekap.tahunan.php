<?php 
$nowYear = date('Y');
?>

<table class="rekap-table rekap-table-bordered">
    <thead>
        <tr>
            <th rowspan="2" align="center" width="9%">Periode Tahun</th>
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
        $thn_bayar = date('Y');
        
        for($i=2010; $i<=$nowYear; $i++){
            ?>
            <tr <?=($i==date('Y') ? 'style="background-color: #98abf1; color: #fff"':'')?>>
                <td align="center">
                    <?=$i?>
                </td>
                <td align="right"><?=$rekap->rekapLpH("jml_bayar", 0, 0, $i)?></td>
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
