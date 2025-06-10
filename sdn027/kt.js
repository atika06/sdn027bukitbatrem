$(document).ready(function(){
    $.ajax({
      type: "GET",
      url: host+"read-kontak.php",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $("#kontak").empty();
          $.each(response.data, function (index, item) {
            var row = $(`
            <div class="col-12" style="display: flex;">
            <i class="bi bi-building bi-icon" style="font-size: 20px; margin-right: 20px;"></i>
            <p style='margin-top: 2px;'>${item.alamat}</p>
          </div>
          <div class="col" style="display: flex;">
            <i class="bi bi-envelope-fill bi-icon" style="font-size: 20px; margin-right: 20px;"></i>
            <p style='margin-top: 2px;'>${item.email}</p>
          </div>
            `);
            $("#kontak").append(row);
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