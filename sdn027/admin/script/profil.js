$(document).ready(function(){
    Parsingvisimisi();
    function Parsingvisimisi() {
      $.ajax({
        type: "GET",
        url: host+"read-visimisi.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            // Clear existing table data
            $("#table-visimisi").empty();
            // Iterate through the received data and append rows to the table
            $.each(response.data, function (index, item) {
              var row = $(`
              <tr>
              <td>${index + 1}</td>
              <td>${item.visi}</td>
              <td>${item.misi}</td>
              <td> 
                <a href="?page=edit-visimisi&&id=${item.id}"><i class="bi bi-pencil-fill"></i></a>
                <a class="delete" key="${item.id}"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                </td>
              </tr>
              `);
              $("#table-visimisi").append(row);
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
          url: host+"del-visimisi.php?id="+key,
          data: key,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: (result) => {
            alert(result.msg);
            Parsingvisimisi();
          },
        });
      }
      })

$('#form-visimisi').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: host +"insert-visimisi.php",
        data: formData,
        cache: false,
        contentType: false, 
        processData: false, 
        dataType: 'json',
        success: (result) => {
            alert(result.msg);
            Parsingvisimisi();
        },
    });
    $("textarea").val("");
})

// STRUKTUR
Parsingstruktur();
    function Parsingstruktur() {
      $.ajax({
        type: "GET",
        url: host+"read-struktur.php",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            // Clear existing table data
            $("#table-struktur").empty();
            // Iterate through the received data and append rows to the table
            $.each(response.data, function (index, item) {
              var tab = $(`
              <tr>
              <td>${index + 1}</td>
              <td><img src="${host}/img/struktur/${item.strukfile}" alt="" style="width: 80px;"></td>
              <td> 
                <a href="?page=edit-struktur&&id=${item.id}"><i class="bi bi-pencil-fill"></i></a>
                <a class="delete-struktur" key="${item.id}"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                </td>
              </tr>
              `);
              $("#table-struktur").append(tab);
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

    $('body').on('click','a.delete-struktur', function(){
        var keys = $(this).attr('key');
        if (confirm("Yakin ingin hapus data dengan id " + keys  + "?")) {
        $.ajax({
          type: "GET",
          url: host+"del-struktur.php?id="+keys,
          data: keys,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: (result) => {
            alert(result.msg);
            Parsingstruktur();
          },
        });
      }
      })

$('#form-struktur').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: host +"insert-struktur.php",
        data: formData,
        cache: false,
        contentType: false, 
        processData: false, 
        dataType: 'json',
        success: (result) => {
            alert(result.msg);
            Parsingstruktur();
        },
    });
    $("textarea").val("");
})

});


