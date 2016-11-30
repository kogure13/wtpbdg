<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id_pelanggan = $_POST['id'];
include '../inc/config.php';
include '../inc/class.php';

$dataPelanggan = New Pelanggan();
?>

<table accesskey="#" class="table table-bordered table-condensed">
    <tr style="font-size: 13pt;">
        <td> ID. Pelanggan</td><td> :</td><td> <?=$dataPelanggan->readPelanggan("id_Pel", $id_pelanggan)?> </td>
    </tr>
    <tr style="font-size: 12pt;">
        <td colspan="3"> <?=$dataPelanggan->readPelanggan("nama_pemilik", $id_pelanggan)?> / <?=$dataPelanggan->readPelanggan("telp", $id_pelanggan)?></td>
    </tr>
    <tr style="font-size: 12pt;">
        <td colspan=""> 
            <?=$dataPelanggan->readPelanggan("skarea", $id_pelanggan)?> Blok <?=$dataPelanggan->readPelanggan("namablok", $id_pelanggan)?>
            Kav <?=$dataPelanggan->readPelanggan("kav", $id_pelanggan)?>
        </td>
        <td align="right" colspan="2">
            Tipe Rumah <?=$dataPelanggan->readPelanggan("tipe", $id_pelanggan)?> - 
            <?=$dataPelanggan->readPelanggan("penghuni", $id_pelanggan)?> Penghuni
        </td>        
    </tr>
    <tr style="font-size: 13pt;">
        <td> Tanggal Pemasangan / No. Seri WM</td><td> :</td>
        <td> 
            <?=$dataPelanggan->readPelanggan("tglpasang", $id_pelanggan)?> / 
            <?=$dataPelanggan->readPelanggan("nowm", $id_pelanggan)?>
        </td>
    </tr>
    
</table>