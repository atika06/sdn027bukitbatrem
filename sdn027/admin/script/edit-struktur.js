$(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get("id");
  
    // Pemanggilan AJAX untuk mengambil data produk
    $.ajax({
      type: "GET",
      url: host + "strukturbyid.php?id=" + id,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        var item = response.data;

        $("#id").val(item.id);
        
      },
      
    });
    
    $("#edit-struktur").submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      // var idbk = $("#id").val();
      $.ajax({
        type: "POST",
        url: host + "edit-struktur.php?id=" + id,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
          alert(response.msg);
          window.location.href = "?page=profil";
        },
        error: function (error) {
          console.error("Error editing product:", error);
        },
      });
    });
  
  });
  