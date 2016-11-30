<div class="row">
    <div class="col-sm-5">
        <table class="table table-condensed table-bordered table-striped">
            <tr>
                <td> ID. Pelanggan</td>
                <td><?=$value_idPel?> / <?=$kelas?> - <?=$gol?></td>
            </tr>
            <tr>
                <td> Nama Pelanggan</td>                
                <td><?=$value_nama?></td>
            </tr>
            <tr>
                <td> Alamat</td>
                <td> <?=$value_skare?> Blok: <?=$value_namablok?> Kav: <?=$value_kav?></td>
            </tr>
            <tr>
                <td> Meter Awal</td>
                <td> <?=$meter_awal?></td>
            </tr>   
            <tr>
                <td> Meter Akhir</td>
                <td> <?=$meter_akhir?></td>
            </tr>
            <tr>
                <td> Jumlah Pemakaian</td>
                <td> <?=$jum_pemakaian?></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-7">
        <table class="table table-condensed table-bordered">
            <thead>
                <tr>
                    <th> Rincian</th><th> Uraian(m3)</th>
                    <th> Tarif(Rp.)</th><th> Subtotal(Rp.)</th>
                </tr>            
            </thead>
            <tbody>
                <tr>
                    <td> 1-10m3</td><td align="right"> <?=$m3Tarif1?></td>
                    <td align="right"> <?=format_angka($pakai1)?></td>
                    <td align="right"> <?=format_angka($subTotal1)?></td>
                </tr>
                <tr>
                    <td> 10-20m3</td><td align="right"> <?=$m3Tarif2?></td>
                    <td align="right"> <?=format_angka($pakai2)?></td>
                    <td align="right"> <?=format_angka($subTotal2)?></td>
                </tr>
                <tr>
                    <td> 20-30m3</td><td align="right"> <?=$m3Tarif3?></td>
                    <td align="right"> <?=format_angka($pakai3)?></td>
                    <td align="right"> <?=format_angka($subTotal3)?></td>
                </tr>
                <tr>
                    <td> >30m3</td><td align="right"> <?=$m3Tarif4?></td>
                    <td align="right"> <?=format_angka($pakai4)?></td>
                    <td align="right"> <?=format_angka($subTotal4)?></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><strong> SUB TOTAL</strong></td>
                    <td align="right"><?=format_angka($subTotal)?></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><strong> ABODEMEN</strong></td>
                    <td align="right"><?=format_angka($abodemen)?></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><strong> DENDA</strong></td>
                    <td align="right"><?=format_angka($denda)?></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><strong> PEMBULATAN</strong></td>
                    <td align="right"><?=format_angka($pembulatan_angka)?></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><strong> TOTAL BAYAR</strong></td>
                    <td align="right"><?=  format_angka($total_bayar+$pembulatan_angka+$denda)?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
