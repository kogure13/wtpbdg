<!-- Admin Menu & Kasir -->
<li>
    <a href="?page=views.pelanggan" id="data-pelanggan">  
        <i class="glyphicon glyphicon-user"></i>
        Data Pelanggan
    </a>
</li>
<li>
    <a href="#" id="data-rekening" data-toggle="collapse" data-target="#data-rekening-list">
        <i class="glyphicon glyphicon-check"></i>
        Data Rekening
    </a>
    <ul class="submenu collapse list-unstyled" id="data-rekening-list">            
        <li>
            <a href="?page=views.input.wm" id="in-water-meter">
                <i class="glyphicon glyphicon-play"></i> Water Meter
            </a>
        </li>

        <li>
            <a href="?page=views.trans.rekair" id="rek-air">
                <i class="glyphicon glyphicon-play"></i> Rekening Air 
            </a>
        </li>
        <li>
            <a href="?page=views.trans.nonrekair" id="rek-non-air">
                <i class="glyphicon glyphicon-play"></i> Rekening Non-Air
            </a>
        </li>            

    </ul>
</li>    
<li>
    <a href="?page=views.rekap.penerimaan" id="rekap-penerimaan">            
        <i class="glyphicon glyphicon-file"></i>
        Laporan Penerimaan
    </a>
</li>
<li>            
    <a href="#" id="daftar-tunggakan" data-toggle="collapse" data-target="#daftar-tunggakan-list">
        <i class="glyphicon glyphicon-alert"></i> Daftar Tunggakan
    </a>
    <ul class="submenu collapse list-unstyled" id="daftar-tunggakan-list">
        <li>
            <a href="?page=views.tunggakan.air" id="tunggakan-air">
                <i class="glyphicon glyphicon-play"></i> Tunggakan Rek. Air
            </a>
        </li>
        <li>
            <a href="?page=views.tunggakan.nonair" id="tunggakan-nonair">
                <i class="glyphicon glyphicon-play"></i> Tunggakan Rek. Non Air
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#" id="setting" data-toggle="collapse" data-target="#setting-list">
        <i class="glyphicon glyphicon-cog"></i>
        Pengaturan
    </a>
    <ul class="submenu collapse list-unstyled" id="setting-list">                
        <li>
            <a href="?page=views.user" id="data-user">            
                <i class="glyphicon glyphicon-play"></i>Input Users
            </a>
        </li>
        <li>
            <a href="?page=views.abodemen" id="abodemen">
                <i class="glyphicon glyphicon-play"></i>Input Abodemen
            </a>
        </li>
        <li>
            <a href="?page=views.profile" id="profile">
                <i class="glyphicon glyphicon-play"></i>Profile Perusahaan
            </a>
        </li>
    </ul>
</li>
<!-- End Of Admin Menu -->