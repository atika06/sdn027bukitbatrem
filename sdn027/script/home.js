$(document).ready(function(){
    $.ajax({
      type: "GET",
      url: host+"read-cover.php",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $("#bg-cover").empty();
          if (response.data.length >= 2) {
            var item = response.data[0]; // Accessing the second item (index 1)
            var row = $(`
                <img src="${host}/img/cover/${item.coverfile}" alt="" width="100%" height="280px">
            `);
            $("#bg-cover").append(row);
        }

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
        url: host + "read-galeri.php",
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            // Urutkan data secara descending berdasarkan ID
            response.data.sort((a, b) => b.id - a.id);
            
            // Ambil 3 data teratas setelah diurutkan
            var slicedData = response.data.slice(0, 3);
      
            $("#cat-galeri").empty();
            $.each(slicedData, function(index, item) {
              var row = $(`
                <div class="col-sm-3 konten1 justify-content-around ml-2">
                    <div class="image-container">
                        <img src="${host}/img/galeri/${item.img1}" class="img-fluid" alt="" style="width:300px; height:200px; border-radius:10px;">
                        <div class="image-description">${item.desk}</div>
                    </div>
                </div>
              `);
              $("#cat-galeri").append(row);
            });
          } else {
            console.error("Error fetching data: " + response.message);
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error: " + status + " - " + error);
        },
      });
      


});


