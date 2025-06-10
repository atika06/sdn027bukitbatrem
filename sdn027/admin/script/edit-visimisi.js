$(document).ready(function () {
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get("id");

  // Pemanggilan AJAX untuk mengambil data visimisi
  $.ajax({
    type: "GET",
    url: host + "visimisibyid.php?id=" + id,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        var item = response.data;
        $("#id").val(item.id);

        // Mengosongkan opsi sebelumnya dan menambahkan opsi baru
        var visiSelect = $("#visi");
        visiSelect.empty();
        visiSelect.append('<option value="">Pilih Visi</option>');
        visiSelect.append('<option value="' + item.visi_id + '">' + item.visi + '</option>');

        $("#misi").val(item.misi);
      } else {
        alert("Error: " + response.message);
      }
    },
    error: function (error) {
      console.error("Error fetching visimisi data:", error);
      alert("Error fetching visimisi data. Please try again later.");
    }
  });

  $("#edit-visimisi").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: host + "edit-visimisi.php?id=" + id,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        alert(response.msg);
        if (response.status === 200) {
          window.location.href = "?page=profil";
        }
      },
      error: function (error) {
        console.error("Error editing visimisi:", error);
        alert("Error editing visimisi. Please try again later.");
      },
    });
  });
});
