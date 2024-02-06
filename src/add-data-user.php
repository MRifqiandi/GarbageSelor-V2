<?php
require '../src/db.php';

// Ambil data dari formulir
$nama = $_POST["nama"];
$tanggal = $_POST["tanggal"];
$alamat = $_POST["alamat"];
$nomor_telepon = $_POST["nomor_telepon"];
$username = $_POST["username"];
$password = $_POST["password"];

// Tetapkan peran "user"
$role = "user";

// Simpan data ke tabel "user_data" dengan peran yang ditetapkan
$sql = "INSERT INTO user (nama, tanggal, alamat, nomor_telepon, username, password, role) VALUES ('$nama', '$tanggal', '$alamat', '$nomor_telepon', '$username', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Pengguna berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
