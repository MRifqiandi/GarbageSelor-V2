<?php
// Ambil data formulir penjemputan dari database
// (gunakan koneksi database dan query SELECT)
$conn = new mysqli("localhost", "root", "", "garbage-selor");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM formulir_penjemputan";
$result = $conn->query($sql);

$dataFormulir = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataFormulir[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="<?php
// Ambil data formulir penjemputan dari database berdasarkan status "Menunggu Proses"
$conn = new mysqli("localhost", "root", "", "garbage-selor");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM formulir_penjemputan WHERE status = 'Menunggu Proses'";
$result = $conn->query($sql);

$dataFormulir = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataFormulir[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../styles/dashboard-pickup.css">
</head>
<body>

<!-- Tampilkan data formulir penjemputan dalam tabel -->
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Jenis Sampah</th>
            <th>Jenis Kendaraan</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop untuk menampilkan data formulir penjemputan
        foreach ($dataFormulir as $formulir) {
            echo "<tr>";
            echo "<td>{$formulir['nama']}</td>";
            echo "<td>{$formulir['tanggal']}</td>";
            echo "<td>{$formulir['jenis_sampah']}</td>";
            echo "<td>{$formulir['jenis_kendaraan']}</td>";
            echo "<td>{$formulir['alamat']}</td>";
            echo "<td>{$formulir['status']}</td>";
            echo "<td><button onclick=\"tanggapiForm({$formulir['id']})\">Tanggapi</button></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<script>
    function tanggapiForm(id) {
        // Menggunakan JavaScript untuk mengirim tanggapan admin ke server
        // (gunakan teknik AJAX atau fetch)
        // Contoh menggunakan fetch:
        fetch('process_tanggapan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id }),
        })
        .then(response => response.json())
        .then(data => {
            // Tampilkan notifikasi atau perbarui tabel
            console.log(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
</script>
</body>
</html>
width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../styles/dashboard-pickup.css">
</head>
<body>

<!-- Tampilkan data formulir penjemputan dalam tabel -->
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Jenis Sampah</th>
            <th>Jenis Kendaraan</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop untuk menampilkan data formulir penjemputan
        foreach ($dataFormulir as $formulir) {
            echo "<tr>";
            echo "<td>{$formulir['nama']}</td>";
            echo "<td>{$formulir['tanggal']}</td>";
            echo "<td>{$formulir['jenis_sampah']}</td>";
            echo "<td>{$formulir['jenis_kendaraan']}</td>";
            echo "<td>{$formulir['alamat']}</td>";
            echo "<td><button onclick=\"tanggapiForm({$formulir['id']})\">Tanggapi</button></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<script>
    function tanggapiForm(id) {
        // Menggunakan JavaScript untuk mengirim tanggapan admin ke server
        // (gunakan teknik AJAX atau fetch)
        // Contoh menggunakan fetch:
        fetch('process_tanggapan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id }),
        })
        .then(response => response.json())
        .then(data => {
            // Tampilkan notifikasi atau perbarui tabel
            console.log(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
</script>
</body>
</html>
