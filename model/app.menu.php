<!-- Navigation -->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span style="color: #000; font-size: 12pt;"> Billing WTP Manglayang</span></a>
    </div>

    <ul class="nav navbar-top-links navbar-right hidden-xs">
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, Username</a>
            <ul class="dropdown-menu">
                <li><a href="?page=crud&act=crud.anggota&req=edit&id=<?= $_SESSION['id'] ?>"><i class="fa fa-user fa-fw"></i> Setting Akun</a></li>
            </ul>
        </li>
    </ul>

    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->

    <div class="navbar-inverse sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">                                    

                <!-- Admin Menu & Kasir -->
                <li>
                    <a href="index.php" id="beranda">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="?page=views.pelanggan" id="data-pelanggan">            
                        Data Pelanggan
                    </a>
                </li>
                <li>
                    <a href="#">
                        Data Rekening <i class="fa arrow"></i>
                    </a>
                    <ul class="nav nav-second-level" data-role="dropdown">
                        <li>
                            <a href="#" id="rek-air">                                         
                                Rekening Air
                            </a>
                        </li>
                        <li>
                            <a href="#" id="rek-non-air">
                                Rekening Non-Air
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">            
                        Rekap Penerimaan
                    </a>
                </li>
                <!-- Admin Menu -->
                <li>
                    <a href="#">            
                        Input Tagihan
                    </a>
                </li>
                <li>
                    <a href="#">
                        Daftar Tunggakan
                    </a>
                </li>
                <li>
                    <a href="#">            
                        Input Denda
                    </a>
                </li>                 

                <li>
                    <a href="#">
                        <img src="theme/images/udPKHX2.png" width="20px" height="20px"> User <i class="fa arrow"></i>
                    </a>

                    <ul class="nav nav-second-level">	           
                        <li><a href="?page=data.user&act=crud.user"> User Profiles</a></li>	                	
                        <li><a href="?page=data.user&act=crud.user"> Tambah User</a></li>
                        <li class="divider"></li>
                        <li><a href="?page=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>                    
                </li>
            </ul>                
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<!-- Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <?php
        $user = new User();
        $main = new Main();
        $main->getPage();
        ?>	
    </div>				
</div>	
