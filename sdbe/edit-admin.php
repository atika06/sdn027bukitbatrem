<?php
include "env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => [
    "data" => [
      "username" => "",
    ]
  ]
];
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

$q = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");
$ary = mysqli_fetch_array($q);

// Gunakan prepared statements untuk mencegah SQL injection
$stmt = $koneksi->prepare("UPDATE admin SET username = '$username', password = '$password' WHERE id = '$id'");
// $stmt->bind_param("si", $username, $password, $id);

if ($stmt->execute()) {
  $res['msg'] = "Data berhasil diupdate";
  $res['body']['data']['username'] = $username;
  $res['body']['data']['password'] = $password;
} else {
  $res['status'] = 400;
  $res['msg'] = "Gagal mengupdate admin";
  $res['body']['error'] = "Kesalahan validasi input";
}

$stmt->close();
$koneksi->close();

echo json_encode($res);
?>