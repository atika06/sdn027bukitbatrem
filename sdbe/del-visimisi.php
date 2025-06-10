<?php 
include "env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => "",
];

$id = $_GET['id'];

$q = mysqli_query($koneksi, "DELETE FROM visimisi WHERE id='$id'");

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