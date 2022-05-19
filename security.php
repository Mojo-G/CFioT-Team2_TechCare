<?php
session_start();
include('dbconfig.php');
//berfungsi untuk pengaman, biar gak bisa diakses direct ke index php dan halaman lainnya yang sudah di masukin secirity php
//tanpa login dahulu
if ($dbconfig) {
    // echo "Database tersambung";
} else {
    header("Location: dbconfig.php");
}

if (!$_SESSION['username']) {
    header('Location: login.php');
}
?>