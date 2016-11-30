<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id_info = $_POST['id'];
$id_tarif = $id_info;
include '../inc/config.php';
include '../inc/class.php';

$dtaAbodemen = new Rekap;
?>

<table class="table-bordered table-condensed table-condensed">
    <tr>
        <td colspan="3" align="center"> Pemakaian</td>                            
    </tr>
    <tr>
        <td> Pakai 1</td>
        <td> Pakai 2</td>
        <td> Pakai 3</td>
    </tr>
    <tr>
        <td><input type="text" name="pakai1" value="<?= $dtaAbodemen->readTarif("pakai1", $id_tarif) ?>"></td>
        <td><input type="text" name="pakai2" value="<?= $dtaAbodemen->readTarif("pakai2", $id_tarif) ?>"></td>
        <td><input type="text" name="pakai3" value="<?= $dtaAbodemen->readTarif("pakai3", $id_tarif) ?>"></td>
    </tr>
    <tr>
        <td colspan="3" align="center"> Kubik</td>                            
    </tr>
    <tr>
        <td> Kubik 1</td><td> Kubik 2</td><td> Kubik 3</td>
    </tr>
    <tr>
        <td><input type="text" name="kubik1" value="<?= $dtaAbodemen->readTarif("kubik1", $id_tarif) ?>"></td>
        <td><input type="text" name="kubik2" value="<?= $dtaAbodemen->readTarif("kubik2", $id_tarif) ?>"></td>
        <td><input type="text" name="kubik3" value="<?= $dtaAbodemen->readTarif("kubik3", $id_tarif) ?>"></td>
    </tr>
    <tr>
        <td colspan="3" align="center"> Besar Denda & Jatuh Tempo</td>                            
    </tr>
    <tr>
        <td> Besar Denda</td><td> Tanggal Jatuh Tempo</td>
    </tr>
    <tr>
        <td><input type="text" name="besar_denda" value="<?= $dtaAbodemen->readTarif("besar_denda", $id_tarif) ?>"></td>
        <td><input type="text" name="jth_tempo" value="<?= $dtaAbodemen->readTarif("jth_tempo", $id_tarif) ?>"></td>
    </tr>
</table>                    