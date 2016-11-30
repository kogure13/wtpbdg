<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../inc/config.php';

if(isset($_REQUEST['term'])) {
    $query = $_REQUEST['term'];
    
    $sql = mysql_query("SELECT
            wtp_pelanggan.id,
            wtp_pelanggan.id_Pel,
            wtp_pelanggan.nama_pemilik, wtp_pelanggan.status,
            wtp_area.skarea,
            wtp_blok.namablok,
            wtp_pelanggan.kav
            FROM
            wtp_pelanggan
            INNER JOIN wtp_area ON wtp_pelanggan.area = wtp_area.id
            INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.idblok
            WHERE status = 1 AND
            namablok LIKE '%{$query}%' OR kav LIKE '%{$query}%' OR nama_pemilik LIKE '%{$query}%'");
            
    $array = array();
    while($row = mysql_fetch_array($sql)) {
        $array[] = array(            
            'label' => $row['namablok'].' - '.$row['kav'].'/'.$row['nama_pemilik'],
            'value' => $row['nama_pemilik'],
            'id_pel' => $row['id']
        );
    }
    
    //Return JSON Array
    echo json_encode($array);
        
}