<?php
if($_SESSION['jobtitle'] == "Kasir"){
?>
<li>
    <a href="#" class="js-sub-menu-toggle">
        <i class="fa fa-cc fa-fw"></i>
        <span class="text">Data Pembayaran</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="?page=views.trans.rekair" id="rek-air">                
                <span class="text">Rekening Air</span>
            </a>
        </li>
        <li>
            <a href="?page=views.trans.nonrekair" id="rek-non-air">                
                <span class="text">Rekening Non-Air</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#" id="rekap-penerimaan">
        <i class="fa fa-book"></i> 
        <span class="text">Rekap Penerimaan</span>
    </a>
</li>
<?php } else { ?>
<li>
    <a href="#" class="js-sub-menu-toggle">
        <i class="fa fa-check-square-o"></i> 
        <span class="text">Data Rekening</span>
    </a>
    <ul class="sub-menu">            
        <li>
            <a href="?page=views.input.wm" id="in-water-meter">                
                <span class="text">Water Meter</span>
            </a>
        </li>        
    </ul>
</li>
<?php } ?>
