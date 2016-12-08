<!--
Menu Administrator
Menu Kasir
Menu Operator Lapangan
Menu Manajer
-->

<nav class="main-nav">
    <ul class="main-menu">
        <!-- Admin Menu & Kasir -->        
        <li class="active">
            <a href="index.php" id="data-beranda">
                <i class="fa fa-dashboard fa-fw"></i>
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
    </ul>    
</nav>
