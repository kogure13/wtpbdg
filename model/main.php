<?php $main = new Main(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Billing WTP Manglayang - Bandung</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development" />
        <meta name="keywords" content="Billing, Manglayang, Bandung" />       
        <link rel="shortcut icon" href="favicon.png">
        <?= $main->renderHeader(); ?>

    </head>
    <body>
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <?php $main->getMenu(); ?>        
            </div>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <a href="#menu-toggle" class="collapsed navbar-toggle" id="menu-toggle" aria-contrlos="bs-navbar" aria-expanded="false" data-toggle="collapse">
                        <span class=sr-only>Toggle navigation</span> 
                        <span class=icon-bar></span> 
                        <span class=icon-bar></span> 
                        <span class=icon-bar></span>
                    </a>
                    <?php
                    $user = new User();
                    $main->getPage();
                    ?>	

                </div>
            </div>
        </div>
        <?= $main->renderScript(); ?>
    </body>
</html>