$(document).ready(function(){
      $.ajax({
        type: "GET",
        url: host+"read-galeri.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#content-galeri").empty();
            $.each(response.data, function (index, item) {
              var row = $(`
              <div class="row mt-4">
               <div class="col subkat justify-content-center" style="text-align: center;">
                <h4><strong>${item.nama}</strong></h4>
              </div>
              </div>
            <div class="row justify-content-center" id="img-galeri" style="margin-top: 20px;">
              <div class="col-md-5 mt-2 ml-4 justify-content-center">
                <img src="${host}/img/galeri/${item.img1}" alt="" style="box-shadow: 5px 5px 10px #2A3F54; width: 450px;border-radius: 5px;">
              </div>
              <div class="col-md-5 visimisi mt-2 ml-4 justify-content-center">
                <img src="${host}/img/galeri/${item.img2}" alt="" style="box-shadow: 5px 5px 10px #2A3F54; width: 450px;border-radius: 5px;">
              </div>
            </div>  
              `);
              $("#content-galeri").append(row);
            });
          } else {
            console.error("Error fetching data: " + response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error: " + status + " - " + error);
        },
      });

      $.ajax({
        type: "GET",
        url: host+"read-galeri.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#judul-galeri").empty();
            $.each(response.data, function (index, item) {
              var row = $(`
              
              `);
              $("#judul-galeri").append(row);
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


