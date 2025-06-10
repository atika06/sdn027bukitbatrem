$(document).ready(function(){
    Parsingadmin();
    function Parsingadmin() {
      $.ajax({
        type: "GET",
        url: host+"read-admin.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            // Clear existing table data
            $("#table-admin").empty();
            // Iterate through the received data and append rows to the table
            $.each(response.data, function (index, item) {
              var passwordLength = item.password.length;
              var hiddenPassword = "*".repeat(passwordLength);
              var row = $(`
              <tr>
              <td>${index + 1}</td>
              <td>${item.username}</td>
              <td>${hiddenPassword}</td>
              <td> 
                <a href="?page=edit-admin&&id=${item.id}"><i class="bi bi-pencil-fill"></i></a>
                </td>
              </tr>
              `);
              $("#table-admin").append(row);
            });
          } else {
            console.error("Error fetching data: " + response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error: " + status + " - " + error);
        },
      });
    }

    // $('body').on('click','a.delete', function(){
    //     var key = $(this).attr('key');
    //     if (confirm("Yakin ingin hapus data dengan id " + key  + "?")) {
    //     $.ajax({
    //       type: "GET",
    //       url: host+"del-admin.php?id="+key,
    //       data: key,
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       dataType: "json",
    //       success: (result) => {
    //         alert(result.msg);
    //         Parsingadmin();
    //       },
    //     });
    //   }
    //   })


});


