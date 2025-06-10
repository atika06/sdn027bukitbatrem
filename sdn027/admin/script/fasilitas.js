$(document).ready(function(){
    Parsingfasilitas();
    function Parsingfasilitas() {
      $.ajax({
        type: "GET",
        url: host+"read-fasilitas.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            // Clear existing table data
            $("#table-fasilitas").empty();
            // Iterate through the received data and append rows to the table
            $.each(response.data, function (index, item) {
              var row = $(`
              <tr>
              <td>${index + 1}</td>
              <td>${item.nama}</td>
              <td><img src="${host}/img/fasilitas/${item.img1}" alt="" style="width: 80px;"></td>
              <td><img src="${host}/img/fasilitas/${item.img2}" alt="" style="width: 80px;"></td>
              <td>${item.desk}</td>
              <td> 
                <a href="?page=edit-fasilitas&&id=${item.id}"><i class="bi bi-pencil-fill"></i></a>
                <a class="delete" key="${item.id}"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                </td>
              </tr>
              `);
              $("#table-fasilitas").append(row);
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
          url: host+"del-fasilitas.php?id="+key,
          data: key,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: (result) => {
            alert(result.msg);
            Parsingfasilitas();
          },
        });
      }
      })

$('#form-fasilitas').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: host +"insert-fasilitas.php",
        data: formData,
        cache: false,
        contentType: false, 
        processData: false, 
        dataType: 'json',
        success: (result) => {
            alert(result.msg);
            Parsingfasilitas();
        },
    });
    $("textarea").val("");
    $("input").val("");
})

});


