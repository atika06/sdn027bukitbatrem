$(document).ready(function(){
      $.ajax({
        type: "GET",
        url: host+"read-ekstrakurikuler.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#content-ekstrakurikuler").empty();
            $.each(response.data, function (index, item) {
              var row = $(`
              <div class="row" style="margin-top: 30px;">
              <div class="col-md-5 mt-5 ml-4 justify-content-center">
                <img src="${host}/img/ekstrakurikuler/${item.img1}" alt="" style="box-shadow: 5px 5px 10px #2A3F54;width:450px;border-radius: 5px;">
              </div>
                <div class="col-md-6 visimisi mt-5">
                  <p>
                    <b>${item.nama}</b><br>
                    ${item.deskripsi}
                  </p>
                </div>
              </div>  
              `);
              $("#content-ekstrakurikuler").append(row);
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
        url: host+"read-ekstrakurikuler.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#judul-ekstrakurikuler").empty();
            $.each(response.data, function (index, item) {
              var row = $(`
              
              `);
              $("#judul-ekstrakurikuler").append(row);
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


