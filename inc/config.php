<?php

define("DB_Host", "localhost");
define("DB_Name", "wtpbdg");
define("DB_User", "root");
define("DB_Pass", "");

$conn = mysql_connect(DB_Host, DB_User, DB_Pass);
$db = mysql_select_db(DB_Name, $conn);
if(!$conn) {header("location: error-page/e.conn.php"); exit();}
if(!$db) {header("location: error-page/e.db.php");exit();}
