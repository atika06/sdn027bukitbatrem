$(document).ready(function(){
    Parsingkontak();
    function Parsingkontak() {
      $.ajax({
        type: "GET",
        url: host+"read-kontak.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            // Clear existing table data
            $("#table-kontak").empty();
            // Iterate through the received data and append rows to the table
            $.each(response.data, function (index, item) {
              var row = $(`
              <tr>
              <td>${index + 1}</td>
              <td>${item.alamat}</td>
              <td>${item.email}</td>
              <td> 
                <a href="?page=edit-kontak&&id=${item.id}"><i class="bi bi-pencil-fill"></i></a>
                <a class="delete" key="${item.id}"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                </td>
              </tr>
              `);
              $("#table-kontak").append(row);
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

    $('body').on('click','a.delete', function(){
        var key = $(this).attr('key');
        if (confirm("Yakin ingin hapus data dengan id " + key  + "?")) {
        $.ajax({
          type: "GET",
          url: host+"del-kontak.php?id="+key,
          data: key,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: (result) => {
            alert(result.msg);
            Parsingkontak();
          },
        });
      }
      })

$('#form-kontak').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: host +"insert-kontak.php",
        data: formData,
        cache: false,
        contentType: false, 
        processData: false, 
        dataType: 'json',
        success: (result) => {
            alert(result.msg);
            Parsingkontak();
        },
    });
    $("textarea").val("");
})

});


