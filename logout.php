<?php
include "config/conn.php";
session_start();
session_destroy();
$_SESSION = array();
header("location:sign-in.php");
?>