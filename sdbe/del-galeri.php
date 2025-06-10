<?php
include "env.php";
$res = [
    "status" => 200,
    "msg" => "",
    "body" => "",
  ];

  $id = $_GET['id'];

$d = mysqli_query($koneksi, "SELECT img1, img2 FROM galeri WHERE id='$id'");
$dt = mysqli_fetch_array($d);
$img1 = $dt['img1'];
$img1 = $dt['img2'];

unlink('img/galeri/' . $img1);
unlink('img/galeri/' . $img2);

$q = mysqli_query($koneksi, "DELETE FROM galeri WHERE id='$id'");
if ($q){
    $res['status'] = 200;
    $res['msg'] = "Data berhasil dihapus";
    $res['body'] = "";
  } else {
    $res['status'] = 404;
    $res['msg'] = "Data tidak ditemukan";
    $res['body'] = "";
  }
  
  echo json_encode($res);

?>