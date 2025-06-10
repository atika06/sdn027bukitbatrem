$(document).ready(function(){

      $.ajax({
        type: "GET",
        url: host+"read-kontak.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#content-kontak").empty();
            $.each(response.data, function (index, item) {
              var row = $(`
              <div class="row">
                <div class="col-md-6 konten1 d-flex justify-content-center">
                    <i class="bi bi-building bi-icon" style="color: #5c0a0a;"></i>
                </div>
                <div class="col-md-6 konten1">
                    <p>${item.alamat}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 konten1 d-flex justify-content-center">
                    <i class="bi bi-envelope-fill bi-icon" style="color: #5c0a0a;"></i>
                </div>
                <div class="col-md-6 konten1">
                    <p>${item.email}</p>
                </div>
            </div>
              `);
              $("#content-kontak").append(row);
            });
          } else {
            console.error("Error fetching data: " + response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error: " + status + " - " + error);
        },
      });


});


