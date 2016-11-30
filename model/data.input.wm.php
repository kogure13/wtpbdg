<?php

require '../inc/config.php';
require '../inc/class.php';
require '../inc/function.php';

if (isset($_GET['filter'])) {
    list($nowMonth, $nowYear) = explode("/", $_GET['filter']);    
} else {
    $nowMonth = date('m');    
    $nowYear = date('Y');
}

$bulan = $nowMonth;
$tahun = $nowYear;

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

$where = "WHERE bln_input = " . $bulan . " AND thn_input = " . $tahun;

$query = mysql_real_escape_string($_POST['query']);
$qtype = $_POST['qtype'];

if ($query)
    $where = " WHERE $qtype LIKE '%$query%' ";

$sql = "SELECT
        wtp_pelanggan.id_Pel,
        wtp_pelanggan.nama_pemilik,
        wtp_pelanggan.kav,
        wtp_blok.namablok,
        wtp_input_wm.id,
        wtp_input_wm.meter_sekarang,
        wtp_input_wm.bln_input, wtp_input_wm.thn_input,
        wtp_input_wm.tgl_input, wtp_input_wm.jam_input,
        wtp_user.nama_lengkap
        FROM
        wtp_pelanggan
        INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.idblok
        INNER JOIN wtp_input_wm ON wtp_input_wm.id_pelanggan = wtp_pelanggan.id
        INNER JOIN wtp_user ON wtp_input_wm.id_operator = wtp_user.id $where $sort $limit";
    
$result = mysql_query($sql);
$numrow = countRec('id_Pel', 'wtp_pelanggan
        INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.idblok
        INNER JOIN wtp_input_wm ON wtp_input_wm.id_pelanggan = wtp_pelanggan.id
        INNER JOIN wtp_user ON wtp_input_wm.id_operator = wtp_user.id', $where);

if ($numrow > 0) {
    $data['page'] = intval($page);
    $data['total'] = intval($numrow);
    $no = 1;
    while ($row = mysql_fetch_array($result)) {
        $rows[] = array(
            "id" => $row['id'],
            "cell" => array(
                $row['id_Pel'],
                $row['nama_pemilik'],
                "Blok: " . $row['namablok'] . ", Kav: " . $row['kav'],
                $row['meter_sekarang'],
                $row['tgl_input'],
                $row['jam_input'],
                $row['nama_lengkap']
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
 