<?php include_once "model/model.rekap.penerimaan.php"; ?>

<fieldset>
    <legend>REKAPITULASI PENERIMAAN LOKET PEMBAYARAN AIR BERSIH</legend>

    <div id="tab">
        <!-- Nav tabs -->
        <ul>
            <li role="presentation"><a href="#harian" aria-controls="home" role="tab" data-toggle="tab">Penerimaan Harian</a></li>
            <li role="presentation"><a href="#bulanan" aria-controls="profile" role="tab" data-toggle="tab">Penerimaan Bulanan</a></li>
            <li role="presentation"><a href="#tahunan" aria-controls="messages" role="tab" data-toggle="tab">Penerimaan Tahunan</a></li>            
        </ul>

        <!-- Tab panes -->
        <div>
            <div role="tabpanel" class="tab-pane active" id="harian">                
                <?php include_once 'views.rekap.harian.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="bulanan">
                <?php include_once 'views.rekap.bulanan.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="tahunan">
                <?php include_once 'views.rekap.tahunan.php'; ?>
            </div>            
        </div>

    </div>
</fieldset>
