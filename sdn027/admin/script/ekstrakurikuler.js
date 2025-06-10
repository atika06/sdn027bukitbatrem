$(document).ready(function(){
    Parsingekstra();
    function Parsingekstra() {
      $.ajax({
        type: "GET",
        url: host+"read-ekstrakurikuler.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            // Clear existing table data
            $("#table-ekstrakurikuler").empty();
            // Iterate through the received data and append rows to the table
            $.each(response.data, function (index, item) {
              var row = $(`
              <tr>
              <td>${index + 1}</td>
              <td>${item.nama}</td>
              <td><img src="${host}/img/ekstrakurikuler/${item.img1}" alt="" style="width: 80px;"></td>
              <td>${item.deskripsi}</td>
              <td> 
                <a href="?page=edit-ekstrakurikuler&&id=${item.id}"><i class="bi bi-pencil-fill"></i></a>
                <a class="delete" key="${item.id}"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                </td>
              </tr>
              `);
              $("#table-ekstrakurikuler").append(row);
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
        var id = $(this).attr('key');
        if (confirm("Yakin ingin hapus data dengan id " + id  + "?")) {
        $.ajax({
          type: "GET",
          url: host+"del-ekstrakurikuler.php?id="+id,
          data: id,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: (result) => {
            alert(result.msg);
            Parsingekstra();
          },
        });
      }
      })

$('#form-ekstrakurikuler').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: host +"insert-ekstrakurikuler.php",
        data: formData,
        cache: false,
        contentType: false, 
        processData: false, 
        dataType: 'json',
        success: (result) => {
            alert(result.msg);
            Parsingekstra();
        },
    });
    $("input").val("");
    $("textarea").val("");
})

});


