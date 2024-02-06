<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "garbage-selor");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Tangkap data dari formulir
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$jenis_sampah = $_POST['jenis_sampah'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$alamat = $_POST['alamat'];

// Menampilkan data yang telah diisi
echo "<h2>Data yang Anda masukkan:</h2>";
echo "<p>Nama: $nama</p>";
echo "<p>Tanggal: $tanggal</p>";
echo "<p>Jenis Sampah: $jenis_sampah</p>";
echo "<p>Jenis Kendaraan: $jenis_kendaraan</p>";
echo "<p>Alamat: $alamat</p>";

// Tombol "Data Tidak Sesuai" dan "Data Sesuai"
echo "<form action='../dashboard/form-pickup.html' method='POST'>";
echo "<input type='hidden' name='nama' value='$nama'>";
echo "<input type='hidden' name='tanggal' value='$tanggal'>";
echo "<input type='hidden' name='jenis_sampah' value='$jenis_sampah'>";
echo "<input type='hidden' name='jenis_kendaraan' value='$jenis_kendaraan'>";
echo "<input type='hidden' name='alamat' value='$alamat'>";
echo "<button type='submit' name='action' value='data_tidak_sesuai'>Data Tidak Sesuai</button>";
echo "</form>";

echo "<form action='../src/success.php' method='POST'>";
echo "<input type='hidden' name='nama' value='$nama'>";
echo "<input type='hidden' name='tanggal' value='$tanggal'>";
echo "<input type='hidden' name='jenis_sampah' value='$jenis_sampah'>";
echo "<input type='hidden' name='jenis_kendaraan' value='$jenis_kendaraan'>";
echo "<input type='hidden' name='alamat' value='$alamat'>";
echo "<button type='submit' name='action' value='data_sesuai'>Data Sesuai</button>";
echo "</form>";


// Tutup koneksi
mysqli_close($koneksi);
?>
