<?php
include "env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => [
      "data" => []
  ]
      ];
      
      $visi = $_POST['visi'];
      $misi = $_POST['misi'];
      $q="INSERT INTO visimisi (visi, misi) VALUES ('$visi','$misi')";
      
      
      $result=mysqli_query($koneksi,$q);
                                                                            
      if ($result) {
      
        $res['status'] = 200;
        $res['msg'] = "Data berhasil di insert";
        $res['body']['data'] =[
        'visi' => $visi,
        'misi' => $misi
        ];
       
      } else {
        $res['status'] = 401;
        $res['msg'] = "Proses insert gagal";
        $res['body']['error'] = "Kesalahan validasi input";
      }
    


echo json_encode($res);
?>
