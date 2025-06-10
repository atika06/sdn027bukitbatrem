$(document).ready(function(){
  $.ajax({
    type: "GET",
    url: host + "read-cover.php",
    dataType: "json",
    success: function (response) {
        if (response.status === "success") {
            $("#sdn").empty();
            // Check if the response data has at least two items
            if (response.data.length >= 2) {
                var item = response.data[1]; // Accessing the second item (index 1)
                var row = $(`
                    <img src="${host}/img/cover/${item.coverfile}" alt="" width="100%" height="280px">
                `);
                $("#sdn").append(row);
            }

        } else {
          console.error("Error fetching data: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
      },
    });


});
$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: host + "read-visimisi.php",
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
       
        $("#misi").empty();
        $.each(response.data, function (index, item) {
          var row = $(`
          <div class="col visimisi">
          ${index + 1}.
          ${item.misi}
          </div>
                `);
          $("#misi").append(row);
        });
       
      } else {
        console.error("Error fetching data: " + response.message);
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error: " + status + " - " + error);
      console.log(xhr.responseText);  // Tambahkan log untuk respon mentah
    },
  });
});