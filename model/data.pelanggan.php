<?php

require '../inc/config.php';
require '../inc/class.php';
require '../inc/function.php';

$akses = $_GET['accessrole'];
if (!empty($_GET['id']) && !empty($_GET['status'])) {
    $status = $_GET['status'];
    $where = "WHERE wtp_pelanggan.id=" . $_GET['id'];
} elseif (!empty($_GET['status'])) {
    $status = $_GET['status'];
    $where = "WHERE status=" . $_GET['status'];
} else {
    $status = 1;
    $where = "WHERE status =" . $status;
}

$userUI = new User;
$act = "crud.pelanggan";

$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];

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

$query = mysql_real_escape_string($_POST['query']);
$qtype = $_POST['qtype'];

if ($query)
    $where = " WHERE $qtype LIKE '%$query%' ";

$sql = "SELECT wtp_pelanggan.id,
            wtp_pelanggan.id_Pel,
            wtp_pelanggan.nama_pemilik, wtp_pelanggan.status,
            wtp_area.skarea,
            wtp_blok.namablok,
            wtp_pelanggan.kav
            FROM
            wtp_pelanggan
            INNER JOIN wtp_area ON wtp_pelanggan.area = wtp_area.id
            INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.idblok 
            $where $sort $limit";
$result = mysql_query($sql);
$numrow = countRec('id', 'wtp_pelanggan', $where);

if ($numrow > 0) {
    $data['page'] = intval($page);
    $data['total'] = intval($numrow);
    $no = 1;
    while ($row = mysql_fetch_array($result)) {
        switch ($row['status']) {
            case '1' : $nameStatus = "Aktif";
                break;
            case '2' : $nameStatus = "Pemutusan";
                break;
            case '0' : $nameStatus = "Non-Aktif";
                break;
            default : $nameStatus = "";
                break;
        }
        
        $rows[] = array(
            "id" => $row['id'],
            "cell" => array(
                $row['id_Pel'],
                $row['nama_pemilik'],
                "Blok: " . $row['namablok'] . ", Kav: " . $row['kav'],
                $nameStatus,
                "<a href=\"?page=crud&act=".$act."&req=edit&id=".$row['id']."\" class=\"text-primary\" title=\"Edit\">"
                . "<i class=\"glyphicon glyphicon-edit\"></i></a>"
                . "<a href=\"?page=crud&act=".$act."&req=delete&id=".$row['id']."\" class=\"text-danger\" title=\"Delete\" "
                . "onclick=\"return confirm(\'Are you sure delete this data ?\')\"> <i class=\"glyphicon glyphicon-trash\"></i></a>"
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
