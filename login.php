<?php
include('koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT password FROM users WHERE username=?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $hashedPassword);

if (mysqli_stmt_fetch($stmt)) {
    
    if (password_verify($password, $hashedPassword)) {
        echo "Login berhasil!";
        header("Location: frm.utama.php");
        exit;
    } else {
        echo "Login gagal. Coba lagi.";
        header("Location: logingagal.php");
    }
} else {
    echo "Login gagal. Pengguna tidak ditemukan.";
    header("Location: logingagal.php");
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
