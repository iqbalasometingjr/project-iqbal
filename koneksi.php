<?php
$host = "monorail.proxy.rlwy.net"; 
$username = "root";
$password = "FdbdAbEG1C-HgCF-aha5HE3Ff4A5Adc1"; 
$database = "railway";
$port = 42838;

$koneksi = new mysqli($host, $username, $password, $database ,$port);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
