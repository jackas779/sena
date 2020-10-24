<?php
session_start();

if ($_SESSION['admin']=="0")
{
    header("location: salir.php");
}
if ($_SESSION['admin']!="1")
{
    header("location: salir.php");
}
?>