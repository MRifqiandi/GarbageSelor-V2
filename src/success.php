<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
</head>
<body>
    <div class="container">
        <?php
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
        $jenis_sampah = isset($_POST['jenis_sampah']) ? $_POST['jenis_sampah'] : '';
        $jenis_kendaraan = isset($_POST['jenis_kendaraan']) ? $_POST['jenis_kendaraan'] : '';
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';

        echo "<h2>Terima kasih!</h2>";
        echo "<p>Silahkan tunggu, permintaan sedang di proses.</p>";
        ?>
    </div>
</body>
</html>
