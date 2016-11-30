<div class="page-content">
    <div class="flex-grid no-responsive-future" style="height: 100%;">
        <div class="row" style="height: 100%">
            <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
                <?php 
                    $main = new Main();                    
                    include 'menu.php';
                ?>
            </div>
            <div class="cell auto-size padding20 bg-white" id="cell-content">
                <?=$main->getPage()?>
            </div>
        </div>
    </div>
</div>