<script type="text/javascript">
    $(document).ready(function (e) {
//        var main = "views/rekap.harian.php";
//        $("#dataLpH").load(main); 
    });
</script>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$arrayRekap = new Rekap();
$dtaBulan = $arrayRekap->getDataBulan();
?>