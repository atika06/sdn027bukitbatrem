<?php
include "env.php";
$res = [
    "status" => 200,
    "msg" => "",
    "body" => "",
  ];

  $id = $_GET['id'];

$d = mysqli_query($koneksi, "SELECT coverfile FROM cover WHERE id='$id'");
$dt = mysqli_fetch_array($d);
$coverfile = $dt['coverfile'];

unlink('img/cover/' . $coverfile);

$q = mysqli_query($koneksi, "DELETE FROM cover WHERE id='$id'");
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