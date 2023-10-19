<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['username'])) {
    include "login.php";
} else {
    include "konten.php";
}
?>
