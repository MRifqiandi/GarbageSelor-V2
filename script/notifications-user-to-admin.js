const socket = io();

document.addEventListener("DOMContentLoaded", function () {
  document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault();

    // Tangkap data dari formulir
    const nama = document.getElementById("nama").value;
    const tanggal = document.getElementById("tanggal").value;
    const jenis_sampah = document.getElementById("jenis_sampah").value;
    const jenis_kendaraan = document.getElementById("jenis_kendaraan").value;
    const alamat = document.getElementById("alamat").value;

    // Kirim data ke server menggunakan Socket.IO
    socket.emit("requestPickup", {
      nama,
      tanggal,
      jenis_sampah,
      jenis_kendaraan,
      alamat,
    });

    // Tampilkan pesan bahwa data berhasil dikirim
    document.getElementById("message").innerHTML =
      "Data berhasil dikirim. Silahkan tunggu konfirmasi.";
  });
});
