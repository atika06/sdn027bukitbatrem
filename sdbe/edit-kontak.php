<?php
include "env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => [
    "data" => [
      "alamat" => "",
    ]
  ]
];

$id = $_GET['id'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];

$q = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id='$id'");
$ary = mysqli_fetch_array($q);

// Gunakan prepared statements untuk mencegah SQL injection
$stmt = $koneksi->prepare("UPDATE kontak SET alamat = '$alamat', email = '$email' WHERE id = '$id'");
// $stmt->bind_param("si", $alamat, $email, $id);

if ($stmt->execute()) {
  $res['msg'] = "Data berhasil diupdate";
  $res['body']['data']['alamat'] = $alamat;
  $res['body']['data']['email'] = $email;
} else {
  $res['status'] = 400;
  $res['msg'] = "Gagal mengupdate kontak";
  $res['body']['error'] = "Kesalahan validasi input";
}

$stmt->close();
$koneksi->close();

echo json_encode($res);
?>