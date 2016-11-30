<?php

require '../inc/config.php';
require '../inc/class.php';
require '../inc/function.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = mysql_query("SELECT * FROM wtp_tarif "
            . "WHERE id = '$id'");
    $data = mysql_fetch_array($query);

    if ($_POST['caraBayar'] == "Cash") {
        if ($_POST['jenisRek'] == "Biaya SR") {
            echo $nominal = $data['biayasr'];
        } elseif ($_POST['jenisRek'] == "WM Hilang") {
            echo $nominal = $data['mtrhilang'];
        }
    } elseif ($_POST['caraBayar'] == "Anggunan") {
        if ($_POST['jenisRek'] == "Biaya SR") {
            $nominal = $data['biayasr'];
            $jumBayar = $nominal/$_POST['tenor'];    
            $jumBayar = ceil($jumBayar);
            echo pembulatan_harga($jumBayar, 2, 100);
            
        } elseif ($_POST['jenisRek'] == "WM Hilang") {
            $nominal = $data['mtrhilang'];
            $jumBayar = $nominal/$_POST['tenor'];
            $jumBayar = ceil($jumBayar);
            echo pembulatan_harga($jumBayar, 2, 100);
        }
    }
}

