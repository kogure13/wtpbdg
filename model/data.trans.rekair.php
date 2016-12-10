<?php
require '../inc/config.php';
require '../inc/class.php';
require '../inc/function.php';

$userUI = new User;
$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];
$bln_input = date("m");
$thn_input = date("Y");
$act = "";

if (!$sortname)
    $sortname = 'id_Pel';
if (!$sortorder)
    $sortorder = 'desc';
if (!$page)
    $page = 1;
if (!$rp)
    $rp = 10;

$start = (($page - 1) * $rp);
$limit = "LIMIT $start, $rp";
$sort = "ORDER BY $sortname $sortorder";
$where = "";

$query = mysql_real_escape_string($_POST['query']);
$qtype = $_POST['qtype'];

if ($query)
    $where = " WHERE $qtype LIKE '%$query%' ";

    $sql = "SELECT wtp_tagihan_air.id, wtp_pelanggan.id_Pel,
            wtp_pelanggan.nama_pemilik,
            wtp_pelanggan.kav,
            wtp_blok.namablok,
            wtp_tagihan_air.meter_awal,
            wtp_tagihan_air.meter_akhir,
            wtp_tagihan_air.bln_input,
            wtp_tagihan_air.thn_input
            FROM
            wtp_pelanggan
            INNER JOIN wtp_tagihan_air ON wtp_tagihan_air.id_pelanggan = wtp_pelanggan.id
            INNER JOIN wtp_blok ON wtp_blok.idblok = wtp_pelanggan.blok            
            $where $sort $limit";
    $result = mysql_query($sql);

    $numrow = countRec('id', 'wtp_tagihan_air', $where);
if ($numrow > 0) {
    $data['page'] = intval($page);
    $data['total'] = intval($numrow);
    $no = 1;
    while ($row = mysql_fetch_array($result)) {
        $total = $row['meter_akhir'] - $row['meter_awal'];
        $rows[] = array(
            "id" => $row['id'],
            "cell" => array(                
                $row['id_Pel'],
                $row['nama_pemilik'],
                "Blok: ".$row['namablok'].", Kav: ".$row['kav'],
                $row['meter_awal'],
                $row['meter_akhir'],
                $total,
                $row['bln_input']." - ".$row['thn_input'],
                "<a href=?page=crud&act=" . $act . "&req=edit&id=" . $row['id'] . " class=text-primary title=Edit><i class=\"glyphicon glyphicon-edit\"></i></a>"                
            )            
        );        
    }
} else {
    $rows[] = array(
        "id" => 'null',
        "cell" => array(
            'null',
            'null',
            'null',
            'null'
        )
    );
}

$data['rows'] = $rows;
echo json_encode($data);
?>
