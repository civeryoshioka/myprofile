<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "myprofile"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>