function showMessage(message) {
  document.getElementById("message").innerText = message;
}

document.querySelector("form").addEventListener("submit", function () {
  var action = document.getElementById("action");
  if (confirm("Apakah data yang Anda masukkan sudah sesuai?")) {
    // Jika data sesuai, set nilai action menjadi 'data_sesuai'
    action.value = "data_sesuai";
  } else {
    // Jika data tidak sesuai, set nilai action menjadi 'data_tidak_sesuai'
    action.value = "data_tidak_sesuai";
  }
});
