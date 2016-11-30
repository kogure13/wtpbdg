<table class="table table-condensed table-bordered table-striped tbl-scroll" id="table-pelanggan">
    <thead>
        <tr>
            <th width="30px"> #</th>
            <th width="100px"> ID. Pelanggan</th>
            <th width="400px"> Nama Pelanggan</th>
            <th> Alamat</th>                    
            <th> Tagihan</th>
            <th> Jumlah</th>
            <th> Status</th>
        </tr>
    </thead>
    <tbody id="dtaPel">
        <?php
        $i = 1;
        if (count($arrayData)) {
            while ($data = mysql_fetch_array($arrayData)) {
                ?>
                <tr>                            
                    <td align="right"><?= $i ?></td>
                    <td><?= $data['id_Pel'] ?></td>
                    <td><?= ucwords($data['nama_pemilik']) ?></td>
                    <td><?= $data['skarea'] ?> Blok : <?= $data['namablok'] ?> Kav : <?= $data['kav'] ?></td>                            
                    <td><a href="#"> - </a></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $i++;
            }
        } else {
            echo 'Data Tidak Ada !';
        }
        ?>
    </tbody>
</table> 