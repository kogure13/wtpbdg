<?php
if($_SESSION['jobtitle'] == "Kasir"){
?>
<li>
    <a href="#" id="data-pembayaran" data-toggle="collapse" data-target="#data-pembayaran-list">
        <i class="glyphicon glyphicon-credit-card"></i>
        Data Pembayaran
    </a>
    <ul class="submenu collapse list-unstyled" id="data-pembayaran-list">
        <li>
            <a href="?page=views.trans.rekair" id="rek-air">
                <i class="glyphicon glyphicon-play"></i> Pembayaran Rekening Air 
            </a>
        </li>
        <li>
            <a href="?page=views.trans.nonrekair" id="rek-non-air">
                <i class="glyphicon glyphicon-play"></i> Pembayaran Rekening Non-Air
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#" id="rekap-penerimaan">
        <i class="glyphicon glyphicon-book"></i> Rekap Penerimaan
    </a>
</li>
<?php } else { ?>
<li>
    <a href="#" id="data-rekening" data-toggle="collapse" data-target="#data-rekening-list">
        <i class="glyphicon glyphicon-check"></i> Data Rekening
    </a>
    <ul class="submenu collapse list-unstyled" id="data-rekening-list">            
        <li>
            <a href="?page=views.input.wm" id="in-water-meter">
                <i class="glyphicon glyphicon-play"></i> Water Meter
            </a>
        </li>        
    </ul>
</li>
<?php } ?>
