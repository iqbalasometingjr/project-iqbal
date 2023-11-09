<?php
include('koneksi.php');

// Mengambil data dari formulir
$username = $_POST['username'];
$password = $_POST['password'];

// Melakukan hash password sebelum menyimpannya
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Memasukkan data pengguna ke tabel users
$query = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = mysqli_prepare($koneksi, $query);
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    echo "Pengguna berhasil didaftarkan.";
} else {
    echo "Gagal mendaftarkan pengguna: " . $stmt->error;
}

$stmt->close();
// $mysqli->close();
?>

<a href="login.html">Login Kembali</a>