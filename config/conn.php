<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$con = mysql_connect("localhost", "root", "");
mysql_select_db("db_cabdin_bos");

if (!$con) {
    die("Koneksi gagal: " . mysql_connect_error());
}
?>
