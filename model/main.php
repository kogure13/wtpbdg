<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->

    <?= $main->renderHeader(); ?>

    <body class="dashboard">
        <!-- WRAPPER -->
        <div class="wrapper">
            <!-- TOP BAR -->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-md-2 logo">
                            <a href="index.php"><img src="" alt="" /></a>
                            <h1 class="sr-only">Billing WTP Manglayang</h1>
                        </div>
                        <!-- end logo -->
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- search box -->

                                    <!-- end search box -->
                                </div>
                                <div class="col-md-9">
                                    <div class="top-bar-right">
                                        <!-- responsive menu bar icon -->
                                        <a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i></a>
                                        <!-- end responsive menu bar icon -->                                        

                                        <!-- logged user and the menu -->
                                        <div class="logged-user">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                                    <img src="assets/img/user-avatar.png" alt="User Avatar" />
                                                    <span class="name">Welcome, <?= $_SESSION['nama_lengkap'] ?></span> 
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-user"></i>
                                                            <span class="text">Profile</span>
                                                        </a>
                                                    </li>                                                    
                                                    <li>
                                                        <a href="?page=logout">
                                                            <i class="fa fa-power-off"></i>
                                                            <span class="text">Logout</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end logged user and the menu -->
                                    </div>
                                    <!-- /top-bar-right -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /top -->
            <!-- BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
            <div class="bottom">
                <div class="container">
                    <div class="row">
                        <!-- left sidebar -->
                        <div class="col-md-2 left-sidebar">
                            <!-- main-nav -->
                            <?= $main->getMenu(); ?>
                            <!-- /main-nav -->
                            <!-- minimized -->
                            <div class="sidebar-minified js-toggle-minified">
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <!-- /minimized -->
                            <!-- sidebar content -->

                            <!-- end sidebar content -->
                        </div>
                        <!-- end left sidebar -->                        
                        <!-- content-wrapper -->
                        <div class="col-md-10 content-wrapper">
                            <!-- main -->
                            <?= $main->getPage(); ?>
                            <!-- /main -->
                        </div>
                        <!-- /content-wrapper -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- END BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
        </div>
        <!-- /wrapper -->

        <!-- FOOTER -->
        <footer class="footer">
            &copy; 2013 The Develovers
        </footer>
        <!-- END FOOTER -->        

    </body>
</html>
