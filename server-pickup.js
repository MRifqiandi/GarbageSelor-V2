const express = require("express");
const http = require("http");
const socketIO = require("socket.io");

const app = express();
const server = http.createServer(app);
const io = socketIO(server);

const PORT = 3000;

app.use(express.static("public")); // Folder tempat file HTML, CSS, dan JavaScript

io.on("connection", (socket) => {
  console.log("Client connected");

  socket.on("requestPickup", (data) => {
    // Simpan permintaan ke dalam array
    requests.push({
      id: requests.length + 1,
      nama: data.nama,
      tanggal: data.tanggal,
      jenis_sampah: data.jenis_sampah,
      jenis_kendaraan: data.jenis_kendaraan,
      alamat: data.alamat,
      status: "Menunggu",
    });

    // Kirim data ke dashboard admin
    io.emit("pickupRequest", requests);
  });

  socket.on("adminResponse", (response) => {
    // Temukan permintaan berdasarkan id dan perbarui status
    const requestId = response.id;
    const requestIndex = requests.findIndex((req) => req.id === requestId);

    if (requestIndex !== -1) {
      requests[requestIndex].status = response.status;
    }

    // Kirim response admin ke pengguna
    io.emit("pickupResponse", requests);
  });

  socket.on("disconnect", () => {
    console.log("Client disconnected");
  });
});

server.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
