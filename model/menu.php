<!--
Menu Administrator
Menu Kasir
Menu Operator Lapangan
Menu Manajer
-->

<ul class="sidebar-nav">
    <!-- Admin Menu & Kasir -->
    <li class="sidebar-brand">
        <a href="index.php" id="beranda">            
            Billing WTP Manglayang
        </a>
    </li>
    <li>
        <a href="index.php" id="data-beranda">
            <i class="glyphicon glyphicon-home"></i>
            Beranda
        </a>
    </li>
    <?php
    if ($_SESSION['accessrole'] == 1) {
        include 'views/menu.admin.php';
    } elseif ($_SESSION['accessrole'] == 2) {
        include 'views/menu.operator.php';
    } elseif ($_SESSION['accessrole'] == 3) {
        include 'views/menu.manajer.php';
    }
    ?>
    <li>
        <a href="?page=logout" id="logout">      
            <i class="glyphicon glyphicon-log-out"></i>
            Logout
        </a>
    </li>
</ul>