<?php
session_start();
$_SESSION["admin"]="0";
$_SESSION["username"]="0";
header("location: index.php ");
?>