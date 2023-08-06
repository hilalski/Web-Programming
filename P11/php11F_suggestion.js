function showHint(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = ""; // Menghapus konten pada elemen txtHint
      return; // Keluar dari fungsi
    }
  
    let xhttp = new XMLHttpRequest();
  
    //Code 4b

    //JSON
    /*xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var response = JSON.parse(this.responseText); // Mengurai respons sebagai objek JavaScript
        var suggestions = response.suggestions; // Mengambil array saran pencarian dari objek respons
  
        var hint = ""; // Variabel untuk menyimpan saran pencarian dalam format string biasa
        if (suggestions && suggestions.length > 0) {
          hint = suggestions.join(", "); // Menggabungkan saran pencarian menjadi satu string dengan pemisah koma
        } else {
          hint = "No Suggestion"; // Jika tidak ada saran pencarian, set string "no suggestion"
        }
  
        document.getElementById("txtHint").innerHTML = hint; // Menampilkan saran pencarian dalam elemen txtHint
      }*/

      // Tanpa JSON
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var suggestions = this.responseText;
    
          var hint = "";
          if (suggestions && suggestions !== "no suggestion") {
            hint = suggestions + ", ";
          } else {
            hint = "No Suggestion";
          }
    
          document.getElementById("txtHint").innerHTML = hint;
        }
    };
  
    xhttp.open("GET", "php11F_gethint.php?keyword=" + str, true);
    xhttp.send();
  }
  