$(document).ready(function(){

      $.ajax({
        type: "GET",
        url: host+"read-struktur.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#struktur").empty();
            $.each(response.data, function (index, item) {
              $("#struktur").append(
                `
                <img src="${host}img/struktur/${item.strukfile}" alt="" style="width: inherit; height: auto;">
              `
              );
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


